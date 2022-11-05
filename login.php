<?php include"php/db_conn.php"; ?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Használt autó</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
   <?php session_start(); $_SESSION["isauthenticated"] = true; $_SESSION["user"] = "ASD"; ?>
   <a href="."> Vissza! </a>
</body>
</html>
<?php include"php/db_close.php"; ?>