<?php
error_reporting(~E_DEPRECATED & ~E_NOTICE);
$db_host = "localhost";
$db_name = "vanguard_db";
$db_user = "root";
$db_pass = "";

try {

    $conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

