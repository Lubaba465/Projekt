<!DOCTYPE html>
<html lang="de">

<head>

    <!-- meta -->
    <noscript>
        <meta charset="UTF-8" http-equiv="refresh" content="0; url=./error.php?fehler=E029"> </noscript>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <!-- link -->
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/picture_upload.css">
    <link rel="stylesheet" type="text/css" href="./css/infobox.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link type="text/css" rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
    <script src="./tapmodo-Jcrop-1902fbc/js/jquery.Jcrop.min.js"></script>
    <link rel="stylesheet" href="./tapmodo-Jcrop-1902fbc/css/jquery.Jcrop.css" type="text/css" />
    <title>Burgen in Europa - Bilderupload</title>
    <script type="text/javascript">
        jQuery(function($) {

            var jcrop_api;

            $('#crop_input').Jcrop({
                onSelect: getCoords,
                onRelease: clearCoords,
                aspectRatio: 15 / 10,
                setSelect: [10, 10, 150, 100],
                boxWidth: 1000
            }, function() {
                jcrop_api = this;
            });
        });

        function getCoords(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#width').val(c.w);
            $('#height').val(c.h);
        };

        function clearCoords() {
            $('#crop_coords input').val('');
        };

    </script>
</head>

<body class="nodefmargin">
    <?php include("picture_upload_data.php"); ?>
    <?php include("header.php"); ?>
    <?php include("nav.php"); ?>
    <?php if(isset($_SESSION['name'])): ?>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] . "?castle_id=" . $castle_id; ?>">
        <h5>Wähle Bilder zum Löschen aus:</h5>
        <div class="picture_container">
            <?php foreach($current_pictures as $picture): ?>
            <label class="checkbox_container">
                <input type="checkbox" name="delete[]" value="<?= $picture["id"]; ?>">
                <img src="<?= $picture["path"] ?>" class="clickable_picture">
            </label>
            <?php endforeach ?>
        </div>
        <p><input type="submit" value="Löschen" name="delete_submit" class="button"></p>
    </form>
    <form method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] . "?castle_id=" . $castle_id; ?>">
        <h5>Lade ein neues Bild hoch (max 10MB, nur .jpg, .jpeg und .png):</h5>
        <input type="file" name="new_picture" accept=".jpg, .png, .jpeg"> <br><br>
        <p><input type="submit" value="Hochladen" name="upload_submit" class="button"></p>
    </form>
    <?php if(isset($uploaded_picture)): ?>
    <img src="<?= $uploaded_picture; ?>" id="crop_input">
    <form method="post" action="<?= $_SERVER['PHP_SELF'] . "?castle_id=" . $castle_id; ?>" id="crop_coords">
        <input type="hidden" id="x" name="x">
        <input type="hidden" id="y" name="y">
        <input type="hidden" id="height" name="height">
        <input type="hidden" id="width" name="width">
        <input type="hidden" name="img_mime" value="<?= $picture_mime; ?>">
        <input type="hidden" name="img_source" value="<?= $uploaded_picture; ?>">
        <input type="submit" value="Bild zuschneiden" name="crop_submit" class="button">
    </form>
    <?php endif; ?>

    <?php else:?>
    <div class="box error">
        <h3>Sie können keine Bilder bearbeiten solange Sie nicht angemeldet sind!</h3> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <?php endif; ?>

    <?php include("footer.php"); ?>
</body>

</html>
