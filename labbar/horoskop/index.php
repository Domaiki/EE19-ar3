<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dagens horoskop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Dagens horoskop</h1>
        <?php
        // Hämta ned webbsidan
        $url = "https://astro.elle.se/";
        $sidan = file_get_contents($url);

        // Hitta början på horoskopet
        $start = strpos($sidan, "Väduren");

        echo "Horoskopet börjar på position $start";

        // Sök vidare för att hitta var texten börjar
        $startTexten = strpos($sidan, "<div class=\"o-indenter\">", $start);
        $slutTexten = strpos($sidan, "</div>", $startTexten);
        var_dump($start, $startTexten, $slutTexten);

        // Plocka ut horoskopet
        $horoskop = substr($sidan, $startTexten, $slutTexten - $startTexten);
        echo "<p>$horoskop</p>";
        ?>
    </div>
</body>
</html>