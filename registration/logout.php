<?php 
    require_once("../config.php");

    unset($_SESSION['user']);
    unset($_SESSION['loginToken']);
    session_destroy();
    session_start();
    $_SESSION['admin']=false;
    header('refresh:1;url=/');
?>