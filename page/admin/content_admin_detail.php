<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    // ตรวจสอบการเข้าสู่ระบบ
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: login.php');
        exit();
    }

    // ดึงข้อมูลจาก session ที่ชื่อว่า edit_data ถ้ามี
    if (isset($_SESSION['edit_data'])) {
        $data = $_SESSION['edit_data'];
        // print_r($data);
    }

    // รับค่าจาก URL หากมี edit_id
    if (isset($_GET['edit_id'])) {
        $edit = "Edit Information Detail";
    } else {
        $edit = "Create New Detail";  // ถ้าไม่มี edit_id ก็ให้เป็น NULL
    }


    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $highlight_text = isset($_POST['highlight_text']) ? $_POST['highlight_text'] : '';
    $imageName = isset($_POST['old_image']) ? $_POST['old_image'] : '';
    $rename = isset($_POST['rename']) ? $_POST['rename'] : '';

    $data = json_decode(file_get_contents('php://input'), true);
    $upload_server = isset($_POST['upload-server']) ? $_POST['upload-server'] : '';


    echo "type: " . $type . "<br>";
    echo "title: " . $title . "<br>";
    echo "highlight_text: " . $highlight_text . "<br>";
    echo "imageName: " . $imageName . "<br>";
    echo "upload_server: " . $upload_server . "<br>";
    echo "rename: " . $rename . "<br>";
    // echo $seo_title . "<br>";
    // echo $seo_description . "<br>";
    if (!empty($_FILES["upload_title"]["name"])) {
        echo "upload_title: " . $_FILES["upload_title"]["name"] . "<br>";
    }
}
?>


<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Admin Details </title>
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

    <script src="https://cdn.jsdelivr.net/npm/spark-md5/spark-md5.min.js"></script>


</head>

<body>

    <div class="wrapper">
        <?php include('navbar.php'); ?>
        <main class="content">
            <div class="d-flex justify-content-between align-items-center mb-1 p-3 rounded shadow-sm"
                style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
                <h3>2.<?php echo $edit; ?> </h3>
                <button class="btn btn-outline-secondary" onclick="window.location.href='content_management.php'">Cancel</button>
            </div>
            <!-- Main Content -->


            <div class="content" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">

                <div class="card-body">

                    <form action="../../page/admin/preview_detail.php" method="POST" enctype="multipart/form-data">

                        <div class="row mb-3">
                            <div class="d-flex">


                                <div class="d-flex flex-column align-items-center justify-content-center text-left m-3" style="width: 50%;">
                                    <!-- SEO -->
                                    <div class="form-group d-flex align-items-center mt-3" style="width: 100%; max-width: 500px;">
                                        <label for="name" style="flex: 0 0 20%;">Title (SEO) :</label>
                                        <input type="text" class="form-control" id="seo_title" name="seo_title"
                                            value="<?php echo isset($data['seo_title']) ? $data['seo_title'] : ''; ?>" style="flex: 1;"
                                            data-toggle="tooltip" title="หัวข้อเนื้อหา" required maxlength="60">
                                    </div>

                                    <div class="form-group d-flex align-items-center mt-3" style="width: 100%; max-width: 500px;">
                                        <label for="seo_description" style="flex: 0 0 30%;"> Description (SEO) :</label>
                                        <textarea class="form-control" id="seo_description" name="seo_description" rows="3"
                                            style="resize: none; padding-top: 0; padding-bottom: 0; line-height: 1.4;">
                                        <?php echo isset($data['seo_description']) ? $data['seo_description'] : ''; ?>
                                    </textarea>
                                    </div>

                                    <div class="form-group d-flex align-items-center mt-3" style="width: 100%; max-width: 500px;">
                                        <label for="seo_keywords" style="flex: 0 0 30%;"> keywords (SEO) :</label>
                                        <textarea class="form-control" id="seo_keywords" name="seo_keywords" rows="3"
                                            style="resize: none; padding-top: 0; padding-bottom: 0; line-height: 1.4;">
                                        <?php echo isset($data['seo_keywords']) ? $data['seo_keywords'] : ''; ?>
                                    </textarea>
                                    </div>

                                </div>
                            </div>
                            <hr style="width: calc(100% - 40px); border-top: 2px solid #aaa; margin-top: 30px; margin-bottom: 30px; margin-left: 20px; margin-right: 20px;">
                            <h5 for="content_text"> Content</h5>
                            <div class="form-group mb-3 mt-3">
                                <div id="description-editor" class="form-control" style="height: 280px;">
                                </div>
                                <input type="hidden" id="description" name="description">
                            </div>


                        </div>

                        <!-- Action Buttons -->
                        <div class="form-actions d-flex justify-content-between">
                            <button type="button" class="btn btn-primary">Back</button>
                            <button type="submit" class="btn btn-primary">NEXT</button>
                        </div>

                    </form>
                </div>

            </div>
        </main>

    </div>