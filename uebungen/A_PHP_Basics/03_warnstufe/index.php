<?php
// Diese Datei ist keine Webseite, sondern eine kleine API: Sie soll reinen
// Text ausgeben, kein HTML. Überlege, wie du dem Browser sagst, dass die
// Antwort Text ist (Stichwort: Content-Type-Header) - und setze ihn hier.

$waterLevelCm = 300;
$level = '';

// Unter 250: normal

// Unter 350: beobachten

// Alles andere: warnung


// Pegel und Stufe mit echo ausgeben.
