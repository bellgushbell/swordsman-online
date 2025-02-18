<?php
require_once __DIR__ . '/../connect_db.php';  // Include the database connection

// อ่านข้อมูลที่ส่งมาจาก frontend
$data = json_decode(file_get_contents('php://input'), true);

// ตรวจสอบว่ามีการส่ง id มาหรือไม่
if (isset($data['id'])) {
    $id = $data['id'];
    $image = isset($data['image']) ? $data['image'] : ''; // รับค่า image (อาจจะเป็นค่าว่างถ้าไม่มีรูป)

    // 1. ลบข้อมูลจากตาราง title
    $delete_sql = "DELETE FROM title WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    if ($delete_stmt === false) {
        echo json_encode(["success" => false, "message" => "Failed to prepare statement for deleting title data"]);
        exit;
    }
    $delete_stmt->bind_param("i", $id);

    if ($delete_stmt->execute()) {
        // 2. ลบรูปภาพจากฟิลด์ image ในตาราง title ถ้ามี
        if (!empty($image)) {
            $target_dir = "../../images/news/";
            $file_path = $target_dir . $image;

            // ตรวจสอบว่าไฟล์มีอยู่ในระบบหรือไม่
            if (file_exists($file_path)) {
                unlink($file_path); // ลบไฟล์
            }
        }

        // 3. ลบไฟล์รูปภาพที่อยู่ใน description ถ้ามี
        $get_description_sql = "SELECT description FROM description WHERE id_title = ?";
        $get_description_stmt = $conn->prepare($get_description_sql);
        if ($get_description_stmt === false) {
            echo json_encode(["success" => false, "message" => "Failed to prepare statement for selecting description data"]);
            exit;
        }
        $get_description_stmt->bind_param("i", $id);
        $get_description_stmt->execute();
        $get_description_result = $get_description_stmt->get_result();

        while ($row = $get_description_result->fetch_assoc()) {
            if (!empty($row['description'])) {
                $decoded_description = htmlspecialchars_decode($row['description']); // ถอดรหัส HTML entities
                $decoded_description = stripslashes($decoded_description); // ลบ backslash ที่เกินมา

                // ใช้ DOMDocument
                $dom = new DOMDocument();
                libxml_use_internal_errors(true); // ป้องกัน Warning
                $dom->loadHTML($decoded_description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                libxml_clear_errors();

                // ดึง <img> ทั้งหมด
                $images = $dom->getElementsByTagName('img');

                if ($images->length > 0) {
                    // ลูปเพื่อดึงทุกๆ รูปภาพ
                    foreach ($images as $image) {
                        if ($image instanceof DOMElement) {
                            $image_path = $image->getAttribute('src'); // ดึงค่า src ของรูป
                            if (file_exists($image_path)) {
                                unlink($image_path); // ลบไฟล์
                            }
                        }
                    }
                }
            }
        }

        // 4. ลบข้อมูลจากตาราง description โดยใช้ id_title
        $delete_description_sql = "DELETE FROM description WHERE id_title = ?";
        $delete_description_stmt = $conn->prepare($delete_description_sql);
        if ($delete_description_stmt === false) {
            echo json_encode(["success" => false, "message" => "Failed to prepare statement for deleting description data"]);
            exit;
        }
        $delete_description_stmt->bind_param("i", $id);

        if ($delete_description_stmt->execute()) {
            // ส่ง JSON กลับไปเมื่อการลบเสร็จสมบูรณ์
            header('Content-Type: application/json');
            echo json_encode(["success" => true, "message" => "ลบสำเร็จ"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error deleting description data"]);
        }

        $delete_description_stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Error deleting title data"]);
    }

    $delete_stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "ID not provided"]);
}

$conn->close();
