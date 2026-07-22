# Umsetzungsplan IM3

## Zweck

Dieses Dokument beschreibt, in welcher Reihenfolge der Kurs und das
Repository weiterentwickelt werden. Es ist die operative Arbeitsgrundlage und
wird während der Umsetzung als Checkliste gepflegt.

Die inhaltliche Kursplanung steht in `PLANUNG.md`. Der dauerhafte Kontext für
weitere Arbeiten steht in `../AGENTS.md`.

## Arbeitsprinzipien

- Zuerst den Kursablauf festlegen, danach einzelne Materialien produzieren.
- Bestehende Materialien prüfen und nur übernehmen, wenn sie in den neuen
  Lernpfad passen.
- Einen vollständigen, kleinen Datenweg als Referenz bauen, bevor viele
  isolierte Übungen entstehen.
- Übungen extrem niederschwellig gestalten: ein neues Konzept pro Schritt,
  vorbereitete Daten und ein sofort sichtbares Ergebnis.
- Für die gemeinsame Technikstrecke möglichst denselben Beispieldatensatz
  verwenden.
- Datenjournalismus, Recherche und Story ab Tag 1 parallel zur technischen
  Strecke führen.
- Tag 1 ausschliesslich für Kickoff, Tooling, Servereinrichtung und
  Begleitprogramm reservieren; noch keine PHP-Grundlagen unterrichten.
- Historische Datensätze bevorzugen. Live- und Sensor-APIs nur einsetzen, wenn
  genügend Daten verfügbar sind oder ein stabiler Datenstand gesichert wird.
- Der Kurs umfasst zehn vollwertige Kurstage, kein Halbtag mehr. Die
  ausstellungsfähige Projektfassung sollte bis Ende Tag 9 stehen. Tag 10
  gehört dem Marktstand und der Abgabe.
- An Tag 4 einen zweistündigen Input von Pascal Alisser einplanen.

## Übersicht

| Phase | Ergebnis | Status |
| --- | --- | --- |
| 1. Kursgerüst | `ABLAUF.md` mit zehn Kurstagen | Offen |
| 2. Materialinventar | Zuordnung und Beurteilung aller bestehenden Materialien | Offen |
| 3. Referenzprojekt | Vollständiger Datenweg an einem kleinen Beispiel | Offen |
| 4. Lernmaterial Tag 1-6 | Tooling, Code-Alongs, Mini-Übungen und Lösungen | Offen |
| 5. Projektpaket | Briefing, Rollen, Vorlagen, Meilensteine und Marktstand | Offen |
| 6. Chart.js und Story | Material für Tag 7, Input Pascal Alisser (Tag 4) und Story-Begleitspur | Offen |
| 7. Probelauf | Technischer und zeitlicher Test des gesamten Kurses | Offen |

## Phase 1: Kursgerüst erstellen

### Ziel

Eine zentrale `ABLAUF.md` macht sichtbar, was an jedem Kurstag zwingend
passieren muss und was bei Zeitmangel entfallen kann.

### Aufgaben

- [ ] Für Tag 1 bis 10 Lernziel, Inputs, Übungen und Ergebnisse festhalten.
- [ ] Pro Tag die Story-/Recherche-Begleitspur ergänzen.
- [ ] Pro Tag ein überprüfbares Tagesergebnis definieren.
- [ ] Meilensteine direkt den Kurstagen zuordnen.
- [ ] Inhalte als `Muss`, `Soll` oder `Optional` markieren.
- [ ] Tag 1 vollständig für Kickoff, Tooling und Begleitprogramm
  reservieren.
- [ ] An Tag 4 zwei Stunden für den Input von Pascal Alisser reservieren.
- [ ] Tag 2 bis 7 besonders streng auf Überladung prüfen.
- [ ] Endgültige Platzierung des flexiblen UX-Blocks (Tag 8/9 im Plan)
  festlegen.
- [ ] Ende Tag 9 als Feature-Freeze und Ausstellungsfassung festlegen.
- [ ] Tag 10 mit Aufbau, Marktstand, Abgabe und Reflexion planen.
- [ ] Genaue Zeitblöcke ergänzen, sobald Unterrichtszeiten und Pausen bekannt
  sind.

### Fertig, wenn

- Der rote Faden von Kickoff bis Marktstand auf einer Seite nachvollziehbar
  ist.
- Jeder Kurstag ein realistisches Mindestprogramm und einen klaren Output hat.
- Bei Zeitverlust klar ist, welche Inhalte entfallen dürfen.

## Phase 2: Bestehendes Material inventarisieren

### Ziel

Vorhandene Cheatsheets, Code-Alongs, Übungen und Boilerplates werden dem neuen
Ablauf zugeordnet. Erst danach wird entschieden, welche Dateien verschoben,
überarbeitet, ersetzt oder neu erstellt werden.

### Arbeitsdokument

Eine neue `MATERIAL_INVENTAR.md` mit mindestens diesen Spalten:

| Material | Kurstag/Thema | Entscheidung | Aufwand | Bemerkung |
| --- | --- | --- | --- | --- |
| Beispiel: Variablen-Code-Along | Tag 1 | Vereinfachen | Klein | Messwerte statt allgemeines Beispiel |

Mögliche Entscheidungen:

- `Übernehmen`: passt bereits zum neuen Kurs.
- `Vereinfachen`: Inhalt stimmt, ist aber zu umfangreich oder zu abstrakt.
- `Umschreiben`: Konzept bleibt, Beispiel und Aufbau werden ersetzt.
- `Ersetzen`: neues Material ist sinnvoller.
- `Archivieren`: wird im neuen Kurs nicht mehr benötigt.

### Aufgaben

- [ ] Alle vorhandenen Cheatsheets erfassen.
- [ ] Alle vorhandenen Code-Alongs erfassen.
- [ ] Bestehende Übungen und Lösungen erfassen.
- [ ] ETL-Boilerplate und Datenbankbeispiele einzeln beurteilen.
- [ ] Fehlende Materialien pro Kurstag sichtbar machen.
- [ ] Noch keine grossen Datei-Verschiebungen vornehmen.

### Fertig, wenn

- Jede bestehende Kursdatei eine begründete Entscheidung erhalten hat.
- Pro Kurstag bekannt ist, was schon existiert und was noch gebaut werden muss.

## Phase 3: Vollständiges Referenzprojekt bauen

### Ziel

Ein kleines, funktionierendes Referenzprojekt prüft den gesamten Lernpfad und
dient als technischer roter Faden für Code-Alongs und Übungen.

### Vorgeschlagener Datenweg

```text
historische Aare-Daten
-> PHP-Variablen
-> Array
-> JSON
-> Extract
-> Transform
-> Load in Datenbank
-> Unload als JSON
-> Chart.js
-> kleine Datenstory
```

### Anforderungen

- [ ] Einen kleinen historischen Datenausschnitt lokal mitliefern.
- [ ] Optional zeigen, wie dieselben oder ähnliche Daten live bezogen werden.
- [ ] Datenquelle und Rohdaten klar dokumentieren.
- [ ] Sehr kleines Datenmodell und ERM erstellen.
- [ ] `extract.php`, `transform.php`, `load.php` und `unload.php` klar trennen.
- [ ] Einfachen Chart.js-Chart an den Unload-Endpunkt anschliessen.
- [ ] Eine kleine journalistische Frage und Aussage formulieren.
- [ ] Einen stabilen Daten-Fallback für API-, Netzwerk- oder Serverprobleme
  vorsehen.
- [ ] Den vollständigen Weg auf dem Zielserver testen.

### Fertig, wenn

- Der Datenweg vom Rohdatensatz bis zur sichtbaren Story reproduzierbar läuft.
- Jeder technische Kursschritt auf einen kleinen Teil dieses Projekts
  zurückgeführt werden kann.
- Das Beispiel auch ohne erreichbare Fremd-API demonstrierbar bleibt.

## Phase 4: Lernmaterial für Tag 1 bis 6 entwickeln

### Reihenfolge

1. Tag 1 als Tooling- und Organisationspaket vollständig erstellen.
2. Tag 2 mit den eigentlichen PHP Basics beginnen.
3. Tag 3 auf derselben Datenwelt mit Arrays und JSON aufbauen.
4. Tag 4 mit DB-Tooling, ERM und Input Pascal Alisser bewusst klein halten.
5. Tag 5 mit PDO und CRUD abschliessen.
6. Tag 6 als Extract-/Transform-/Load-Durchstich erstellen.

### Standard für eine Übung

Jede selbständige Übung enthält:

- [ ] ein einziges, klar formuliertes Lernziel;
- [ ] vorbereiteten und ausführbaren Startcode;
- [ ] drei bis fünf kleine nummerierte Schritte;
- [ ] höchstens ein neues Konzept pro Schritt;
- [ ] ein sichtbares erwartetes Resultat;
- [ ] kurze Hinweise für typische Blockaden;
- [ ] eine vollständige Lösung;
- [ ] eine kleine freiwillige Zusatzaufgabe, die separat markiert ist.

### Geplante Tagespakete

- [ ] Tag 1: Kickoff, PHP-Check, Servereinrichtung und Begleitprogramm.
- [ ] Tag 2: Variablen, Datentypen, Funktionen und Bedingungen.
- [ ] Tag 3: Arrays, Schleifen, lokale JSON-Ausgabe und `$_GET`-Filter.
- [ ] Tag 4: Tooling DB, Theorie DB & SQL, ERM Light und Input Pascal Alisser.
- [ ] Tag 5: PDO und CRUD.
- [ ] Tag 6: Extract-, Transform- und Load-Pipeline mit Extract-Varianten und
  erstem Datenvertrag.

### Fertig, wenn

- Eine unsichere Studentin oder ein unsicherer Student jede Pflichtübung ohne
  zusätzliche mündliche Aufgabenstellung beginnen kann.
- Code-Alongs und selbständige Übungen klar voneinander getrennt sind.
- Für alle Pflichtübungen getestete Lösungen vorliegen.

## Phase 5: Projektpaket erstellen

### Ziel

Die Vierergruppen wissen jederzeit, was sie als ganze Gruppe und in ihren
Zweierteams tun müssen.

### Geplante Dateien

- [ ] `projekt/README.md`: Orientierung und Projektablauf.
- [ ] `projekt/brief.md`: Auftrag, Ziel und Rahmenbedingungen.
- [ ] `projekt/rollen.md`: Backend-, Frontend- und gemeinsame Aufgaben.
- [ ] `projekt/datenquellen.md`: historische Daten, Live-APIs, CSV/JSON und
  Sensor-APIs.
- [ ] `projekt/datenquellen-check.md`: Relevanz, Datenmenge, Zeitraum,
  Zugänglichkeit und Risiken prüfen.
- [ ] `projekt/erm-template.md`: einfache Vorlage für das Datenmodell.
- [ ] `projekt/etl-template.md`: Vorlage für den Datenfluss.
- [ ] `projekt/api-contract-template.md`: gemeinsamer Datenvertrag.
- [ ] `projekt/milestones.md`: Tagesabnahmen M1 bis M5.
- [ ] `projekt/marktstand.md`: Aufbau, Technik, Fallback und Vermittlung.
- [ ] `projekt/bewertung.md`: transparente Bewertungskriterien.

### Fertig, wenn

- Jede Gruppe ihre nächste Aufgabe ohne Interpretation aus dem Briefing
  ableiten kann.
- Backend und Frontend mit Mock-JSON unabhängig arbeiten können.
- Live- und Sensor-API-Projekte einen überprüften Daten-Fallback besitzen.
- Die Anforderungen für Marktstand und Abgabe klar sind.

## Phase 6: Chart.js und Story ausarbeiten

### Chart.js

- [ ] Chart.js kompakt an Tag 7 einführen.
- [ ] Einen statischen Chart aus vorbereiteten Daten bauen.
- [ ] Dieselben Daten über `fetch()` laden.
- [ ] Labels und Werte aus dem vereinbarten JSON ableiten.
- [ ] Titel, Quelle, Einheit und eine erkennbare Aussage ergänzen.
- [ ] Nur notwendige Interaktionen behandeln.

### Story-Begleitspur

- [ ] Tag 1: Themenfelder und Beobachtungen im Begleitprogramm sammeln.
- [ ] Tag 2: erste eigene Datenfrage formulieren.
- [ ] Tag 3: Datenquellen recherchieren und passenden Datensatz finden.
- [ ] Tag 4: zweistündigen Input von Pascal Alisser durchführen; Frage und
  Datenquelle festlegen.
- [ ] Tag 5: Projektgrundlage und Datenvertrags-Entwurf vorbereiten.
- [ ] Tag 6: Datenlücken, Transformationen und Datenvertrag konkretisieren.
- [ ] Tag 7: Story, Visualisierung und Backend aufbauen und integrieren.
- [ ] Tag 8/9: Aussage, Quellen und Ausstellungsfassung prüfen (UX-Slot,
  Platzierung flexibel).
- [ ] Tag 9: Integration testen, Ausstellungsfassung vorbereiten.
- [ ] Tag 10: Projekt am Marktstand verständlich vermitteln.

### Fertig, wenn

- Chart.js mit dem Datenvertrag und dem Referenzprojekt zusammenpasst.
- Die Story-Arbeit sichtbar vor Tag 5 beginnt.
- Die Visualisierung eine Datenfrage beantwortet und nicht nur Daten zeigt.

## Phase 7: Probelauf und Qualitätssicherung

### Technischer Test

- [ ] Alle Pflichtbeispiele mit der vorgesehenen PHP-Version ausführen.
- [ ] Datenbank-Setup auf dem Zielserver testen.
- [ ] Extract, Transform, Load und Unload einzeln testen.
- [ ] Chart.js gegen Mock-Daten und echten Endpunkt testen.
- [ ] API-, Netzwerk- und Sensor-Ausfall mit dem Fallback simulieren.

### Didaktischer Test

- [ ] Zeitbedarf pro Input, Code-Along und Übung messen.
- [ ] Tag 2 bis 7 mit realistischen Pausen durchspielen.
- [ ] Für Tag 9 (Fertigstellung/Ausstellungstest, kein separater Halbtag
  mehr) einen realistischen Ablauf testen.
- [ ] Aufgaben aus Sicht einer unerfahrenen Person lesen lassen.
- [ ] Unklare Begriffe, versteckte Voraussetzungen und zu grosse Schritte
  entfernen.
- [ ] `Muss`, `Soll` und `Optional` anhand des Probelaufs korrigieren.

### Marktstand-Test

- [ ] Projekt auf dem tatsächlich vorgesehenen Gerät öffnen.
- [ ] Darstellung, Interaktion und Lesbarkeit prüfen.
- [ ] Fallback ohne Fremd- oder Sensor-API testen.
- [ ] Kurze Erklärung von Story, Datenquelle und ETL-Prozess erproben.

## Unmittelbar nächstes Arbeitspaket

Die nächsten Schritte werden in dieser Reihenfolge bearbeitet:

1. `ABLAUF.md` aus `PLANUNG.md` ableiten.
2. `MATERIAL_INVENTAR.md` erstellen und bestehende Dateien zuordnen.
3. Ablauf und Materialentscheidungen gemeinsam prüfen.
4. Das historische Aare-Referenzprojekt spezifizieren und umsetzen.
5. Danach Tag 1 als vollständiges Kickoff-/Tooling-Paket ausarbeiten.

## Noch offene Entscheidungen

Diese Punkte blockieren die ersten beiden Phasen nicht, müssen aber vor der
Detailproduktion geklärt werden:

- genaue Unterrichtszeiten, Pausen und Abstand zwischen den Kurstagen;
- PHP-Version, Zielserver und Datenbankumgebung;
- verfügbare Sensor-APIs und Boxen für die Demonstration;
- Termin und Briefing für den Input von Pascal Alisser;
- definitive Bewertungskriterien;
- organisatorischer Rahmen und Dauer des Marktstands;
- erlaubte Hilfsmittel und Umgang mit KI während Übungen und Projekt.

## Pflege dieses Dokuments

- Beim Start einer Phase ihren Status in der Übersicht auf `In Arbeit` setzen.
- Erledigte Aufgaben direkt abhaken.
- Eine Phase erst als `Erledigt` markieren, wenn ihre Fertig-Kriterien erfüllt
  sind.
- Neue Ideen zuerst der passenden Phase zuordnen, statt sie sofort irgendwo im
  Repository umzusetzen.
