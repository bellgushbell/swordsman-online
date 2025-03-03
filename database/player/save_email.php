<?php
// เชื่อมต่อกับฐานข้อมูล
require_once __DIR__ . '/../connect_db.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // ตรวจสอบว่าอีเมลไม่ว่าง
    if (!empty($email)) {
        // คำสั่ง SQL ในการบันทึกอีเมลลงฐานข้อมูล
        $query = "INSERT INTO preregister_email (email) VALUES ('$email')";
        
        // ทำการ query
        if (mysqli_query($conn, $query)) {
            $response['success'] = true;
            $response['message'] = "อีเมลถูกบันทึกแล้ว!";
        } else {
            $response['success'] = false;
            $response['message'] = "เกิดข้อผิดพลาดในการบันทึกอีเมล: " . mysqli_error($conn);
        }
    } else {
        $response['success'] = false;
        $response['message'] = "กรุณากรอกอีเมล!";
    }
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);

// ส่งข้อมูลเป็น JSON
echo json_encode($response);
?>
