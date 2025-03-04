<?php
require_once 'connect_db.php';  // เชื่อมต่อกับฐานข้อมูล

// รับค่าจาก JavaScript ที่ส่งมาผ่าน POST
$data = json_decode(file_get_contents('php://input'), true);
$imageName = isset($data['imageName']) ? $data['imageName'] : '';

// ตรวจสอบว่ามีชื่อไฟล์นี้ในฐานข้อมูลหรือไม่
try {
    // ตรวจสอบการเชื่อมต่อฐานข้อมูล
    if ($conn->connect_error) {
        throw new Exception('Database connection is not established.');
    }

    // คิวรีข้อมูลจากฐานข้อมูล
    $stmt = $conn->prepare("SELECT id, image,alt_text FROM title WHERE image = ? LIMIT 1");
    $stmt->bind_param('s', $imageName);  // 's' คือประเภทของตัวแปรที่ส่งเข้า (string)
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // ส่งข้อมูลกลับไปยัง JavaScript
        echo json_encode([
            'success' => true,
            'id' => $row['id'],
            'imageName' => $row['image'],  // ใช้ชื่อคอลัมน์ที่ตรงกับฐานข้อมูล
            'alt_text' => $row['alt_text'],
        ]);
    } else {
        echo json_encode(['success' => false]);
    }

    // ปิดคำสั่งเตรียม
    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

// ปิดการเชื่อมต่อ
$conn->close();
