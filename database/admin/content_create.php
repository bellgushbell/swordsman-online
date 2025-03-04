<?php
require_once __DIR__ . '/../connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); // ตรวจสอบว่าเริ่ม session หรือยัง
    date_default_timezone_set('Asia/Bangkok');

    $admin_id = $_SESSION['id'];
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $highlight_text  = mysqli_real_escape_string($conn, $_POST['highlight_text']);

    $newImageName  = mysqli_real_escape_string($conn, $_POST['rename']);
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);

    $seo_title  = mysqli_real_escape_string($conn, $_POST['seo_title']);
    $seo_keywords  = mysqli_real_escape_string($conn, $_POST['seo_keywords']);
    $seo_description  = mysqli_real_escape_string($conn, $_POST['seo_description']);

    $description =  $_POST['description'];
    $timestamp = date("Y-m-d H:i:s");

    $target_dir = "../../images/news/";
    $file_name = NULL; // ตั้งค่าเริ่มต้น

    $data = json_decode(file_get_contents('php://input'), true);
    $upload_server = isset($_POST['upload-server']) ? $_POST['upload-server'] : '';


    // // ตรวจสอบว่ามีไฟล์อัปโหลดหรือไม่
    if (!empty($_FILES["upload_title"]["name"])) {


        $file_ext = pathinfo($_FILES["upload_title"]["name"], PATHINFO_EXTENSION); // ดึงนามสกุลไฟล์
        if (strtolower($file_ext) == 'webp') {
            // ถ้าเป็น .webp ให้เปลี่ยนชื่อไฟล์เป็น .jpg
            $file_ext = 'jpg';
        }

        $allowed_ext = ["jpg", "jpeg", "png", "gif",]; // นามสกุลที่อนุญาต
        // ตรวจสอบนามสกุลไฟล์
        if (!in_array(strtolower($file_ext), $allowed_ext)) {
            echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง! อนุญาตเฉพาะ JPG, JPEG, PNG, GIF');</script>";
            exit();
        }

        // สร้างชื่อไฟล์ใหม่
        $file_name =   "swordsman_" . $newImageName . "." . $file_ext;
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["upload_title"]["tmp_name"], $target_file)) {
            // ไฟล์ถูกอัปโหลดสำเร็จ
        }
    } else {
        $file_name =  $upload_server;
    }


    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt_title = $conn->prepare("INSERT INTO title (type, title, image, created_at, created_by, alt_text,highlight_text,seo_title,seo_keywords,seo_description) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)");
    $stmt_title->bind_param("ssssisssss", $type, $title, $file_name, $timestamp, $admin_id, $alt_text, $highlight_text, $seo_title, $seo_keywords, $seo_description);




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





    // echo "Admin ID: " . $admin_id . "<br>";
    // echo "Type: " . $type . "<br>";
    // echo "Title: " . $title . "<br>";
    // echo "Alt Text: " . $alt_text . "<br>";
    // echo "Image Name: " . $newImageName . "<br>";
    // echo "Highlight Text: " . $highlight_text . "<br>";
    // echo "SEO Title: " . $seo_title . "<br>";
    // echo "SEO Keywords: " . $seo_keywords . "<br>";
    // echo "SEO Description: " . $seo_description . "<br>";
    // echo "Description: " . $description . "<br>";

    // echo "upload_server: " . $upload_server . "<br>";

    // if (!empty($_FILES["upload_title"]["name"])) {
    //     echo "upload_title: " . $_FILES["upload_title"]["name"] . "<br>";
    // }
