<?php

require_once __DIR__ . '/../connect_db.php';



// คำสั่ง SQL ดึงค่า count_number จากตาราง count_preregister
$query = "SELECT count_number FROM count_preregister WHERE count_id = 1";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode([
        "count" => isset($row["count_number"]) ? (int)$row["count_number"] : 10000 // ค่าเริ่มต้น 10000 ถ้าไม่มีข้อมูล
    ], JSON_PRETTY_PRINT);
} else {
    echo json_encode([
        "error" => "เกิดข้อผิดพลาด: " . mysqli_error($conn)
    ]);
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
