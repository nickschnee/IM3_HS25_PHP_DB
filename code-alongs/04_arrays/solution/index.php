<?php
/**
 * Code-Along 04: Arrays (Lösung)
 *
 * Zuerst speichern wir mehrere Temperaturen, danach einen strukturierten
 * Messwert mit benannten Feldern.
 */

// 1. Indexiertes Array mit 18.9, 19.4 und 20.1 anlegen.
$temperatures = [18.9, 19.4, 20.1];

// 2. Den zweiten Wert ausgeben. Achtung: Der erste Index ist 0.
echo '<h1>Zweiter Wert: ' . $temperatures[1] . ' °C</h1>';

// 3. Einen weiteren Wert 20.3 am Ende ergänzen.
$temperatures[] = 20.3;

// 4. Einen Messwert als assoziatives Array anlegen.
$measurement = [
    'location' => 'Bern',
    'temperature_c' => 19.4,
    'measured_at' => '10:00',
];

// 5. Ort und Temperatur über ihre Schlüssel ausgeben.
echo '<p>' . $measurement['location'] . ': ';
echo $measurement['temperature_c'] . ' °C</p>';

echo '<h2>Debugging</h2>';
echo '<pre>';
print_r($measurement);
echo '</pre>';
