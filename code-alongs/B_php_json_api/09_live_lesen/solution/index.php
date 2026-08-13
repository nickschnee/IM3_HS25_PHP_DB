<?php
/**
 * Code-Along 09: Daten aus einer Live-API holen (Lösung)
 *
 *   unser PHP-Skript  ->  HTTP-GET (cURL)  ->  externe API
 *
 * Braucht Internet.
 */

// Vorbereiteter Helfer: holt eine URL und gibt die JSON-Antwort als PHP-Array
// zurück. Diesen cURL-Code musst du NICHT auswendig können - nur benutzen.
function fetchJson(string $url): array {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    return json_decode($response, true);
}

header('Content-Type: text/plain; charset=utf-8');

// 1. Die API-URL für Bern (stündliche Temperatur, heute).
$url = 'https://api.open-meteo.com/v1/forecast'
     . '?latitude=46.948&longitude=7.447'
     . '&hourly=temperature_2m&forecast_days=1&timezone=Europe/Zurich';

// 2. Live holen -> PHP-Array.
$data = fetchJson($url);

// 3. Struktur ansehen.
echo "Schlüssel in 'hourly': " . implode(', ', array_keys($data['hourly'])) . "\n\n";

// 4. Die beiden parallelen Listen.
$zeiten = $data['hourly']['time'];
$temps  = $data['hourly']['temperature_2m'];

// 5. Alle Stunden ausgeben.
for ($i = 0; $i < count($zeiten); $i++) {
    echo $zeiten[$i] . ': ' . $temps[$i] . " °C\n";
}
