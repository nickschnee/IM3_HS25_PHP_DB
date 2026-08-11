<?php
/**
 * Code-Along 07: Eigener JSON-Endpunkt
 *
 * Aus den drei heruntergeladenen Dateien bauen wir EINEN JSON-Endpunkt.
 * Wir geben nicht 31'000 Tageswerte pro Stadt aus, sondern wählen pro Jahr
 * den Höchstwert aus - das ist die eigentliche "Hitzesommer"-Kurve.
 *
 * Datenvertrag (so sieht ein Eintrag aus):
 *   { "stadt": "Bern", "jahr": 2022, "temperatur_max": 34.6 }
 */

// Welche Stadt steckt in welcher Datei?
$staedte = [
    'Bern'   => 'data/bern.json',
    'Zürich' => 'data/zuerich.json',
    'Chur'   => 'data/chur.json',
];

// Hier sammeln wir die fertigen Einträge aller Städte.
$messungen = [];

// Über jede Stadt gehen: Datei lesen, Jahres-Höchstwerte bilden, sammeln.
foreach ($staedte as $stadt => $pfad) {

    // 1. Datei einlesen und in ein PHP-Array umwandeln (wie in CA 06).


    // 2. Die beiden parallelen Listen holen (time / temperature_2m_max).


    // 3. Pro Jahr den höchsten Wert finden.
    //    Tipp: Jahr = (int) substr($datum, 0, 4). In einem Array
    //    $maxProJahr[$jahr] jeweils den grösseren Wert behalten.


    // 4. Aus $maxProJahr Einträge nach Datenvertrag bauen und an $messungen
    //    anhängen: ['stadt' => $stadt, 'jahr' => $jahr, 'temperatur_max' => $wert]

}

// 5. Als JSON-Endpunkt ausgeben: passenden Header setzen und json_encode nutzen.
