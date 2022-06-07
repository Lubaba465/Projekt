<?php 
require_once("dao.php");
$comment;
$author;
$id;
if((isset($_POST["comment"]) && is_string($_POST["comment"])) &&
   (isset($_POST["author"]) && is_string($_POST["author"])) &&
   (isset($_POST["id"]) && is_string($_POST["id"])) && isset($_POST["time"])) {
    global $comment;
    global $author;
    global $id;
    global $time;
    $comment = $_POST["comment"];
    $author = $_POST["author"];
    $id = $_POST["id"];
    $time = $_POST["time"];
} else {
    echo "Fehler: Parameter nicht gesetzt";
}
$dao->saveComment(array("castle_id" => $id, "author" => htmlentities($author), "time" => $time, "content" => htmlentities($comment)));
?>
<!doctype html>
<html lang="de">

<head>
    <!-- meta -->
    <meta http-equiv="refresh" content="1; URL=./details.php?id=<?= $id; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Speichere Kommentar...</title>

    <!-- link -->
    <link rel="stylesheet" type="text/css" href="./css/infobox.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="shortcut icon" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>


</head>

<body>
    <?php include("header.php"); ?>
    <?php include("nav.php"); ?>
    <div class="box info">
        <h1>Kommentar von <?= $author; ?></h1>
        <?= $comment; ?> <br>
        Weiterleitung in 1 sek;
    </div>
    <?php include("footer.php"); ?>
</body>

</html>
