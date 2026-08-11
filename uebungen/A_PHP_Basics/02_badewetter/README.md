# 02 – Badewetter

**Lernziel:** Du kannst eine Funktion mit einem Parameter schreiben und einen
Text mit `return` zurückgeben. PHP dient dabei nur als kleine API: reine
Textausgabe, kein HTML.

**Richtwert:** 25 Minuten

## Aufgabe

1. Ergänze die Funktion `makeBathingMessage`.
2. Verwende den Parameter `$temperatureC` in einem kurzen Satz.
3. Gib den Satz mit `return` zurück.
4. Rufe die Funktion mit dem vorbereiteten Wert auf und gib das Resultat mit
   `echo` aus.

Die Funktion soll noch nichts bewerten. Sie formuliert nur eine Meldung.

## Erwartetes Resultat

```text
Das Wasser hat heute 20.5 °C.
```

## Wenn du feststeckst

- Der Parameter ist innerhalb der Funktion als `$temperatureC` verfügbar.
- Nach `return` folgt der Wert, den die Funktion liefern soll.
- Beim Aufruf stehen runde Klammern: `makeBathingMessage(...)`.
- Damit der Browser reinen Text zeigt, gehört ganz oben:
  `header('Content-Type: text/plain; charset=utf-8');`

## Freiwillige Zusatzaufgabe

Ergänze einen zweiten Parameter `$location` und nenne den Ort in der Meldung.
