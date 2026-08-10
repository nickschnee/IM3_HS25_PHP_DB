# Ablauf `01_variablen`

> **Ziel:** Werte als Variablen speichern, einfache Datentypen erkennen und
> eine sichtbare Meldung ausgeben. Richtwert: 25 Minuten.

## Schritte

1. Den vorbereiteten HTML-Teil kurz zeigen. Er bleibt in diesem Code-Along
   unverändert.
2. `$location` als String mit dem Wert `Bern` anlegen.
3. `$temperatureC` als Float mit dem Wert `19.4` anlegen.
4. `$measuredAt` als String mit dem Wert `10:00` anlegen.
5. `$isOfficial` als Boolean mit dem Wert `true` anlegen.
6. In `$message` einen Satz mit den drei sichtbaren Werten zusammensetzen.
7. Die Seite im Browser laden und die Meldung prüfen.
8. Mit `var_dump($temperatureC)` Typ und Wert untersuchen.

## Gesprächspunkte

- Warum ist `19.4` kein String?
- Was verändert sich im Browser, wenn nur eine Variable geändert wird?
- `var_dump` ist eine temporäre Hilfe und keine Ausgabe für das fertige
  Produkt.

## Erwartetes Resultat

```text
Aare in Bern: 19.4 °C um 10:00 Uhr.
```
