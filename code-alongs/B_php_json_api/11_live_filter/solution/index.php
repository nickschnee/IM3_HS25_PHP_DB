<?php
/**
 * Code-Along 11: Live-Endpunkt filtern mit $_GET (Lösung)
 *
 *   Frontend  ->  ?stadt=bern  ->  unser PHP-Endpunkt   (das ist $_GET)
 *
 * Braucht Internet.
 */

// --- Aus CA 10 (schon fertig): Live-Daten aller Städte holen ----------------
function fetchJson(string $url): array {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    return json_decode($response, true);
}

$staedte = [
    'Bern'   => ['lat' => 46.948, 'lon' => 7.447],
    'Zürich' => ['lat' => 47.377, 'lon' => 8.541],
    'Chur'   => ['lat' => 46.851, 'lon' => 9.532],
];

$messungen = [];
foreach ($staedte as $stadt => $koord) {
    $url = 'https://api.open-meteo.com/v1/forecast'
         . '?latitude=' . $koord['lat'] . '&longitude=' . $koord['lon']
         . '&hourly=temperature_2m&forecast_days=1&timezone=Europe/Zurich';
    $data   = fetchJson($url);
    $zeiten = $data['hourly']['time'];
    $temps  = $data['hourly']['temperature_2m'];
    for ($i = 0; $i < count($zeiten); $i++) {
        $messungen[] = ['stadt' => $stadt, 'zeit' => $zeiten[$i], 'temperatur' => $temps[$i]];
    }
}
// --- Ende CA 10 -------------------------------------------------------------

// 1. Filter aus der URL lesen.
$filter = $_GET['stadt'] ?? '';

// 2. Nur reduzieren, wenn ein Filter gesetzt ist.
if ($filter !== '') {
    $gefiltert = [];
    foreach ($messungen as $m) {
        if (strtolower($m['stadt']) === strtolower($filter)) {
            $gefiltert[] = $m;
        }
    }
    $messungen = $gefiltert; // kann leer sein -> []
}

// 3. Ausgabe.
header('Content-Type: application/json; charset=utf-8');
echo json_encode($messungen, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
