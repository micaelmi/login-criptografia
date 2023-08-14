<?php

$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');

function connection()
{
    global $db_host, $db_name, $db_user, $db_pass;

    $db_config = "mysql:host=$db_host;dbname=$db_name";
    $conn = new PDO($db_config, $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

// function connection()
// {
//     $db_config = "mysql:host=localhost;dbname=login";
//     $username = "root";
//     $password = "";
//     $conn = new PDO($db_config, $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     return $conn;
// }