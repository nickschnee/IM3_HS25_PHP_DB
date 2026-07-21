# Projektkontext: Interaktive Medien 3

## Zweck dieses Repositories

Dieses Repository wird zu einem klar strukturierten Kurs fuer das Modul
**Interaktive Medien 3 (IM3)** weiterentwickelt. Die vorhandenen Materialien
stammen teilweise aus dem letzten Durchlauf und sind noch nicht durchgehend
geordnet oder didaktisch aufeinander abgestimmt.

Die ausfuehrliche Kursplanung steht in `dozierende/PLANUNG.md`. Die operative
Arbeitsreihenfolge und der aktuelle Umsetzungsstand werden in
`dozierende/UMSETZUNGSPLAN.md` gepflegt. Der Ordner
`2026_im2_javascript-main/` dient als Referenz fuer Aufbau, Ablaufplan,
Code-Alongs und Uebungsstruktur.

## Kursziel

Die Studierenden lernen die notwendigen PHP-, Datenbank-, ETL- und
Chart.js-Grundlagen und entwickeln danach ein datenjournalistisches Projekt.
Der Kurs wird in dieser Planung als Folge von acht Kurstagen behandelt. Tag 7
ist ein Halbtag, Tag 8 der Marktstand und die Abgabe. Tag 1 enthaelt nur
Kickoff, Tooling, Servereinrichtung und Begleitprogramm, noch keine PHP-
Grundlagen. An Tag 2 ist ein zweistuendiger Input von Pascal Alisser zum
Datenjournalismus eingeplant. Die ausstellungsfaehige Fassung muss Ende Tag 7
stehen.

## Projekt- und Rollenmodell

- Ein Projektteam besteht aus vier Studierenden.
- Das Team teilt sich in zwei Zweierteams.
- Das Backend-Team baut auf einem PHP-Server einen einfachen ETL-Prozess.
- Das Frontend-Team entwickelt die datenjournalistische Story und die
  Visualisierung mit Chart.js.
- Beide Teams vereinbaren frueh eine gemeinsame JSON-Schnittstelle, damit das
  Frontend zuerst mit Mock-Daten und spaeter mit echten Backend-Daten arbeiten
  kann.

Der technische Datenfluss ist:

```text
Datenquelle -> Extract -> Transform -> Load -> Datenbank -> Unload/JSON -> Chart.js/Story
```

`Unload` ist die Kursbezeichnung fuer den Schritt nach ETL: `unload.php` liest
die gespeicherten Daten per PDO aus der Datenbank, formt sie nach dem
vereinbarten Datenvertrag und liefert sie als JSON-Endpunkt fuer Chart.js aus.

## Datenquellen

Alle Projekte sollen einen nachvollziehbaren ETL-Prozess verwenden. Erlaubte
Varianten sind insbesondere:

- Einen bestehenden historischen JSON-Datensatz importieren.
- Einen bestehenden historischen CSV-Datensatz importieren.
- Daten regelmaessig von einer Live-API sammeln, wenn die zeitliche Sammlung
  inhaltlich sinnvoll ist und bis zum Marktstand genuegend Daten entstehen.
- Daten einer vorhandenen Sensorbox ueber eine Sensor-API konsumieren. Die
  Boxen werden gezeigt, aber in diesem Kurs nicht programmiert.
- Ein eigenes oder manuell erhobenes Dataset aufbereiten.

Auch statische und eigene Daten muessen sinnvoll extrahiert, transformiert,
in die Datenbank geladen und wieder als JSON ausgegeben werden. Projekte mit
Fremd- oder Sensor-APIs brauchen fuer den Marktstand einen stabilen
gespeicherten Datenstand als Fallback.

## Sensor-API

Eine Sensor-API ist im ETL-Prozess einfach eine weitere Extract-Variante neben
Live-API, statischem JSON und CSV. Eine vorhandene Sensorbox liefert Daten ueber
HTTP/JSON. Die Studierenden konsumieren diese Daten mit PHP und sehen dabei
Boxen, die sie eventuell in einem spaeteren Kurs selbst verwenden. Hardware,
Sensorik und Programmierung der Box sind nicht Inhalt dieses Kurses.

## Geplanter Lernpfad

1. Tag 1: Kickoff, Tooling, PHP-Check, Servereinrichtung, Gruppenbildung und
   Begleitprogramm. Keine PHP Basics.
2. Tag 2: PHP Basics mit Variablen, Ausgabe und Funktionen sowie zwei Stunden
   Input von Pascal Alisser.
3. Tag 3: Bedingungen, Arrays, Schleifen und erste JSON-Ausgabe.
4. Tag 4: externe JSON- beziehungsweise Sensor-API, Datenbankgrundlagen, PDO,
   analoges ERM sowie Wahl von Datenfrage und Datenquelle.
5. Tag 5: kompletter ETL-/Unload-Durchstich, Extract-Varianten, Datenvertrag
   und Projektgrundlage.
6. Tag 6: Chart.js, Projektwerkstatt und erste Integration.
7. Tag 7: Halbtag fuer Fertigstellung, Support und Ausstellungstest, ohne
   neuen fachlichen Input.
8. Tag 8: Aufbau, Marktstand, Abgabe und Reflexion.

## Didaktische Leitplanken

- Die Studierenden sind zum Teil wenig an PHP und Datenbanken interessiert und
  noch unsicher im Programmieren. Inhalte deshalb kleinschrittig, klar und
  projektbezogen vermitteln.
- Uebungen muessen extrem niederschwellig sein: ein neues Konzept pro Schritt,
  wenige vorbereitete Daten, kurze Anweisungen und ein sofort sichtbares
  Resultat.
- Tag 1 nicht mit PHP-Syntax ueberladen. PHP wird dort nur im Rahmen des
  Toolings geprueft und mit einer minimalen Testdatei auf dem Server
  aufgerufen.
- Technische Konzepte frueh mit Daten und sichtbaren Ergebnissen verbinden.
- Auf jeden Input soll zeitnah eine passende Uebung folgen.
- Code-Alongs sind gefuehrte Unterrichtseinheiten; Uebungen muessen auch
  selbststaendig loesbar sein und sollen Loesungen enthalten.
- Vor komplexeren Implementationen zuerst Datenfluss, Datenmodell, Story oder
  API-Vertrag auf Papier planen.
- PHP-Grundlagen nicht als isolierten Sprachkurs behandeln, sondern frueh auf
  JSON, Daten und den spaeteren ETL-Prozess beziehen.
- Block B auf JSON als Ein- und Ausgabe konzentrieren: lokale JSON-Datei
  praktisch lesen, eigenen JSON-Endpunkt bauen, `$_GET` von einem ausgehenden
  cURL-GET unterscheiden und eine externe API nur ueber einen vorbereiteten
  `fetchJson()`-Helper abrufen. CSV, Google Sheets und Sensor-API erst im
  ETL-/Extract-Block praktisch umsetzen.
- Live-APIs sind kein Selbstzweck. Statische Daten sind eine valide und oft
  robustere Projektgrundlage.
- Das Endprodukt und die Zusammenarbeit zwischen Backend und Frontend sind der
  rote Faden des gesamten Kurses.
- Datenjournalismus ist kein nachgelagerter Block. Themenfindung, Recherche,
  Datenfrage und Quellenpruefung laufen ab Tag 1 als kleine Begleitspur zur
  technischen Strecke.
- Der IM2-Kurs ist eine strukturelle Referenz, keine thematische Vorlage.
  Uebungen fuer IM3 eigenstaendig und kreativ im Datenkontext entwickeln.
- Fuer Tag 2 bis 5 nach Moeglichkeit denselben kleinen Datensatz als roten
  Faden verwenden, zum Beispiel Aare.guru. So aendert sich pro Schritt die
  Technik, nicht gleichzeitig auch das Thema.
- Meilensteine als kurze Abnahmepunkte in die Kurstage integrieren:
  Tooling/Gruppe Ende Tag 1, Idee/Datenquelle Ende Tag 4,
  Datenvertrag/Projektgrundlage Ende Tag 5, erste Integration Ende Tag 6,
  Ausstellungsfassung Ende des halben Tags 7 sowie Marktstand und Abgabe an
  Tag 8.
- Historische Datensaetze im Projektbriefing bevorzugen. Reine Live-Sammlung
  nur zulassen, wenn Datenmenge und Aussage bis zum Marktstand gesichert sind.
- Der Acht-Tage-Plan ist dicht: Tag 1 ist Tooling, Tag 7 nur ein Halbtag und
  Tag 8 der Marktstand. Projekte deshalb auf eine Datenquelle, ein kleines
  Datenmodell, einen zentralen JSON-Endpunkt und mindestens eine einfache
  Chart.js-Visualisierung begrenzen. ETL-Boilerplate bereitstellen.
- Tag 7 ist ein Halbtag ohne neuen fachlichen Input. Er dient Fertigstellung,
  Support und Ausstellungstest.
- Tag 8 nicht als regulaeren Produktionstag planen. Die ausstellungsfaehige
  Fassung muss Ende Tag 7 stehen und einen Offline-/Daten-Fallback besitzen.
- Den Input von Pascal Alisser an Tag 2 als Teil der Story-Begleitspur
  behandeln und zwei Stunden inklusive Fragen einplanen.

## Angestrebte Repository-Struktur

Die Struktur soll sich am IM2-Referenzkurs orientieren und mindestens diese
Bereiche klar trennen:

- `README.md`: Einstieg, Lernziele und Orientierung fuer Studierende.
- `dozierende/`: interne Planung, Ablauf und Materialinventar.
- `dozierende/ABLAUF.md`: Tagesplan fuer Dozierende und LBAs.
- `cheatsheets/`: kurze Nachschlagewerke.
- `theorie/`: Inputs nach Themenblock.
- `code-alongs/`: gemeinsam entwickelte Beispiele.
- `uebungen/`: eigenstaendige Aufgaben mit Loesungen.
- `stift-und-papier/`: Planung von ETL, Datenmodell, Story und Schnittstelle.
- `projekt/`: Briefing, Rollen, Meilensteine, Bewertung und Templates.
- `etl-boilerplate/`: Starterkit fuer die Projektteams.

## Hinweise fuer weitere Arbeiten

- Vor groesseren Umbauten zuerst `dozierende/PLANUNG.md`,
  `dozierende/UMSETZUNGSPLAN.md` und den IM2-Referenzkurs lesen.
- Bestehendes Material wenn sinnvoll ueberarbeiten und wiederverwenden.
- Aenderungen in kleinen, nachvollziehbaren Schritten vornehmen; das gesamte
  Repository nicht ohne ausdruecklichen Auftrag auf einmal umbauen.
- Deutsche, einfache und direkte Formulierungen fuer Studierende verwenden.
- Fachbegriffe erklaeren und Beispiele konsistent an einem kleinen Datensatz
  oder Mini-Projekt aufbauen.
- Noch offen sind insbesondere der genaue Stundenplan, Bewertungskriterien,
  die konkrete Marktstand-Organisation, Datenjournalismus-Inputs und die
  endgueltige Form des Chart.js-Blocks.
