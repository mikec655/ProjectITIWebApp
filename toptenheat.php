<html>
    <head>
        <title>Top 10 Heat Index - Hero Cycles Weather Application</title>
        <?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
        ?>
    </head>
    <div id="left_sidebar"><br/>
        <div class='alert warning'>
            <span class='alertclosebtn' onclick='this.parentElement.style.display = `none`;'>&times;</span>
            <div style='margin-bottom:15px;'>
                <span class='alerticon'>
                    <img src='img/warning.png' width='36' height='36'></img>
                </span>
                <font size='4'><b>&ensp;Information</b></font>
            </div>
            <font size='3'>This website is a schoolproject, that uses the name "Hero Cycles" as an example. The name and the logo are owned by Hero Cycles Ltd. <a href="https://herocycles.com">See their website</a></font>
        </div></div>
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
            <button></i> Download data to XML</button>
        </center>
        <?php
        require("inc/footermodule.php")
        ?>
    </div>
</body>
</html>