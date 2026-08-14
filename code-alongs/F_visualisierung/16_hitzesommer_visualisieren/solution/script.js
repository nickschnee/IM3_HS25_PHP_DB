/**
 * Code-Along 16: Hitzesommer visualisieren – Lösung
 *
 * Für Dozierende: Die Nummern verweisen auf die TODOs im Startcode
 * ../script.js. Die Kommentare erklären, warum eine Zeile so aussieht – im
 * Unterricht wird nicht alles vorgelesen.
 *
 * Datenfluss dieser Datei:
 *
 *   unload.php          JSON, 258 Datensätze
 *     -> fetch()        die Liste kommt als JavaScript-Array an
 *       -> umformen     aus Datensätzen werden labels und datasets
 *         -> Chart.js   zwei Diagramme
 *           -> Bedienelemente ändern den Zustand und zeichnen neu
 *
 * Diese Datei liegt in solution/, deshalb steht vor jeder URL ein `../`.
 * Im eigenen Projekt liegen index.html und unload.php nebeneinander, dort
 * heisst es einfach 'unload.php'.
 */

// ---------------------------------------------------------------------------
// Einstellungen
// ---------------------------------------------------------------------------
//
// Alles, was man beim Anpassen als Erstes sucht, steht zuoberst.
//
// Die Musterdaten sind der Datenstand vom Tag der Übergabe. Sie sind aus
// unload.php exportiert, haben also exakt dieselbe Form. Mit ihnen lässt sich
// das Frontend bauen, bevor der Endpunkt fertig ist – und sie sind der
// Notvorrat für den Marktstand, falls die Datenbank streikt.

const MUSTERDATEN = '../data/heat-summers.json';
const ENDPUNKT = '../unload.php';

// Ab TODO 7 wird der echte Endpunkt gefragt. Zum Vergleichen genügt es, diese
// eine Zeile auf MUSTERDATEN zurückzustellen.
const DATEN_URL = ENDPUNKT;

// Jede Stadt behält in beiden Diagrammen dieselbe Farbe. Das ist keine
// Dekoration: Die Farbe ist hier die Beschriftung.
const CITY_COLORS = {
  Bern: '#4b93a4',
  Chur: '#b5723a',
  Zürich: '#8b8a6e',
};

// Zwei Messwerte, die dieselben Diagramme füllen. Der Schlüssel ist der
// Feldname aus dem Datenvertrag – deshalb genügt später row[metric].
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
// Zustand
// ---------------------------------------------------------------------------
//
// Drei Variablen beschreiben, was gerade zu sehen ist. Jede Interaktion ändert
// genau eine davon und ruft danach render() auf. Diese Trennung ist der Grund,
// warum am Schluss drei Bedienelemente zwei Diagramme steuern, ohne dass der
// Code unübersichtlich wird.

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

// ---------------------------------------------------------------------------
// Baustein 1: Holen
// ---------------------------------------------------------------------------

// TODO 1 und 2: Daten holen und Fehler bemerken
//
// fetch() liefert erst eine Antwort (die Kopfdaten), dann liest .json() den
// Inhalt. Beides dauert, deshalb await – genau wie in IM2.
//
// response.ok ist der Teil, den man am häufigsten vergisst. fetch() wirft
// keinen Fehler, wenn der Server 404 oder 500 antwortet; es ist ja eine
// Antwort angekommen. Ohne diese Prüfung versucht .json() eine Fehlerseite zu
// lesen und die Konsole meldet «Unexpected token <» – eine Meldung, die vom
// eigentlichen Problem wegführt.
//
// Der Stadtfilter aus Block E wird hier zum ersten Mal benutzt:
// ?city=Bern hängt an der URL, wenn nicht «alle» gewählt ist.
// encodeURIComponent() macht aus Zürich das, was in eine URL gehört.

async function loadSummers(city) {
  const url = city === 'alle'
    ? DATEN_URL
    : `${DATEN_URL}?city=${encodeURIComponent(city)}`;

  const response = await fetch(url);

  if (!response.ok) {
    throw new Error(`Der Endpunkt antwortet mit Status ${response.status}.`);
  }

  return await response.json();
}

// ---------------------------------------------------------------------------
// Baustein 2: Umformen
// ---------------------------------------------------------------------------
//
// Der Kern des ganzen Tages. Chart.js will keine Datensätze, sondern zwei
// Listen: labels für die Achse und data für die Werte. Beide müssen gleich
// lang sein und in derselben Reihenfolge stehen.
//
//   [{city: 'Bern', year: 1940, hot_days: 0}, …]   was wir haben
//   labels: [1940, 1941, …]  data: [0, 2, …]        was Chart.js will

// TODO 3: Der sichtbare Ausschnitt
//
// Der Jahr-Schieber filtert im Browser, ohne den Server zu fragen. Bei 258
// Datensätzen ist das der richtige Weg: Die Daten sind schon da, ein zweiter
// Netzwerkaufruf würde nur warten lassen.

function visibleSummers() {
  return summers.filter((summer) => summer.year >= fromYear);
}

// TODO 3: Die Beschriftungen der X-Achse
//
// Jedes Jahr kommt dreimal vor, einmal pro Stadt. new Set() wirft die
// Wiederholungen weg, [...] macht daraus wieder eine Liste.
//
// Die Sortierung ist nötig, weil sort() ohne Vergleichsfunktion als Text
// sortiert. Bei Jahreszahlen fällt das nicht auf, bei 9 und 10 schon.

function yearsOf(rows) {
  return [...new Set(rows.map((row) => row.year))].sort((a, b) => a - b);
}

// Welche Städte sind in den Daten? Mit Filter ist es eine, sonst drei.
// Die Liste kommt aus den Daten und steht nicht fest im Code – sonst müsste
// man diese Datei anfassen, sobald eine vierte Stadt dazukommt.

function cityNamesOf(rows) {
  return [...new Set(rows.map((row) => row.city))].sort();
}

// TODO 4: Eine Stadt wird eine Linie
//
// Ein «dataset» ist eine Linie: die Zahlen plus ihr Aussehen.
//
// Dass die Werte zu den Jahren passen, hängt an zwei Voraussetzungen:
// Der Endpunkt sortiert nach Jahr (ORDER BY aus Code-Along 14), und jede
// Stadt hat jedes Jahr. Genau das haben wir im Transform geprüft, als wir auf
// vollständige Sommer bestanden haben – hier zahlt sich das aus. Bei
// lückenhaften Daten müsste man pro Jahr nachschlagen statt einfach
// abzuzählen.

function datasetFor(rows, city) {
  const cityRows = rows.filter((row) => row.city === city);

  return {
    label: city,
    data: cityRows.map((row) => row[metric]),
    borderColor: CITY_COLORS[city] ?? '#575757',
    backgroundColor: CITY_COLORS[city] ?? '#575757',
    borderWidth: 2,
    tension: 0.3,

    // Ohne Punkte ist die Linie bei 86 Jahren lesbar; beim Darüberfahren
    // erscheinen sie trotzdem.
    pointRadius: 0,
    pointHoverRadius: 5,
  };
}

// TODO 6: Die Rangliste
//
// [...rows] macht eine Kopie, bevor sortiert wird. sort() verändert nämlich
// die Liste, auf der es aufgerufen wird. Hier kommt rows ohnehin frisch aus
// filter() – wer aber einmal summers direkt sortiert, hat die geladenen Daten
// dauerhaft umsortiert, und die Linie im ersten Diagramm springt.

function topSummers(rows, count = 10) {
  return [...rows]
    .sort((a, b) => b[metric] - a[metric])
    .slice(0, count);
}

// ---------------------------------------------------------------------------
// Baustein 3: Zeichnen
// ---------------------------------------------------------------------------
//
// Die Einstellungen stehen bewusst neben dem Diagramm und nicht darin. Sie
// sind Fleissarbeit, keine Erkenntnis – wer sie später braucht, findet sie in
// der Chart.js-Dokumentation.

const verlaufOptions = {
  responsive: true,

  // Zusammen mit der festen Höhe in style.css. Ohne diese Zeile darf sich das
  // Canvas seine Höhe aus der Breite ausrechnen.
  maintainAspectRatio: false,

  // Zeigt beim Darüberfahren alle Städte desselben Jahres – so vergleicht man
  // mit einer Bewegung statt mit dreien.
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

  // Der eine Unterschied zum stehenden Balkendiagramm. Die Beschriftungen
  // «2003 · Zürich» brauchen Platz, und den gibt es links.
  indexAxis: 'y',

  scales: {
    x: { beginAtZero: true, title: { display: true, text: '' } },
    y: { grid: { display: false } },
  },

  plugins: {
    // Eine einzige Reihe braucht keine Legende.
    legend: { display: false },
    tooltip: {
      callbacks: {
        label: (item) => `${item.formattedValue}${METRICS[metric].unit}`,
      },
    },
  },
};

// TODO 5 und 6: Die Diagramme einmal erzeugen
//
// Wichtigster Satz des Tages: Ein Diagramm wird einmal erzeugt und danach
// aktualisiert. new Chart() auf demselben Canvas ein zweites Mal aufzurufen
// gibt «Canvas is already in use» – und wer den alten Chart vorher zerstört,
// verliert bei jeder Interaktion die Animation und den Zustand der Legende.
//
// Beide starten leer. Gefüllt werden sie unten in render().

const verlaufChart = new Chart(document.querySelector('#verlauf'), {
  type: 'line',
  data: { labels: [], datasets: [] },
  options: verlaufOptions,
});

const ranglisteChart = new Chart(document.querySelector('#rangliste'), {
  type: 'bar',
  data: { labels: [], datasets: [] },
  options: ranglisteOptions,
});

// render() ist die einzige Stelle, die Diagramme anfasst. Egal was sich
// geändert hat – Stadt, Messwert oder Zeitraum – hier wird aus dem aktuellen
// Zustand das aktuelle Bild.

function render() {
  const rows = visibleSummers();
  const labels = yearsOf(rows);

  // --- Verlauf ---
  verlaufChart.data.labels = labels;
  verlaufChart.data.datasets = cityNamesOf(rows).map((city) => datasetFor(rows, city));
  verlaufChart.options.scales.y.title.text = METRICS[metric].axis;

  // Eine Anzahl beginnt bei null, sonst wirkt jede Schwankung wie ein Sprung.
  // Bei Temperaturen wäre die Null dagegen sinnlos: Zwischen 0 und 26 Grad
  // passiert in diesen Daten nichts, und die Unterschiede verschwinden.
  verlaufChart.options.scales.y.beginAtZero = metric === 'hot_days';

  verlaufChart.update();

  // --- Rangliste ---
  const top = topSummers(rows);

  ranglisteChart.data.labels = top.map((row) => `${row.year} · ${row.city}`);
  ranglisteChart.data.datasets = [
    {
      label: METRICS[metric].label,

      // Ein Balken pro Sommer, gefärbt nach Stadt. Deshalb ist
      // backgroundColor hier eine Liste und keine einzelne Farbe.
      data: top.map((row) => row[metric]),
      backgroundColor: top.map((row) => CITY_COLORS[row.city] ?? '#575757'),
      borderWidth: 0,
    },
  ];
  ranglisteChart.options.scales.x.title.text = METRICS[metric].axis;

  ranglisteChart.update();
}

// ---------------------------------------------------------------------------
// Baustein 4: Reagieren
// ---------------------------------------------------------------------------

// reload() ist der Weg über den Server: neue Daten holen, dann neu zeichnen.
// Alles andere unten kommt ohne Netzwerk aus.

async function reload() {
  statusText.textContent = 'Daten werden geladen …';

  try {
    summers = await loadSummers(citySelect.value);

    // Eine leere Liste ist kein Fehler, aber die Seite muss es sagen. Ein
    // leeres Diagramm ohne Text sieht aus wie ein Programmfehler.
    statusText.textContent = summers.length === 0
      ? 'Für diese Auswahl gibt es keine Daten.'
      : `${summers.length} Sommer geladen.`;

    render();
  } catch (error) {
    // Zwei Adressaten, wie schon im Backend: die genaue Meldung in die
    // Konsole, ein verständlicher Satz auf die Seite.
    console.error(error);
    statusText.textContent = 'Die Daten konnten nicht geladen werden. Läuft der Server?';
  }
}

// TODO 7: Die Stadtauswahl fragt den Endpunkt neu an
//
// Hier läuft die Kette einmal komplett: Auswahl -> ?city=Bern -> WHERE im SQL
// -> kleinere JSON-Antwort -> neues Diagramm. Man könnte auch im Browser
// filtern, die Daten sind ja alle da. Bei 258 Zeilen wäre das schneller; bei
// 200'000 Zeilen wäre es unmöglich. Der Server filtert, was viel ist, der
// Browser filtert, was schon da ist.

citySelect.addEventListener('change', reload);

// TODO 8: Messwert und Zeitraum ändern nur die Ansicht
//
// Kein fetch(), kein Warten: Der Zustand ändert sich, render() zeichnet neu.
// Das ist der Unterschied, den die kleinen Hinweise unter den Bedienelementen
// benennen.

for (const button of metricSwitch.querySelectorAll('button')) {
  button.addEventListener('click', () => {
    metric = button.dataset.metric;

    for (const other of metricSwitch.querySelectorAll('button')) {
      other.classList.toggle('is-active', other === button);
    }

    render();
  });
}

// input feuert während des Ziehens, change erst beim Loslassen. Weil hier
// nichts nachgeladen wird, darf es die schnellere Variante sein.

fromYearInput.addEventListener('input', () => {
  fromYear = Number(fromYearInput.value);
  fromYearValue.textContent = fromYear;
  render();
});

// ---------------------------------------------------------------------------
// Start
// ---------------------------------------------------------------------------

reload();
