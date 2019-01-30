<html>
    <head>
        <title>Top 10 Highest Temperatures Asia - Hero Cycles Weather Application</title>
        <?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
        ?>
    </head>
    <?php include ("inc/popup.php"); ?>
    <div id="center_content"><center><body>
                <h1>Top 10 places with highest temperatures</h1>
                <table>
                    <tr><th></th><th>Weather Station</th><th>Country</th><th>Name</th><th>Temperature</th></tr>
                    <?php include("inc/toptentable.php"); ?>
                </table>
        </center></div>
    <div id="right_sidebar"></div>
    <div id="footer">
        <center>
            <form method="post">
                <input type="submit" name="downloadxml" id="downloadxml" value="Generate XML" /><br/>
            </form>
            <?php
            if (array_key_exists('downloadxml', $_POST)) {
                $dom->save($linkpath);
                echo "Top 10 of " . $linkpath . " has been successfully created<br>";
                echo '<a href="' . $linkpath .'" download>Click here to download</a>';
            }
            ?>
        </center>
        <?php
        require("inc/footermodule.php")
        ?>
    </div>
</body>
</html>