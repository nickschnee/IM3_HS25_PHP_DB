# Planung IM3 HS25 - PHP, Datenbanken, ETL und Datenstory

## Kontextnotizen

- Modul: Interaktive Medien 3.
- Hauptziel: Die Studierenden entwickeln in Vierergruppen ein datenjournalistisches Projekt.
- Gruppenlogik: Eine Vierergruppe teilt sich in zwei Zweierteams.
- Backend-Team: baut mit PHP einen einfachen ETL-Prozess auf einem PHP-Server.
- Frontend-Team: entwickelt Story, Datenvisualisierung und Chart.js-Frontend.
- Gemeinsames Produkt: Daten werden gesammelt oder importiert, transformiert, in einer Datenbank gespeichert, wieder als JSON ausgeliefert und in einer Story visualisiert.
- Abschluss: Am letzten Kurstag stellen die Studierenden ihre Projekte an
  einem Marktstand aus. Die ausstellungsfähige Fassung muss deshalb am Ende
  von Tag 7 stehen.
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
- Organisation und Briefing der zweistündigen Datenjournalismus-Gastvorlesung.
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
│   ├── 00_server_check/
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

## Thematische Kursblöcke

### A. PHP Basics

Ziel: Studierende können einfache PHP-Skripte lesen, ändern und schreiben.

Inhalte:

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

### B. PHP, JSON und einfache APIs

Ziel: Studierende verstehen PHP als Leser und Lieferant von JSON-Daten. Das
zentrale Modell ist:

```text
JSON rein -> PHP-Array -> auswählen oder filtern -> JSON raus
```

Inhalte:

- Lokale JSON-Datei mit `file_get_contents` lesen.
- JSON mit `json_decode(..., true)` in ein PHP-Array umwandeln.
- PHP-Arrays mit `json_encode` als JSON ausgeben.
- HTTP-Header `Content-Type: application/json` setzen.
- Einen kleinen eigenen JSON-Endpunkt bauen.
- Eingehende GET-Parameter mit `$_GET` lesen und Daten filtern.
- Eine externe JSON-API über eine vorbereitete Funktion `fetchJson($url)`
  abrufen.
- cURL als Technik hinter `fetchJson()` zeigen, aber die einzelnen Optionen in
  diesem Block noch nicht vertiefen.
- Aus einer grösseren API-Antwort nur wenige benötigte Felder auswählen.
- Leere Resultate und einfache Fehler als JSON ausgeben.

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

### C. Datenbanken mit PDO

Ziel: Studierende können Daten aus PHP sicher in MySQL/MariaDB lesen und schreiben.

Inhalte:

- `config.php`
- PDO-Verbindung
- SELECT und INSERT
- Prepared Statements
- einfache Fehlerbehandlung
- Tabellenstruktur verstehen

Material:

- `cheatsheets/10__pdo.md`
- `cheatsheets/10_db_read.md`
- vorhandene DB-Code-Alongs überarbeiten

Mögliche Übungen:

- `a_users_read`: SELECT als HTML und JSON.
- `b_insert_measurement`: Messwert speichern.
- `c_search_endpoint`: gefilterter API-Endpunkt.

### D. ETL Basics

Ziel: Studierende können einen kleinen ETL-Prozess erklären und auf ihr Projekt anwenden.

Inhalte:

- Extract: Datenquelle holen oder einlesen.
- Transform: Rohdaten säubern, reduzieren, normalisieren, neue Felder ableiten.
- Load: transformierte Daten in DB speichern.
- Unload: Daten wieder als JSON fuer Frontend bereitstellen.
- Unterschied zwischen Live-Daten sammeln und statischem Dataset importieren.

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
- neues `code-alongs/12_full_mini_project/` als geführter Durchstich.
- `projekt/datenquellen.md` mit Kriterien fuer gute Datenquellen.

Mögliche Übungen:

- `a_extract_live_api`: Daten mit cURL holen und als PHP-Array zurückgeben.
- `b_extract_static_json`: JSON-Datei lesen und dekodieren.
- `c_extract_csv`: CSV lesen und Header/Felder mappen.
- `d_transform_weather`: Einheiten, Labels, Rundung, Feldnamen.
- `e_load_measurements`: INSERT mit Prepared Statement.
- `f_unload_for_chart`: JSON für Chart.js vorbereiten.

### E. Chart.js und Datenfrontend

Ziel: Das Frontend-Team kann Daten vom Backend laden und sinnvoll visualisieren.

Inhalte:

- Chart.js Setup
- Chart-Typen und Datenformate
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

### F. Datenjournalismus und Story als Begleitspur

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
- zweistündige Gastvorlesung eines Datenjournalisten an Tag 2

Begleitspur über die Kurstage:

- Tag 1: Im Begleitprogramm Beispielprojekte ansehen und mögliche
  Themenfelder sammeln.
- Tag 2: zweistündige Gastvorlesung eines Datenjournalisten mit Fragen der
  Studierenden und kurzem Transfer auf mögliche Projektthemen.
- Tag 3: mögliche Fragen und Datenquellen recherchieren.
- Tag 4: Frage und Datenquelle prüfen und festlegen.
- Tag 5: Datenlücken, Transformationen, Datenvertrag und Projektgrundlage.
- Tag 6: Story, Chart und Backend aufbauen und integrieren.
- Tag 7: Aussage, Quellen und Limitationen prüfen; Ausstellungsfassung testen.
- Tag 8: Story und Projekt am Marktstand vermitteln.

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

## Vorschlag Ablauf über 8 Kurstage

Der Kurs wird hier als eigenständige Folge von acht Kurstagen geplant. Tag 7
ist ein Halbtag. Andere Fachanteile werden später ausserhalb dieses Plans in
den Gesamtkalender verteilt.

| Tag | Schwerpunkt |
| --- | --- |
| 1 | Kickoff, Tooling und Begleitprogramm |
| 2 | PHP Basics und zweistündige Gastvorlesung Datenjournalismus |
| 3 | Bedingungen, Arrays, Schleifen und JSON |
| 4 | API, Datenbank, PDO und ERM |
| 5 | ETL-Durchstich und Projektgrundlage |
| 6 | Chart.js, Projektwerkstatt und erste Integration |
| 7, Halbtag | Projekt-Checkpoint, Fertigstellung und Ausstellungstest |
| 8 | Marktstand und Abgabe |

Als roter Faden eignet sich ein kleiner, historischer Datensatz wie
Aare.guru. Der Ablauf bleibt dicht und setzt einen bewusst kleinen
Projektumfang voraus: eine Datenquelle, ein kleines Datenmodell, ein zentraler
JSON-Endpunkt und mindestens eine einfache Chart.js-Visualisierung.

### Tag 1 - Kickoff, Tooling und Begleitprogramm

An diesem Tag gibt es noch keinen PHP-Grundlagenunterricht. Erfahrungsgemäss
brauchen Kickoff, Zugänge und Einrichtung den ganzen Termin.

- Kickoff: Modulziel, Projektauftrag und fertiges Beispielprojekt zeigen.
- Marktstand als Abschlussformat ankündigen.
- Gruppenbildung und organisatorische Fragen klären.
- Tooling:
  - prüfen, ob PHP lokal beziehungsweise in der vorgesehenen Umgebung läuft;
  - Serverzugänge verteilen und testen;
  - persönlichen Projektordner auf dem Server einrichten;
  - eine minimale PHP-Testdatei hochladen und im Browser aufrufen;
  - typische Zugangs-, Pfad- und Rechteprobleme gemeinsam lösen.
- Begleitprogramm:
  - Rollenmodell Backend-/Frontend-Zweierteam erklären;
  - Beispiele für Datenprojekte ansehen;
  - mögliche Themenfelder und Beobachtungen sammeln;
  - Ablauf, Meilensteine und Marktstand einordnen.

Output:

- Jede Person erreicht den Server und kann eine PHP-Testdatei aufrufen.
- Die Vierergruppen stehen und kennen den Projektablauf.
- Jede Gruppe hat erste Themenfelder, aber noch keine erzwungene definitive
  Datenquelle.

### Tag 2 - PHP Basics und Gastvorlesung Datenjournalismus

- Sehr kurze Einführung: Was macht PHP auf dem Server?
- Variablen, Datentypen, `echo` und String-Ausgabe.
- Einfache Funktionen mit Parametern und Rückgabewert.
- Datennahe Mini-Übungen mit vorbereiteten Messwerten.
- Zweistündige Gastvorlesung eines Datenjournalisten:
  - Wie entsteht eine datenjournalistische Frage?
  - Wie werden Datenquellen gefunden und geprüft?
  - Wie wird aus Daten eine verständliche Story?
  - Welche Grenzen, Fehler und ethischen Fragen sind wichtig?
  - Zeit für Fragen der Studierenden.
- Kurzer Transfer: Jede Gruppe notiert zwei Gedanken für mögliche
  Projektthemen oder Datenfragen.

Output:

- Jede Person kann Werte speichern, ausgeben und durch eine einfache Funktion
  verarbeiten.
- Jede Gruppe hält erste journalistische Fragen oder Rechercheansätze fest.

### Tag 3 - Bedingungen, Datenstrukturen und JSON

- Repetition der PHP Basics.
- Einfache Bedingungen.
- Arrays, assoziative Arrays und Schleifen.
- Kleines historisches Mini-Dataset durchlaufen und einzelne Werte ausgeben.
- PHP-Array mit `json_encode` als JSON ausgeben.
- Optional bei genügend Zeit: eine vorbereitete externe JSON-Antwort lesen.
- Begleitprogramm: mögliche Datenfragen und historische Quellen recherchieren.

Output:

- Jede Person kann eine Liste kleiner Datensätze durchlaufen.
- Jede Person versteht die Verbindung zwischen PHP-Array und JSON.
- Jede Gruppe hat zwei mögliche Datenfragen und Quellen.

### Tag 4 - API, Datenbank, PDO und ERM

- Eine kleine externe JSON-Antwort, zum Beispiel Aare.guru, gemeinsam holen
  und lesen.
- Die Sensor-API als gleichwertige alternative Datenquelle zeigen.
- Nur die benötigten Felder auswählen.
- Datenbank-Grundlagen: Tabelle, Zeile, Spalte und Primärschlüssel.
- Analoge Übung: für Messwerte ein minimales ERM beziehungsweise eine Tabelle
  zeichnen.
- PDO-Verbindung sowie genau ein vorbereitetes `INSERT` und `SELECT`.
- Einen Messwert speichern und wieder lesen.
- Projektgruppen prüfen Datenfrage und Quelle auf Relevanz, Datenmenge,
  Zeitraum und technische Zugänglichkeit.

Output:

- Jede Person versteht den Weg von einer JSON-Antwort zu einem PHP-Array.
- Ein Messwert kann mit PDO gespeichert und wieder gelesen werden.
- Jede Gruppe hat eine plausible Datenfrage und Datenquelle gewählt.

### Tag 5 - ETL-Durchstich und Projektgrundlage

- Extract, Transform, Load und Unload als sichtbare Pipeline erklären.
- Vollständiger gemeinsamer Durchstich mit dem Referenzdatensatz:
  Rohdaten lesen, Felder auswählen/umbenennen, in die Datenbank schreiben und
  als JSON ausgeben.
- Dateien `extract.php`, `transform.php`, `load.php` und `unload.php` klar
  voneinander abgrenzen.
- Extract-Varianten zeigen: Live-API, statisches JSON, CSV und Sensor-API.
- Jede Gruppe prüft einen Rohdaten-Ausschnitt ihrer eigenen Quelle.
- Gruppe erstellt ERM, ETL-Skizze, Transform-Regeln und Datenvertrag.
- Frontend erhält Mock-JSON; Backend richtet die Projektstruktur ein.

Output:

- Jede Person kann den ETL-/Unload-Weg erklären.
- Jede Gruppe hat eine technisch geprüfte Quelle und eine umsetzbare
  Projektgrundlage.
- Backend und Frontend können ab jetzt getrennt arbeiten.

### Tag 6 - Chart.js, Projektwerkstatt und erste Integration

- Kompakter Chart.js-Code-Along mit vorbereitetem Mock-JSON.
- `fetch()` auf einen vorbereiteten Unload-Endpunkt.
- Danach betreute Projektarbeit in den Zweierteams.
- Backend-Team:
  - eigenen Extract, Transform, Load und Unload umsetzen;
  - stabilen Datenstand als Fallback sichern.
- Frontend-Team:
  - Chart mit Mock-Daten und danach mit echten Daten verbinden;
  - Story, Quellen und Limitationen ergänzen.
- Gesamtgruppe beginnt die Integration.

Output:

- Backend und Frontend funktionieren mindestens isoliert.
- Eine erste Integration ist sichtbar.

### Tag 7 - Halbtag: Fertigstellung und Ausstellungstest

An diesem Halbtag gibt es keinen neuen fachlichen Input.

- Kurzer Stand-up pro Gruppe: Was läuft, was fehlt, was blockiert?
- Backend-Endpunkt und Chart.js-Integration fertigstellen.
- Datenvertrag und Projektumfang nur noch bei Bedarf korrigieren.
- Story, Quellen und Limitationen prüfen.
- Stabilen Daten-Fallback testen.
- Ausstellungsfassung auf dem vorgesehenen Gerät prüfen.
- Kurzer Probelauf mit einer anderen Gruppe.

Output:

- Eine integrierte und ausstellungsfähige Fassung steht.
- Kritische Blockaden für den Marktstand sind gelöst.

### Tag 8 - Marktstand und Abgabe

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
Abnahmepunkte am Ende eines Kurstages. Eine Gruppe zeigt jeweils ein kleines,
konkretes Ergebnis, bevor sie weiterarbeitet.

### M0 - Tooling, Gruppe und Rollen (Ende Tag 1)

- Serverzugang und PHP-Test funktionieren.
- Vierergruppe steht.
- Backend-/Frontend-Zweierteams sind vorläufig festgelegt.

### M1 - Idee und Datenquelle (Ende Tag 4)

- Erste Datenfrage ist formuliert.
- Datenquelle ist plausibel.
- Der Datensatz enthält bereits genügend Daten für das Projekt oder die Gruppe
  kann nachvollziehbar zeigen, wie bis zum Marktstand genügend Daten entstehen.

### M2 - Projektgrundlage und Datenvertrag (Ende Tag 5)

- Ein kleiner Rohdaten-Ausschnitt konnte gelesen werden.
- Die Gruppe kennt ihre Extract-Strategie.
- Risiken wie Rate Limits, fehlende Historie, Hardware- oder
  Netzwerkabhängigkeit sind bekannt.
- Backend und Frontend einigen sich auf JSON-Struktur.
- ERM und ETL-Datenfluss sind skizziert.
- Beispielantwort liegt als Mock-JSON vor.
- Frontend kann mit Mock-Daten arbeiten.

### M3 - Teile funktionieren und erste Integration steht (Ende Tag 6)

- Extract liefert Rohdaten.
- Transform liefert saubere Projektdaten.
- Load schreibt in DB.
- Unload liefert JSON.
- Der Frontend-Chart funktioniert mindestens mit Mock-Daten.
- Der grobe Story-Aufbau steht.
- Ein stabiler Datenstand beziehungsweise Fallback ist vorhanden.

### M4 - Ausstellungsfassung (Ende Tag 7, Halbtag)

- Chart.js konsumiert den echten JSON-Endpunkt.
- Story nutzt mindestens eine sinnvolle Visualisierung.
- Quelle und Limitationen sind sichtbar.
- Projekt ist am vorgesehenen Gerät ausstellungsfähig.

### M5 - Marktstand und Abgabe (Tag 8)

- Code läuft auf dem Zielserver.
- README erklärt Setup und Endpunkte.
- Datenquelle ist dokumentiert.
- Gruppe kann ETL-Prozess und Story-Entscheid erklären.
- Projekt wird am Marktstand präsentiert.

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
- Für Tag 2 bis 5 möglichst denselben kleinen Beispieldatensatz verwenden,
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
- Tag 7 ist ein Halbtag ohne neuen fachlichen Input. Er dient der
  Fertigstellung, dem Support und dem Ausstellungstest.
- Die ausstellungsfähige Fassung muss Ende Tag 7 stehen.
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
10. Gastvorlesung Datenjournalismus anfragen und inhaltlich briefen.
