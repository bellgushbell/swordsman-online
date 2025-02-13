<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/admin/loginadmin.css">
    <link rel="stylesheet" href="../../css/admin/responsive.css">
</head>

<body>
    <div class="login-container">
        <h2>เข้าสู่ระบบ</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="post" action="../../database/admin/process_login.php">
            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">เข้าสู่ระบบ</button>
        </form>
    </div>
</body>

</html>