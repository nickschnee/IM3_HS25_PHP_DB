# 03 – Datenspur-Jagd

> **Ziel:** Ihr findet im Netzwerk-Tab des Browsers heraus, woher eine Website
> ihre Daten holt – und ruft diese Adresse direkt auf.

**Dauer:** 25 Minuten inklusive Auswertung

**Sozialform:** zu zweit, mit Punktewertung

**Einsatz:** im Kickoff, nach dem Kapitel «Reverse Engineering» der
[Kickoff-Folien](../../../theorie/00_kickoff/index.html).

## Warum diese Übung

Viele Websites zeigen euch Zahlen, ohne sie zum Herunterladen anzubieten. Doch
irgendwoher muss die Seite ihre Daten holen – und dieser Weg ist im Browser
sichtbar. Wer ihn einmal gefunden hat, sieht Websites danach anders an.

Ausserdem lernt ihr dabei, wie eine JSON-Antwort aussieht. Genau solche
Antworten liest euer PHP später ein.

## Vorbereitung

Öffnet die Entwicklerwerkzeuge:

- **Chrome / Edge:** `Cmd`+`Option`+`I` (macOS) bzw. `F12` (Windows)
- **Firefox:** `Cmd`+`Option`+`I` bzw. `F12`

Wechselt auf den Reiter **Netzwerk** (englisch *Network*), setzt den Filter auf
**Fetch/XHR** und ladet die Seite neu. Jetzt seht ihr jede Anfrage, die die
Seite im Hintergrund stellt.

## Auftrag

### Teil 1 – Zwei vorbereitete Ziele

Für jedes Ziel notiert ihr die Adresse, die die Daten liefert, und ein Feld aus
der Antwort.

| # | Website | Was ihr sucht |
| - | ------- | ------------- |
| 1 | [aare.guru](https://aare.guru) | Woher kommt die Wassertemperatur? |
| 2 | [energiedashboard.admin.ch](https://www.energiedashboard.admin.ch/strom/stromverbrauch) | Woher kommen die Kurven im Diagramm? |

Wenn ihr die Adresse gefunden habt: kopiert sie in einen neuen Tab und ruft sie
direkt auf. Ihr solltet rohes JSON sehen.

### Teil 2 – Freie Jagd

Sucht euch selbst zwei Websites, die Zahlen anzeigen, die euch interessieren –
Sport, Musik, Verkehr, Wetter, Preise. Prüft im Netzwerk-Tab, ob sie ihre Daten
per JSON nachladen.

**Achtung:** Viele Seiten liefern die Zahlen fertig im HTML aus. Dann findet ihr
im Netzwerk-Tab nichts – und das ist ein gültiges Ergebnis, kein Misserfolg.

## Punkte

| Ergebnis | Punkte |
| -------- | -----: |
| Adresse gefunden und im Browser aufgerufen | 2 |
| Ein Feld aus der Antwort notiert | 1 |
| Selbst gefundene Seite mit JSON-Nachladung | 3 |
| Selbst geprüfte Seite ohne JSON, mit Begründung | 1 |

## Erwartetes Resultat

Ihr habt mindestens eine JSON-Antwort im Rohzustand im Browser gesehen und
könnt sagen, welche Adresse sie geliefert hat.

> **Wichtig:** Solche Adressen sind nicht dokumentiert und können jederzeit
> verschwinden. Für euer Projekt nehmt ihr eine offizielle Quelle.
