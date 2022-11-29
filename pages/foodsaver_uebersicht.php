<!-- ----------- PHP ---------- -->
<?php
session_start();

function consolelog($data, bool $quotes = false)
{
  $output = json_encode($data);
  if ($quotes) {
    echo "<script>console.log('{$output}' );</script>";
  } else {
    echo "<script>console.log({$output} );</script>";
  }
}

$array = json_decode(json_encode($_SESSION["array"]), true);
$allergene = "";
$comment = "";

consolelog($array);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Foodsaver Übersicht</title>
  <!-- Fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;300;400;500;600;700;800;900&family=Londrina+Solid&display=swap"
    rel="stylesheet" />
  <!-- CSS Stylesheet  -->
  <link href="../stylesheet.css" rel="stylesheet" />
</head>

<body class="font-fira">
  <div class="container">
    <header>
      <a href="/raupeimmersatt"> <img src="../assets/logo.svg" alt="logo" /></a>
      <a href="/raupeimmersatt"> <img src="../assets/icon_help.svg" alt="icon_help" /></a>
    </header>
    <div class="content">
      <div class="wrap">
        <table class="table">
          <tr class="table-headers">
            <th class="grid-col-3">Lebensmittel</th>
            <th class="grid-col-2">Menge</th>
            <th class="grid-col-2">Genießbar</th>
            <th class="grid-col-3">Inhaltsstoffe</th>
            <th class="grid-col-1"></th>
            <th class="grid-col-1"></th>
          </tr>
          <?php
          // LOOP TILL END OF DATA
          foreach ($array as $row) {
          ?>
          <tr class="table-items">
            <td class="grid-col-3">
              <?php echo $row['Lebensmittel'] ?>
            </td>
            <td class="grid-col-2">
              <?php echo $row['Menge'] ?> Kg
            </td>
            <td class="grid-col-2">
              <?php echo $row['Genießbar'] ?>
            </td>
            <td class="grid-col-3">
              <?php if (empty($allergene))
              echo "Keine"; ?>
            </td>
            <td class="grid-col-1">
              
              <?php if (empty($comment))
              echo "<img src='../assets/comment_icon.svg' alt='comment_icon' />"; ?>
            </td>
            <td class="grid-col-1">
              <img src="../assets/edit_icon.svg" alt="edit_icon" />
            </td>
          </tr>
          <?php
          }
          ?>

        </table>
        <div class="add-icon">
          <a href="foodsaver_hinzufuegen.php">
            <img src="../assets/add_icon.svg" alt="add_icon" />
          </a>
        </div>
      </div>
    </div>
    <div class="action-container">
      <div>
        <a href="/raupeimmersatt"> <img src="../assets/icon_help_mini.svg" alt="icon_help" /></a>
        <p>Verstauen von Lebensmitteln</p>
      </div>
      <div class="action-wrap">
        <a href="/raupeimmersatt">Abbrechen</a>
        <a class="next-button" href="./final_check.php">Absenden</a>
      </div>
    </div>
  </div>
</body>

</html>