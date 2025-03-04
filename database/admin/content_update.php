<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

$edit_id = $_GET['edit_id'] ?? null;

if (!$edit_id) {
    die("Error: ID not provided.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    date_default_timezone_set('Asia/Bangkok');

    $admin_id = $_SESSION['id'];
    $edit_id_title = $_SESSION['edit_id_title'];
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    $newImageName  = mysqli_real_escape_string($conn, $_POST['rename']);
    $highlight_text  = mysqli_real_escape_string($conn, $_POST['highlight_text']);
    $seo_title  = mysqli_real_escape_string($conn, $_POST['seo_title']);
    $seo_keywords  = mysqli_real_escape_string($conn, $_POST['seo_keywords']);
    $seo_description  = mysqli_real_escape_string($conn, $_POST['seo_description']);
    $description = $_POST['description'];
    $timestamp = date("Y-m-d H:i:s");
    // รับค่า old_image ที่ส่งมาจากฟอร์ม
    $old_image = $_POST['old_image'];


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

    // ตอนนี้ไฟล์ใหม่ถูกอัปโหลดไปยัง $target_file


    // ตรวจสอบว่ามี edit_id_title ก่อนอัปเดต
    if ($edit_id_title) {
        // ใช้ Prepared Statement ในการอัปเดต title
        $stmt_title = $conn->prepare("UPDATE title SET type = ?, title = ?, image = ?, updated_at = ?, update_by = ?, alt_text = ?,highlight_text = ?, seo_title = ?, seo_keywords = ?, seo_description = ? WHERE id = ?");
        $stmt_title->bind_param("ssssisssssi", $type, $title, $file_name, $timestamp, $admin_id, $alt_text, $highlight_text, $seo_title, $seo_keywords, $seo_description, $edit_id_title);

        if ($stmt_title->execute()) {
            // อัปเดต description
            $stmt_description = $conn->prepare("UPDATE description SET description = ?, updated_at = ?, update_by = ? WHERE id = ?");
            $stmt_description->bind_param("ssii", $description, $timestamp, $admin_id, $edit_id);

            if ($stmt_description->execute()) {
                header("Location: ../../page/admin/content_management.php?edit=1");
                exit();
            } else {
                echo "Error: " . $stmt_description->error;
            }

            $stmt_description->close();
        } else {
            echo "Error: " . $stmt_title->error;
        }

        $stmt_title->close();
    } else {
        echo "<script>alert('Error: ไม่พบข้อมูล edit_id_title!');</script>";
    }

    $conn->close();
}
