# Ablauf `03_datenspur_jagd`

> Im Kickoff, nach dem Kapitel «Reverse Engineering» der
> [Kickoff-Folien](../../../../theorie/00_kickoff/index.html). Die Klasse findet
> im Netzwerk-Tab heraus, woher eine Website ihre Zahlen holt. Botschaft am
> Schluss: Hinter jeder Grafik im Netz steht eine Adresse, die JSON liefert –
> und genau so eine wird euer Projekt am Ende selbst anbieten.

**Dauer:** 25' · **Sozialform:** Partnerarbeit mit Punktewertung → Plenum

**Lernphase:** Informationen aufnehmen und geführt anwenden (MOMBI 4–5)

## Material

Ein Laptop pro Paar, [`jagdkarte.md`](../jagdkarte.md) ausgedruckt oder an der
Wand. Beamer für die gemeinsame Auflösung.

## Vor dem Kurs prüfen

**Diese Übung veraltet schneller als jede andere im Kurs.** Interne Adressen
sind nicht dokumentiert und ändern ohne Vorwarnung. Beide Ziele vorher selbst
durchklicken.

Stand August 2026 liefern die beiden vorbereiteten Ziele:

```text
https://aareguru.existenz.ch/v2018/current?city=bern
https://www.energiedashboard.admin.ch/api/strom/v2/strom-verbrauch/landesverbrauch-mit-prognose
```

Falls ein Ziel ausfällt: Ersatz findet sich fast immer bei interaktiven
Dashboards und Karten. Rein serverseitig gerenderte Seiten – etwa
hitparade.ch, srf.ch/meteo oder die Playlist von energy.ch – zeigen im
Netzwerk-Tab nur Werbe- und Trackingaufrufe und taugen nicht als Ziel.

## Verlauf

| #   | Schritt                                                                                                                                      | Dauer |
| --- | ---------------------------------------------------------------------------------------------------------------------------------------------- | ----: |
| 1   | **Demo:** Netzwerk-Tab öffnen, Filter auf Fetch/XHR, aare.guru neu laden und die Antwort gemeinsam anschauen. Nur einmal, nicht zweimal.     |    5' |
| 2   | **Teil 1:** beide vorbereiteten Ziele zu zweit lösen und die Adresse im eigenen Tab aufrufen.                                                |    7' |
| 3   | **Teil 2:** freie Jagd auf selbst gewählten Seiten.                                                                                          |    8' |
| 4   | **Share:** Punkte einsammeln, zwei bis drei selbst gefundene Adressen am Beamer aufrufen.                                                    |    5' |

## Worauf es ankommt

- Der Filter **Fetch/XHR** ist der ganze Trick. Ohne ihn ertrinkt die Liste in
  Bildern, Schriften und Trackingaufrufen.
- Wer nichts findet, hat trotzdem etwas gelernt: Die Seite rendert
  serverseitig. Das ausdrücklich als Ergebnis werten, sonst gilt die Übung als
  gescheitert.
- Beim gemeinsamen Anschauen der JSON-Antwort die geschweiften Klammern und die
  Schlüssel-Wert-Paare benennen. Das ist die erste Begegnung mit der Struktur,
  die später aus PHP gelesen wird.
- Der Bogen zum Kurs: Am Ende baut jede Gruppe selbst so eine Adresse. Sie
  heisst dann `unload.php`.

## Wenn die Zeit knapp wird

Diese Übung ist der Zeitpuffer des Halbtags. Teil 2 streichen oder die ganze
Übung weglassen – die Demo aus Schritt 1 allein bringt schon den Kern.
