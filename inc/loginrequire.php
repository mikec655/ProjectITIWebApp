<html>
    <center>
        <?php
        session_start();

        define('DS', TRUE); // used to protect includes
        if (isset($_SESSION['username'])) {
            define('USERNAME', $_SESSION['username']);
        } else {
            define('USERNAME', "");
        }
        define('SELF', $_SERVER['PHP_SELF']);

        if (!USERNAME or isset($_GET['logout']))
            include('loginscript.php');

        ?>
    </center>
</html>