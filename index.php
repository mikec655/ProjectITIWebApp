<html>
    <head>
        <title>Dashboard - Hero Cycles Weather Application</title>
        <link href="style/disclaimer.css" rel="stylesheet" type="text/css"/>
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
        ?>
    </head>
    <body>
        <?php include ("inc/popup.php"); ?>
        <div id="center_content">
                <h1>Hero Cycles Weather Information</h1>
                <p>This website contains the weather information for bike events and other purposes.</p>
        </div>
        <div id="right_sidebar"></div>

        <div id="footer">
            <?php
            require("inc/footermodule.php")
            ?>
        </div>
    </body>
</html>