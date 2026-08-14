<?php
/**
 * Code-Along 13: Shark-Ranglisten laden (Load)
 *
 * Dasselbe wie beim Hitzesommer, mit anderen Daten:
 *
 *   Extract -> Transform -> LOAD -> Datenbank
 *
 * Drei Unterschiede lohnen den zweiten Durchgang:
 * - Hier genügt eine Tabelle, es gibt keinen Fremdschlüssel.
 * - Ein Feld des Datenvertrags heisst in der Tabelle anders (rank).
 * - Eine UNIQUE-Regel macht doppelte Zeilen unmöglich.
 *
 * Vorher:
 * - config.php im Hauptordner ausgefüllt;
 * - Tabelle aus schema.sql in phpMyAdmin angelegt.
 */

// TODO 1: Ausgabe als reinen Text anzeigen lassen.

// TODO 2: config.php aus dem Hauptordner einbinden.
//         Von hier aus sind das drei Ordner nach oben.

// TODO 3: Das Ergebnis des Transforms holen und die Datenzeilen herausnehmen.
//         Frage: Warum wandern questions, rules und limits nicht mit in die
//         Datenbank?

// TODO 4: Verbindung aufbauen.

// TODO 5: Tabelle leeren, damit ein zweiter Aufruf nicht verdoppelt.

// TODO 6: Alle Zeilen schreiben. Aufpassen beim Feld rank: In der Tabelle
//         heisst die Spalte rank_position.

// TODO 7: Kontrolle – Zeilen zählen und pro Rangliste die ersten drei
//         Plätze wieder aus der Datenbank lesen.
