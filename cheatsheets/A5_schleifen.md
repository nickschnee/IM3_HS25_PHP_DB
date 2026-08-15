# Schleifen

> Block A · Code-Along `05_schleifen`

Eine Schleife wiederholt denselben Code für viele Werte. Die Ausgabe wird
einmal geschrieben – ob danach 5 oder 25 000 Datensätze kommen, ändert nichts
mehr am Code.

## foreach – der Normalfall

```php
foreach ($measurements as $measurement) {
    echo $measurement['time'] . ': ' . $measurement['temperature_c'] . " °C\n";
}
```

Mit Schlüssel, wenn man ihn braucht:

```php
foreach ($stations as $city => $temperatureC) {
    echo "$city: $temperatureC °C\n";
}

foreach ($cityIds as $city => $cityId) {
    echo $city . ' hat die id ' . $cityId . "\n";
}
```

`foreach` ist für Arrays fast immer die richtige Wahl: Es kennt keine
Index-Fehler und funktioniert auch bei assoziativen Arrays.

## for – wenn die Position zählt

```php
for ($i = 0; $i < 5; $i++) {
    echo $dates[$i] . ': ' . $temps[$i] . " °C\n";
}
```

| Teil | Bedeutung |
| --- | --- |
| `$i = 0` | Startwert |
| `$i < 5` | läuft, solange das stimmt |
| `$i++` | Schrittweite nach jedem Durchgang |

Der typische Einsatz in diesem Kurs sind **zwei parallele Listen**, wie sie
Open-Meteo liefert: `time[0]` gehört zu `temperature_2m_max[0]`.

```php
$dates = $data['daily']['time'];
$temps = $data['daily']['temperature_2m_max'];

for ($i = 0; $i < count($dates); $i++) {
    // $dates[$i] und $temps[$i] gehören zusammen
}
```

Dass die beiden Listen gleich lang sind, ist eine Annahme. Prüfen:

```php
if (count($dates) !== count($temps)) {
    throw new RuntimeException('Datum und Temperatur passen nicht zusammen.');
}
```

## while – wenn das Ende unbekannt ist

```php
while (($row = fgetcsv($handle, null, ',', '"', '')) !== false) {
    // eine CSV-Zeile nach der anderen, bis die Datei zu Ende ist
}
```

So lesen wir CSV-Dateien in [Block B](B1_extract.md). Wenn die Bedingung nie
`false` wird, läuft die Schleife endlos – dann hilft `Ctrl + C` im Terminal.

## continue und break

```php
foreach ($rows as $row) {
    if (!in_array($month, $summerMonths, true)) {
        $audit['outside_summer']++;   // erst zählen
        continue;                     // dann überspringen
    }

    // ab hier nur noch Sommertage
}
```

- `continue` überspringt den Rest **dieses** Durchgangs.
- `break` beendet die ganze Schleife.

Die Regel aus Block C: **kein Wegwerfen ohne Zähler.** Wer mit `continue`
Zeilen aussortiert, zählt vorher, wie viele es waren.

## Schleifen ineinander

```php
foreach ($cityIds as $city => $cityId) {
    echo $city . ":\n";

    foreach ($lastSummers as $summer) {
        echo '  ' . $summer['year'] . "\t" . $summer['hot_days'] . " Hitzetage\n";
    }
}
```

Zwei verschachtelte Schleifen sind in Ordnung. Ab drei lohnt es sich, den
inneren Teil in eine eigene Funktion zu verschieben.

## Was nicht in die Schleife gehört

```php
$insertSummer = $pdo->prepare('INSERT INTO heat_summers ... ');   // einmal davor

foreach ($rows as $row) {
    $insertSummer->execute([...]);                                // oft darin
}
```

Alles, was für jeden Durchgang gleich ist – eine Verbindung, ein `prepare()`,
das Laden einer Nachschlagetabelle –, steht **vor** der Schleife. Sonst
passiert es 258-mal statt einmal.

## Verwandte Cheatsheets

- [A4 Arrays](A4_arrays.md) – `array_map` und `array_filter` ersetzen manche Schleife
- [D2 PDO und Load](D2_pdo_load.md) – einmal vorbereiten, oft ausführen
