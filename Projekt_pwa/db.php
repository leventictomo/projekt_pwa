<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hnkdrinovci";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Povezivanje neuspješno: " . $conn->connect_error);
}
?>