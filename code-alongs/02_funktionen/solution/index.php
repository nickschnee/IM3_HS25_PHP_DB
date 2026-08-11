<?php
/**
 * Code-Along 02: Funktionen (Lösung)
 *
 * Dieselbe Meldung soll für verschiedene Orte funktionieren.
 * PHP nutzen wir nur als API: keine HTML-Ausgabe, nur echo/var_dump.
 */

// PHP dient hier als Datenlieferant, nicht als Webseite. Der Header sorgt für
// reine Textausgabe im Browser. (In Block B wird daraus eine JSON-API:
// json_encode + application/json.)
header('Content-Type: text/plain; charset=utf-8');

// 1. Funktion formatMeasurement mit drei Parametern deklarieren.
// 2. In der Funktion eine Meldung mit return zurückgeben.
function formatMeasurement($location, $temperatureC, $measuredAt)
{
    return "Aare in $location: $temperatureC °C um $measuredAt Uhr.";
}

// 3. Funktion für Bern aufrufen, Rückgabewert speichern und mit echo ausgeben.
$bernMessage = formatMeasurement('Bern', 19.4, '10:00');
echo $bernMessage . "\n";

// 4. Funktion ein zweites Mal für Brienz aufrufen und ausgeben.
$brienzMessage = formatMeasurement('Brienz', 16.8, '10:00');
echo $brienzMessage . "\n";
