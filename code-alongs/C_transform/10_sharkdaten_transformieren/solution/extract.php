<?php
/**
 * Vorbereiteter Extract für Code-Along 10 – Lösung.
 *
 * Inhaltlich identisch mit ../extract.php. Der Ordner solution/ bringt seinen
 * eigenen Extract mit, damit solution/transform.php Zeile für Zeile mit eurem
 * transform.php vergleichbar ist. Die CSV-Datei liegt weiterhin nur einmal im
 * Ordner data/.
 */

$handle = fopen(__DIR__ . '/../data/attacks.csv', 'r');

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
