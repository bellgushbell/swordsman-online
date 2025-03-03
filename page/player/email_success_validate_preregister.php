<?php
require '../../database/connection.php';

$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($token) {
    $stmt = $conn->prepare("SELECT email FROM users WHERE verify_token = ? AND is_verified = 0");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // อัปเดตสถานะเป็น "ยืนยันแล้ว"
        $updateStmt = $conn->prepare("UPDATE users SET is_verified = 1 WHERE email = ?");
        $updateStmt->bind_param("s", $email);
        $updateStmt->execute();

        $message = "✅ ยืนยันอีเมลสำเร็จ!";
        $status = "success";
    } else {
        $message = "❌ Token ไม่ถูกต้อง หรือบัญชีได้รับการยืนยันแล้ว";
        $status = "error";
    }
} else {
    $message = "❌ ไม่มี token สำหรับยืนยัน!";
    $status = "error";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันอีเมล</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
    // ใช้ localStorage เพื่อติ๊ก checkbox ที่หน้า `preregister-reward.php`
    if ("<?php echo $status; ?>" === "success") {
        localStorage.setItem('step3-checkbox', true);
    }

    // แสดง SweetAlert
    Swal.fire({
        title: "<?php echo $message; ?>",
        icon: "<?php echo $status === 'success' ? 'success' : 'error'; ?>",
        showConfirmButton: true
    }).then(() => {
        // ส่งกลับไปหน้าหลัก
        window.location.href = "https://dev.stationidea.com/page/player/preregister-reward.php";
    });
</script>

</body>
</html>
