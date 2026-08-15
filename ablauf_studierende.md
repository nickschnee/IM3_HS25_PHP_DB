# Ablauf für Studierende

## Tagesstruktur

1. **Input + ausprobieren:** kurze Theorie, dann Code-Along oder Übung.
2. **Projektspur:** Gelerntes auf die eigene Datenfrage übertragen.
3. **Abschluss:** Ergebnis sichern, Meilenstein zeigen.

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
2. `🔎` Gruppen bilden `45'`
3. `✅` M1: Gruppen gebildet

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
12. `✅` M2: Datenfrage formuliert

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

#### Zusatzmaterial (Block C)

Dreierserie mit Airbnb-Daten von [Inside Airbnb](https://insideairbnb.com/):
vom rohen Datensatz über die eigene Datenfrage zum fertigen JSON.

- `💻` [01 Airbnb-Daten holen & erkunden](uebungen/C_transform/01_airbnb_erkunden/)
- `💻` [02 Datenfrage schärfen](uebungen/C_transform/02_datenfrage/)
- `💻` [03 Airbnb-Daten transformieren](uebungen/C_transform/03_airbnb_transformieren/)

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

#### Zusatzmaterial (Block F)

- `🧑‍🏫` Code-Along: [18 Shark-Balkendiagramme](code-alongs/F_visualisierung/18_sharkdaten_balkendiagramm/) `45'`
- `🧑‍🏫` Code-Along: [19 Shark-Karte mit Leaflet](code-alongs/F_visualisierung/19_sharkdaten_karte/) `45'`
