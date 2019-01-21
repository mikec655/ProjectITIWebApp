<html>
<head>
<title>Dashboard - Hero Cycles Weather Application</title>
<link href="./style/style.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="./img/icon.png"/> 
<div id="banner"><img src="./img/logo.png" width="33%" height="100%"></div>
<div id="menu"><b><a href="./index.php" class="button">Dashboard</a> | <a href="./top10heat.php" class="button">Top 10 Heat</a> | <a href="./rainfall.php" class="button">Rainfall Map</a></button></b></div>
</head>

<div id="left_sidebar"><br/>
<div class='alert warning'><span class='alertclosebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span><div style='margin-bottom:15px;'><span class='alerticon'><img src='img/warning.png' width='36' height='36'></img></span><b><font size='4'>&ensp;Information</font></b></div>
<font size='3'>This website is a schoolproject, that uses the name "Hero Cycles" as an example. The name and the logo are owned by Hero Cycles Ltd. <a href="https://herocycles.com">See their website</a></font>
</div></div>
<div id="center_content"><center><body>
<h1>Hero Cycles Weather Information</h1>
<p>This website contains the weather information for bike events and other purposes.</p>



</center></div>
<div id="right_sidebar"></div>

<div id="footer"><font color=white><?php include './corevariables.php'; echo $version; echo date("Y") ?></font></div>
</body>
</html>