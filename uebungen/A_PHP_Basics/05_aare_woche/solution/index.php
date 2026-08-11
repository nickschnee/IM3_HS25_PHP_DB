<?php
// PHP als kleine API: reine Textausgabe, kein HTML.
header('Content-Type: text/plain; charset=utf-8');

$measurements = [
    ['day' => 'Montag', 'temperature_c' => 18.9],
    ['day' => 'Dienstag', 'temperature_c' => 19.1],
    ['day' => 'Mittwoch', 'temperature_c' => 19.4],
    ['day' => 'Donnerstag', 'temperature_c' => 19.8],
    ['day' => 'Freitag', 'temperature_c' => 20.1],
    ['day' => 'Samstag', 'temperature_c' => 20.3],
    ['day' => 'Sonntag', 'temperature_c' => 20.0],
];

// Jede Messung durchlaufen und eine Zeile ausgeben.
foreach ($measurements as $measurement) {
    echo $measurement['day'] . ': ' . $measurement['temperature_c'] . " °C\n";
}
