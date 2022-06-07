<?php
require_once("dao.php");
$user_id = ((isset($GET["user_id"]) && is_string($_GET["user_id"])) ? $_GET["user_id"] :1);

//delete a picture
$to_delete = (isset($_POST["delete"]));
if($to_delete){
    $dao ->deletePicture($id);  
}

$uploaded_picture;
$picture_mime;

//upload a new profile picture
$uploaded_picture;
$picture_mime;
if(isset($_FILES["new_picture"]) && $_FILES["new_picture"]["size"] != 0){
    if(($_FILES["new_picture"]["type"] == "image/jpeg") || ($_FILES["new_picture"]["type"] == "image/png")) {
        global $picture_mime;
        $picture_mime = $_FILES["new_picture"]["type"];
    }else{
        echo '<script type="text/javascript"> window.location.href="./error.php?fehler=E020";</script>';
    }
    
    $basepath ="./bilder/";
    $uploadname = basename($_FILES["new_picture"]["name"]);
    while(file_exists($basepath . $uploadname)){
        global $uploadname;
        $uploadname = "copy_of_" . $uploadname;
    }
    if (move_uploaded_file($_FILES["new picture"]["tmp_name"], $basepath . $uploadname)){
        global $uploaded_picture;
        $uploaded_picture = $basepath . $uploadname;
    } else {
        echo '<script type="text/javascript"> window.location.href="./error.php?fehler=E020";</script>';
    }
    
}


//cut the profile pic if it isn't fitting the format
if(isset($_POST["crop_submit"])) {
    $image;
    if($_POST["img_mime"] == "image/jpeg") {
        global $image;
        $image = imagecreatefromjpeg($_POST["img_source"]);
    } elseif($_POST["img_mime"] == "image/png") {
        global $image;
        $image = imagecreatefrompng($_POST["img_source"]);
    } else {
        unlink($_POST["img_source"]);
        echo '<script type="text/javascript"> window.location.href="./error.php?fehler=E020";</script>';
    }
    $cropped_image = imagecrop($image, ["x" =>$_POST["x"], "y" =>$_POST["y"], "width" =>$_POST["width"], "height" =>$_POST["height"]]);
    imagejpeg($cropped_image, $_POST["img_source"]);
    $dao->savePicture(array(":user_id" => $user_id, ":path" => $_POST["img_source"]));
    imagedestroy($image);
    imagedestroy($cropped_image);
}

//$current_pictures = $dao->;
?>
