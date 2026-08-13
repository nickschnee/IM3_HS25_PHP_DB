# Ablauf `11_live_filter`

> **Ziel:** Den Live-Endpunkt aus CA 10 mit `$_GET` filtern. `?stadt=bern`
> liefert nur Bern; ohne Parameter alle Städte; unbekannte Stadt eine leere
> Liste `[]`. Richtwert: 30 Min. **Braucht Internet.**

## Ausgangslage

Der obere Teil ist der fertige Live-Endpunkt aus CA 10. Wir ergänzen nur den
Filter - exakt gleich wie in CA 08 bei den Datei-Daten.

## Schritte

1. Endpunkt ohne Filter öffnen: 72 Einträge (3 Städte × 24 Stunden).
2. Filter lesen: `$filter = $_GET['stadt'] ?? '';`.
3. Nur bei gesetztem Filter mit `foreach` die passenden Einträge übernehmen.
4. `strtolower()` auf beiden Seiten für Gross-/Kleinschreibung.
5. Header setzen und `json_encode` ausgeben.
6. Ausprobieren: `?stadt=bern`, `?stadt=Zürich`, kein Parameter, `?stadt=basel`.

## Gesprächspunkte

- **Derselbe Filter wie CA 08:** Ob Datei oder Live-API - sobald die Daten als
  PHP-Array vorliegen, ist das Filtern identisch. Die Quelle spielt keine Rolle
  mehr.
- **Drei Extract-Wege, ein Ziel:** Statische Datei (06-08), Live-API (09-11)
  und gleich CSV (12-14) enden alle im selben `$messungen`-Array und im selben
  Endpunkt-/Filter-Muster.
- **Leere Resultate:** wie immer eine gültige, leere Antwort `[]`, kein Fehler.
