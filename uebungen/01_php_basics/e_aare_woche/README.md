# e – Aare-Woche

**Lernziel:** Du kannst eine vorbereitete Liste mit `foreach` durchlaufen und
pro Datensatz eine Ausgabe erzeugen.

**Richtwert:** 35 Minuten

## Aufgabe

Die sieben Datensätze sind bereits vorbereitet.

1. Öffne im `<ul>` eine `foreach`-Schleife über `$measurements`.
2. Nenne den aktuellen Datensatz `$measurement`.
3. Erzeuge innerhalb der Schleife ein `<li>`.
4. Gib darin `day` und `temperature_c` aus.
5. Schliesse die Schleife nach dem `<li>`.

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
- Prüfe, ob die geschweifte Klammer nach dem `<li>` geschlossen wird.

## Freiwillige Zusatzaufgabe

Addiere in der Schleife alle Temperaturen und berechne nach der Schleife den
Durchschnitt mit `count($measurements)`.
