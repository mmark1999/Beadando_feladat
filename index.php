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
    <h1 id="title" >Üdvözöljük a Robyautó oldalán! Használt autók, megbízható forrásból</h1>
    <?php include "inc/menu.php"; ?>
    <div class = "list">
    <table>
        <tr>
            <th>Gyártmány</th>
            <th>Típus</th>
            <th>Évjárat</th>
            <th>Futásteljesítmény</th>
            <th>Üzemanyag</th>
            <th>Szín</th>
            <th>Állapot</th>
            <th>Ár</th>
        </tr>
        <form method="POST", action=".">
        <?php

            function stars($state)
            {
                $stars = '';
                for($i = 0; $i<$state; $i++)
                {
                    $stars = $stars.'<img class = "star" src="/img/star.png">';
                }
                for($i = 0; $i<5-$state; $i++)
                {
                    $stars = $stars.'<img class = "star" src="/img/empty_star.png">';
                }
                return $stars;
            }

            $table = mysqli_query($conn,"SELECT * FROM `products`");
            while($row = mysqli_fetch_array($table))
            {
                echo '<label id="'.$row['id'].'"><tr id = '.$row['id'].'><th>'.$row['manufacture'].
                '</th><th>'.$row['type'].'</th><th>'.$row['vintage'].'</th><th>'.$row['milage'].
                '</th><th>'.$row['fuel'].'</th><th>'.$row['color'].'</th><th class = "star_container">'.stars($row['state']).'</th><th>'.$row['price'].
                '</th></label><th><input type = "image" src="/img/trolley.png" class="trolley" 
                style="';
                if(isset($_SESSION["isauthenticated"]))
                {
                    echo 'display:block;';
                }
                else
                {
                    echo 'display:none';
                }
                echo '" alt="Submit"></th></tr>';
            }
        ?>
    </table>
    </div>
</body>
</html>
<?php include"inc/db_close.php"; ?>