<?php
$servername = "db";
$username = "root";
$password = "mariadb";
$dbname = "gora";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new Exception("Connection failed: " . $e->getMessage());
}
?>
