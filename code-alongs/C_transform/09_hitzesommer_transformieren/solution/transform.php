<?php
/**
 * Code-Along 09: Hitzesommer transformieren – Lösung
 *
 * Für Dozierende: Die Kommentare erklären, was jeder Block tut und warum er so
 * geschrieben ist. Die Nummern verweisen auf die TODOs im Startcode
 * ../transform.php, damit im Unterricht klar ist, welcher Block gerade dran ist.
 *
 * Datenfluss dieser Datei:
 *
 *   3 Orte mit je zwei parallelen Tageslisten   (aus extract.php)
 *     -> ein Eintrag pro Stadt und Jahr         ($byCityAndYear)
 *       -> eine Zeile pro vollständigem Sommer  ($transformedRows)
 *
 * Die Untersuchungseinheit wechselt also unterwegs von «ein Tag» zu
 * «eine Stadt in einem Sommer». Genau das ist der Kern des Code-Alongs.
 */

$rawLocations = include __DIR__ . '/extract.php';

// Die drei Entscheide aus der Regelrunde stehen als benannte Variablen zuoberst
// und nicht als nackte Zahlen im Code. So sind sie im Unterricht änderbar:
// Schwelle auf 25 setzen und neu laden zeigt sofort, dass die Regel die Story
// macht. 92 = 30 (Juni) + 31 (Juli) + 31 (August).
$summerMonths = [6, 7, 8];
$hotDayThresholdC = 30.0;
$expectedDaysPerSummer = 92;

// Diese Zähler machen Datenverluste sichtbar.
//
// Achtung beim Erklären: Die fünf Zähler messen nicht dasselbe. input_days und
// output_rows sind Anfang und Ende in VERSCHIEDENEN Einheiten (Tage rein,
// Stadt-Sommer raus), die drei mittleren zählen Weggeworfenes. Sie ergeben
// deshalb keine Bilanz, die aufgeht.
$audit = [
    'input_days' => 0,
    'outside_summer' => 0,
    'invalid_measurements' => 0,
    'incomplete_summers' => 0,
    'output_rows' => 0,
];

// Hier wird aggregiert. $byCityAndYear ist ein assoziatives Array wie in
// Block A: Der Schlüssel ist "Stadt-Jahr", der Wert ist selbst wieder ein
// Array mit dem Zwischenstand dieses Sommers.
$byCityAndYear = [];

// ---------------------------------------------------------------------------
// TODO 1 bis 5: alle Rohtage durchlaufen, filtern und pro Stadt/Jahr sammeln
// ---------------------------------------------------------------------------

foreach ($rawLocations as $location) {
    $city = $location['city'];

    // Open-Meteo liefert zwei PARALLELE Listen: daily.time[i] gehört zu
    // daily.temperature_2m_max[i]. Das ist der Grund, warum unten eine
    // klassische for-Schleife mit Index steht und keine foreach-Schleife.
    // Das ?? [] fängt ab, dass eine Datei den Schlüssel gar nicht hat.
    $dates = $location['source']['daily']['time'] ?? [];
    $temperatures = $location['source']['daily']['temperature_2m_max'] ?? [];

    // TODO 2: Sind die Listen unterschiedlich lang, ist die Annahme «Index i
    // gehört zusammen» gebrochen und ALLE folgenden Werte wären still falsch
    // zugeordnet. Das ist kein Datenverlust, den man zählt, sondern ein Abbruch.
    if (count($dates) !== count($temperatures)) {
        throw new RuntimeException("Datum und Temperatur passen bei {$city} nicht zusammen.");
    }

    for ($i = 0; $i < count($dates); $i++) {
        $audit['input_days']++;

        $date = $dates[$i];
        $temperature = $temperatures[$i];

        // Das Datum kommt als "YYYY-MM-DD" mit fester Breite. Deshalb genügt
        // substr, es braucht keine Datumsbibliothek. Stellen 5 und 6 sind der
        // Monat, Stellen 0 bis 3 das Jahr (siehe unten).
        $month = (int) substr($date, 5, 2);

        // TODO 3: alles ausserhalb Juni bis August wegfiltern. Der dritte
        // Parameter true macht den Vergleich strikt: $month ist ein int, und
        // ohne strict würde auch ein "6" als Treffer durchgehen.
        //
        // continue heisst hier: Tag verwerfen, aber vorher im Audit zählen.
        // Dieses Paar aus Zähler und continue wiederholt sich unten noch zweimal.
        if (!in_array($month, $summerMonths, true)) {
            $audit['outside_summer']++;
            continue;
        }

        // Lücken in der Messreihe kommen als null an. null ist nicht 0 Grad –
        // ein fehlender Tag darf weder als Hitzetag noch als kühler Tag zählen.
        // Er fliegt raus und wird gezählt.
        if (!is_numeric($temperature)) {
            $audit['invalid_measurements']++;
            continue;
        }

        // TODO 4: Ab hier ist der Tag ein gültiger Sommertag und wird dem
        // Eintrag seiner Stadt und seines Jahres zugerechnet. Der Schlüssel
        // "Bern-1947" ist die Untersuchungseinheit als Text.
        $year = (int) substr($date, 0, 4);
        $key = $city . '-' . $year;

        // Beim ersten Tag dieses Sommers gibt es den Eintrag noch nicht, er
        // wird hier mit Startwerten angelegt. max_temperature_c
        // startet als null und nicht als 0: 0 wäre eine Behauptung («es war
        // 0 Grad»), null heisst «noch kein Wert gesehen». Der Vergleich weiter
        // unten muss diesen Fall deshalb eigens behandeln.
        if (!isset($byCityAndYear[$key])) {
            $byCityAndYear[$key] = [
                'city' => $city,
                'year' => $year,
                'measurement_days' => 0,
                'hot_days' => 0,
                'max_temperature_c' => null,
            ];
        }

        // TODO 5: Der Tag wird in drei Zahlen verwandelt und danach vergessen.
        // Ab hier existiert der einzelne Tag im Resultat nicht mehr – das ist
        // der Preis der Aggregation.
        $temperatureC = (float) $temperature;
        $byCityAndYear[$key]['measurement_days']++;

        if ($temperatureC >= $hotDayThresholdC) {
            $byCityAndYear[$key]['hot_days']++;
        }

        // Laufendes Maximum. Der erste gültige Tag gewinnt immer, weil
        // $oldMaximum dann noch null ist.
        $oldMaximum = $byCityAndYear[$key]['max_temperature_c'];
        if ($oldMaximum === null || $temperatureC > $oldMaximum) {
            $byCityAndYear[$key]['max_temperature_c'] = $temperatureC;
        }
    }
}

// ---------------------------------------------------------------------------
// TODO 6: unvollständige Sommer entfernen
// ---------------------------------------------------------------------------
//
// Hier greift der wichtigste Filter des Code-Alongs. Der Datensatz endet mitten
// im laufenden Sommer. Ohne diese Prüfung erschiene das letzte Jahr mit
// auffällig wenigen Hitzetagen – ein Datenfehler, der aussieht wie ein Befund.
// Deshalb zählt der Vergleich exakt (!==) und nicht «mindestens».

$transformedRows = [];

foreach ($byCityAndYear as $summer) {
    if ($summer['measurement_days'] !== $expectedDaysPerSummer) {
        $audit['incomplete_summers']++;
        continue;
    }

    // Gerundet wird erst hier, auf dem fertigen Maximum, und nicht bei jedem
    // Einzelvergleich. So verschiebt das Runden das Ergebnis nicht.
    $summer['max_temperature_c'] = round($summer['max_temperature_c'], 1);
    $transformedRows[] = $summer;
}

// ---------------------------------------------------------------------------
// TODO 7: sortieren
// ---------------------------------------------------------------------------
//
// PHP vergleicht zwei Arrays mit <=> elementweise: zuerst year, bei Gleichstand
// city. Das spart die verschachtelten if-Zweige, die man sonst schreiben müsste.
// Der Chart braucht die Zeilen später in dieser Reihenfolge.

usort($transformedRows, function (array $a, array $b): int {
    return [$a['year'], $a['city']] <=> [$b['year'], $b['city']];
});

$audit['output_rows'] = count($transformedRows);

// Der Rückgabewert ist der Datenvertrag dieses Schritts. transform.php gibt ein
// PHP-Array zurück, kein JSON – die JSON-Ausgabe passiert nur in index.php als
// Kontrollansicht.
//
// rules und audit reisen bewusst mit den Daten mit: Wer die Ausgabe später
// ansieht, sieht ohne Blick in den Code, nach welchen Regeln sie entstanden ist
// und was dabei verloren ging.
return [
    'question' => 'Wie hat sich die Anzahl Hitzetage pro Sommer verändert?',
    'rules' => [
        'months' => $summerMonths,
        'hot_day_threshold_c' => $hotDayThresholdC,
        'required_measurement_days' => $expectedDaysPerSummer,
    ],
    'data' => $transformedRows,
    'audit' => $audit,
];
