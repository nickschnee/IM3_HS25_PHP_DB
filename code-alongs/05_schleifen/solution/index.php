<?php
/**
 * Code-Along 05: Schleifen (Lösung)
 *
 * Die Daten sind vorbereitet. Wir schreiben die Ausgabe nur einmal und lassen
 * foreach sie für jede Messung wiederholen. Kein HTML: PHP liefert hier nur
 * Daten, wir prüfen sie mit echo und var_dump.
 */

// PHP dient hier als Datenlieferant, nicht als Webseite. Mit diesem Header
// zeigt der Browser die Ausgabe als reinen Text, die Zeilenumbrüche bleiben.
header('Content-Type: text/plain; charset=utf-8');

// 1. Vorbereitete Liste strukturierter Messungen.
$measurements = [
    ['time' => '08:00', 'temperature_c' => 18.9],
    ['time' => '10:00', 'temperature_c' => 19.4],
    ['time' => '12:00', 'temperature_c' => 20.1],
    ['time' => '14:00', 'temperature_c' => 20.3],
];

// 2. Einen fünften Datensatz ergänzen. Wichtig: Die foreach-Ausgabe unten
//    muss dafür nicht angepasst werden.
$measurements[] = ['time' => '16:00', 'temperature_c' => 20.0];

// 3. Mit foreach jede Messung durchlaufen und pro Messung eine Zeile ausgeben.
foreach ($measurements as $measurement) {
    echo $measurement['time'] . ': ' . $measurement['temperature_c'] . " °C\n";
}

// 4. Zur Kontrolle die ganze Struktur mit var_dump untersuchen.
var_dump($measurements);
