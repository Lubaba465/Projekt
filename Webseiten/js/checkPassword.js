function checkPassword() {

    var password = document.getElementById("password");
    var rePassword = document.getElementById("rePassword");
    var rePasswordmessage = document.getElementById("rePassword_message");

    var match = "green";
    var notMatch = "red";

    if (password.value == "" || rePassword.value == "") {
        rePasswordmessage.innerHTML =
            "";
    } else {

        if (rePassword.value == password.value) {

            rePasswordmessage.style.color = match;
            rePasswordmessage.innerHTML = "Passwort ist identisch!";
        } else {
            rePasswordmessage.style.color = notMatch;
            rePasswordmessage.innerHTML = "Passwort ist nicht identisch!";
        }

    }
}
