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
    <title>Add New User</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>

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
        <div class="d-flex justify-content-between align-items-center mb-1 p-3 rounded shadow-sm"
            style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
            <h3>Add New User</h3>
            <button class="btn btn-outline-secondary" onclick="window.location.href='content_management.php'">Cancel</button>
        </div>
        <div class="content" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">

            <div class="card-body ">
                <form action="../../database/admin/user_create.php" method="POST" class="form-container">
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div>
                        <label for="first_name">First name:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>

                    <div>
                        <label for="last_name">Last name:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>

                    <div class="form-actions d-flex justify-content-end">
                        <button type="submit">Add User</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>