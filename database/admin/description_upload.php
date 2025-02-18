<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับ JSON และถอดรหัส
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if (!$data || !isset($data['image_data'])) {
        echo json_encode(['error' => 'No image data received']);
        http_response_code(400);
        exit;
    }

    $imageData = $data['image_data'];

    // ตรวจสอบว่าเป็น Base64 ถูกต้อง
    if (!preg_match('/^data:image\/(png|jpeg|jpg|gif);base64,/', $imageData, $matches)) {
        echo json_encode(['error' => 'Invalid image format']);
        http_response_code(400);
        exit;
    }

    // ดึงประเภทไฟล์
    $imageType = $matches[1];
    $imageData = substr($imageData, strpos($imageData, ',') + 1);
    $imageData = base64_decode($imageData);

    if ($imageData === false) {
        echo json_encode(['error' => 'Base64 decoding failed']);
        http_response_code(400);
        exit;
    }

    // เปลี่ยนประเภทจาก jpeg เป็น jpg
    if ($imageType === 'jpeg') {
        $imageType = 'jpg';
    }

    // สร้างชื่อไฟล์ใหม่
    $fileName = uniqid() . '.' . $imageType;
    $uploadDir = '../../images/news/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filePath = $uploadDir . $fileName;

    // บันทึกไฟล์
    if (file_put_contents($filePath, $imageData) === false) {
        echo json_encode(['error' => 'Failed to save image']);
        http_response_code(500);
        exit;
    }

    // ตรวจสอบประเภทไฟล์หลังอัปโหลด
    $mimeType = mime_content_type($filePath);
    $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

    if (!in_array($mimeType, $allowedTypes)) {
        unlink($filePath); // ลบไฟล์ถ้าเป็นประเภทต้องห้าม
        echo json_encode(['error' => 'Invalid file type']);
        http_response_code(400);
        exit;
    }

    // ส่ง URL กลับไปให้ client
    echo json_encode(['image_url' => $filePath]);
    exit;
}
