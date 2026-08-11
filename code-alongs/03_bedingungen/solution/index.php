<?php
/**
 * Code-Along 03: Bedingungen (Lösung)
 *
 * Eine einfache, bewusst subjektive Regel bewertet die Wassertemperatur.
 * PHP nutzen wir nur als API: keine HTML-Ausgabe, nur echo/var_dump.
 */

// PHP dient hier als Datenlieferant, nicht als Webseite. Der Header sorgt für
// reine Textausgabe im Browser. (In Block B wird daraus eine JSON-API:
// json_encode + application/json.)
header('Content-Type: text/plain; charset=utf-8');

function classifyTemperature($temperatureC)
{
    // 1. Unter 16 °C: "kalt"
    if ($temperatureC < 16) {
        return 'kalt';
    // 2. Unter 20 °C: "frisch"
    } elseif ($temperatureC < 20) {
        return 'frisch';
    // 3. Ab 20 °C: "warm"
    } else {
        return 'warm';
    }
}

$temperatureC = 19.4;

// 4. Funktion aufrufen und Resultat in $label speichern.
$label = classifyTemperature($temperatureC);

// 5. Temperatur und Bewertung mit echo ausgeben.
echo "$temperatureC °C: $label\n";
