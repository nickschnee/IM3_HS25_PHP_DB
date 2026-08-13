# Planung IM3 HS25 - PHP, Datenbanken, ETL und Datenstory

## Kontextnotizen

- Modul: Interaktive Medien 3.
- Hauptziel: Die Studierenden entwickeln in Vierergruppen ein datenjournalistisches Projekt.
- Gruppenlogik: Eine Vierergruppe teilt sich in zwei Zweierteams.
- Backend-Team: baut mit PHP einen einfachen ETL-Prozess auf einem PHP-Server.
- Frontend-Team: entwickelt Story, Datenvisualisierung und Chart.js-Frontend.
- Gemeinsames Produkt: Daten werden gesammelt oder importiert, transformiert, in einer Datenbank gespeichert, wieder als JSON ausgeliefert und in einer Story visualisiert.
- Abschluss: Am letzten Kurstag (Tag 10) stellen die Studierenden ihre
  Projekte an einem Marktstand aus. Die ausstellungsfähige Fassung sollte
  deshalb bis Ende Tag 9 stehen. Der neue 10-Tage-Ablauf sieht keinen
  separaten Halbtag mehr für Fertigstellung/Ausstellungstest vor; das muss bei
  Bedarf in Tag 9 oder in einem der flexiblen UX-Slots (Tag 8/9) eingeplant
  werden.
- Datenjournalismus und Storytelling laufen ab dem Kickoff als Begleitspur zur
  technischen Strecke. Recherche und Themenfindung beginnen nicht erst nach
  PHP, Datenbank und ETL.
- Neben Live-APIs, JSON- und CSV-Datensätzen kann eine Sensor-API als
  Datenquelle dienen. Die Studierenden konsumieren deren Daten und sehen dabei
  Sensorboxen, die sie eventuell in einem späteren Kurs selbst verwenden.
- Ausgangslage: Dieses Repo enthält Material vom letzten Semester. Es gibt bereits PHP-Cheatsheets, Code-Alongs und ein `etl-boilerplate`, aber noch keine durchgehende Kursstruktur wie im guten Referenzkurs `2026_im2_javascript-main`.
- Didaktische Herausforderung: PHP und Datenbanken sind fuer viele Studierende nicht intrinsisch attraktiv. Der Kurs muss deshalb kleinschrittig, klar geführt und stark projektbezogen sein.

## Zielbild

IM3 soll wie IM2 eine klare Materialstruktur erhalten:

- `README.md`: Einstieg, Lernziele, Repo-Orientierung, Projektziel.
- `dozierende/`: interne Planung, Ablauf und Materialinventar.
- `dozierende/ABLAUF.md`: Tages-/Wochenplan fuer Dozierende und LBAs.
- `cheatsheets/`: kurze Nachschlagewerke zu Syntax, PHP, DB, ETL, APIs und Chart.js.
- `code-alongs/`: gemeinsame Unterrichtsprojekte, nicht vollständig selbsterklärend.
- `uebungen/`: selbständig lösbare Übungen mit klaren Aufgabenstellungen und Lösungen.
- `stift-und-papier/`: Denk- und Planungsübungen ohne Code, besonders fuer Datenmodell, ETL-Planung und Story.
- `projekt/`: Briefing, Meilensteine, Rollen, Abgabe, Bewertung und Templates.
- `etl-boilerplate/`: produktionsnahes Starterkit fuer Gruppenprojekte.

## Bestehendes Material

### Bereits vorhanden

- PHP-Grundlagen:
  - `cheatsheets/00_was_ist_PHP.md`
  - `cheatsheets/01_variablen.md`
  - `cheatsheets/02_funktionen.md`
  - `cheatsheets/03_bedingungen.md`
  - `cheatsheets/04_arrays.md`
  - `cheatsheets/05_schleifen.md`
  - `cheatsheets/php-uebungen.md`
- JSON, API, DB:
  - `cheatsheets/08_array2json.md`
  - `cheatsheets/10__pdo.md`
  - `cheatsheets/10_db_read.md`
  - `cheatsheets/15__curl.md`
- ETL:
  - `cheatsheets/130_extract.md`
  - `cheatsheets/230_transform.md`
  - `cheatsheets/310_load.md`
  - `cheatsheets/550_unload.md`
  - `etl-boilerplate/extract.php`
  - `etl-boilerplate/transform.php`
  - `etl-boilerplate/load.php`
  - `etl-boilerplate/unload.php`
- Gemeinsame Code-Alongs:
  - Variablen, Funktionen, Bedingungen, Arrays, Schleifen
  - Array zu JSON
  - Datenbank lesen
  - API DB Read
  - API DB Read & Write

### Fehlend oder noch zu schwach

- Ein zentraler Ablaufplan wie `2026_im2_javascript-main/ABLAUF.md`.
- Eine saubere Übungsstruktur wie `2026_im2_javascript-main/uebungen/`.
- Eigenständige Übungen mit Aufgabenstellung im Code und Lösung.
- Analoge Übungen zur ETL-Planung, Datenmodellierung und Story-Idee.
- Ein Projektbriefing mit Rollen, Milestones und Definition of Done.
- Chart.js-Materialien und Frontend-Übungen.
- Datenjournalismus-/Storytelling-Inputs.
- Organisation und Briefing des zweistündigen Inputs von Pascal Alisser.
- Mehrere Extract-Varianten:
  - Live-API ueber Zeitraum sammeln
  - statisches JSON importieren
  - CSV importieren
  - Daten aus einer Sensor-API konsumieren
  - eigenes Dataset vorbereiten
- Gemeinsame Schnittstellenvereinbarung zwischen Backend- und Frontend-Team.

## Empfohlene Repo-Struktur

```txt
.
├── README.md
├── dozierende/
│   ├── PLANUNG.md
│   ├── UMSETZUNGSPLAN.md
│   ├── ABLAUF.md
│   └── MATERIAL_INVENTAR.md
├── cheatsheets/
├── theorie/
│   ├── A_PHP_Basics/
│   ├── B_extract/
│   ├── C_transform/
│   ├── D_load/
│   ├── E_unload/
│   └── F_chartjs/
│   # Datenjournalismus/Story laeuft als Begleitspur, kein eigener Theorieblock
├── code-alongs/
│   ├── A_PHP_Basics/         # 00_hallo_php … 05_schleifen
│   ├── B_extract/            # JSON-Datei, Live-API, CSV lesen
│   ├── C_transform/          # säubern, reduzieren, umbenennen
│   ├── D_load/               # PDO, INSERT
│   ├── E_unload/             # SELECT → JSON-Endpunkt + $_GET-Filter
│   └── F_chartjs/            # fetch() + erster Chart
├── uebungen/
│   ├── A_PHP_Basics/
│   ├── B_extract/
│   ├── C_transform/
│   ├── D_load/
│   ├── E_unload/
│   └── F_chartjs/
├── stift-und-papier/
│   ├── 01_etl_pipeline_skizzieren/
│   ├── 02_datenmodell/
│   ├── 03_story_angle/
│   ├── 04_api_contract/
│   └── 05_project_retrospective/
├── projekt/
│   ├── README.md
│   ├── brief.md
│   ├── milestones.md
│   ├── rollen.md
│   ├── bewertung.md
│   ├── datenquellen.md
│   ├── marktstand.md
│   └── api-contract-template.md
└── etl-boilerplate/
```

## Theorieblöcke

Das Rückgrat des Kurses ist die ETL+U-Kette. Jeder technische Block ist ein
Schritt darin:

```text
Extract (B) → Transform (C) → Load (D) → Datenbank → Unload (E) → Chart.js (F)
```

- **A. PHP Basics** – Sprache
- **B. Extract** – Daten lesen (JSON-Datei, Live-API, CSV) → PHP-Array
- **C. Transform** – Rohdaten säubern, reduzieren, umbenennen → Datenvertrag
- **D. Load** – DB-Tooling, PDO, `INSERT` (Daten in die Datenbank schreiben)
- **E. Unload** – PDO `SELECT` → JSON-Endpunkt bauen und mit `$_GET` filtern
- **F. Chart.js** – Frontend konsumiert den Unload-Endpunkt

Datenbanken/PDO sind kein eigener Block mehr, sondern werden dort eingeführt, wo
man sie braucht: `INSERT` in Load, `SELECT` in Unload. Datenjournalismus ist
ebenfalls kein nummerierter Block, sondern eine Begleitspur (siehe unten).

### A. PHP Basics

Ziel: Studierende können einfache PHP-Skripte lesen, ändern und schreiben.

Inhalte:

- Tooling und Server: PHP prüfen, Serverzugang einrichten, Projektordner und
  minimale PHP-Testdatei anlegen
- Was ist PHP, Server-Kontext, `<?php ?>`, `echo`
- Variablen und Datentypen
- Funktionen
- Bedingungen
- Arrays und assoziative Arrays
- Schleifen
- Debugging mit `var_dump`, Browserausgabe und Fehlermeldungen

Material:

- vorhandene Cheatsheets weiterverwenden
- vorhandene Code-Alongs weiterverwenden
- `uebungen/A_PHP_Basics/` neu aufbauen

Mögliche Übungen:

- `a_messwert`: Ort, Temperatur, Uhrzeit und Einheit als Variablen anlegen
  und als kleine Datenmeldung ausgeben.
- `b_badewetter`: Eine Funktion erhält eine Temperatur und gibt einen sehr
  einfachen Text zurück.
- `c_warnstufe`: Mit einer Bedingung aus einem Messwert eine Warnstufe machen.
- `d_messstation`: Eine Messstation als assoziatives Array beschreiben.
- `e_aare_woche`: Sieben vorbereitete Messwerte durchlaufen und ausgeben.

Die Übungen sollen bewusst extrem niederschwellig sein: kurze Aufgaben, ein
neues Konzept pro Schritt, sichtbares Ergebnis und vorbereitete Daten. Der
Datenbezug darf am Anfang inszeniert sein; es geht noch nicht um echte
Datenverarbeitung.

### B. Extract

Ziel: Studierende können dieselben Rohdaten aus **drei verschiedenen Quellen**
lesen und als PHP-Array bereitstellen. Die zentrale Einsicht:

```text
egal welche Quelle -> immer ein PHP-Array von Rohdatensätzen
```

Der Extract ändert sich, das Ergebnis bleibt gleich. Das Bauen und Filtern eines
Endpunkts gehört bewusst **nicht** hierher, sondern nach Unload (E).

Inhalte:

- Lokale JSON-Datei mit `file_get_contents` einlesen.
- JSON mit `json_decode(..., true)` in ein PHP-Array umwandeln.
- Eine externe JSON-/Live-API über den vorbereiteten Helfer `fetchJson($url)`
  abrufen und dekodieren.
- cURL als Technik hinter `fetchJson()` zeigen, die Optionen aber nicht
  vertiefen.
- Eine CSV-Datei mit `fgetcsv` zeilenweise einlesen und in Arrays umwandeln.
- Verstehen: Alle Varianten enden mit demselben Vertrag – ein PHP-Array. Das
  Säubern/Umformen kommt erst in Transform (C).

Wichtige Unterscheidung (bleibt für Unload wichtig):

```text
unser PHP-Skript -> cURL GET (fetchJson) -> externe API
```

`fetchJson` führt einen ausgehenden HTTP-GET-Request an eine fremde API aus.
(`$_GET` – Parameter, die unser eigener Endpunkt erhält – kommt in Unload.)

Datenquellen in diesem Block (roter Faden: Hitzesommer + Shark Attacks):

| Datenquelle | Zugriff in PHP | Beispiel im Kurs |
| --- | --- | --- |
| statische JSON-Datei | `file_get_contents` + `json_decode` | Open-Meteo-Download (Tageshöchst) |
| externe JSON-/Live-API | `fetchJson()` (cURL) + `json_decode` | Open-Meteo live (Stundenwerte) |
| CSV-Datei | `fopen`/`fgetcsv` | Shark-Attack-Dataset |
| Sensor-API | technisch wie externe JSON-API | nur einordnen |
| Google Sheets / eigenes Dataset | als CSV/JSON exportieren | nur einordnen |

Material:

- Übung `uebungen/B_extract/01_daten_finden` (Daten finden & herunterladen)
- Code-Alongs `code-alongs/B_extract/` (JSON lesen, Live lesen, CSV lesen)
- vorbereiteter Helfer `fetchJson($url)`
- `stift-und-papier/01_fetch_helper` (den Helfer auf Papier entschlüsseln)
- `cheatsheets/15__curl.md` als Hintergrund

Code-Alongs (je: lesen → PHP-Array, ohne Endpunkt):

- `06_json_lesen`: statische JSON-Datei lesen und Struktur verstehen.
- `07_api_lesen`: Live-API mit `fetchJson()` abrufen.
- `08_csv_lesen`: Shark-Attack-CSV mit `fgetcsv` in Arrays umwandeln.

Sensor-API, Google Sheets und eigene Datasets werden nur eingeordnet; sie folgen
technisch demselben Muster (Quelle → PHP-Array).

### C. Transform

Ziel: Studierende übersetzen ihre Datenfrage in begründete Transform-Regeln,
bringen die Rohdaten aus Block B in die vereinbarte Zielstruktur und können
zeigen, welche Daten dabei ausgeschlossen, zusammengefasst oder als unbekannt
behandelt wurden. Komplexer Code darf mit KI-Unterstützung entstehen; der Fokus
liegt auf fachlichen Entscheidungen, Datenvertrag und Audit.

Inhalte:

- Datenfrage präzisieren und zu starke Aussagen erkennen (Häufigkeit ist nicht
  automatisch Risiko oder Ursache).
- Untersuchungseinheit festlegen: Was beschreibt eine Zeile nach Transform?
- Filtern und auswählen: nur Datensätze und Felder behalten, die zur Frage
  gehören.
- Felder umbenennen und Werte normalisieren: Einheiten, Datentypen, Datums- und
  Zahlformate.
- Kategorien über dokumentierte Mappings vereinheitlichen; Reihenfolge und
  Grenzfälle bewusst prüfen.
- Werte ableiten und aggregieren, z. B. Hitzetage pro Stadt und Sommer.
- Fehlende oder unklare Werte als `null` behandeln, nicht raten.
- Datenverluste auditieren: Eingabe, Ausschlüsse pro Grund, Ausgabe, unbekannte
  Werte und Stichproben.
- KI mit einer Spezifikation aus Frage, Regeln, Beispielen, Datenvertrag und
  Audit beauftragen; Annahmen und Mappings anschliessend am Rohdatensatz prüfen.
- Ergebnis: eine Liste gleich aufgebauter Datensätze nach projektspezifischem
  Datenvertrag. Verschiedene Quellen innerhalb desselben Projekts müssen nach
  Transform denselben Vertrag erfüllen; Hitzesommer- und Shark-Projekt brauchen
  nicht dieselbe Struktur.

Die beiden Kursbeispiele zeigen bewusst unterschiedliche Fälle:

1. **Hitzesommer:** Für die Frage nach Hitzetagen pro Sommer nur Juni–August
   behalten, Hitzetag als Tagesmaximum ≥ 30 °C definieren, pro Stadt/Jahr
   aggregieren und unvollständige Sommer ausschliessen.
2. **Shark Attacks:** Die Fragen auf erfasste Vorfälle begrenzen, Zeitraum und
   Vorfalltyp festlegen, freie Art- und Aktivitätsangaben vorsichtig mappen und
   die Klassifikationsabdeckung sichtbar machen. Die Resultate sind keine
   Aussage über das Risiko einer Aktivität.

Material:

- `theorie/C_transform/README.md`
- `code-alongs/C_transform/09_hitzesommer_transformieren`
- `code-alongs/C_transform/10_sharkdaten_transformieren` inklusive
  `KI_PROMPT.md`
- `uebungen/C_transform/01_eigener_transform`
- `cheatsheets/230_transform.md`

Projektabgabe des Blocks: Jede Gruppe führt eine `TRANSFORM.md` mit Datenfrage,
Untersuchungseinheit, Regeln, Datenvertrag, Audit, bekannten Grenzen und einer
kurzen Dokumentation des KI-Einsatzes. Backend und Frontend nehmen den
Beispieldatensatz gemeinsam ab.

### D. Load

Ziel: Studierende können die transformierten Daten über PDO sicher in eine
MySQL-/MariaDB-Datenbank schreiben. Datenbanken und PDO werden hier eingeführt,
weil man sie zum Laden braucht.

Inhalte:

- DB-Tooling: Zugang, `config.php` und Verbindung testen.
- DB & SQL: Tabellen, Zeilen, Spalten, Datentypen, Primärschlüssel, Beziehungen.
- Datenmodell als ERM Light planen.
- PDO-Verbindung aufbauen.
- `INSERT` mit Prepared Statements: transformierte Datensätze speichern.
- Einfache Fehlerbehandlung.
- Optional: `UPDATE`/`DELETE` an Testdaten.

Material:

- `cheatsheets/10__pdo.md`
- `cheatsheets/310_load.md`
- `etl-boilerplate/load.php`

Mögliche Übungen:

- `a_connect`: Verbindung testen und eine einfache Meldung ausgeben.
- `b_insert_one`: Einen transformierten Datensatz mit Prepared Statement laden.
- `c_insert_many`: Eine ganze Liste in einer Schleife laden.
- `d_update_delete`: Optional – einen Testdatensatz ändern und löschen.

### E. Unload

Ziel: Studierende lesen die gespeicherten Daten per PDO wieder aus der Datenbank
und liefern sie als vereinbarten JSON-Endpunkt aus. Hier landet, was zuvor
fälschlich in Block B war: den Endpunkt bauen und mit `$_GET` filtern.

`Unload` ist nicht Teil des üblichen Begriffs ETL. Im Kurs bezeichnet er den
Schritt nach dem Laden: Daten aus der DB lesen und in der mit dem Frontend
vereinbarten JSON-Struktur ausgeben.

Die vollständige Kurspipeline:

```text
Datenquelle -> extract.php -> transform.php -> load.php
-> Datenbank -> unload.php -> JSON-Endpunkt -> Chart.js
```

Inhalte / technische Umsetzung:

- `unload.php` verbindet sich über PDO mit der Projektdatenbank.
- Ein `SELECT` liest nur die Felder, die das Frontend braucht.
- Datenbankzeilen werden in die vereinbarte JSON-Struktur gebracht.
- Header `Content-Type: application/json` setzen, mit `json_encode` ausgeben.
- Optionale Filter (Ort, Kategorie, Zeitraum) kommen über `$_GET` und werden mit
  Prepared Statements gebunden.
- Sortierung und sinnvolle Begrenzung im Query festlegen.
- Leere Resultate und Fehler liefern eine verständliche JSON-Antwort.
- Kein HTML und keine Debug-Ausgaben (`var_dump`) im Endpunkt.

Der Datenvertrag gilt auch für `unload.php`: Feldnamen, Typen und Struktur
müssen zum Mock-JSON des Frontends passen. Das Frontend ändert später nur die URL
von der Mock-Datei zum echten Endpunkt.

Material:

- `cheatsheets/550_unload.md`
- `etl-boilerplate/unload.php`
- Endpunkt- und `$_GET`-Filter-Code-Alongs (aus dem bisherigen Block B hierher
  übernommen)

Mögliche Übungen:

- `a_unload_all`: Daten mit PDO lesen und als JSON ausgeben.
- `b_unload_filter`: Mit `$_GET` nach Ort/Kategorie filtern (Prepared Statement).
- `c_empty_response`: Leere Resultate und Fehler sauber als JSON beantworten.

Hinweis zur Projektwahl und zum Fallback: Historische Datensätze bevorzugen;
reine Live-Sammlung nur, wenn bis zum Marktstand genügend Daten sicher sind.
Jedes Projekt hält für die Ausstellung einen stabilen Datenstand (JSON/CSV oder
in der DB) als Fallback bereit. Siehe auch die Didaktischen Leitplanken und den
Abschnitt zur Sensor-API.

### F. Chart.js

Ziel: Das Frontend-Team kann Daten vom Backend laden und sinnvoll visualisieren.

Inhalte:

- Implementierung Chart.js: Setup, Datenstruktur und erster Chart
- Diagrammtypen und ihre Eignung für unterschiedliche Aussagen
- `fetch()` auf PHP-Unload-Endpunkt
- Daten für Labels und Datasets mappen
- einfache Interaktion: Filter, Zeitraum, Kategorie
- visuelle Lesbarkeit und journalistische Aussage

Material:

- neues Cheatsheet `cheatsheets/20_chartjs.md`
- `code-alongs/11_chartjs_first_chart`
- `uebungen/06_chartjs/`

Mögliche Übungen:

- `a_static_chart`: Chart aus statischem Array.
- `b_fetch_chart`: Chart aus JSON-Endpunkt.
- `c_filter_chart`: Dropdown/Buttons filtern Daten.
- `d_story_chart`: Chart mit Titel, Quelle und Kernaussage.

### Begleitspur: Datenjournalismus (kein nummerierter Block)

Ziel: Die Story-Gruppe entwickelt keine beliebige Visualisierung, sondern eine klare Fragestellung.

Datenjournalismus ist kein nummerierter Block, sondern eine Begleitspur: Kurze
Inputs und selbständige Rechercheaufträge laufen ab Tag 1 parallel zu den
technischen Blöcken A bis F. So können die Gruppen früh Themen prüfen und bis
Ende Tag 3 eine tragfähige Datenfrage und Datenquelle wählen.

Inhalte:

- Datenfrage formulieren
- These vs. offene Recherchefrage
- Zielgruppe und Relevanz
- Storyline: Einstieg, Kontext, Datenbeleg, Schluss
- Chart-Auswahl passend zur Aussage
- Quellen, Limitationen, Datenethik
- Arbeitsweise und Erfahrungen aus dem professionellen Datenjournalismus

Material:

- später ausarbeiten
- vorerst `projekt/brief.md`, `projekt/milestones.md`, `stift-und-papier/03_story_angle`
- zweistündiger Input von Pascal Alisser: fixer Story-Input, der neben den
  technischen Blöcken schwebt und flexibel platziert wird (Richtwert um Tag 4–5)

Begleitspur über die Kurstage (an die ETL+U-Blöcke angelehnt):

- Tag 1: Im Begleitprogramm Beispielprojekte ansehen und mögliche
  Themenfelder sammeln.
- Tag 2: erste eigene Datenfrage formulieren (Milestone „Datenfrage
  formulieren").
- Tag 3: Datenquellen recherchieren und einen passenden Datensatz finden
  (Milestone „Datensatz gefunden").
- Tag 4–5: Frage und Datenquelle auf Relevanz, Menge, Zeitraum und Zugang
  prüfen und festlegen (parallel zu Extract/Transform).
- Tag 6: Datenmodell und Datenvertrag anhand von Load konkretisieren.
- Tag 7–8: Story, Chart und Backend aufbauen und integrieren (Unload/Chart.js).
- Tag 9: Aussage, Quellen und Limitationen prüfen; Ausstellungsfassung
  vorbereiten (Milestone „Erste Integration steht"; UX-Slot flexibel).
- Tag 10: Story und Projekt am Marktstand vermitteln.

**Input Pascal Alisser** (zwei Stunden): fixer Story-Input, der neben den
technischen Blöcken schwebt und nicht an einen Block gebunden ist. Flexibel
platziert (Richtwert um Tag 4–5, sobald die Gruppen eine erste Datenfrage und
Quelle haben). Die übrige Tag-für-Tag-Zuordnung oben ist aus dem technischen
Ablauf abgeleitet und mit der Story-Verantwortlichen gegenzuprüfen.

## Sensor-API als Datenquelle

Eine Sensor-API ist eine weitere Extract-Variante neben Live-API, statischem
JSON und CSV:

- Eine vorhandene Sensorbox stellt Messwerte über HTTP/JSON bereit.
- Die Studierenden konsumieren die Daten mit PHP wie bei jeder anderen API.
- Die Sensorboxen werden gezeigt, damit die Studierenden mögliche Geräte für
  einen späteren Kurs kennenlernen.
- Hardware, Sensorik und Programmierung der Box sind nicht Inhalt dieses
  Kurses.
- Für den Marktstand wird ein gespeicherter Datenstand als Fallback verwendet.

## Vorschlag Ablauf über 10 Kurstage

Der Kurs wird hier als eigenständige Folge von zehn Kurstagen geplant (Stand
Miro-Ablauf-Board, aktualisiert 2026-07-22). Der bisherige Halbtag an Tag 7
entfällt; alle zehn Tage sind vollwertige Kurstage. Andere Fachanteile werden
später ausserhalb dieses Plans in den Gesamtkalender verteilt.

| Tag | Block / Schwerpunkt |
| --- | --- |
| 1 | Kickoff, Gruppenbildung, Tooling und Server |
| 2 | A – PHP Basics I: Variablen, Datentypen, Funktionen, Bedingungen |
| 3 | A – PHP Basics II: Arrays und Schleifen |
| 4 | B – Extract: JSON-Datei, Live-API, CSV lesen |
| 5 | C – Transform: säubern, reduzieren, umbenennen |
| 6 | D – Load: DB-Tooling, ERM Light, PDO, `INSERT` |
| 7 | E – Unload: PDO `SELECT` → JSON-Endpunkt + `$_GET`-Filter |
| 8 | F – Chart.js und UX-Slot (flexibel platzierbar) |
| 9 | Integration, Feature-Freeze und UX-Slot |
| 10 | Marktstand und Abgabe |

Der zweistündige Input von Pascal Alisser schwebt als Story-Input neben diesen
Blöcken (flexibel platziert, Richtwert um Tag 4–5).

Als roter Faden eignet sich weiterhin ein kleiner, historischer Datensatz wie
Aare.guru. Der Ablauf setzt einen bewusst kleinen Projektumfang voraus: eine
Datenquelle, ein kleines Datenmodell, ein zentraler JSON-Endpunkt und
mindestens eine einfache Chart.js-Visualisierung.

Hinweis: Das Miro-Board markiert den UX-Block an Tag 8/9 ausdrücklich als
„kann irgendwo im Kurs platziert werden" — die Platzierung an genau diesen
beiden Tagen ist ein Platzhalter, kein fixer Entscheid. Ebenso sieht das Board
keinen dedizierten Fertigstellungs-/Ausstellungstest-Tag mehr vor (anders als
der bisherige Halbtag 7); das muss bei der Detailplanung von Tag 9 bewusst
mitgedacht werden.

### Tag 1 - Kickoff, Gruppenbildung, Tooling und Server

An diesem Tag gibt es noch keinen PHP-Grundlagenunterricht. Erfahrungsgemäss
brauchen Kickoff, Zugänge und Einrichtung den ganzen Termin.

- Kickoff: Modulziel, Projektauftrag und fertiges Beispielprojekt zeigen.
- Marktstand (Tag 10) als Abschlussformat ankündigen.
- Gruppenbildung mit Aufteilung in Backend-/Frontend-Zweierteams.
- Tooling und Server:
  - prüfen, ob PHP lokal beziehungsweise in der vorgesehenen Umgebung läuft;
  - Serverzugänge verteilen und testen;
  - persönlichen Projektordner auf dem Server einrichten, minimales PHP-Setup;
  - eine minimale PHP-Testdatei hochladen und im Browser aufrufen;
  - typische Zugangs-, Pfad- und Rechteprobleme gemeinsam lösen.
- Begleitprogramm:
  - Rollenmodell Backend-/Frontend-Zweierteam erklären;
  - Beispiele für Datenprojekte ansehen;
  - mögliche Themenfelder und Beobachtungen sammeln.

Output:

- Jede Person erreicht den Server und kann eine PHP-Testdatei aufrufen.
- Die Vierergruppen stehen und kennen den Projektablauf.

Milestone: Gruppen gebildet.

### Tag 2 - PHP Basics: Variablen, Datentypen, Funktionen, Bedingungen

- Sehr kurze Einführung: Was macht PHP auf dem Server?
- Variablen, Datentypen, `echo` und String-Ausgabe.
- Einfache Funktionen mit Parametern und Rückgabewert.
- Bedingungen.
- Datennahe Mini-Übungen mit vorbereiteten Messwerten.
- Begleitprogramm: jede Gruppe formuliert eine erste eigene Datenfrage.

Output:

- Jede Person kann Werte speichern, ausgeben und durch eine einfache Funktion
  und Bedingung verarbeiten.

Milestone: Datenfrage formuliert.

### Tag 3 - Block A: Arrays und Schleifen

- Arrays, assoziative Arrays und Schleifen.
- Kleines historisches Mini-Dataset mit `foreach` durchlaufen und Werte
  ausgeben.
- Begleitprogramm: mögliche Datenquellen recherchieren und einen passenden
  Datensatz finden.

Output:

- Jede Person kann eine Liste kleiner Datensätze mit `foreach` durchlaufen.

Milestone: Datensatz gefunden.

### Tag 4 - Block B: Extract

- Dieselben Daten aus drei Quellen als PHP-Array lesen:
  - statische JSON-Datei mit `file_get_contents` + `json_decode`;
  - Live-API mit dem vorbereiteten Helfer `fetchJson()`;
  - CSV-Datei mit `fgetcsv`.
- Kernidee: Der Extract ändert sich, das Ergebnis (ein PHP-Array) bleibt gleich.
- Noch kein Endpunkt und kein Filter – das kommt in Unload (Tag 7).
- Begleitprogramm: eigene Quelle technisch als PHP-Array einlesen.

Output:

- Jede Person kann Daten aus mindestens einer Quelle als PHP-Array einlesen.

### Tag 5 - Block C: Transform

- Rohdaten säubern, reduzieren, umbenennen und normalisieren.
- Aus vielen Werten das Nötige ableiten (z. B. Jahres-Höchstwert; `Y/N` → bool).
- Datenvertrag entwerfen (Felder, Typen, Beispiel-JSON); Frontend erhält
  Mock-JSON.

Output:

- Rohdaten aller Quellen liegen in einer einheitlichen Struktur vor.

### Tag 6 - Block D: Load

- DB-Tooling: Zugang, `config.php` und Verbindung testen.
- DB & SQL: Tabellen, Zeilen, Spalten, Schlüssel; Datenmodell als ERM Light.
- PDO-Verbindung und `INSERT` mit Prepared Statements; einfache
  Fehlerbehandlung.
- Transformierte Daten in die Datenbank laden.

Output:

- Die transformierten Daten der Gruppe liegen in der Datenbank.

### Tag 7 - Block E: Unload

- `unload.php`: gespeicherte Daten per PDO (`SELECT`) auslesen.
- In die vereinbarte JSON-Struktur bringen, Header setzen, `json_encode`.
- Mit `$_GET` filtern; leere Resultate sauber als JSON beantworten.

Output:

- Der eigene `unload.php`-Endpunkt liefert eine stabile, filterbare JSON-Antwort.
- Backend und Frontend können ab jetzt über den Endpunkt zusammenarbeiten.

### Tag 8 - Block F: Chart.js (und UX-Slot)

- Chart.js-Setup; `fetch()` auf den eigenen oder einen vorbereiteten
  Unload-Endpunkt.
- Labels und Datasets mappen; Diagrammtyp passend zur Aussage wählen.
- Einfache Interaktion (Filter/Zeitraum/Kategorie).
- UX-Block laut Miro-Board flexibel platzierbar; kann auch früher stattfinden.

Output:

- Ein erster Chart konsumiert die echten Daten aus dem Endpunkt.

### Tag 9 - UX (flexibel platzierbar) und erste Integration

- UX-Block gemäss Miro-Board (Platzhalter, siehe Tag 8).
- Projektwerkstatt: Backend und Frontend integrieren.
- Story, Quellen und Limitationen prüfen.
- Stabilen Daten-Fallback testen.

Output:

- Backend und Frontend funktionieren integriert mindestens mit Mock- oder
  echten Daten.

Milestone: Erste Integration steht.

### Tag 10 - Marktstand und Abgabe

- Kurzer Aufbau sowie Geräte- und Fallback-Test.
- Keine grossen neuen Features mehr.
- Projekte am Marktstand ausstellen und Besucherinnen und Besuchern erklären.
- Story, Visualisierung, Datenquelle und technische Pipeline sichtbar machen.
- Code, README, Quellen und dokumentierte Limitationen abgeben.
- Kurze gemeinsame Reflexion zu Extract, Transform, Load und Unload.

Output:

- Projekt wurde öffentlich ausgestellt und ist abgegeben.
- Studierende können ihren technischen Prozess und ihre Story erklären.

## Projekt-Meilensteine

Die Meilensteine sind keine zusätzliche Unterrichtsreihe. Sie sind kurze
Abnahmepunkte, die im Miro-Ablauf-Board direkt bestimmten Kurstagen zugeordnet
sind. Eine Gruppe zeigt jeweils ein kleines, konkretes Ergebnis, bevor sie
weiterarbeitet.

### M1 - Gruppen gebildet (Ende Tag 1)

- Serverzugang und PHP-Test funktionieren.
- Vierergruppe steht.
- Backend-/Frontend-Zweierteams sind festgelegt.

### M2 - Datenfrage formuliert (Ende Tag 2)

- Jede Gruppe hat eine erste eigene Datenfrage formuliert.

### M3 - Datensatz gefunden (Ende Tag 3)

- Ein passender Datensatz beziehungsweise eine passende Datenquelle ist
  gefunden.
- Der Datensatz enthält bereits genügend Daten für das Projekt oder die
  Gruppe kann nachvollziehbar zeigen, wie bis zum Marktstand genügend Daten
  entstehen.

### M4 - Erste Integration steht (Ende Tag 9)

- Extract, Transform, Load und Unload liefern Daten bis zum Frontend.
- Der Frontend-Chart funktioniert mindestens mit Mock- oder echten Daten.
- Backend und Frontend sind erstmals integriert.
- Ein stabiler Datenstand beziehungsweise Fallback ist vorhanden.

### M5 - Marktstand und Abgabe (Tag 10)

- Code läuft auf dem Zielserver.
- README erklärt Setup und Endpunkte.
- Datenquelle ist dokumentiert.
- Gruppe kann ETL-Prozess und Story-Entscheid erklären.
- Projekt wird am Marktstand präsentiert.

Hinweis: M1–M3 und M4 stammen direkt aus dem Miro-Board; M5 wurde sinnvoll
ergänzt, da das Board Tag 10 als Marktstand ausweist, aber keine eigene
Meilenstein-Karte dafür zeigt. Anders als in der bisherigen M0–M5-Liste fehlt
im Board ein expliziter Zwischen-Meilenstein für „Projektgrundlage/
Datenvertrag" und für eine geprüfte Ausstellungsfassung vor dem Marktstand —
das sollte bei Bedarf ergänzt werden.

## Beispiel fuer einen Datenvertrag

Ein Datenvertrag ist kein juristischer Vertrag. Er ist eine kleine schriftliche
Abmachung zwischen Backend und Frontend: Unter welcher URL kommen die Daten,
welche Felder gibt es, wie heissen sie und welchen Datentyp haben sie? Dadurch
kann das Frontend schon mit einer Beispieldatei arbeiten, während das Backend
den ETL-Prozess baut.

Beispiel für ein Aare-Projekt:

```text
Endpunkt: GET /unload.php?location=bern
Antwort:  JSON-Liste von Messungen, sortiert von alt nach neu
```

```json
[
  {
    "measured_at": "2026-07-21T10:00:00+02:00",
    "location": "Bern",
    "temperature_c": 19.2
  },
  {
    "measured_at": "2026-07-21T11:00:00+02:00",
    "location": "Bern",
    "temperature_c": 19.5
  }
]
```

Vereinbarte Felder:

| Feld | Typ | Bedeutung | Beispiel |
| --- | --- | --- | --- |
| `measured_at` | String | Zeitpunkt im ISO-Format | `2026-07-21T10:00:00+02:00` |
| `location` | String | lesbarer Ortsname | `Bern` |
| `temperature_c` | Number | Wassertemperatur in Celsius | `19.2` |

Für den Einstieg reicht dieser kleine Vertrag. Später können bei Bedarf
Filterparameter, leere Antworten und Fehler ergänzt werden. Entscheidend ist:
Das Backend hält sich an diese Feldnamen und Datentypen; das Frontend baut
gegen genau dieselbe Mock-Struktur.

## Didaktische Leitplanken

- Jede technische Einheit braucht sofort einen Mini-Anwendungsfall mit Datenbezug.
- PHP-Basics nicht als abstrakte Syntaxreihe behandeln, sondern früh mit kleinen Datensätzen verbinden.
- Übungen eigenständig für IM3 entwickeln und nicht thematisch aus dem
  IM2-Referenzkurs kopieren.
- Aufgaben extrem einfach staffeln: ein neues Konzept pro Schritt, wenige
  vorbereitete Daten und ein direkt sichtbares Resultat.
- Für Tag 2 bis 7 möglichst denselben kleinen Beispieldatensatz verwenden,
  damit nur der technische Schritt neu ist und nicht zusätzlich das Thema.
- Datenjournalismus nicht als letzten Theorieblock behandeln. Recherche,
  Datenfrage und Quellenprüfung beginnen ab Tag 1 und laufen als kleine
  Begleitspur parallel zur technischen Strecke.
- Pro Kurstag mindestens eine kurze Repetition einbauen.
- Pro Themenblock mindestens eine selbständige Übung mit Lösung anbieten.
- Analoge Planung erzwingen, bevor Studierende mit KI oder Code starten.
- Backend und Frontend früh über Mock-JSON entkoppeln.
- Historische JSON-/CSV-Datasets sind für die kurze Kursdauer die bevorzugte
  Projektgrundlage, wenn Transform und Load sinnvoll bleiben.
- Live-Sammlung nur erlauben, wenn die Daten über Zeit wirklich interessanter
  werden und bis zum Marktstand sicher genügend Daten entstehen.
- Tag 1 enthält noch keinen PHP-Grundlagenunterricht. Kickoff, Tooling,
  Servereinrichtung und Begleitprogramm erhalten den ganzen Tag.
- Der Kurs umfasst zehn vollwertige Kurstage; es gibt keinen Halbtag mehr.
  Tag 9 (erste Integration) sollte trotzdem bewusst Zeit für Fertigstellung
  und Ausstellungstest freihalten, da das Board dafür keinen eigenen Tag
  ausweist.
- Die ausstellungsfähige Fassung sollte bis Ende Tag 9 stehen, spätestens vor
  dem Marktstand an Tag 10.
- Die UX-Inhalte (Tag 8/9 im Board) sind laut Miro-Board flexibel im Kurs
  platzierbar; ihre definitive Platzierung ist noch offen.
- Für externe Live- und Sensor-APIs immer einen stabilen Daten-Fallback für die
  Ausstellung vorsehen.

## Nächste Arbeitsschritte

1. `README.md` auf neue Kursstruktur und Projektziel umschreiben.
2. `dozierende/ABLAUF.md` nach IM2-Vorbild erstellen.
3. `code-alongs/README.md` als Checkliste neu strukturieren.
4. `uebungen/README.md` und erste Übungsordner anlegen.
5. `projekt/` mit Briefing, Rollen, Milestones, Bewertung, Marktstand-Checkliste
   und API-Contract erstellen.
6. Bestehende PHP-Code-Alongs auf einheitliche Benennung und Aufgabenform bringen.
7. ETL-Boilerplate auf drei Extract-Varianten vorbereiten:
   - `extract_api.php`
   - `extract_json.php`
   - `extract_csv.php`
8. Chart.js-Cheatsheet und erste Chart.js-Übungen ergänzen.
9. Kuratierte Liste historischer Datensätze sowie Kriterien für Live- und
   Sensor-API-Projekte erstellen.
10. Input mit Pascal Alisser terminieren und inhaltlich briefen.
