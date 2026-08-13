<?php
/**
 * Code-Along 09: Daten aus einer Live-API holen
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

// 1. Die API-URL für Bern zusammenbauen: stündliche Temperatur, 1 Tag (heute).
//    Basis:      https://api.open-meteo.com/v1/forecast
//    Parameter:  latitude=46.948  longitude=7.447  hourly=temperature_2m
//                forecast_days=1  timezone=Europe/Zurich


// 2. Mit fetchJson($url) die Daten holen (Rückgabe = PHP-Array).


// 3. Struktur ansehen: welche Schlüssel gibt es unter 'hourly'?


// 4. Die zwei parallelen Listen holen:
//    $data['hourly']['time'] und $data['hourly']['temperature_2m'].


// 5. Alle 24 Stunden mit einer for-Schleife ausgeben: Zeit + Temperatur.
