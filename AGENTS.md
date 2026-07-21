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
Der Kurs umfasst zehn Termine beziehungsweise 9,5 Unterrichtstage, verteilt
ueber mehrere Wochen. Acht Termine gehoeren zum hier geplanten
Web-/Daten-Teil. Zwei Termine sind ausschliesslich fuer UX reserviert: ein
Input-Tag und ein Coaching-Tag; dafuer ist eine andere Person verantwortlich.
Als vorlaeufige Kalenderverteilung gelten Web/Daten an Tag 1, 2, 3, 4, 6, am
Halbtag 7, an Tag 8 und 10 sowie UX an Tag 5 und 9. Web-Tag 1 enthaelt nur
Kickoff, Tooling, Servereinrichtung und Begleitprogramm, noch keine PHP-
Grundlagen. An Kalendertag 10 stellen die Studierenden ihre Projekte an einem
Marktstand aus. Die technisch integrierte Fassung muss Ende Kalendertag 8
stehen; das UX-Coaching kann sie an Tag 9 gestalterisch fertigstellen.

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

1. Web-Tag 1 / Kalendertag 1: Kickoff, Tooling, PHP-Check, Servereinrichtung,
   Gruppenbildung und Begleitprogramm. Keine PHP Basics.
2. Web-Tag 2 / Kalendertag 2: PHP Basics mit Variablen, Ausgabe, Funktionen
   und einfachen Bedingungen.
3. Web-Tag 3 / Kalendertag 3: Bedingungen, Arrays, Schleifen und erste
   JSON-Ausgabe.
4. Web-Tag 4 / Kalendertag 4: externe JSON-API, Datenbankgrundlagen, PDO,
   analoges ERM sowie Wahl von Datenfrage und Datenquelle.
5. UX-Tag 1 / Kalendertag 5: UX-Input, extern geplant.
6. Web-Tag 5 / Kalendertag 6: kompletter ETL-/Unload-Durchstich,
   Extract-Varianten, Datenvertrag und Projektgrundlage.
7. Web-Tag 6 / Kalendertag 7: Halbtag fuer Projekt-Checkpoint und Support,
   ohne neuen fachlichen Input.
8. Web-Tag 7 / Kalendertag 8: Chart.js, Projektwerkstatt, Integration und
   technischer Ausstellungsstand.
9. UX-Tag 2 / Kalendertag 9: UX-Coaching, extern geplant.
10. Web-Tag 8 / Kalendertag 10: Aufbau, Marktstand, Abgabe und Reflexion.

## Didaktische Leitplanken

- Die Studierenden sind zum Teil wenig an PHP und Datenbanken interessiert und
  noch unsicher im Programmieren. Inhalte deshalb kleinschrittig, klar und
  projektbezogen vermitteln.
- Uebungen muessen extrem niederschwellig sein: ein neues Konzept pro Schritt,
  wenige vorbereitete Daten, kurze Anweisungen und ein sofort sichtbares
  Resultat.
- Web-Tag 1 nicht mit PHP-Syntax ueberladen. PHP wird dort nur im Rahmen des
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
- Live-APIs sind kein Selbstzweck. Statische Daten sind eine valide und oft
  robustere Projektgrundlage.
- Das Endprodukt und die Zusammenarbeit zwischen Backend und Frontend sind der
  rote Faden des gesamten Kurses.
- Datenjournalismus ist kein nachgelagerter Block. Themenfindung, Recherche,
  Datenfrage und Quellenpruefung laufen ab Tag 1 als kleine Begleitspur zur
  technischen Strecke.
- Der IM2-Kurs ist eine strukturelle Referenz, keine thematische Vorlage.
  Uebungen fuer IM3 eigenstaendig und kreativ im Datenkontext entwickeln.
- Fuer Web-Tag 2 bis 5 nach Moeglichkeit denselben kleinen Datensatz als roten
  Faden verwenden, zum Beispiel Aare.guru. So aendert sich pro Schritt die
  Technik, nicht gleichzeitig auch das Thema.
- Meilensteine als kurze Abnahmepunkte in die Kurstage integrieren:
  Tooling/Gruppe Ende Web-Tag 1, Idee/Datenquelle Ende Web-Tag 4,
  Datenvertrag/Projektgrundlage Ende Web-Tag 5, Zwischencheck am halben
  Web-Tag 6, technische Integration Ende Web-Tag 7, UX-Ausstellungsfassung
  nach UX-Tag 2 sowie Marktstand und Abgabe an Web-Tag 8.
- Historische Datensaetze im Projektbriefing bevorzugen. Reine Live-Sammlung
  nur zulassen, wenn Datenmenge und Aussage bis zum Marktstand gesichert sind.
- Die beiden UX-Tage nicht mit PHP-, Datenbank-, ETL- oder Chart.js-Inhalten
  belegen. Die UX-Fachplanung liegt ausserhalb dieses Arbeitsbereichs: ein
  Input-Tag und ein Coaching-Tag.
- Der Acht-Termine-Webplan ist weiterhin dicht: Web-Tag 1 ist Tooling,
  Web-Tag 6 nur ein Halbtag und Web-Tag 8 der Marktstand. Projekte deshalb auf
  eine Datenquelle, ein kleines
  Datenmodell, einen zentralen JSON-Endpunkt und mindestens eine einfache
  Chart.js-Visualisierung begrenzen. ETL-Boilerplate bereitstellen.
- Kalendertag 7 ist ein halber Web-/Daten-Tag ohne neuen fachlichen Input. Er
  dient dem Projekt-Checkpoint und Support.
- Kalendertag 10 nicht als regulaeren Produktionstag planen. Die technische
  Fassung muss Ende Tag 8 stehen und einen Offline-/Daten-Fallback besitzen.

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
