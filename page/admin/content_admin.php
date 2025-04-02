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
        $edit = "Edit Information";
    } else {
        $edit = "Create New Entry";  // ถ้าไม่มี edit_id ก็ให้เป็น NULL
    }
}
?>


<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Admin </title>
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

    <!-- รวม Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Include Quill stylesheet -->
    <link
        href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/dist/quill-image-resize.min.css">


    <script src="https://cdn.jsdelivr.net/npm/spark-md5/spark-md5.min.js"></script>
    <style>
        @font-face {
            font-family: 'ABC Paobunjin';
            /* ตั้งชื่อฟอนต์ */
            src: url('../../webfonts/ABC-Paobunjin.ttf') format('truetype');
            font-style: normal;
        }

        p {

            font-size: 14px !important;
        }

        .size-small {
            font-size: 12px;
        }

        .size-medium {
            font-size: 16px;
        }

        .size-large {
            font-size: 20px;
        }

        .size-huge {
            font-size: 20px;
        }



        h2 {
            font-family: 'ABC Paobunjin', sans-serif;
            margin-bottom: 0;
            flex-grow: 1;
            text-align: center;
            font-size: 6rem;
            color: rgb(110, 93, 0);
        }

        /* CSS สำหรับกรอบสีน้ำเงิน */
        .selected-image {
            border: 3px solid blue;
            padding: 5px;
        }

        .box-all {
            position: relative;
        }

        .content2 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;

            display: none;
            /* ซ่อนเริ่มต้น */
        }

        /* เมื่อกดปุ่ม จะทำให้ box2 แสดง */
        .show {
            display: block;
        }

        .align-center {
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="wrapper">
        <?php include('navbar.php'); ?>
        <div class="box-all">
            <form action="<?php echo isset($_GET['edit_id']) ? '../../database/admin/content_update.php?edit_id=' . $_GET['edit_id'] : '../../database/admin/content_create.php';
                            ?>" method="POST" enctype="multipart/form-data">

                <main class="content content2" id="box1">
                    <div class="d-flex justify-content-between align-items-center mb-1 p-3 rounded shadow-sm"
                        style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
                        <h3>1.<?php echo $edit; ?> </h3>
                        <button class="btn btn-outline-secondary" onclick="window.location.href='content_management.php'">Cancel</button>
                    </div>
                    <!-- Main Content -->
                    <div class="content" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">

                        <div class="card-body">
                            <!-- <form action="../../page/admin/content_admin_detail.php" method="POST" enctype="multipart/form-data"> -->

                            <div class="row mb-3">

                                <div class="d-flex">


                                    <!-- คอลัมน์ขวา -->
                                    <div class="d-flex flex-column align-items-center justify-content-center text-left m-3" style="width: 50%;">
                                        <div style="font-size: 14px; color: #dc3545; margin-bottom: 8px;">
                                            *แนะนำรูปภาพไม่ควรเกินขนาด 300x200 และรายละเอียดไม่ควรเกิน 2MB
                                        </div>
                                        <!-- รูปภาพแสดงตัวอย่าง -->
                                        <div class="mt-3">


                                            <div style="position: relative; display: flex; align-items: center; justify-content: center;">
                                                <img id="preview" class="img-fluid"
                                                    style="max-width: 300px; max-height: 180px; width: 300px; height: 180px;
                    border: 2px dashed #ccc; padding: 10px; background-color: #f8f9fa;"
                                                    src="<?php echo !empty($imageName) ? '../../images/news/' . $imageName : ''; ?>">
                                                <span id="preview-text"
                                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                    color: #aaa; font-size: 14px; pointer-events: none;
                    <?php echo !empty($imageName) ? 'display: none;' : ''; ?>">
                                                    ยังไม่ได้เลือกรูป
                                                </span>
                                            </div>
                                        </div>

                                        <!-- แสดงชื่อไฟล์ที่เลือก -->
                                        <?php $imageName = isset($data['image']) ? $data['image'] : ''; ?>

                                        <div id="file-name" style="margin-top: 10px; color: #555; display: flex; align-items: center; gap: 2px;">

                                            <input type="text" class="form-control" id="file-name-text"
                                                value="<?php echo !empty($imageName) ? $imageName : 'ยังไม่ได้เลือกไฟล์'; ?>"
                                                style="flex: 1;" readonly>

                                            <!-- ส่งค่า imageName ไปกับฟอร์ม -->
                                            <?php if (!empty($imageName)) : ?>
                                                <input type="hidden" name="old_image" value="<?php echo $imageName; ?>">
                                            <?php endif; ?>

                                            <!-- ปุ่มอัปโหลดไฟล์จากเครื่อง -->
                                            <div class="form-group d-flex align-items-center" id="upload-container"
                                                style="<?php echo !empty($imageName) ? 'display: none;' : ''; ?>">
                                                <button type="button" class="btn btn-primary" id="file-upload-btn"
                                                    style="display: flex; align-items: center; justify-content: center; width: 38px; height: 38px; padding: 0;"
                                                    data-toggle="tooltip" title="อัปโหลดรูปจากเครื่องของคุณ">
                                                    <i class="bi bi-file-earmark-arrow-up"></i>
                                                </button>
                                                <input type="file" class="form-control" id="upload" name="upload_title" style="display: none;">
                                            </div>



                                            <?php
                                            $directory = '../../images/news/';
                                            $images = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE); // ใช้ glob เพื่อหาภาพในโฟลเดอร์
                                            ?>
                                            <div class="form-group d-flex align-items-center" id="upload-container-server" style="<?php echo !empty($imageName) ? 'display: none;' : ''; ?>">
                                                <button type="button" class="btn btn-primary" id="file-upload-btn-server" style="display: flex; align-items: center; justify-content: center; width: 38px; height: 38px; padding: 0;" data-toggle="tooltip" title="เลือกจากรูปภาพที่มีอยู่แล้วในเซิร์ฟเวอร์" data-bs-toggle="modal" data-bs-target="#imageSelectionModal">
                                                    <i class="bi bi-person-rolodex"></i>
                                                </button>
                                                <input type="hidden" class="form-control" id="upload-server" name="upload-server">


                                            </div>

                                            <!-- โมดัล -->
                                            <div id="imageSelectionModal" class="modal fade" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">เลือกไฟล์ภาพ</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php if ($images): ?>
                                                                <div class="row">
                                                                    <?php foreach ($images as $image): ?>
                                                                        <div class="col-4">
                                                                            <img src="<?php echo $image; ?>" alt="Image" class="img-fluid image-thumbnail" style="cursor: pointer;" onclick="selectImage(this, '<?php echo $image; ?>')">
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            <?php else: ?>
                                                                <p>ไม่พบภาพในโฟลเดอร์นี้</p>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                            <button type="button" class="btn btn-primary" id="saveImageButton">บันทึก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ปุ่มลบ -->
                                            <button type="button" id="removeImage" class="btn btn-danger btn-sm"
                                                style="width: 38px; height: 38px; padding: 0; display: <?php echo !empty($imageName) ? 'flex' : 'none'; ?>; 
                    align-items: center; justify-content: center;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- ช่องใส่ชื่อภาพ-->
                                        <div class="form-group d-flex align-items-center mt-3" style="width: 100%; max-width: 500px;">
                                            <label for="rename" style="flex: 0 0 20%;">Rename:</label>
                                            <input type="text" class="form-control" id="rename" name="rename"
                                                style="flex: 1;" data-toggle="tooltip" title="เปลี่ยนชื่อรูปภาพ">
                                        </div>

                                        <!-- ช่องใส่คำอธิบายภาพ -->
                                        <div class="form-group d-flex align-items-center mt-3" style="width: 100%; max-width: 500px;">
                                            <label for="alt_text" style="flex: 0 0 20%;">Alt Text:</label>
                                            <input type="text" class="form-control" id="alt_text" name="alt_text"
                                                value="<?php echo isset($data['alt_text']) ? $data['alt_text'] : ''; ?>"
                                                placeholder="ใส่คำอธิบายรูปภาพ">
                                        </div>

                                    </div>


                                    <!-- คอลัมน์ซ้าย -->
                                    <div class="d-flex flex-column align-items-start justify-content-start text-left m-3" style="width: 50% ; ">
                                        <!-- Type -->
                                        <div class="form-group d-flex align-items-center mt-3" style="width: 100%; max-width: 500px;">
                                            <label for="role" style="flex: 0 0 20%;">Type:</label>
                                            <select class="form-control" id="type" name="type" required style="flex: 1;">
                                                <option value="" disabled <?php echo !isset($_GET['edit_id']) ? 'selected' : ''; ?>>เลือกประเภท</option>

                                                <option value="News" <?php echo isset($data['category_name']) && $data['category_name'] == 'News' ? 'selected' : ''; ?>>ข่าว</option>
                                                <option value="Events" <?php echo isset($data['category_name']) && $data['category_name'] == 'Events' ? 'selected' : ''; ?>>กิจกรรม</option>
                                                <option value="Promotions" <?php echo isset($data['category_name']) && $data['category_name'] == 'Promotions' ? 'selected' : ''; ?>>โปรโมชั่น</option>
                                            </select>
                                        </div>

                                        <!-- Header -->
                                        <div class="form-group d-flex align-items-center mt-3" style="width: 100%; max-width: 500px;">
                                            <label for="name" style="flex: 0 0 20%;">Header :</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="<?php echo isset($data['header_thumbnail']) ? $data['header_thumbnail'] : ''; ?>" style="flex: 1;"
                                                data-toggle="tooltip" title="หัวข้อเนื้อหา" required>

                                        </div>

                                        <!-- Sub Header -->
                                        <div class=" form-group d-flex align-items-center mt-3" style="width: 100%; max-width: 500px;">
                                            <label for="highlight_text" style="flex: 0 0 20%;">Sub Header:</label>
                                            <textarea class="form-control" id="highlight_text" name="highlight_text" rows="5" style="resize: none;" data-toggle="tooltip" title="ส่วนแนะนำก่อนเนื้อหา"> <?php echo isset($data['sub_header_thumbnail']) ? trim($data['sub_header_thumbnail']) : ''; ?></textarea>
                                        </div>


                                    </div>
                                </div>
                                <hr style="width: calc(100% - 40px); border-top: 2px solid #aaa; margin-top: 30px; margin-bottom: 30px; margin-left: 20px; margin-right: 20px;">



                                <h5 for="content_text" class="px-4 "> Preview Content</h5>
                                <div class="px-4">
                                    <div class="news-item" style="cursor: pointer;display: flex; justify-content: flex-start;align-items: flex-start; background-color: #fff;">
                                        <div class="news-header" style="display:flex; justify-content: center; align-items: center;">
                                            <div class="news-item-div-img" style="display: flex; justify-content: center; align-items: center; width: 300px; height: 160px; overflow: hidden; border-radius: 6px !important;">

                                                <img id="preview_2" src="<?php echo !empty($imageName) ? '../../images/news/' . $imageName : ''; ?>" alt="<?php echo isset($data['alt_text']) ? $data['alt_text'] : ''; ?>" style="max-width: 100%; max-height: 100%; object-fit: contain; padding: 10px">
                                            </div>
                                        </div>
                                        <?php
                                        // กำหนดค่าใหม่ให้ตัวแปรใหม่ตามประเภทของข่าว
                                        if (isset($data['category_name'])) {
                                            $newTypeColor = ''; // กำหนดตัวแปรใหม่

                                            if ($data['category_name'] === "News") {
                                                $newTypeColor = "rgb(127,169,209)";
                                            } else if ($data['category_name'] === "Events") {
                                                $newTypeColor = "rgb(153, 127, 209)";
                                            } else if ($data['category_name'] === "Promotions") {
                                                $newTypeColor = "rgb(209, 138, 127)";
                                            } else {
                                                $newTypeColor = "rgba(0, 0, 0, 0.8)";  // สีดำ (black)
                                            }
                                        }

                                        ?>

                                        <div class="type-text-title" style="display: flex; width: 100%; margin-top:20px;">
                                            <div style="display: flex; justify-content: space-between; width: 100%;position: relative;">
                                                <div display: flex; justify-content: flex-start; flex-direction: column;>
                                                    &nbsp;
                                                    <!-- แสดงผลประเภทที่เลือกใน span -->
                                                    <span id="type_2" class="newsall-type-text" style="color: white; display: inline-block; padding: 2px 8px !important; border-radius: 5px;  
                                                background: linear-gradient(135deg, <?php echo $newTypeColor ? $newTypeColor : ''; ?> 0%, <?php echo $newTypeColor ? $newTypeColor : ''; ?> 100%, #fff 100%);
                                                margin-bottom: 5px;">
                                                        <?php echo isset($data['category_name']) ? $data['category_name'] : ""; ?>
                                                    </span>
                                                    &nbsp;
                                                    <label id="title_2" class="text-decoration-none" style="display: block; margin-bottom: 5px; margin-left: 10px;"><?php echo isset($data['header_thumbnail']) ? $data['header_thumbnail'] : ""; ?></label>
                                                    <span class="text-decoration-none" id="highlight_text_2" style="display: block; margin-bottom: 5px; margin-left: 10px; font-size: 12px;"><?php echo isset($data['sub_header_thumbnail']) ? $data['sub_header_thumbnail'] : ""; ?></span>
                                                </div>

                                                <?php
                                                isset($data['created_at']) && $data['created_at'] != null ? $data['created_at'] : $data['created_at'] = "";
                                                $created_at = $data['created_at'];
                                                ?>
                                                <div style="position: absolute; top: 0; right: 5px;">
                                                    <span class="date"><?php echo  $created_at ? date("d-m-Y", strtotime($created_at)) : ""; ?></span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>



                            </div>

                            <div class="form-actions d-flex justify-content-end">
                                <button type="button" onclick="goDetails()" class="btn btn-primary">NEXT Detail</button>
                                <!-- <button type="submit" class="btn btn-primary">NEXT</button> -->
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </main>

                <main class="content content2" id="box2">
                    <div class="d-flex justify-content-between align-items-center mb-1 p-3 rounded shadow-sm"
                        style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
                        <h3>2.<?php echo $edit; ?> </h3>
                        <button class="btn btn-outline-secondary" onclick="window.location.href='content_management.php'">Cancel</button>
                    </div>
                    <!-- Main Content -->


                    <div class="content" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">

                        <div class="card-body">

                            <!-- <form action="../../page/admin/preview_detail.php" method="POST" enctype="multipart/form-data"> -->

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
                                <button type="button" class="btn btn-primary" onclick="goBackhome()">Back </button>
                                <button type="button" class="btn btn-primary" onclick="toggleBoxPreviw()">NEXT Previw </button>


                            </div>


                        </div>

                    </div>
                </main>

                <main class="content2" id="box3">
                    <div style="background-color: rgb(255, 255, 255); border: none; " class="mt-3">
                        <div class=" text-center">
                            <h2 class="mb-1" style="color:rgb(110, 93, 0); font-weight: bold;" id="type_3">
                                <?php echo isset($data['category_name']) ? $data['category_name'] : ""; ?>
                            </h2>
                            <div class="d-flex align-items-center justify-content-center" style="gap: 10px;">
                                <hr style="width: 30%; border-top: 3px solid rgb(110, 93, 0); margin: 0;">
                                <p style="color:rgb(110, 93, 0); font-style: italic; margin: 0;">
                                    <?php
                                    // เช็คว่า $data['created_at'] มีค่าไหม ถ้าไม่มีให้ใช้วันที่ปัจจุบัน
                                    echo isset($data['created_at']) && $data['created_at'] != ''
                                        ? date('d-m-Y', strtotime($data['created_at']))  // แสดงวันที่จาก $data['created_at']
                                        : date('d-m-Y'); // แสดงวันที่ปัจจุบัน
                                    ?>
                                </p>
                                <hr style="width: 30%; border-top: 3px solid rgb(110, 93, 0); margin: 0;">
                            </div>
                        </div>
                        <div class="content ">

                            <div class="col-md-11" style="border: 1px solid rgb(196, 169, 15); backdrop-filter: blur(8px); border-radius: 10px; padding: 20px;margin-left: 50px; margin-right: 20px;position: relative;">
                                <div class="row">
                                    <div class="p-3 text-center">
                                        <h5><?php echo isset($data['header_thumbnail']) ? $data['header_thumbnail'] : ""; ?></h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="p-3" id="descriptionContent1">
                                        <?php
                                        $description = $data['description'] ?? '';
                                        $description = str_replace('ql-', '', $description);
                                        $description = str_replace('background-color: rgb(255, 255, 255);', '', $description);
                                        echo $description;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions d-flex justify-content-between mx-3">
                            <button type="button" class="btn btn-primary my-2" onclick="goBackDetails()">Back </button>
                            <button type="submit" class="btn btn-primary my-2">Save </button>
                        </div>
                    </div>
                </main>

            </form>
        </div>
    </div>




    <?php include('footer_content_admin.php'); ?>