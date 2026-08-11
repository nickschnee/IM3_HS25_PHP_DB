<?php
/**
 * Code-Along 03: Bedingungen
 *
 * Eine einfache, bewusst subjektive Regel bewertet die Wassertemperatur.
 * PHP nutzen wir nur als API: keine HTML-Ausgabe, nur echo/var_dump.
 */

// Diese Datei ist keine Webseite, sondern eine kleine API: Sie soll reinen
// Text ausgeben, kein HTML. Überlege, wie du dem Browser sagst, dass die
// Antwort Text ist (Stichwort: Content-Type-Header) - und setze ihn hier.

function classifyTemperature($temperatureC)
{
    // 1. Unter 16 °C: "kalt"

    // 2. Unter 20 °C: "frisch"

    // 3. Ab 20 °C: "warm"

}

$temperatureC = 19.4;
$label = '';

// 4. Funktion aufrufen und Resultat in $label speichern.


// 5. Temperatur und Bewertung mit echo ausgeben.
