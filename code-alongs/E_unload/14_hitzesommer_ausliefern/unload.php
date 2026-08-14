<?php
/**
 * Code-Along 14: Hitzesommer ausliefern (Unload)
 *
 * Der Schritt nach ETL – der Weg zurück ins Frontend:
 *
 *   Datenbank -> UNLOAD -> JSON -> Chart.js
 *
 * Die 258 Zeilen stehen seit Code-Along 12 in den Tabellen cities und
 * heat_summers. Heute bauen wir die Datei, die sie wieder herausgibt: einen
 * JSON-Endpunkt, den das Frontend-Team mit fetch() aufrufen kann.
 *
 * Vorher:
 * - config.php im Hauptordner ausgefüllt (steht seit Code-Along 11);
 * - Daten in der Datenbank (Code-Along 12, load.php einmal aufrufen).
 *
 * Das Ziel ist der Datenvertrag. Genau diese Form, nichts anderes:
 *
 *   [
 *     {"city": "Bern", "year": 1940, "measurement_days": 92,
 *      "hot_days": 0, "max_temperature_c": 26.5}
 *   ]
 *
 * Wir bauen die vier Bausteine der Reihe nach und rufen die Datei nach jedem
 * Schritt im Browser auf:
 *
 *   1 Verbinden   2 Lesen   3 Antworten   4 Filtern
 */

// --- Baustein 1: Verbinden --------------------------------------------------

// TODO 1: Die Antwort als JSON ankündigen.
//         Der Header muss vor jeder Ausgabe stehen.

// TODO 2: config.php aus dem Hauptordner einbinden und die Verbindung
//         aufbauen. Von hier aus sind das drei Ordner nach oben.

// --- Baustein 2: Lesen ------------------------------------------------------

// TODO 3: Die Abfrage schreiben: nur die fünf Felder des Datenvertrags,
//         den Stadtnamen per JOIN aus cities, sortiert nach Jahr und Stadt.

// TODO 4: Abfrage ausführen und alle Zeilen als PHP-Array holen.

// --- Baustein 3: Antworten --------------------------------------------------

// TODO 5: Die Typen festlegen, bevor die Daten das Haus verlassen.
//         Eine Funktion nimmt eine Datenbankzeile und gibt einen Datensatz
//         nach Datenvertrag zurück.

// TODO 6: Das Array als JSON ausgeben – und sonst nichts.

// --- Baustein 4: Filtern ----------------------------------------------------

// TODO 7: Den optionalen Stadtfilter aus der URL lesen und die Abfrage
//         ergänzen: ?city=Bern liefert nur Bern, ohne Parameter kommen alle.
//         Der Wert gehört nie in den SQL-Text, sondern als Parameter dazu.

// TODO 8: Fehler abfangen und trotzdem als JSON antworten.
//         Interne Meldungen gehören ins Server-Log, nicht in die Antwort.
