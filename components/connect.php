<?php

$db_host = 'localhost';
$db_name = 'food_db';
$user_name = 'root';
$user_password = '';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $user_name, $user_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
    die();
}
