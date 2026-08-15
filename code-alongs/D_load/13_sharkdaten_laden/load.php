<?php
/**
 * Code-Along 13: Shark-Ranglisten laden (Load)
 *
 * Dasselbe wie beim Hitzesommer, mit anderen Daten:
 *
 *   Extract -> Transform -> LOAD -> Datenbank
 *
 * Drei Unterschiede lohnen den zweiten Durchgang:
 * - Zwei Tabellen ohne Fremdschlüssel – sie hängen nicht aneinander.
 * - Ein Feld des Datenvertrags heisst in der Tabelle anders (rank).
 * - Eine UNIQUE-Regel macht doppelte Zeilen unmöglich.
 *
 * Der Transform liefert zwei verschieden geformte Listen, und jede bekommt
 * ihre eigene Tabelle:
 *
 *   $result['data']       17 Ranking-Zeilen   -> shark_rankings
 *   $result['countries']  120 Länderzeilen    -> shark_countries
 *
 * Vorher:
 * - config.php im Hauptordner ausgefüllt;
 * - BEIDE Tabellen aus schema.sql in phpMyAdmin angelegt.
 */

// TODO 1: Ausgabe als reinen Text anzeigen lassen.

// TODO 2: config.php aus dem Hauptordner einbinden.
//         Von hier aus sind das drei Ordner nach oben.

// TODO 3: Das Ergebnis des Transforms holen und die beiden Listen
//         herausnehmen: data und countries.
//         Frage: Warum wandern questions, rules und limits nicht mit in die
//         Datenbank?

// TODO 4: Verbindung aufbauen.

// TODO 5: Beide Tabellen leeren, damit ein zweiter Aufruf nicht verdoppelt.

// TODO 6: Die Ranking-Zeilen schreiben. Aufpassen beim Feld rank: In der
//         Tabelle heisst die Spalte rank_position.

// TODO 7: Die Länderzeilen schreiben. Dasselbe Muster – einmal prepare(),
//         dann execute() in der Schleife.
//         Frage: Was passiert mit iso3, wenn der Wert null ist?

// TODO 8: Kontrolle – Zeilen zählen, pro Rangliste die ersten drei Plätze und
//         zusätzlich die drei Länder mit den meisten Vorfällen wieder aus der
//         Datenbank lesen.
