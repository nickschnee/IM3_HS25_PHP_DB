# Leaflet – Karten

> Block F · Code-Along `19_sharkdaten_karte` (Zusatzmaterial)

Chart.js kann keine Karten. Leaflet kann es, und es funktioniert nach demselben
Muster: Daten holen, umformen, zeichnen.

## Einbinden

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css">
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js"></script>

<div id="karte"></div>
```

Das `<div>` braucht in CSS eine feste Höhe. Ohne sie bleibt die Karte
unsichtbar – der häufigste Anfängerfehler.

## Drei Bausteine

```js
function zeichneKarte() {
  const karte = L.map('karte').setView([20, 0], 2);

  L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>, ' +
      '&copy; <a href="https://carto.com/attributions">CARTO</a>',
    maxZoom: 8,
  }).addTo(karte);

  L.geoJSON(grenzen, {
    style: stilFuer,
    onEachFeature: (feature, layer) => {
      layer.bindPopup(popupText(feature));
    },
  }).addTo(karte);

  return karte;
}
```

| Baustein | Zweck |
| --- | --- |
| `L.map(id).setView([lat, lng], zoom)` | wohin gezeichnet wird und welcher Ausschnitt |
| `L.tileLayer(...)` | der Hintergrund aus Kartenkacheln |
| `L.geoJSON(...)` | die eigenen Daten als Flächen |

Die `attribution` ist keine Höflichkeit, sondern Pflicht: Wer fremde Kacheln
benutzt, nennt die Quelle. Das steht in den Nutzungsbedingungen von
OpenStreetMap.

## GeoJSON

Die Umrisse der Länder liegen als Datei bei – sie ändern sich nicht und müssen
nicht aus der Datenbank kommen.

```json
{
  "type": "Feature",
  "properties": { "name": "United States of America", "iso3": "USA" },
  "geometry": { "type": "MultiPolygon", "coordinates": [ ... ] }
}
```

In `properties` steht, was wir zum Verbinden brauchen. `geometry` ist die Form.

Beim Laden gilt die Content-Type-Prüfung aus [F1](F1_chartjs.md) **nicht**:
Eine `.geojson`-Datei wird als `application/geo+json` ausgeliefert – korrekt,
aber ohne die Zeichenkette `application/json`. Eine statische Datei kann gar
nicht «nicht ausgeführtes PHP» sein, also ist der Test dort sinnlos.

```js
const [laender, geojson] = await Promise.all([
  ladeVomEndpunkt(DATEN_URL),
  ladeKartendatei(GRENZEN_URL),
]);
```

`Promise.all` schickt beide Anfragen gleichzeitig los. Scheitert eine, scheitert
das Ganze – eine halbe Karte gibt es nicht.

## Verbunden wird über einen Schlüssel

Die Kartendatei kennt `iso3`, unsere Daten kennen `iso3`. Deshalb wurde im
[Transform](C1_transform.md) nachgeschlagen statt kategorisiert.

```js
function nachCode(laender) {
  const tabelle = new Map();

  for (const zeile of laender) {
    if (zeile.iso3 !== null) {
      tabelle.set(zeile.iso3, zeile);
    }
  }

  return tabelle;
}
```

Eine `Map` statt `find()`: Leaflet ruft die Style-Funktion für jedes der 177
Länder einmal auf. Mit `find()` würde dabei 177-mal die ganze Liste durchsucht.

## Klassen statt Farbverlauf

```js
const KLASSEN = [
  { ab: 500, farbe: '#2f6b7a', text: '500 und mehr' },
  { ab: 100, farbe: '#4b93a4', text: '100 bis 499' },
  { ab: 50,  farbe: '#7db0bd', text: '50 bis 99' },
  { ab: 20,  farbe: '#a8c9d2', text: '20 bis 49' },
  { ab: 5,   farbe: '#cfe0e5', text: '5 bis 19' },
  { ab: 1,   farbe: '#eef4f6', text: '1 bis 4' },
];

const FARBE_KEINE_DATEN = '#ebebe7';

function farbeFuer(iso3) {
  const zeile = laenderNachCode.get(iso3);

  if (zeile === undefined) {
    return FARBE_KEINE_DATEN;
  }

  const klasse = KLASSEN.find((eintrag) => zeile.incidents >= eintrag.ab);

  return klasse === undefined ? FARBE_KEINE_DATEN : klasse.farbe;
}
```

Warum Klassen? Ein Land hat 1486 Vorfälle, mehr als die Hälfte aller Länder hat
einen einzigen. Bei einem linearen Verlauf wäre ein Land dunkel und alles
andere praktisch weiss.

**Die Grenzen sind eine Entscheidung, keine Rechnung.** Wer sie verschiebt,
verändert die Aussage der Karte, ohne eine einzige Zahl zu ändern. Deshalb
stehen sie zuoberst in der Datei und nicht irgendwo in einer Funktion.

Die Legende entsteht aus derselben Liste – so kann sie gar nicht erst
auseinanderlaufen.

## Kein Eintrag heisst nicht null

Ein Land ohne Daten bekommt Grau, nicht die hellste Klasse. «Wir wissen es
nicht» darf nicht aussehen wie «ein einziger Vorfall».

Dasselbe gilt für den Popup-Text: «für dieses Land liegt uns keine Zahl vor»
statt «keine erfassten Vorfälle». Der zweite Satz wäre eine Behauptung über die
Welt, der erste eine Auskunft über unsere Daten.

## Eine Weltkarte sieht aus wie die Wahrheit

Eine Karte wirkt vollständig, auch wenn sie es nicht ist. Auf der
Shark-Attack-Karte fehlen drei Sorten Land, und keine davon sieht man ihr an:

- Länder, deren Schreibweise nicht in der Nachschlagetabelle steht;
- Länder mit Code, die in der groben Kartendatei keine Fläche haben;
- Vorfälle, bei denen gar kein Land erfasst wurde.

Das gehört als Hinweis unter die Karte – nicht in die Fussnote einer
Dokumentation, die niemand liest.

## Verwandte Cheatsheets

- [F1 Chart.js](F1_chartjs.md) – Daten holen, Zustand, Zeichenfunktion
- [C1 Transform](C1_transform.md) – warum Ländercodes nachgeschlagen werden
