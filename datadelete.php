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
$date_realtime = date("Y-m-d") ;
//     ***maybe: for each veranderen naar sysdate -1 zodat je de vorige dag formateerd
//checkt voor alle .dat bestanden in testdata
echo $date_realtime;
$back_day = date('Y-m-d', strtotime($date_realtime . "-1 day") );
echo $back_day;
//$back_day i.p.v. * hieronder 
foreach (glob("testdata/".$back_day."/*.dat") as $file) {

    //echo "$file size " . filesize($file) . "\n";

    echo "<br>";
    $new_file = $file."_";    //nieuwe filenaam van gefilterde zooi.
    $new_handle = fopen($new_file, "w");    ///////////////deze  moet ander map maybe voor data maar een keer filteren ipv van vaker.
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

