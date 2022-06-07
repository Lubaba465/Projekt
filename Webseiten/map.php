<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de-de">

<head>
    <!-- open street map -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-script-type" content="text/javascript" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-language" content="de" />
    <meta name="author" content="Thomas Heiles" />
    <link rel="stylesheet" type="text/css" href="./css/map.css">
    <script type="text/javascript" src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script type="text/javascript" src="http://www.openstreetmap.org/openlayers/OpenStreetMap.js"></script>
    <script type="text/javascript" src="./js/tom.js"></script>

    <script type="text/javascript">
        //<![CDATA[

        var map;
        var layer_mapnik;
        var layer_tah;
        var layer_markers;

        function drawmap() {
            // Popup und Popuptext mit evtl. Grafik
            var popuptext = "<font color=\"black\"><b>Thomas Heiles<br>Stra&szlig;e 123<br>54290 Trier</b><p><img src=\"test.jpg\" width=\"180\" height=\"113\"></p></font>";

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

            // Position des Markers
            //addMarker(layer_markers, 6.641389, 49.756667, popuptext);
            drawMarkers();

        }

        //]]>

    </script>
    <!-- end open street map -->
    
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Karte - Burgen in Europa</title>

    <!-- link -->
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/karte.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">

    <!-- script -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="./js/password_validation.js"></script>
    <script type="text/javascript" src="./js/add_markers.js"></script>


</head>

<body onload="drawmap();">

    <?php include("./header.php"); ?>
    <?php include("./nav.php"); ?>

    <div id="map">
    </div>
    <div id="osm">© <a href="http://www.openstreetmap.org" class="nodec">OpenStreetMap</a>
        und <a href="http://www.openstreetmap.org/copyright" class="nodec">Mitwirkende</a>,
        <a href="http://creativecommons.org/licenses/by-sa/2.0/deed.de" class="nodec">CC-BY-SA</a>
    </div>

    <?php include("./footer.php"); ?>

</body>

</html>
