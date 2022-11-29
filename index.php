
<?php 
// --- CREATE SESSION --- 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$_SESSION["array"] = array();
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foodsharing Prototyp</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;300;400;500;600;700;800;900&family=Londrina+Solid&display=swap"
      rel="stylesheet"
    />
    <!-- CSS Stylesheet -->
    <link href="stylesheet.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
      <header>
        <a href="/raupeimmersatt"> 
          <img src="./assets/logo.svg" alt="logo" />
        </a>
        <a href="/raupeimmersatt">
          <img src="./assets/icon_help.svg" alt="icon_help" />
        </a>
      </header>
      <div class="content">
        <div class="wrap-title">
          <h1 class="title font-londrina">
            WELCHE LEBENSMITTEL <br />
            HAST DU GERETTET?
          </h1>
          <a href="./pages/foodsaver_hinzufuegen.php">
            <img src="./assets/add_icon.svg" alt="add_icon" />
          </a>
        </div>
      </div>
    </div>
  </body>
</html>
