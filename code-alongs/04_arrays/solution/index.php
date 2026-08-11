<?php
/**
 * Code-Along 04: Arrays (Lösung)
 *
 * Zuerst speichern wir mehrere Temperaturen, danach einen strukturierten
 * Messwert und schliesslich mehrere Orte mit ihren Temperaturen.
 * PHP nutzen wir nur als API: keine HTML-Ausgabe, nur echo/var_dump.
 */

// PHP dient hier als Datenlieferant, nicht als Webseite. Der Header sorgt für
// reine Textausgabe im Browser. (In Block B wird daraus eine JSON-API:
// json_encode + application/json.)
header('Content-Type: text/plain; charset=utf-8');

// 1. Indexiertes Array mit 18.9, 19.4 und 20.1 anlegen.
$temperatures = [18.9, 19.4, 20.1];

// 2. Den zweiten Wert mit echo ausgeben. Achtung: Der erste Index ist 0.
echo 'Zweiter Wert: ' . $temperatures[1] . " °C\n";

// 3. Einen weiteren Wert 20.3 am Ende ergänzen.
$temperatures[] = 20.3;

// 4. Einen Messwert als assoziatives Array anlegen.
$measurement = [
    'location' => 'Bern',
    'temperature_c' => 19.4,
    'measured_at' => '10:00',
];

// 5. Ort und Temperatur über ihre Schlüssel ausgeben.
echo $measurement['location'] . ': ' . $measurement['temperature_c'] . " °C\n";

// 6. Mehrere Orte mit ihrer Wassertemperatur in einem assoziativen Array
//    speichern. Der Schlüssel ist der Ort, der Wert die Temperatur.
$stations = [
    'Bern'   => 19.4,
    'Brienz' => 16.8,
    'Thun'   => 18.2,
];

// 7. Einen einzelnen Ort gezielt über seinen Schlüssel ausgeben.
echo 'Aare in Thun: ' . $stations['Thun'] . " °C\n";

// 8. Einen weiteren Ort ergänzen.
$stations['Interlaken'] = 17.5;

// 9. Mit einer Bedingung prüfen, ob das Wasser in Bern angenehm warm ist.
if ($stations['Bern'] >= 18) {
    echo "Baden in Bern: angenehm.\n";
} else {
    echo "Baden in Bern: eher frisch.\n";
}

// 10. Das ganze assoziative Array mit var_dump untersuchen.
var_dump($stations);
