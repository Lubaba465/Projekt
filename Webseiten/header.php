<?php
    if(session_status() !== PHP_SESSION_ACTIVE){ session_start();}
    $username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Gast';

?>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#search").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "getCastleNames.php",
                        type: "GET",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                            console.log(data);

                        }
                    });
                },
                minLength: 1,

            });
        });

    </script>
</head>

<body class="nodefmargin">

    <header>

        <div class="header-container">

            <div class="header-item">
                <div class="bigfont"><i class="fab fa-fort-awesome-alt"></i> Burgen in Europa</div>
            </div>

            <div class="header-item">
                <form method="get" action="archive.php" , autocomplete="off">
                    <input type="text" name="search" size="30" id="search">
                    <input type="submit" value="Suchen" class="button">
                </form>
            </div>

            <div class="header-item">
                <!--User ist eingeloggt-->
                <?php
                if(isset($_SESSION['login'])): ?>
                <div>
                    Hallo <strong>
                        <?php echo $username; ?>
                    </strong>!
                    <a class=" black nodec" href="logout.php">Logout</a>

                </div>
                <?php else: ?>
                <!--User ist NICHT eingeloggt-->
                <div id="login">
                    <a class="nodec black show" href="#login">Anmelden</a>
                    <a class="nodec black hide" href="#">Schließen</a>
                    <div class="inhalt">
                        <?php include("loginpopup.php"); ?>
                    </div>
                </div>
                |
                <a href="registerpage.php" class="black nodec">Registrieren</a>
                <?php endif; ?>
            </div>

        </div>

    </header>


</body>
