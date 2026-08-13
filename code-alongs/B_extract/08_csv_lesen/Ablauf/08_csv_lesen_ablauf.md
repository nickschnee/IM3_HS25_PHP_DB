# Ablauf `08_csv_lesen`

> **Ziel:** Die dritte Extract-Quelle kennenlernen: eine **CSV-Datei**. Wir lesen
> das Shark-Attack-Dataset mit `fgetcsv` ein und verwandeln jede Zeile in ein
> assoziatives Array. Richtwert: 30 Min.

## Voraussetzung

Im Ordner `data/` liegt `sharks.csv` (kuratierter Auszug im GSAF-Stil, 45
Zeilen). Die Datei ist bereits da.

## Der Unterschied zu den anderen Quellen

```text
06 JSON-Datei:  file_get_contents + json_decode  -> PHP-Array
07 Live-API:    fetchJson (cURL)                  -> PHP-Array
08 CSV-Datei:   fopen + fgetcsv                   -> PHP-Array
```

Wieder gilt: Der Extract ändert sich, das Ergebnis (ein PHP-Array von
Datensätzen) bleibt gleich.

## Schritte

1. `data/sharks.csv` kurz im Editor ansehen: erste Zeile = Spaltennamen, danach
   eine Zeile pro Angriff, Werte mit Komma getrennt.
2. Content-Type auf reinen Text setzen.
3. Die Datei mit `fopen('data/sharks.csv', 'r')` öffnen.
4. Die **Kopfzeile** separat mit `fgetcsv(...)` lesen – das sind die
   Spaltennamen.
5. In einer `while`-Schleife alle weiteren Zeilen lesen. Mit
   `array_combine($header, $row)` wird aus Spaltennamen + Werten ein
   assoziatives Array pro Angriff.
6. Datei mit `fclose` schliessen, dann Spaltennamen und Anzahl ausgeben.
7. Die ersten fünf Angriffe ausgeben.

## Gesprächspunkte

- **CSV = Tabelle als Text:** Zeilen sind Datensätze, die erste Zeile enthält
  die Spaltennamen. `fgetcsv` liest genau eine Zeile und trennt sie an den
  Kommas auf.
- **`array_combine`:** verbindet die Spaltennamen mit den Werten einer Zeile –
  so entsteht dieselbe „Liste von Objekten"-Struktur wie beim JSON-Dataset.
- **Die vielen Argumente bei `fgetcsv`:** `',' '"' ''` sind die Standardwerte
  (Trennzeichen, Anführungszeichen, Escape). Wir geben sie explizit an, damit
  neuere PHP-Versionen keine Warnung zeigen.
- **Nur Extract:** Das Aufbereiten (Datumsformat, `Y/N` → `true/false`) ist
  Aufgabe von Transform (Block C), nicht von hier.
