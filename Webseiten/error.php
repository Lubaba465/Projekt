<!DOCTYPE html>
<html lang="de">

<head>
    <!--meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Fehlermeldung</title>

    <!-- link -->
    <link rel="stylesheet" type="text/css" href="./css/infobox.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--script-->
    <script type="text/javascript" src="./js/password_validation.js"></script>

</head>

<body>
    <?php include("header.php"); ?>
    <?php include("nav.php"); ?>


    <div class="box error">
        <h3><?php $_GET["fehler"];
            
            switch($_GET["fehler"]){
                case "E001":
                    echo "Der Nutzer konnte nicht gefunden werden!";
                    break;
                case "E002":
                    echo "Die E-Mail Adresse wurde nicht gefunden! Bitte versuchen Sie es erneut!";
                    break;
                case "E003":
                    echo "Die Burg wurde nicht gefunden werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E004":
                    echo "Die ganzen Burgen konnten nicht gefunden werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E005":
                    echo "Die aktuellen Burgen konnten nicht gefunden werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E006":
                    echo "Ihre Suche ist leider fehlgeschlagen! Bitte versuchen Sie es erneut!";
                    break;
                case "E007": 
                    echo "Die zufälligen Burgen konnten nicht angezeigt werden!";
                    break;
                case "E008":
                    echo "Ihre Eingaben konnten nicht gespeichert werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E009":
                    echo "Die Übergabeparameter wurden falsch übermittelt! Bitte versuchen Sie es erneut!";
                    break;
                case "E010":
                    echo "Die aktuellen Veränderungen konnten nicht gespeichert werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E011":
                    echo "Es gab einen Fehler bei der Löschung der Burg! Bitte versuchen Sie es erneut!";
                    break;
                case "E012":
                    echo "Ihre Eingabedaten konnten nicht gespeichert werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E013": 
                    echo "Ihr Kommentar konnte nicht gespeichert werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E014":
                    echo "Das hochgeladene Bild konnte nicht gespeichert werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E015":
                    echo "Das Bild konnte nicht gelöscht werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E016":
                    echo "Die Passwörter stimmen nicht überein! Bitte versuchen sie es erneut!";
                    break;
                case "E017":
                    echo "Der Name konnte nicht veränadert werden! Bitte versuchen Sie es erneut!";
                    break;
                case "E018":
                    echo "Sie haben sich noch nicht eingloggt! Bitte melden Sie sich an!";
                    break;
                case "E019":
                    echo "Das eingegebene Passwort ist falsch!";
                    break;
                case "E020":
                    echo "Die Datei konnte nicht hochgeladen werden!";
                    break;
                case "E021":
                    echo "Das zu löschende Bild existiert nicht mehr!";
                    break;
                case "E022":
                    echo "Das zu änderne Profil existiert nicht mehr!";
                    break;
                case "E023":
                    echo "Das angegebene E-Mail wird bereits benutzt!";
                    break;
                case "E024":
                    echo "Die Burg wurde bereits gelöscht!";
                    break;
                case "E025":
                    echo "Die Burg konnte nicht bearbeitet werden, da der Eintrag nicht mehr existiert!";
                    break;
                case "E026":
                    echo "Es existiert bereits eine Burg mit diesem Namen!";
                    break;
                case "E027":
                    echo "Die E-Mail oder das Passwort ist falsch!";
                    break;
                case "E028":
                    echo "Die hochgeladene Datei hat den Falschen Dateityp!";
                    break;
                case "E029":
                    echo "Zum Uploaden von Bildern ist Javascript notwendig!";
                    break;
                case "E030":
                    echo "Der Nutzer zu löschende Nutzer konnte nicht in der Datenbank gefunden werden!";
                    break;
                
                default:
                    echo "Es gab einen unbekannten Fehler! Bitte versuchen Sie es erneut!";
            }
            
            
            ?>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br>
        </h3>



    </div>


    <?php include("footer.php"); ?>
</body>

</html>
