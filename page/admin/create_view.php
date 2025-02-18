<?php
session_start();

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

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Admin </title>
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons & Tooltip -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link rel="stylesheet" href="../../css/admin/responsive.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include Quill stylesheet -->
    <link
        href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css"
        rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <?php include('navbar.php'); ?>
        <div class="d-flex justify-content-between align-items-center mb-1 p-3 rounded shadow-sm"
            style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
            <h3>Create New Entry</h3>
            <button class="btn btn-secondary" onclick="window.location.href='content_management.php'">Cancel</button>
        </div>
        <!-- Main Content -->


        <div class="content" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">

            <div class="card-body">
                <form action="../../database/admin/save_content.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <!-- Left side: Type and Title -->
                        <div class="col-md-6">
                            <div class="form-group d-flex align-items-center pt-5">
                                <label for="role" class="me-3">Type:</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="ข่าว">ข่าว</option>
                                    <option value="กิจกรรม">กิจกรรม</option>
                                    <option value="โปรโมชั่น">โปรโมชั่น</option>
                                </select>
                            </div>
                            <div class="form-group d-flex align-items-center mt-3">
                                <label for="name" class="me-3">Subject:</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="" required>
                            </div>
                            <!-- ช่องเลือกไฟล์ -->
                            <div class="form-group d-flex align-items-center mt-3">
                                <input type="file" class="form-control" id="upload" name="upload_title">
                            </div>
                        </div>
                        <!-- Upload File Section -->
                        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center text-center">
                            <!-- รูปภาพแสดงตัวอย่าง และกรอบ (แสดงอยู่เหนือช่อง Upload) -->
                            <div class="mt-3" style="text-align: center; position: relative; width: 220px; margin: auto;">
                                <!-- กรอบภาพที่มีขนาดคงที่ (200x200) และแสดงภาพเมื่อเลือก -->
                                <div style="position: relative; display: inline-block;">
                                    <img id="preview" class="img-fluid"
                                        style="max-width: 280px; max-height: 220px; width: 280px; height: 220px; 
                border: 2px dashed #ccc; padding: 10px; background-color: #f8f9fa;">

                                    <!-- ข้อความแสดงว่า "ยังไม่ได้เลือกรูป" -->
                                    <span id="preview-text"
                                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                color: #aaa; font-size: 14px; pointer-events: none;">ยังไม่ได้เลือกรูป</span>
                                </div>

                                <br>
                                <button type="button" id="removeImage" class="btn btn-danger" style="display: none;">ลบรูปภาพ</button>
                            </div>

                        </div>
                        <!-- Description Section (Below both Type and Title, Upload File) -->
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <div id="description-editor" class="form-control" style="height: 280px;"></div>
                            <input type="hidden" id="description" name="description">
                        </div>

                        <!-- Action Buttons -->
                        <div class="form-actions d-flex justify-content-end">
                            <!-- <button type="button" class="btn btn-secondary" onclick="window.location.href = document.referrer">Cancel</button> -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <?php include('footer_create_view.php'); ?>