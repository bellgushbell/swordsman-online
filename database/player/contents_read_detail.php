<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Error: ID not provided.");
}


// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT d.id, d.id_title, d.description, t.type, t.title, t.image, t.created_at,t.seo_keywords,t.seo_description,t.seo_title FROM description d INNER JOIN title t ON d.id_title = t.id WHERE d.id_title = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    $_SESSION['data_news'] = $data;

    header("Location: ../../page/player/contents_detail.php?data=" . $_SESSION['data_news']);
    exit();
} else {
    die("Error: Data not found.");
}

$stmt->close();
$conn->close();
