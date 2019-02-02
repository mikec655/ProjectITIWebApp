<html>
<head>
    <title>Heat Index India - Hero Cycles Weather Application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php
    require("inc/headermodule.php");
    require("inc/loginrequire.php");
    ?>
</head>
<body>


<select id="station_select">

</select>

<div class="chart_container" id="chart_container" style="position: relative; height: auto; width: 100%">
    
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
</script>

</body>
</html>