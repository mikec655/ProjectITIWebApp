<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>HeroCycles</title>
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
                    <select id="station_select"></select>
                    <div class="chart_container" id="chart_container" style="position: relative; height: auto; width: 80%"></div>
                    </center>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#station_select").load("inc/indiaselectbox.php")
                        var station = $("#station_select").val();
                        $("#chart_container").load("inc/heatindexgraph.php?station=" + station);
                    });
                    $("#station_select").change(function() {
                        var station = $("#station_select").val();
                        $("#chart_container").load("inc/heatindexgraph.php?station=" + station);
                    })
                    setInterval(function () {
                        var station = $("#station_select").val();
                        $("#chart_container").load("inc/heatindexgraph.php?station=" + station);
                    }, 60000);
                </script>
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
                <div class="left"><?php include ("inc/footer.php") ?></div>
            </div>
        </div>
    </body>
</html>