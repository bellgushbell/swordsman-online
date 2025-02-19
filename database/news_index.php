<?php
// รวมไฟล์เชื่อมต่อฐานข้อมูล
include __DIR__ . '/connect_db.php';

// กำหนดคำสั่ง SQL
$query = "SELECT * FROM title order by id desc"; 

// รันคำสั่ง SQL
$result = mysqli_query($conn, $query);

// ตรวจสอบว่าคำสั่ง SQL สำเร็จหรือไม่
if ($result) {
    // ดึงข้อมูลทั้งหมดในรูปแบบอาร์เรย์
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // แสดงผลข้อมูลทั้งหมดArray
    // echo '<pre>';
    // print_r($rows);
    // echo '</pre>';

    // แสดงผลข้อมูลทั้งหมดในรูปแบบ JSON
    // echo '<pre>';
    echo json_encode($rows, JSON_PRETTY_PRINT);
    // echo '</pre>';
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
