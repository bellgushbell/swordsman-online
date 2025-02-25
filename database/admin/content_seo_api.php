<?php
require_once __DIR__ . '/../connect_db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: login.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['seo-id']) ? intval($_POST['seo-id']) : 0; // ดึง id จาก GET ถ้ามี
    $update_by  = $_SESSION['id'];
    $updated_at  = date("Y-m-d H:i:s");
    // รับค่าจากฟอร์ม
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $keywords = isset($_POST['keywords-hidden']) ? trim($_POST['keywords-hidden']) : '';

    if ($title && $description && $keywords) {
        // ทำการประมวลผลข้อมูล เช่น บันทึกลงในฐานข้อมูล
        if ($id > 0) {
            // ถ้ามี id ส่งมา → ทำการ UPDATE
            $update_sql = "UPDATE seo_web SET title=?, description=?, keywords=?, updated_at=?, update_by=? WHERE id=?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("sssssi", $title, $description, $keywords, $updated_at, $update_by, $id);
        } else {
            // ถ้าไม่มี id → ทำการ INSERT
            $insert_sql = "INSERT INTO seo_web (title, description, keywords, updated_at, update_by) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("sssss", $title, $description, $keywords, $updated_at, $update_by);
        }

        if ($stmt->execute()) {
            header("Location: ../../page/admin/content_seo.php?success=1");
            exit();
        } else {
            echo "เกิดข้อผิดพลาด: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "กรุณากรอกข้อมูลให้ครบถ้วน.";
    }
}
