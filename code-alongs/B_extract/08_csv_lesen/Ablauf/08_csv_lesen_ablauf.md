# Ablauf `08_csv_lesen`

> **Ziel:** Die dritte Extract-Quelle kennenlernen: eine **CSV-Datei**. Wir lesen
> das echte Shark Attack File (GSAF) mit `fgetcsv` ein und verwandeln jede Zeile
> in ein assoziatives Array. Nur lesen – kein Endpunkt, kein Filter.
> Richtwert: 30 Min.

## Voraussetzung

Im Ordner `data/` liegt `attacks.csv` – der echte Datensatz „Global Shark Attack
File" (GSAF, via Kaggle). Rund 25'000 Zeilen, davon etwa 8'700 echte Angriffe;
der Rest sind leere Zeilen. Die Datei ist bereits da.

## Der Unterschied zu den anderen Quellen

```text
06 JSON-Datei:  file_get_contents + json_decode  -> PHP-Array
07 Live-API:    fetchJson (cURL)                  -> PHP-Array
08 CSV-Datei:   fopen + fgetcsv                   -> PHP-Array
```

Wieder gilt: Der Extract ändert sich, das Ergebnis (ein PHP-Array von
Datensätzen) bleibt gleich. Neu ist: **echte Daten sind unordentlich.**

## Schritte

1. `data/attacks.csv` kurz ansehen: erste Zeile = Spaltennamen, danach eine
   Zeile pro Angriff. Auffällig: viele leere Zeilen und Spaltennamen mit
   Leerzeichen (`Species `, `Sex `).
2. Content-Type auf reinen Text setzen.
3. Die Datei mit `fopen('data/attacks.csv', 'r')` öffnen.
4. Die **Kopfzeile** mit `fgetcsv(...)` lesen und mit `array_map('trim', ...)`
   die Leerzeichen aus den Spaltennamen entfernen.
5. In einer `while`-Schleife alle weiteren Zeilen lesen:
   - leere Zeilen überspringen (erste Spalte leer → `continue`);
   - sonst mit `array_combine($header, $row)` ein assoziatives Array pro Angriff
     bauen.
6. Datei mit `fclose` schliessen, dann Spaltennamen und Anzahl ausgeben.
7. Die ersten fünf Angriffe ausgeben (z. B. `Year`, `Country`, `Activity`).

## Gesprächspunkte

- **CSV = Tabelle als Text:** Zeilen sind Datensätze, die erste Zeile die
  Spaltennamen. `fgetcsv` liest genau eine Zeile und trennt sie an den Kommas –
  auch wenn ein Feld selbst ein Komma enthält (dann steht es in
  Anführungszeichen).
- **Echte Daten sind unordentlich:** rund 17'000 leere Zeilen, Spaltennamen mit
  Leerzeichen, teils doppelte Spalten. Genau darum `trim()` und das Überspringen
  leerer Zeilen – das ist typische Extract-Arbeit.
- **`array_combine`:** verbindet Spaltennamen mit den Werten einer Zeile – so
  entsteht dieselbe „Liste von Objekten"-Struktur wie bei JSON und API.
- **Die vielen Argumente bei `fgetcsv`:** `',' '"' ''` sind die Standardwerte
  (Trennzeichen, Anführungszeichen, Escape). Explizit angegeben, damit neuere
  PHP-Versionen keine Warnung zeigen.
- **Nur Extract:** Das Aufbereiten (Datumsformat, `Fatal (Y/N)` → `true/false`,
  fehlende Werte) ist Aufgabe von Transform (Block C), nicht von hier.

## Quelle

Global Shark Attack File (GSAF), via Kaggle:
<https://www.kaggle.com/datasets/felipeesc/shark-attack-dataset>
