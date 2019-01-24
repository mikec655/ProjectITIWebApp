<html>
    <head>
        <title>Top 10 Heat Index - Hero Cycles Weather Application</title>
        <?php
        require("headermodule.php")
        ?>
    </head>
    <?php
    session_start();

    define('DS', TRUE); // used to protect includes
    define('USERNAME', $_SESSION['username']);
    define('SELF', $_SERVER['PHP_SELF']);

    if (!USERNAME or isset($_GET['logout']))
        include('login.php');

// everything below will show after correct login 
    ?>
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
    <div id="center_content"><center>

            <body>
                <h1>HIER MOET EEN LIVE GRAFIEK KOMEN MET DE AANGEPASTE TEMPERATUUR OFWEL HEATINDEX , TABEL KAN ER UIT IS FILLER</h1>
                <table>
                    <tr><th></th><th>Weather Station</th><th>Country</th><th>Heat Index</th></tr>
                    <tr><th>1</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>2</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>3</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>4</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>5</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>6</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>7</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>8</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>9</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                    <tr><th>10</th><td>1234567890.0987</td><td>India</td><td>27°C</td></tr>
                </table>



        </center></div>
    <div id="right_sidebar"></div>

    <div id="footer">
        <?php
        require("footermodule.php")
        ?>
    </div>
</body>
</html>