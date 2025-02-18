<?php

require __DIR__ . '/connect_db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

// Check if username already exists
$query = "SELECT * FROM admin_user WHERE username = '$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Username นี้มีอยู่ในระบบแล้ว',
                    showConfirmButton: false,
                    timer: 1500,
                    target: 'body'
                }).then(function() {
                    window.location.href = '../page/admin/add_user.php';
                });
            });
        </script>";
} else {


    $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin_user (username, password, first_name, last_name, created_at, roles) VALUES ('$username', '$new_hashed_password', '$first_name', '$last_name', NOW(), '0')";
    if ($conn->query($query) === TRUE) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'เพิ่มผู้ใช้เรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500,
                        target: 'body'
                    }).then(function() {
                        window.location.href = '../page/admin/add_user.php';
                    });
                });
            </script>";
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาดในการเพิ่มผู้ใช้',
                        showConfirmButton: false,
                        timer: 1500,
                        target: 'body'
                    }).then(function() {
                        window.location.href = '../page/admin/add_user.php';
                    });
                });
            </script>";
    }
    // if ($conn->query($query) === TRUE) {
    //     echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    //     echo "<script>
    //             document.addEventListener('DOMContentLoaded', function() {
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'เพิ่มผู้ใช้เรียบร้อย',
    //                     showConfirmButton: false,
    //                     timer: 1500,
    //                     target: 'body'
    //                 }).then(function() {
    //                     window.location.href = '../page/admin/add_user.php';
    //                 });
    //             });
    //         </script>";
    // } else {
    //     echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    //     echo "<script>
    //             document.addEventListener('DOMContentLoaded', function() {
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'เกิดข้อผิดพลาดในการเพิ่มผู้ใช้',
    //                     showConfirmButton: false,
    //                     timer: 1500,
    //                     target: 'body'
    //                 }).then(function() {
    //                     window.location.href = '../page/admin/add_user.php';
    //                 });
    //             });
    //         </script>";
    // }
}
?>