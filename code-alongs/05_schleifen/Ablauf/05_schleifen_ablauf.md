# Ablauf `05_schleifen`

> **Ziel:** Mit `foreach` eine vorbereitete Liste strukturierter Messungen
> durchlaufen und als Tabelle ausgeben. Richtwert: 35 Minuten.

## Auf Papier vorhersagen

Wie viele Tabellenzeilen werden aus vier Datensätzen entstehen? Welche zwei
Felder werden pro Zeile gebraucht?

## Schritte

1. Den äusseren Array `$measurements` und den ersten Datensatz ansehen.
2. Im `<tbody>` eine `foreach`-Schleife öffnen.
3. Den aktuellen Datensatz im Singular `$measurement` nennen.
4. Innerhalb der Schleife genau eine Tabellenzeile anlegen.
5. `time` und `temperature_c` über ihre Schlüssel ausgeben.
6. Schleife schliessen, Browser neu laden und vier Zeilen zählen.
7. Einen fünften vorbereiteten Datensatz ergänzen und beobachten, dass kein
   weiterer Ausgabecode nötig ist.

## Gesprächspunkte

- Der äussere Array ist die ganze Liste; `$measurement` ist jeweils genau ein
  Datensatz.
- `foreach` ist für diesen Lernpfad die wichtigste Schleife. `for`, `while`
  und `do while` bleiben vorerst Referenzwissen im Cheatsheet.
- Eine Schleife ist korrekt, wenn sie auch mit null, einem oder vielen
  Datensätzen sinnvoll läuft.
