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
│   ├── A_php_basics/
│   ├── B_php_json_api/
│   ├── C_datenbanken_pdo/
│   ├── D_etl/
│   ├── E_chartjs/
│   └── F_datenstory/
├── code-alongs/
│   ├── 00_hallo_php/
│   ├── 01_variablen/
│   ├── 02_funktionen/
│   ├── 03_bedingungen/
│   ├── 04_arrays/
│   ├── 05_schleifen/
│   ├── 06_json_endpoint/
│   ├── 07_extract_api/
│   ├── 08_transform_clean/
│   ├── 09_load_pdo/
│   ├── 10_unload_api/
│   ├── 11_chartjs_first_chart/
│   └── 12_full_mini_project/
├── uebungen/
│   ├── 01_php_basics/
│   ├── 02_arrays_json/
│   ├── 03_extract/
│   ├── 04_transform/
│   ├── 05_load_unload/
│   ├── 06_chartjs/
│   └── 07_project_sprints/
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
- `uebungen/01_php_basics/` neu aufbauen

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

### B. PHP, JSON / APIs

Ziel: Studierende verstehen PHP als Leser und Lieferant von JSON-Daten. Das
zentrale Modell ist:

```text
JSON rein -> PHP-Array -> auswählen oder filtern -> JSON raus
```

Inhalte:

- Lokale JSON-Daten mit `file_get_contents` einlesen und ausgeben.
- JSON mit `json_decode(..., true)` in ein PHP-Array umwandeln.
- PHP-Arrays mit `json_encode` als JSON ausgeben.
- HTTP-Header `Content-Type: application/json` setzen.
- Einen kleinen eigenen JSON-Endpunkt bauen.
- Einen Endpunkt mit `$_GET` filtern.
- Eine externe JSON-API über eine vorbereitete Funktion `fetchJson($url)`
  abrufen.
- cURL als Technik hinter `fetchJson()` zeigen, aber die einzelnen Optionen in
  diesem Block noch nicht vertiefen.
- Aus einer grösseren API-Antwort nur wenige benötigte Felder auswählen.
- Leere Resultate und einfache Fehler als JSON ausgeben.
- Kommunikation Frontend/Backend: Das Backend liefert eine vereinbarte
  JSON-Struktur, das Frontend konsumiert sie zuerst als Mock-JSON und später
  über den echten Endpunkt.

Wichtige Unterscheidung:

```text
Frontend -> $_GET -> unser PHP-Endpunkt
unser PHP-Skript -> cURL GET -> externe API
```

`$_GET` verarbeitet also Parameter, die unser PHP-Skript erhält. cURL führt
einen ausgehenden HTTP-GET-Request an eine fremde API aus.

Abgrenzung der Datenquellen in diesem Block:

| Datenquelle | Zugriff | Behandlung in Block B |
| --- | --- | --- |
| lokale JSON-Datei | `file_get_contents` + `json_decode` | praktisch umsetzen |
| externe JSON-/Live-API | cURL + `json_decode` | mit vorbereitetem Helper zeigen |
| Sensor-API | technisch wie externe JSON-API | einordnen, Umsetzung in Block D |
| CSV-Datei | `fopen` / `fgetcsv` | nur einordnen, Umsetzung in Block D |
| Google Sheets | als CSV exportieren oder herunterladen | nur einordnen, Umsetzung in Block D |
| eigenes Dataset | als JSON oder CSV bereitstellen | nur einordnen, Umsetzung in Block D |

Die Studierenden implementieren in Block B nicht alle Datenquellen. Sie sollen
verstehen, dass alle Extract-Varianten am Ende ein PHP-Array von Datensätzen
liefern. CSV, Google Sheets, eigene Daten und Sensor-API werden im ETL-/Extract-
Block D praktisch behandelt.

Material:

- `cheatsheets/08_array2json.md`
- `cheatsheets/15__curl.md` als Hintergrund, nicht als vollständiger
  Lernstoff dieses Blocks
- Code-Along `06_json_endpoint`
- kurze API-Demo mit vorbereiteter Funktion `fetchJson($url)`
- Übungsblock `uebungen/02_arrays_json/`

Mögliche Übungen:

- `a_json_laden`: Eine vorbereitete lokale JSON-Datei einlesen.
- `b_json_endpoint`: Ausgewählte Felder als JSON ausgeben.
- `c_filter_endpoint`: Mit `$_GET` nach Ort oder Kategorie filtern.
- `d_api_abrufen`: Über `fetchJson()` eine vorbereitete JSON-API laden.
- `e_felder_auswaehlen`: Aus der API-Antwort nur drei Felder übernehmen.
- `f_error_response`: Leere Resultate und einfache Fehler als JSON ausgeben.

cURL wird in Block B damit sichtbar, bleibt aber didaktisch klein. Die
vollständige Arbeit mit verschiedenen Datenquellen gehört zu Extract in Block
D.

### C. Datenbanken / PDO

Ziel: Studierende können Daten aus PHP sicher in MySQL/MariaDB lesen und schreiben.

Inhalte:

- Tooling DB: Zugang, `config.php` und Verbindung testen
- Theorie DB & SQL: Tabellen, Zeilen, Spalten, Schlüssel und Beziehungen
- Planung Tabellen als ERM Light
- PDO-Verbindung
- CRUD: `SELECT`, `INSERT`, `UPDATE` und `DELETE`
- Prepared Statements
- einfache Fehlerbehandlung

Material:

- `cheatsheets/10__pdo.md`
- `cheatsheets/10_db_read.md`
- vorhandene DB-Code-Alongs überarbeiten

Mögliche Übungen:

- `a_users_read`: SELECT als HTML und JSON.
- `b_insert_measurement`: Messwert speichern.
- `c_update_measurement`: Einen vorbereiteten Messwert aktualisieren.
- `d_delete_measurement`: Einen Testdatensatz löschen.
- `e_search_endpoint`: gefilterter API-Endpunkt.

### D. ETL Pipeline

Ziel: Studierende können einen kleinen ETL-Prozess erklären, auf ihr Projekt
anwenden und die gespeicherten Daten über `unload.php` wieder als JSON für das
Frontend bereitstellen.

Inhalte:

- Extract mit cURL oder Dateizugriff: Datenquelle holen oder einlesen.
- Transform: Rohdaten säubern, reduzieren, normalisieren, neue Felder ableiten.
- Load: transformierte Daten in DB speichern.
- Unload: Daten wieder als JSON fuer Frontend bereitstellen.
- Unterschied zwischen Live-Daten sammeln und statischem Dataset importieren.

Die vollständige Kurspipeline lautet:

```text
Datenquelle
-> extract.php
-> transform.php
-> load.php
-> Datenbank
-> unload.php
-> JSON-Endpunkt
-> Chart.js
```

`Unload` ist nicht Teil des üblichen Begriffs ETL. Im Kurs bezeichnet Unload
den notwendigen Schritt nach dem Laden: Die Projektdaten werden wieder aus der
Datenbank gelesen und in der mit dem Frontend vereinbarten JSON-Struktur
ausgegeben.

Extract-Varianten:

- Bestehender historischer Datensatz als JSON oder CSV: bevorzugte Variante,
  weil sofort genügend Daten für Recherche, Story und Marktstand vorhanden
  sind.
- API mit historischen Daten: vorhandene Zeitreihen werden abgerufen und
  normalisiert.
- Live-API: z. B. Wetter, Wasser, Verkehr, Luftqualität, Preise oder Events.
  Diese Variante ist nur sinnvoll, wenn bereits genügend Daten verfügbar sind
  oder in kurzer Zeit ausreichend viele aussagekräftige Messungen entstehen.
- Sensor-API: Daten einer vorhandenen Sensorbox über HTTP/JSON konsumieren.
  Die Box wird in diesem Kurs gezeigt, aber nicht selbst programmiert.
- Eigenes Dataset: manuell erhobene Daten oder ein Export aus einer Tabelle,
  die trotzdem durch Transform und Load laufen.

Technische Umsetzung der Extract-Varianten:

| Datenquelle | Zugriff in PHP | Umsetzung in Block D |
| --- | --- | --- |
| externe JSON-/Live-API | cURL + `json_decode` | `fetchJson($url)` praktisch in `extract.php` verwenden |
| API mit historischen Daten | cURL + `json_decode` | wie Live-API, aber vorhandenen Zeitraum abrufen |
| Sensor-API | cURL + `json_decode` | technisch derselbe `fetchJson()`-Weg |
| statische JSON-Datei | `file_get_contents` + `json_decode` | eigene Extract-Funktion verwenden |
| CSV / Google-Sheets-Export | `fopen` + `fgetcsv` | Header lesen und Zeilen in Arrays umwandeln |
| eigenes Dataset | JSON- oder CSV-Variante | eines der vorhandenen Extract-Muster verwenden |

Der vorbereitete Helper `fetchJson($url)` wird in Block B erstmals gezeigt
und in Block D innerhalb von `extract.php` praktisch eingesetzt. Die
Studierenden müssen den cURL-Boilerplate-Code nicht auswendig schreiben. Sie
sollen URL und Parameter anpassen, die Antwort mit `json_decode(..., true)` in
ein PHP-Array umwandeln, Fehler erkennen und den zurückgegebenen Array-Inhalt
prüfen können.

Alle Extract-Varianten enden mit demselben Vertrag:

```text
API / Sensor-API / JSON / CSV -> PHP-Array mit Rohdatensätzen
```

Erst `transform.php` bringt die unterschiedlichen Rohdaten in die gemeinsame,
für das Projekt vereinbarte Struktur.

Technische Umsetzung von Unload:

- `unload.php` verbindet sich über PDO mit der Projektdatenbank.
- Ein `SELECT` liest nur die Felder, die das Frontend tatsächlich benötigt.
- Optionale Filter wie Ort, Kategorie oder Zeitraum kommen über `$_GET`.
- Werte für SQL-Filter werden mit Prepared Statements gebunden.
- Sortierung und sinnvolle Begrenzung werden im Query festgelegt.
- Datenbankzeilen werden in die vereinbarte JSON-Struktur gebracht.
- Der Header `Content-Type: application/json` wird gesetzt.
- `json_encode` gibt die Daten als stabilen Endpunkt aus.
- Leere Resultate und Fehler liefern eine verständliche JSON-Antwort.
- Der Endpunkt enthält keine HTML-Ausgabe und keine Debug-Ausgaben wie
  `var_dump`.

Der Datenvertrag aus Block B gilt damit auch für `unload.php`: Feldnamen,
Datentypen und Struktur müssen zum Mock-JSON des Frontends passen. Das
Frontend soll später nur die URL von der Mock-Datei zum echten Endpunkt ändern
müssen.

Priorität bei der Projektwahl:

1. Historischer Datensatz mit genügend Beobachtungen und einer interessanten
   Frage.
2. API oder Sensor-API mit vorhandener Historie.
3. Reine Live-Sammlung nur dann, wenn Datenmenge und Aussage bis zum Marktstand
   realistisch gesichert sind.

Jedes Projekt hält für die Ausstellung einen stabilen Datenstand als
JSON-/CSV-Datei oder in der eigenen Datenbank bereit. Der Marktstand darf
nicht vollständig von einer gerade erreichbaren Fremd- oder Sensor-API
abhängen.

Material:

- `etl-boilerplate/` als finaler Starter.
- `cheatsheets/15__curl.md` als Referenz für `fetchJson()`.
- `cheatsheets/550_unload.md` als Referenz für den JSON-Endpunkt.
- neues `code-alongs/12_full_mini_project/` als geführter Durchstich.
- `projekt/datenquellen.md` mit Kriterien fuer gute Datenquellen.

Mögliche Übungen:

- `a_extract_live_api`: Mit `fetchJson()` eine externe JSON-/Live-API abrufen,
  dekodieren und als PHP-Array zurückgeben.
- `b_extract_sensor_api`: Mit demselben Helper Daten einer Sensor-API abrufen.
- `c_extract_static_json`: JSON-Datei lesen und dekodieren.
- `d_extract_csv`: CSV lesen und Header/Felder mappen.
- `e_transform_weather`: Einheiten, Labels, Rundung, Feldnamen.
- `f_load_measurements`: INSERT mit Prepared Statement.
- `g_unload_for_chart`: Daten mit PDO aus der Datenbank lesen und passend zum
  Datenvertrag als JSON für Chart.js ausgeben.
- `h_unload_filter`: `unload.php` über einen `$_GET`-Parameter filtern und bei
  leeren Resultaten eine saubere JSON-Antwort liefern.

### E. Chart.js

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

### F. Datenjournalismus

Ziel: Die Story-Gruppe entwickelt keine beliebige Visualisierung, sondern eine klare Fragestellung.

Dieser Block folgt nicht erst nach A bis E. Kurze Inputs und selbständige
Rechercheaufträge laufen ab Tag 1 parallel zur technischen Lernstrecke. So
können die Gruppen früh Themen prüfen und bis Ende Tag 3 eine tragfähige
Datenfrage und Datenquelle wählen.

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
- zweistündiger Input von Pascal Alisser an Tag 4

Begleitspur über die Kurstage (Stand Miro-Ablauf, 10 Kurstage):

- Tag 1: Im Begleitprogramm Beispielprojekte ansehen und mögliche
  Themenfelder sammeln.
- Tag 2: erste eigene Datenfrage formulieren (Milestone „Datenfrage
  formulieren"), unabhängig vom späteren Pascal-Alisser-Input.
- Tag 3: Datenquellen recherchieren und einen passenden Datensatz finden
  (Milestone „Datensatz gefunden").
- Tag 4: zweistündiger Input von Pascal Alisser mit Fragen der Studierenden
  und kurzem Transfer auf mögliche Projektthemen; Frage und Datenquelle
  anschliessend prüfen und festlegen.
- Tag 5: Projektgrundlage und ersten Datenvertrags-Entwurf vorbereiten.
- Tag 6: Datenlücken, Transformationen und Datenvertrag anhand von Extract/
  Transform/Load konkretisieren.
- Tag 7: Story, Chart und Backend aufbauen und integrieren.
- Tag 8/9: Aussage, Quellen und Limitationen prüfen (UX-Slot, Platzierung
  flexibel).
- Tag 9: Integration testen, Ausstellungsfassung vorbereiten (Milestone
  „Erste Integration steht").
- Tag 10: Story und Projekt am Marktstand vermitteln.

Hinweis: Das Miro-Board zeigt für den Story-Strang nur den Pascal-Alisser-
Input als fixe Karte (Tag 4). Die übrige Tag-für-Tag-Zuordnung oben ist eine
Ableitung aus dem technischen Ablauf und sollte mit der Story-/
Datenjournalismus-Verantwortlichen Person gegengeprüft werden.

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

| Tag | Schwerpunkt |
| --- | --- |
| 1 | Kickoff, Gruppenbildung, Tooling und Server |
| 2 | PHP Basics: Variablen, Datentypen, Funktionen, Bedingungen |
| 3 | Arrays, Schleifen, lokale JSON-Ausgabe und $_GET-Filter |
| 4 | Tooling DB, Theorie DB & SQL, ERM Light und Input Pascal Alisser |
| 5 | PDO und CRUD |
| 6 | Extract (cURL), Transform und Load |
| 7 | Unload und Chart.js-Implementierung |
| 8 | UX (flexibel platzierbar) |
| 9 | UX (flexibel platzierbar) und erste Integration |
| 10 | Marktstand und Abgabe |

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

### Tag 3 - Arrays, Schleifen und JSON-Ausgabe

- Arrays, assoziative Arrays und Schleifen.
- Kleines historisches Mini-Dataset durchlaufen und einzelne Werte ausgeben.
- Lokale JSON-Daten mit `file_get_contents` einlesen und ausgeben.
- Einen eigenen JSON-Endpunkt bauen und mit `$_GET` filtern.
- Begleitprogramm: mögliche Datenquellen recherchieren und einen passenden
  Datensatz finden.

Output:

- Jede Person kann eine Liste kleiner Datensätze durchlaufen und als JSON
  ausgeben.
- Ein eigener, per `$_GET` filterbarer JSON-Endpunkt funktioniert.

Milestone: Datensatz gefunden.

### Tag 4 - Tooling DB, Theorie DB & SQL, ERM Light und Input Pascal Alisser

- Tooling DB: Zugang, `config.php` und Verbindung testen.
- Theorie DB & SQL: Tabellen, Zeilen, Spalten, Schlüssel und Beziehungen.
- Analoge Übung: Planung Tabellen als ERM Light für die eigenen Messwerte.
- Zweistündiger Input von Pascal Alisser:
  - Wie entsteht eine datenjournalistische Frage?
  - Wie werden Datenquellen gefunden und geprüft?
  - Wie wird aus Daten eine verständliche Story?
  - Welche Grenzen, Fehler und ethischen Fragen sind wichtig?
  - Zeit für Fragen der Studierenden.
- Projektgruppen prüfen ihre Datenfrage und Quelle auf Relevanz, Datenmenge,
  Zeitraum und technische Zugänglichkeit.

Output:

- Jede Person versteht Tabelle, Zeile, Spalte und Primärschlüssel.
- Ein ERM Light für die eigenen Messwerte liegt vor.
- Jede Gruppe hält Erkenntnisse aus dem Input für die eigene Projektidee fest.

### Tag 5 - PDO und CRUD

- PDO-Verbindung aufbauen.
- CRUD praktisch anwenden: `SELECT`, `INSERT`, `UPDATE` und `DELETE`.
- Prepared Statements und einfache Fehlerbehandlung.
- Einen Messwert speichern, lesen, aktualisieren und einen Testdatensatz
  löschen.

Output:

- Ein Messwert kann mit PDO gespeichert, gelesen, aktualisiert und gelöscht
  werden.
- Jede Gruppe hat eine plausible Datenfrage und Datenquelle gewählt.

### Tag 6 - Extract, Transform und Load

- Extract mit cURL beziehungsweise Dateizugriff: Live-API, JSON-Dataset,
  CSV-Dataset, eigenes Dataset oder Sensorbox.
- Transform: Rohdaten säubern, reduzieren, normalisieren, neue Felder
  ableiten.
- Load: transformierte Daten in die Datenbank schreiben.
- Dateien `extract.php`, `transform.php` und `load.php` klar voneinander
  abgrenzen.
- Jede Gruppe prüft einen Rohdaten-Ausschnitt ihrer eigenen Quelle und
  erstellt ETL-Skizze, Transform-Regeln und einen ersten Datenvertrag.
- Frontend erhält Mock-JSON; Backend richtet die Projektstruktur ein.

Output:

- Jede Person kann Extract, Transform und Load an einem eigenen Beispiel
  erklären.
- Jede Gruppe hat eine technisch geprüfte Quelle bis zur Datenbank gebracht.
- Backend und Frontend können ab jetzt getrennt arbeiten.

### Tag 7 - Unload und Chart.js-Implementierung

- Unload: gespeicherte Daten per PDO auslesen und als vereinbarte
  JSON-Struktur ausgeben.
- Implementierung Chart.js: Setup, Datenstruktur und erster Chart.
- Diagrammtypen und ihre Eignung für unterschiedliche Aussagen.
- `fetch()` auf den eigenen oder einen vorbereiteten Unload-Endpunkt.

Output:

- Der eigene `unload.php`-Endpunkt liefert eine stabile JSON-Antwort.
- Ein erster Chart konsumiert Mock- oder echte Daten.

### Tag 8 - UX (flexibel platzierbar)

- UX-Block gemäss Miro-Board; die genaue inhaltliche Platzierung im Kurs ist
  noch offen und muss vor der Detailplanung festgelegt werden.
- Ergänzend betreute Projektarbeit in den Zweierteams.

Output:

- Abhängig von der endgültigen UX-Themenwahl.

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
