<?php
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = '../../' . $_POST['upload_title'];

    $timestamp = date("Y-m-d H:i:s");

    // Insert into the title table
    $sql_title = "INSERT INTO title (type, title, image, created_at, created_by) VALUES ('$type', '$title', '$image', '$timestamp', '1')";

    if ($conn->query($sql_title) === TRUE) {
        // Get the last inserted id_title
        $id_title = $conn->insert_id;

        // Insert into the description table
        $sql_description = "INSERT INTO description (id_title, description, created_at, created_by) VALUES ('$id_title', '$description', '$timestamp', '1')";

        if ($conn->query($sql_description) === TRUE) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'สร้างข่าวสารสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = '../page/admin/content_management.php';
                });
            </script>";
        } else {
            echo "Error: " . $sql_description . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql_title . "<br>" . $conn->error;
    }

    $conn->close();
}
