<?php include"php/db_conn.php"; ?>
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

    <?php 
        if(isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["pass"]))
        {
            $style = "style='display:none;'";
            $style_div = "";
            $text = "";

            $user = $_POST['user'];
            $email = $_POST['email'];
            $pass = hash("sha512", $_POST['pass'], false);

            $sql = "INSERT INTO users (user, pass, email, is_admin) VALUES ('$user', '$pass', '$email', '0')";

            if ($conn->query($sql) === TRUE) 
            {
                $text = "Sikeres regisztráció";
            } 
            else 
            {
                $text = "Error: " . $sql . "<br>" . $conn->error;
            }

            unset($_POST["user"]);
            unset($_POST["email"]);
            unset($_POST["pass"]);
        }
        else
        {
            $style = "";
            $style_div = "style='display:none;'";
        }
    ?>


    <form method="POST" action="register.php" id="register_form" <?php echo $style; ?>>
        <div class = "form_element">
        <label for="user">Felhasználó név:</label>
        <input id="user" type="text" name="user" oninput="register_form_chck()" onfocus="register_form_chck()" onblur="register_form_chck()">
        <div id="user_resp" class="response"></div>
        </div>
        <br>
        <div class="form_element">
        <label for="email">E-mail cím:</label>
        <input id="email" type="text" name="email" oninput="register_form_chck()" onfocus="register_form_chck()" onblur="register_form_chck()">
        <div id="email_resp" class="response"></div>
        </div>
        <br>
        <div class="form_element">
        <label for="pass">Jelszó:</label>
        <input id="pass" type="password" name="pass" oninput="register_form_chck()" onfocus="register_form_chck()" onblur="register_form_chck()">
        <div id="pass_resp" class="response"></div>
        </div>
        <br>
        <div class="form_element">
        <label for="repass">Jelszó mégegyszer:</label>
        <input id="repass" type="password" name="repass" oninput="register_form_chck()" onfocus="register_form_chck()" onblur="register_form_chck()">
        <div id="repass_resp" class="response"></div>
        </div>
        <br>
        <div class="form_element">
        <input class="button" type="button" onclick="register_form_chck('submit')" value="Regisztráció!">
        <input class="button" type="button" onclick="register_form_chck('reset')" value="Töröl!">
        </div>
    </form>
    <div id="register_state" <?php echo $style_div; ?>>
        <?php echo $text; ?>
        <a href=".">Főoldal</a>
    </div>
</body>
</html>
<?php include"php/db_close.php"; ?>