<?php
/**
 * Code-Along 15: Shark-Ranglisten ausliefern (Unload) – Lösung
 *
 * Für Dozierende: Die Nummern verweisen auf die TODOs im Startcode
 * ../unload.php. Wer Code-Along 14 gemacht hat, erkennt das Gerüst wieder – die
 * Kommentare beschränken sich deshalb auf das, was hier anders ist.
 *
 * Datenfluss dieser Datei:
 *
 *   Anfrage aus dem Browser     GET /unload.php?dimension=shark_category
 *     -> geprüfte Parameter     dataset und dimension, sonst 400
 *       -> SELECT               eine der zwei Tabellen, kein JOIN
 *         -> Datenvertrag       rank_position heisst wieder rank
 *           -> JSON-Antwort     17 Zeilen, eine Rangliste, oder 120 Länder
 *
 * Ein Endpunkt liefert hier zwei verschiedene Datensätze. Das ist eine
 * Entscheidung und keine Notwendigkeit: Man könnte auch zwei Dateien schreiben.
 * Wir bleiben bei einer, weil im ganzen Kurs eine Datei pro Schritt steht –
 * ein Extract, ein Transform, ein Load, ein Unload. Der Preis dafür ist ein
 * zweiter Parameter, der geprüft werden muss.
 */

// ---------------------------------------------------------------------------
// TODO 1 und 2 (Teil 1): Header und Zugangsdaten
// ---------------------------------------------------------------------------
//
// Vier Ordner nach oben, weil diese Datei zusätzlich in solution/ liegt.

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/../../../../config.php';

// ---------------------------------------------------------------------------
// TODO 5: Die Typen festlegen
// ---------------------------------------------------------------------------
//
// Kürzer als beim Hitzesommer: Hier gibt es keine Dezimalzahl und kein Feld,
// das null sein darf. Zwei Texte, zwei Zahlen.
//
// Die Funktion bleibt trotzdem, und zwar aus dem zweiten Grund, der schon in
// Code-Along 14 genannt wurde: An genau einer Stelle steht, welche Felder die
// Antwort hat. Wer den Vertrag ändern will, ändert diese Funktion.

function normalizeRanking(array $row): array
{
    return [
        'dimension' => $row['dimension'],
        'rank' => (int) $row['rank'],
        'category' => $row['category'],
        'incidents' => (int) $row['incidents'],
    ];
}

/**
 * TODO 10 (Teil 1): Die Typen des zweiten Datenvertrags.
 *
 * Hier wird zum ersten Mal in diesem Block etwas NICHT umgewandelt.
 *
 * (int) auf incidents ist richtig: Aus dem Text "78" wird die Zahl 78, und im
 * JSON steht 78 statt "78".
 *
 * Ein (string) auf iso3 wäre dagegen falsch. Steht dort NULL, macht (string)
 * daraus einen leeren Text – und "" ist im JSON etwas völlig anderes als null.
 * Das Frontend prüft später auf null, um zu wissen, welche Länder es nicht
 * einfärben darf. Ein leerer Text käme durch diese Prüfung durch.
 *
 * Merksatz: Umwandeln, was einen Typ hat. Stehenlassen, was auch fehlen darf.
 */
function normalizeCountry(array $row): array
{
    return [
        'country' => $row['country'],
        'iso3' => $row['iso3'],
        'incidents' => (int) $row['incidents'],
        'top_species' => $row['top_species'],
        'top_activity' => $row['top_activity'],
    ];
}

// ---------------------------------------------------------------------------
// TODO 8: Einen unbekannten Wert abweisen
// ---------------------------------------------------------------------------
//
// Hier liegt der eigentliche Unterschied zum Hitzesommer.
//
// Beim Hitzesommer war ?city=Atlantis eine sinnvolle Frage mit leerer Antwort:
// Es hätte diese Stadt geben können. Die Antwort war [] mit Status 200.
//
// ?dimension=fische ist etwas anderes. Es gibt genau zwei Ranglisten, und
// «fische» ist keine davon. Die Frage selbst ist falsch gestellt – meistens ein
// Tippfehler im Frontend. Darauf antwortet man mit 400 «Bad Request»:
//
//   200 + []  Die Frage war in Ordnung, es gibt nur nichts dazu.
//   400       Die Frage war falsch gestellt.
//   500       Bei uns ist etwas kaputt.
//
// Eine leere Liste wäre hier die unfreundlichste Antwort: Das Frontend zeigt
// ein leeres Diagramm und niemand erfährt, dass der Parametername falsch war.
//
// Die Liste der gültigen Werte darf in der Fehlermeldung stehen. Sie ist keine
// Interna, sondern genau die Auskunft, die der fragenden Seite weiterhilft.
//
// Nebenbei ist diese Prüfung der Grund, warum der Wert später gefahrlos in die
// Abfrage darf: Was hier durchkommt, ist einer von zwei bekannten Texten.
// Der Platzhalter unten bleibt trotzdem – aus Gewohnheit und weil sich
// Prüfungen im Lauf eines Projekts ändern.

$allowedDimensions = ['shark_category', 'activity_group'];

$dimension = trim($_GET['dimension'] ?? '');

if ($dimension !== '' && !in_array($dimension, $allowedDimensions, true)) {
    http_response_code(400);

    echo json_encode([
        'error' => 'Unbekannte Rangliste.',
        'allowed' => $allowedDimensions,
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

// ---------------------------------------------------------------------------
// TODO 9: Welcher Datensatz ist gemeint?
// ---------------------------------------------------------------------------
//
// Genau dieselbe Prüfung wie oben, nur für einen anderen Parameter. Dass sie
// zweimal fast gleich dasteht, ist kein Versehen: Jeder Parameter, der von
// aussen kommt, bekommt seine eigene Liste erlaubter Werte.
//
// Der Unterschied zu dimension liegt in der Voreinstellung. Ohne ?dimension=
// kommen ALLE Ranglisten – der Parameter ist ein Filter. Ohne ?dataset= kommen
// die Ranglisten – der Parameter ist eine Auswahl, und eine Auswahl braucht
// einen Standard.
//
// Die Voreinstellung 'rankings' ist zugleich ein Versprechen an alles, was
// diesen Endpunkt schon benutzt: Code-Along 18 kennt ?dataset= gar nicht und
// bekommt trotzdem weiterhin genau das, was es erwartet.

$allowedDatasets = ['rankings', 'countries'];

$dataset = trim($_GET['dataset'] ?? 'rankings');

if (!in_array($dataset, $allowedDatasets, true)) {
    http_response_code(400);

    echo json_encode([
        'error' => 'Unbekannter Datensatz.',
        'allowed' => $allowedDatasets,
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

try {
    // -----------------------------------------------------------------------
    // TODO 2 (Teil 2): Verbindung aufbauen
    // -----------------------------------------------------------------------

    $pdo = new PDO($dsn, $username, $password, $options);

    // -----------------------------------------------------------------------
    // TODO 3: Die Abfrage schreiben
    // -----------------------------------------------------------------------
    //
    // Kein JOIN, obwohl es zwei Tabellen gibt. Das ist die Folge der
    // Entscheidung aus Code-Along 13: Die beiden Tabellen haben nichts
    // miteinander zu tun, also gibt es auch nichts zu verbinden. Ein JOIN
    // beantwortet die Frage «welche Zeilen gehören zusammen» – hier lautet die
    // Antwort «gar keine».
    //
    // Stattdessen entscheidet ein if, welche der beiden Abfragen läuft.
    //
    // Dafür kommt die Umbenennung aus Code-Along 13 zurück, diesmal in die
    // andere Richtung:
    //
    //   beim Laden:      'rank_position' => $row['rank']    Vertrag -> Tabelle
    //   beim Ausliefern:  rank_position AS `rank`           Tabelle -> Vertrag
    //
    // Und das reservierte Wort schlägt noch einmal zu: `AS rank` ohne Backticks
    // ist auf MySQL 8 ein Syntaxfehler, denn RANK() ist eine eingebaute
    // Funktion. Ein Alias ist ein Name, und für Namen gelten dieselben Regeln
    // wie für Spalten. Die Backticks sagen der Datenbank: Das ist ein Name,
    // keine Funktion.
    //
    // ORDER BY hat hier zwei Felder, weil ohne Filter beide Ranglisten kommen:
    // erst nach Rangliste gruppieren, darin nach Platz sortieren.

    $params = [];

    if ($dataset === 'countries') {
        // -------------------------------------------------------------------
        // TODO 10 (Teil 2): Die Abfrage für die Karte
        // -------------------------------------------------------------------
        //
        // Kürzer als die andere: kein Alias, weil keine Spalte anders heisst
        // als das Feld im Vertrag, und kein Filter.
        //
        // ORDER BY incidents DESC bringt die grössten Länder zuerst. Für die
        // Karte spielt die Reihenfolge keine Rolle – das Frontend sucht sich
        // die Länder ohnehin über den Code zusammen. Für einen Menschen, der
        // die URL im Browser öffnet, spielt sie sehr wohl eine Rolle.
        //
        // country als zweites Sortierfeld: Sonst wäre die Reihenfolge der 60
        // Länder mit genau einem Vorfall bei jedem Aufruf eine andere.

        $sql = 'SELECT country,
                       iso3,
                       incidents,
                       top_species,
                       top_activity
                FROM shark_countries
                ORDER BY incidents DESC, country';

        $normalize = 'normalizeCountry';
    } else {
        $sql = 'SELECT dimension,
                       rank_position AS `rank`,
                       category,
                       incidents
                FROM shark_rankings';

        // -------------------------------------------------------------------
        // TODO 7: Den Filter anhängen
        // -------------------------------------------------------------------
        //
        // Gleiches Muster wie beim Hitzesommer: WHERE nur dann, wenn ein Wert
        // da ist, und der Wert reist als Parameter getrennt vom SQL-Text.
        //
        // Der Filter hängt bewusst nur an diesem Zweig: ?dimension= fragt nach
        // einer Rangliste, und die Ländertabelle hat gar keine.

        if ($dimension !== '') {
            $sql .= ' WHERE dimension = :dimension';
            $params['dimension'] = $dimension;
        }

        $sql .= ' ORDER BY dimension, rank_position';

        $normalize = 'normalizeRanking';
    }

    // -----------------------------------------------------------------------
    // TODO 4 und 6: Lesen und antworten
    // -----------------------------------------------------------------------
    //
    // Ab hier ist alles wortgleich zu Code-Along 14 – und zwar für beide
    // Datensätze. Das ist der Punkt des zweiten Durchgangs: Der Endpunkt ist
    // immer dieselbe Kette, nur die Abfrage und der Vertrag ändern sich.
    //
    // Deshalb steht in $normalize oben nur der NAME der Funktion. Welche der
    // beiden gemeint ist, wurde bei der Abfrage entschieden; hier unten muss
    // man es nicht noch einmal wissen.

    $statement = $pdo->prepare($sql);
    $statement->execute($params);

    $rows = $statement->fetchAll();

    $data = array_map($normalize, $rows);

    echo json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
} catch (Throwable $error) {
    // -----------------------------------------------------------------------
    // TODO 8 (Teil 2): Die Fehlerantwort
    // -----------------------------------------------------------------------
    //
    // Unverändert aus Code-Along 14: lauter Status, echte Meldung ins Log,
    // kurze Auskunft nach draussen.

    http_response_code(500);
    error_log('unload.php (sharks): ' . $error->getMessage());

    echo json_encode([
        'error' => 'Daten konnten nicht geladen werden.',
    ]);
}
