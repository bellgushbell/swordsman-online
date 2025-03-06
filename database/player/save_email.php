<?php

require_once __DIR__ . '/../connect_db.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // ตรวจสอบว่าอีเมลไม่ว่าง
    if (!empty($email)) {
        // 🔍 ตรวจสอบว่าอีเมลมีอยู่แล้วหรือไม่
        $checkQuery = "SELECT COUNT(*) AS count FROM preregister_email WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);
        $row = mysqli_fetch_assoc($checkResult);

        if ($row['count'] > 0) {
            // ⚠ ถ้าอีเมลมีอยู่แล้ว
            $response['success'] = false;
            $response['message'] = "อีเมลนี้ถูกใช้แล้ว!";
        } else {
            // ✅ ถ้ายังไม่มี ให้บันทึกลงฐานข้อมูล
            $query = "INSERT INTO preregister_email (email) VALUES ('$email')";
            if (mysqli_query($conn, $query)) {
                $response['success'] = true;
                $response['message'] = "อีเมลถูกบันทึกแล้ว!";
            } else {
                $response['success'] = false;
                $response['message'] = "เกิดข้อผิดพลาด: " . mysqli_error($conn);
            }
        }
    } else {
        $response['success'] = false;
        $response['message'] = "กรุณากรอกอีเมล!";
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);

// ส่งข้อมูลเป็น JSON
echo json_encode($response);
?>
