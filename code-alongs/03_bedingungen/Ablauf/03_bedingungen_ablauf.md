# Ablauf `03_bedingungen`

> **Ziel:** Einen Zahlenwert mit `if`, `elseif` und `else` in einen von drei
> Fällen einordnen. Richtwert: 30 Minuten.

Die Kategorien sind eine didaktische Vereinfachung und keine offizielle
Badewarnung.

## Regel zuerst in Alltagssprache

- Unter 16 °C: `kalt`
- Ab 16 °C und unter 20 °C: `frisch`
- Ab 20 °C: `warm`

## Schritte

1. Mit dem kleinsten Fall beginnen: `$temperatureC < 16`.
2. `kalt` mit `return` zurückgeben.
3. Den mittleren Fall mit `elseif ($temperatureC < 20)` ergänzen.
4. Den verbleibenden Fall mit `else` abdecken.
5. Die Funktion für `19.4` aufrufen und die Ausgabe prüfen.
6. Gemeinsam die Grenzwerte `15.9`, `16`, `19.9` und `20` testen.

## Gesprächspunkte

- Weshalb braucht der mittlere Fall keine zweite Prüfung `>= 16`?
- In welcher Reihenfolge werden die Bedingungen geprüft?
- Fachliche Schwellenwerte müssen im späteren Projekt begründet und als
  Quelle dokumentiert werden.
