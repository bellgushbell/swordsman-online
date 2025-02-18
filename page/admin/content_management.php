<?php
// ตรวจสอบว่า session เริ่มทำงานแล้วหรือยัง
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // ถ้าไม่ได้ล็อกอิน ให้เปลี่ยนเส้นทางไปหน้าล็อกอิน
        header('Location: login.php');
        exit();
    }
}

?>
<!-- ContentManagementLog.php -->
<!-- header.php -->
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Google Fonts: IBM Plex Sans Thai -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons & Tooltip -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link rel="stylesheet" href="../../css/admin/responsive.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>

    <div class="wrapper">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <!-- Main Content -->
        <main class="content">
            <?php include('main_content.php'); ?>
        </main>
    </div>

    <?php include('footer_content.php'); ?>