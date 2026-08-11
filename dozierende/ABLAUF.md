# Ablauf IM3 – PHP, Datenbanken und Datenstory

> Interner Ablauf für Dozierende und LBAs. Inhaltliche Quelle ist
> [`PLANUNG.md`](PLANUNG.md). Die Zeitangaben sind Richtwerte in
> Unterrichtsminuten und werden angepasst, sobald Unterrichtszeiten und Pausen
> definitiv bekannt sind.

## So wird der Ablauf gelesen

| Zeichen | Bedeutung |
| --- | --- |
| `Muss` | Notwendig für den weiteren Lernpfad oder einen Meilenstein. |
| `Soll` | Sinnvolle Vertiefung; bei Zeitverlust kürzen. |
| `Optional` | Zusatz für schnelle Gruppen oder als Puffer. |
| `📕` | Theorie-Input |
| `🧑‍🏫` | Geführtes Code-Along |
| `💻` | Selbständige digitale Übung |
| `📝` | Stift-und-Papier-Übung |
| `🔎` | Datenjournalismus- und Recherche-Begleitspur |
| `✅` | Kurze Abnahme eines Ergebnisses |

Die Theorieblöcke und die Kurstage sind nicht identisch. Ein Theorieblock kann
sich über mehrere Tage erstrecken. Insbesondere läuft Datenjournalismus ab
Tag 1 als kurze Begleitspur parallel zur technischen Strecke.

## Wiederkehrende Tagesstruktur

1. **Ankommen und Repetition:** Ab Tag 2 ungefähr 15 Minuten.
2. **Input und direkte Anwendung:** Kurze Theorie-Etappen wechseln sich mit
   Code-Alongs oder Übungen ab.
3. **Projektspur:** Jede Gruppe überträgt das Gelernte auf die eigene
   Datenfrage oder das eigene Projekt.
4. **Tagesabschluss:** Ergebnis sichern und den aktuellen Meilenstein kurz
   abnehmen.

## Übersicht über zehn Kurstage

| Tag | Technischer Schwerpunkt | Projekt- und Storyspur | Tagesergebnis |
| --- | --- | --- | --- |
| 1 | Kickoff, Tooling und Server | Gruppen und Themenfelder | `Hallo PHP` funktioniert; Gruppen stehen. |
| 2 | Variablen, Datentypen, Funktionen, Bedingungen | Erste Datenfrage | Ein Messwert wird gespeichert, verarbeitet und bewertet. |
| 3 | Arrays, Schleifen, lokales JSON und `$_GET` | Datenquelle suchen | Liste wird verarbeitet; JSON-Endpunkt funktioniert. |
| 4 | DB-Tooling, SQL und ERM Light | Input Pascal Alisser; Frage und Quelle prüfen | DB-Zugang und kleines Datenmodell stehen. |
| 5 | PDO und CRUD | Projektgrundlage und Datenvertrag | Ein Datensatz kann gelesen und verändert werden. |
| 6 | Extract, Transform und Load | Eigene Quelle technisch prüfen | Daten gelangen von der Quelle in die Datenbank. |
| 7 | Unload und Chart.js | Backend und Frontend verbinden | JSON-Endpunkt und erster Chart funktionieren. |
| 8 | UX-Slot und Projektwerkstatt | Story und Nutzung testen | Abhängig von der definitiven UX-Platzierung. |
| 9 | UX-Slot, Integration und Feature-Freeze | Aussage, Quellen und Fallback prüfen | Ausstellungsfähige Fassung steht. |
| 10 | Marktstand und Abgabe | Vermittlung und Reflexion | Projekt ist ausgestellt und abgegeben. |

## Tag 1 – Kickoff, Gruppenbildung, Tooling und Server

**Ziel:** Alle verstehen das Kursprojekt, erreichen den Server und arbeiten in
einer Vierergruppe mit klaren Zweierteams. Es gibt noch keinen
PHP-Grundlagenunterricht.

| Prio | Form | Inhalt | Richtwert | Material oder Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Rahmen | Kursziel, Datenfluss und Marktstand zeigen | 30' | Fertiges Beispielprojekt oder Demo |
| Muss | Rahmen | Vierergruppen bilden; Backend- und Frontend-Zweierteam festlegen | 45' | Gruppenliste |
| Muss | Tooling | Zugänge verteilen, lokalen PHP-Check durchführen, Serverordner einrichten | 90' | Zugang pro Person |
| Muss | `🧑‍🏫` | Dreizeiliges [Hallo PHP](../code-alongs/A_PHP_Basics/00_hallo_php) hochladen und im Browser öffnen | 30' | Ausgabe `Hallo PHP` |
| Soll | Tooling | Häufige Probleme gemeinsam lösen: Pfad, Dateiname, Rechte, Cache | 45' | Fehlerliste für Dozierende |
| Soll | `🔎` | Datenprojekte ansehen und interessante Themenfelder sammeln | 45' | Themen-Post-its pro Gruppe |
| Muss | `✅` | `Hallo PHP` und Gruppeneinteilung abnehmen | 15' | **M1: Gruppen gebildet** |

**Nicht an Tag 1:** Variablen, Funktionen oder andere PHP-Syntax erklären. Die
Testdatei wird nur verwendet, um den technischen Weg zu prüfen.

## Tag 2 – PHP Basics I

**Ziel:** Alle können einzelne Werte in PHP speichern, ausgeben, mit einer
Funktion verarbeiten und mit einer Bedingung bewerten.

| Prio | Form | Inhalt | Richtwert | Material oder Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | Browser, Server und PHP in die richtige Reihenfolge bringen | 15' | Mündliche Skizze |
| Muss | `📕` | Theorie A, Teil 1: Server, Variablen, Datentypen und Debugging | 40' | [Theorie A](../theorie/A_PHP_Basics) |
| Muss | `🧑‍🏫` | [01 Variablen](../code-alongs/A_PHP_Basics/01_variablen) | 25' | Kleine Datenmeldung |
| Muss | `💻` | [01 Messwert](../uebungen/A_PHP_Basics/01_messwert) | 20' | Eigene Messwertmeldung |
| Muss | `📕` | Theorie A, Teil 2: Funktionen und Rückgabewerte | 20' | [Theorie A](../theorie/A_PHP_Basics) |
| Muss | `🧑‍🏫` | [02 Funktionen](../code-alongs/A_PHP_Basics/02_funktionen) | 30' | Wiederverwendbare Meldung |
| Soll | `💻` | [02 Badewetter](../uebungen/A_PHP_Basics/02_badewetter) | 25' | Funktion mit Rückgabewert |
| Muss | `📕` | Theorie A, Teil 3: Vergleiche und Bedingungen | 20' | [Theorie A](../theorie/A_PHP_Basics) |
| Muss | `🧑‍🏫` | [03 Bedingungen](../code-alongs/A_PHP_Basics/03_bedingungen) | 30' | Temperaturbewertung |
| Muss | `💻` | [03 Warnstufe](../uebungen/A_PHP_Basics/03_warnstufe) | 25' | Drei einfache Fälle |
| Soll | `📝` | Messwertmaschine, Runde 1: Werte, Funktion und Entscheid | 30' | [Analoge Übung](../stift-und-papier/01_messwertmaschine) |
| Muss | `🔎` | Eine offene Datenfrage pro Gruppe formulieren | 30' | Satz nach Vorlage |
| Muss | `✅` | Code und Datenfrage zeigen | 15' | **M2: Datenfrage formuliert** |

## Tag 3 – PHP Basics II und Brücke zu JSON

**Ziel:** Alle können eine Liste strukturierter Messungen mit `foreach`
durchlaufen. Danach wird die Liste als JSON ausgegeben und einfach gefiltert.

| Prio | Form | Inhalt | Richtwert | Material oder Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | Fehler in drei kurzen PHP-Beispielen finden | 15' | Debugging im Plenum |
| Muss | `📕` | Theorie A, Teil 4: Arrays, assoziative Arrays und Schleifen | 35' | [Theorie A](../theorie/A_PHP_Basics) |
| Muss | `🧑‍🏫` | [04 Arrays](../code-alongs/A_PHP_Basics/04_arrays) | 30' | Strukturierter Messwert |
| Muss | `💻` | [04 Messstation](../uebungen/A_PHP_Basics/04_messstation) | 25' | Assoziatives Array |
| Muss | `🧑‍🏫` | [05 Schleifen](../code-alongs/A_PHP_Basics/05_schleifen) | 35' | Messwertliste als Textausgabe |
| Muss | `📝` | Messwertmaschine, Runde 2: Liste wiederholt verarbeiten | 30' | [Analoge Übung](../stift-und-papier/01_messwertmaschine) |
| Muss | `💻` | [05 Aare-Woche](../uebungen/A_PHP_Basics/05_aare_woche) | 35' | Sieben sichtbare Werte |
| Muss | `📕` + `🧑‍🏫` | Brücke zu Block B: Array als JSON ausgeben | 35' | Eigener JSON-Endpunkt |
| Muss | `🧑‍🏫` | Endpunkt über `$_GET` nach Ort filtern | 30' | Filterbare Antwort |
| Muss | `🔎` | Datenquellen suchen und anhand von vier Kriterien prüfen | 60' | Kandidat plus Fallback |
| Optional | Vertiefung | Minimum, Maximum oder Durchschnitt der Woche berechnen | 25' | Zusätzliche Kennzahl |
| Muss | `✅` | Datenquelle und funktionierenden Endpunkt zeigen | 15' | **M3: Datensatz gefunden** |

## Tag 4 – Datenbanken, SQL und Datenjournalismus

**Ziel:** Alle verstehen das kleine relationale Datenmodell und können die
Verbindung zur Kursdatenbank testen. Die Gruppen schärfen Frage und Quelle.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | Datenfluss von Quelle bis JSON ordnen | 15' | Gemeinsame Pipeline |
| Muss | Tooling | DB-Zugang, `config.php` und Verbindung testen | 60' | Verbindung pro Person |
| Muss | `📕` | Tabelle, Zeile, Spalte, Datentyp, Primärschlüssel, Beziehung | 45' | Begriffe am Beispieldatensatz |
| Muss | `📝` | Messwerte als ERM Light planen | 45' | Eine kleine Tabelle |
| Muss | `🔎` | Input Pascal Alisser inklusive Fragen | 120' | Notizen für eigene Idee |
| Muss | Projekt | Datenfrage und Quelle auf Relevanz, Menge, Zeitraum und Zugang prüfen | 45' | Begründete Projektgrundlage |
| Soll | `✅` | DB-Verbindung, ERM und Projektgrundlage zeigen | 15' | Kurze Abnahme |

## Tag 5 – PDO und CRUD

**Ziel:** Ein vorbereiteter Messwert kann mit PDO gelesen, eingefügt,
aktualisiert und gelöscht werden.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | SQL-Befehle den vier CRUD-Aktionen zuordnen | 15' | Zuordnung im Plenum |
| Muss | `📕` + `🧑‍🏫` | PDO-Verbindung und `SELECT` | 60' | Messwerte aus DB |
| Muss | `💻` | Einen vorbereiteten Datensatz lesen | 30' | Sichtbare Ausgabe |
| Muss | `📕` + `🧑‍🏫` | `INSERT` und Prepared Statements | 60' | Neuer Messwert |
| Soll | `🧑‍🏫` | `UPDATE` und `DELETE` an Testdaten | 60' | CRUD vollständig |
| Muss | Projekt | Erstes kleines Datenmodell und Datenvertrags-Entwurf | 60' | Feldliste und Mock-JSON |
| Optional | Vertiefung | Einfache Fehlerbehandlung | 30' | Verständliche Meldung |
| Muss | `✅` | CRUD-Durchstich zeigen | 15' | Tagesabnahme |

## Tag 6 – Extract, Transform und Load

**Ziel:** Daten aus einer vorbereiteten Quelle werden in eine vereinbarte Form
gebracht und in die Datenbank geladen.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | Extract, Transform und Load an Beispielen unterscheiden | 15' | ETL-Zuordnung |
| Muss | `📕` + `🧑‍🏫` | Extract mit `fetchJson()` oder Dateizugriff | 60' | PHP-Array mit Rohdaten |
| Muss | `📝` | Eigene ETL-Pipeline und Risiken skizzieren | 35' | ETL-Plan |
| Muss | `🧑‍🏫` + `💻` | Rohdaten auswählen, umbenennen und normalisieren | 60' | Saubere Datensätze |
| Muss | `🧑‍🏫` + `💻` | Transformierte Daten mit PDO laden | 60' | Daten in DB |
| Muss | Projekt | Eigene Quelle technisch testen; Mock-JSON vereinbaren | 90' | Backend- und Frontend-Arbeit entkoppelt |
| Optional | Vertiefung | Zweite Extract-Variante vergleichen | 30' | Transfer |
| Muss | `✅` | Quelle bis Datenbank zeigen | 15' | Tagesabnahme |

## Tag 7 – Unload und Chart.js

**Ziel:** Der vereinbarte JSON-Endpunkt liest Daten aus der Datenbank; ein
erster Chart stellt dieselbe Struktur dar.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | Datenvertrag gegen drei JSON-Antworten prüfen | 15' | Fehler erkennen |
| Muss | `📕` + `🧑‍🏫` | `unload.php`: `SELECT`, Struktur, Header und JSON | 70' | Stabiler Endpunkt |
| Muss | `💻` | Endpunkt filtern und leere Resultate behandeln | 40' | Saubere API-Antwort |
| Muss | `📕` | Diagrammtypen passend zur Aussage auswählen | 35' | Begründeter Diagrammtyp |
| Muss | `🧑‍🏫` | Erster Chart.js-Chart mit Mock-Daten | 50' | Sichtbarer Chart |
| Muss | Projekt | `fetch()` auf Mock-Datei oder echten Endpunkt | 90' | Erste technische Verbindung |
| Soll | `✅` | Endpunkt und Chart zeigen | 15' | Tagesabnahme |

## Tag 8 – Flexibler UX-Slot und Projektwerkstatt

Der UX-Block ist laut Plan flexibel und kann auch früher im Kurs stattfinden.
Solange die definitive Platzierung offen ist, bleibt Tag 8 als reservierter
Slot bestehen.

**Muss-Ergebnis unabhängig von der Platzierung:** Jede Gruppe nutzt den freien
Projektblock, um Datenweg, Story oder Integration sichtbar weiterzubringen.

## Tag 9 – Integration, Fallback und Feature-Freeze

**Ziel:** Am Ende des Tages steht die ausstellungsfähige Fassung. Neue Features
werden danach nur noch begonnen, wenn sie die Stabilität nicht gefährden.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Projekt | Backend und Frontend integrieren | 120' | Durchgehender Datenweg |
| Muss | Test | Ladefehler, leere Daten, Serverpfade und Browser testen | 60' | Fehlerliste abgearbeitet |
| Muss | Test | Gespeicherten JSON-/CSV-/DB-Fallback aktiv testen | 45' | Offline-/Daten-Fallback |
| Muss | Story | Titel, Kernaussage, Quelle und Limitationen prüfen | 45' | Verständliche Story |
| Muss | Marktstand | Bedienung und Erklärung mit einer fremden Person testen | 45' | Kurzer Vermittlungstest |
| Soll | UX | Noch offener UX-Input oder Feinschliff | 45' | Bessere Nutzung |
| Muss | `✅` | Ausstellungsfassung abnehmen und einfrieren | 20' | **M4: Erste Integration steht** |

## Tag 10 – Marktstand, Abgabe und Reflexion

**Ziel:** Die Projekte laufen stabil, werden verständlich vermittelt und
vollständig abgegeben.

| Prio | Form | Inhalt | Ergebnis |
| --- | --- | --- | --- |
| Muss | Aufbau | Geräte, Server, Endpunkt und Fallback testen | Betriebsbereiter Stand |
| Muss | Marktstand | Story, Visualisierung und Datenprozess zeigen | Öffentliche Präsentation |
| Muss | Abgabe | Code, README, Quellen und Limitationen einreichen | Vollständige Abgabe |
| Soll | Reflexion | ETL+U, Zusammenarbeit und Story-Entscheide besprechen | Gesicherte Learnings |
| Muss | `✅` | Schlussabnahme | **M5: Marktstand und Abgabe** |

## Entscheidungen, die noch offen bleiben

- Genaue Unterrichtszeiten und Pausen; erst danach werden Richtwerte in einen
  definitiven Stundenplan übersetzt.
- Inhalt und definitive Position der beiden UX-Slots.
- Bewertungskriterien und Gewichtung.
- Detailorganisation des Marktstands.
- Konkretes Briefing des Pascal-Alisser-Inputs.

Diese Punkte blockieren die Produktion der technischen Lernmaterialien nicht.
