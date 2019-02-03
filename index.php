<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Home - HeroCycles Weather App</title>
        <link rel="icon" href="img/icon.png"/>
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
            <img src="img/headerHC.jpg" alt="HeroCycles Banner" class="headerimg"/>
        </div>
        <div class="login">
            <center>
                <?php require("inc/loginrequire.php"); ?>
            </center>
        </div>
        <div id="delimiter"></div>
        <div class="container">
            <div class="delimiter"></div>
            <div id="content">
                <div class="col3 grayborder">
                    <h2>Preview top10</h2>
                    <iframe src=inc/toptentable.php""></iframe>
                </div>
                <div class="col3 grayborder">
                    <h2>Preview Rainfall</h2>
                    <p>
                        Preview rainfall. 
                    </p>
                </div>
                <div class="col3 grayborder">
                    <h2>Preview heatindex</h2>
                    <p>
                        Preview heatindex
                    </p>
                </div>
            </div>
            <div class="delimiter"></div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="left"><?php include ("inc/footer.php")?></div>
            </div>
        </div>
    </body>
</html>