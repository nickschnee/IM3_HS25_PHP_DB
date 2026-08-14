<?php
/**
 * Transform – fertig aus Block C.
 *
 * Das ist eine mögliche Lösung aus Code-Along 10. Die Kategorien sind bewusst
 * klein und explizit; eine unbekannte Art wird nicht geraten.
 *
 * -------------------------------------------------------------------------
 * Eure eigene Fassung passt auch
 * -------------------------------------------------------------------------
 * In Code-Along 10 ist dieser Transform mit KI entstanden, und eure Version
 * sieht deshalb anders aus: andere Kategorienamen, andere Hilfsfunktionen,
 * vielleicht andere Zeiträume. Das spielt heute keine Rolle.
 *
 * Wichtig sind nur die vier Felder einer Ergebniszeile – dimension, rank,
 * category und incidents. Wer sie einhält, kann die eigene transform.php hier
 * hineinkopieren, und load.php läuft unverändert weiter. Genau dafür gibt es
 * einen Datenvertrag.
 *
 * -------------------------------------------------------------------------
 * Datenfluss dieser Datei
 * -------------------------------------------------------------------------
 *
 *   8702 CSV-Zeilen, ein Vorfall pro Zeile       (aus extract.php)
 *     -> 3347 Vorfälle 1950–2018, Unprovoked
 *       -> zwei Zähl-Arrays: Art und Aktivität   ($speciesCounts, $activityCounts)
 *         -> 17 Ranking-Zeilen in einer Liste    ($rankingRows)
 *
 * Die 17 sind 10 Hai-Kategorien plus 7 Aktivitätsgruppen: Bei den Aktivitäten
 * gibt es gar keine zehn Gruppen, die Top-10 ist dort einfach die ganze Liste.
 *
 * Anders als in Code-Along 09 entstehen hier ZWEI Ergebnisse aus denselben
 * Daten. Sie stehen in einer flachen Liste und werden über das Feld `dimension`
 * auseinandergehalten – so kann das Frontend beide mit demselben Code zeichnen.
 */

$rawAttacks = include __DIR__ . '/extract.php';

// Die Regeln aus der Planungsrunde. Sie stehen zuoberst und werden am Schluss
// unter `rules` mit ausgegeben, damit die Auswahl im Resultat sichtbar bleibt.
$yearFrom = 1950;
$yearTo = 2018;
$topN = 10;

/**
 * Rohe Artangabe zu einer Kategorie machen.
 *
 * Der Rückgabetyp ?string ist die zentrale Entscheidung dieser Funktion:
 * null heisst «nicht zuordenbar», nicht «unbekannte Art». Wir behaupten
 * lieber nichts, als etwas Falsches zu behaupten.
 */
function normalizeSpecies(string $raw): ?string
{
    $value = strtolower(trim($raw));

    // Erst die Ausschlüsse, dann die Zuordnung. Jedes dieser Wörter ist ein
    // Hinweis der Erfasser:innen, dass sie selbst unsicher waren – etwa
    // "Possibly a white shark". Diese Unsicherheit dürfen wir nicht
    // wegtransformieren.
    //
    // 'possiby' ist kein Tippfehler von uns, sondern steht so im Datensatz.
    // Solche Funde kommen aus der Kontrolle der häufigsten nicht zugeordneten
    // Rohwerte (siehe most_frequent_unmapped_species im Audit).
    if (
        $value === ''
        || str_contains($value, 'not confirmed')
        || str_contains($value, 'questionable')
        || str_contains($value, 'invalid')
        || str_contains($value, 'unknown')
        || str_contains($value, 'unidentified')
        || str_contains($value, 'possibly')
        || str_contains($value, 'possiby')
        || str_contains($value, 'probably')
        || str_contains($value, 'thought to involve')
        || str_contains($value, 'may have')
        || str_contains($value, 'believed')
        || str_contains($value, 'suspect')
        || str_contains($value, 'said to')
        || str_contains($value, 'either')
        // "Blacktip or spinner shark" nennt zwei Arten und wird deshalb keiner
        // von beiden zugeschlagen. \b sind Wortgrenzen: So trifft die Regel das
        // Wort "or", aber nicht das "or" in "north" oder "sailor".
        || preg_match('/\bor\b/', $value) === 1
    ) {
        return null;
    }

    // Spezifische Begriffe stehen vor allgemeineren Begriffen.
    //
    // Die Liste ist absichtlich kurz. Jede Kategorie ist eine fachliche
    // Behauptung, die jemand verteidigen können muss – deshalb keine Kategorie
    // ohne klares Textmuster.
    $patterns = [
        'White shark' => ['white shark', 'great white'],
        'Tiger shark' => ['tiger shark'],
        'Bull / Zambesi shark' => ['bull shark', 'zambesi shark'],
        'Sand tiger / Raggedtooth / Grey nurse shark' => [
            'sand tiger',
            'raggedtooth',
            'grey nurse',
        ],
        'Blacktip shark' => ['blacktip'],
        'Wobbegong' => ['wobbegong'],
        'Blue shark' => ['blue shark'],
        'Bronze whaler / Copper shark' => ['bronze whaler', 'copper shark'],
        'Lemon shark' => ['lemon shark'],
        'Hammerhead' => ['hammerhead'],
        'Mako shark' => ['mako'],
    ];

    // Zwei verschachtelte Schleifen: aussen die Kategorie, innen ihre
    // Schreibweisen. Der erste Treffer gewinnt und steigt sofort aus.
    foreach ($patterns as $category => $needles) {
        foreach ($needles as $needle) {
            if (str_contains($value, $needle)) {
                return $category;
            }
        }
    }

    // Alles, was durchfällt – "2 m shark", "shark involvement not confirmed",
    // schlicht "shark" – bleibt bewusst ohne Kategorie.
    return null;
}

/**
 * Rohe Aktivität zu einer Gruppe machen.
 *
 * Hier ist die REIHENFOLGE der if-Blöcke die eigentliche Logik. Wer sie
 * umstellt, ändert das Ergebnis, ohne dass ein Fehler auftritt. Das ist die
 * Stelle, an der KI-Code am häufigsten still falsch ist.
 */
function normalizeActivity(string $raw): ?string
{
    $value = strtolower(trim($raw));

    if ($value === '') {
        return null;
    }

    // Die Reihenfolge verhindert z. B., dass Spearfishing nur Fishing wird.
    if (str_contains($value, 'spearfish')) {
        return 'Spearfishing';
    }

    // "Surf fishing" enthält das Wort "surf" und würde sonst weiter unten als
    // Surfing gezählt. Deshalb steht der Spezialfall vor der allgemeinen Regel.
    if (str_contains($value, 'surf fish')) {
        return 'Fishing';
    }

    if (
        str_contains($value, 'surf')
        || str_contains($value, 'boogie board')
        || str_contains($value, 'body board')
        || str_contains($value, 'bodyboard')
        || str_contains($value, 'kite board')
    ) {
        return 'Surfing & board sports';
    }

    // Schwimmen und im flachen Wasser stehen werden hier zusammengefasst. Das
    // ist eine Vereinfachung: Wer im Wasser steht, tut etwas anderes als wer
    // schwimmt. Für unsere Frage reicht die Gruppe – gesagt werden muss es
    // trotzdem.
    if (
        str_contains($value, 'swim')
        || str_contains($value, 'bathing')
        || str_contains($value, 'wading')
        || str_contains($value, 'standing')
        || str_contains($value, 'walking')
        || str_contains($value, 'treading water')
        || str_contains($value, 'floating')
    ) {
        return 'Swimming & wading';
    }

    if (
        str_contains($value, 'diving')
        || str_contains($value, 'snorkel')
        || str_contains($value, 'scuba')
    ) {
        return 'Diving & snorkeling';
    }

    // Die allgemeine Fisch-Regel steht bewusst NACH Spearfishing und
    // Surf fishing.
    if (str_contains($value, 'fish') || str_contains($value, 'angling')) {
        return 'Fishing';
    }

    // 'paddl' fängt paddling, paddleboarding und paddled gemeinsam ab.
    if (
        str_contains($value, 'paddl')
        || str_contains($value, 'kayak')
        || str_contains($value, 'canoe')
        || str_contains($value, 'rowing')
    ) {
        return 'Paddling';
    }

    if (
        str_contains($value, 'boat')
        || str_contains($value, 'sailing')
        || str_contains($value, 'yacht')
    ) {
        return 'Boating';
    }

    return null;
}

/**
 * Einen Zähler in einem assoziativen Array um eins erhöhen.
 *
 * Das & vor $counts ist neu gegenüber Block A: Ohne & bekäme die Funktion eine
 * Kopie des Arrays und die Zählung ginge draussen verloren. Mit & arbeitet sie
 * direkt auf dem Array der aufrufenden Stelle.
 *
 * ($counts[$category] ?? 0) + 1 erspart die Prüfung, ob es die Kategorie schon
 * gibt: Beim ersten Mal ist sie nicht gesetzt, ?? liefert dann 0.
 */
function incrementCount(array &$counts, string $category): void
{
    $counts[$category] = ($counts[$category] ?? 0) + 1;
}

/**
 * Aus einem Zähl-Array eine sortierte Top-N-Rangliste machen.
 *
 * Die Funktion wird zweimal aufgerufen – einmal für Arten, einmal für
 * Aktivitäten. Beide Ranglisten haben dadurch garantiert denselben Aufbau,
 * und der Datenvertrag steht nur an einer Stelle im Code.
 */
function makeRankingRows(
    array $counts,
    string $dimension,
    int $limit
): array {
    // Schritt 1: aus "Kategorie => Anzahl" wird eine Liste von Zeilen.
    $rows = [];

    foreach ($counts as $category => $incidents) {
        $rows[] = [
            'dimension' => $dimension,
            'category' => $category,
            'incidents' => $incidents,
        ];
    }

    // Schritt 2: absteigend nach Anzahl sortieren. $b vor $a dreht die
    // Richtung um. Bei Gleichstand entscheidet der Name alphabetisch – ohne
    // diesen zweiten Vergleich wäre die Reihenfolge bei gleicher Anzahl
    // zufällig und das Ergebnis nicht reproduzierbar.
    usort($rows, function (array $a, array $b): int {
        $byCount = $b['incidents'] <=> $a['incidents'];
        return $byCount !== 0 ? $byCount : $a['category'] <=> $b['category'];
    });

    // Schritt 3: nur die ersten $limit Zeilen behalten.
    $rows = array_slice($rows, 0, $limit);

    // Schritt 4: Rang vergeben. Der Rang ergibt sich aus der Position, deshalb
    // erst hier, nach dem Sortieren und Kürzen.
    //
    // Die Zeile wird komplett neu zusammengesetzt, statt nur 'rank' zu
    // ergänzen. Grund: In PHP behält ein Array die Reihenfolge, in der die
    // Schlüssel gesetzt wurden, und diese Reihenfolge landet so im JSON.
    // Neu bauen heisst: die Felder erscheinen in der Reihenfolge des
    // Datenvertrags – dimension, rank, category, incidents.
    //
    // &$row ist wieder eine Referenz, damit die Änderung im Array ankommt.
    // Das unset danach ist Pflicht: Ohne es zeigt $row weiterhin auf die
    // letzte Zeile, und die nächste Schleife mit derselben Variable würde sie
    // überschreiben. Ein klassischer PHP-Stolperstein.
    foreach ($rows as $index => &$row) {
        $row = [
            'dimension' => $row['dimension'],
            'rank' => $index + 1,
            'category' => $row['category'],
            'incidents' => $row['incidents'],
        ];
    }
    unset($row);

    return $rows;
}

/**
 * Die häufigsten Rohwerte finden, die keiner Kategorie zugeordnet
 * wurden.
 *
 * Diese Liste ist das Werkzeug zur Verbesserung des Mappings: Steht ganz oben
 * ein Wert, den man eigentlich zuordnen könnte, fehlt eine Regel. Steht dort
 * "2 m shark", ist alles richtig gelaufen.
 *
 * arsort sortiert absteigend nach Wert UND behält dabei die Schlüssel – bei
 * "Rohwert => Anzahl" wäre der Rohwert sonst weg. Das true in array_slice
 * erhält die Schlüssel ebenfalls.
 */
function mostFrequentValues(array $counts, int $limit): array
{
    arsort($counts);
    $result = [];

    foreach (array_slice($counts, 0, $limit, true) as $value => $count) {
        $result[] = ['raw_value' => $value, 'count' => $count];
    }

    return $result;
}

// Anders als in Code-Along 09 gehen diese Zähler auf: klassifiziert plus
// unklassifiziert ergibt included_incidents, und die drei excluded-Zähler plus
// included ergeben input_rows. Diese Rechnung in der Abnahme laut vorführen –
// sie ist der Beweis, dass keine Zeile unbemerkt verschwunden ist.
$audit = [
    'input_rows' => count($rawAttacks),
    'excluded_invalid_year' => 0,
    'excluded_outside_period' => 0,
    'excluded_not_unprovoked' => 0,
    'included_incidents' => 0,
    'species_classified' => 0,
    'species_unclassified' => 0,
    'activity_classified' => 0,
    'activity_unclassified' => 0,
];

// Drei assoziative Arrays als Zähler: zweimal für das Ergebnis, einmal für die
// Qualitätskontrolle des Mappings.
$speciesCounts = [];
$activityCounts = [];
$unmappedSpeciesCounts = [];

// ---------------------------------------------------------------------------
// Filtern, normalisieren, zählen
// ---------------------------------------------------------------------------

foreach ($rawAttacks as $attack) {
    // (string) und trim vor jeder Prüfung: Die Werte kommen aus einer CSV und
    // sind immer Text, oft mit Leerzeichen am Rand.
    $yearRaw = trim((string) ($attack['Year'] ?? ''));

    // Filter 1: Ohne brauchbare Jahreszahl lässt sich der Vorfall
    // nicht einordnen.
    if ($yearRaw === '' || !is_numeric($yearRaw)) {
        $audit['excluded_invalid_year']++;
        continue;
    }

    // Filter 2: Zeitraum. Vor 1950 ist der Datensatz lückenhaft, nach
    // 2018 unvollständig erfasst.
    $year = (int) $yearRaw;
    if ($year < $yearFrom || $year > $yearTo) {
        $audit['excluded_outside_period']++;
        continue;
    }

    // Filter 3: Nur unprovozierte Vorfälle. Provozierte Fälle sagen
    // etwas über menschliches Verhalten aus, nicht über die Frage.
    // Der Vergleich ist strikt und exakt – "Unprovoked " mit Leerzeichen ist
    // durch trim schon erledigt, "unprovoked" klein geschrieben fällt hier
    // bewusst raus, weil es im Datensatz nicht vorkommt.
    if (trim((string) ($attack['Type'] ?? '')) !== 'Unprovoked') {
        $audit['excluded_not_unprovoked']++;
        continue;
    }

    // Ab hier gehört der Vorfall zur Auswahl. Das ist der Nenner für die
    // Abdeckung weiter unten.
    $audit['included_incidents']++;

    // Normalisieren. Nur diese beiden Felder – Fatal, Name und Injury
    // bleiben unangetastet, weil die zwei Fragen sie nicht brauchen.
    $speciesRaw = trim((string) ($attack['Species'] ?? ''));
    $species = normalizeSpecies($speciesRaw);
    $activity = normalizeActivity((string) ($attack['Activity'] ?? ''));

    // Zählen. Nicht zugeordnete Arten verschwinden nicht, sondern
    // landen im Kontroll-Array mit ihrem Rohwert.
    if ($species === null) {
        $audit['species_unclassified']++;
        $label = $speciesRaw === '' ? '(empty)' : $speciesRaw;
        incrementCount($unmappedSpeciesCounts, $label);
    } else {
        $audit['species_classified']++;
        incrementCount($speciesCounts, $species);
    }

    if ($activity === null) {
        $audit['activity_unclassified']++;
    } else {
        $audit['activity_classified']++;
        incrementCount($activityCounts, $activity);
    }
}

// ---------------------------------------------------------------------------
// Zwei Ranglisten, ein Datenvertrag
// ---------------------------------------------------------------------------
//
// Die drei Punkte sind der Spread-Operator: Er hängt die Zeilen beider
// Ranglisten hintereinander in EINE flache Liste. Unterschieden werden sie
// später am Feld `dimension`.

$rankingRows = [
    ...makeRankingRows($speciesCounts, 'shark_category', $topN),
    ...makeRankingRows($activityCounts, 'activity_group', $topN),
];

// ---------------------------------------------------------------------------
// Abdeckung berechnen
// ---------------------------------------------------------------------------
//
// Die Abdeckung ist die ehrlichste Zahl im ganzen Resultat: Sie sagt, für wie
// viel Prozent der eingeschlossenen Vorfälle wir überhaupt eine Aussage haben.
// Bei den Arten ist sie niedrig, und das gehört so in die Story.
//
// Die Prüfung auf 0 verhindert eine Division durch null, falls alle Zeilen
// weggefiltert wurden – etwa wenn jemand den Zeitraum falsch setzt.

$included = $audit['included_incidents'];
$audit['species_coverage_percent'] = $included === 0
    ? 0.0
    : round($audit['species_classified'] / $included * 100, 1);
$audit['activity_coverage_percent'] = $included === 0
    ? 0.0
    : round($audit['activity_classified'] / $included * 100, 1);
$audit['most_frequent_unmapped_species'] = mostFrequentValues(
    $unmappedSpeciesCounts,
    10
);
$audit['output_rows'] = count($rankingRows);

// Der Datenvertrag dieses Schritts. Neben den Daten reisen drei Dinge mit:
// die Fragen, die Regeln, nach denen gefiltert wurde, und `limits` – der Satz,
// der verhindert, dass aus einer Häufigkeit eine Risikoaussage wird.
// Diesen Satz später in der Story sichtbar lassen.
return [
    'questions' => [
        'Welche identifizierte Hai-Kategorie kommt am häufigsten vor?',
        'Bei welcher Aktivitätsgruppe wurden die meisten Vorfälle erfasst?',
    ],
    'limits' => 'Häufigkeiten im GSAF-Datensatz; keine Aussage über Risiko oder Kausalität.',
    'rules' => [
        'year_from' => $yearFrom,
        'year_to' => $yearTo,
        'incident_type' => 'Unprovoked',
        'top_n' => $topN,
    ],
    'data' => $rankingRows,
    'audit' => $audit,
];
