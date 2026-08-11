<?php
/**
 * Code-Along 06: JSON lesen
 *
 * Wir öffnen eine heruntergeladene JSON-Datei (Höchsttemperaturen Bern seit
 * 1940), verwandeln sie in ein PHP-Array und schauen uns die Struktur an.
 * Kein HTML: PHP prüft hier nur Daten und gibt reinen Text aus.
 */

// Diese Datei ist eine kleine API: reine Textausgabe. Setze den passenden
// Content-Type-Header (Text), damit die Zeilenumbrüche im Browser bleiben.


// 1. Die Datei data/bern.json als Text (String) einlesen.
//    Tipp: file_get_contents('data/bern.json')


// 2. Den JSON-Text in ein PHP-Array umwandeln.
//    Tipp: json_decode($json, true)  -- das "true" ist wichtig!


// 3. Zur Orientierung die obersten Schlüssel ansehen.
//    Tipp: array_keys($data) und array_keys($data['daily'])


// 4. Die zwei parallelen Listen holen:
//    - Datumsangaben:      $data['daily']['time']
//    - Höchsttemperaturen: $data['daily']['temperature_2m_max']


// 5. Die ersten 5 Tage ausgeben (for-Schleife, Index 0 bis 4):
//    z. B. "1940-01-01: -0.7 °C"


// 6. Den höchsten je gemessenen Wert finden und ausgeben (Tipp: max()).
