<?php
/**
 * Vorbereiteter Extract für Code-Along 09.
 *
 * Die drei JSON-Dateien wurden in Block B bereits eingelesen. Dieser Schritt
 * gibt die Rohdaten nur als PHP-Array weiter. Transformiert wird erst in
 * transform.php.
 */

$sources = [
    'Bern' => __DIR__ . '/data/bern.json',
    'Chur' => __DIR__ . '/data/chur.json',
    'Zürich' => __DIR__ . '/data/zuerich.json',
];

$rawLocations = [];

foreach ($sources as $city => $file) {
    $json = file_get_contents($file);
    $rawLocations[] = [
        'city' => $city,
        'source' => json_decode($json, true, 512, JSON_THROW_ON_ERROR),
    ];
}

return $rawLocations;
