<html>
    <head>
    <?php
        include "headermodule.php";
    ?>
    </head>
    <body> 
        <div class="filler"></div>
            <div class="container">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"><link rel="stylesheet" type="text/css" href="style/style.css">
                        <ul class="loginstyling">    
                            <img src="">
                            <br>
                            <p>Welcome to the weatherdata portal.<p>
                            <input type="text" name="name" class="contactstyling" placeholder="Vul uw inlognaam in" value="" maxlength="40" />
                            </br></br>
                            <input type="password" name="pass" class="form-control" placeholder="Vul uw wachtwoord in" maxlength="15" />
                            </br></br>
                            <input type="submit" class= "btn btn-block btn-primary" name="btn-login" value="Inloggen"/>
                        </ul>
                    </form>     
            </div>
        
        
        <div id="footer">
            <div class="container">
                <?php
                include 'footermodule.php';
                ?>
            </div>
        </div>
</html>
