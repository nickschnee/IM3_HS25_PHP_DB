# Planung IM3 HS25 - PHP, Datenbanken, ETL und Datenstory

## Kontextnotizen

- Modul: Interaktive Medien 3.
- Hauptziel: Die Studierenden entwickeln in Vierergruppen ein datenjournalistisches Projekt.
- Gruppenlogik: Eine Vierergruppe teilt sich in zwei Zweierteams.
- Backend-Team: baut mit PHP einen einfachen ETL-Prozess auf einem PHP-Server.
- Frontend-Team: entwickelt Story, Datenvisualisierung und Chart.js-Frontend.
- Gemeinsames Produkt: Daten werden gesammelt oder importiert, transformiert, in einer Datenbank gespeichert, wieder als JSON ausgeliefert und in einer Story visualisiert.
- Abschluss: Am letzten Kurstag stellen die Studierenden ihre Projekte an
  einem Marktstand aus. Die technisch integrierte Fassung muss deshalb am
  vorletzten Web-/Daten-Tag stehen; der letzte UX-Tag kann noch der
  gestalterischen Fertigstellung dienen.
- Datenjournalismus und Storytelling laufen ab dem Kickoff als Begleitspur zur
  technischen Strecke. Recherche und Themenfindung beginnen nicht erst nach
  PHP, Datenbank und ETL.
- Dieses Repository plant den Web-App-Teil von IM3. Physical Computing ist ein
  zweiter, parallel anschlussfähiger Teil, der später separat ausgearbeitet
  wird.
- Zwei der zehn Kurstermine sind ausschliesslich für UX reserviert: ein
  Input-Tag und ein Coaching-Tag. Die fachliche Planung und Durchführung
  dieser UX-Tage liegt bei einer anderen verantwortlichen Person und ist nicht
  Teil dieses Dokuments.
- Sensorboxen aus Physical Computing können Messwerte über eine API liefern
  und sind damit mögliche Datenquellen für den Web-App-/ETL-Teil.
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

- Web-Tag 1: Im Begleitprogramm Beispielprojekte ansehen und mögliche
  Themenfelder sammeln.
- Web-Tag 2: kurzer Input zu Datenfrage, Quelle und journalistischer Relevanz.
- Web-Tag 3: mögliche Fragen und Datenquellen recherchieren.
- Web-Tag 4: Frage und Datenquelle prüfen und festlegen.
- UX-Tag 1: ausschliesslich UX-Input; Inhalte durch die UX-Verantwortlichen.
- Web-Tag 5: Datenlücken, Transformationen, Datenvertrag und Projektgrundlage.
- Web-Tag 6 (Halbtag): Projektstand prüfen, Blockaden lösen und Umsetzung
  vorbereiten.
- Web-Tag 7: Story, Chart und Backend integrieren.
- UX-Tag 2: ausschliesslich UX-Coaching vor dem Marktstand.
- Web-Tag 8: Story und Projekt am Marktstand vermitteln.

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

## Vorschlag: 8 Web-/Daten-Tage und 2 UX-Tage

Der gesamte Kurs umfasst zehn Termine beziehungsweise 9,5 Unterrichtstage.
Acht Termine gehören zum hier geplanten Web-/Daten-Teil. Zwei Termine sind
ausschliesslich für UX reserviert und werden von den UX-Verantwortlichen
geplant: ein Input-Tag und ein Coaching-Tag. Der siebte Kalendertag ist ein
Halbtag im Web-/Daten-Teil und erhält keinen neuen fachlichen Input.

Die folgende Verteilung ist ein Arbeitsvorschlag und kann später an den
definitiven Kalender angepasst werden:

| Kalendertag | Verantwortung | Schwerpunkt |
| --- | --- | --- |
| 1 | Web/Daten | Kickoff, Tooling, Begleitprogramm |
| 2 | Web/Daten | PHP Basics |
| 3 | Web/Daten | Bedingungen, Arrays, Schleifen, JSON |
| 4 | Web/Daten | API, Datenbank, PDO und ERM |
| 5 | UX | UX-Input |
| 6 | Web/Daten | ETL-Durchstich und Projektgrundlage |
| 7, Halbtag | Web/Daten | Projekt-Checkpoint und Support, kein neuer Input |
| 8 | Web/Daten | Chart.js, Projektwerkstatt und technische Integration |
| 9 | UX | UX-Coaching und Fertigstellung vor Ausstellung |
| 10 | Web/Daten | Marktstand und Abgabe |

Die Web-/Daten-Tage werden unten als Web-Tag 1 bis 8 bezeichnet. Als roter
Faden eignet sich weiterhin ein kleiner, historischer Datensatz wie
Aare.guru. Die beiden UX-Tage werden hier bewusst nicht inhaltlich geplant.

### Kapazitätsgrenze

Von den acht Web-/Daten-Terminen sind Web-Tag 1 vollständig für Organisation
und Tooling, Web-Tag 6 nur ein Halbtag und Web-Tag 8 für den Marktstand
reserviert. Für PHP, Datenbank, ETL, Chart.js und technische Projektarbeit
bleiben damit fünfeinhalb Tage. Der Ablauf bleibt dicht und funktioniert nur
mit bewusst kleinem Projektumfang:

- eine Datenquelle pro Projekt;
- möglichst ein historischer, sofort verfügbarer Datensatz;
- ein kleines Datenmodell, idealerweise mit einer zentralen Tabelle;
- bereitgestelltes ETL-Boilerplate statt freier Architektur;
- ein zentraler JSON-Endpunkt;
- mindestens eine, aber keine unnötig komplexe Chart.js-Visualisierung;
- Projektplanung ab Web-Tag 3 und technische Umsetzung spätestens ab Web-Tag
  5;
- klar definierte Übergaben aus UX-Input und UX-Coaching.

Der zusätzliche Halbtag an Web-Tag 6 schafft einen wichtigen Kontrollpunkt,
aber keinen weiteren vollen Produktionstag. Chart.js, Umsetzung und
Integration an Web-Tag 7 müssen deshalb weiterhin stark vorbereitet und durch
Boilerplate unterstützt werden.

### Web-Tag 1 / Kalendertag 1 - Kickoff, Tooling und Begleitprogramm

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
  - Ablauf, UX-Tage, Meilensteine und Marktstand einordnen.

Output:

- Jede Person erreicht den Server und kann eine PHP-Testdatei aufrufen.
- Die Vierergruppen stehen und kennen den Projektablauf.
- Jede Gruppe hat erste Themenfelder, aber noch keine erzwungene definitive
  Datenquelle.

### Web-Tag 2 / Kalendertag 2 - PHP Basics

- Sehr kurze Einführung: Was macht PHP auf dem Server?
- Variablen, Datentypen, `echo` und String-Ausgabe.
- Einfache Funktionen mit Parametern und Rückgabewert.
- Einfache Bedingungen, soweit es der Tagesumfang erlaubt.
- Vorhandene Code-Alongs stark vereinfachen.
- Datennahe Mini-Übungen mit vorbereiteten Messwerten.
- Begleitprogramm: Was ist eine Datenfrage und was macht eine Quelle
  interessant?

Output:

- Jede Person kann Werte speichern, ausgeben und durch eine einfache Funktion
  verarbeiten.
- Bedingungen wurden mindestens gemeinsam gelesen und verändert.

### Web-Tag 3 / Kalendertag 3 - Datenstrukturen und JSON

- Repetition der PHP Basics.
- Bedingungen abschliessen.
- Arrays, assoziative Arrays und Schleifen.
- Kleines historisches Mini-Dataset durchlaufen und einzelne Werte ausgeben.
- PHP-Array mit `json_encode` als JSON ausgeben.
- Optional bei genügend Zeit: eine vorbereitete externe JSON-Antwort lesen.
- Begleitprogramm: mögliche Datenfragen und historische Quellen recherchieren.

Output:

- Jede Person kann eine Liste kleiner Datensätze durchlaufen.
- Jede Person versteht die Verbindung zwischen PHP-Array und JSON.
- Jede Gruppe hat zwei mögliche Datenfragen und Quellen.

### Web-Tag 4 / Kalendertag 4 - API, Datenbank, PDO und ERM

- Eine kleine externe JSON-Antwort, zum Beispiel Aare.guru, gemeinsam holen
  und lesen.
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

### UX-Tag 1 / Kalendertag 5 - Input

- Ausschliesslich UX-Input.
- Inhalt und Tagesplanung liegen bei den UX-Verantwortlichen.
- Für die gemeinsame Projektplanung ist danach ein erster UX-/Interface-Stand
  hilfreich; die konkrete Form wird mit den UX-Verantwortlichen abgestimmt.

### Web-Tag 5 / Kalendertag 6 - ETL-Durchstich und Projektgrundlage

- Extract, Transform, Load und Unload als sichtbare Pipeline erklären.
- Vollständiger gemeinsamer Durchstich mit dem Referenzdatensatz:
  Rohdaten lesen, Felder auswählen/umbenennen, in die Datenbank schreiben und
  als JSON ausgeben.
- Dateien `extract.php`, `transform.php`, `load.php` und `unload.php` klar
  voneinander abgrenzen.
- Extract-Varianten kurz zeigen: API, historisches JSON, CSV, eigene Daten und
  Sensorbox.
- Jede Gruppe prüft einen Rohdaten-Ausschnitt ihrer eigenen Quelle.
- Gruppe erstellt ERM, ETL-Skizze, Transform-Regeln und Datenvertrag.
- Frontend erhält Mock-JSON; Backend richtet die Projektstruktur ein.

Output:

- Jede Person kann den ETL-/Unload-Weg erklären.
- Jede Gruppe hat eine technisch geprüfte Quelle und eine umsetzbare
  Projektgrundlage.
- Backend und Frontend können ab jetzt getrennt arbeiten.

### Web-Tag 6 / Kalendertag 7, Halbtag - Projekt-Checkpoint und Support

An diesem Halbtag gibt es keinen neuen fachlichen Input.

- Kurzer Stand-up pro Gruppe: Was läuft, was fehlt, was blockiert?
- Backend zeigt Rohdaten, Projektstruktur oder einen ersten Datenbanktest.
- Frontend zeigt Mock-JSON und den Stand aus dem UX-Input.
- Datenvertrag, Umfang und Aufgabenverteilung prüfen.
- Technische und inhaltliche Blockaden mit Dozierenden/LBAs lösen.
- Verbindliche Aufgaben für Web-Tag 7 festhalten.

Output:

- Jede Gruppe kennt ihren realistischen Weg bis zur technischen Integration.
- Kritische Blockaden und zu grosser Projektumfang sind erkannt.

### Web-Tag 7 / Kalendertag 8 - Chart.js und Projektwerkstatt

- Kompakter Chart.js-Code-Along mit vorbereitetem Mock-JSON.
- `fetch()` auf einen vorbereiteten Unload-Endpunkt.
- Danach betreute Projektarbeit in den Zweierteams.
- Backend-Team:
  - eigenen Extract, Transform, Load und Unload fertigstellen;
  - stabilen Datenstand als Fallback sichern.
- Frontend-Team:
  - Chart mit Mock-Daten und danach mit echten Daten verbinden;
  - Story, Quellen und Limitationen ergänzen;
  - UX-Ergebnisse in die Darstellung übernehmen.
- Gesamtgruppe integriert Backend, Frontend und UX-Stand.
- Ausstellungsfassung technisch testen.

Output:

- Backend und Frontend funktionieren zunächst isoliert und danach integriert.
- Eine technisch ausstellungsfähige Fassung und ein Daten-Fallback stehen.

### UX-Tag 2 / Kalendertag 9 - Coaching

- Ausschliesslich UX-Coaching.
- Inhalt und Tagesplanung liegen bei den UX-Verantwortlichen.
- Gemeinsames Ziel ist die gestalterische und kommunikative Fertigstellung für
  den Marktstand; technische Kernfunktionen müssen bereits vorhanden sein.

### Web-Tag 8 / Kalendertag 10 - Marktstand und Abgabe

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

### M0 - Tooling, Gruppe und Rollen (Ende Web-Tag 1 / Kalendertag 1)

- Serverzugang und PHP-Test funktionieren.
- Vierergruppe steht.
- Backend-/Frontend-Zweierteams sind vorläufig festgelegt.

### M1 - Idee und Datenquelle (Ende Web-Tag 4 / Kalendertag 4)

- Erste Datenfrage ist formuliert.
- Datenquelle ist plausibel.
- Der Datensatz enthält bereits genügend Daten für das Projekt oder die Gruppe
  kann nachvollziehbar zeigen, wie bis zum Marktstand genügend Daten entstehen.

### M2 - Projektgrundlage und Datenvertrag (Ende Web-Tag 5 / Kalendertag 6)

- Ein kleiner Rohdaten-Ausschnitt konnte gelesen werden.
- Die Gruppe kennt ihre Extract-Strategie.
- Risiken wie Rate Limits, fehlende Historie, Hardware- oder
  Netzwerkabhängigkeit sind bekannt.
- Backend und Frontend einigen sich auf JSON-Struktur.
- ERM und ETL-Datenfluss sind skizziert.
- Beispielantwort liegt als Mock-JSON vor.
- Frontend kann mit Mock-Daten arbeiten.

### Zwischencheck (Web-Tag 6 / Kalendertag 7, Halbtag)

- Backend und Frontend zeigen ihren aktuellen Stand.
- Blockaden, Umfang und nächste Aufgaben sind geklärt.
- Es gibt keinen zusätzlichen grossen Abgabe-Meilenstein.

### M3 - Technik integriert (Ende Web-Tag 7 / Kalendertag 8)

- Extract liefert Rohdaten.
- Transform liefert saubere Projektdaten.
- Load schreibt in DB.
- Unload liefert JSON.
- Der Frontend-Chart funktioniert zuerst mit Mock-Daten und danach mit dem
  echten JSON-Endpunkt.
- Der grobe Story-Aufbau steht.
- Ein stabiler Datenstand beziehungsweise Fallback ist vorhanden.

### M4 - Ausstellungsfassung (Ende UX-Tag 2 / Kalendertag 9)

- Story nutzt mindestens eine sinnvolle Visualisierung.
- Quelle und Limitationen sind sichtbar.
- Projekt ist am vorgesehenen Gerät ausstellungsfähig.
- Die konkrete UX-Abnahme wird mit den UX-Verantwortlichen abgestimmt.

### M5 - Marktstand und Abgabe (Web-Tag 8 / Kalendertag 10)

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
- Für Web-Tag 2 bis 5 möglichst denselben kleinen Beispieldatensatz verwenden,
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
- Web-Tag 1 enthält noch keinen PHP-Grundlagenunterricht. Kickoff, Tooling,
  Servereinrichtung und Begleitprogramm erhalten den ganzen Tag.
- Die beiden UX-Tage enthalten keine Web-/Daten-Inputs. Ihre fachliche Planung
  liegt bei den UX-Verantwortlichen: ein Input-Tag und ein Coaching-Tag.
- Kalendertag 7 ist ein halber Web-/Daten-Tag ohne neuen fachlichen Input. Er
  dient nur dem Projekt-Checkpoint, Support und der Aufgabenplanung.
- Die technische Fassung muss Ende Kalendertag 8 stehen; UX kann sie an
  Kalendertag 9 gestalterisch und kommunikativ fertigstellen.
- Für externe APIs und Sensorboxen immer einen stabilen Daten-Fallback für die
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
   Sensorbox-Projekte erstellen.
