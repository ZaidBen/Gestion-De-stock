<?php 

$server = "localhost";
$user = "root";
$pass = "E7DnO9eoP7Clc9Zw";
$database = "gestion-stock";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>