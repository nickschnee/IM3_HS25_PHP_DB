<?php
/**
 * Code-Along 11: Datenbank testen (Load) – Lösung
 *
 * Der erste Kontakt mit der eigenen Datenbank. Wir bauen die Verbindung auf,
 * schreiben ein paar Messwerte hinein und lesen sie wieder heraus.
 * Kein Datensatz, kein ETL – nur die Frage: Funktioniert die Verbindung?
 */

// PHP dient hier als Prüfwerkzeug, nicht als Webseite. Mit diesem Header zeigt
// der Browser die Ausgabe als reinen Text.
header('Content-Type: text/plain; charset=utf-8');

// ---------------------------------------------------------------------------
// 1. Zugangsdaten laden
// ---------------------------------------------------------------------------
//
// config.php liegt im Hauptordner des Kurses und gilt für alle Übungen. Von
// hier aus sind das vier Ordner nach oben – ein Ordner mehr als in der Fassung
// daneben, weil diese Datei zusätzlich in solution/ liegt.
//
// Das '..' kennt ihr aus CSS und HTML: ein Ordner zurück.

require __DIR__ . '/../../../../config.php';

// ---------------------------------------------------------------------------
// 2. Verbindung aufbauen
// ---------------------------------------------------------------------------
//
// new PDO(...) baut die Verbindung auf. Klappt das nicht, wirft PDO eine
// Exception – der try/catch fängt sie und zeigt eine lesbare Meldung.

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    echo "Verbindung steht.\n\n";
} catch (PDOException $e) {
    exit('Verbindung fehlgeschlagen: ' . $e->getMessage() . "\n");
}

// ---------------------------------------------------------------------------
// 3. Einen einzelnen Messwert schreiben
// ---------------------------------------------------------------------------
//
// Die Namen mit Doppelpunkt sind Platzhalter. Der Wert kommt erst bei execute()
// dazu und wird deshalb nie Teil des SQL-Texts.
//
// date('Y-m-d H:i:s') liefert den aktuellen Zeitpunkt in der Schreibweise, die
// MySQL für DATETIME erwartet: 2026-08-14 15:42:07.

$insert = $pdo->prepare(
    'INSERT INTO measurements (location, temperature_c, measured_at)
     VALUES (:location, :temperature_c, :measured_at)'
);

$insert->execute([
    'location' => 'Chur',
    'temperature_c' => 21.4,
    'measured_at' => date('Y-m-d H:i:s'),
]);

// lastInsertId() gibt die Nummer zurück, die die Datenbank gerade vergeben hat.
echo 'Eine Zeile geschrieben, sie hat die id ' . $pdo->lastInsertId() . ".\n\n";

// ---------------------------------------------------------------------------
// 4. Mehrere Messwerte in einer Schleife schreiben
// ---------------------------------------------------------------------------
//
// prepare() steht oben und lief genau einmal. execute() läuft jetzt für jede
// Zeile. Genau dieses Muster braucht später load.php – dort mit 258 Zeilen
// statt mit dreien.

$messwerte = [
    ['location' => 'Bern', 'temperature_c' => 19.8],
    ['location' => 'Zürich', 'temperature_c' => 20.6],
    ['location' => 'Chur', 'temperature_c' => 22.1],
];

foreach ($messwerte as $messwert) {
    $insert->execute([
        'location' => $messwert['location'],
        'temperature_c' => $messwert['temperature_c'],
        'measured_at' => date('Y-m-d H:i:s'),
    ]);
}

echo count($messwerte) . " weitere Zeilen geschrieben.\n\n";

// ---------------------------------------------------------------------------
// 5. Alles wieder auslesen
// ---------------------------------------------------------------------------
//
// query() reicht hier, weil in diesem SQL kein einziger eigener Wert steckt.
// Sobald ein Wert hineinkommt, gilt wieder prepare() und execute().
//
// fetchAll() liefert alle Zeilen als PHP-Array. Mehr dazu im nächsten Block,
// wenn aus genau diesem SELECT der JSON-Endpunkt wird.

$rows = $pdo->query(
    'SELECT id, location, temperature_c, measured_at
     FROM measurements
     ORDER BY id'
)->fetchAll();

echo 'In der Tabelle stehen jetzt ' . count($rows) . " Zeilen:\n";

foreach ($rows as $row) {
    echo $row['id'] . "\t"
        . $row['measured_at'] . "\t"
        . $row['location'] . "\t"
        . $row['temperature_c'] . " °C\n";
}
