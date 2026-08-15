# Ablauf IM3

## Tagesstruktur

1. **Input + ausprobieren:** kurze Theorie, dann Code-Along oder Übung.
2. **Projektspur:** Gelerntes auf die eigene Datenfrage übertragen.
3. **Abschluss:** Ergebnis sichern, Meilenstein zeigen.

## Inhaltliche Struktur

Damit ihr euch auf die Technik konzentrieren könnt, wechseln wir nicht ständig
das Thema. Wir arbeiten den ganzen Kurs über mit denselben wenigen Datensätzen.

**Block A – die Aare.** Für die PHP-Grundlagen brauchen wir Zahlen, die man
versteht, ohne sie zu erklären: die Wassertemperatur der Aare in Brienz, Thun
und Bern. Diese Werte tippt ihr noch von Hand als PHP-Array ab. So dreht sich
alles um Variablen, Funktionen, Bedingungen, Arrays und Schleifen – und nicht
um die Datenbeschaffung.

**Ab Block B – zwei Themen durch den ganzen ETL+U-Prozess.** Sobald wir Daten
wirklich einlesen, begleiten uns zwei Datensätze bis zur fertigen Grafik:

- 🌡️ **Hitzesommer** – die täglichen Höchsttemperaturen von Bern, Zürich und
  Chur seit 1940, von der Open-Meteo-API. Das ist unser roter Faden: aufgeräumte
  Zahlen, mit denen jeder Schritt sauber aufgeht.
- 🦈 **Shark Attacks** – das Global Shark Attack File als CSV mit rund 25'000
  Zeilen. Das ist unser Realitätscheck: echte Daten sind unordentlich, lückenhaft
  und uneinheitlich geschrieben.

Beide Datensätze durchlaufen dieselbe Kette. Pro Block ändert sich damit nur die
Technik, nicht das Thema:

Der Hitzesommer-Strang ist Pflichtprogramm und wird gemeinsam entwickelt. Der
Shark-Strang zeigt dieselben Schritte an schwierigeren Daten; ein Teil davon
steht als Zusatzmaterial zum Nachschauen bereit.

Für die Sensorbox im Kursraum gilt dasselbe Prinzip: Sie ist einfach eine
weitere Datenquelle, die wir wie eine API auslesen.

**Euer Projekt** läuft parallel mit. Ihr sucht euer eigenes Thema und euren
eigenen Datensatz und geht dieselbe Kette – nur eben mit euren Daten.

## Legende

`📕` Theorie / Slides `🧑‍🏫` Code-Along `💻` Digitale Übung
`📝` Analoge Übung `🛠️` Tooling / Projektarbeit `🔎` Story & Recherche
`✅` Meilenstein

## Ablauf nach Blöcken

Der Kurs ist in Themenblöcke gegliedert. Ein Block kann sich über mehrere
Kurstage erstrecken. Die Story- und Recherchespur (`🔎`) läuft parallel mit.

**Wo ihr arbeitet:** PHP und die Datenbank laufen auf eurem eigenen Rechner.
Ihr richtet beides zu Beginn des jeweiligen Blocks ein – den PHP-Server in
Block A, die Datenbank in Block D. Auf einen Webserver kommt euer Projekt erst
ganz am Schluss, im Deployment-Teil.

### Kickoff & Setup

1. `📕` Kickoff `45'`
2. `🔎` Gruppen bilden: Viererteam, davon je zwei für Backend und Frontend `45'`
3. `✅` **M1: Gruppen gebildet**

### Block A – PHP Basics

1. `🛠️` Tooling: Editor, Terminal und Git überprüfen `30'`
2. `🛠️` Tooling: Lokaler Server [00 Lokaler PHP-Server](theorie/00_lokaler_php_server/index.html) `30'`
3. `🧑‍🏫` Code-Along: [00 Hallo PHP](code-alongs/A_PHP_Basics/00_hallo_php) `30'`
4. `📕` Theorie A: [PHP Basics](theorie/A_PHP_Basics) `60'`
5. `🧑‍🏫` Code-Along: [01 Variablen](code-alongs/A_PHP_Basics/01_variablen) `25'`
6. `🧑‍🏫` Code-Along: [02 Funktionen](code-alongs/A_PHP_Basics/02_funktionen) `25'`
7. `🧑‍🏫` Code-Along: [03 Bedingungen](code-alongs/A_PHP_Basics/03_bedingungen) `25'`
8. `🧑‍🏫` Code-Along: [04 Arrays](code-alongs/A_PHP_Basics/04_arrays) `25'`
9. `🧑‍🏫` Code-Along: [05 Schleifen](code-alongs/A_PHP_Basics/05_schleifen) `25'`
10. `💻` Digitale Übung: [06 Städtevergleich](uebungen/A_PHP_Basics/06_staedtevergleich) `45'`
11. `🔎` Eigene Datenfrage formulieren `60'`
12. `✅` **M2: Datenfrage formuliert**

#### Zusatzmaterial (Block A)

- `💻` [01 Messwert](uebungen/A_PHP_Basics/01_messwert)
- `💻` [02 Badewetter](uebungen/A_PHP_Basics/02_badewetter)
- `💻` [03 Warnstufe](uebungen/A_PHP_Basics/03_warnstufe)
- `💻` [04 Messstation](uebungen/A_PHP_Basics/04_messstation)
- `💻` [05 Aare-Woche](uebungen/A_PHP_Basics/05_aare_woche)

### Block B – Extract

1. `💻` Digitale Übung: [01 Daten finden & herunterladen](uebungen/B_extract/01_daten_finden) `45'`
2. `📕` Theorie B: [Extract](theorie/B_extract) `20'`
3. `🧑‍🏫` Code-Along: [06 JSON lesen](code-alongs/B_extract/06_json_lesen) _(statische Datei)_ `30'`
4. `🧑‍🏫` Code-Along: [07 API lesen](code-alongs/B_extract/07_api_lesen) _(Live-API)_ `30'`
5. `📝` Analoge Übung: [01 Fetch Helper](stift-und-papier/01_fetch_helper/) `40'`
6. `🧑‍🏫` Code-Along: [08 CSV lesen](code-alongs/B_extract/08_csv_lesen) _(CSV-Datei)_ `30'`
7. `🧑‍🏫` Code-Along: [09 Sensor lesen](code-alongs/B_extract/09_sensor_lesen) _(Sensor-API)_ `30'`
8. `🔎` Datenquellen recherchieren & prüfen `60'`
9. `✅` **M3: Datensatz gefunden**

### Block C – Transform

1. `📕` [Theorie C: Transform](theorie/C_transform/) `60'`
2. `📝` Analoge Übung: [02 Wetterdaten transformieren](stift-und-papier/02_transform_weather/) `30'`
3. `🧑‍🏫` Code-Along: [09 Hitzesommer transformieren](code-alongs/C_transform/09_hitzesommer_transformieren/) `60'`
4. `🧑‍🏫` Code-Along: [10 Shark-Daten mit KI transformieren](code-alongs/C_transform/10_sharkdaten_transformieren/) `90'`

### Block D – Load

1. `📕` [Theorie D: Load (bis Kapitel Datenmodell)](theorie/D_load/) `30'`
2. `📝` Analoge Übung: eigenes Datenmodell zeichnen `35'`
3. `📕` [Theorie D: Load (ab Kapitel SQL)](theorie/D_load/) `45'`
4. `🛠️` Datenbank einrichten: [00 Lokale Datenbank](theorie/00_lokale_db/) `60'`
5. `🧑‍🏫` Code-Along: [11 Datenbank testen](code-alongs/D_load/11_datenbank_testen/) `60'`
6. `🧑‍🏫` Code-Along: [12 Hitzesommer laden](code-alongs/D_load/12_hitzesommer_laden/) `70'`

#### Zusatzmaterial (Block D)

- `🧑‍🏫` Code-Along: [13 Shark laden](code-alongs/D_load/13_sharkdaten_laden/)

### Block E – Unload

1. `📕` [Theorie E: Unload](theorie/E_unload/) `30'`
2. `🧑‍🏫` Code-Along: [14 Hitzesommer unloaden](code-alongs/E_unload/14_hitzesommer_ausliefern/) `60'`
3. `🛠️` Tooling: Deployment `60'`

#### Zusatzmaterial (Block E)

- `🧑‍🏫` Code-Along: [15 Shark-Ranglisten ausliefern](code-alongs/E_unload/15_sharkdaten_ausliefern/) `60'`

### Block F – Visualisierung

1. `📕` [Theorie F: Datengrafiken](theorie/F_visualisierung/) `30'`
2. `🧑‍🏫` Code-Along: [16 Hitzesommer visualisieren – Teil 1](code-alongs/F_visualisierung/16_hitzesommer_liniendiagramm/) `70'`
3. `🧑‍🏫` Code-Along: [17 Hitzesommer visualisieren – Teil 2](code-alongs/F_visualisierung/17_hitzesommer_ranking/) `60'`
4. `🔎` Diagrammtyp zur eigenen Kernaussage wählen und begründen `60'`

#### Zusatzmaterial (Block F)

- `🧑‍🏫` Code-Along: [18 Shark-Balkendiagramme](code-alongs/F_visualisierung/18_sharkdaten_balkendiagramm/) `45'`
- `🧑‍🏫` Code-Along: [19 Shark-Karte mit Leaflet](code-alongs/F_visualisierung/19_sharkdaten_karte/) `45'`

## Meilensteine

Meilensteine sind keine Prüfungen, sondern kurze Abnahmen: Ihr zeigt ein
kleines, konkretes Ergebnis, bevor es weitergeht. M1 bis M3 sind den Themenblöcken zugeordnet. M4, die Entwicklung eures eigenen Projekts läuft asynchron dazu. M5 ist die definitive Abgabe.

|      | Meilenstein             | Was ihr zeigt                                                                                                                                                      |
| ---- | ----------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `M1` | Gruppen gebildet        | Der lokale PHP-Server läuft, die Vierergruppe steht, Backend- und Frontend-Zweierteam sind festgelegt.                                                             |
| `M2` | Datenfrage formuliert   | Eure Gruppe hat eine erste eigene Datenfrage in einem Satz.                                                                                                        |
| `M3` | Datensatz gefunden      | Eine passende Datenquelle ist gefunden und enthält genug Daten – oder ihr zeigt, wie bis zum Marktstand genug Daten entstehen.                                     |
| `M4` | Erste Integration steht | Extract, Transform, Load und Unload liefern Daten bis ins Frontend, die Grafik funktioniert und ein stabiler Datenstand als Fallback ist da.                       |
| `M5` | Marktstand und Abgabe   | Das Projekt läuft auf dem Server, das README erklärt Setup und Endpunkte, die Datenquelle ist dokumentiert und ihr könnt ETL+U und eure Story-Entscheide erklären. |
