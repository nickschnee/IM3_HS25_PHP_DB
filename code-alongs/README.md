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

Weitere vorhandene Code-Alongs werden beim Aufbau der späteren Blöcke geprüft,
überarbeitet und ebenfalls in Block-Ordner (`C_…`, `D_…` usw.) einsortiert.
