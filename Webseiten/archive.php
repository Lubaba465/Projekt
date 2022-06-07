<!doctype html>
<html lang="de">

<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title>Burgen in Europa&nbsp;-&nbsp;Liste aller Artikel </title>

    <!-- link -->
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/archive_style.css">
    <link rel="stylesheet" type="text/css" href="./css/entry.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>

</head>

<body>
    <?php
    include("archivedata.php");
    ?>
    <?php
    include("header.php");
    ?>
    <?php
    include("nav.php");
    ?>
    <div class="archive-grid">
        <main>
            <h1>Liste aller Burgen</h1>
            <div class="achive-flex-main">
                <?php foreach($categories as $category): ?>
                <div class="archive-flex-main-item">
                    <h2><a class="nodec black" id="<?= $category; ?>"><?= $category; ?></a> </h2>
                    <hr>
                    <?php foreach($entries[$category] as $entry): ?>
                    <div class="entry">
                        <div>
                            <img src="<?= $entry['pictures'][0]['path']?>" alt="<?= $entry['name']; ?>">
                        </div>
                        <div>
                            <b>Name:</b> <?= $entry['name']; ?> <br>
                            <b>Standort:</b> <?= $entry['country']; ?>, <?= $entry['city']; ?> <br>
                            <a class="black" href="./details.php?id=<?= $entry["id"]; ?>">mehr info</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
        <aside>
            <div id="toggle-sidebar">
                <a class="show-sidebar nodec black" href="#toggle-sidebar"><i class="fas fa-search-plus"></i></a>
                <a class="hide-sidebar nodec black" href="#"><i class="far fa-window-close"></i></a>
                <div class="inhalt-sidebar">
                    <div class="archive-flex-sidebar">
                        <div class="archive-flex-sidebar-item">
                            <form methode="get">
                                <input type="text" name="search" size="17">
                                <input type="submit" value="Suchen" class="button">
                            </form>
                        </div>
                        <div class="archive-flex-sidebar-item">
                            <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                                <fieldset>
                                    <legend>Sortierung</legend>
                                    <input type="radio" name="sort" value="firstletter" checked> Alpabethisch<br>
                                    <input type="radio" name="sort" value="country"> Land<br>
                                    <input type="radio" name="sort" value="century"> Bauzeitraum<br>
                                    <input type="radio" name="sort" value="style"> Baustil<br>
                                    <input type="radio" name="sortDirection" value="asc" checked>Aufsteigend <br>
                                    <input type="radio" name="sortDirection" value="desc"> Absteigend <br>
                                    <input type="submit" value="Sortieren" class="button">
                                </fieldset>
                            </form>
                        </div>
                        <div class="archive-flex-links archive-flex-sidebar-item">
                            <?php foreach($categories as $category): ?>
                            <div>
                                <a class="nodec black" href="#<?= $category ?>"><?= $category ?></a> /&nbsp;
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>
