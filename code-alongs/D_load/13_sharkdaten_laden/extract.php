<?php
/**
 * Extract – fertig aus Block B.
 *
 * Kopfzeile lesen, leere Zeilen überspringen, jede übrige Zeile als
 * assoziatives Array zurückgeben. An dieser Datei ändert sich heute nichts.
 */

$handle = fopen(__DIR__ . '/data/attacks.csv', 'r');

if ($handle === false) {
    throw new RuntimeException('attacks.csv konnte nicht geöffnet werden.');
}

$header = array_map('trim', fgetcsv($handle, null, ',', '"', ''));
$attacks = [];

while (($row = fgetcsv($handle, null, ',', '"', '')) !== false) {
    if (($row[0] ?? '') === '' || count($row) !== count($header)) {
        continue;
    }

    $attacks[] = array_combine($header, $row);
}

fclose($handle);

return $attacks;
