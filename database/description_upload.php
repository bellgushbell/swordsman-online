<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageData = json_decode(file_get_contents('php://input'), true)['image_data'];

    // แยกส่วน header ออกเพื่อตรวจสอบประเภทของรูปภาพ
    list($type, $imageData) = explode(';', $imageData);
    list(, $imageData) = explode(',', $imageData);
    $imageData = base64_decode($imageData);

    // ตรวจสอบประเภทของรูปภาพ
    $imageType = explode('/', $type)[1];

    // สร้างชื่อไฟล์ใหม่
    $fileName = uniqid() . '.' . $imageType;

    // บันทึกรูปภาพลงในเซิร์ฟเวอร์
    $uploadDir = '../images/news/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $filePath = $uploadDir . $fileName;
    file_put_contents($filePath, $imageData);

    // ส่งกลับ URL ของรูปภาพที่อัพโหลด
    echo json_encode(['image_url' =>  $filePath]);
    exit;
}
?>