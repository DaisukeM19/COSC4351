<?php
$servername = "localhost";
$usersname = "root";
$password = "root";
$database = "user";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $usersname, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }
?>