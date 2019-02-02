<html lang="nl">
    <head>
        <title>HeroCycles</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <div id="delimiter"></div>
        <div class="container">
            <div class="delimiter"></div>
            <div id="content col6">
                <br>
                <center style="height:70%;">
                    <h1>Rainfall map Asia</h1>
                    <br>
                    <?php include("inc/openmap.php"); ?>
                </center>
            </div>
            <div class="delimiter"></div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="left">&copy; ITV2A</div>
            </div>
        </div>
    </body>
</html>