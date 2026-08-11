<?php
/**
 * Code-Along 02: Funktionen
 *
 * Dieselbe Meldung soll für verschiedene Orte funktionieren.
 * PHP nutzen wir nur als API: keine HTML-Ausgabe, nur echo/var_dump.
 */

// PHP dient hier als Datenlieferant, nicht als Webseite. Der Header sorgt für
// reine Textausgabe im Browser. (In Block B wird daraus eine JSON-API:
// json_encode + application/json.)
header('Content-Type: text/plain; charset=utf-8');

// 1. Funktion formatMeasurement mit drei Parametern deklarieren.
// 2. In der Funktion eine Meldung mit return zurückgeben.


// 3. Funktion für Bern aufrufen, Rückgabewert speichern und mit echo ausgeben.
$bernMessage = '';


// 4. Funktion ein zweites Mal für Brienz aufrufen und ausgeben.
$brienzMessage = '';
