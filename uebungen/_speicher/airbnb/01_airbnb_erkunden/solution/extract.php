<?php
/**
 * Vorbereiteter Extract für die Airbnb-Übungen.
 *
 * Gleiches Muster wie der CSV-Extract aus Block B: Kopfzeile lesen, leere
 * Zeilen überspringen, jede übrige Zeile als assoziatives Array zurückgeben.
 *
 * Erwartet die heruntergeladene Datei unter data/listings.csv.
 */

$path = __DIR__ . '/data/listings.csv';

if (!is_file($path)) {
    throw new RuntimeException(
        'data/listings.csv fehlt. Lade die Datei zuerst von insideairbnb.com herunter.'
    );
}

$handle = fopen($path, 'r');

if ($handle === false) {
    throw new RuntimeException('data/listings.csv konnte nicht geöffnet werden.');
}

$header = array_map('trim', fgetcsv($handle, null, ',', '"', ''));
$listings = [];

while (($row = fgetcsv($handle, null, ',', '"', '')) !== false) {
    if (($row[0] ?? '') === '' || count($row) !== count($header)) {
        continue;
    }

    $listings[] = array_combine($header, $row);
}

fclose($handle);

return $listings;
