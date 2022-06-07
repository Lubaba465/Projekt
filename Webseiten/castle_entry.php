<!DOCTYPE html>
<html lang="de">

<head>
    <!-- meta -->
    <?php if(!empty($_POST['id']) & isset($_POST['create'])): ?>
    <meta charset="UTF-8" http-equiv="refresh" content="3; url=./details.php?id=<?php echo $_POST['id']; ?>">
    <?php else: ?>
    <meta charset="UTF-8" http-equiv="refresh" content="3; url=./index.php">
    <?php endif; ?>

    <title>Erstellung</title>

    <!--link -->
    <link rel="stylesheet" type="text/css" href="./css/infobox.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>

</head>

<body>
    <?php include("castle_entry_data.php"); ?>
    <?php include("header.php"); ?>
    <?php include ("nav.php"); ?>
    <?php if($type == "create"): ?>

    <div class="box success"> Der Eintrag wurde erstellt!
        <p>Klicke auf den Link, falls du nicht weitergeleitet wirst!</p>
        <p><a class="green" href="index.php">Zurück auf die Startseite</a></p>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    <?php elseif($type == "delete"): ?>

    <div class="box error">
        <h1>Der Eintrag wurde gelöscht!</h1>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    <?php else: ?>

    <h1 class="box success">Der Beitrag wurde bearbeitet!</h1>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php endif; ?>
    <?php include("footer.php"); ?>
</body>

</html>
