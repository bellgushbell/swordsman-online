<?php
$servername = "192.168.1.136";
$username = "swordsman3V2";
$password = "swordsman3!!@$%$";
$dbname = "swordsmancms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
