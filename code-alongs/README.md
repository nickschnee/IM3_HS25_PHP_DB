# Code-Alongs

Code-Alongs werden gemeinsam mit dem Dozierenden oder LBA entwickelt. Der Startcode
liegt direkt im jeweiligen Ordner, die fertige Fassung in `solution/`.

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

Der erste Schritt trennt bewusst die beiden Fehlerquellen: Wer dort Zeilen im
Browser sieht, hat eine funktionierende Verbindung – alles Weitere ist dann
reine Programmierung. Der zweite Schritt bringt Extract und Transform fertig
mit und baut nur noch `load.php`; damit ist die ETL-Kette zum ersten Mal
durchgehend.

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
überarbeitet und in Block-Ordner (`E_…`, `F_…` usw.) einsortiert.
