# Ablauf `08_json_filter`

> **Ziel:** Den Endpunkt aus CA 07 mit `$_GET` filtern. `?stadt=bern` liefert
> nur noch Bern; ohne Parameter kommen alle Städte; eine unbekannte Stadt gibt
> eine saubere leere Liste `[]`. Richtwert: 30 Minuten.

## Ausgangslage

Der obere Teil der Datei ist der fertige Endpunkt aus CA 07 (alle Städte, Jahres-
Höchstwerte). Wir ergänzen nur den Filter. So kann man diesen Code-Along auch
ohne CA 07 mitmachen.

## Die wichtige Unterscheidung

```text
Frontend        ->  ?stadt=bern  ->  unser PHP-Endpunkt     (das ist $_GET)
unser PHP-Skript ->  cURL GET     ->  externe API           (kommt in Block D)
```

`$_GET` liest Parameter, die **unser** Skript in der URL bekommt. Das ist etwas
anderes als ein ausgehender Request an eine fremde API.

## Schritte

1. Endpunkt ohne Filter im Browser öffnen: alle 261 Einträge erscheinen.
2. Den Filter aus der URL lesen: `$filter = $_GET['stadt'] ?? '';`. Das `?? ''`
   verhindert eine Fehlermeldung, wenn kein Parameter da ist.
3. Nur filtern, wenn `$filter` nicht leer ist. Mit `foreach` durch `$messungen`
   gehen und nur passende Einträge in eine neue Liste übernehmen.
4. `strtolower()` auf beiden Seiten vergleichen, damit `?stadt=bern` auch
   „Bern" trifft.
5. Header setzen und `json_encode` ausgeben.
6. Ausprobieren:
   - `?stadt=bern` → nur Bern (87 Einträge)
   - `?stadt=Zürich` → nur Zürich
   - kein Parameter → alle Städte
   - `?stadt=basel` → leere Liste `[]`

## Gesprächspunkte

- **Leere Resultate sind ok:** Eine unbekannte Stadt ist kein Absturz, sondern
  eine gültige, leere Antwort `[]`. Das Frontend kann darauf reagieren.
- **`?? ''` (Null-Koaleszenz):** liefert einen Standardwert, wenn der Parameter
  fehlt - sauberer als `isset(...)`-Abfragen.
- **Gross-/Kleinschreibung:** URLs kommen mal so, mal so. `strtolower()` macht
  den Filter robust. Umlaute wie in „Zürich" bleiben dabei unverändert.
- **Datenvertrag bleibt gleich:** Ob gefiltert oder nicht - die Einträge haben
  immer dieselben Felder. Genau das braucht das Frontend.
- **Ausblick:** Später kommt derselbe Endpunkt-Gedanke in `unload.php` wieder,
  dann mit Daten aus der Datenbank statt aus einer JSON-Datei.
