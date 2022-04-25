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
    // Skapa en klass Bil
    // Med egenskaperna: modell, pris, färg, årsmodell
    // Med metod: Sammanfattning()
    class Bil {
        // Egenskaper
        public $modell = "";
        public $pris = "0";
        public $färg = "";
        public $årsmodell = "0";

        // Konstruktor
        public function __construct($m, $p, $f, $å)
        {
            $this->modell = $m;
            $this->pris = $p;
            $this->färg = $f;
            $this->årsmodell = $å;
        }

        // Metoder
        public function Sammanfattning() {
            echo "<p>Modell: $this->modell, pris: $this->pris, färg: $this->färg, årsmodell: $this->årsmodell</p>";
        }
    }

    // Skapa 2 bilar
    $bil1 = new Bil("Volvo", 100000, "Röd", 2010);

    $bil2 = new Bil("Audi", 50000, "Silver", 2005);

    // Skriv ut sammanfattning
    $bil1->Sammanfattning();
    $bil2->Sammanfattning();
    ?>
</body>
</html>