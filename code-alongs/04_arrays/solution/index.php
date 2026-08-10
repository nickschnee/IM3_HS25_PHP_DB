<?php
/**
 * Code-Along 04: Arrays (Lösung)
 *
 * Zuerst speichern wir mehrere Temperaturen, danach einen strukturierten
 * Messwert und schliesslich mehrere Orte mit ihren Temperaturen.
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

// 6. Mehrere Orte mit ihrer Wassertemperatur in einem assoziativen Array
//    speichern. Der Schlüssel ist der Ort, der Wert die Temperatur.
$stations = [
    'Bern'   => 19.4,
    'Brienz' => 16.8,
    'Thun'   => 18.2,
];

// 7. Einen einzelnen Ort gezielt über seinen Schlüssel ausgeben.
echo '<p>Aare in Thun: ' . $stations['Thun'] . ' °C</p>';

// 8. Einen weiteren Ort ergänzen.
$stations['Interlaken'] = 17.5;

// 9. Mit einer Bedingung prüfen, ob das Wasser in Bern angenehm warm ist.
if ($stations['Bern'] >= 18) {
    echo '<p>Baden in Bern: angenehm.</p>';
} else {
    echo '<p>Baden in Bern: eher frisch.</p>';
}

// 10. Das ganze assoziative Array mit print_r untersuchen.
echo '<h2>Debugging</h2>';
echo '<pre>';
print_r($stations);
echo '</pre>';
