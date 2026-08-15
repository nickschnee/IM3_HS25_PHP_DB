<?php
/**
 * Code-Along 13: Shark-Ranglisten laden (Load) – Lösung
 *
 * Für Dozierende: Die Nummern verweisen auf die TODOs im Startcode
 * ../load.php. Wer Code-Along 12 gemacht hat, erkennt das Gerüst wieder – die
 * Kommentare beschränken sich deshalb auf das, was hier anders ist.
 *
 * Datenfluss dieser Datei:
 *
 *   17 Ranking-Zeilen aus dem Transform   (aus transform.php)
 *     -> 17 Zeilen in shark_rankings      (prepare einmal, execute oft)
 *   120 Länderzeilen aus dem Transform
 *     -> 120 Zeilen in shark_countries    (dasselbe Muster, andere Tabelle)
 *
 * Zwei Tabellen, aber kein Fremdschlüssel: Die beiden Listen wissen nichts
 * voneinander. Ein Fremdschlüssel würde eine Beziehung behaupten, die es nicht
 * gibt – «Platz 3 der Hai-Arten» gehört zu keinem Land.
 *
 * Der ganze zweite Teil ist eine Wiederholung des ersten mit anderen Spalten.
 * Genau das ist die Aussage: Load ist immer dieselbe Kette.
 */

// ---------------------------------------------------------------------------
// TODO 1 und 2: Ausgabe als reiner Text, Zugangsdaten laden
// ---------------------------------------------------------------------------
//
// Vier Ordner nach oben, weil diese Datei zusätzlich in solution/ liegt.

header('Content-Type: text/plain; charset=utf-8');

require __DIR__ . '/../../../../config.php';

// ---------------------------------------------------------------------------
// TODO 3: Das Ergebnis des Transforms holen
// ---------------------------------------------------------------------------
//
// In die Datenbank kommt nur data. Die drei anderen Schlüssel bleiben draussen,
// und zwar aus unterschiedlichen Gründen:
//
// - questions und rules beschreiben, wie die Zahlen entstanden sind. Sie
//   gehören in die Dokumentation, nicht in eine Tabelle mit Messwerten.
// - limits ist der Satz «Häufigkeiten, keine Aussage über Risiko». Er gehört
//   in die Story und muss dort sichtbar bleiben – eine Datenbankspalte, die in
//   jeder Zeile denselben Satz enthält, liest niemand.

$result = include __DIR__ . '/../transform.php';
$rows = $result['data'];
$countryRows = $result['countries'];

echo 'Der Transform liefert ' . count($rows) . ' Ranking-Zeilen und '
    . count($countryRows) . " Länderzeilen.\n";
echo 'Wichtig für die Story: ' . $result['limits'] . "\n\n";

// ---------------------------------------------------------------------------
// TODO 4: Verbindung aufbauen
// ---------------------------------------------------------------------------

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Verbindung steht.\n\n";
} catch (PDOException $e) {
    exit('Verbindung fehlgeschlagen: ' . $e->getMessage() . "\n");
}

// ---------------------------------------------------------------------------
// TODO 5: Alten Stand löschen
// ---------------------------------------------------------------------------
//
// Wie beim Hitzesommer: Der Datensatz ist historisch und kommt jedes Mal
// vollständig, also schreiben wir den Stand neu.
//
// Diesmal gibt es zusätzlich eine UNIQUE-Regel auf (dimension, category).
// Wer die Zeile hier vergisst, bekommt beim zweiten Aufruf keine doppelten
// Zeilen, sondern einen lauten Fehler: «Duplicate entry». Das ist der
// angenehmere Fehler von beiden – er meldet sich sofort.

$deleted = $pdo->exec('DELETE FROM shark_rankings');
echo $deleted . " alte Ranking-Zeilen gelöscht.\n";

$deletedCountries = $pdo->exec('DELETE FROM shark_countries');
echo $deletedCountries . " alte Länderzeilen gelöscht.\n\n";

// ---------------------------------------------------------------------------
// TODO 6: Alle Zeilen schreiben
// ---------------------------------------------------------------------------
//
// Die einzige Stelle mit einer Übersetzung: Im Datenvertrag heisst das Feld
// rank, in der Tabelle heisst die Spalte rank_position, weil rank in MySQL ein
// reserviertes Wort ist.
//
// Links steht immer der Platzhalter aus dem SQL, rechts der Wert aus dem
// Transform. Deshalb ist die Zeile 'rank_position' => $row['rank'] und nicht
// umgekehrt – eine der häufigsten Verwechslungen in diesem Block.

$insertRanking = $pdo->prepare(
    'INSERT INTO shark_rankings (dimension, rank_position, category, incidents)
     VALUES (:dimension, :rank_position, :category, :incidents)'
);

foreach ($rows as $row) {
    $insertRanking->execute([
        'dimension' => $row['dimension'],
        'rank_position' => $row['rank'],
        'category' => $row['category'],
        'incidents' => $row['incidents'],
    ]);
}

echo count($rows) . " Ranking-Zeilen geschrieben.\n";

// ---------------------------------------------------------------------------
// TODO 7: Die Länderzeilen schreiben
// ---------------------------------------------------------------------------
//
// Dasselbe Muster ein zweites Mal: einmal prepare(), dann execute() pro Zeile.
// Neu ist nur, dass hier Werte ankommen dürfen, die null sind.
//
// PDO braucht dafür nichts Besonderes: Ein null im execute()-Array wird zu
// einem echten SQL-NULL. Wer stattdessen einen leeren Text schickt, schreibt
// '' in die Spalte – und '' ist nicht NULL. Die Datenbank kann die beiden
// später nicht mehr auseinanderhalten, die Karte auch nicht.

$insertCountry = $pdo->prepare(
    'INSERT INTO shark_countries (country, iso3, incidents, top_species, top_activity)
     VALUES (:country, :iso3, :incidents, :top_species, :top_activity)'
);

foreach ($countryRows as $row) {
    $insertCountry->execute([
        'country' => $row['country'],
        'iso3' => $row['iso3'],
        'incidents' => $row['incidents'],
        'top_species' => $row['top_species'],
        'top_activity' => $row['top_activity'],
    ]);
}

echo count($countryRows) . " Länderzeilen geschrieben.\n\n";

// ---------------------------------------------------------------------------
// TODO 8: Kontrolle
// ---------------------------------------------------------------------------
//
// Zählen allein genügt nicht – die Zahl wäre auch dann richtig, wenn in jeder
// Zeile Unsinn stünde. Deshalb lesen wir beide Ranglisten zurück.
//
// Die Abfrage ist dieselbe wie beim Hitzesommer, nur filtert sie nach dimension
// statt nach city_id. Aus genau diesem SELECT wird in Block E der
// JSON-Endpunkt.

$total = $pdo->query('SELECT COUNT(*) FROM shark_rankings')->fetchColumn();
echo "In shark_rankings stehen jetzt {$total} Zeilen.\n\n";

$topThree = $pdo->prepare(
    'SELECT rank_position, category, incidents
     FROM shark_rankings
     WHERE dimension = ?
     ORDER BY rank_position
     LIMIT 3'
);

foreach (['shark_category', 'activity_group'] as $dimension) {
    echo $dimension . ":\n";

    $topThree->execute([$dimension]);

    foreach ($topThree->fetchAll() as $entry) {
        echo '  ' . $entry['rank_position'] . '. '
            . $entry['category'] . "\t"
            . $entry['incidents'] . " Vorfälle\n";
    }
}

// Dieselbe Kontrolle für die zweite Tabelle. Hier lohnt sich das Zurücklesen
// besonders: Die drei Spalten, die null sein dürfen, sieht man erst jetzt.
//
// COALESCE ersetzt beim Lesen ein NULL durch einen Text. Das ist Kosmetik für
// diese Ausgabe – in der Tabelle steht weiterhin NULL, und das JSON in Block E
// bekommt weiterhin null.

$total = $pdo->query('SELECT COUNT(*) FROM shark_countries')->fetchColumn();
$withIso = $pdo->query('SELECT COUNT(*) FROM shark_countries WHERE iso3 IS NOT NULL')->fetchColumn();

echo "\nIn shark_countries stehen jetzt {$total} Zeilen, davon {$withIso} mit Ländercode.\n";

$topCountries = $pdo->query(
    'SELECT country,
            COALESCE(iso3, "–") AS iso3,
            incidents,
            COALESCE(top_species, "keine Art bestimmt") AS top_species,
            COALESCE(top_activity, "keine Angabe") AS top_activity
     FROM shark_countries
     ORDER BY incidents DESC, country
     LIMIT 3'
);

foreach ($topCountries->fetchAll() as $entry) {
    echo '  ' . $entry['country'] . ' (' . $entry['iso3'] . ")\t"
        . $entry['incidents'] . " Vorfälle\t"
        . $entry['top_species'] . ' / ' . $entry['top_activity'] . "\n";
}
