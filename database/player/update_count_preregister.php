<?php

require_once __DIR__ . '/../connect_db.php';


if (isset($_POST['count'])) {
    
    $count = intval($_POST['count']); 
    var_dump($count);
   
    $query = "UPDATE count_preregister SET count_number = $count WHERE count_id = 1";
    if (mysqli_query($conn, $query)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "เกิดข้อผิดพลาด: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["error" => "ไม่มีค่าที่ถูกส่งมา"]);
}


mysqli_close($conn);
?>
