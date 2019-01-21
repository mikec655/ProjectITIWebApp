<html>
    <head>
        <title>Rainfall Map - Hero Cycles Weather Application</title>
        <link href="style/style.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="img/icon.png"/> 
    <div id="banner"><img src="img/logo.png" width="33%" height="100%"></div>
    <div id="menu"><b><a href="index.php" class="button">Dashboard</a> | <a href="top10heat.php" class="button">Top 10 Heat</a> | <a href="rainfall.php" class="button">Rainfall Map</a></button></b></div>
</head>
    
<div id="left_sidebar"><br/>
    <div class='alert warning'><span class='alertclosebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span><div style='margin-bottom:15px;'><span class='alerticon'><img src='img/warning.png' width='36' height='36'></img></span><b><font size='4'>&ensp;Information</font></b></div>
        <font size='3'>This website is a schoolproject, that uses the name "Hero Cycles" as an example. The name and the logo are owned by Hero Cycles Ltd. <a href="https://herocycles.com">See their website</a></font>
    </div></div>
<div id="center_content"><center><body>
            <h1>Rainfall Map</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.9483881988094!2d77.09443661507852!3d28.450972182489807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d18b600f22479%3A0xdd0140666e1d6c57!2sHero+Cycles+Limited!5e0!3m2!1snl!2snl!4v1547217925244" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    
    
    
    </center></div>
<div id="right_sidebar"></div>
    
<div id="footer"><font color=white><?php include 'corevariables.php'; echo $version; echo date("Y") ?></font></div>
</body>
</html>