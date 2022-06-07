<!DOCTYPE html>
<html lang="de">

<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Profil bearbeiten - Burgen in Europa</title>

    <!-- link -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/infobox.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">

    <!-- script-->
    <script type="text/javascript" src="./js/password_validation.js"></script>
    <script type="text/javascript" src="js/password_matching.js"></script>

</head>

<body>
    <?php include("profiledata.php"); ?>
    <?php include ("header.php"); ?>
    <?php include("nav.php"); ?>

    <?php
        if(($is_info) || (isset($_SESSION["user_id"]))):?>
    <h3 class="center">Kontaktinformationen von <?= $entrydata["username"]; ?></h3>
    <div class="row">

        <div class="side">
            <img height="100" width="100" src="<?= $entrydata["picturepath"]; ?>" alt="Kein Bild gesetzt" value="">
            <form>
                <?php if($type == "self"): ?>
                <a href="" class="button nodec">Profilbild ändern</a>
                <?php endif; ?>
            </form>
        </div>

        <div class="main">

            <div class="name">
                <?php if($type == "self"): ?>
                <form method="post" action="profile_change_username.php">
                    <fieldset>
                        <legend>Nutzername</legend>
                        <div>
                            <input type="text" name="username" value="<?= $entrydata["username"]; ?>" required pattern="[a-zA-Z ]*">
                            <input type="hidden" name="id" value="<?= $entrydata["id"]; ?>">
                            <input type="submit" value="Speichern" class="button" name="changeName">
                        </div>
                    </fieldset>
                </form>
                <?php else: ?>
                <p>
                    <b>Nutzername:</b> <?= $entrydata["username"]; ?>
                </p>
                <?php endif; ?>
            </div>
            <div class="password">
                <?php if($type == "self"): ?>
                <form action="profile_change_password.php" , method="post">
                    <fieldset>
                        <legend>Passwort ändern</legend>
                        <label for="old_password">altes Passwort: </label><br>
                        <input type="password" , name="old_password" value="" required pattern="[0-9a-zA-Z_.-]*"><br>
                        <label for="new_password">
                            neues Passwort eingeben:
                        </label><br>
                        <input type="password" , name="new_password" value="" required pattern="[0-9a-zA-Z_.-]*" onkeyup="validatePassword(this.value); checkPassword();" id="password">
                        <span id="message"></span> <br>
                        <label for="re_new_password">neues Passwort bestätigen: </label><br>
                        <input type="password" , name="re_new_password" value="" required pattern="[0-9a-zA-Z_.-]*" onkeyup="checkPassword();" id="rePassword">
                        <span id="rePassword_message"></span><br><br>
                        <input type="hidden" name="id" value="<?= $entrydata["id"]; ?>">
                        <input type="submit" value="Passwort bestätigen" name="btnreset" class="button">
                    </fieldset>
                </form>
                <?php endif; ?>
            </div>

            <div class="description">
                <p>Beschreibung:</p>
                <?php if($type == "self"): ?>
                <form method="post" action="profile_change_description.php">
                    <textarea cols="35" rows="5" name="description" maxlength="1000"><?php echo $entrydata['description']; ?></textarea><br><br>
                    <input type="hidden" name="id" value="<?= $entrydata["id"]; ?>">
                    <input type="submit" value="Speichern" class="button" name="changeDescription">
                </form>
                <?php else: ?>
                <div class="blackborder">
                    <?php echo $entrydata['description']; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="posts">
                <h3> Liste aller Beiträge:
                    <?php if($type == "self"): ?>
                    <a class="black" href="beitrag.php">
                        <i class="fa fa-plus"></i>
                        <?php endif; ?>
                    </a>
                    <ul class="listOfPosts">
                        <?php if(!empty($castlesFromUser)): ?>
                        <?php foreach($castlesFromUser as $castle): ?>
                        <li>
                            <div>
                                <a class="listEntry" href="./details.php?id=<?= $castle["id"]; ?>"><?= $castle["name"]; ?></a>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </h3>

                <hr>
            </div>
        </div>

    </div>
    <?php else: ?>
    <br>
    <div class="error box">
        Du hast dich noch nicht eingeloggt! Bitte logge dich ein! <br>
        <a class="red" href="index.php">Zurück zur Startseite</a>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br>
    </div>

    <?php endif; ?>

    <?php
        include("footer.php")
  ?>

</body>

</html>
