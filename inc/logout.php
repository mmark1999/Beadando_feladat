<?php 
    session_start();
    if(isset($_SESSION['isauthenticated']))
    {
        session_unset();
        session_destroy();
    }
    header("Location:".$_SERVER['HTTP_REFERER']);
?>