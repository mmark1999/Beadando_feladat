<?php
    session_start();

    if(isset($_SESSION['isauthenticated']))
    {
        $user_logged_in = $_SESSION['user'];
    }

    function visibility($link_name)
    {
        switch($link_name)
        {
            case 'register':
                if(isset($_SESSION['isauthenticated']))
                {
                    $result = 'none';
                }
                else
                {
                    $result = 'inline';
                }
                    break;

            case 'login':
                if(isset($_SESSION['isauthenticated']))
                {
                    $result = 'none';
                }
                else
                {
                    $result = 'inline';
                }
                    break;
            
            case 'basket':
                if(isset($_SESSION['isauthenticated']))
                {
                    $result = 'inline';
                }
                else
                {
                    $result = 'none';
                }
                    break;
            
            case 'logout':
                if(isset($_SESSION['isauthenticated']))
                {
                    $result = 'inline';
                }
                else
                {
                    $result = 'none';
                }
                    break;

            case 'admin':
                if(isset($_SESSION['isadmin']))
                {
                    $result = 'inline';
                }
                else
                {
                    $result = 'none';
                }
                    break;
        }

        if($link_name.'.php' == basename($_SERVER['PHP_SELF']))
        {
            $result = 'none';
        }

        return 'style="display:'.$result.';"';
    }
?>
<div id="menu">
    <div id = "menu_bar">
        <div class="menu_element"><a class = "link" href="."><img class = "link" src="/img/home.png">Főoldal</a></div>
        <div class="menu_element" <?php echo visibility('register');?>><a class = "link" href="register.php"><img class = "link" src="/img/register.png">Regisztráció</a></div>
        <div class="menu_element" <?php echo visibility('login');?>><a class = "link" href="login.php"><img class = "link" src="/img/login.png">Bejelentkezés</a></div>
        <div class="menu_element" <?php echo visibility('admin');?>><a class = "link" href="admin.php"><img class = "link" src="/img/admin.png">Admin oldal</a></div>
        <div class="menu_element" <?php echo visibility('basket');?>><a class = "link" href="basket.php"><img class = "link" src="/img/basket.png">Kosár</a></div>
        <div class="menu_element" <?php echo visibility('logout');?>><a class = "link" href="inc/logout.php"><img class = "link" src="/img/logout.png">Kijelentkezés</a></div>
    </div>
    <div id = "menu_info">
        Logged in as: mmark1999
    </div>
</div>