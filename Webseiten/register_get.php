<!DOCTYPE html>
<html lang="de">

<head>
    <!-- meta -->
    <meta charset="UTF-8" http-equiv="refresh" content="2; url=./index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Erfolgreiche Registrierung</title>

    <!-- link -->
    <link rel="stylesheet" type="text/css" href="./css/infobox.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="shortcut icon" type="image/png" href="./css/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>
   
<script type="text/javascript" src="./ajax/insert.php"></script>
</head>

<body>
    <?php include("register_save_user.php"); ?>
    <?php include("header.php"); ?>
    <?php include("nav.php"); ?>


    <div class="box success">Du hast dich erfolgreich registriert!
        <p>Klicke auf den Link, falls du nicht weitergeleitet wirst!</p>
        <p><a class="green" href="index.php">Zurück auf die Startseite</a></p>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>
