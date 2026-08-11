# Ablauf `02_funktionen`

> **Ziel:** Eine Funktion mit Parametern deklarieren, einen Wert mit `return`
> zurückgeben und die Funktion mehrmals aufrufen. Richtwert: 20 Minuten.

> **Hinweis:** PHP nutzen wir nur als kleine API - keine HTML-Ausgabe, nur
> `echo`/`var_dump`. Aus dieser Text-API wird in Block B eine JSON-API
> (`json_encode` + `application/json`).

## Planung vor dem Tippen

```text
Ort + Temperatur + Zeitpunkt -> formatMeasurement() -> lesbare Meldung
```

## Schritte

1. Die Funktion `formatMeasurement` ohne Inhalt anlegen.
2. Die drei Parameter `$location`, `$temperatureC` und `$measuredAt`
   ergänzen.
3. Mit `return` den formatierten Satz zurückgeben.
4. Die Funktion mit den Berner Werten aufrufen und das Resultat in
   `$bernMessage` speichern.
5. Die Meldung mit `echo` ausgeben.
6. Dieselbe Funktion mit Brienzer Werten aufrufen und ausgeben.

## Gesprächspunkte

- Parameter sind Platzhalter; Argumente sind die konkreten Werte beim Aufruf.
- `return` liefert einen Wert. `echo` schreibt einen Wert in die Antwort.
- Die Funktion enthält nur eine Aufgabe und hat einen beschreibenden Namen.

## Erwartetes Resultat

Zwei gleich aufgebaute Meldungen mit unterschiedlichen Orts- und
Temperaturwerten.
