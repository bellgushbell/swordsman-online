<?php

if (isset($_GET['image_name'])) {
    $imageName = $_GET['image_name'];  // ชื่อไฟล์ที่ผู้ใช้กรอกในช่อง Rename

    // เช็คว่าไฟล์มีอยู่ในโฟลเดอร์หรือไม่
    $filePath = "../images/news/" .  $imageName;

    if (file_exists($filePath)) {
        echo json_encode(['exists' => true]);  // ถ้ามีไฟล์แล้ว
    } else {
        echo json_encode(['exists' => false]); // ถ้าไม่มีไฟล์
    }
} else {
    echo json_encode(['error' => 'No image name provided']);
}
