<?php
    session_start();
    if(isset($_POST["logout"]))
    {
        session_unset();
        session_destroy();
    }
    if(isset($_SESSION['isauthenticated']))
    {
        echo '<div id="logged_in">Bejelntkezve mint: '.$_SESSION['user'].'</div>';
        echo '<form action="." method="POST"><button type="submit" name="logout" value=1>Kijelentkezés</button></form>';
    }
?>

