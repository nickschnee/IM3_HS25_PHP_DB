# Umsetzungsplan IM3

> Operativer Stand: 22. Juli 2026. Die inhaltliche Quelle der Wahrheit ist
> [`PLANUNG.md`](PLANUNG.md). Der konkrete Unterrichtsablauf wird in
> [`ABLAUF.md`](ABLAUF.md) gepflegt.

## Was sich gegenüber dem alten Plan geändert hat

Die Planung und die Miro-Boards sind konsolidiert. Deshalb wird das Repository
nicht mehr zuerst vollständig inventarisiert und danach in einem zweiten
grossen Schritt umgebaut. Die Umsetzung erfolgt ab jetzt **Theorieblock für
Theorieblock**. Bestehendes Material wird jeweils genau dann geprüft, wenn der
zugehörige Block bearbeitet wird.

Jedes Materialpaket enthält nach Möglichkeit:

1. einen kurzen, browserbasierten Theorie-Input;
2. mindestens ein geführtes Code-Along mit Ablauf und Lösung;
3. mindestens eine analoge Stift-und-Papier-Übung;
4. mehrere niederschwellige digitale Übungen mit Startcode und Lösung;
5. passende Verweise im Zehn-Tage-Ablauf;
6. einen kleinen Anschluss an das Referenzprojekt.

So entsteht früh ein tatsächlich unterrichtbarer Teil des Kurses, während der
technische rote Faden kontrolliert weiterwächst.

## Verbindliche Leitplanken

- Zehn vollwertige Kurstage; Tag 10 ist Marktstand und Abgabe.
- Tag 1 enthält Kickoff, Gruppenbildung, Tooling und Server, aber keine
  PHP-Grundlagen.
- Die ausstellungsfähige Fassung steht bis Ende Tag 9.
- Datenjournalismus läuft ab Tag 1 als Begleitspur.
- Pascal Alisser erhält an Tag 4 zwei Stunden inklusive Fragen.
- Der UX-Block bleibt vorerst flexibel; Tag 8/9 sind reservierte Platzhalter.
- Übungen führen höchstens ein neues Konzept pro Schritt ein.
- Für Tag 2 bis 7 wird dieselbe kleine Aare-Datenwelt verwendet, solange sie
  didaktisch trägt.
- Historische Daten werden bevorzugt. Externe und Sensor-APIs brauchen einen
  gespeicherten Fallback.
- Das Projekt bleibt klein: eine Quelle, ein kleines Datenmodell, ein zentraler
  JSON-Endpunkt und mindestens ein einfacher Chart.

## Aktueller Stand

| Paket | Ergebnis | Status |
| --- | --- | --- |
| Kursgerüst | Zehn-Tage-Plan mit Muss/Soll/Optional und Meilensteinen | Erste Fassung erstellt |
| Block A – PHP Basics | Theorie, `Hallo PHP`, fünf Code-Alongs, fünf digitale Übungen, eine analoge Übung | Erste Fassung erstellt; Praxistest offen |
| Block B – PHP, JSON/APIs | Lokales JSON, Endpunkt, `$_GET`, vorbereiteter API-Helper | Offen |
| Block C – Datenbanken/PDO | DB-Tooling, SQL/ERM Light und CRUD | Offen |
| Block D – ETL+U | Extract-Varianten, Transform, Load und Unload | Offen |
| Block E – Chart.js | Diagrammwahl, Implementierung und `fetch()` | Offen |
| Block F – Datenjournalismus | Begleitspur und Pascal-Alisser-Input | Offen |
| Projektpaket | Auftrag, Rollen, Datenvertrag, Meilensteine, Bewertung, Marktstand | Offen |
| Referenzprojekt | Vollständiger Aare-Datenweg mit Fallback | Offen |
| Qualitätssicherung | Zielserver-, Zeit- und Unterrichtstest | Offen |

## Qualitätsstandard für Materialien

### Theorie

- [ ] klare Leitfrage und sichtbarer Bezug zum Projektdatenfluss;
- [ ] höchstens 20 bis 40 Minuten Input am Stück;
- [ ] wenig Syntax pro Folie und grosse, projizierbare Darstellung;
- [ ] definierter Übergang zum nächsten Code-Along oder zur nächsten Übung;
- [ ] zentrale Begriffe stimmen mit Cheatsheets und Projektvorlagen überein.

### Code-Along

- [ ] ein sichtbares Ziel und ein vorbereiteter Startzustand;
- [ ] Ablaufdatei mit Lernziel, Richtzeit und kleinen Schritten;
- [ ] keine versteckten neuen Konzepte;
- [ ] funktionierende Endfassung in `solution/`;
- [ ] kurzer Gesprächspunkt zum späteren Projekttransfer.

### Digitale Übung

- [ ] ein einziges, klar formuliertes Lernziel;
- [ ] drei bis fünf kleine nummerierte Schritte;
- [ ] ausführbarer Startcode und sichtbares erwartetes Resultat;
- [ ] kurze Hilfen für typische Blockaden;
- [ ] vollständige Lösung;
- [ ] freiwillige Zusatzaufgabe klar vom Pflichtteil getrennt.

### Stift und Papier

- [ ] ohne Editor und ohne KI-Tool lösbar;
- [ ] klares Material und Moderationsablauf;
- [ ] zwingt zu Datenfluss, Struktur oder Entscheid vor dem Code;
- [ ] enthält eine Lösung oder Besprechungsgrundlage;
- [ ] wird im `ABLAUF.md` an einer konkreten Stelle eingesetzt.

## Paket 1 – Kursgerüst

### Erledigt

- [x] Alle zehn Kurstage mit Lernziel und Tagesergebnis abbilden.
- [x] Muss-, Soll- und optionale Inhalte unterscheiden.
- [x] Story-/Recherche-Begleitspur integrieren.
- [x] M1 bis M5 den Kurstagen zuordnen.
- [x] Tag 1 ohne PHP-Grundlagen planen.
- [x] Zwei Stunden Pascal Alisser an Tag 4 reservieren.
- [x] Feature-Freeze und Ausstellungsfassung an Tag 9 verankern.
- [x] Marktstand, Abgabe und Reflexion an Tag 10 planen.

### Offen

- [ ] Richtzeiten mit den definitiven Unterrichtszeiten und Pausen abgleichen.
- [ ] Inhalt und Position der flexiblen UX-Slots entscheiden.
- [ ] Ablauf nach jedem Materialpaket auf Überladung prüfen.

## Paket 2 – Block A: PHP Basics

### Ziel

Studierende können einfache PHP-Skripte lesen, ändern und schreiben. Sie
speichern einen Messwert, verarbeiten ihn mit Funktion und Bedingung und
durchlaufen danach eine kleine Liste strukturierter Messungen.

### Erledigt

- [x] Browserbasierte Theorie für Tag 2 und 3 erstellen.
- [x] `Hallo PHP` für Tag 1 erstellen, ohne PHP-Syntax zu unterrichten.
- [x] Code-Alongs zu Variablen, Funktionen, Bedingungen, Arrays und Schleifen
  auf eine gemeinsame Aare-Datenwelt umstellen.
- [x] Abläufe und Lösungen für die Code-Alongs ergänzen.
- [x] Fünf selbständige Mini-Übungen mit Lösungen erstellen.
- [x] Analoge Messwertmaschine für Tag 2 und 3 erstellen.
- [x] Navigation in README und `ABLAUF.md` ergänzen.

### Offen vor Freigabe

- [ ] Alle PHP-Dateien mit der vorgesehenen PHP-Version prüfen.
- [ ] Code-Alongs und Übungen auf dem Zielserver ausführen.
- [ ] Theorie im Beamerformat visuell testen.
- [ ] Block A mit einer unerfahrenen Testperson zeitlich durchspielen.
- [ ] Bestehende Cheatsheets 00 bis 05 sprachlich und fachlich an das neue
  Material angleichen.

## Paket 3 – Referenzdaten und Block B: PHP, JSON/APIs

Dieses Paket ist der nächste sinnvolle Schritt. Tag 3 braucht bereits die
Brücke von der PHP-Liste zum eigenen JSON-Endpunkt. Dafür muss nun der kleine,
lokal mitgelieferte Datenausschnitt des Referenzprojekts festgelegt werden.

### Referenzdaten

- [ ] Kleinen historischen Aare-Datenausschnitt auswählen und lokal ablegen.
- [ ] Herkunft, Felder, Einheiten und Limitationen dokumentieren.
- [ ] Drei stabile Zielfelder festlegen, zum Beispiel `measured_at`,
  `location` und `temperature_c`.
- [ ] Mock-JSON als frühen Datenvertrag erstellen.
- [ ] Live-Abruf nur als optionale Ergänzung behandeln.

### Block-B-Material

- [ ] Theorie: `JSON rein -> PHP-Array -> filtern -> JSON raus`.
- [ ] Code-Along: lokale JSON-Datei einlesen und dekodieren.
- [ ] Code-Along: eigener JSON-Endpunkt mit korrektem Header.
- [ ] Digitale Übungen zu Laden, Auswählen, `$_GET`-Filter und Fehlerantwort.
- [ ] Vorbereiteten `fetchJson($url)`-Helper als kurze externe API-Demo zeigen.
- [ ] Analoge Übung zum Datenvertrag zwischen Backend und Frontend erstellen.
- [ ] `$_GET` und ausgehenden cURL-GET deutlich unterscheiden.

## Paket 4 – Block C: Datenbanken und PDO

- [ ] DB-Tooling-Check für Tag 4 erstellen.
- [ ] Theorie zu Tabelle, Zeile, Spalte, Schlüssel und Beziehung erstellen.
- [ ] ERM-Light-Übung auf dem Referenzdatensatz aufbauen.
- [ ] PDO- und CRUD-Code-Alongs auf Messwerte umstellen.
- [ ] Übungen für `SELECT`, `INSERT`, `UPDATE` und `DELETE` erstellen.
- [ ] Prepared Statements und einfache Fehlerbehandlung integrieren.
- [ ] Zielserver und Kursdatenbank testen.

## Paket 5 – Block D: ETL+U

- [ ] Referenzprojekt von Rohdaten bis `unload.php` funktionsfähig bauen.
- [ ] Extract-Muster für API, statisches JSON und CSV bereitstellen.
- [ ] Sensor-API als dieselbe HTTP/JSON-Variante einordnen.
- [ ] Transform-Regeln sichtbar und testbar machen.
- [ ] Load mit Prepared Statements und klarer Duplikatstrategie bauen.
- [ ] Unload nach gemeinsamem Datenvertrag umsetzen.
- [ ] ETL-Skizze und Transform-Regeln als analoge Übungen erstellen.
- [ ] Stabilen Daten-Fallback praktisch testen.

## Paket 6 – Block E: Chart.js

- [ ] Theorie zu Diagrammtypen und Aussage entwickeln.
- [ ] Ersten Chart mit statischen Mock-Daten bauen.
- [ ] Dieselbe Struktur über `fetch()` laden.
- [ ] Titel, Einheit, Quelle und Kernaussage verpflichtend machen.
- [ ] Mindestens eine digitale Übung und ein Code-Along mit Lösung erstellen.
- [ ] Mock-JSON und echten `unload.php`-Endpunkt austauschbar halten.

## Paket 7 – Block F und Projektunterlagen

- [ ] Story-Begleitspur für Tag 1 bis 10 als kleine Arbeitsaufträge schreiben.
- [ ] Input mit Pascal Alisser terminieren und briefen.
- [ ] Projektauftrag und Rollenmodell dokumentieren.
- [ ] Datenquellen-Check und API-Contract-Vorlage erstellen.
- [ ] Meilensteine und Definition of Done präzisieren.
- [ ] Bewertungskriterien transparent formulieren.
- [ ] Marktstand-, Abgabe- und Fallback-Checkliste erstellen.

## Paket 8 – Probelauf und Qualitätssicherung

### Technisch

- [ ] Pflichtbeispiele mit der vorgesehenen PHP-Version ausführen.
- [ ] Datenbank-Setup und Serverpfade testen.
- [ ] ETL+U einzeln und als ganzen Datenweg testen.
- [ ] Chart gegen Mock-Daten und echten Endpunkt testen.
- [ ] Fremd-API-Ausfall mit gespeichertem Fallback simulieren.

### Didaktisch

- [ ] Zeitbedarf pro Input, Code-Along und Übung messen.
- [ ] Tag 2 bis 7 mit realistischen Pausen durchspielen.
- [ ] Aufgaben von einer unerfahrenen Person bearbeiten lassen.
- [ ] Versteckte Voraussetzungen und unnötige Zusatzkonzepte entfernen.
- [ ] Muss/Soll/Optional anhand des Probelaufs korrigieren.

### Marktstand

- [ ] Projekt auf dem tatsächlich vorgesehenen Gerät öffnen.
- [ ] Darstellung, Bedienung und Lesbarkeit testen.
- [ ] Fallback ohne Fremd- oder Sensor-API testen.
- [ ] Kurze Erklärung von Story, Quelle und ETL+U erproben.

## Unmittelbar nächstes Arbeitspaket

1. Block A auf Ziel-PHP und im Browser prüfen und kleine Fehler korrigieren.
2. Den historischen Referenzdatenausschnitt und den ersten Datenvertrag
   festlegen.
3. Block B vollständig als Theorie-, Code-Along-, Analog- und Übungspaket
   umsetzen.
4. Danach Block C beginnen.

## Noch offene Entscheidungen

Diese Punkte blockieren Block B nicht, müssen aber vor dem jeweiligen Paket
geklärt werden:

- genaue Unterrichtszeiten und Pausen;
- PHP-Version, Zielserver und Datenbankumgebung;
- verfügbare Sensor-APIs und Boxen;
- Termin und Detailbriefing für Pascal Alisser;
- definitive UX-Platzierung;
- Bewertungskriterien und Marktstand-Organisation;
- erlaubte Hilfsmittel und Umgang mit KI während Übungen und Projekt.

## Pflege dieses Dokuments

- Nach jedem Materialpaket Status und offene Tests aktualisieren.
- Eine erste Fassung nicht mit einer getesteten Freigabe verwechseln.
- Neue Ideen dem passenden Paket zuordnen.
- Inhaltliche Änderungen zuerst in `PLANUNG.md`, operative Änderungen hier
  und konkrete Unterrichtsreihenfolge in `ABLAUF.md` pflegen.
