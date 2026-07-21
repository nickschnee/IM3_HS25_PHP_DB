# Projektkontext: Interaktive Medien 3

## Zweck dieses Repositories

Dieses Repository wird zu einem klar strukturierten Kurs fuer das Modul
**Interaktive Medien 3 (IM3)** weiterentwickelt. Die vorhandenen Materialien
stammen teilweise aus dem letzten Durchlauf und sind noch nicht durchgehend
geordnet oder didaktisch aufeinander abgestimmt.

Die ausfuehrliche Kursplanung steht in `PLANUNG_IM3.md`. Der Ordner
`2026_im2_javascript-main/` dient als Referenz fuer Aufbau, Ablaufplan,
Code-Alongs und Uebungsstruktur.

## Kursziel

Die Studierenden lernen die notwendigen PHP-, Datenbank-, ETL- und
Chart.js-Grundlagen und entwickeln danach ein datenjournalistisches Projekt.
Der Kurs umfasst voraussichtlich etwa acht Unterrichtstage, verteilt ueber
mehrere Wochen. Tag 1 bis 4 bilden eine kompakte gemeinsame Technikstrecke,
Tag 5 fuehrt Chart.js, Story und den Projektstart zusammen, Tag 6 bis 8 sind
betreute Projektwerkstaetten. Am letzten Tag stellen die Studierenden ihre
Projekte an einem Marktstand aus; die ausstellungsfaehige Fassung muss deshalb
Ende Tag 7 stehen. Die genaue Terminplanung folgt spaeter.

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

## Datenquellen

Alle Projekte sollen einen nachvollziehbaren ETL-Prozess verwenden. Erlaubte
Varianten sind insbesondere:

- Einen bestehenden historischen JSON-/CSV-Datensatz importieren. Das ist fuer
  die kurze Kursdauer die bevorzugte Variante.
- Historische Daten ueber eine API beziehen.
- Daten regelmaessig von einer Live-API sammeln, wenn die zeitliche Sammlung
  inhaltlich sinnvoll ist und bis zum Marktstand genuegend Daten entstehen.
- Eine Physical-Computing-Sensorbox wie eine Live-API anzapfen. Vorhandene
  historische Messungen sind dabei besser als eine erst beginnende Sammlung.
- Ein eigenes oder manuell erhobenes Dataset aufbereiten.

Auch statische und eigene Daten muessen sinnvoll extrahiert, transformiert,
in die Datenbank geladen und wieder als JSON ausgegeben werden. Projekte mit
Fremd-APIs oder Sensorboxen brauchen fuer den Marktstand einen stabilen
gespeicherten Datenstand als Fallback.

## Physical Computing

Dieses Repository plant aktuell den Web-App-Teil von IM3. Physical Computing
ist ein zweiter, parallel anschlussfaehiger Teil und wird spaeter detailliert
geplant. Sensorboxen koennen Daten ueber HTTP/JSON liefern und gelten fuer den
ETL-Prozess als API-Datenquelle. Der Web-App-Kurs darf aber nicht von noch
nicht verfuegbarer Hardware abhaengen.

## Geplanter Lernpfad

1. Tag 1: Kickoff, Tooling, Gruppenbildung und einfache PHP Basics.
2. Tag 2: Bedingungen, Arrays, Schleifen und erste JSON-Ausgabe anhand eines
   sehr kleinen Datensatzes.
3. Tag 3: externe JSON-API, Datenbankgrundlagen, PDO, analoges ERM sowie Wahl
   von Datenfrage und Datenquelle.
4. Tag 4: kompletter ETL-/Unload-Durchstich und kurze Demonstration der
   Extract-Varianten API, JSON, CSV und eigene Daten.
5. Tag 5: Chart.js, `fetch()`, Story-Frage, Projektplanung und Datenvertrag.
6. Tag 6: Backend und Frontend funktionieren mit echtem beziehungsweise Mock-
   Output isoliert.
7. Tag 7: Integration, Test und Fertigstellung der Ausstellungsfassung.
8. Tag 8: Aufbau, Marktstand, Abgabe und Reflexion.

## Didaktische Leitplanken

- Die Studierenden sind zum Teil wenig an PHP und Datenbanken interessiert und
  noch unsicher im Programmieren. Inhalte deshalb kleinschrittig, klar und
  projektbezogen vermitteln.
- Uebungen muessen extrem niederschwellig sein: ein neues Konzept pro Schritt,
  wenige vorbereitete Daten, kurze Anweisungen und ein sofort sichtbares
  Resultat.
- Technische Konzepte frueh mit Daten und sichtbaren Ergebnissen verbinden.
- Auf jeden Input soll zeitnah eine passende Uebung folgen.
- Code-Alongs sind gefuehrte Unterrichtseinheiten; Uebungen muessen auch
  selbststaendig loesbar sein und sollen Loesungen enthalten.
- Vor komplexeren Implementationen zuerst Datenfluss, Datenmodell, Story oder
  API-Vertrag auf Papier planen.
- PHP-Grundlagen nicht als isolierten Sprachkurs behandeln, sondern frueh auf
  JSON, Daten und den spaeteren ETL-Prozess beziehen.
- Live-APIs sind kein Selbstzweck. Statische Daten sind eine valide und oft
  robustere Projektgrundlage.
- Das Endprodukt und die Zusammenarbeit zwischen Backend und Frontend sind der
  rote Faden des gesamten Kurses.
- Datenjournalismus ist kein nachgelagerter Block. Themenfindung, Recherche,
  Datenfrage und Quellenpruefung laufen ab Tag 1 als kleine Begleitspur zur
  technischen Strecke.
- Der IM2-Kurs ist eine strukturelle Referenz, keine thematische Vorlage.
  Uebungen fuer IM3 eigenstaendig und kreativ im Datenkontext entwickeln.
- Fuer die ersten vier Tage nach Moeglichkeit denselben kleinen Datensatz als
  roten Faden verwenden, zum Beispiel Aare.guru. So aendert sich pro Schritt
  die Technik, nicht gleichzeitig auch das Thema.
- Meilensteine als kurze Abnahmepunkte in die Kurstage integrieren:
  Gruppe/Rollen Ende Tag 1, Idee/Datenquelle Ende Tag 3, technischer
  Quellencheck Ende Tag 4, Datenvertrag und
  Projektgrundlage Ende Tag 5, isolierte Teile Ende Tag 6, Integration Ende
  Tag 7 sowie Marktstand und Abgabe an Tag 8.
- Historische Datensaetze im Projektbriefing bevorzugen. Reine Live-Sammlung
  nur zulassen, wenn Datenmenge und Aussage bis zum Marktstand gesichert sind.
- Tag 8 nicht als regulaeren Produktionstag planen. Die Projekte muessen Ende
  Tag 7 ausstellungsfaehig sein und einen Offline-/Daten-Fallback besitzen.

## Angestrebte Repository-Struktur

Die Struktur soll sich am IM2-Referenzkurs orientieren und mindestens diese
Bereiche klar trennen:

- `README.md`: Einstieg, Lernziele und Orientierung fuer Studierende.
- `ABLAUF.md`: Tagesplan fuer Dozierende und LBAs.
- `cheatsheets/`: kurze Nachschlagewerke.
- `theorie/`: Inputs nach Themenblock.
- `code-alongs/`: gemeinsam entwickelte Beispiele.
- `uebungen/`: eigenstaendige Aufgaben mit Loesungen.
- `stift-und-papier/`: Planung von ETL, Datenmodell, Story und Schnittstelle.
- `projekt/`: Briefing, Rollen, Meilensteine, Bewertung und Templates.
- `etl-boilerplate/`: Starterkit fuer die Projektteams.

## Hinweise fuer weitere Arbeiten

- Vor groesseren Umbauten zuerst `PLANUNG_IM3.md` und den IM2-Referenzkurs
  lesen.
- Bestehendes Material wenn sinnvoll ueberarbeiten und wiederverwenden.
- Aenderungen in kleinen, nachvollziehbaren Schritten vornehmen; das gesamte
  Repository nicht ohne ausdruecklichen Auftrag auf einmal umbauen.
- Deutsche, einfache und direkte Formulierungen fuer Studierende verwenden.
- Fachbegriffe erklaeren und Beispiele konsistent an einem kleinen Datensatz
  oder Mini-Projekt aufbauen.
- Noch offen sind insbesondere der genaue Stundenplan, Bewertungskriterien,
  die konkrete Marktstand-Organisation, Datenjournalismus-Inputs und die
  endgueltige Form des Chart.js-Blocks.
