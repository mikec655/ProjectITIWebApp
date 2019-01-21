<html>
    <head>
        <title>Dashboard - Hero Cycles Weather Application</title>
        <?php
        require("Header.php")
        ?>
    </head>
    <body>
        <div id="left_sidebar"><br/>
            <div class='alert warning'>
                <span class='alertclosebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span>
            
                <div style='margin-bottom:15px;'>
                    <span class='alerticon'>
                        <img src='img/warning.png' width='36' height='36'></img>
                    </span>
                    <font size='4'><b>&ensp;Information</b></font>
                </div>
                <font size='3'>This website is a schoolproject, that uses the name "Hero Cycles" as an example. The name and the logo are owned by Hero Cycles Ltd. <a href="https://herocycles.com">See their website</a></font>
            </div>
        </div>
        <div id="center_content">
            <center>
                <h1>Hero Cycles Weather Information</h1>
                <p>This website contains the weather information for bike events and other purposes.</p>
            </center>
        </div>/
        <div id="right_sidebar"></div>
        
        <div id="footer">
    <?php
    require("Footer.php")
    ?>
</div>
    </body>
</html>