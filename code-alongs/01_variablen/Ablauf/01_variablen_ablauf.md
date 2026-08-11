# Ablauf `01_variablen`

> **Ziel:** Werte als Variablen speichern, einfache Datentypen erkennen und
> eine lesbare Meldung ausgeben. Richtwert: 15 Minuten.

> **Hinweis:** PHP nutzen wir nur als kleine API - keine HTML-Ausgabe, nur
> `echo`/`var_dump`. Der Header `Content-Type: text/plain` sorgt für reine
> Textausgabe. Aus dieser Text-API wird in Block B eine JSON-API
> (`json_encode` + `application/json`).

## Schritte

1. `$location` als String mit dem Wert `Bern` anlegen.
2. `$temperatureC` als Float mit dem Wert `19.4` anlegen.
3. `$measuredAt` als String mit dem Wert `10:00` anlegen.
4. `$isOfficial` als Boolean mit dem Wert `true` anlegen.
5. In `$message` einen Satz mit den drei Werten zusammensetzen und mit `echo`
   ausgeben.
6. Im Browser (oder mit `curl`) laden und die Meldung prüfen.
7. Mit `var_dump($temperatureC)` und `var_dump($isOfficial)` Typ und Wert
   untersuchen.

## Gesprächspunkte

- Warum ist `19.4` kein String?
- Was verändert sich in der Ausgabe, wenn nur eine Variable geändert wird?
- `echo` schreibt den Wert; `var_dump` zeigt zusätzlich den Typ - ideal zum
  Debuggen.
- Wir brauchen kein HTML: PHP liefert hier nur Daten.

## Erwartetes Resultat

```text
Aare in Bern: 19.4 °C um 10:00 Uhr.
float(19.4)
bool(true)
```
