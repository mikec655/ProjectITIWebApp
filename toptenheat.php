<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Top 10 Hottest Locations - HeroCycles Weather App</title>
        <link rel="icon" href="img/icon.png"/>
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
        <div id="content">
            <div class="col9 grayborder" id="content_border">
                <center>
                    <img src="img/load.gif" height="200px" width="200px" style="margin: 100px">
                </center>
            </div>
            <script>
                $(document).ready(function () {
                    $("#content_border").load("inc/toptentable.php");
                    $(".delimiter").load("inc/toptenxml.php");
                });
                setInterval(function () {
                    $("#content_border").load("inc/toptentable.php");
                    $(".delimiter").load("inc/toptenxml.php");
                }, 60000);
            </script>
            <center>
                <a id="btn" href="<?php echo "xml/Top 10 of " . date("Y-m-d") . ".xml" ?>" download="<?php echo "Top 10 of " . date("Y-m-d") . ".xml" ?>">Download</a>  
            </center>
            <script>
                function curday() {
                    today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear();

                    if (dd < 10)
                        dd = '0' + dd;
                    if (mm < 10)
                        mm = '0' + mm;
                    return (yyyy + "-" + mm + "-" + dd);
                }

                $("#btn").click(function () {
                    $(".delimiter").load("inc/toptenxml.php");
                });
            </script>

        </div>
    </div>
    <div class="delimiter"></div>
<center>
    <div id="footer">
        <div class="container">
            <?php include ("inc/footer.php") ?>
        </div>
    </div>
</center>    
</body>
</html>