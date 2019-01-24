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
                    <?php
                    include("inc/dataReader.php");
                    $countries = array(
                        "AFGHANISTAN",
                        "ARMENIA",
                        "AZERBAIJAN",
                        "BAHRAIN",
                        "BANGLADESH",
                        "BHUTAN",
                        "BRUNEI",
                        "CAMBODIA",
                        "CHINA",
                        "CYPRUS",
                        "GEORGIA",
                        "INDIA",
                        "INDONESIA",
                        "IRAN",
                        "IRAQ",
                        "ISRAEL",
                        "JAPAN",
                        "JORDAN",
                        "KAZAKHSTAN",
                        "KUWAIT",
                        "KYRGYZSTAN",
                        "LAOS",
                        "LEBANON",
                        "MALAYSIA",
                        "MALDIVES",
                        "MONGOLIA",
                        "MYANMAR",
                        "NEPAL",
                        "NORTH KOREA",
                        "OMAN",
                        "PAKISTAN",
                        "PALESTINE",
                        "PHILIPPINES",
                        "QATAR",
                        "RUSSIA",
                        "SAUDI ARABIA",
                        "SINGAPORE",
                        "SOUTH KOREA",
                        "SRI LANKA",
                        "SYRIA",
                        "TAIWAN",
                        "TAJIKISTAN",
                        "THAILAND",
                        "TIMOR-LESTE",
                        "TURKEY",
                        "TURKMENISTAN",
                        "UNITED ARAB EMIRATES",
                        "UZBEKISTAN",
                        "VIETNAM",
                        "YEMEN"
                    );
                    $highest_temperatures = array();
                    foreach ($countries as $country) {
                        $data = readDataOfCountry("2019-01-21", $country, "110000000000", 60);
                        foreach ($data as $station) {
                            $highest_temperatures[$station['stn']] = array(max($station['data']['temp']), $country, $station['name']);
                            //print_r($station['data']['temp']);
                        }
                    }
                    arsort($highest_temperatures);
                    $highest_temperatures = array_slice($highest_temperatures, 0, 10, TRUE);
                    foreach ($highest_temperatures as $key => $value) {
                        echo "<tr><th></th><th>" . $key . "</th><th>" . $value[1] . "</th><th>" . $value[2] . "</th><th>" . round($value[0], 1) . "</th></tr>";
                    }
                    ?>
                </table>



        </center></div>
    <div id="right_sidebar"></div>

    <div id="footer">
        <?php
        require("inc/footermodule.php")
        ?>
    </div>
</body>
</html>