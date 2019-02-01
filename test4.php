<?php
$cars=array("Volvo","BMW","Toyota");

if ($_SERVER['REQUEST_METHOD']==="POST") {
    if (isset($_POST['car'])) {
        if (in_array($_POST['car'],$cars)) {
            echo "You selected ".$_POST['car']."!";
            exit;
        }
    }
}

?>
<DOCTYPE html>
<html>
    <form method="post" action="">
        <select name="car">
        <?php
        foreach ($cars as $car) {
            echo '<option value="'.$car.'">'.$car.'</option>';
        }
        ?>
        </select>
        <input type="submit" value="Select">
    </form>
</html>