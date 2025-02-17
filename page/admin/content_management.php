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
<?php include('header.php'); ?>

<div class="wrapper">
    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- Main Content -->
    <main class="content">
        <?php include('main_content.php'); ?>
    </main>
</div>

<?php include('footer.php'); ?>