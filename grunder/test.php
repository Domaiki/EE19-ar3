<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP test shit!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>PHP Test #1</h1>
    <p>
    <?php
    echo "hej! <br>";
    echo "missilen når sitt mål vid:</p>";

    echo "<p>";
    echo date("l d F Y H:i");
    echo "</p>";

    echo "<p>";
    setlocale(LC_ALL, "sv_SE.utf8");
    echo strftime("%A %e %B %Y");
    echo "</p>"
    ?>
    </p>
</body>
</html>