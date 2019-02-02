<html>
    <head>
        <title>Rainfall Map Asia - Hero Cycles Weather Application</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
        ?>
    </head>
    <?php include ("inc/popup.php"); ?>
    <body> 
        <div id="center_content">
            <center>
                <img src="img/load.gif" height="200px" width="200px" style="margin: 100px">
            </center>
        </div>
        <script>
        $(document).ready(function() {
            $("#center_content").load("inc/openmap.php");
        });
        setInterval(function() {
            $("#center_content").load("inc/openmap.php");
        }, 60000);
    </script>
        <div id="right_sidebar"></div>
    </body>
    <div id="footer">
        <?php
        require("inc/footermodule.php")
        ?>
    </div>
</html>