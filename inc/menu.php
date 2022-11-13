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

<a class = "link" href="."><img class = "link" src="/img/home.png">Főoldal</a>
<a class = "link" href="register.php" <?php echo visibility('register');?>><img class = "link" src="/img/register.png">Regisztráció</a>
<a class = "link" href="login.php" <?php echo visibility('login');?>><img class = "link" src="/img/login.png">Bejelentkezés</a>
<a class = "link" href="admin.php" <?php echo visibility('admin');?>><img class = "link" src="/img/admin.png">Admin oldal</a>
<a class = "link" href="basket.php" <?php echo visibility('basket');?>><img class = "link" src="/img/basket.png">Kosár</a>
<a class = "link" href="inc/logout.php" <?php echo visibility('logout');?>><img class = "link" src="/img/logout.png">Kijelentkezés</a>