# Ablauf `04_arrays`

> **Ziel:** Ein indexiertes und ein assoziatives Array erstellen und einzelne
> Werte gezielt auslesen. Richtwert: 30 Minuten.

## Schritte

1. In `$temperatures` drei vorbereitete Kommazahlen speichern.
2. Den Wert am Index `1` ausgeben und die Indexierung ab `0` erklären.
3. Mit `$temperatures[] = 20.3` einen vierten Wert ergänzen.
4. In `$measurement` einen Datensatz mit den Schlüsseln `location`,
   `temperature_c` und `measured_at` anlegen.
5. Ort und Temperatur über ihre Schlüssel ausgeben.
6. Das ganze assoziative Array mit `print_r` untersuchen.

## Bewusste Begrenzung

Array-Funktionen wie `map`, `filter`, `reduce` und `splice` sind kein Muss in
diesem Einstieg. Zuerst müssen Liste, Index, Schlüssel und Wert sicher sitzen.

## Erwartetes Resultat

- Der zweite Temperaturwert erscheint.
- Ort und Temperatur des strukturierten Messwerts erscheinen.
- `print_r` zeigt alle drei Felder.
