<html>
    <head>
        <title>Top 10 Highest Temperatures Asia - Hero Cycles Weather Application</title>
        <link href="style/disclaimer.css" rel="stylesheet" type="text/css"/>
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
                <input type="submit" name="downloadxml" id="downloadxml" value="Download XML"/><br/>
            </form>
            <?php
            if (array_key_exists('downloadxml', $_POST)) {
                $dom->save("public/" . $linkpath);
                $file = "public/" . $linkpath;

                if (file_exists($file)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename=' . basename($file));
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    ob_clean();
                    flush();
                    readfile($file);
                    exit;
                }
                else{
                    echo "An error has occurred";
                }
            }
            ?>
        </center>
        <?php
        require("inc/footermodule.php")
        ?>
    </div>
</body>
</html>