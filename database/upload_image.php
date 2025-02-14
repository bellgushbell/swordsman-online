<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['upload_title']) && $_FILES['upload_title']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../images/news/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . basename($_FILES['upload_title']['name']);

        // ตรวจสอบชื่อไฟล์
        if (preg_match('/^[a-zA-Z0-9._-]+$/', $_FILES['upload_title']['name']) === 0) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid file name.']);
            exit;
        }

        if (move_uploaded_file($_FILES['upload_title']['tmp_name'], $uploadFile)) {
            echo json_encode(['filePath' => '../'.$uploadFile]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to move uploaded file.']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'No file uploaded or upload error.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method.']);
}
?>