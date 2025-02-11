<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ใช้ flexbox ทำให้ sidebar และ content เต็มหน้าจอ */
        .wrapper {
            display: flex;
            height: 100vh;
            width: 100%;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            background-color: rgb(0, 0, 0);
            color: white;
            width: 250px;
            flex-shrink: 0;
            padding: 20px;
        }

        /* Content */
        .content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            max-width: 1400px;
            /* เพิ่มขอบซ้าย-ขวา */
            margin: 0 auto;
            padding: 20px;
        }

        /* กล่องหลักของเนื้อหา */
        .main-content {
            flex-grow: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        /* Footer */
        footer {
            background-color: rgb(0, 0, 0);
            color: white;
            text-align: center;
            padding: 10px;
        }

        /* Responsive - ซ่อน Sidebar เมื่อจอเล็ก */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <header>
                <img src="../../images/text-video.png" alt="Overlay Text" class="img-fluid">
            </header>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="admin.php" class="nav-link text-white">จัดการข่าวสาร</a></li>
                <li class="nav-item"><a href="promotions.php" class="nav-link text-white">จัดการโปรโมชั่น</a></li>
                <li class="nav-item"><a href="users.php" class="nav-link text-white">ตั้งค่าผู้ใช้งาน</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="content">
            <div class="d-flex justify-content-end mb-3">
                <div class="card p-3 shadow-sm w-100">
                    <span class="d-block text-end">ยินดีต้อนรับ, ผู้ดูแลระบบ</span>
                </div>
            </div>


            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="mb-0">รายการข่าวสาร</h2>
                    <button class="btn btn-primary">สร้าง</button>
                </div>
                <table class="table table-bordered">
                    <thead>

                        <th>หัวข้อข่าว</th>
                        <th>รูปภาพ</th>
                        <th>วันที่สร้าง</th>
                        <th>ผู้สร้าง</th>
                        <th>จัดการ</th>

                    </thead>
                    <tbody>
                        <tr>
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


            <!-- Footer
            <footer class="mt-auto">
                <p>&copy; 2025 ระบบแอดมิน Swordsman Game</p>
            </footer> -->
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>