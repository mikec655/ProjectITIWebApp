<!DOCTYPE html>
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
            <div id="content">
                <div class="col9 grayborder">
                <center>
                    <h1>Top 10 places with highest temperatures</h1>
                    <br>
                    <table>
                        <tr><th></th><th>Weather Station</th><th>Country</th><th>Name</th><th>Temperature</th></tr>
                        <?php include("inc/toptentable.php"); ?>
                    </table>
                </center>
                <br>
            </div>
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
                    } else {
                        echo "An error has occurred";
                    }
                }
                ?>
            </center>
        </div>
        </div>
        <div class="delimiter"></div>
    <div id="footer">
        <div class="container">
            <div class="left"><?php include ("inc/footer.php")?></div>
        </div>
    </div>
</body>
</html>