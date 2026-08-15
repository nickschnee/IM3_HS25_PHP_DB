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

## Blöcke als roter Faden

Der Kurs folgt der ETL+U-Kette:

```text
Extract → Transform → Load → Datenbank → Unload → Chart.js
```

| Block | Fokus | Kern |
| --- | --- | --- |
| A – PHP Basics | Sprache | Variablen, Funktionen, Bedingungen, Arrays, Schleifen |
| B – Extract | Daten **lesen** | statische JSON-Datei, Live-API (`fetchJson`), CSV (`fgetcsv`) → PHP-Array |
| C – Transform | Rohdaten **umformen** | säubern, reduzieren, umbenennen, normalisieren → Datenvertrag |
| D – Load | in DB **schreiben** | DB-Tooling, ERM Light, PDO, `INSERT` |
| E – Unload | wieder **rausgeben** | PDO `SELECT` → JSON-Endpunkt + `$_GET`-Filter |
| F – Visualisierung | Chart.js | `fetch()` auf den Unload-Endpunkt |

Theorieblöcke und Kurstage sind **nicht** identisch: Ein Block kann sich über
mehrere Tage erstrecken.

Die **Datenjournalismus-/Story-Spur** (`🔎`) läuft parallel ab Tag 1. Der
zweistündige Input von **Pascal Alisser** ist ein fixer Story-Input, der
**neben** den technischen Blöcken schwebt und flexibel platziert wird (Richtwert
um Tag 4–5). Siehe Abschnitt [Story-Spur](#story-spur-und-pascal-alisser).

## Wiederkehrende Tagesstruktur

1. **Ankommen und Repetition:** Ab Tag 2 ungefähr 15 Minuten.
2. **Input und direkte Anwendung:** Kurze Theorie-Etappen wechseln sich mit
   Code-Alongs oder Übungen ab.
3. **Projektspur:** Jede Gruppe überträgt das Gelernte auf die eigene
   Datenfrage oder das eigene Projekt.
4. **Tagesabschluss:** Ergebnis sichern und den aktuellen Meilenstein kurz
   abnehmen.

## Übersicht über zehn Kurstage

| Tag | Block / Schwerpunkt | Story-Spur | Tagesergebnis |
| --- | --- | --- | --- |
| 1 | Kickoff, Tooling und Server | Gruppen und Themenfelder | `Hallo PHP` läuft; Gruppen stehen. |
| 2 | A – PHP Basics I | Erste Datenfrage | Wert speichern, verarbeiten, bewerten. |
| 3 | A – PHP Basics II (Arrays, Schleifen) | Datenquelle suchen | Liste mit `foreach` verarbeiten. |
| 4 | B – Extract (JSON, API, CSV) | Quelle prüfen | Rohdaten aus drei Quellen als PHP-Array. |
| 5 | C – Transform | Datenvertrag entwerfen | Saubere, einheitliche Datensätze. |
| 6 | D – Load (DB, PDO, INSERT) | Datenmodell schärfen | Daten liegen in der Datenbank. |
| 7 | E – Unload (SELECT → JSON) | Backend und Frontend verbinden | Stabiler JSON-Endpunkt mit Filter. |
| 8 | F – Chart.js + UX-Slot | Story und Nutzung testen | Erster Chart aus dem Endpunkt. |
| 9 | Integration und Feature-Freeze (UX) | Aussage, Quellen, Fallback | Ausstellungsfähige Fassung. |
| 10 | Marktstand und Abgabe | Vermittlung und Reflexion | Projekt ausgestellt und abgegeben. |

## Tag 1 – Kickoff, Gruppenbildung, Tooling und Server

**Ziel:** Alle verstehen das Kursprojekt, haben einen laufenden lokalen
PHP-Server und arbeiten in einer Vierergruppe mit klaren Zweierteams. Noch kein
PHP-Grundlagenunterricht.

| Prio | Form | Inhalt | Richtwert | Material oder Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Rahmen | Kursziel, ETL+U-Datenfluss und Marktstand zeigen | 30' | Fertiges Beispielprojekt oder Demo |
| Muss | Rahmen | Vierergruppen bilden; Backend- und Frontend-Zweierteam festlegen | 45' | Gruppenliste |
| Muss | Tooling | Editor, Terminal und Git einrichten | 30' | Arbeitsplatz steht |
| Muss | Tooling | [00 Lokaler PHP-Server](../theorie/00_lokaler_php_server/index.html): PHP installieren, `php -S` starten | 60' | `php -v` und Testseite pro Person |
| Muss | `🧑‍🏫` | [00 Hallo PHP](../code-alongs/A_PHP_Basics/00_hallo_php) lokal starten und im Browser öffnen | 30' | Ausgabe `Hallo PHP` |
| Soll | `🔎` | Datenprojekte ansehen und Themenfelder sammeln | 45' | Themen-Post-its pro Gruppe |
| Muss | `✅` | `Hallo PHP` und Gruppeneinteilung abnehmen | 15' | **M1: Gruppen gebildet** |

## Tag 2 – Block A: PHP Basics I

**Ziel:** Alle können Werte speichern, ausgeben, mit einer Funktion verarbeiten
und mit einer Bedingung bewerten.

| Prio | Form | Inhalt | Richtwert | Material oder Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | `📕` | Server, Variablen, Datentypen, Debugging | 40' | Theorie A |
| Muss | `🧑‍🏫` | [01 Variablen](../code-alongs/A_PHP_Basics/01_variablen) | 25' | Kleine Datenmeldung |
| Muss | `🧑‍🏫` | [02 Funktionen](../code-alongs/A_PHP_Basics/02_funktionen) | 30' | Wiederverwendbare Meldung |
| Muss | `🧑‍🏫` | [03 Bedingungen](../code-alongs/A_PHP_Basics/03_bedingungen) | 30' | Temperaturbewertung |
| Soll | `💻` | Übungen [01–03](../uebungen/A_PHP_Basics) | 45' | Eigene Meldungen |
| Muss | `🔎` | Eine offene Datenfrage pro Gruppe formulieren | 30' | Satz nach Vorlage |
| Muss | `✅` | Code und Datenfrage zeigen | 15' | **M2: Datenfrage formuliert** |

## Tag 3 – Block A: PHP Basics II (Arrays und Schleifen)

**Ziel:** Alle können eine Liste strukturierter Datensätze mit `foreach`
durchlaufen. Parallel finden die Gruppen ihre Datenquelle.

| Prio | Form | Inhalt | Richtwert | Material oder Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | Fehler in kurzen PHP-Beispielen finden | 15' | Debugging im Plenum |
| Muss | `📕` | Arrays, assoziative Arrays und Schleifen | 35' | Theorie A |
| Muss | `🧑‍🏫` | [04 Arrays](../code-alongs/A_PHP_Basics/04_arrays) | 30' | Strukturierter Datensatz |
| Muss | `🧑‍🏫` | [05 Schleifen](../code-alongs/A_PHP_Basics/05_schleifen) | 35' | Liste als Textausgabe |
| Soll | `💻` | Übungen [04–06](../uebungen/A_PHP_Basics) | 40' | Eigene Listen |
| Muss | `🔎` | Datenquellen suchen und anhand von Kriterien prüfen | 60' | Kandidat plus Fallback |
| Muss | `✅` | Datenquelle zeigen | 15' | **M3: Datensatz gefunden** |

## Tag 4 – Block B: Extract

**Ziel:** Alle können dieselben Rohdaten aus **drei Quellen** lesen und als
PHP-Array bereitstellen. Kernidee: Der Extract ändert sich, das Ergebnis (ein
PHP-Array) bleibt gleich.

| Prio | Form | Inhalt | Richtwert | Material oder Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | `💻` | [01 Daten finden & herunterladen](../uebungen/B_extract/01_daten_finden) | 45' | JSON-Dateien im `data/` |
| Muss | `📕` | Extract-Varianten: Datei, Live-API, CSV → immer ein PHP-Array | 20' | [Theorie B](../theorie/B_extract/) |
| Muss | `🧑‍🏫` | [06 JSON lesen](../code-alongs/B_extract/06_json_lesen) (`file_get_contents` + `json_decode`) | 30' | PHP-Array aus Datei |
| Muss | `🧑‍🏫` | [07 API lesen](../code-alongs/B_extract/07_api_lesen) (`fetchJson`) | 30' | PHP-Array aus API |
| Soll | `📝` | [Fetch-Helfer entschlüsseln](../stift-und-papier/01_fetch_helper/) ohne Editor und KI | 40' | Helfer Zeile für Zeile erklärt |
| Muss | `🧑‍🏫` | [08 CSV lesen](../code-alongs/B_extract/08_csv_lesen) (`fgetcsv`, Shark-Attack-Dataset) | 30' | PHP-Array aus CSV |
| Muss | Projekt | Eigene Quelle technisch als PHP-Array einlesen | 60' | Rohdaten der Gruppe |
| Soll | `✅` | Rohdaten aus der eigenen Quelle zeigen | 15' | Tagesabnahme |

## Tag 5 – Block C: Transform

**Ziel:** Rohdaten werden gesäubert, reduziert und in die vereinbarte Struktur
(Datenvertrag) gebracht.

| Prio | Form | Inhalt | Richtwert | Material oder Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | Rohdaten der drei Quellen vergleichen | 15' | Gemeinsame Felder erkennen |
| Muss | `📕` | Datenfrage → Untersuchungseinheit → Regeln → Datenvertrag → Audit | 30' | [Theorie C](../theorie/C_transform/) |
| Muss | `🧑‍🏫` | [09 Hitzesommer](../code-alongs/C_transform/09_hitzesommer_transformieren/): filtern, ableiten, aggregieren, Teiljahre erkennen | 45' | Stadt-Jahr-Datensätze plus Audit |
| Muss | `🧑‍🏫` | [10 Shark-Daten](../code-alongs/C_transform/10_sharkdaten_transformieren/): komplexe Mappings mit KI-Spezifikation entwickeln und prüfen | 60' | Zwei Rankings plus Abdeckungs-Audit |
| Muss | Projekt | Eigene Transform-Regeln festlegen, mit KI implementieren und im Viererteam abnehmen; Vorlage: [`02_datenfrage/datenfrage.md`](../uebungen/C_transform/02_datenfrage/datenfrage.md) | 60' | `TRANSFORM.md`, Transform und Audit |
| Kann | `💻` | Airbnb-Serie als Zusatzmaterial: [erkunden](../uebungen/C_transform/01_airbnb_erkunden/), [Datenfrage](../uebungen/C_transform/02_datenfrage/), [transformieren](../uebungen/C_transform/03_airbnb_transformieren/) | 135' | Übung an einem zweiten Datensatz |
| Soll | `✅` | Rohdaten → saubere Struktur zeigen | 15' | Tagesabnahme |

## Tag 6 – Block D: Load (Datenbank und PDO)

**Ziel:** Die transformierten Daten werden über PDO in die Datenbank
geschrieben.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Tooling | [00 Lokale Datenbank](../theorie/00_lokale_db/): MAMP, phpMyAdmin, `config.php`, Verbindung testen | 45' | Verbindung pro Person |
| Muss | `📕` | Tabelle, Zeile, Spalte, Datentyp, Primärschlüssel, Beziehung | 40' | Begriffe am Beispiel |
| Muss | `📝` | Daten als ERM Light planen | 35' | Kleine Tabelle |
| Muss | `📕` + `🧑‍🏫` | PDO-Verbindung und `INSERT` mit Prepared Statements | 70' | Neue Zeilen in der DB |
| Muss | Projekt | Eigene transformierte Daten laden | 60' | Daten der Gruppe in der DB |
| Optional | Vertiefung | `UPDATE`/`DELETE`, einfache Fehlerbehandlung | 30' | CRUD ergänzt |
| Muss | `✅` | Daten in der Datenbank zeigen | 15' | Tagesabnahme |

## Tag 7 – Block E: Unload

**Ziel:** Der vereinbarte JSON-Endpunkt liest die Daten per PDO aus der Datenbank
und liefert sie gefiltert aus.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Repetition | Datenvertrag gegen Beispiel-JSON prüfen | 15' | Fehler erkennen |
| Muss | `📕` | [`SELECT`, `JOIN`, Datenvertrag und JSON-Antwort](../theorie/E_unload/) | 35' | Weg von der DB zum JSON verstanden |
| Muss | `🧑‍🏫` | [`unload.php` geführt aufbauen](../code-alongs/E_unload/14_hitzesommer_ausliefern/): verbinden, lesen, Typen festlegen, `json_encode` | 35' | Stabiler JSON-Endpunkt |
| Muss | `🧑‍🏫` | Im selben Code-Along: Stadtfilter mit `$_GET` und Prepared Statement ergänzen, leere Liste und Fehler testen | 40' | Filterbare API-Antwort |
| Muss | Projekt | Eigenen `unload.php`-Endpunkt bauen | 60' | Endpunkt der Gruppe |
| Optional | `🧑‍🏫` | [15 Shark-Ranglisten ausliefern](../code-alongs/E_unload/15_sharkdaten_ausliefern/): Alias für ein reserviertes Wort, geprüfter Filter mit Status 400 | 45' | Zweiter Endpunkt an anderen Daten |
| Muss | `✅` | Endpunkt ohne Filter, mit Treffer und ohne Treffer zeigen | 15' | Tagesabnahme |

## Tag 8 – Block F: Chart.js und UX-Slot

**Ziel:** Das Frontend lädt den Unload-Endpunkt und zeigt einen ersten Chart.
Der UX-Slot ist laut Miro-Board flexibel und kann auch früher stattfinden.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | `📕` | [Datengrafiken](../theorie/F_visualisierung/): Absicht vor Diagrammtyp, was Chart.js kann, `labels` und `datasets` | 30' | Begründeter Diagrammtyp |
| Muss | `🧑‍🏫` | [16 Hitzesommer visualisieren](../code-alongs/F_visualisierung/16_hitzesommer_liniendiagramm/): `fetch()` auf den Endpunkt, Datensätze zu `labels` und `datasets` umformen, Linie zeichnen, Stadtfilter über `?city=` | 70' | Sichtbarer Chart aus dem eigenen Endpunkt |
| Soll | `🧑‍🏫` | [17 Hitzesommer-Rangliste](../code-alongs/F_visualisierung/17_hitzesommer_ranking/): Balkendiagramm als zweiter Diagrammtyp, Zeitraum und Messwert ohne Serveraufruf | 60' | Interaktiver Chart |
| Optional | `🧑‍🏫` | [18 Hai-Ranglisten zeichnen](../code-alongs/F_visualisierung/18_sharkdaten_balkendiagramm/): Daten ohne Zeitachse, liegende Balken, Fehlerantwort des Endpunkts anzeigen | 45' | Zweite Grafik an anderen Daten |
| Soll | UX | UX-Input oder betreute Projektarbeit | 60' | Bessere Nutzung |
| Soll | `✅` | Chart aus echten Daten zeigen | 15' | Tagesabnahme |

## Tag 9 – Deployment, Integration und Feature-Freeze

**Ziel:** Am Ende des Tages steht die ausstellungsfähige Fassung – und sie läuft
zum ersten Mal nicht mehr nur lokal.

Bis hierher haben alle auf dem eigenen Rechner gearbeitet: PHP über `php -S`,
die Datenbank über MAMP. Das Deployment ist deshalb ein eigener Tooling-Teil und
nicht ein Nebensatz. Der Kern ist eine einzige Erkenntnis: Es ändern sich vier
Werte in `config.php`, sonst nichts.

| Prio | Form | Inhalt | Richtwert | Ergebnis |
| --- | --- | --- | ---: | --- |
| Muss | Tooling | Webhosting und Datenbank einrichten, Dateien hochladen, `config.php` auf dem Server ausfüllen, ETL einmal laufen lassen | 90' | Projekt unter eigener URL |
| Muss | Projekt | Backend und Frontend integrieren | 90' | Durchgehender Datenweg |
| Muss | Test | Ladefehler, leere Daten, Serverpfade und Browser testen | 60' | Fehlerliste abgearbeitet |
| Muss | Test | Gespeicherten JSON-/CSV-/DB-Fallback aktiv testen | 45' | Offline-/Daten-Fallback |
| Muss | Story | Titel, Kernaussage, Quelle und Limitationen prüfen | 45' | Verständliche Story |
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

## Story-Spur und Pascal Alisser

Die Datenjournalismus-Spur ist kein eigener technischer Block, sondern läuft
parallel ab Tag 1:

- Tag 1: Beispielprojekte ansehen, Themenfelder sammeln.
- Tag 2: erste Datenfrage formulieren (**M2**).
- Tag 3: Datenquelle recherchieren und finden (**M3**).
- Tag 4–5: Frage und Quelle auf Relevanz, Menge, Zeitraum und Zugang prüfen.
- Tag 7–9: Aussage, Quellen und Limitationen für die Ausstellung schärfen.
- Tag 10: Story am Marktstand vermitteln.

**Input Pascal Alisser (2 Stunden, `🔎`):** fixer Story-Input, der neben den
technischen Blöcken schwebt. Er ist **nicht** an einen technischen Block
gebunden und wird flexibel platziert (Richtwert um Tag 4–5, sobald die Gruppen
eine erste Datenfrage und Quelle haben). Inhalte: datenjournalistische Frage,
Quellensuche und -prüfung, aus Daten eine Story machen, Grenzen und Ethik, Zeit
für Fragen.

## Entscheidungen, die noch offen bleiben

- Genaue Unterrichtszeiten und Pausen; erst danach werden Richtwerte in einen
  definitiven Stundenplan übersetzt.
- Inhalt und definitive Position der UX-Slots.
- Genaue Platzierung des Pascal-Alisser-Inputs.
- Bewertungskriterien und Gewichtung.
- Detailorganisation des Marktstands.

Diese Punkte blockieren die Produktion der technischen Lernmaterialien nicht.
