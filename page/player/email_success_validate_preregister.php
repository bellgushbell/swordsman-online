<?php
require 'config.php'; // ไฟล์เชื่อมต่อฐานข้อมูล

$token = $_GET['token'] ?? '';

// ค้นหา Token ในฐานข้อมูล
$stmt = $conn->prepare("SELECT email FROM preregister_tokens WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($email);
    $stmt->fetch();

    // อัปเดตสถานะการลงทะเบียน
    $updateStmt = $conn->prepare("UPDATE users SET step1 = 1 WHERE email = ?");
    $updateStmt->bind_param("s", $email);
    $updateStmt->execute();
    $updateStmt->close();

    // ลบ token ที่ใช้ไปแล้ว
    $deleteStmt = $conn->prepare("DELETE FROM preregister_tokens WHERE token = ?");
    $deleteStmt->bind_param("s", $token);
    $deleteStmt->execute();
    $deleteStmt->close();

    // ส่งไปยังหน้า Preregister พร้อมแจ้งเตือน
    header("Location: preregister-reward.php?status=success");
} else {
    header("Location: preregister-reward.php?status=error");
}

$stmt->close();
$conn->close();
?>
