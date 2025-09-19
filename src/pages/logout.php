<?php
    session_start();
    session_destroy();
    unset($_SESSIION['username']);
    $_SESSION['loggedin']=null;
    $_SESSION['message'] = "You are now logged out";
    header("location: home.php");
?>
