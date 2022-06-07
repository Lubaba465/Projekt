function drawMarkers() {
    $.ajax({
        type: "GET",
        url: "./get_markers.php",
        async: true,
        success: function (data) {
            var jsondata = JSON.parse(data);
            for (var i = 0; i < jsondata.castles.length; i++) {
                var popup = "<div class='popup'> <b>" + jsondata.castles[i].name + "</b> <br> <img src='" + jsondata.castles[i].imagepath + "'> <br> <a href='./details.php?id=" + jsondata.castles[i].id + "' class='black'>mehr info</a> </div>";
                addMarker(layer_markers, parseFloat(jsondata.castles[i].longitude), parseFloat(jsondata.castles[i].latitude), popup);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            setTimeout(
                drawMarkers(), /* Try again after.. */
                1000); /* milliseconds */
        }
    });
}
