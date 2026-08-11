<?php
/**
 * Code-Along 05: Schleifen
 *
 * Die Daten sind vorbereitet. Wir schreiben die Ausgabe nur einmal und lassen
 * foreach sie für jede Messung wiederholen. Kein HTML: PHP liefert hier nur
 * Daten, wir prüfen sie mit echo und var_dump.
 */

// Diese Datei ist keine Webseite, sondern eine kleine API: Sie soll reinen
// Text ausgeben, kein HTML. Überlege, wie du dem Browser sagst, dass die
// Antwort Text ist (Stichwort: Content-Type-Header) - und setze ihn hier.

// 1. Vorbereitete Liste strukturierter Messungen.
$measurements = [
    ['time' => '08:00', 'temperature_c' => 18.9],
    ['time' => '10:00', 'temperature_c' => 19.4],
    ['time' => '12:00', 'temperature_c' => 20.1],
    ['time' => '14:00', 'temperature_c' => 20.3],
];

// 2. Einen fünften Datensatz ergänzen. Die foreach-Ausgabe unten soll dafür
//    NICHT angepasst werden müssen.


// 3. Mit foreach jede Messung durchlaufen und pro Messung eine Zeile mit
//    time und temperature_c ausgeben (echo).


// 4. Zur Kontrolle die ganze Struktur mit var_dump untersuchen.

