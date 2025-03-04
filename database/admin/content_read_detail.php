<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Error: ID not provided.");
}

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT d.id, d.id_title, d.description, t.type, t.title, t.image, t.alt_text, t.highlight_text, t.seo_title, t.seo_keywords, t.seo_description, t.created_at 
        FROM description d
        INNER JOIN title t ON d.id_title = t.id 
        WHERE id_title = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Error preparing the SQL statement: ' . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    $_SESSION['edit_data'] = $data;
    $_SESSION['edit_id'] = $data['id']; // ตั้งค่าให้แน่ใจว่ามีค่าจริงๆ
    $_SESSION['edit_id_title'] = $data['id_title'];
    $_SESSION['post'] = "edit";

    // Redirect ไป content_admin.php
    header("Location: ../../page/admin/content_admin.php?edit_id=" . $_SESSION['edit_id']);
    exit();
} else {
    die("Error: Data not found.");
}

$stmt->close();
$conn->close();
