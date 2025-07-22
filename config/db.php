<?php
$hostname = 'localhost';
$uname = 'root';
$pass = 'admin333';
$db = 'products_crud';
$port = 3307;

$conn = new mysqli($hostname, $uname, $pass, $db, $port);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
