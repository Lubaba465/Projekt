<?php
    $id = (isset($_SESSION["user_id"]) && is_string($_SESSION["user_id"])) ?  "&id=" . $_SESSION["user_id"] : "";
?>

<nav>
    <div class="navbar forestgreen nodefmargin">
        <div class="navbar-item">
            <a href="./index.php">Startseite <i class="fas fa-home"></i></a>
        </div>
        <div class="navbar-item">
            <a href="./map.php">Karte <i class="fas fa-map-marked-alt"></i></a>
        </div>
        <div class="navbar-item">
            <a href="./archive.php">Liste aller Burgen <i class="fab fa-fort-awesome-alt"></i></a>
        </div>
        <div class="navbar-item">
            <a href="./profile.php?type=self<?=$id; ?>">Profil bearbeiten <i class="fa fa-user"></i></a>
        </div>
    </div>
</nav>
