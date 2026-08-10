# d – Messstation

**Lernziel:** Du kannst zusammengehörige Felder in einem assoziativen Array
speichern und über ihre Schlüssel auslesen.

**Richtwert:** 25 Minuten

## Aufgabe

1. Ergänze im Array `$station` die Werte für Name, Fluss und aktiven Status.
2. Gib den Namen über den Schlüssel `name` aus.
3. Gib den Fluss über den Schlüssel `river` aus.
4. Untersuche das ganze Array mit `print_r`.

Verwende diese vorbereiteten Daten:

| Schlüssel | Wert |
| --- | --- |
| `name` | `Schönau` |
| `river` | `Aare` |
| `is_active` | `true` |

## Erwartetes Resultat

Die Seite zeigt `Schönau an der Aare` und darunter die Struktur des Arrays.

## Wenn du feststeckst

- Zwischen Schlüssel und Wert steht `=>`.
- Ein Feld wird so gelesen: `$station['name']`.
- `true` braucht keine Anführungszeichen.

## Freiwillige Zusatzaufgabe

Ergänze das Feld `canton` mit dem Wert `Bern` und gib es aus.
