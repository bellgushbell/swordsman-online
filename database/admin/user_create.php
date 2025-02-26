<?php

require __DIR__ . '/../connect_db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

// Check if username already exists
$query = "SELECT * FROM admin_user WHERE username = '$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Set session variable for alert
    session_start();
    $_SESSION['alert'] = [
        'type' => 'warning',
        'message' => 'Username นี้มีอยู่ในระบบแล้ว'
    ];
    header("Location: ../../page/admin/select_item.php");
    exit();
} else {

    $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin_user (username, password, first_name, last_name, created_at, roles) VALUES ('$username', '$new_hashed_password', '$first_name', '$last_name', NOW(), '0')";
    if ($conn->query($query) === TRUE) {
        session_start();
        $_SESSION['alert'] = [
            'type' => 'success',
            'message' => 'เพิ่มผู้ใช้เรียบร้อย'
        ];
        header("Location: ../../page/admin/select_item.php");
        exit();
    } else {
        session_start();
        $_SESSION['alert'] = [
            'type' => 'error',
            'message' => 'เกิดข้อผิดพลาดในการเพิ่มผู้ใช้'
        ];
        header("Location: ../../page/admin/select_item.php");
        exit();
    }
}
