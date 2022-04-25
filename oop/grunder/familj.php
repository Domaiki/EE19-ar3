<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // Skapa en klass "Familj"
    // Med två egenskaper "förnamn" & "efternamn"
    class Familj
    {
        // Egenskaper
        public $förnamn = "";
        public $efternamn = "";

        // Konstruktor
        public function __construct($f, $e)
     {
         $this->förnamn = $f;
         $this->efternamn = $e;
     }
}



    // Skapa 2 instanser av klassen Familj för 2 i din egen familj
    $medlem1 = new Familj();
    $medlem2 = new Familj();
    $medlem3 = new Familj();

    // Fyll i egenskaperna för de 2 instanserna
    $medlem1->förnamn = "John";
    $medlem1->efternamn = "Smith";
    $medlem2->förnamn = "Jane";
    $medlem2->efternamn = "Doe";
    $medlem3->förnamn = "Mister";
    $medlem3->efternamn = "Mysterious";
    ?>
</body>
</html>