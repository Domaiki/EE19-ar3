<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHAHA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Dagens Chuck Norris skämt</h1>
        <?php
        // Adress till tjänsten
        $url = "https://api.chucknorris.io/jokes/random";

        // Anrop till API
        $json = file_get_contents($url);

        // Avkoda json-svaret
        $data = json_decode($json);

        // Plocka ut skämtet
        $skämt = $data->value;

        // Plocka ut bilden
        $bildurl = $data->icon_url;

        // Skriv skämtet, dvs "value"
        echo "<p>$skämt</p>";
        echo "<img src=\"$bildurl\">";
        ?>
    </div>
</body>
</html>