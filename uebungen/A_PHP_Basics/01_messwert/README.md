# 01 – Messwert

**Lernziel:** Du kannst Werte in Variablen speichern und in einem Satz
ausgeben. PHP dient dabei nur als kleine API: reine Textausgabe, kein HTML.

**Richtwert:** 20 Minuten

## Aufgabe

Öffne `index.php` und ergänze nur die markierten Stellen.

1. Speichere den Ort `Bern` in `$location`.
2. Speichere die Temperatur `19.4` in `$temperatureC`.
3. Speichere die Uhrzeit `10:00` in `$measuredAt`.
4. Setze aus den drei Variablen die Meldung zusammen und gib sie mit `echo`
   aus.

## Erwartetes Resultat

```text
Aare in Bern: 19.4 °C um 10:00 Uhr.
```

## Wenn du feststeckst

- PHP-Variablen beginnen mit `$`.
- Text braucht Anführungszeichen, Zahlen nicht.
- Jede Zuweisung endet mit `;`.
- Damit der Browser reinen Text zeigt, gehört ganz oben:
  `header('Content-Type: text/plain; charset=utf-8');`

## Freiwillige Zusatzaufgabe

Lege eine Variable `$source` an und ergänze die Quelle in der Meldung.
