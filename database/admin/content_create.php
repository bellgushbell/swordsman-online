<?php
require_once __DIR__ . '/../connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); // ตรวจสอบว่าเริ่ม session หรือยัง
    date_default_timezone_set('Asia/Bangkok');

    $admin_id = $_SESSION['id'];
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    $newImageName  = mysqli_real_escape_string($conn, $_POST['rename']);
    $highlight_text  = mysqli_real_escape_string($conn, $_POST['highlight_text']);
    $description =  $_POST['description'];
    $timestamp = date("Y-m-d H:i:s");


    // กำหนดโฟลเดอร์ปลายทาง
    $target_dir = "../../images/news/";
    $file_name = NULL; // ตั้งค่าเริ่มต้น



    // ตรวจสอบว่ามีไฟล์อัปโหลดหรือไม่
    if (!empty($_FILES["upload_title"]["name"])) {
        $file_ext = pathinfo($_FILES["upload_title"]["name"], PATHINFO_EXTENSION); // ดึงนามสกุลไฟล์
        $allowed_ext = ["jpg", "jpeg", "png", "gif"]; // นามสกุลที่อนุญาต

        // ตรวจสอบนามสกุลไฟล์
        if (!in_array(strtolower($file_ext), $allowed_ext)) {
            echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง! อนุญาตเฉพาะ JPG, JPEG, PNG, GIF');</script>";
            exit();
        }

        // สร้างชื่อไฟล์ใหม่
        $file_name =   "swordsman_" . $newImageName . "." . $file_ext;
        $target_file = $target_dir . $file_name;

        // print_r("target_file: " . $target_file);

        // ตรวจสอบว่าไฟล์มีชื่อเดียวกันอยู่แล้วหรือไม่
        if (file_exists($target_file)) {
            echo "<script>alert('ไฟล์นี้มีอยู่แล้ว กรุณาเปลี่ยนชื่อไฟล์');</script>";
            exit();
        }


        if (move_uploaded_file($_FILES["upload_title"]["tmp_name"], $target_file)) {
            // ไฟล์ถูกอัปโหลดสำเร็จ
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์!');</script>";
            exit();
        }
    }

    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt_title = $conn->prepare("INSERT INTO title (type, title, image, created_at, created_by, alt_text,highlight_text) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_title->bind_param("ssssiss", $type, $title, $file_name, $timestamp, $admin_id, $alt_text, $highlight_text);

    if ($stmt_title->execute()) {
        // Get the last inserted id_title
        $id_title = $conn->insert_id;


        // Insert into the description table
        $stmt_description = $conn->prepare("INSERT INTO description (id_title, description, created_at, created_by) VALUES (?, ?, ?, ?)");
        $stmt_description->bind_param("issi", $id_title, $description, $timestamp, $admin_id);

        if ($stmt_description->execute()) {

            // เปลี่ยนไปยังหน้า content_management.php พร้อมส่ง parameter สำเร็จ
            header("Location: ../../page/admin/content_management.php?success=1");
            exit();
        } else {
            echo "Error: " . $stmt_description->error;
        }

        $stmt_description->close();
    } else {
        echo "Error: " . $stmt_title->error;
    }

    $stmt_title->close();
    $conn->close();
}
