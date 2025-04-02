<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

$edit_id = $_GET['edit_id'] ?? null;

if (!$edit_id) {
    die("Error: ID not provided.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    date_default_timezone_set('Asia/Bangkok');

    $id = $_SESSION['edit_id'];
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    if ($type == "News") {
        $category_id = 1;
    }
    if ($type == "Promotions") {
        $category_id = 2;
    }
    if ($type == "Events") {
        $category_id = 3;
    }

    $seo_title  = mysqli_real_escape_string($conn, $_POST['seo_title']);
    $seo_keywords  = mysqli_real_escape_string($conn, $_POST['seo_keywords']);
    $seo_description  = mysqli_real_escape_string($conn, $_POST['seo_description']);

    $header_thumbnail = mysqli_real_escape_string($conn, $_POST['title']);
    $sub_header_thumbnail  = mysqli_real_escape_string($conn, $_POST['highlight_text']);
    $description = $_POST['description'];
    $updated_by =  $_SESSION['id'];
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    $newImageName  = mysqli_real_escape_string($conn, $_POST['rename']);

    $timestamp = date("Y-m-d H:i:s");
    // รับค่า old_image ที่ส่งมาจากฟอร์ม
    $old_image = $_POST['old_image'] ?? null;

    $image_title_id = null;
    $seo_canonical_url = null;
    $image_thumbnail_id = null;
    $status = "post";


    // แสดงค่าที่ได้รับจากฟอร์ม
    // echo "<pre>";
    // echo "ID: " . $id . "<br>";
    // echo "Category Name: " . $type . "<br>";
    // echo "Updated By: " . $updated_by . "<br>";
    // echo "Category ID: " . $category_id . "<br>";
    // echo "Header Thumbnail: " . $header_thumbnail . "<br>";

    // echo "Sub Header Thumbnail: " . $sub_header_thumbnail . "<br>";


    // echo "</pre>";
    // กำหนดโฟลเดอร์ปลายทาง
    $target_dir = "../../images/news/";
    $file_name = NULL; // ค่าเริ่มต้น

    $data = json_decode(file_get_contents('php://input'), true);
    $upload_server = isset($_POST['upload-server']) ? $_POST['upload-server'] : '';


    if (!empty($_FILES["upload_title"]["name"])) {
        // ดึงนามสกุลไฟล์
        $file_ext = pathinfo($_FILES["upload_title"]["name"], PATHINFO_EXTENSION);
        $allowed_ext = ["jpg", "jpeg", "png", "gif"];

        // ตรวจสอบประเภทไฟล์
        if (!in_array(strtolower($file_ext), $allowed_ext)) {
            echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง! อนุญาตเฉพาะ JPG, JPEG, PNG, GIF');</script>";
            exit();
        }

        // ตั้งชื่อไฟล์ใหม่
        $file_name = "swordsman_" . $newImageName . "." . $file_ext;
        $target_file = $target_dir . $file_name;


        // อัปโหลดไฟล์ใหม่
        if (!move_uploaded_file($_FILES["upload_title"]["tmp_name"], $target_file)) {
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์!');</script>";
            exit();
        }
    } else {
        // ตรวจสอบว่าชื่อไฟล์ใหม่แตกต่างจากไฟล์เก่าหรือไม่
        if ($file_name != $old_image) {

            // ลบไฟล์เก่าถ้ามี
            $old_file_path = $target_dir . $old_image;
            $file_info = pathinfo($old_file_path);
            // ดึงส่วนของนามสกุล
            $file_extension = $file_info['extension'];
            $new_file_path = $target_dir . "swordsman_" . $newImageName . "." . $file_extension;

            if (file_exists($old_file_path)) {
                rename($old_file_path, $target_dir . "swordsman_" . $newImageName . "." . $file_extension);
            }
            $file_name = "swordsman_" . $newImageName . "." . $file_extension;
        } else {
            $file_name = $upload_server;
        }
    }

    // // ตอนนี้ไฟล์ใหม่ถูกอัปโหลดไปยัง $target_file


    // ตรวจสอบว่ามี edit_id_title ก่อนอัปเดต
    if ($id) {
        // ใช้ Prepared Statement ในการอัปเดต contents
        $stmt_title = $conn->prepare("UPDATE contents SET 
            category_id = ?, 
            image_title_id = ?,
            seo_title = ?,
            seo_description = ?,
            seo_keywords = ?,
            seo_canonical_url = ?,
            updated_by = ?,
            updated_at = ?,
            description = ?,
            header_thumbnail = ?,
            sub_header_thumbnail = ?,
            image_thumbnail_id = ?,
            status = ?,
            image = ?,
            alt_text = ?
            WHERE id = ?");


        $stmt_title->bind_param(
            "iissssissssisssi",  // Adjusted types for each field
            $category_id,           // Int
            $image_title_id,       // Int
            $seo_title,            // String
            $seo_description,      // String
            $seo_keywords,         // String
            $seo_canonical_url,    // String
            $updated_by,           // Int
            $timestamp,
            $description,          // String
            $header_thumbnail,     // String
            $sub_header_thumbnail, // String
            $image_thumbnail_id,   // Int
            $status,               // Int
            $file_name,            // String
            $alt_text,             // String
            $id                    // Int
        );

        if ($stmt_title->execute()) {

            header("Location: ../../page/admin/content_management.php?edit=1");
        } else {
            echo "Error: " . $stmt_title->error;
        }

        $stmt_title->close();
    } else {
        echo "<script>alert('Error: ไม่พบข้อมูล edit_id_title!');</script>";
    }

    $conn->close();
}
