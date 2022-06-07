<!DOCTYPE html>
<html lang="de">

<head>


    <!-- meta -->
    <meta charset="UTF-8">
    <title>Registrierung - Burgen In Europa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">
    <!-- link -->
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" href="./css/registerpage.css">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>
    <script type="text/javascript" src="js/checkPassword.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>




</head>

<body>

    <?php include("header.php"); ?>
    <?php include("nav.php"); ?>

    <div class="padding">
        <h1> Registrierung</h1>
        <noscript>
            <p><strong>Wichtig: </strong>Sie haben JavaScript in Ihrem Browser deaktivert. Für die Registrierung ist die Aktivierung von JavaScript aber unbedingt erforderlich.</p>
        </noscript>
        <form action="register_get.php" method="post" onsubmit="return validateForm();" name="register">
            <!--Erlaubte Zeichen:[A-Z][a-z][0-9][.-_] -->
            <label for="username">Benutzernamen angeben: </label><br>
            <input class="width" type="text" , name="username" required pattern="[a-zA-Z]*" id="username" maxlength="50" onkeyup="checkName(this.value)" autocomplete="off">
            <span id="availability"></span><br><br>
            <script type="text/javascript" src="js/checkName.js"></script>

            <label for="password">Passwort angeben: </label><br>
            <input class="width" type="password" , name="password" required pattern="[0-9a-zA-Z_.-]*" , onkeyup="validatePassword(this.value); checkPassword();" id="password">
            <span id="message"></span><br><br>
            <label for="rePassword">Passwort bestätigen:</label><br>
            <input class="width" type="password" , name="rePassword" required pattern="[0-9a-zA-Z_.-]*" onkeyup="checkPassword();" id="rePassword">
            <span id="rePassword_message"></span><br><br>

            <label for="security1">Sicherheitsfrage angeben: </label><br><br>
            <select name="question" class="width">
                <option value="Wie lautet der Name ihres 1. Haustieres?">Wie lautet der Name ihres 1. Haustieres?</option>
                <option value="Wie lautet der Name ihres Lehrers aus der Grundschule?">Wie lautet der Name ihres Lehrers aus der Grundschule?</option>
                <option value="Wann haben deine Eltern geheiratet?">Wann haben deine Eltern geheiratet?</option>
            </select><br><br>
            <input class="width" type="text" name="answer" required pattern="[a-zA-ZäöüÄÖÜ ]*"><br><br>

            <p class="width"> <input type="checkbox" required name="data-security"> Ich bestätige die <a class="black" href="datenschutz.php" target="_blank">Datenschutzvereinbarung</a> gelesen zu haben und stimme dieser zu.<br><br>

                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Lfc7asUAAAAAD_k0IIBlAMmj6rdgU1EnqWulrSW"></div>
                <script src="https://www.google.com/recaptcha/api.js"></script><br>
                <input id="submit" type="submit" value="Registrieren" name="btnregister" class="button" disabled="disabled">
                <script type="text/javascript" src="js/checkCaptcha.js"></script>
        </form>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>
