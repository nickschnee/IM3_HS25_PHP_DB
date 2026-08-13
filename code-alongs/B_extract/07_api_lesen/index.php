<?php
/**
 * Code-Along 07: Daten aus einer Live-API holen (Extract)
 *
 * Bisher kamen die Daten aus einer DATEI. Jetzt holen wir sie LIVE aus dem
 * Internet - direkt von der Open-Meteo-API. Wir fragen die stündlichen
 * Temperaturen für HEUTE ab.
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

