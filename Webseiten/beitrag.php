<!DOCTYPE html>
<html lang="de">

<head>
    <!-- open street map -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-script-type" content="text/javascript" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-language" content="de" />
    <meta name="author" content="Thomas Heiles" />
    <script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
    <script type="text/javascript" src="./js/tom.js"></script>

    <link rel="stylesheet" type="text/css" href="./css/map.css">

    <script type="text/javascript">
        //<![CDATA[

        var map;
        var layer_mapnik;
        var layer_tah;
        var layer_markers;

        function drawmap() {
            OpenLayers.Lang.setCode('de');

            // Position und Zoomstufe der Karte
            var lon = 6.641389;
            var lat = 49.756667;
            var zoom = 5;

            map = new OpenLayers.Map('map', {
                projection: new OpenLayers.Projection("EPSG:900913"),
                displayProjection: new OpenLayers.Projection("EPSG:4326"),
                controls: [
                    new OpenLayers.Control.Navigation(),
                    new OpenLayers.Control.LayerSwitcher(),
                    new OpenLayers.Control.PanZoomBar()
                ],
                maxExtent: new OpenLayers.Bounds(-20037508.34, -20037508.34,
                    20037508.34, 20037508.34),
                numZoomLevels: 18,
                maxResolution: 156543,
                units: 'meters'
            });

            layer_mapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
            layer_markers = new OpenLayers.Layer.Markers("Address", {
                projection: new OpenLayers.Projection("EPSG:4326"),
                visibility: true,
                displayInLayerSwitcher: false
            });

            map.addLayers([layer_mapnik, layer_markers]);
            jumpTo(lon, lat, zoom);
            map.events.register('click', map, handleMapClick);
        }

        function handleMapClick(evt) {
            var lonlat = map.getLonLatFromViewPortPx(evt.xy);
            var newlonLat = new OpenLayers.LonLat(lonlat.lon, lonlat.lat).transform(map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326"));
            $("#lon").val(newlonLat.lon);
            $("#lat").val(newlonLat.lat);
            layer_markers.clearMarkers();
            addMarker(layer_markers, newlonLat.lon, newlonLat.lat, "Auswahl");
        }


        //]]>

    </script>
    <!-- end open street map -->

    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Neuer Beitrag erstellen - Burgen in Europa</title>

    <!-- link -->
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/beitrag.css">
    <link rel="stylesheet" type="text/css" href="./css/infobox.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--script  -->
    <script type="text/javascript" src="./js/password_validation.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript" charset="utf-8"></script>

</head>

<body class="nodefmargin" onload="drawmap();">
    <?php include("beitragdata.php"); ?>

    <?php include("header.php"); ?>

    <?php include("nav.php"); ?>


    <?php if(isset($_SESSION['name'])): ?>

    <h1 class="center">Beitrag erstellen</h1>

    <div id="inputs">
        <form action="castle_entry.php" method="post">
            <input type="hidden" name="id" value="<?= $entrydata["id"]; ?>">
            <div class="form_container">
                <div class="form_item">
                    <label for="name">Schlossname:</label><br> <input type="text" name="name" maxlength="50" value="<?= $entrydata["name"]; ?>" required pattern="[a-zA-ZäöüÄÖÜ ]*"> <br>
                    <label for="year">Baujahr:</label><br> <input type="text" name="year" maxlength="4" value="<?= $entrydata["year"]; ?>" required pattern="[0-9]*"> <br>
                    <label for="country">Land:</label><br> <input type="text" name="country" maxlength="50" value="<?= $entrydata["country"]; ?>" required pattern="[a-zA-ZäöüÄÖÜ]*"> <br>
                    <label for="city">Stadt:</label><br> <input type="text" name="city" maxlength="50" value="<?= $entrydata["city"]; ?>" required pattern="[a-zA-ZäöüÄÖÜ]*">
                </div>
                <div class="form_item">
                    <label for="style">Baustil:</label><br> <input type="text" name="style" maxlength="50" value="<?= $entrydata["style"]; ?>" pattern="[a-zA-ZäöüÄÖÜ ]*"><br>
                    <label for="link">Link zur offiziellen Website:</label><br> <input type="url" name="link" maxlength="50" value="<?= $entrydata["link"]; ?>"><br>
                    <label for="longitude">Längengrad:</label><br> <input type="text" name="longitude" maxlength="50" id="lon" value="<?= $entrydata["longitude"]; ?>"><br>
                    <label for="latitude">Breitengrad:</label><br> <input type="text" name="latitude" maxlength="50" id="lat" value="<?= $entrydata["latitude"]; ?>">
                </div>
            </div>
            <p>öffentlich zugänglich: <input type="radio" name="public" value="Ja" <?php if($is_public){echo "checked";} ?>>ja
                <input type="radio" name="public" value="Nein" <?php if($is_not_public){echo "checked";} ?>>nein
                <input type="radio" name="public" value="Keine Angabe" <?php if($is_not_defined){echo "checked";} ?>>keine Angabe</p>
            
            <p>Beschreibung: <br> <textarea class="textarea" name="description" maxlength="2000" required><?= $entrydata["description"]; ?></textarea></p>
            <input type="submit" value="<?= $buttontext; ?>" name="create" class="button">
            <?php if($is_edit): ?>
            <input type="submit" value="Beitrag löschen" name="delete" class="button">
            <a href="./picture_upload.php?castle_id=<?= $entrydata["id"] ?>" class="button nodec">Bilder bearbeiten</a>
            <?php endif; ?>
        </form>
    </div>
    <div id="map">
    </div>
    <div id="osm">© <a href="http://www.openstreetmap.org" class="nodec">OpenStreetMap</a>
        und <a href="http://www.openstreetmap.org/copyright" class="nodec">Mitwirkende</a>,
        <a href="http://creativecommons.org/licenses/by-sa/2.0/deed.de" class="nodec">CC-BY-SA</a>
    </div>
    <?php else:?>
    <div class="box error">
        <h3>Sie können keine Beiträge bearbeiten solange Sie nicht angemeldet sind!</h3> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <?php endif; ?>

    <?php include "footer.php" ?>

</body>

</html>
