<?php
// Diese Datei ist keine Webseite, sondern eine kleine API: Sie soll reinen
// Text ausgeben, kein HTML. Überlege, wie du dem Browser sagst, dass die
// Antwort Text ist (Stichwort: Content-Type-Header) - und setze ihn hier.

$measurements = [
    ['day' => 'Montag', 'temperature_c' => 18.9],
    ['day' => 'Dienstag', 'temperature_c' => 19.1],
    ['day' => 'Mittwoch', 'temperature_c' => 19.4],
    ['day' => 'Donnerstag', 'temperature_c' => 19.8],
    ['day' => 'Freitag', 'temperature_c' => 20.1],
    ['day' => 'Samstag', 'temperature_c' => 20.3],
    ['day' => 'Sonntag', 'temperature_c' => 20.0],
];

// 1. Mit foreach über $measurements laufen, aktuellen Datensatz $measurement nennen.
// 2. Pro Durchlauf mit echo eine Zeile mit day und temperature_c ausgeben.
// 3. Schleife schliessen.
