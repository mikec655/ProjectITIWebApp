<html>
    <head>
        <title>Rainfall Map Asia - Hero Cycles Weather Application</title>
        <?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
        ?>
    </head>
    <?php include ("inc/popup.php"); ?>
    <body> 
        <div id="center_content"><center>
                <h1>Rainfall Map</h1>
                <?php include("inc/openmap.php"); ?>
                <!-- <iframe src="inc/openmap.php" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            </center>
        </div>
        <div id="right_sidebar"></div>
    </body>
    <div id="footer">
        <?php
        require("inc/footermodule.php")
        ?>
    </div>
</html>