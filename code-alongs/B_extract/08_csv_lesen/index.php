<?php
/**
 * Code-Along 08: CSV lesen (Extract)
 *
 * Dritte Extract-Quelle: eine CSV-Datei. Wir lesen das Shark-Attack-Dataset
 * ein und verwandeln jede Zeile in ein assoziatives Array. Kein Endpunkt, kein
 * Filter - nur lesen. PHP gibt hier reinen Text aus.
 *
 * Gleiche Idee wie bei JSON und Live-API: Quelle -> PHP-Array von Datensätzen.
 */

// PHP als Datenleser: reine Textausgabe.
header('Content-Type: text/plain; charset=utf-8');

// 1. Die CSV-Datei zum Lesen öffnen.
//    Tipp: fopen('data/sharks.csv', 'r')


// 2. Die erste Zeile ist die Kopfzeile mit den Spaltennamen. Sie einzeln lesen.
//    Tipp: fgetcsv($handle, null, ',', '"', '')
//    (die letzten Argumente sind Standardwerte und verhindern eine PHP-Warnung)


// 3. Alle weiteren Zeilen in einer while-Schleife lesen und mit
//    array_combine($header, $row) in ein assoziatives Array pro Angriff
//    umwandeln. Alle in $attacks sammeln.


// 4. Datei schliessen (fclose) und die Struktur prüfen:
//    Spaltennamen und Anzahl Angriffe ausgeben.


// 5. Die ersten 5 Angriffe ausgeben, z. B. Jahr, Land und Aktivität.
