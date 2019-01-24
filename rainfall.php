<html>
    <head>
        <title>Rainfall Map - Hero Cycles Weather Application</title>
        <?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
        ?>
    </head>
    <body> 
        <div id="left_sidebar"><br/>
            <div class='alert warning'>
                <span class='alertclosebtn' onclick='this.parentElement.style.display = `none`;'>&times;</span>
                <div style='margin-bottom:15px;'>
                    <span class='alerticon'>
                        <img src='img/warning.png' width='36' height='36'></img>
                    </span><font size='4'><b>&ensp;Information</b></font>
                </div>
                <font size='3'>This website is a schoolproject, that uses the name "Hero Cycles" as an example. The name and the logo are owned by Hero Cycles Ltd. <a href="https://herocycles.com">See their website</a></font>
            </div></div>
        <div id="center_content"><center>
                <h1>Rainfall Map</h1>
                <iframe src="inc/openmap.php" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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