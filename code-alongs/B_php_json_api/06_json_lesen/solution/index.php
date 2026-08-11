<?php
/**
 * Code-Along 06: JSON lesen (Lösung)
 *
 * Wir öffnen eine heruntergeladene JSON-Datei (Höchsttemperaturen Bern seit
 * 1940), verwandeln sie in ein PHP-Array und schauen uns die Struktur an.
 * Kein HTML: PHP prüft hier nur Daten und gibt reinen Text aus.
 */

// PHP dient hier als Datenlieferant, nicht als Webseite. Mit diesem Header
// zeigt der Browser die Ausgabe als reinen Text.
header('Content-Type: text/plain; charset=utf-8');

// 1. Die Datei als Text (String) einlesen.
$json = file_get_contents('data/bern.json');

// 2. JSON-Text -> PHP-Array. Das zweite Argument "true" liefert assoziative
//    Arrays (mit Schlüsseln), nicht Objekte.
$data = json_decode($json, true);

// 3. Oberste Struktur ansehen: Was steckt drin?
echo 'Schlüssel ganz oben: ' . implode(', ', array_keys($data)) . "\n";
echo "Schlüssel in 'daily': " . implode(', ', array_keys($data['daily'])) . "\n\n";

// 4. Die zwei parallelen Listen. Wichtig: time[0] gehört zu
//    temperature_2m_max[0], time[1] zu temperature_2m_max[1] usw.
$dates = $data['daily']['time'];
$temps = $data['daily']['temperature_2m_max'];
echo 'Anzahl Tage insgesamt: ' . count($dates) . "\n\n";

// 5. Die ersten 5 Tage ausgeben.
for ($i = 0; $i < 5; $i++) {
    echo $dates[$i] . ': ' . $temps[$i] . " °C\n";
}

// 6. Der höchste je gemessene Wert.
echo "\nHöchster Wert seit 1940: " . max($temps) . " °C\n";
