<!DOCTYPE html>
<html lang="de">

<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Passwort vergessen</title>

    <!-- link -->
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/profile.css">
    <link rel="stylesheet" type="text/css" href="./css/beitrag.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>


</head>

<body>

    <?php include "header.php" ?>

    <?php include "nav.php" ?>

    <div class="center">
        <br><br>
        <form action="automail.php" method="post">
            <label for="username">Bitte geben sie ihren Nutzernamen an:</label>
            <input type="text" , name="username" required pattern="[0-9a-zA-Z_.-@]*">
            <input class="button" type="submit" value="Senden" name="forgotpass">
        </form>

    </div>

    <script type="text/javascript" src="js/modalbox_function.js"></script>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include "footer.php" ?>
</body>

</html>
