# Planung IM3 HS25 - PHP, Datenbanken, ETL und Datenstory

## Kontextnotizen

- Modul: Interaktive Medien 3.
- Hauptziel: Die Studierenden entwickeln in Vierergruppen ein datenjournalistisches Projekt.
- Gruppenlogik: Eine Vierergruppe teilt sich in zwei Zweierteams.
- Backend-Team: baut mit PHP einen einfachen ETL-Prozess auf einem PHP-Server.
- Frontend-Team: entwickelt Story, Datenvisualisierung und Chart.js-Frontend.
- Gemeinsames Produkt: Daten werden gesammelt oder importiert, transformiert, in einer Datenbank gespeichert, wieder als JSON ausgeliefert und in einer Story visualisiert.
- Abschluss: Am letzten Kurstag stellen die Studierenden ihre Projekte an
  einem Marktstand aus. Das Projekt muss deshalb bereits Ende Tag 7
  ausstellungsfähig sein.
- Datenjournalismus und Storytelling laufen ab dem Kickoff als Begleitspur zur
  technischen Strecke. Recherche und Themenfindung beginnen nicht erst nach
  PHP, Datenbank und ETL.
- Dieses Repository plant den Web-App-Teil von IM3. Physical Computing ist ein
  zweiter, parallel anschlussfähiger Teil, der später separat ausgearbeitet
  wird.
- Sensorboxen aus Physical Computing können Messwerte über eine API liefern
  und sind damit mögliche Datenquellen für den Web-App-/ETL-Teil.
- Ausgangslage: Dieses Repo enthält Material vom letzten Semester. Es gibt bereits PHP-Cheatsheets, Code-Alongs und ein `etl-boilerplate`, aber noch keine durchgehende Kursstruktur wie im guten Referenzkurs `2026_im2_javascript-main`.
- Didaktische Herausforderung: PHP und Datenbanken sind fuer viele Studierende nicht intrinsisch attraktiv. Der Kurs muss deshalb kleinschrittig, klar geführt und stark projektbezogen sein.

## Zielbild

IM3 soll wie IM2 eine klare Materialstruktur erhalten:

- `README.md`: Einstieg, Lernziele, Repo-Orientierung, Projektziel.
- `ABLAUF.md`: Tages-/Wochenplan fuer Dozierende und LBAs.
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
- Mehrere Extract-Varianten:
  - Live-API ueber Zeitraum sammeln
  - statisches JSON importieren
  - CSV importieren
  - eigenes Dataset vorbereiten
- Gemeinsame Schnittstellenvereinbarung zwischen Backend- und Frontend-Team.

## Empfohlene Repo-Struktur

```txt
.
├── README.md
├── ABLAUF.md
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

Ziel: Studierende verstehen PHP als Lieferant von JSON-Daten.

Inhalte:

- Arrays zu JSON mit `json_encode`
- JSON lesen mit `json_decode`
- HTTP-Header `Content-Type: application/json`
- GET-Parameter mit `$_GET`
- kleine API-Endpunkte

Material:

- `cheatsheets/08_array2json.md`
- Code-Along `06_json_endpoint`
- Übungsblock `uebungen/02_arrays_json/`

Mögliche Übungen:

- `a_team_json`: Teamdaten als JSON ausgeben.
- `b_filter_by_city`: GET-Parameter auswerten.
- `c_error_response`: Fehler und leere Resultate sauber als JSON zurückgeben.

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
- Physical-Computing-Sensorbox: wird wie eine Live-API behandelt. Ideal ist
  eine Box mit gespeicherter Historie oder ausreichend hoher Messfrequenz.
- Eigenes Dataset: manuell erhobene Daten oder ein Export aus einer Tabelle,
  die trotzdem durch Transform und Load laufen.

Priorität bei der Projektwahl:

1. Historischer Datensatz mit genügend Beobachtungen und einer interessanten
   Frage.
2. API oder Sensorbox mit vorhandener Historie.
3. Reine Live-Sammlung nur dann, wenn Datenmenge und Aussage bis zum Marktstand
   realistisch gesichert sind.

Jedes Projekt hält für die Ausstellung einen stabilen Datenstand als
JSON-/CSV-Datei oder in der eigenen Datenbank bereit. Der Marktstand darf
nicht vollständig von einer gerade erreichbaren Fremd-API oder Sensorbox
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

Material:

- später ausarbeiten
- vorerst `projekt/brief.md`, `projekt/milestones.md`, `stift-und-papier/03_story_angle`

Begleitspur über die Kurstage:

- Tag 1: Beispielprojekte ansehen und zwei mögliche Themenfelder sammeln.
- Zwischen Tag 1 und 2: sehr kleine Recherche zu möglichen Fragen und Quellen.
- Tag 2: kurzer Input zu Datenfrage, Quelle und journalistischer Relevanz.
- Tag 3: Frage und Datenquelle prüfen und festlegen.
- Tag 4: Grenzen, Lücken und Transformationsbedarf der gewählten Daten notieren.
- Tag 5: Storyline, Chart-Idee und Datenvertrag ausarbeiten.
- Tag 6 bis 7: Story, Visualisierung und Quellenhinweise parallel zum Backend
  entwickeln.
- Tag 8: Story und Projekt am Marktstand vermitteln.

## Anschluss an Physical Computing

Physical Computing ist ein zweiter Teil von IM3 und wird in einer späteren
Planungsphase detailliert. Der Web-App-Teil soll dafür eine klare
Anschlussstelle bieten:

- Sensorboxen dürfen ihre Messwerte über HTTP/JSON bereitstellen.
- Für den ETL-Prozess ist eine Sensorbox eine weitere API-Datenquelle.
- Die Daten können live übernommen oder aus einem gespeicherten Verlauf
  importiert werden.
- Ein Projekt darf Physical-Computing-Daten verwenden, soll aber nicht von
  Hardware abhängen, die während des Web-App-Kurses noch nicht verfügbar ist.
- Für den Marktstand braucht auch ein Sensorprojekt einen gespeicherten
  Datenstand oder eine robuste Offline-Demonstration.

## Vorschlag Ablauf ueber 8 Kurstage

Die genaue Kalenderplanung kann später ergänzt werden. Dieser Ablauf geht von acht Unterrichtstagen aus, verteilt über mehrere Wochen.

Das Grundprinzip ist eine gemeinsame technische Lernstrecke an Tag 1 bis 4,
ein Frontend- und Projektstart an Tag 5 und betreute Projektarbeit an Tag 6 bis
8. Als roter Faden eignet sich ein kleiner, gut verständlicher Datensatz wie
Aare.guru. Die Struktur des IM2-Kurses dient als Orientierung, die Themen und
Übungen werden aber eigenständig für den Datenkontext von IM3 entwickelt.

### Tag 1 - Kickoff, Tooling und PHP-Grundlagen

- Kickoff: Modulziel und fertiges Beispielprojekt zeigen.
- Marktstand als sichtbares Abschlussformat ankündigen und anhand eines
  Beispielstands zeigen, worauf der Kurs hinausläuft.
- Gruppenbildung: Vierergruppen und vorläufige Backend-/Frontend-Zweierteams.
- Tooling: Serverzugang, PHP-Setup und erste PHP-Datei prüfen.
- PHP-Basics: Variablen, Ausgabe und einfache Funktionen.
- Vorhandene Code-Alongs zu Servercheck, Variablen und Funktionen übernehmen
  und vereinfachen.
- Datennahe Mini-Übung: aus vorbereiteten Variablen eine kleine
  Aare-Messmeldung erzeugen.
- Story-Begleitspur: zwei mögliche Themenfelder oder Beobachtungen sammeln.
- Abschluss: sehr kurze Repetition und gemeinsames Lesen einer Fehlermeldung.

Output:

- Jede Person kann eine PHP-Datei ausführen und einfache Werte ausgeben.
- Die Vierergruppen stehen.

### Tag 2 - Bedingungen, Arrays, Schleifen und JSON

- Repetition.
- Bedingungen, Arrays, assoziative Arrays, Schleifen.
- Code-Alongs: `03_bedingungen`, `04_arrays`, `05_schleifen`.
- Ein sehr kleines vorbereitetes Mini-Dataset verwenden, zum Beispiel sieben
  Aare-Messungen.
- Aufgaben in Einzelschritten: einen Wert lesen, alle Werte ausgeben, einen
  Wert filtern, Minimum oder Maximum finden.
- Dasselbe PHP-Array am Schluss mit `json_encode` als JSON ausgeben.
- Analoge Übung: einen Datensatz und eine Liste von Datensätzen auf Papier
  darstellen.
- Kurzer Story-Input: Was ist eine Datenfrage und woran erkennt man eine
  brauchbare Datenquelle?
- Kleine Rechercheaufgabe: pro Gruppe zwei mögliche Fragen und passende
  bestehende Datensätze suchen.

Output:

- Jede Person kann ein Array von Datensätzen durchlaufen und Werte berechnen/ausgeben.
- Jede Person hat gesehen, wie aus einem PHP-Array JSON wird.

### Tag 3 - Externe API, Datenbank und PDO

- JSON vom Vortag kurz repetieren.
- Eine kleine Antwort von Aare.guru gemeinsam holen und lesen.
- Nur die wenigen Felder auswählen, die im Kursbeispiel gebraucht werden.
- Datenbank-Grundlagen: Tabelle, Zeile, Spalte und Primärschlüssel.
- PDO-Verbindung sowie genau ein vorbereitetes `INSERT` und `SELECT`.
- Analoge Übung: für die Messwerte ein kleines ERM beziehungsweise zunächst
  eine einzelne Tabelle zeichnen.
- Einen vorbereiteten Aare-Messwert in die Datenbank schreiben und wieder
  lesen.
- Projektgruppen prüfen ihre zwei Ideen auf Relevanz, Datenmenge, Zeitraum,
  Felder und technische Zugänglichkeit.
- Bestehende historische Datensätze bevorzugen; Live-APIs und Sensorboxen nur
  wählen, wenn genügend Daten bis zur Ausstellung gesichert sind.

Output:

- Jede Person versteht den Weg von einer JSON-Antwort zu einem PHP-Array.
- Das Backend kann einen Messwert mit PDO speichern und wieder auslesen.
- Die Studierenden kennen die Grundidee eines ERM.
- Jede Gruppe hat eine erste Datenfrage und eine plausible Datenquelle gewählt.

### Tag 4 - Kompletter ETL-Durchstich

- Was ist ETL? Extract, Transform, Load und Unload als sichtbare Pipeline.
- Gemeinsamer Durchstich mit demselben Aare-Beispiel:
  API holen, Felder auswählen/umbenennen, in die Datenbank schreiben und als
  einfaches JSON wieder ausgeben.
- Die vier Dateien `extract.php`, `transform.php`, `load.php` und `unload.php`
  zeigen und klar voneinander abgrenzen.
- Extract-Strategien kurz demonstrieren: Live-API, statisches JSON, CSV und
  selbst erhobene Daten beziehungsweise Sensorboxen. Diese Varianten werden
  nicht alle als grosse Übung implementiert.
- Jede Gruppe ordnet ihre bereits gewählte Quelle einer Extract-Strategie zu
  und prüft einen kleinen Rohdaten-Ausschnitt.
- Story-Begleitspur: Datenlücken, Grenzen und notwendige Transformationen
  notieren.

Output:

- Jede Person kann den vollständigen ETL-/Unload-Weg erklären.
- Ein kleines gemeinsames Beispiel läuft vom Extract bis zum JSON-Endpunkt.
- Jede Gruppe hat die technische Machbarkeit ihrer Datenquelle geprüft.

### Tag 5 - Chart.js, Story und Projektstart

- Sehr kompakter Chart.js-Code-Along mit vorbereiteten Daten.
- Danach `fetch()` auf einen vorbereiteten JSON-Endpunkt.
- Story-Frage, Aussage und geeigneten Chart-Typ in einfacher Form behandeln.
- Datenfrage schärfen und Rollen bestätigen.
- Gruppe zeichnet das eigene ERM und den ETL-Datenfluss.
- Backend und Frontend füllen gemeinsam den Datenvertrag aus.
- Frontend erstellt daraus eine Mock-JSON-Datei und beginnt unabhängig vom
  Backend mit dem ersten Chart.

Output:

- Jede Gruppe hat Datenquelle, Story-Frage, ERM, ETL-Skizze und Datenvertrag.
- Das Frontend hat einen ersten Chart mit Mock-Daten.

### Tag 6 - Projektwerkstatt: isolierte Teile

- Backend-Team:
  - Extract implementieren.
  - Transform-Regeln definieren.
  - Load in Datenbank und einfachen Unload testen.
- Frontend-Team:
  - Story-Frage schärfen.
  - Chart mit Mock-Daten bauen.
  - Story-Aufbau skizzieren.
- Dozierende und LBAs unterstützen beide Zweierteams gezielt.

Output:

- Backend-ETL und Frontend-Prototyp funktionieren jeweils isoliert.

### Tag 7 - Projektwerkstatt: Integration und Ausstellungsfassung

- Backend:
  - Unload-Endpunkt finalisieren.
  - Fehler, Parameter, Limit, Sortierung.
- Frontend:
  - `fetch()` auf echten Endpunkt.
  - Chart mit echten Daten.
  - Story-Layout und Text.
- Zwischenkritik: Funktioniert die Aussage mit den Daten?
- Datenvertrag nur gemeinsam ändern; Mock-Daten und echten Endpunkt danach
  wieder angleichen.
- Ausstellungsfassung fertigstellen und auf dem vorgesehenen Gerät testen.
- Stabilen Datenstand und Fallback vorbereiten, falls Fremd-API, Netzwerk oder
  Sensorbox am Marktstand nicht verfügbar sind.
- Stand in einem kurzen Probelauf einer anderen Gruppe zeigen.

Output:

- Eine integrierte und ausstellungsfähige Fassung läuft Ende Tag.

### Tag 8 - Marktstand und Abgabe

- Kurzer Aufbau, Geräte- und Fallback-Test; keine grossen neuen Features mehr.
- Projekte am Marktstand ausstellen und Besucherinnen und Besuchern erklären.
- Story, Visualisierung, Datenquelle und technische Pipeline sichtbar machen.
- Abgabe von Code, README, Quellen und dokumentierten Limitationen.
- Kurze gemeinsame Reflexion nach dem Marktstand: Was machen Extract,
  Transform, Load und Unload?

Output:

- Projekt wurde öffentlich ausgestellt und ist abgegeben.
- Studierende können ihren technischen Prozess erklären.

## Projekt-Meilensteine

Die Meilensteine sind keine zusätzliche Unterrichtsreihe. Sie sind kurze
Abnahmepunkte am Ende eines Kurstages. Eine Gruppe zeigt jeweils ein kleines,
konkretes Ergebnis, bevor sie weiterarbeitet.

### M0 - Gruppe und Rollen (Ende Tag 1)

- Vierergruppe steht.
- Backend-/Frontend-Zweierteams sind vorläufig festgelegt.

### M1 - Idee und Datenquelle (Ende Tag 3)

- Erste Datenfrage ist formuliert.
- Datenquelle ist plausibel.
- Der Datensatz enthält bereits genügend Daten für das Projekt oder die Gruppe
  kann nachvollziehbar zeigen, wie bis zum Marktstand genügend Daten entstehen.

### Technischer Quellencheck (Ende Tag 4)

- Ein kleiner Rohdaten-Ausschnitt konnte gelesen werden.
- Die Gruppe kennt ihre Extract-Strategie.
- Risiken wie Rate Limits, fehlende Historie, Hardware- oder
  Netzwerkabhängigkeit sind bekannt.

### M2 - Projektgrundlage und Datenvertrag (Ende Tag 5)

- Backend und Frontend einigen sich auf JSON-Struktur.
- ERM und ETL-Datenfluss sind skizziert.
- Beispielantwort liegt als Mock-JSON vor.
- Frontend kann mit Mock-Daten arbeiten.

### M3 - Teile funktionieren isoliert (Ende Tag 6)

- Extract liefert Rohdaten.
- Transform liefert saubere Projektdaten.
- Load schreibt in DB.
- Unload liefert JSON.
- Der Frontend-Chart funktioniert mit Mock-Daten.
- Der grobe Story-Aufbau steht.

### M4 - Integration (Ende Tag 7)

- Chart.js konsumiert echten JSON-Endpunkt.
- Story nutzt mindestens eine sinnvolle Visualisierung.
- Quelle und Limitationen sind sichtbar.
- Projekt ist am vorgesehenen Gerät ausstellungsfähig.
- Ein stabiler Datenstand beziehungsweise Fallback ist vorhanden.

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
- Für Tag 1 bis 4 möglichst denselben kleinen Beispieldatensatz verwenden,
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
- Marktstand früh kommunizieren und die ausstellungsfähige Fassung bis Ende
  Tag 7 verlangen.
- Für externe APIs und Sensorboxen immer einen stabilen Daten-Fallback für die
  Ausstellung vorsehen.

## Nächste Arbeitsschritte

1. `README.md` auf neue Kursstruktur und Projektziel umschreiben.
2. `ABLAUF.md` nach IM2-Vorbild erstellen.
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
   Sensorbox-Projekte erstellen.
