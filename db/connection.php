<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "is_job_app_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->query('SET @@lc_time_names = "tr_TR";');
    $conn->query('SET CHARACTER SET utf8mb4');
    $conn->query('SET CHARACTER_SET_CONNECTION=utf8mb4');

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}