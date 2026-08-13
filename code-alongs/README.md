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

## Block B – PHP, JSON & APIs

Modell: `Quelle → PHP-Array → auswählen → JSON raus`. Immer dasselbe Muster
**lesen → Endpunkt → filtern**, aber mit drei verschiedenen Datenquellen. Der
**Extract ändert sich, der Rest bleibt gleich.**

**Track 1 – Statische JSON-Datei** (Thema Hitzesommer, Open-Meteo-Download):

| Nr | Code-Along | Neu |
| --- | --- | --- |
| 6 | [JSON lesen](B_php_json_api/06_json_lesen/) | `file_get_contents` + `json_decode` |
| 7 | [Eigener JSON-Endpunkt](B_php_json_api/07_json_endpoint/) | `json_encode` + Header |
| 8 | [Endpunkt filtern](B_php_json_api/08_json_filter/) | `$_GET` |

**Track 2 – Live-API** (Open-Meteo, Stundentemperaturen von heute):

| Nr | Code-Along | Neu |
| --- | --- | --- |
| 9 | [Live-Daten holen](B_php_json_api/09_live_lesen/) | `fetchJson()` (cURL) |
| 10 | [Live-Endpunkt](B_php_json_api/10_live_endpoint/) | Endpunkt aus Live-Daten |
| 11 | [Live-Endpunkt filtern](B_php_json_api/11_live_filter/) | `$_GET` auf Live-Daten |

**Track 3 – CSV-Datei** (Shark-Attack-Dataset): _in Arbeit (12–14)._

Die Datei- und CSV-Tracks haben je einen eigenen `data/`-Ordner, damit man auch
ohne den vorherigen Schritt sofort arbeiten kann. Der Live-Track braucht
Internet (die Daten kommen direkt von der API).

Weitere vorhandene Code-Alongs werden beim Aufbau der späteren Blöcke geprüft,
überarbeitet und ebenfalls in Block-Ordner (`C_…`, `D_…` usw.) einsortiert.
