<?php
/**
 * Code-Along 12: Hitzesommer laden (Load)
 *
 * Der letzte Schritt der Kette, bevor die Daten liegen bleiben:
 *
 *   Extract -> Transform -> LOAD -> Datenbank
 *
 * extract.php und transform.php sind fertig und kommen aus den Blöcken davor.
 * Neu ist nur diese Datei: Sie nimmt die 258 transformierten Zeilen und
 * schreibt sie über PDO in die Datenbank.
 *
 * Vorher:
 * - config.php im Hauptordner ausgefüllt (steht seit Code-Along 11);
 * - beide Tabellen aus schema.sql in phpMyAdmin angelegt.
 */

// TODO 1: Ausgabe als reinen Text anzeigen lassen.
//         load.php ist ein Werkzeug, keine Webseite.

// TODO 2: config.php aus dem Hauptordner einbinden.
//         Von hier aus sind das drei Ordner nach oben.

// TODO 3: Das Ergebnis des Transforms holen und die Datenzeilen herausnehmen.
//         transform.php gibt ein Array mit question, rules, data und audit
//         zurück – schreiben wollen wir nur data.

// TODO 4: Verbindung aufbauen, wie in Code-Along 11.

// TODO 5: Für jede Stadt die id suchen, sonst die Stadt anlegen.
//         Die gefundenen Nummern in $cityIds merken, damit die Abfrage
//         dreimal läuft und nicht 258-mal.

// TODO 6: heat_summers leeren, damit ein zweiter Aufruf nicht verdoppelt.

// TODO 7: Alle Zeilen schreiben: prepare() vor der Schleife, execute() darin.

// TODO 8: Kontrolle – Zeilen zählen und pro Stadt die letzten drei Sommer
//         wieder aus der Datenbank lesen.
