<?php
include ("globalconfig.php");

$servername = "localhost";
$sqluser = "root";
$sqlpass = "0dyi76$72683h090726";
$dbname = $sql_database;

// Create connection
$conn = new mysqli($servername, $sqluser, $sqlpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>