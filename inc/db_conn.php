<?php 
    $user = 'root';
    $password = ''; 
    $database = 'beadando';
    $port = NULL;
    $conn = new mysqli('127.0.0.1', $user, $password, $database, $port);
    $conn->set_charset('UTF-8');
    if ($conn->connect_error) 
    {
        die('Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error);
    }
?>