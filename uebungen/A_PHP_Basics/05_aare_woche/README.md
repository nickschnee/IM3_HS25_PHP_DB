# 05 – Aare-Woche

**Lernziel:** Du kannst eine vorbereitete Liste mit `foreach` durchlaufen und
pro Datensatz eine Ausgabe erzeugen. PHP dient dabei nur als kleine API: reine
Textausgabe, kein HTML.

**Richtwert:** 35 Minuten

## Aufgabe

Die sieben Datensätze sind bereits vorbereitet.

1. Öffne eine `foreach`-Schleife über `$measurements`.
2. Nenne den aktuellen Datensatz `$measurement`.
3. Gib pro Durchlauf mit `echo` eine Zeile mit `day` und `temperature_c` aus.
4. Schliesse die Schleife.

## Erwartetes Resultat

Eine Liste mit sieben Zeilen, zum Beispiel:

```text
Montag: 18.9 °C
Dienstag: 19.1 °C
...
```

## Wenn du feststeckst

- Die Schleife beginnt mit
  `foreach ($measurements as $measurement) {`.
- Der einzelne Tagesname steht in `$measurement['day']`.
- Prüfe, ob die geschweifte Klammer der Schleife wieder geschlossen wird.
- Damit der Browser reinen Text zeigt, gehört ganz oben:
  `header('Content-Type: text/plain; charset=utf-8');`

## Freiwillige Zusatzaufgabe

Addiere in der Schleife alle Temperaturen und berechne nach der Schleife den
Durchschnitt mit `count($measurements)`.
