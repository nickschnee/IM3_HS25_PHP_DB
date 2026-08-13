<?php
/**
 * Code-Along 10: Live-Endpunkt für alle drei Städte (Lösung)
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

// Stadt -> Koordinaten.
$staedte = [
    'Bern'   => ['lat' => 46.948, 'lon' => 7.447],
    'Zürich' => ['lat' => 47.377, 'lon' => 8.541],
    'Chur'   => ['lat' => 46.851, 'lon' => 9.532],
];

$messungen = [];

foreach ($staedte as $stadt => $koord) {

    // 1. API-URL für diese Stadt.
    $url = 'https://api.open-meteo.com/v1/forecast'
         . '?latitude=' . $koord['lat'] . '&longitude=' . $koord['lon']
         . '&hourly=temperature_2m&forecast_days=1&timezone=Europe/Zurich';

    // 2. Live-Daten holen.
    $data = fetchJson($url);

    // 3. Parallele Listen.
    $zeiten = $data['hourly']['time'];
    $temps  = $data['hourly']['temperature_2m'];

    // 4. Pro Stunde einen Eintrag nach Datenvertrag.
    for ($i = 0; $i < count($zeiten); $i++) {
        $messungen[] = [
            'stadt'      => $stadt,
            'zeit'       => $zeiten[$i],
            'temperatur' => $temps[$i],
        ];
    }
}

// 5. Als JSON-Endpunkt ausgeben.
header('Content-Type: application/json; charset=utf-8');
echo json_encode($messungen, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
