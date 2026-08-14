# Ablauf `12_hitzesommer_laden`

> **Ziel:** Die 258 transformierten Zeilen aus Block C stehen in zwei Tabellen
> in der eigenen Datenbank – und bleiben auch nach dem zehnten Aufruf 258.
> Richtwert: 70 Minuten.

## Ausgangslage

Extract und Transform sind fertig und liegen unverändert im Ordner. Neu gebaut
wird heute nur `load.php`.

```text
Extract  ->  Transform  ->  LOAD  ->  Datenbank
 fertig      fertig         heute
```

Der Unterschied zu allen bisherigen Code-Alongs: Diese Datei gibt nichts
zurück. Ihr Ergebnis sieht man nicht in der Ausgabe, sondern in phpMyAdmin.

## Vor dem Code (15')

### Das Datenmodell ansehen

`schema.sql` gemeinsam lesen, bevor jemand etwas ausführt. Drei Fragen an die
Klasse:

1. Was bedeutet eine Zeile in `heat_summers`? (Eine Stadt in einem Sommer –
   genau die Untersuchungseinheit aus dem Transform.)
2. Warum stehen die Städte in einer eigenen Tabelle? («Bern» stünde sonst
   86-mal da, und ein Tippfehler erfände eine vierte Stadt.)
3. Woher weiss die Datenbank, welche Zeile zu welcher Stadt gehört?
   (`city_id`, der Fremdschlüssel.)

Danach das Ergebnis des Transforms neben das Schema halten: Jedes Feld des
Datenvertrags findet sich als Spalte wieder. Das ist die Kernaussage des
Blocks.

### Tabellen anlegen

`schema.sql` in phpMyAdmin im Reiter «SQL» ausführen. Beide Tabellen erscheinen
leer in der Übersicht. Wer will, klickt sie stattdessen im Reiter «Struktur»
zusammen – das Ergebnis ist dasselbe.

Die Tabelle `measurements` aus dem Code-Along davor darf stehen bleiben oder
gelöscht werden; sie war eine Wegwerf-Tabelle.

## Schritte im Code (35')

`load.php` enthält acht TODO-Marken. Der Reihe nach:

1. `header('Content-Type: text/plain; charset=utf-8')` – `load.php` ist ein
   Werkzeug, keine Webseite.
2. `require __DIR__ . '/../../../config.php';` – dieselbe Datei wie im
   Code-Along davor.
3. `$result = include __DIR__ . '/transform.php';` und daraus `$result['data']`
   nehmen. Kurz benennen, warum `rules` und `audit` nicht in die Datenbank
   wandern: Sie beschreiben die Daten, sie sind keine.
4. Verbindung im `try`-Block aufbauen – wortgleich wie in Code-Along 11.
5. **Suchen, sonst anlegen:** `$findCity->execute([$city])`, `fetchColumn()`,
   bei `=== false` die Stadt einfügen und `lastInsertId()` nehmen. Die Nummer in
   `$cityIds` merken.
6. `$pdo->exec('DELETE FROM heat_summers')` vor die Schleife setzen.
7. `prepare()` vor der Schleife, `execute()` darin – 258-mal.
8. Kontrolle: `SELECT COUNT(*)` und pro Stadt die letzten drei Sommer wieder
   auslesen.

Bei Schritt 5 lohnt sich eine Zwischenfrage: Warum steht die Prüfung
`isset($cityIds[$city])` ganz oben in der Schleife? Ohne sie liefe die Abfrage
258-mal statt dreimal – dieselbe Idee wie `prepare()` vor der Schleife.

Bei Schritt 6 zuerst die Frage stellen, dann den Code schreiben: In Code-Along
11 standen beim zweiten Aufruf acht statt vier Zeilen. Wie verhindert man das?
Meist kommen beide Antworten aus dem Raum – Stand neu schreiben oder `UNIQUE`
plus `INSERT IGNORE`. Wir bauen das erste Muster und begründen, warum es hier
erlaubt ist: Open-Meteo liefert 1940 bis heute jederzeit erneut.

## Kontrolle (10')

- `load.php` im Browser aufrufen: Die Seite meldet 258 geschriebene Zeilen und
  zeigt pro Stadt die drei jüngsten Sommer. Es gibt hier keine `index.php` –
  das Ladeskript ist die Seite.
- In phpMyAdmin nachsehen: `cities` hat drei Zeilen, `heat_summers` hat 258.
  Dieser Doppelblick ist der eigentliche Test.
- **`load.php` ein zweites Mal aufrufen.** Es bleiben 258 Zeilen. Genau das war
  im Code-Along davor noch anders.
- Zum Schluss die Probe aufs Exempel: In `transform.php` die Schwelle
  `$hotDayThresholdC` auf 25 setzen, neu laden, in phpMyAdmin nachsehen. Die
  Zahlen ändern sich, die Struktur nicht. Danach zurückstellen.

## Gesprächspunkte

- **Der Datenvertrag ist das Datenmodell:** Wer im Transform entschieden hat,
  was eine Zeile bedeutet, hat die Tabelle bereits entworfen.
- **Wie kurz die Schleife ist:** In Schritt 7 wird nichts mehr umgerechnet oder
  umbenannt. Muss eine Gruppe hier noch rechnen, gehört das in den Transform.
  Das ist eine gute Diagnose für die Projektarbeit.
- **Ein Ladeskript muss mehrmals laufen können:** Beim Entwickeln ruft man
  `load.php` zwanzigmal auf. Der Verdopplungsfehler meldet sich nie von selbst,
  die Zahlen sehen nur plötzlich doppelt so hoch aus.
- **Welches Muster passt zum eigenen Projekt?** Die Frage hängt allein daran, ob
  die Quelle die Vergangenheit noch einmal liefern kann. Gruppen mit einer
  Live-Sammlung legen das heute fest.
- **`DELETE` löscht ohne Rückfrage:** Hier ist es Absicht. Verlässliche
  Reihenfolge sonst: erst als `SELECT` mit derselben Bedingung ausprobieren,
  dann das `SELECT` ersetzen.
- **Die `id` zählt weiter:** Nach dem Leeren beginnt die nächste Zeile nicht
  wieder bei 1. Das ist kein Fehler – die `id` ist eine Kennung und keine
  Nummerierung.
- **Der Ausblick auf Block E:** Die Kontrollabfrage am Schluss liest die Stadt
  noch nicht mit, sondern fragt pro Stadt einzeln nach. Beides in einer Abfrage
  zu verbinden heisst `JOIN` und kommt im Unload dazu – dort wird aus genau
  diesem `SELECT` der JSON-Endpunkt.

## Häufige Fehler

| Meldung | Ursache |
| --- | --- |
| `Base table or view not found` | `schema.sql` wurde noch nicht ausgeführt |
| `Cannot add or update a child row` | `city_id` zeigt auf eine Stadt, die es nicht gibt |
| `Invalid parameter number` | Schlüssel im `execute()`-Array passen nicht zu den Platzhaltern |
| `Column cannot be null` | Ein Feld heisst im Transform anders als in der Tabelle |
| `Access denied` | falsche Zugangsdaten in `config.php` |
