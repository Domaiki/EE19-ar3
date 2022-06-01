<?php
// Url:en
$url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";

// 1. Anropa api:et
$json = file_get_contents($url);

// 2. Avkoda json-svaret
$dataJson = json_decode($json);

// 3. Plocka ut data vi vill ha
// - "validTime"
// - "name": "t"
// - "values": [11.8]
// Första steg: arrayen timeseries
$timeSeries = $dataJson->timeSeries;

// För json-svaret
$dataKlockslag = [];
$dataTemperaturer = [];

// Loopa igenom timeSeries
foreach ($timeSeries as $timeStamp) {
    // Lägg till klockslaget
    $dataKlockslag[] = $timeStamp->validTime;

    // Plocka ut alla parametrerar
    $parameters = $timeStamp->parameters;
    
    // Söka efter name="t"
    foreach ($parameters as $parameter) {
        if ($parameter->name == "t") {
            // Lägg till temperaturen
            $dataTemperaturer[] = $parameter->values[0];
        }
    }
}

// Skriv ut svaret
$data = (object)[];
$data->label = $dataKlockslag;
$data->t = $dataTemperaturer;
echo json_encode($data);