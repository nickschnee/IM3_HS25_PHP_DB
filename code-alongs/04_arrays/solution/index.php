<?php
$temperatures = [18.9, 19.4, 20.1];

echo '<h1>Zweiter Wert: ' . $temperatures[1] . ' °C</h1>';

$temperatures[] = 20.3;

$measurement = [
    'location' => 'Bern',
    'temperature_c' => 19.4,
    'measured_at' => '10:00',
];

echo '<p>' . $measurement['location'] . ': ';
echo $measurement['temperature_c'] . ' °C</p>';

echo '<h2>Debugging</h2>';
echo '<pre>';
print_r($measurement);
echo '</pre>';
