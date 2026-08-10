# c – Warnstufe

**Lernziel:** Du kannst einen Messwert mit `if`, `elseif` und `else` in drei
Fälle einordnen.

**Richtwert:** 25 Minuten

## Aufgabe

Eine fiktive Pegelstation verwendet für diese Übung folgende Regeln:

- unter 250 cm: `normal`
- ab 250 cm und unter 350 cm: `beobachten`
- ab 350 cm: `warnung`

1. Ergänze die erste Bedingung für `normal`.
2. Ergänze mit `elseif` den Fall `beobachten`.
3. Decke den letzten Fall mit `else` ab.
4. Teste danach nacheinander `220`, `300` und `370`.

## Erwartetes Resultat für 300

```text
Pegel: 300 cm – Stufe: beobachten
```

## Wenn du feststeckst

- Beginne mit dem kleinsten Bereich.
- Der zweite Fall wird nur geprüft, wenn der erste nicht zutrifft.
- Die Regeln sind erfunden und dürfen nicht als echte Warnwerte verwendet
  werden.

## Freiwillige Zusatzaufgabe

Teste exakt die Grenzen `250` und `350`. Entspricht das Resultat den Regeln?
