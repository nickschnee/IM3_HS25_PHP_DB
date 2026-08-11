<?php
/**
 * Code-Along 04: Arrays
 *
 * Zuerst speichern wir mehrere Temperaturen, danach einen strukturierten
 * Messwert und schliesslich mehrere Orte mit ihren Temperaturen.
 * PHP nutzen wir nur als API: keine HTML-Ausgabe, nur echo/var_dump.
 */

// PHP dient hier als Datenlieferant, nicht als Webseite. Der Header sorgt für
// reine Textausgabe im Browser. (In Block B wird daraus eine JSON-API:
// json_encode + application/json.)
header('Content-Type: text/plain; charset=utf-8');

// 1. Indexiertes Array mit 18.9, 19.4 und 20.1 anlegen.
$temperatures = [];

// 2. Den zweiten Wert mit echo ausgeben. Achtung: Der erste Index ist 0.


// 3. Einen weiteren Wert 20.3 am Ende ergänzen.


// 4. Einen Messwert als assoziatives Array anlegen.
$measurement = [];

// 5. Ort und Temperatur über ihre Schlüssel ausgeben.


// 6. Mehrere Orte mit ihrer Wassertemperatur in einem assoziativen Array
//    speichern. Der Schlüssel ist der Ort, der Wert die Temperatur.
$stations = [];

// 7. Einen einzelnen Ort gezielt über seinen Schlüssel ausgeben.


// 8. Einen weiteren Ort ergänzen (z. B. Interlaken mit 17.5).


// 9. Mit einer Bedingung prüfen, ob das Wasser in Bern angenehm warm ist
//    (>= 18 °C: "angenehm", sonst "eher frisch").


// 10. Das ganze assoziative Array mit var_dump untersuchen.
var_dump($stations);
