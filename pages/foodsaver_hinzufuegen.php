<!-- --------- PHP --------- -->

<?php
require_once("../scripts/dbcontroller.php");
$db_handle = new DBController();

session_start();

// ----------- VARIABLES ----------

$today = date("Y-m-d", time());
$threedays = date("Y-m-d", time() + 259200);
$week = date("Y-m-d", time() + 604800);
$never = date("Y-m-d", time() + 1000000);

$LMkey = session_create_id();
$lmbez = "";
$kiste = null;
$menge = null;
$herkunft = "";
$LKkey = 0;
$kategorisierung = "";
$verbrDatum = date(0);
$haltbarkeit = "";

$lmbezErr = $kisteErr = $mengeErr = $herkunftErr = $kategorieErr = $haltbarkeitErr = "";

// ----------- QUERYS -----------
$kategorien = $db_handle->runQuery("SELECT * FROM `lkategorie`");

// ------- VALIDATION ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lmbez"])) {
        $lmbezErr = "Bezeichnung is required";
    } else {
        $lmbez = test_input($_POST["lmbez"]);
        // check if lmbez only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lmbez)) {
            $lmbezErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["kiste"])) {
        $kisteErr = "Kiste is required";
    } else {
        $kiste = test_input($_POST["kiste"]);
    }

    if (empty($_POST["menge"])) {
        $mengeErr = "Menge is required";
    } else {
        $menge = test_input($_POST["menge"]);
    }

    if (empty($_POST["herkunft"])) {
        $herkunftErr = "Herkunft is required";
    } else {
        $herkunft = test_input($_POST["lmbez"]);
        // check if lmbez only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $herkunft)) {
            $textErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["LKkey"])) {
        $kategorieErr = "Kategorie is required";
    } else {
        $LKkey = test_input($_POST["LKkey"]);
    }

    if (empty($_POST["haltbarkeit"])) {
        $haltbarkeitErr = "Haltbarkeit is required";
    } else {
        $haltbarkeit = test_input($_POST["haltbarkeit"]);
    }

    // ---- CREATE OBJECTS -------

    $lebensmittel = (object) [
        'session_id' => session_id(),
        'LMkey' => $LMkey,
        'Bezeichnung' => $lmbez,
        'VerbrDatum' => $verbrDatum,
        'VerteilDeadline' => $haltbarkeit,
        'Herkunft' => $herkunft
    ];

    $kisteninhalt = (object) [
        'session_id' => session_id(),
        'LMkey' => $LMkey,
        'KistenNr' => $kiste,
        'Inhaltsgewicht' => $menge
    ];

    $kategorisierung = (object) [
        'session_id' => session_id(),
        'LMkey' => $LMkey,
        'LKkey' => $LKkey
    ];

        // ----------- add Object to Uebersicht --------

        if (
            empty($lmbezErr && $kisteErr && $mengeErr && $herkunftErr && $kategorieErr && $haltbarkeitErr) &&
            !empty($kategorisierung->LKkey && $lebensmittel->Bezeichnung && $kisteninhalt->Inhaltsgewicht && $lebensmittel->VerteilDeadline)
        ) {
            $eintrag = (object) [
                'session_id' => session_id(),
                'id' => session_create_id(),
                'Kategorie' => $kategorisierung->LKkey,
                'Lebensmittel' => $lebensmittel->Bezeichnung,
                'Menge' => $kisteninhalt->Inhaltsgewicht,
                'Genießbar' => $lebensmittel->VerteilDeadline
            ];
            array_push($_SESSION["array"], $eintrag);
            header("Location: http://localhost/raupeimmersatt/pages/foodsaver_uebersicht.php");
            exit();
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // ---- debugging 

    // function consolelog($data, bool $quotes = false)
    // {
    //     $output = json_encode($data);
    //     if ($quotes) {
    //         echo "<script>console.log('{$output}' );</script>";
    //     } else {
    //         echo "<script>console.log({$output} );</script>";
    //     }
    // }

?>

<!-- --------- HTML --------- -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foodsaver Lebensmittel Hinzufügen</title>
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
            <a href="/raupeimmersatt">
                <h1 class="font-londrina">
                    BOX PACKEN
                </h1>
            </a>
        </header>
        <div class="content">
            <form class="grid" id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="grid-col-4">
                    <div class="grid-title">
                        <label>
                            Lebensmittel
                        </label>
                        <a href="/raupeimmersatt">
                            <img height="24px" src="../assets/icon_help_mini.svg" alt="icon_help" />
                        </a>
                        <span class="error">*
                            <?php echo $lmbezErr; ?>
                        </span>
                    </div>
                    <input name="lmbez" class="input" type="text" value="<?php echo $lmbez; ?>" />
                </div>
                <div class="grid-col-2">
                    <label class="grid-title">
                        Kisten Nummer
                        <span class="error">*
                            <?php echo $kisteErr; ?>
                        </span>
                    </label>
                    <input name="kiste" class="input" type="number" value="<?php echo $kiste; ?>" min="0"/>
                </div>
                <div class="grid-col-3">
                    <div class="grid-title">
                        <label>
                            Menge (in kg)
                        </label>
                        <a href="/raupeimmersatt">
                            <img height="24px" src="../assets/icon_help_mini.svg" alt="icon_help" />
                        </a>
                        <span class="error">*
                            <?php echo $mengeErr; ?>
                        </span>
                    </div>
                    <input name="menge" class="input" type="number" step="0.1" value="<?php echo $menge; ?>" min="0"/>
                </div>
                <div class="grid-col-3">
                    <label class="grid-title">
                        Wo gerettet? (optional)
                        <span class="error">*
                            <?php echo $herkunftErr; ?>
                        </span>
                    </label>
                    <input name="herkunft" class="input" type="text" value="<?php echo $herkunft; ?>" />

                </div>
                <div class="grid-col-6">
                    <div class="grid-title">
                        <label>
                            Kategorie
                            <span class="error">*
                                <?php echo $kategorieErr; ?>
                            </span>
                        </label>
                        <a href="/raupeimmersatt">
                            <img height="24px" src="../assets/icon_help_mini.svg" alt="icon_help" />
                        </a>
                    </div>
                    <div class="category-grid">
                        <?php
                        // LOOP TILL END OF DATA
                        foreach ($kategorien as $row) {
                        ?>
                        <div class="radio-container kategorie">
                            <input type="radio" name="LKkey" value="<?php echo $row['LKkey'] ?>" <?php if (
                                isset($LKkey) && $LKkey==$row['LKkey'] ) echo "checked"; ?> >
                            <div class="category-item">
                                <img height="56px" src="../assets/gemüse_icon.svg" alt="gemuese_icon" />
                                <p>
                                    <?php echo $row['KatName'] ?>
                                </p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="grid-col-6">
                    <div>
                        <label class="grid-title">
                            Wie lange genießbar?
                            <span class="error">*
                                <?php echo $haltbarkeitErr; ?>
                            </span>
                        </label>
                        <div class="haltbarkeit-grid">
                            <div class="radio-container haltbarkeit">
                                <input type="radio" name="haltbarkeit" value="noch heute" <?php if
                                    (isset($verbrDatum) && $verbrDatum==$today) echo "checked"; ?>>
                                <div class="haltbarkeit-item">
                                    <p>noch heute</p>
                                </div>
                            </div>
                            <div class="radio-container haltbarkeit">
                                <input type="radio" name="haltbarkeit" value="2 - 3 Tage" <?php if
                                    (isset($verbrDatum) && $verbrDatum==$threedays) echo "checked"; ?>>
                                <div class="haltbarkeit-item">
                                    <p>2 - 3 Tage</p>
                                </div>
                            </div>
                            <div class="radio-container haltbarkeit">
                                <input type="radio" name="haltbarkeit" value="eine Woche" <?php if
                                    (isset($verbrDatum) && $verbrDatum==$week) echo "checked"; ?>>
                                <div class="haltbarkeit-item">
                                    <p>eine Woche</p>
                                </div>
                            </div>
                            <div class="radio-container haltbarkeit">
                                <input type="radio" name="haltbarkeit" value="unkritisch" <?php if
                                    (isset($verbrDatum) && $verbrDatum==$never) echo "checked"; ?>>
                                <div class="haltbarkeit-item">
                                    <p>unkritisch</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="grid-title">
                            <label>
                                Allergene und Inhaltsstoffe
                            </label>
                            <a href="/raupeimmersatt">
                                <img height="24px" src="../assets/icon_help_mini.svg" alt="icon_help" />
                            </a>
                        </div>
                        <textarea rows="2" class="input"></textarea>
                    </div>
                    <div>
                        <label class="grid-title">
                            Anmerkungen
                        </label>
                        <textarea rows="4" class="input"></textarea>
                    </div>
                </div>
                <div class="grid-col-1"></div>
            </form>
        </div>
        <div class="action-container">
            <div>
                <a href="/raupeimmersatt"> <img src="../assets/icon_help_mini.svg" alt="icon_help" /></a>
                <p>Nicht erlaubte Lebensmittel</p>
            </div>
            <div class="action-wrap">
                <a href="/raupeimmersatt">Abbrechen</a>
                <input class="next-button" type="submit" form="myform" value="Hinzufügen">
            </div>
        </div>
    </div>
</body>

</html>