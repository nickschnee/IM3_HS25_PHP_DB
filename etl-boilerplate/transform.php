<?php
/**
 * TRANSFORM – Projektvorlage
 *
 * Vor dem Code:
 * 1. Datenfrage in TRANSFORM.md präzisieren.
 * 2. Festlegen, was eine Ergebniszeile beschreibt.
 * 3. Filter-, Mapping-, Ableitungs- und Aggregationsregeln dokumentieren.
 * 4. Datenvertrag mit Feldnamen, Typen und Beispieldatensatz vereinbaren.
 * 5. Audit-Zahlen festlegen: Input, Ausschlüsse, Output, Unbekannt.
 *
 * KI darf bei der Implementation helfen. Neue Regeln oder Kategorien werden
 * aber zuerst im Transform-Plan ergänzt und anschliessend an Rohwerten geprüft.
 */

$rawData = include __DIR__ . '/extract.php';

$audit = [
    'input_rows' => count($rawData),
    'excluded_rows' => 0,
    'unknown_values' => 0,
    'output_rows' => 0,
];

$transformedRows = [];

foreach ($rawData as $rawRow) {
    // 1. Filtern: Gehört dieser Datensatz zu unserer Frage?

    // 2. Normalisieren: Welche Rohwerte meinen dasselbe?

    // 3. Auswählen/umbenennen: Nur Felder aus dem Datenvertrag übernehmen.

    // 4. Ableiten oder aggregieren: Nur wenn die Datenfrage es verlangt.

    // $transformedRows[] = [
    //     'target_field' => $rawRow['source_field'],
    // ];
}

$audit['output_rows'] = count($transformedRows);

// Für Load wird ein PHP-Array zurückgegeben – noch kein JSON und kein echo.
return [
    'data' => $transformedRows,
    'audit' => $audit,
];
