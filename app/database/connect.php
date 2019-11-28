<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$pass = '';
$db_name = 'shopada';

$conn = new MySQli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die('Database connection error:' . $conn->connect_error);
}
