<?php
require("dao.php");
$comment;
$author;
$id;
if((isset($_POST["comment"]) && is_string($_POST["comment"])) &&
   (isset($_POST["author"]) && is_string($_POST["author"])) &&
   (isset($_POST["id"]) && is_string($_POST["id"]))) {
    global $comment;
    global $author;
    global $id;
    $comment = $_POST["comment"];
    $author = $_POST["author"];
    $id = $_POST["id"];
} else {
    echo "Fehler: Parameter nicht gesetzt";
}
$dao->saveComment(array("castle_id" => $id, "author" => htmlentities($author), "time" => date("d.m.Y H:i:s"), "content" => htmlentities($comment)));
?>
