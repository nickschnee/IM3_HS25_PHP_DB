# Ablauf `10_live_endpoint`

> **Ziel:** Wie CA 07, aber die Daten kommen **live** aus der API. Wir holen für
> Bern, Zürich und Chur die Stundentemperaturen von heute und liefern sie als
> einen JSON-Endpunkt nach Datenvertrag. Richtwert: 35 Min. **Braucht Internet.**

## Datenvertrag

```json
{ "stadt": "Bern", "zeit": "2026-08-13T12:00", "temperatur": 28 }
```

Der Endpunkt liefert eine Liste solcher Einträge (24 Stunden × 3 Städte = 72).

## Schritte

1. An CA 07 erinnern: Aufbau ist identisch. Neu ist nur, dass die Daten pro
   Stadt **live geholt** werden.
2. Die Zuordnung `$staedte` mit Koordinaten ansehen. So behandelt ein `foreach`
   alle drei Städte gleich.
3. Pro Stadt die API-URL zusammenbauen (Koordinaten einsetzen) und mit
   `fetchJson($url)` holen.
4. Die parallelen Listen `hourly.time` und `hourly.temperature_2m` holen.
5. Pro Stunde einen Eintrag nach Datenvertrag an `$messungen` anhängen.
6. Header setzen und `json_encode($messungen)` ausgeben.

## Gesprächspunkte

- **Gleiches Muster, andere Quelle:** Der Code ist fast identisch zu CA 07 -
  nur `file_get_contents(...)` ist durch `fetchJson(...)` ersetzt. Genau das ist
  die Lektion: Der Extract ändert sich, der Endpunkt bleibt.
- **Drei API-Calls:** Wir rufen die API dreimal auf (einmal pro Stadt). Bei
  jedem Neuladen der Seite passiert das erneut - deshalb lädt die Seite kurz.
- **Feldnamen bewusst wählen:** Wir nennen das Feld `temperatur`, nicht
  `temperature_2m`. Der Datenvertrag ist unsere Sprache, nicht die der API.
- **Ausblick:** Genau darum speichert man Live-Daten später in einer Datenbank
  (Block C/D): damit der Marktstand nicht bei jedem Aufruf die API braucht.
