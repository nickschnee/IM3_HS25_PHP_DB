# Lösung – Messwertmaschine

## Runde 1

Beispiel mit Mittwoch:

```text
19.4 ist nicht kleiner als 19.
19.4 ist kleiner als 20.
Die Funktion gibt «frisch» zurück.

Ausgabe: Am Mittwoch ist die Aare frisch (19.4 °C).
```

## Runde 2

| Durchlauf | Tag | aktuelleTemperatur | bewertung |
| ---: | --- | ---: | --- |
| 1 | Montag | 18.9 °C | kühl |
| 2 | Dienstag | 19.1 °C | frisch |
| 3 | Mittwoch | 19.4 °C | frisch |
| 4 | Donnerstag | 19.8 °C | frisch |
| 5 | Freitag | 20.1 °C | warm |
| 6 | Samstag | 20.3 °C | warm |
| 7 | Sonntag | 20.0 °C | warm |

## Begriffe zuordnen

- **Variable:** Das beschriftete Feld `aktuelleTemperatur` hält während eines
  Durchlaufs genau den aktuellen Wert.
- **Funktion:** `bewerteTemperatur` ist die wiederverwendbare Regel.
- **Bedingung:** Die Vergleiche entscheiden zwischen `kühl`, `frisch` und
  `warm`.
- **Array:** Die geordnete Liste enthält alle sieben Messwertkarten.
- **Schleife:** Derselbe Ablauf wird für jede Karte wiederholt.
- **Rückgabewert:** Die Funktion liefert pro Karte genau eine Bewertung.

## Abschlussfragen

1. Gleich bleiben die Regel und das Ausgabemuster.
2. Tag, Temperatur und daraus folgende Bewertung ändern sich.
3. Es entstehen sieben Ausgaben.
4. Nur der Grenzwert in der Funktion wird geändert. Die Schleife und die
   Datenliste bleiben gleich.
