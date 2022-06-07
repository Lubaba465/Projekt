    function validateForm() {

        var firstname = document.register.firstname.value;
        var lastname = document.register.lastname.value;
        var email = document.register.email.value;
        var password = document.register.password.value;
        var rePassword = document.register.rePassword.value;

        if (firstname.length >= 49) {
            alert("Der Vorname ist zu lang!");
            return false;
        }

        if (lastname.length >= 49) {
            alert("Der Nachname ist zu lang!");
            return false;
        }

        if (password.length <= 8) {
            alert("Der angegebene Passwort ist zu kurz!");
            return false;
        }

        if (password != rePassword) {
            alert("Die Passwörter sind nicht identisch!");
            return false;
        }



    }

    function validatePassword(password) {

        //Do not show anything if the user didn't type in a password
        if (password.length === 0) {
            document.getElementById("message").innerHTML = "";
            return;
        }

        //Array for password patterns
        var pattern = new Array();
        pattern.push("[._-]"); //Special Character
        pattern.push("[A-Z]");
        pattern.push("[0-9]");
        pattern.push("[a-z]");

        //Check and display conditions
        var counter = 0;
        for (var i = 0; i < pattern.length; i++) {
            if (new RegExp(pattern[i]).test(password)) {
                counter++;
            }
        }

        var color = "";
        var strength = "";

        if (password.length < 8) {
            color = "red";
            strength = "Passwort zu kurz";
        } else {

            switch (counter) {
                case 0: //no response
                case 1: //no response too
                case 2:
                    strength = "Sehr schwach";
                    color = "red";
                    break;
                case 3:
                    strength = "Mittel";
                    color = "orange";
                    break;
                case 4:
                    strength = "Stark";
                    color = "green";
                    break;
            }
        }

        document.getElementById("message").innerHTML = strength;
        document.getElementById("message").style.color = color;
    }
