<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- meta -->
    <meta http-equiv="refresh" content="2; url=./index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Logout</title>

    <!-- link -->
    <link rel="stylesheet" type="text/css" href="./css/infobox.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>

</head>

<body>
    <?php include("header.php"); ?>
    <?php include("nav.php"); ?>
    <div class="box success">
        <p>Du hast dich abgemeldet!</p>
        <p>Wenn du nicht weitergeleitet wirst, klick den folgenden Link:</p>
        <p><a class="green" href="index.php"> zurück zur Startseite</a></p>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br>
    </div>
    <?php include("footer.php"); ?>

</body>

</html>
