<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dagens NASA bild</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Sök NASA bild</h1>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="datum" class="form-label">Ange datum</label>
                <input type="date" class="form-control" id="datum" name="datum">
            </div>
            <button type="submit" class="btn btn-primary">Sök</button>
        </form>
        <?php
        // Ta emot data från formuläret
        $datum = filter_input(INPUT_POST, "datum");

        // Innehåller datum något?
        if ($datum) {

            // Vi kan inte söka i framtiden
            if ($datum > date("Y-m-d")) {
                echo "<p class \"alert alert-warning\">Ogiltigt datum.</p>";
            } else {

            // Addressen till API:et
            $url = "https://api.nasa.gov/planetary/apod";

            // Vi behöver en API-key
            $apiKey = "eCtOfx0vYG5Fd1SjTQqgaz8vDNYJpjUiGeC3Ig3s";

            // 1. Anropa API:et med 2 parametrar
            $json = file_get_contents("$url?api_key=$apiKey&date=$datum");

            // 2. Avkoda json-svaret
            $data = json_decode($json);

            // 3. Plocka data vi vill ha
            // explanation
            $explanation = $data->explanation;
            // - title
            $title = $data->title;
            // - url
            $url = $data->url;

            // var_dump($url, $title, $explanation);
            echo "<img class=img-fluid src=\"$url\">";
            echo "<p>$explanation</p>";
            echo "<p>$title</p>";
            }    
        }
        ?>
    </div>
</body>
</html>