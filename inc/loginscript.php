<?php

defined('DS') OR die('No direct access allowed.');

$username = 'user';
$password = 'userpass';

$random1 = 'secret_key1';
$random2 = 'secret_key2';

$hash = md5($random1 . $password . $random2);


$users = array(
    "$username" => "$hash"
);

if (isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if (isset($_POST['username'])) {
    if ($hash == $hash && $users[$_POST['username']] !== NULL && $users[$_POST['username']] == md5($random1 . $_POST['password'] . $random2)) {
        $_SESSION['username'] = $_POST['username'];
        header('Location:  ' . $_SERVER['PHP_SELF']);
    } else {
        //invalid login
        echo "<p>error logging in</p>";
    }
}

echo '<form method="post" action="' . SELF . '">
  <center>
  <h2>Login in order to unlock the functionality</h2>
  <p><label for="username">Username</label> <input type="text" id="username" name="username" value="" /></p>
  <p><label for="password">Password</label> <input type="password" id="password" name="password" value="" /></p>
  <p><input type="submit" name="submit" value="Login" class="button"/></p>
  <center>
  </form>';
exit;
?>