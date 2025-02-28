<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ตรวจสอบว่ามีไฟล์ที่ถูกอัปโหลดมาหรือไม่
    if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0) {
        // กำหนดโฟลเดอร์ที่ต้องการเก็บไฟล์
        $targetDir = '../../images/news/';

        // กำหนดชื่อไฟล์ใหม่ที่คุณต้องการตั้ง (สามารถใช้ timestamp หรือชื่ออื่นๆ)
        $newFileName = uniqid('news_image_', true) . '.' . pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);

        // กำหนดที่อยู่ที่จะย้ายไฟล์ไป
        $targetFilePath = $targetDir . $newFileName;

        // ย้ายไฟล์จาก temp ไปยังโฟลเดอร์ที่กำหนด
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath)) {
            // ส่ง URL ของไฟล์กลับให้ CKEditor
            echo json_encode([
                'uploaded' => true,
                'url' => '/images/news/' . $newFileName  // ส่ง URL ที่เข้าถึงไฟล์
            ]);
        } else {
            // ถ้าเกิดข้อผิดพลาดในการอัปโหลด
            echo json_encode([
                'uploaded' => false,
                'error' => ['message' => 'Failed to upload file']
            ]);
        }
    } else {
        // ถ้าไม่มีไฟล์หรือมีข้อผิดพลาด
        echo json_encode([
            'uploaded' => false,
            'error' => ['message' => 'No file uploaded or error in file upload']
        ]);
    }
}
