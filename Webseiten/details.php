<!doctype html>
<html lang="de">
<?php include("detailsdata.php"); ?>

<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable= yes">

    <title><?= $data["name"] ?></title>

    <!-- link -->
    <link rel="shortcut icon" type="image/png" href="./bilder/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/detailseite.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/beitrag.css">
    <link rel="stylesheet" type="text/css" href="./shariff-3.2.1/shariff.min.css">

    <!-- script -->
    <script type="text/javascript" src="./js/password_validation.js"></script>
    <script type="text/javascript" src="js/character_count.js"></script>

</head>

<body>
    <?php include("header.php"); ?>
    <?php include("nav.php"); ?>

    <div class="grid-container">
        <div class="castlename">
            <h2><?= $data["name"]; ?></h2>
        </div>

        <div class="image">
            <?php foreach($data["pictures"] as $picture): ?>
            <img class="slide" src="<?= $picture["path"]?>" alt="Bild von <?= $data["name"] ?>" style="display:none">
            <?php endforeach; ?>

            <script type="text/javascript" src="./js/detailsCarousel.js"></script>
            <noscript>
                <img class="slide" src="<?= $data["pictures"][0]["path"]?>" alt="Bild von <?= $data["name"] ?>" style="display:block">
            </noscript>

        </div>
        <div class="details">
            <p>
                <b>Standort:</b>
                <?= $data['country']; ?>, <?= $data['city']; ?>
                <br>
                <b>Bauzeitpunkt:</b>
                <?= $data["year"]; ?>
                <br>
                <b>Baustil:</b>
                <?= $data["style"]; ?>
                <br>
                <b>öffentlich zugänglich:</b>
                <?= $data["public"]; ?>
                <br>
            </p>
        </div>
        <div class="description">
            <article>
                <p><?= $data["description"]; ?></p>
            </article>
            <ul>
                <li>
                    <p>Autor: <a class="nodec black" href="./profile.php?type=info&id=<?=$data["author_id"]; ?>"><?= $data["author"]; ?></a>, zuletzt bearbeitet: <?= $data["change_date"]; ?></p>
                </li>
                <li> <?php if(isset($_SESSION["name"])): ?>

                    <a class="button nodec" href="./beitrag.php?id=<?= $data["id"]; ?>"> Bearbeiten</a>
                </li>
                <li><a href="./picture_upload.php?castle_id=<?= $data["id"] ?>" class="button nodec">Bilder bearbeiten</a>
                </li>
            </ul>

            <?php endif; ?>
        </div>
        <!-- Image-Gallery -->
        <div id="gallery" class="gallery">
            <?php foreach($data["pictures"] as $picture): ?>
            <div class="gallery-box">
                <img onclick="openModal();currentSlide(1)" id="my_image" src="<?= $picture["path"]?>" alt="Bild von <?= $data["name"] ?>">
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Gallery-Modal -->
        <div id="galleryModal" class="modal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="modal-content">
                <?php foreach($data["pictures"] as $picture): ?>
                <div class="castleSlides"><img src="<?= $picture["path"]?>" style="width:100%"></div>
                <?php endforeach; ?>

                <a class="prev" onclick="nextSlide(-1)">&#10094;</a>
                <a class="next" onclick="nextSlide(1)">&#10095;</a>
            </div>
        </div>
        <script type="text/javascript" src="./js/detailsModal.js"></script>

        <!-- SocialMedia -->
        <div class="shariff socialmedia" data-services='["facebook";"twitter";"pintrest";"whatsapp";"mail";"tumblr";"reddit";"telegram";]'></div>

        <!-- Comments -->
        <div class="entryComments" id="comments">
            <h3>Kommentare</h3>
            <?php if(empty($data["comments"])): ?>
            <p>Noch keine Kommentare vorhanden.</p>
            <?php 
            else: 
                foreach($data["comments"] as $comment): 
            ?>

            <div class="commentBox">
                <label class="commentAuthor"> <b><?= $comment["author"]; ?></b> </label>
                <label class="commentTime"> - <?= $comment["time"]; ?></label>
                <p class="commentText"><?= $comment["content"]; ?></p>
            </div>

            <?php 
                endforeach;
            endif; 
            ?>
        </div>

        <div class="commentRespond">
            <h3>Artikel kommentieren</h3>
            <noscript>
                <p><strong>Achtung: </strong>Sie haben JavaScript in Ihrem Browser deaktiviert. Um Kommentare verfassen zu können, ist die Aktivierung von JavaScript aber unbedingt erforderlich.</p>
            </noscript>
            <form id="newComment" class="commentForm" method="post" action="save_comment.php">
                <div class="commentFormComment">
                    <label for="comment">Kommentar:</label>
                    <br>
                    <p>Du hast noch <input disabled maxlength="5" size="2" value="1000" id="counter"> Zeichen übrig.</p>
                    <textarea name="comment" onkeyup="textCounter(this,'counter',1000);" maxlength="1000" id="message" placeholder="Ihr Kommentar..."></textarea>
                    <br>
                </div>
                <p class="commentFormAuthor">
                    <label for="author">Name</label>
                    <br>
                    <input type="text" name="author" id="author" required="required" maxlength="30" autocomplete="off">
                </p>
                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                <input type="hidden" name="time" id="time" value="<?= date("d.m.Y H:i:s") ?>">
                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Lfc7asUAAAAAD_k0IIBlAMmj6rdgU1EnqWulrSW"></div>
                <script src="https://www.google.com/recaptcha/api.js"></script><br>
                <p class="formSubmit">
                    <input id="submit" type="submit" value="Kommentar senden" disabled="disabled">
                </p>
                <script type="text/javascript" src="./js/checkCaptcha.js"></script>
            </form>
        </div>

        <script type="text/javascript">
            jQuery(function($) {
                // Websocket
                var websocket_server = new WebSocket("ws://localhost:8080/");
                websocket_server.onopen = function(e) {
                    console.log("Connection established!");
                };
                websocket_server.onerror = function(e) {
                    // Errorhandling
                }
                websocket_server.onmessage = function(e) {
                    console.log(e.data);
                    var json = JSON.parse(e.data);
                    var castleId = "<?php echo $castleId; ?>";
                    if (json["castleId"] == castleId) {
                        var newComment = document.createElement('div');
                        newComment.className = 'commentBox';

                        var author = document.createElement('label');
                        author.className = 'commentAuthor';
                        author.innerHTML = "<b>" + json['author'] + "</b>";

                        var time = document.createElement('label');
                        time.className = 'commentTime';
                        time.textContent = " - " + json["timestamp"];

                        var text = document.createElement('P');
                        text.className = 'commentText';
                        text.textContent = json["msg"];

                        newComment.appendChild(author);
                        newComment.appendChild(time);
                        newComment.appendChild(text);
                        var element = document.getElementsByClassName("entryComments");
                        element[0].appendChild(newComment);

                    }

                }
                $('#newComment').submit(function(e) {
                    var castleId = "<?php echo $castleId; ?>";
                    websocket_server.send(
                        JSON.stringify({
                            'type': 'chat',
                            'author': $('#author').val(),
                            'chat_msg': $('#comment').val(),
                            'timestamp': $('#time').val(),
                            'castleId': castleId
                        })
                    );

                });
            });

        </script>

    </div>
    <br>

    <?php
        include("footer.php")
    ?>

    <script src="./shariff-3.2.1/shariff.min.js"></script>
</body>

</html>
