<?php

    $selected='';
    function get_options($select)
    {
        $countries=array('India'=>'1','USA'=>2,'Japan'=>3);

        $options = '';
        while(list($k,$v)=each($countries))
        {
            if($select == $v)
            {
                $options.='<option value="'.$v .'" selected>'.$k.'</option>';
            }
            else
            {
               $options.='<option value="'.$v .'">'.$k.'</option>'; 
            }
        }
        return $options; 
    }
    if(isset($_POST['countries']))
    {
        $selected = $_POST['countries'];
        echo $selected;
    }
?>

<!DOCTYPE html>
<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<select name="countries" onchange="this.form.submit();">
<?php  echo get_options($selected); ?>
</select>
</form>
</body>
</html>