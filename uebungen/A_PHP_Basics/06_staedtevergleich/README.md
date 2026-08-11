# 06 – Städtevergleich (Capstone Block A)

**Lernziel:** Du kombinierst alles aus Block A – Variablen, Funktion mit
`return`, Bedingungen, assoziative Arrays und `foreach` – zu einer kleinen
Text-API, die drei Städte anhand der Aare-Wassertemperatur vergleicht.

**Richtwert:** 45 Minuten

Diese Übung ist bewusst **offen**: Es gibt keinen vorbereiteten Code. Du
entscheidest selbst, wie du die Datei aufbaust. Es zählen die Anforderungen
unten, nicht ein bestimmter Lösungsweg.

## Ausgangsdaten

Verwende diese drei Aare-Städte mit ihrer (erfundenen) Wassertemperatur von
heute. Die Daten tippst du selbst als PHP-Arrays ab – das automatische Abrufen
von einer API lernst du erst in Block B.

| Stadt  | Wassertemperatur (°C) |
| ---    |                  ---: |
| Brienz |                  15.4 |
| Thun   |                  18.2 |
| Bern   |                  20.1 |

## Anforderungen

Deine Datei soll:

1. **Kein HTML** ausgeben, sondern reinen Text – PHP dient hier als kleine API.
   (Denk an den passenden `Content-Type`-Header.)
2. Die drei Städte als **Liste von assoziativen Arrays** speichern. Sinnvolle
   Schlüssel sind z. B. `stadt` und `temperatur_c`.
3. Eine **Funktion** enthalten, die aus einer Temperatur mit `if`/`elseif`/
   `else` ein Label macht und es mit `return` zurückgibt (wie in Code-Along
   `03_bedingungen`):
   - unter 16 °C: `kalt`
   - unter 20 °C: `frisch`
   - ab 20 °C: `warm`
4. Mit einer **`foreach`-Schleife** pro Stadt genau eine Zeile ausgeben:
   Stadt, Temperatur und die Bewertung aus deiner Funktion.
5. Nach der Schleife die **wärmste Stadt** ermitteln und ausgeben. Tipp: In der
   Schleife die bisher wärmste Stadt merken.

## Erwartetes Resultat

Etwa so (deine genaue Formatierung darf abweichen):

```text
Aare-Städtevergleich heute
Brienz: 15.4 °C  -> kalt
Thun: 18.2 °C  -> frisch
Bern: 20.1 °C  -> warm

Wärmste Stadt: Bern (20.1 °C)
```

## Wenn du feststeckst

- Eine Stadt ist ein assoziatives Array:
  `['stadt' => 'Brienz', 'temperatur_c' => 15.4]`.
  Die Liste ist ein Array aus solchen Arrays.
- Deine Funktion bekommt **nur die Temperatur** und gibt einen Text zurück –
  sie soll selbst nichts ausgeben (`return`, nicht `echo`).
- Für die wärmste Stadt: Lege vor der Schleife eine Variable an (z. B.
  `$waermste = null`) und vergleiche in der Schleife mit `if`.
- Unsicher, was in einer Variable steckt? `var_dump(...)` zeigt Typ und Wert.

## Freiwillige Zusatzaufgaben

- Berechne zusätzlich die **Durchschnittstemperatur** der drei Städte.
- Gib pro Stadt eine kleine **Empfehlung** aus (z. B. bei `warm`:
  „Rein ins Wasser!").
- Ergänze eine vierte Stadt, ohne den Ausgabe-Code anzupassen.
