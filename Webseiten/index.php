<?php
    require_once("dao.php");
    $randomCastle = $dao->getRandomCastle();   
    $fiveNewestCastles = $dao->getFiveNewestCastles();
?>


<!DOCTYPE html>
<html lang="de">

<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Burgen in Europa/Startseite</title>

    <!-- link -->
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/index_style.css">
    <link rel="stylesheet" type="text/css" href="./css/entry.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>
    <script type="text/javascript" src="js/password_matching.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>

<body>
    <?php
        include("header.php")
        ?>
    <?php
        include("nav.php")  
        ?>

    <div class="rowIndex">
        <div class="sideIndex">

            <div class="intro">
                <h1>Willkommen...</h1>
                <p>
                    ...auf unserer Webseite für Burgen. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="randomCastle">
                <h2>Zufällige Burg</h2>

                <h3><?= $randomCastle["name"]; ?></h3>
                <div>
                    <img src="<?= $randomCastle['pictures'][0]['path']?>" alt="<?= $randomCastle['name']; ?>">
                    <figcaption>
                        <?= $randomCastle["description"]; ?>
                        <a class="black" href="./details.php?id=<?= $randomCastle["id"]; ?>">mehr info</a>
                    </figcaption>
                </div>
            </div>

        </div>

        <div class="mainIndex">
            <h2>Zuletzt hinzugefügte Burgen</h2>

            <?php foreach($fiveNewestCastles as $newCastle): ?>
            <div class="entry">
                <div>
                    <img src="<?= $newCastle['pictures'][0]['path']?>" alt="<?= $newCastle['name']; ?>">
                </div>
                <div>
                    <b>Name: </b><?= $newCastle["name"]; ?> <br>
                    <b>Standort: </b> <?= $newCastle["country"]; ?> <br>
                    <b>Jahr: </b> <?= $newCastle["year"]; ?> <br>
                    <a class="black" href="./details.php?id=<?= $newCastle["id"]; ?>">mehr info</a>
                </div>
            </div>

            <?php endforeach; ?>

            <?php if(isset($_SESSION['name'])):?>
            <div>
                <a class="button nodec" href="beitrag.php">Beitrag erstellen</a>
            </div>
            <?php else: ?>
            <div></div>
            <?php endif; ?>


        </div>

    </div>


    <?php
        include("footer.php")  
        ?>
</body>

</html>
