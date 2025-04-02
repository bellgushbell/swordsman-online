<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Error: ID not provided.");
}

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT contents.*, category.category_name_en AS category_name, created_users.username AS created_by, updated_users.username AS updated_by
        FROM contents   
        INNER JOIN category ON contents.category_id = category.id 
        INNER JOIN users AS created_users ON contents.created_by = created_users.id
        LEFT JOIN users AS updated_users ON contents.updated_by = updated_users.id
        WHERE contents.id = ?";


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
    $_SESSION['post'] = "edit";

    // Redirect ไป content_admin.php
    header("Location: ../../page/admin/content_admin.php?edit_id=" . $_SESSION['edit_id']);
    exit();
} else {
    die("Error: Data not found.");
}

$stmt->close();
$conn->close();
