<?php
/**
 * Code-Along 03: Bedingungen
 *
 * Eine einfache, bewusst subjektive Regel bewertet die Wassertemperatur.
 */

function classifyTemperature($temperatureC)
{
    // 1. Unter 16 °C: "kalt"

    // 2. Unter 20 °C: "frisch"

    // 3. Ab 20 °C: "warm"

}

$temperatureC = 19.4;
$label = '';

// 4. Funktion aufrufen und Resultat in $label speichern.

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Temperaturbewertung</title>
</head>
<body>
  <h1><?php echo $temperatureC; ?> °C</h1>
  <p>Unsere vereinfachte Bewertung: <?php echo $label; ?></p>
</body>
</html>
