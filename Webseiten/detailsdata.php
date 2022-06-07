<?php
    require_once("dao.php");
    $castleId = (isset($_GET["id"]) && is_string($_GET["id"])) ? $_GET["id"] : "7"; //standartwert ist nur fürs testen
    $data = $dao->getCastle($castleId);
?>
