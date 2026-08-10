# Arbeitsblatt – Messwertmaschine

## Messwertkarten

Diese sieben Karten ausschneiden oder klar voneinander trennen.

| Montag | Dienstag | Mittwoch | Donnerstag |
| --- | --- | --- | --- |
| 18.9 °C | 19.1 °C | 19.4 °C | 19.8 °C |

| Freitag | Samstag | Sonntag |
| --- | --- | --- |
| 20.1 °C | 20.3 °C | 20.0 °C |

## Unsere vereinfachte Bewertungsfunktion

```text
Funktion bewerteTemperatur(temperatur)

WENN temperatur kleiner als 19 ist:
    gib «kühl» zurück
SONST WENN temperatur kleiner als 20 ist:
    gib «frisch» zurück
SONST:
    gib «warm» zurück
```

Die Begriffe sind für diese Übung erfunden und keine offizielle Empfehlung.

## Runde 1 – Ein Messwert

1. Zieht eine Messwertkarte.
2. Legt sie in ein gezeichnetes Feld mit dem Namen `aktuelleTemperatur`.
3. Führt den Wert von Hand durch `bewerteTemperatur`.
4. Schreibt den zurückgegebenen Text in ein zweites Feld mit dem Namen
   `bewertung`.
5. Formuliert die Ausgabe:
   `Am [Tag] ist die Aare [Bewertung] ([Temperatur] °C).`

### Zeichnung

Zeichnet auf einem A4-Blatt diesen Datenfluss und ergänzt eure Werte:

```text
Messwertkarte -> aktuelleTemperatur -> bewerteTemperatur() -> bewertung -> Ausgabe
```

## Runde 2 – Eine ganze Woche

1. Legt alle Karten in der Reihenfolge Montag bis Sonntag. Diese Liste ist
   euer **Array**.
2. Eine Person ist die **Schleife**. Sie nimmt immer genau die nächste Karte.
3. Eine Person ist die **Funktion**. Sie wendet die drei Regeln unverändert an.
4. Eine Person protokolliert jede Ausgabe in der Tabelle.
5. Stoppt erst, wenn keine Karte mehr übrig ist.

| Durchlauf | Tag | aktuelleTemperatur | bewertung | Ausgabe fertig? |
| ---: | --- | ---: | --- | --- |
| 1 |  |  |  |  |
| 2 |  |  |  |  |
| 3 |  |  |  |  |
| 4 |  |  |  |  |
| 5 |  |  |  |  |
| 6 |  |  |  |  |
| 7 |  |  |  |  |

## Abschlussfragen

1. Was bleibt in jedem Schleifendurchlauf gleich?
2. Was ändert sich?
3. Wie viele Ausgaben entstehen aus sieben Karten?
4. Wo würden wir die Regeln ändern, wenn `warm` neu bereits ab 19.5 °C gelten
   sollte?
