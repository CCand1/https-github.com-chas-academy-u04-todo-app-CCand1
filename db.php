<?php

$servername ="db";
$username = "mariadb";
$password = "mariadb";
$dbname = "mariadb";
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Connection failes: " . $e->getMessage();
}
?>















