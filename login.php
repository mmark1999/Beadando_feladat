<?php include"inc/db_conn.php"; ?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Használt autó</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/js/functions.js"></script>
</head>
<body>
    <?php include "inc/menu.php"; ?>
    <form method="POST" action="login.php" id="login_form">
        <div class = "form_element">
        <label for="login_user">Felhasználó név:</label>
        <input id="login_user" type="text" name="login_user">
        </div>
        <br>
        <div class="form_element">
        <label for="login_pass">Jelszó:</label>
        <input id="login_pass" type="password" name="login_pass">
        </div>
        <br>
        <div class="form_element">
        <input class="button" type="button" value="Belépés!" onclick="login_form_chck('submit')">
        </div>
    </form>
    <div id=login_resp style="display:none;">Hibás felhasználó név vagy jelszó!</div>
   
    <?php
        if(isset($_POST["login_user"]) && isset($_POST["login_pass"]) && (isset($_COOKIE["is_login_submitted"])))
        {
            $user = $_POST["login_user"];
            $pass = hash("sha512", $_POST['login_pass'], false);
            $data = mysqli_query($conn,"SELECT * FROM `users`");

            $is_valid_login = false;

            while(($row = mysqli_fetch_array($data)) && ($is_valid_login == false))
            {
                if(($row['user'] == $user) && ($row['pass'] == $pass))
                {
                    $is_valid_login = true;
                    if($row['is_admin'] == 1)
                    {
                        $isadmin = 1;
                    }
                    break;
                }
            }

            if($is_valid_login)
            {
                unset($_POST["login_user"]);
                unset($_POST["login_pass"]);
                session_start();
                $_SESSION["isauthenticated"] = true;
                $_SESSION["user"] = $user;
                $_SESSION["isadmin"] = $isadmin;
                echo "<script type='text/javascript'> login_form_chck('redirect'); </script>";
            }
            else
            {
                unset($_POST["login_user"]);
                unset($_POST["login_pass"]);
                echo "<script type='text/javascript'> login_form_chck('error'); </script>";   
            }
        }
        else
        {
            echo '';
        }
    ?>

</body>
</html>
<?php include"inc/db_close.php"; ?>