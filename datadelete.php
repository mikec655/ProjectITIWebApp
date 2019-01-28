<?php
/*
Minutes represents the minutes of a given hour, 0-59 respectively.
Hours represents the hours of a given day, 0-23 respectively.
Days represents the days of a given month, 1-31 respectively.
Months represents the months of a given year, 1-12 respectively.
Day of the Week represents the day of the week, Sunday through Saturday, numerically, as 0-6 respectively.

1:
crontab -e
2:
kies editor
3:

0 0 * * * php /filepath.....php -I 

*/

$datablok_length = 43;

//checkt voro alle .dat bestanden in testdata
foreach (glob("testdata/*/*.dat") as $file) {

    //echo "$file size " . filesize($file) . "\n";

    echo "<br>";
    $new_file = $file."_";    //nieuwe filenaam van gefilterde zooi.
    $new_handle = fopen($new_file, "w");    ///////////////deze  moet ander map maybe voor data maar een keer filteren.
    $handle = fopen($file, "rb");
    
    
    while(true) {
        if(!$data = fread($handle, $datablok_length)) break; 
        echo "data =:".$data;
        echo "<br>";
        $array = unpack("Ntime/Gtemp/Gdewp/Gstp/Gslp/Gvisib/Gwdsp/Gprcp/Gsndp/Cfrshtt/Gcldc/nwnddir", $data);
        print_r($array);
        echo "<br>";
      
        $packed = pack("NGG", $array['time'], $array['temp'],$array['prcp']);
        fwrite($new_handle, $packed);

        echo "<br>";        
    }
    
    fclose($handle);
    fclose($new_handle);
    echo "<br>";
    unlink ($file);
    //rename($new_file, $file);
}
// mapje van filtered files aanmaken om naar te refereren.


?>

