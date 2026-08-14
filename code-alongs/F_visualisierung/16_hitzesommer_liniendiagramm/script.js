/**
 * Code-Along 16: Hitzesommer visualisieren
 *
 * Das Ende der Kette: Die Daten sind extrahiert, transformiert, geladen und
 * werden von unload.php als JSON ausgeliefert. Heute werden sie sichtbar.
 *
 *   JSON -> fetch() -> umformen -> Chart.js
 *
 * Wir bauen wieder in vier Bausteinen und laden nach jedem Schritt die Seite
 * neu:
 *
 *   1 Holen   2 Umformen   3 Zeichnen   4 Reagieren
 *
 * Am Ende steht ein Liniendiagramm mit den Hitzetagen pro Sommer und eine
 * Stadtauswahl, die den Endpunkt neu anfragt. Ein zweites Diagramm und die
 * Interaktion im Browser kommen in Code-Along 17 dazu.
 *
 * ---------------------------------------------------------------------------
 * WICHTIG: Live Server funktioniert hier nicht.
 * ---------------------------------------------------------------------------
 *
 * Die Seite muss über den PHP-Server laufen:
 *
 *   cd code-alongs/F_visualisierung/16_hitzesommer_visualisieren
 *   php -S localhost:8000
 *
 * Dann http://localhost:8000 im Browser öffnen.
 *
 * In der Adressleiste muss 8000 stehen. Steht dort 5500, läuft die Seite über
 * den Live Server von VS Code. Der kann HTML, CSS und JavaScript – aber kein
 * PHP. Er schickt unload.php aus, wie sie auf der Festplatte liegt, und im
 * Browser steht dann «<?php» statt der Daten.
 *
 * Live Server unten rechts in der Statusleiste beenden: auf «Port: 5500»
 * klicken. Faustregel ab Block E: Sobald eine .php im Spiel ist, ist Live
 * Server das falsche Werkzeug.
 *
 * Per Doppelklick geöffnet (file://) geht es auch nicht, und zwar besonders
 * verwirrend: Dann bleibt die Seite vollständig leer und still. Weil diese
 * Datei als type="module" eingebunden ist, blockiert der Browser schon das
 * Laden des Skripts – es läuft keine einzige Zeile, also gibt es auch keine
 * Fehlermeldung auf der Seite. Der Hinweis steht nur in der Konsole.
 *
 * Kurz: Keine Diagramme, keine Meldung, kein Netzwerkaufruf? Dann steht in der
 * Adressleiste file:// oder 5500 statt http://localhost:8000.
 *
 * Für Baustein 4 muss zusätzlich MAMP laufen, mit den Daten aus Code-Along 12.
 *
 * Das HTML ist fertig. Diese Elemente stehen bereit:
 *
 *   #city      Auswahlfeld mit «alle», Bern, Chur, Zürich
 *   #status    Zeile für Meldungen an die Leserin
 *   #verlauf   Canvas für das Liniendiagramm
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

// Jede Stadt behält ihre Farbe.
const CITY_COLORS = {
  Bern: '#4b93a4',
  Chur: '#b5723a',
  Zürich: '#8b8a6e',
};

// ---------------------------------------------------------------------------
// Zustand: was gerade zu sehen ist
// ---------------------------------------------------------------------------

let summers = [];

// ---------------------------------------------------------------------------
// Elemente
// ---------------------------------------------------------------------------

const citySelect = document.querySelector('#city');
const statusText = document.querySelector('#status');

// --- Baustein 1: Holen ------------------------------------------------------

// TODO 1: Die Daten holen.
//         Die Funktion soll die Liste der Sommer zurückgeben.
//         Ist eine Stadt gewählt, hängt ?city=... an die URL.

// TODO 2: Merken, wenn etwas schiefgeht.
//         fetch() wirft bei Status 404 oder 500 keinen Fehler – das muss man
//         selbst prüfen (response.ok).
//         Und ein zweites Mal hinschauen, was für eine Antwort angekommen ist:
//         Steht im Content-Type kein application/json, ist es kein JSON.

async function loadSummers(city) {
  return [];
}

// --- Baustein 2: Umformen ---------------------------------------------------

// Chart.js will keine Datensätze, sondern zwei gleich lange Listen:
//
//   [{city: 'Bern', year: 1940, hot_days: 0}, …]   was wir haben
//   labels: [1940, 1941, …]  data: [0, 2, …]        was Chart.js will

// TODO 3: Die Beschriftungen der X-Achse bestimmen.
//         yearsOf() gibt jedes Jahr genau einmal zurück, aufsteigend sortiert.

function yearsOf(rows) {
  return [];
}

function cityNamesOf(rows) {
  return [...new Set(rows.map((row) => row.city))].sort();
}

// TODO 4: Aus einer Stadt eine Linie machen.
//         Ein «dataset» ist ein Objekt mit label, data und dem Aussehen.
//         Die Werte sind die Hitzetage: row.hot_days.

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
      beginAtZero: true,
      title: { display: true, text: 'Tage ab 30 °C' },
    },
  },
  plugins: {
    legend: { position: 'bottom' },
    tooltip: {
      callbacks: {
        label: (item) => `${item.dataset.label}: ${item.formattedValue} Tage`,
      },
    },
  },
};

// TODO 5: Das Diagramm einmal erzeugen – leer:
//         new Chart(canvas, { type, data, options })
//         Danach füllt render() es aus den geladenen Daten und ruft
//         chart.update() auf. Ein Diagramm wird einmal erzeugt und danach
//         aktualisiert – nie zweimal erzeugt.

function render() {
}

// --- Baustein 4: Reagieren --------------------------------------------------

// TODO 6: Von der Musterdatei auf den echten Endpunkt umstellen (eine Zeile
//         weiter oben) und die Stadtauswahl anschliessen: bei jeder Änderung
//         neu laden. Das ist der Moment, in dem der $_GET-Filter aus Block E
//         zum ersten Mal benutzt wird.

async function reload() {
}

// --- Start ------------------------------------------------------------------

reload();
