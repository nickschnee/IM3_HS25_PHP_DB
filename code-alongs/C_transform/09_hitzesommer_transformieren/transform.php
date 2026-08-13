<?php
/**
 * Code-Along 09: Hitzesommer transformieren – Startcode
 *
 * Frage:
 * Wie hat sich die Anzahl Hitzetage pro meteorologischem Sommer in Bern,
 * Chur und Zürich seit 1940 verändert?
 *
 * Unsere Entscheide:
 * - Sommer = Juni, Juli, August
 * - Hitzetag = Tagesmaximum >= 30 °C
 * - eine Ergebniszeile = eine Stadt in einem vollständigen Sommer
 * - vollständig = 92 Messwerte
 */

$rawLocations = include __DIR__ . '/extract.php';

$summerMonths = [6, 7, 8];
$hotDayThresholdC = 30.0;
$expectedDaysPerSummer = 92;

// Diese Zähler machen Datenverluste sichtbar.
$audit = [
    'input_days' => 0,
    'outside_summer' => 0,
    'invalid_measurements' => 0,
    'incomplete_summers' => 0,
    'output_rows' => 0,
];

$byCityAndYear = [];

$transformedRows = [];
$audit['output_rows'] = count($transformedRows);

return [
    'question' => 'Wie hat sich die Anzahl Hitzetage pro Sommer verändert?',
    'data' => $transformedRows,
    'audit' => $audit,
];
