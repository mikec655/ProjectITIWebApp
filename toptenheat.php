<html>
    <head>
        <title>Top 10 Heat Index - Hero Cycles Weather Application</title>
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
                <input type="submit" name="downloadxml" id="downloadxml" value="Download XML" /><br/>
            </form>
            <?php
            if (array_key_exists('downloadxml', $_POST)) {
                $dom->save($xml_file_name);
                echo "Your file has been successfully created";
            }
            ?>
        </center>
            <?php
            require("inc/footermodule.php")
            ?>
    </div>
</body>
</html>