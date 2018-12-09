<?php
$servername = "localhost";
$username = "root";
$password = "Denis_2017";
$dbName = "A17";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected succesfsfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
