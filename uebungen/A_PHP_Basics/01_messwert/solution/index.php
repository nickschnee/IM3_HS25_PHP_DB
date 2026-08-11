<?php
// PHP als kleine API: reine Textausgabe, kein HTML.
header('Content-Type: text/plain; charset=utf-8');

// 1. Ort als Text speichern.
$location = 'Bern';

// 2. Temperatur als Kommazahl speichern.
$temperatureC = 19.4;

// 3. Uhrzeit als Text speichern.
$measuredAt = '10:00';

// 4. Meldung mit den drei Variablen zusammensetzen und mit echo ausgeben.
$message = "Aare in $location: $temperatureC °C um $measuredAt Uhr.";
echo $message . "\n";
