<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kontainer">
        <h1>Lista filmer på OMDB</h1>
        <!-- Formulär för att mata in sökord = del-av-film -->
        <form action="#" method="POST">
            <div class="mb-3">
                <label for="sökterm" class="form-label">Sökterm</label>
                <input type="text" class="form-control" id="sökterm" aria-describedby="emailHelp" name="sökterm" required>
            </div>
            <button type="submit" class="btn btn-primary">Sök</button>
        </form>
        <main>
            <?php
            // Ta emot data från formuläret
            $sökterm = filter_input(INPUT_POST, "sökterm");

            // Om data finns
            if ($sökterm) {

                // Url:en till OMDB api
                $url = "https://www.omdbapi.com/?apikey=ea805224";

                // Hämta data, avkoda, lista alla filmer med bild och texter
                // Steg 1. Hämta data
                $json = file_get_contents($url . "&s=" . $sökterm);

                // Steg 2. Avkoda JSON
                $dataJson = json_decode($json);

                // Steg 3. Plocka det som intresserar oss
                $Search = $dataJson->Search;                // array
                $totalResults = $dataJson->totalResults;
                
                echo "<p>Hittade $totalResults filmer med söktermen \"$sökterm\"</p>";

                echo "<div class=\"grid\">";
                // Loopa igenom arrayen
                foreach ($Search as $film) {
                    $Title = $film->Title;
                    $Year = $film->Year;
                    $Type = $film->Type;
                    $Poster = $film->Poster;

                    // Skriver ut med Bootstrap Card
                    echo "<div class=\"card\" style=\"width: 18rem;\">";
                    echo "  <img src=\"$Poster\" alt=\"$sökterm\">";
                    echo "  <div class=\"card-body\">";
                    echo "      <h5 class=\"card-title\">$Title</h5>";
                    echo "      <p class=\"card-text\">$Type - $Year</p>";
                    echo "  </div>";
                    echo "</div>";
                }
                echo "</div>";
            }
            ?>
        </main>
    </div>
</body>

</html>