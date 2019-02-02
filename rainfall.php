<html lang="nl">
    <head>
        <title>HeroCycles</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- <meta http-equiv="refresh" content="3"> -->
    </head>
    <body>
        <div class="container">
            <?php
            include("inc/header.php");
            ?>
        </div>
        <div>
            <img src="img/headerHC.jpg" alt="header image" class="headerimg"/>
        </div>
        <div class="login">
                <?php require("inc/loginrequire.php"); ?>
        </div>
        <div id="delimiter"></div>
        <div class="container">
            <div class="delimiter"></div>
            <div class="content" id="content">
                <center>
                    <img src="img/load.gif" height="200px" width="200px" style="margin: 100px">
                </center>
            </div>
            <script>
                $(document).ready(function() {
                    $("#content").load("inc/openmap.php");
                });
                setInterval(function() {
                    $("#content").load("inc/openmap.php");
                }, 60000);
            </script>
            <div class="delimiter"></div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="left"><?php include ("inc/footer.php") ?></div>
            </div>
        </div>
    </body>
</html>