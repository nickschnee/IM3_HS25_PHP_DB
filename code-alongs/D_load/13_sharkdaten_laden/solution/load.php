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
 *
 * Kein Fremdschlüssel, keine zweite Tabelle: Bei 17 Zeilen und zwei
 * dimension-Werten wäre das mehr Aufwand als Nutzen.
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

echo 'Der Transform liefert ' . count($rows) . " Zeilen.\n";
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
echo $deleted . " alte Zeilen gelöscht.\n\n";

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

echo count($rows) . " Zeilen geschrieben.\n\n";

// ---------------------------------------------------------------------------
// TODO 7: Kontrolle
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
