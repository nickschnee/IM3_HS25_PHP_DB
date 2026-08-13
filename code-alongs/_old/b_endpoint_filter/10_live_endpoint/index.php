<?php
/**
 * Code-Along 10: Live-Endpunkt für alle drei Städte
 *
 * Wie CA 07, aber die Daten kommen live von der API statt aus Dateien.
 * Wir holen für Bern, Zürich und Chur die Stundentemperaturen von heute und
 * geben sie als EIN JSON-Endpunkt aus.
 *
 * Datenvertrag: { "stadt": "Bern", "zeit": "2026-08-13T12:00", "temperatur": 28 }
 *
 * Braucht Internet.
 */

// Vorbereiteter Helfer (wie CA 09).
function fetchJson(string $url): array {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    return json_decode($response, true);
}

// Stadt -> Koordinaten. Damit können wir alle drei gleich behandeln.
$staedte = [
    'Bern'   => ['lat' => 46.948, 'lon' => 7.447],
    'Zürich' => ['lat' => 47.377, 'lon' => 8.541],
    'Chur'   => ['lat' => 46.851, 'lon' => 9.532],
];

$messungen = [];

foreach ($staedte as $stadt => $koord) {

    // 1. Die API-URL für diese Stadt zusammenbauen (Koordinaten einsetzen).


    // 2. Mit fetchJson($url) die Live-Daten holen.


    // 3. Die parallelen Listen holen (hourly.time / hourly.temperature_2m).


    // 4. Pro Stunde einen Eintrag nach Datenvertrag an $messungen anhängen:
    //    ['stadt' => $stadt, 'zeit' => ..., 'temperatur' => ...]

}

// 5. Als JSON-Endpunkt ausgeben (Header + json_encode).
