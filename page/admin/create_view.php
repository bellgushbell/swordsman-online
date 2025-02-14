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

<!-- create.php -->
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons & Tooltip -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link rel="stylesheet" href="../../css/admin/responsive.css">

    <!-- Quill -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/upload_image.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <div class="wrapper">
        <?php include('navbar.php'); ?>
        <div class="d-flex justify-content-end align-items-center mb-1 p-3 rounded shadow-sm"
            style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
            <button class="btn btn-secondary" onclick="window.location.href='index.php'">Back</button>
        </div>
        <!-- Main Content -->
        <main class="content" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
            <div class="card-body">
                <form action="../../database/save_create.php" method="POST">
                    <div class="row mb-3">
                        <!-- Left side: Type and Title -->
                        <div class="col-md-6">
                            <h3>Create New Entry</h3>
                            <div class="form-group d-flex align-items-center pt-5">
                                <label for="role" class="me-3">Type</label>
                                <select class="form-control w-75" id="type" name="type" required>
                                    <option value="ข่าว">ข่าว</option>
                                    <option value="กิจกรรม">กิจกรรม</option>
                                    <option value="โปรโมชั่น">โปรโมชั่น</option>
                                </select>
                            </div>
                            <div class="form-group d-flex align-items-center mt-3">
                                <label for="name" class="me-3">Title</label>
                                <input type="text" class="form-control w-75" id="title" name="title" placeholder="Enter name" required>
                            </div>
                        </div>

                        <!-- Upload File Section -->
                        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center text-center">
                            <!-- รูปภาพแสดงตัวอย่าง และกรอบ (แสดงอยู่เหนือช่อง Upload) -->
                            <div class="mt-3" style="text-align: center;">
                                <!-- กรอบภาพที่มีขนาดคงที่ (200x200) และแสดงภาพเมื่อเลือก -->
                                <img id="preview" class="img-fluid" style="max-width: 200px; max-height: 200px; width: 200px; height: 200px; border: 2px dashed #ccc; padding: 10px; display: block;">
                            </div>

                            <!-- ช่องเลือกไฟล์ -->
                            <div class="form-group d-flex align-items-center mt-3 justify-content-center">
                                <input type="file" class="form-control w-75" id="upload" name="upload_title">
                            </div>

                        </div>
                    </div>

                    <!-- Description Section (Below both Type and Title, Upload File) -->
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <div id="description-editor" class="form-control" style="height: 200px;"></div>
                        <input type="hidden" id="description" name="description">
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-actions d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </main>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Initialize Quill editor
        var quill = new Quill('#description-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['link', 'image'],
                    [{
                        'align': []
                    }],
                    ['clean']
                ]
            }
        });

        // ปรับปรุงฟังก์ชัน uploadImage
        async function uploadImage(imageData) {
            try {
                const response = await fetch('../../database/description_upload.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        image_data: imageData
                    }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error('Error uploading image');
                }

                const data = await response.json();
                return data.image_url;
            } catch (error) {
                console.error('Upload error:', error);
                return ''; // ถ้าเกิด error ให้คืนค่าเป็นค่าว่าง
            }
        }

        // ปรับปรุงการจัดการเมื่อส่งฟอร์ม
        document.querySelector('form').onsubmit = async function(e) {
            e.preventDefault();

            let descriptionContent = quill.root.innerHTML;

            const images = descriptionContent.match(/data:image\/[^;]+;base64[^"]+/g);
            if (images) {
                for (let image of images) {
                    const imageUrl = await uploadImage(image);
                    descriptionContent = descriptionContent.replace(image, imageUrl);
                }
            }

            document.querySelector('#description').value = descriptionContent;
            this.submit();
        };
    </script>



</body>

</html>