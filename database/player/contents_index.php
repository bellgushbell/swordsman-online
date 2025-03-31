<?php
require_once __DIR__ . '/../connect_db.php';


// $query = "SELECT * FROM contents  order by id desc";
$query = "
    SELECT contents.*, 
           category.category_name_en AS category_name
    FROM contents
    LEFT JOIN category ON contents.category_id = category.id
    WHERE contents.status = 'post'
    AND contents.deleted_at IS NULL
    ORDER BY contents.id DESC
";
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
