# 04 – Messstation

**Lernziel:** Du kannst zusammengehörige Felder in einem assoziativen Array
speichern und über ihre Schlüssel auslesen. PHP dient dabei nur als kleine
API: reine Textausgabe, kein HTML.

**Richtwert:** 25 Minuten

## Aufgabe

1. Ergänze im Array `$station` die Werte für Name, Fluss und aktiven Status.
2. Gib den Namen über den Schlüssel `name` aus.
3. Gib den Fluss über den Schlüssel `river` aus.
4. Untersuche das ganze Array mit `var_dump`.

Verwende diese vorbereiteten Daten:

| Schlüssel | Wert |
| --- | --- |
| `name` | `Schönau` |
| `river` | `Aare` |
| `is_active` | `true` |

## Erwartetes Resultat

Die Ausgabe zeigt `Schönau an der Aare` und darunter die Struktur des Arrays
(aus `var_dump`).

## Wenn du feststeckst

- Zwischen Schlüssel und Wert steht `=>`.
- Ein Feld wird so gelesen: `$station['name']`.
- `true` braucht keine Anführungszeichen.
- Damit der Browser reinen Text zeigt, gehört ganz oben:
  `header('Content-Type: text/plain; charset=utf-8');`

## Freiwillige Zusatzaufgabe

Ergänze das Feld `canton` mit dem Wert `Bern` und gib es aus.
