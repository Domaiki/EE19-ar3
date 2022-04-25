// Element vi behöver
const eModal = document.querySelector("#exampleModal");
const eForm = document.querySelector("#exampleModal form");
const eLogin = document.querySelector("#login");
const eStatus = document.querySelector("#status");

// Initialiserar modal-fönstret
var loginModal = new bootstrap.Modal(
    "#exampleModal",
    {
        // Options here
        backdrop: "static",
        keyboard: false
    }
);

// Hantera inloggning
eForm.addEventListener("submit", function (e) {
    
    // Förhindra att sidan laddas om
    e.preventDefault();

    // Läs in data från formuläret
    const postData = new FormData(eForm);

    // Skicka till skriptet login.php
    fetch("./login.php", {
        method: "POST",
        body: postData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);

        // Skriv ut svaret på sidan
        switch (data) {
            case "1":
                eStatus.innerHTML = "<p class=\"alert alert-danger\">Någonting är fel med SQL-satsen!</p>";
                break;
            case "2":
                eStatus.innerHTML = "<p class=\"alert alert-success\">Du är inloggad</p>";
                break;
            case "3":
                eStatus.innerHTML = "<p class=\"alert alert-warning\">Epost eller lösenordet stämmer inte!</p>";
                break;

            default:
                eStatus.innerHTML = "<p class=\"alert alert-danger\">Unknown error occurred</p>";
                break;
        }

        // Stäng ned modal-fönstret
        loginModal.hide();

        // Rensa formuläret
        eForm.reset();
    })
});