<!DOCTYPE html>
<html lang="de">

<head>

    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Kontakte - Burge in Europa</title>

    <!-- link -->
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" style="text/css" href="./css/contact.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- script -->
    <script type="text/javascript" src="js/character_count.js"></script>

</head>

<body>
    <?php include('header.php'); ?>
    <?php include('nav.php'); ?>
    <div class="padding">
        <h2>Kontakte</h2>
        <img src="./bilder/unknown.png" alt="kein Bild gesetzt" width="100px" height="100px">
        <h2>Burgen In Europa Gruppe</h2>
        <p class="title">Admin</p>

        <label for="author">Name:</label><br>
        <input type="text" class="width" required name="author" pattern="[a-zA-Z]*"><br><br>


        <label for="betreff">Betreff:</label><br>
        <input type="text" class="width" required name="betreff" pattern="[a-zA-Z ]*"><br><br>

        <label for="description"><b>Beschreibung:</b></label>
        <p>Du hast noch <input disabled maxlength="5" size="2" value="100" id="counter"> Zeichen übrig.</p>
        <textarea onkeyup="textCounter(this,'counter',100);" maxlength="100" id="message" class="width" required name="description" rows="10"></textarea><br><br>


        <p class="width"> <input type="checkbox" required name="data-security"> Ich stimme der Datenschutzvereinbarung zu, in dem auf diesem Knopf hier drücke...</p><br><br>

        <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Lfc7asUAAAAAD_k0IIBlAMmj6rdgU1EnqWulrSW"></div>
        <script src="https://www.google.com/recaptcha/api.js"></script><br>

        <input type="submit" id="submit" value="Kontaktieren" name="btncontact" class="button" disabled="disabled">
        <script type="text/javascript" src="js/checkCaptcha.js"></script>

    </div>
    <?php include('footer.php'); ?>

</body>

</html>
