<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Error: ID not provided.");
}

echo $id;

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT d.id, d.id_title, d.description, t.type, t.title, t.image FROM description d INNER JOIN title t ON d.id_title = t.id WHERE d.id_title = ?";

// Prepare statement with error check
if (!$stmt = $conn->prepare($sql)) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    print_r($data);
} else {
    die("Error: Data not found.");
}
