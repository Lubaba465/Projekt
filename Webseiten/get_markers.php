<?php
require_once("./dao.php");
$all_castles = $dao->getAllCastles();
$return_json = '{"castles":[';
foreach($all_castles as $castle) {
    $picturepath = empty($castle["pictures"]) ? "./bilder/no_pic.jpg" : $castle["pictures"][0]["path"];
    $return_json = $return_json . '{"name":"';
    $return_json = $return_json . $castle["name"];
    $return_json = $return_json . '","imagepath":"';
    $return_json = $return_json . $picturepath;
    $return_json = $return_json . '","id":"';
    $return_json = $return_json . $castle["id"];
    $return_json = $return_json . '","longitude":"';
    $return_json = $return_json . $castle["longitude"];
    $return_json = $return_json . '","latitude":"';
    $return_json = $return_json . $castle["latitude"];
    $return_json = $return_json . '"},';
}
$return_json = substr($return_json, 0, -1);
$return_json = $return_json . ']}';
echo $return_json;
?>