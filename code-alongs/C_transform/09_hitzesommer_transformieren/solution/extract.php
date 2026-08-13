<?php
/**
 * Vorbereiteter Extract für Code-Along 09 – Lösung.
 *
 * Inhaltlich identisch mit ../extract.php. Der Ordner solution/ bringt seinen
 * eigenen Extract mit, damit solution/transform.php Zeile für Zeile mit eurem
 * transform.php vergleichbar ist. Die JSON-Dateien liegen weiterhin nur einmal
 * im Ordner data/.
 */

$sources = [
    'Bern' => __DIR__ . '/../data/bern.json',
    'Chur' => __DIR__ . '/../data/chur.json',
    'Zürich' => __DIR__ . '/../data/zuerich.json',
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
