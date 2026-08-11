# Ablauf für Studierende

## Tagesstruktur

1. **Input + ausprobieren:** kurze Theorie, dann Code-Along oder Übung.
2. **Projektspur:** Gelerntes auf die eigene Datenfrage übertragen.
3. **Abschluss:** Ergebnis sichern, Meilenstein zeigen.

## Legende

`📕` Theorie / Slides `🧑‍🏫` Code-Along `💻` Digitale Übung
`📝` Analoge Übung `🛠️` Tooling / Projektarbeit `🔎` Story & Recherche
`✅` Meilenstein

## Ablauf nach Tagen

### Tag 1 – Kickoff, Gruppen & Setup

1. `📕` Kickoff `45'`
2. `🔎` Gruppen bilden `45'`
3. `🛠️` Tooling & Server `60'`
4. `🧑‍🏫` Code-Along: [00 Hallo PHP](code-alongs/A_PHP_Basics/00_hallo_php) `30'`
5. `✅` M1: Gruppen gebildet

#### Zusatzmaterial (Tag 1)

- `🛠️` [00 Lokaler PHP-Server](theorie/00_lokaler_php_server) – eigenen Server
  auf Mac/Windows starten

### Tag 2 – Block A: PHP Basics

1. `📕` Theorie A `60'`
2. `🧑‍🏫` Code-Along: [01 Variablen](code-alongs/A_PHP_Basics/01_variablen) `25'`
3. `🧑‍🏫` Code-Along: [02 Funktionen](code-alongs/A_PHP_Basics/02_funktionen) `25'`
4. `🧑‍🏫` Code-Along: [03 Bedingungen](code-alongs/A_PHP_Basics/03_bedingungen) `25'`
5. `🧑‍🏫` Code-Along: [04 Arrays](code-alongs/A_PHP_Basics/04_arrays) `25'`
6. `🧑‍🏫` Code-Along: [05 Schleifen](code-alongs/A_PHP_Basics/05_schleifen) `25'`
7. `💻` Digitale Übung: [06 Städtevergleich](uebungen/A_PHP_Basics/06_staedtevergleich) `45'`
8. `📝` Analoge Übung: [Messwertmaschine](stift-und-papier/01_messwertmaschine) `35'`
9. `🔎` Eigene Datenfrage formulieren `60'`
10. `✅` M2: Datenfrage formuliert

#### Zusatzmaterial

Optionale Übungen (Block A)

- `💻` [01 Messwert](uebungen/A_PHP_Basics/01_messwert)
- `💻` [02 Badewetter](uebungen/A_PHP_Basics/02_badewetter)
- `💻` [03 Warnstufe](uebungen/A_PHP_Basics/03_warnstufe)
- `💻` [04 Messstation](uebungen/A_PHP_Basics/04_messstation)
- `💻` [05 Aare-Woche](uebungen/A_PHP_Basics/05_aare_woche)

### Tag 3 – Block B: JSON & Datenquellen

> Thema ab hier: **Hitzesommer** – Höchsttemperaturen in Chur, Bern und Zürich.
> Aus Datenlisten wird ein JSON-Endpunkt.

1. `💻` Digitale Übung: [01 Daten finden & herunterladen](uebungen/B_php_json_api/01_daten_finden) `45'`
2. `📕` Array → JSON (`json_encode`, `application/json`) `30'`
3. `🧑‍🏫` Eigenen JSON-Endpunkt bauen `35'`
4. `🧑‍🏫` Endpunkt mit `$_GET` nach Ort filtern `30'`
5. `🔎` Datenquellen recherchieren & prüfen (inkl. Fallback) `60'`
6. `✅` **M3: Datensatz gefunden**

<!--

### Tag 4 – Block C: Datenbanken & Datenjournalismus

> Tooling DB, SQL, ERM Light, Gast-Input.

1. `🛠️` DB-Zugang, `config.php`, Verbindung testen `60'`
2. `📕` SQL-Grundlagen: Tabelle, Zeile, Spalte, Schlüssel `45'`
3. `📝` Messwerte als ERM Light planen `45'`
4. `🔎` Input Pascal Alisser (Datenjournalismus) `120'`
5. `🔎` Datenfrage & Quelle prüfen `45'`

### Tag 5 – Block C: PDO & CRUD

1. `📕` PDO-Verbindung & CRUD (`SELECT`/`INSERT`/`UPDATE`/`DELETE`) `90'`
2. `💻` Messwert speichern, lesen, ändern, löschen `60'`
3. `🔎` Datenvertrag entwerfen (Felder + Beispiel-JSON) `60'`

### Tag 6 – Block D: Extract, Transform, Load

1. `🧑‍🏫` Extract mit `fetchJson()` oder Datei `60'`
2. `🧑‍🏫` Transform: säubern, umbenennen, normalisieren `60'`
3. `🧑‍🏫` Load: mit PDO in die DB schreiben `60'`
4. `📝` Eigene ETL-Pipeline skizzieren `35'`
5. `🔎` Eigene Quelle testen & Mock-JSON vereinbaren `90'`

### Tag 7 – Block D+E: Unload & Chart.js

1. `🧑‍🏫` `unload.php`: `SELECT` → JSON `70'`
2. `💻` Endpunkt filtern, leere Resultate behandeln `40'`
3. `📕` Diagrammtyp zur Aussage wählen `35'`
4. `🧑‍🏫` Erster Chart.js-Chart + `fetch()` `90'`

### Tag 8 – UX & Projektwerkstatt

> Flexibler UX-Slot, Platzierung noch offen.

1. `📕` UX-Input `50'`
2. `🛠️` Betreute Projektarbeit im Team `120'`

### Tag 9 – Integration & Feature-Freeze

1. `🛠️` Backend + Frontend integrieren `120'`
2. `💻` Testen: Fehler, leere Daten, Pfade, Browser `60'`
3. `🛠️` Fallback (JSON/CSV/DB) testen `45'`
4. `🔎` Story prüfen: Titel, Aussage, Quelle, Limitationen `45'`
5. `✅` **M4: Erste Integration steht**

### Tag 10 – Marktstand & Abgabe

1. `🛠️` Aufbau & Technik-Check `45'`
2. `🔎` Marktstand: Story & Visualisierung zeigen `120'`
3. `📕` Abgabe: Code, README, Quellen, Limitationen `45'`
4. `✅` **M5: Marktstand & Abgabe**

-->
