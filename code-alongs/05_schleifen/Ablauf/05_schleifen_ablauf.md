# Ablauf `05_schleifen`

> **Ziel:** Mit `foreach` eine vorbereitete Liste strukturierter Messungen
> durchlaufen und pro Messung eine Zeile mit `echo` ausgeben. Kein HTML: PHP
> dient hier nur als Datenlieferant, wir kontrollieren die Ausgabe mit `echo`
> und `var_dump`. Richtwert: 30 Minuten.

## Schritte

1. Den äusseren Array `$measurements` und den ersten Datensatz ansehen.
2. Einen fünften Datensatz mit `$measurements[] = [...]` ergänzen und
   festhalten: Die Schleife weiter unten muss dafür nicht angepasst werden.
3. Eine `foreach`-Schleife öffnen und den aktuellen Datensatz im Singular
   `$measurement` nennen.
4. Innerhalb der Schleife mit `echo` genau eine Zeile ausgeben.
5. `time` und `temperature_c` über ihre Schlüssel ausgeben.
6. Schleife schliessen, im Browser (oder mit `curl`) neu laden und fünf Zeilen
   zählen.
7. Am Schluss die ganze Struktur mit `var_dump($measurements)` untersuchen.

## Gesprächspunkte

- Der äussere Array ist die ganze Liste; `$measurement` ist jeweils genau ein
  Datensatz.
- Wir brauchen kein HTML: PHP wird hier als kleine API gedacht, die Daten
  ausgibt. `echo` schreibt den Wert, `var_dump` zeigt zusätzlich Typ und
  Struktur - ideal zum Debuggen.
- Der Header `Content-Type: text/plain` sorgt dafür, dass der Browser die
  Ausgabe als reinen Text zeigt und die Zeilenumbrüche erhalten bleiben.
- `foreach` ist für diesen Lernpfad die wichtigste Schleife. `for`, `while`
  und `do while` bleiben vorerst Referenzwissen im Cheatsheet.
- Eine Schleife ist korrekt, wenn sie auch mit null, einem oder vielen
  Datensätzen sinnvoll läuft.
