<?php
include "konfigdb.php";

// Ta emot data från formuläret
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

// Kolla att det inte är null
if ($email && $password) {

    //Kolla att användarnamn eller email inte används
    $sql = "SELECT * FROM register WHERE epost='$email'";

    $resultat = $conn->query($sql);

    // 3. Funkade SQL-kommandot?
    if (!$resultat) {
        echo "Någonting är fel med SQL-satsen!";
    } else {

        // Plocka ut svaret och lägg till det i arrayen $rad
        $rad = $resultat->fetch_assoc();

        if (password_verify($password, $rad['hash'])) {
            echo "Du är inloggad!";
        } else {
            echo "Epost eller lösenordet stämmer inte!";
        }
    }
}
?>