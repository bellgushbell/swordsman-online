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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select content</title>

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
    <style>
        .form-container {
            padding: 0 20px;
            /* เพิ่ม padding ซ้ายขวา */
            width: 100%;
            /* กำหนดความกว้างเต็ม */
            max-width: 400px;
            /* กำหนดความกว้างสูงสุด */
            /* margin: 0 auto; */
            /* จัดกลางฟอร์ม */
            margin: 60px auto;
        }

        .form-container div {
            margin-bottom: 15px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
        }

        .form-actions button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-actions button:hover {
            background-color: #45a049;
        }
    </style>

</head>

<body>


    <div class="wrapper">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <div class="content" style="background-color: rgba(255, 255, 255, 0.65); backdrop-filter: blur(8px); border-radius: 10px; display: flex; justify-content: center; align-items: center; ">

            <div class="row w-100" style="display: flex; justify-content: center; align-items: stretch;">
                <div class="col-sm-3 mb-3 mb-sm-0">
                    <div class="card" style="height: 100%; background: transparent; border: 1px solid #ccc; cursor: pointer;" onclick="window.location='content_seo.php';">
                        <div class="card-body" style="background: transparent; display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="width: 100%; height: 180px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                                <!-- <img src="../../images/seo-marketing.png" alt="SEO Management" style="width: 100%; height: 100%; object-fit: cover;"> -->
                            </div>
                            <h5 class="card-title text-center ">SEO Management </h5>
                            <p class="card-text text-center">จัดการเกี่ยวกับ SEO สำหรับเว็บไซต์ เพื่อเพิ่มการมองเห็นและการจัดอันดับในเครื่องมือค้นหา</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" style="height: 100%; background: transparent; border: 1px solid #ccc; cursor: pointer;" onclick="window.location='content_management.php';">
                        <div class="card-body" style="background: transparent; display: flex; flex-direction: column; justify-content: space-between;">
                            <div style="width: 100%; height: 180px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                                <!-- <img src="../../images/vecteezy_a-laptop.png" alt="Content Management" style="width: 100%; height: 100%; object-fit: cover;"> -->
                            </div>
                            <h5 class="card-title text-center">Content Management</h5>
                            <p class="card-text text-center">ในส่วนนี้คุณสามารถจัดการเนื้อหาของเว็บไซต์ เช่น ข้อความ รูปภาพ และสื่ออื่นๆ</p>
                        </div>
                    </div>
                </div>
                <?php if ($_SESSION['roles'] == 1): ?>
                    <div class="col-sm-3">
                        <div class="card" style="height: 100%; background: transparent; border: 1px solid #ccc; cursor: pointer;" onclick="window.location='add_user.php';">
                            <div class="card-body" style="background: transparent; display: flex; flex-direction: column; justify-content: space-between;">
                                <div style="width: 100%; height: 180px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                                    <!-- <img src="../../images/vecteezy_a-laptop.png" alt="Content Management" style="width: 100%; height: 100%; object-fit: cover;"> -->
                                </div>
                                <h5 class="card-title text-center">Add User</h5>
                                <p class="card-text text-center">ในส่วนนี้คุณสามารถจัดการผู้ใช้งานในระบบ</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        </div>


    </div>

    </div>

</body>

</html>