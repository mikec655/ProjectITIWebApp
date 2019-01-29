<?php
    include("dataReader.php");
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
        $data = readDataOfCountry(date("Y-m-d"), $country, "110000000000", 60 * 60, FALSE);
        foreach ($data as $station) {
            $highest_temperatures[$station['stn']] = array(max($station['data']['temp']), $country, $station['name']);
            //print_r($station['data']['temp']);
        }
    }
    arsort($highest_temperatures);
    $highest_temperatures = array_slice($highest_temperatures, 0, 10, TRUE);
    $rank = 1;
    foreach ($highest_temperatures as $key => $value) {
        echo "<tr><th>" . $rank++ . "</th><th>" . $key . "</th><th>" . $value[1] . "</th><th>" . $value[2] . "</th><th>" . round($value[0], 1) . "</th></tr>";
    }
    ?>