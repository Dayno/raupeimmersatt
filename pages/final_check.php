<?php
// --- CREATE SESSION --- 
session_start();

$_SESSION["array"] = array();

session_destroy();
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foodsaver Final Check</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;300;400;500;600;700;800;900&family=Londrina+Solid&display=swap"
        rel="stylesheet" />
    <!-- CSS Stylesheet -->
    <link href="../stylesheet.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <header>
            <a href="/raupeimmersatt">
                <img src="../assets/logo.svg" alt="logo" />
            </a>
            <a href="/raupeimmersatt">
                <img src="../assets/icon_help.svg" alt="icon_help" />
            </a>
        </header>
        <div class="content">
            <div class="wrap-title font-fira">
                <div class="reminder">
                    <h1 class="font-londrina">
                        DANKE FÜR DEINE SPENDE!
                    </h1>
                    <h2>
                        Bitte vergiss nicht
                    </h2>
                    <p>
                        ... die Oberflächen abzuwischen, <br />
                        ... das Licht auszumachen, <br />
                        ... die Türe zu schließen, <br />
                        ... dich an der Theke zu verabschieden.
                    </p>
                    <div class="check-item">
                        <input name="check" type="checkbox">
                        <img src="../assets/checkbox.svg" alt="checkbox" />
                        <img src="../assets/checkbox_checked.svg" alt="checkbox_checked" />
                        Ich habe die letzte Box genommen.
                    </div>
                </div>
                <a class="final-button" href="/raupeimmersatt/">Alles klar</a>
            </div>
        </div>
    </div>
</body>

</html>