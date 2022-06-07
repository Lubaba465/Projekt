function checkName(str) {
    var xhttp;
    if (str.length == 0) {
        document.getElementById("availability").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("availability").innerHTML = this.responseText;
            document.getElementById("availability").style.color = "red";
        }
    };
    xhttp.open("GET", "getUsernames.php?q=" + str, true);
    xhttp.send();
}
