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
$roles = isset($_SESSION['roles']) ? $_SESSION['roles'] : null;
unset($_SESSION['edit_data']);
?>
<!-- ContentManagementLog.php -->

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ContentManagement</title>

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
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-1 p-3 rounded shadow-sm"
                    style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
                    <div class="gap-2">
                        <a href="javascript:void(0);" class="btn btn-outline-info" onclick="loadData('ทั้งหมด')">ALL</a>
                        <a href="javascript:void(0);" class="btn btn-outline-info" onclick="loadData('ข่าว')">News</a>
                        <a href="javascript:void(0);" class="btn btn-outline-info" onclick="loadData('โปรโมชั่น')">Promotions</a>
                        <a href="javascript:void(0);" class="btn btn-outline-info" onclick="loadData('กิจกรรม')">Events</a>
                    </div>
                    <div class="d-flex gap-2">



                        <a href="../../page/admin/content_admin.php" class="btn btn-outline-success"> + Add New Post</a>
                        <button class="btn btn-outline-secondary" onclick="window.location.href='select_item.php'">Back</button>
                    </div>
                </div>

                <div class="table-container">
                    <h2 id="categoryTitle">ALL</h2> <!-- เริ่มต้นด้วย "ALL" -->
                    <table id="dataTable" class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Image</th>
                                <th>Category</th>
                                <th>Headline</th>
                                <th>Create/Edit date</th>
                                <th>Author</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ข้อมูลจะถูกแทรกที่นี่ -->
                        </tbody>
                    </table>
                    <div id="pagination" class="d-flex justify-content-end  ">
                        <!-- ปุ่ม Pagination จะแสดงที่นี่ -->
                    </div>
                </div>



            </div>
        </main>
    </div>

    <!-- Modal สำหรับแสดงรูป -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">ดูรูปภาพ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- ภาพที่จะแสดงใน Modal -->
                    <img id="modalImage" src="" class="img-fluid" alt="รูปที่เลือก" />
                </div>
            </div>
        </div>
    </div>

    <?php include('footer_content_management.php'); ?>