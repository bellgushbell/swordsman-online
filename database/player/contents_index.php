<?php
require_once __DIR__ . '/../connect_db.php';


$query = "SELECT * FROM title  order by id desc";
$result = mysqli_query($conn, $query);

if ($result) {
    // ดึงข้อมูลทั้งหมดในรูปแบบอาร์เรย์
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // แสดงผลข้อมูลทั้งหมดในรูปแบบ JSON
    echo json_encode($rows, JSON_PRETTY_PRINT);
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);
