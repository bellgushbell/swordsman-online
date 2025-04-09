<?php
session_start();
require __DIR__ . '/../connect_db.php';

// ให้ใช้ URL ของ frontend ที่เรียกจาก React
header("Access-Control-Allow-Origin: http://localhost:5173"); // URL ของ React frontend
header("Access-Control-Allow-Credentials: true"); // ใช้ cookies / session
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(['error' => 'Invalid request method.']);
    exit;
}

// รับ JSON จาก body
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// รับค่าจาก JSON
$username = trim($data['username'] ?? '');
$password = trim($data['password'] ?? '');

if (empty($username) || empty($password)) {
    echo json_encode(['error' => 'Username or password is missing']);
    exit;
}

// ค้นหาผู้ใช้ในฐานข้อมูล
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    if (password_verify($password, $user['password'])) {
        // สร้าง session
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logged_in'] = true;

        // ส่งข้อมูลกลับไปให้ frontend
        echo json_encode([
            'status' => 'success',
            'data' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],

            ]
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'User not found']);
}
$stmt->close();
$conn->close();

// ไว้เช็ค password_verify
// $new_hashed_password = password_hash("123456", PASSWORD_DEFAULT);

// echo "ผลลัพธ์ของ password_verify(): " . (password_verify($password, $user['password']) ? "ผ่าน" : "ไม่ผ่าน") . "<br>" . $new_hashed_password;