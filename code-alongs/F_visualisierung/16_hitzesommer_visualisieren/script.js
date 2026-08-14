/**
 * Code-Along 16: Hitzesommer visualisieren
 *
 * Das Ende der Kette: Die Daten sind extrahiert, transformiert, geladen und
 * werden von unload.php als JSON ausgeliefert. Heute werden sie sichtbar.
 *
 *   JSON -> fetch() -> umformen -> Chart.js -> Interaktion
 *
 * Wir bauen wieder in vier Bausteinen und laden nach jedem Schritt die Seite
 * neu:
 *
 *   1 Holen   2 Umformen   3 Zeichnen   4 Reagieren
 *
 * Vorher:
 * - php -S localhost:8000 in diesem Ordner starten (die Seite muss über
 *   http:// laufen, sonst blockiert der Browser jedes fetch());
 * - für Baustein 4 zusätzlich MAMP mit den Daten aus Code-Along 12.
 *
 * Das HTML ist fertig. Diese Elemente stehen bereit:
 *
 *   #city         Auswahlfeld mit «alle», Bern, Chur, Zürich
 *   #metric       zwei Knöpfe mit data-metric="hot_days" bzw. "max_temperature_c"
 *   #from-year    Schieber von 1940 bis 2010
 *   #status       Zeile für Meldungen an die Leserin
 *   #verlauf      Canvas für das Liniendiagramm
 *   #rangliste    Canvas für das Balkendiagramm
 */

// ---------------------------------------------------------------------------
// Einstellungen
// ---------------------------------------------------------------------------

// Zwei mögliche Quellen, exakt dieselbe Form: Die Musterdatei ist aus
// unload.php exportiert. Wir bauen zuerst gegen die Datei und schalten in
// Baustein 4 auf den Endpunkt um.
const MUSTERDATEN = 'data/heat-summers.json';
const ENDPUNKT = 'unload.php';

const DATEN_URL = MUSTERDATEN;

// Jede Stadt behält in beiden Diagrammen dieselbe Farbe.
const CITY_COLORS = {
  Bern: '#4b93a4',
  Chur: '#b5723a',
  Zürich: '#8b8a6e',
};

// Die Schlüssel sind die Feldnamen aus dem Datenvertrag.
const METRICS = {
  hot_days: {
    label: 'Hitzetage',
    unit: ' Tage',
    axis: 'Tage ab 30 °C',
  },
  max_temperature_c: {
    label: 'Höchste Temperatur',
    unit: ' °C',
    axis: 'Grad Celsius',
  },
};

// ---------------------------------------------------------------------------
// Zustand: was gerade zu sehen ist
// ---------------------------------------------------------------------------

let summers = [];
let metric = 'hot_days';
let fromYear = 1940;

// ---------------------------------------------------------------------------
// Elemente
// ---------------------------------------------------------------------------

const citySelect = document.querySelector('#city');
const metricSwitch = document.querySelector('#metric');
const fromYearInput = document.querySelector('#from-year');
const fromYearValue = document.querySelector('#from-year-value');
const statusText = document.querySelector('#status');

// --- Baustein 1: Holen ------------------------------------------------------

// TODO 1: Die Daten holen.
//         Die Funktion soll die Liste der Sommer zurückgeben.
//         Ist eine Stadt gewählt, hängt ?city=... an die URL.

// TODO 2: Merken, wenn etwas schiefgeht.
//         fetch() wirft bei Status 404 oder 500 keinen Fehler – das muss man
//         selbst prüfen (response.ok).

async function loadSummers(city) {
  return [];
}

// --- Baustein 2: Umformen ---------------------------------------------------

// Chart.js will keine Datensätze, sondern zwei gleich lange Listen:
//
//   [{city: 'Bern', year: 1940, hot_days: 0}, …]   was wir haben
//   labels: [1940, 1941, …]  data: [0, 2, …]        was Chart.js will

// TODO 3: Den sichtbaren Ausschnitt und die Beschriftungen bestimmen.
//         visibleSummers() gibt alle Sommer ab fromYear zurück.
//         yearsOf() gibt jedes Jahr genau einmal zurück, aufsteigend sortiert.

function visibleSummers() {
  return summers;
}

function yearsOf(rows) {
  return [];
}

function cityNamesOf(rows) {
  return [...new Set(rows.map((row) => row.city))].sort();
}

// TODO 4: Aus einer Stadt eine Linie machen.
//         Ein «dataset» ist ein Objekt mit label, data und dem Aussehen.
//         Die Werte kommen aus dem gerade gewählten Messwert: row[metric].

function datasetFor(rows, city) {
  return {
    label: city,
    data: [],
    borderColor: CITY_COLORS[city] ?? '#575757',
    backgroundColor: CITY_COLORS[city] ?? '#575757',
    borderWidth: 2,
    tension: 0.3,
    pointRadius: 0,
    pointHoverRadius: 5,
  };
}

// TODO 6 (Teil 1): Die zehn stärksten Sommer bestimmen.
//         Achtung: sort() verändert die Liste, auf der es aufgerufen wird.

function topSummers(rows, count = 10) {
  return [];
}

// --- Baustein 3: Zeichnen ---------------------------------------------------

// Die Einstellungen sind Fleissarbeit und schon fertig. Interessant ist nur,
// was oben passiert: der Weg von den Datensätzen zu labels und data.

const verlaufOptions = {
  responsive: true,
  maintainAspectRatio: false,
  interaction: { mode: 'index', intersect: false },
  scales: {
    x: {
      title: { display: true, text: 'Sommer' },
      ticks: { maxTicksLimit: 12 },
      grid: { display: false },
    },
    y: {
      title: { display: true, text: '' },
    },
  },
  plugins: {
    legend: { position: 'bottom' },
    tooltip: {
      callbacks: {
        label: (item) =>
          `${item.dataset.label}: ${item.formattedValue}${METRICS[metric].unit}`,
      },
    },
  },
};

const ranglisteOptions = {
  responsive: true,
  maintainAspectRatio: false,
  indexAxis: 'y',
  scales: {
    x: { beginAtZero: true, title: { display: true, text: '' } },
    y: { grid: { display: false } },
  },
  plugins: {
    legend: { display: false },
    tooltip: {
      callbacks: {
        label: (item) => `${item.formattedValue}${METRICS[metric].unit}`,
      },
    },
  },
};

// TODO 5: Das Liniendiagramm einmal erzeugen – leer.
//         new Chart(canvas, { type, data, options })

// TODO 6 (Teil 2): Dasselbe für das Balkendiagramm der Rangliste.

// TODO 5 und 6 (Teil 3): render() füllt beide Diagramme aus dem Zustand und
//         ruft danach chart.update() auf. Ein Diagramm wird einmal erzeugt und
//         danach aktualisiert – nie zweimal erzeugt.

function render() {
}

// --- Baustein 4: Reagieren --------------------------------------------------

// TODO 7: Von der Musterdatei auf den echten Endpunkt umstellen (eine Zeile
//         weiter oben) und die Stadtauswahl anschliessen: bei jeder Änderung
//         neu laden. Das ist der Moment, in dem der $_GET-Filter aus Block E
//         zum ersten Mal benutzt wird.

async function reload() {
}

// TODO 8: Messwert-Knöpfe und Jahr-Schieber anschliessen.
//         Beide ändern nur den Zustand und rufen render() auf – ohne fetch().
//         Der aktive Knopf bekommt die Klasse is-active.

// --- Start ------------------------------------------------------------------

reload();
