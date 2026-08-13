<?php
/**
 * Code-Along 08: CSV lesen (Extract) – Lösung
 *
 * Quelle -> PHP-Array von Datensätzen, diesmal aus einer CSV-Datei.
 */

header('Content-Type: text/plain; charset=utf-8');

// 1. CSV-Datei zum Lesen öffnen.
$handle = fopen('data/sharks.csv', 'r');

// 2. Kopfzeile (Spaltennamen) einzeln lesen.
//    Die Argumente ',' '"' '' sind die Standardwerte; wir geben sie explizit
//    an, damit PHP keine Deprecation-Warnung zeigt.
$header = fgetcsv($handle, null, ',', '"', '');

// 3. Alle weiteren Zeilen lesen. array_combine verbindet Spaltennamen mit den
//    Werten der Zeile -> ein assoziatives Array pro Angriff.
$attacks = [];
while (($row = fgetcsv($handle, null, ',', '"', '')) !== false) {
    $attacks[] = array_combine($header, $row);
}



// 4. Datei schliessen und Struktur prüfen.
fclose($handle);
echo 'Spalten: ' . implode(', ', $header) . "\n";
echo 'Anzahl Angriffe: ' . count($attacks) . "\n\n";

// 5. Die ersten 5 Angriffe ausgeben.
for ($i = 0; $i < 5; $i++) {
    $a = $attacks[$i];
    echo $a['year'] . ': ' . $a['country'] . ' – ' . $a['activity']
        . ' (' . $a['species'] . ")\n";
}
