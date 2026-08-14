<?php
/**
 * Code-Along 15: Shark-Ranglisten ausliefern (Unload)
 *
 * Dasselbe wie beim Hitzesommer, mit anderen Daten:
 *
 *   Datenbank -> UNLOAD -> JSON -> Chart.js
 *
 * Drei Unterschiede lohnen den zweiten Durchgang:
 * - Es gibt nur eine Tabelle, also keinen JOIN.
 * - Eine Spalte heisst in der Tabelle anders als im Datenvertrag – diesmal
 *   müssen wir in die andere Richtung übersetzen als beim Laden.
 * - Der Filter kennt genau zwei gültige Werte. Ein dritter ist kein leeres
 *   Ergebnis, sondern eine falsche Frage.
 *
 * Vorher:
 * - config.php im Hauptordner ausgefüllt;
 * - Daten in der Datenbank (Code-Along 13, load.php einmal aufrufen).
 *
 * Das Ziel ist der Datenvertrag aus dem Transform:
 *
 *   [
 *     {"dimension": "shark_category", "rank": 1,
 *      "category": "White shark", "incidents": 426}
 *   ]
 */

// --- Baustein 1: Verbinden --------------------------------------------------

// TODO 1: Die Antwort als JSON ankündigen.

// TODO 2: config.php einbinden und die Verbindung aufbauen.

// --- Baustein 2: Lesen ------------------------------------------------------

// TODO 3: Die Abfrage schreiben: die vier Felder des Datenvertrags, sortiert
//         nach Rangliste und Platz.
//         Achtung: Die Spalte heisst rank_position, im Datenvertrag heisst
//         das Feld rank. Wo übersetzen wir das diesmal?

// TODO 4: Abfrage ausführen und alle Zeilen als PHP-Array holen.

// --- Baustein 3: Antworten --------------------------------------------------

// TODO 5: Die Typen festlegen: rank und incidents sind Zahlen.

// TODO 6: Das Array als JSON ausgeben.

// --- Baustein 4: Filtern ----------------------------------------------------

// TODO 7: Den optionalen Filter ?dimension=shark_category lesen und die
//         Abfrage ergänzen. Ohne Parameter kommen beide Ranglisten.

// TODO 8: Einen unbekannten Wert abweisen, bevor die Abfrage überhaupt läuft.
//         Frage an die Klasse: Warum ist ?dimension=fische etwas anderes als
//         ?city=Atlantis beim Hitzesommer?
