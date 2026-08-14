# Code-Alongs

Code-Alongs werden gemeinsam mit dem Dozierenden oder LBA entwickelt. Der Startcode
liegt direkt im jeweiligen Ordner, die fertige Fassung in `solution/`.

**Womit ihr die Seiten öffnet:** immer über `php -S localhost:8000` im Ordner
des Code-Alongs, nie mit dem Live Server von VS Code. Live Server kann HTML,
CSS und JavaScript, führt aber kein PHP aus: Er liefert den Quelltext von
`unload.php` aus, statt die Datei laufen zu lassen. In der Adressleiste muss
`8000` stehen, nicht `5500`.

## Block A – PHP Basics

| Reihenfolge | Code-Along                                     | Kurstag |
| ----------- | ---------------------------------------------- | ------- |
| 0           | [Hallo PHP](A_PHP_Basics/00_hallo_php/)        | Tag 1   |
| 1           | [Variablen](A_PHP_Basics/01_variablen/)        | Tag 2   |
| 2           | [Funktionen](A_PHP_Basics/02_funktionen/)      | Tag 2   |
| 3           | [Bedingungen](A_PHP_Basics/03_bedingungen/)    | Tag 2   |
| 4           | [Arrays](A_PHP_Basics/04_arrays/)              | Tag 3   |
| 5           | [Schleifen](A_PHP_Basics/05_schleifen/)        | Tag 3   |

Die sechs PHP-Code-Alongs bauen auf derselben kleinen Aare-Datenwelt auf. So
ändert sich jeweils das Programmierkonzept, nicht gleichzeitig auch das Thema.

## Block B – Extract

Nur der **Extract-Schritt**: Daten aus drei verschiedenen Quellen lesen, jeweils
bis zu einem PHP-Array. Immer dieselbe Idee – **Quelle → PHP-Array von
Datensätzen** – nur die Lese-Technik ändert sich. Das Umformen kommt in
Transform (Block C), der Endpunkt in Unload (Block E).

| Nr | Code-Along | Quelle | Technik |
| --- | --- | --- | --- |
| 6 | [JSON lesen](B_extract/06_json_lesen/) | statische JSON-Datei (Hitzesommer) | `file_get_contents` + `json_decode` |
| 7 | [API lesen](B_extract/07_api_lesen/) | Live-API (Open-Meteo) | `fetchJson()` (cURL) |
| 8 | [CSV lesen](B_extract/08_csv_lesen/) | CSV-Datei (Shark Attacks) | `fopen` + `fgetcsv` |

Die Datei- und CSV-Schritte haben je einen eigenen `data/`-Ordner, damit man
ohne den vorherigen Schritt sofort arbeiten kann. Der Live-Schritt braucht
Internet (die Daten kommen direkt von der API).

## Block C – Transform

Die Datenfrage wird zuerst in dokumentierte Regeln und einen Datenvertrag
übersetzt. Der Code darf komplex sein und mit KI-Unterstützung entstehen; die
fachlichen Entscheidungen und die Kontrolle bleiben beim Team.

| Nr | Code-Along | Datenfrage | Schwerpunkt |
| --- | --- | --- | --- |
| 9 | [Hitzesommer transformieren](C_transform/09_hitzesommer_transformieren/) | Hitzetage pro Stadt und Sommer | filtern, ableiten, aggregieren, vollständige Jahre prüfen |
| 10 | [Shark-Daten transformieren](C_transform/10_sharkdaten_transformieren/) | Hai-Kategorien und Aktivitäten in erfassten Vorfällen | komplexe Mappings mit KI planen und auditieren |

Beide Ordner enthalten Startcode, eine Lösung, den Unterrichtsablauf und die
bereits bekannten Rohdaten aus Block B. Beim Shark-Beispiel liegt zusätzlich
eine wiederverwendbare KI-Spezifikation bei.

## Block D – Load

Zuerst nur die Verbindung, dann die echten Daten. Datenbank und PDO kommen hier
dazu, weil man sie zum Laden braucht.

| Nr | Code-Along | Worum es geht | Technik |
| --- | --- | --- | --- |
| 11 | [Datenbank testen](D_load/11_datenbank_testen/) | vier Messwerte schreiben und wieder lesen | `new PDO`, `prepare`/`execute`, `query` |
| 12 | [Hitzesommer laden](D_load/12_hitzesommer_laden/) | 258 transformierte Zeilen in zwei Tabellen schreiben | Fremdschlüssel füllen, `DELETE` vor der Schleife |
| 13 | [Shark-Ranglisten laden](D_load/13_sharkdaten_laden/) | 17 Ranking-Zeilen in eine Tabelle schreiben | reservierte Wörter, `UNIQUE` gegen Duplikate |

Der erste Schritt trennt bewusst die beiden Fehlerquellen: Wer dort Zeilen im
Browser sieht, hat eine funktionierende Verbindung – alles Weitere ist dann
reine Programmierung. Der zweite Schritt bringt Extract und Transform fertig
mit und baut nur noch `load.php`; damit ist die ETL-Kette zum ersten Mal
durchgehend.

Nummer 13 ist Zusatzmaterial und lädt die Shark-Ranglisten aus Block C. Sie
zeigt am zweiten Datensatz, dass es kein Standardvorgehen gibt, sondern immer
dieselben vier Fragen an die Daten: Hier genügt eine Tabelle, eine Spalte darf
nicht heissen wie im Datenvertrag, und die Datenbank selbst verhindert
Duplikate.

## Block E – Unload

Der Weg zurück ins Frontend: Die gespeicherten Daten werden per PDO gelesen und
als JSON-Endpunkt ausgeliefert. Geschrieben wird hier nichts mehr.

| Nr | Code-Along | Worum es geht | Technik |
| --- | --- | --- | --- |
| 14 | [Hitzesommer ausliefern](E_unload/14_hitzesommer_ausliefern/) | aus zwei Tabellen eine flache JSON-Liste machen | `SELECT` mit `JOIN`, `fetchAll`, `json_encode`, `$_GET`-Filter |
| 15 | [Shark-Ranglisten ausliefern](E_unload/15_sharkdaten_ausliefern/) | zwei Ranglisten aus einer Tabelle ausliefern | Alias für ein reserviertes Wort, geprüfter Filter mit Status 400 |

Der Endpunkt entsteht in vier Bausteinen – `Verbinden`, `Lesen`, `Antworten`,
`Filtern` – und wird nach jedem Baustein im Browser geprüft. Vorausgesetzt sind
die Tabellen aus Code-Along 12; wer sie leer hat, ruft dort einmal `load.php`
auf. Am Ende steht die Datei, die das Frontend-Team in Block F mit `fetch()`
lädt.

Nummer 15 ist Zusatzmaterial und liest die Shark-Ranglisten aus Code-Along 13.
Sie zeigt am zweiten Datensatz, dass der Bauplan derselbe bleibt und trotzdem
zwei Entscheidungen neu getroffen werden: Die Spalte `rank_position` muss im
`SELECT` zurück auf den Vertragsnamen übersetzt werden, und ein unbekannter
Filterwert ist hier keine leere Liste, sondern eine falsch gestellte Frage.

## Block F – Visualisierung

Das Ende der Kette: Das Frontend lädt den Endpunkt mit `fetch()` und macht aus
den Datensätzen ein Diagramm.

| Nr | Code-Along | Worum es geht | Technik |
| --- | --- | --- | --- |
| 16 | [Hitzesommer visualisieren](F_visualisierung/16_hitzesommer_visualisieren/) | ein Liniendiagramm auf dem eigenen Endpunkt | `fetch()`, `labels`/`datasets`, Chart.js, `chart.update()` |
| 17 | [Hitzesommer-Rangliste](F_visualisierung/17_hitzesommer_rangliste/) | ein zweites Diagramm und Interaktion ohne Server | Balkendiagramm, `sort`/`slice`, Zustand und `render()` |

Nummer 16 bleibt bewusst schmal: ein Diagramm, ein Bedienelement. In vier
Bausteinen – `Holen`, `Umformen`, `Zeichnen`, `Reagieren` – entsteht die Linie
mit den Hitzetagen pro Sommer, und die Stadtauswahl benutzt zum ersten Mal den
`$_GET`-Filter aus Block E. Der wichtigste Baustein ist der zweite: Chart.js
will keine Datensätze, sondern zwei gleich lange Listen.

Nummer 17 startet beim fertigen Stand von 16 und baut darauf auf. Neu sind der
zweite Diagrammtyp – eine Rangliste ist keine Entwicklung, also Balken statt
Linie – und die zweite Sorte Interaktion: Bedienelemente, die nur mit den
Daten rechnen, die schon im Browser liegen. Der Server filtert, was viel ist;
der Browser filtert, was schon da ist.

In beiden Ordnern liegen `index.html`, `style.css` und der fertige Endpunkt aus
Code-Along 14, damit Frontend und Endpunkt über dieselbe Adresse laufen.
Gebaut wird nur `script.js`. Die Datei `data/heat-summers.json` enthält
dieselben 258 Datensätze: Damit lässt sich das Frontend bauen, bevor das
Backend fertig ist – und sie ist der Fallback für den Marktstand.

**Nicht mit Live Server öffnen.** Diese Seiten laden `unload.php`; ein
statischer Server liefert dafür den PHP-Quelltext aus. Es gilt dieselbe Regel
wie oben: `php -S localhost:8000`, und in der Adressleiste steht `8000`.

Die Zugangsdaten stehen in **einer einzigen** `config.php` im Hauptordner des
Kurses – kopiert aus `config.template.php`, dort mit den eigenen Werten
ausgefüllt. Alle Code-Alongs binden dieselbe Datei ein:

```php
require __DIR__ . '/../../../config.php';
```

Sie steht in `.gitignore`; im Repository liegt nur die Vorlage. Ein Passwort an
einer Stelle zu pflegen ist nicht nur bequemer, es landet auch seltener
versehentlich in einem Commit.

Weitere Code-Alongs werden beim Aufbau der späteren Blöcke geprüft,
überarbeitet und in Block-Ordner einsortiert.
