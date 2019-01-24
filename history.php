<!DOCTYPE html>
<html>
<head>
<?php
        require("inc/headermodule.php");
        require("inc/loginrequire.php");
?>
</head>
<body>

<div style="background-color:black;">
    <div style=float:left style="background-color:green;">
        <b>stations</b>
        <br>
            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
        <br>
            <button onclick="myFunction()" class="dropbtn">Dropdown</button>
    </div>

<?php
  $timezone = "Asia/Colombo";
  date_default_timezone_set($timezone);
  $today = date("Y-m-d");

  $dateMin28 = new DateTime($today);
  $dateMin28 = $dateMin28->sub(new DateInterval('P28D'));
  $dateMin28 = $dateMin28->format('Y-m-d')
?>
    <div style=float:left>
        <form action= "history.php">
        <b>Agenda</b>
        <br>
        <input type="date" name="bday"
        value=<?php echo $today; ?>
        min=<?php echo $dateMin28; ?> max=<?php echo $today; ?>>
        <br>
        <input type="submit">
        </form>
    </div>
</div>
<br>

<center>
                <table>
                <tr><th></th><th><h1>Weather data from today</h1><br>
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
</center>


</body>


<div class="footer">
        <center>
            <button></i> Download data to XML</button>
        </center>
        <?php
        require("inc/footermodule.php")
        ?>
    </div>

</html>
