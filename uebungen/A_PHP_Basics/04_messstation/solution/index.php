<?php
// PHP als kleine API: reine Textausgabe, kein HTML.
header('Content-Type: text/plain; charset=utf-8');

$station = [
    'name' => 'Schönau',
    'river' => 'Aare',
    'is_active' => true,
];

// Name und Fluss über ihre Schlüssel ausgeben.
echo $station['name'] . ' an der ' . $station['river'] . "\n";

// Das ganze Array untersuchen (Typ und Struktur).
var_dump($station);
