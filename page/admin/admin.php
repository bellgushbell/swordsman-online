<?php
// include '../../database/config.php'; // เชื่อมต่อฐานข้อมูล
// include '../../database/process.php';   // ดึงฟังก์ชันที่สร้างไว้

// // ดึง username จากตาราง admin_user (id = 0)
// $table = "admin_user";
// $where = "id = 0";
// $userData = getData($conn, $table, $where);

// // ตรวจสอบว่ามีข้อมูลหรือไม่
// $username = $userData[0]['username'] ?? 'ผู้ดูแลระบบ';
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link rel="stylesheet" href="../../css/admin/responsive.css">

</head>

<body>

    <div class="wrapper">

        <!-- Main Content -->
        <main class="content">
            <div class="d-flex justify-content-end mb-3">
                <div class="card p-3 shadow-sm w-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <img src="../../images/Logo SwordMan3-Final-white-transparent.png" alt="Overlay Text"
                            class="img-fluid w-25 w-md-50">

                        <!-- <span class="text-end flex-grow-1">ยินดีต้อนรับ, <?= $username ?>ผู้ดูแลระบบ</span> -->
                    </div>
                </div>
            </div>



            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h2 class="mb-0">รายการข่าวสาร</h2>
                    <a href="../admin/create_view.php" class="btn btn-primary">สร้าง</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <th>ประเภท </th>
                        <th>หัวข้อข่าว</th>
                        <th>รูปภาพ</th>
                        <th>วันที่สร้าง</th>
                        <th>ผู้สร้าง</th>
                        <th>จัดการ</th>

                    </thead>
                    <tbody>
                        <tr>
                            <td>ข่าว</td>
                            <td>ตัวอย่างข่าว</td>
                            <td><img src="image.jpg" class="news-thumbnail" alt="รูปข่าว"></td>
                            <td>2024-02-11</td>
                            <td>Admin</td>
                            <td>
                                <button class="btn btn-warning btn-sm">แก้ไข</button>
                                <button class="btn btn-danger btn-sm">ลบ</button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>