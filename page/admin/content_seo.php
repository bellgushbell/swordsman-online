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
    <title> Management SEO</title>
    <!-- Include jQuery & Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
        .form-group {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .form-group label {
            min-width: 150px;
            text-align: right;
            font-weight: 500;
            font-size: 16px;
        }

        .form-group select,
        .form-group input,
        .form-group textarea {
            flex: 1;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-actions {
            text-align: right;
            margin-top: 15px;
        }

        .form-actions button {
            padding: 10px 20px;
            font-size: 16px;
        }

        #keywords {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        #tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            min-height: 40px;
            max-height: 100px;
            overflow-y: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .tag {
            display: inline-block;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 20px;
            cursor: pointer;
        }

        .tag:hover {
            border: 1px solid rgb(173, 35, 0);
        }

        .tag .delete-tag {
            margin-left: 8px;
            font-size: 14px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div class="wrapper">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <div class="d-flex justify-content-between align-items-center mb-1 p-3 rounded shadow-sm"
            style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
            <h3>Search Engine Optimization (SEO)</h3>
            <button class="btn btn-outline-secondary" onclick="window.location.href='select_item.php'">Back</button>
        </div>
        <div class="content" style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 mt-5">

                        <div class="card-body">
                            <?php if (!isset($_GET['edit_id'])): ?>
                                <div class="form-group">
                                    <label for="title">Page:</label>
                                    <select class="form-control" id="page" name="page" required style="flex: 1;" onchange="handlePageChange()">
                                        <option value="" disabled selected>เลือกประเภท</option>
                                        <option value="home">หน้าหลัก</option>
                                        <option value="allContent">หน้าประกาศ</option>
                                        <option value="news">หน้ารายละเอียดของข่าวสาร</option>
                                        <option value="events">หน้ารายละเอียดของกิจกรรม</option>
                                        <option value="promotions">หน้ารายละเอียดของโปรโมชั่น</option>
                                        <option value="images">หน้ารูปภาพ</option>
                                        <option value="videos">หน้าวีดีโอ</option>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <form action="../../database/admin/content_seo_api.php?edit_id=<?php echo isset($data['id']) ? $data['id'] : ''; ?>" method="POST" class="form-container" id="seoForm">
                                <input type="hidden" id="seo-id" name="seo-id" value="">

                                <?php if (isset($_GET['edit_id'])): ?>
                                    <div class="form-group">
                                        <label for="title">Page:</label>
                                        <select class="form-control" id="page" name="page" required style="flex: 1;">
                                            <!-- ตัวเลือกที่เลือกแล้วตามค่าของ $data['page'] -->
                                            <option value="home" <?php echo isset($data['page']) && $data['page'] == 'home' ? 'selected' : ''; ?>>หน้าหลัก</option>
                                            <option value="allContent" <?php echo isset($data['page']) && $data['page'] == 'allContent' ? 'selected' : ''; ?>>หน้าประกาศ</option>
                                            <option value="news" <?php echo isset($data['page']) && $data['page'] == 'news' ? 'selected' : ''; ?>>หน้ารายละเอียดของข่าวสาร</option>
                                            <option value="events" <?php echo isset($data['page']) && $data['page'] == 'events' ? 'selected' : ''; ?>>หน้ารายละเอียดของกิจกรรม</option>
                                            <option value="promotions" <?php echo isset($data['page']) && $data['page'] == 'promotions' ? 'selected' : ''; ?>>หน้ารายละเอียดของโปรโมชั่น</option>
                                            <option value="images" <?php echo isset($data['page']) && $data['page'] == 'images' ? 'selected' : ''; ?>>หน้ารูปภาพ</option>
                                            <option value="videos" <?php echo isset($data['page']) && $data['page'] == 'videos' ? 'selected' : ''; ?>>หน้าวีดีโอ</option>
                                        </select>
                                    </div>
                                <?php endif; ?>

                                <!-- Type Dropdown -->
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <textarea id="title" name="title" rows="1" style="resize: none;"><?php echo isset($_POST['seo_title']) ? $_POST['seo_title'] : ''; ?></textarea>
                                </div>

                                <!-- Description Textarea -->
                                <div class="form-group">
                                    <label for="description">Meta description:</label>
                                    <textarea id="description" name="description" rows="5" style="resize: none;"><?php echo isset($_POST['seo_description']) ? $_POST['seo_description'] : ''; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Keywords:</label>
                                    <input type="text" id="keywords" name="keywords" placeholder="Enter keywords and press Enter" value="<?php echo isset($_POST['seo_keywords']) ? implode(", ", $_POST['seo_keywords']) : ''; ?>">
                                </div>


                                <div class="form-group">
                                    <label for=""></label>
                                    <div id="tags-container"></div>
                                    <input type="hidden" id="keywords-hidden" name="keywords-hidden">
                                </div>

                                <!-- Submit Button -->
                                <div class="form-actions d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-success">Confirm</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // ฟังก์ชันเพิ่มแท็กเมื่อผู้ใช้กด Enter
                document.getElementById("keywords").addEventListener("keydown", function(event) {
                    if (event.key === "Enter" && this.value.trim() !== "") {
                        event.preventDefault(); // ป้องกันการ submit ฟอร์ม
                        let tagValue = this.value.trim();
                        addTag(tagValue);
                        this.value = ""; // เคลียร์ช่อง input หลังจากเพิ่ม tag
                    }
                });


                document.getElementById("seoForm").addEventListener("submit", function(event) {
                    let tags = [];
                    let tagElements = document.querySelectorAll("#tags-container .tag");

                    tagElements.forEach(function(tag) {
                        // ลบ "x" ออกจากแท็ก
                        tags.push(tag.textContent.replace('x', '').trim());
                    });

                    // อัปเดตค่าของ hidden input ด้วยแท็กที่เก็บ (แยกด้วย comma)
                    document.getElementById("keywords-hidden").value = tags.join(',');

                    // ตรวจสอบว่าไม่มีฟิลด์สำคัญว่าง
                    let title = document.getElementById("title").value.trim();
                    let description = document.getElementById("description").value.trim();
                    let keywords = document.getElementById("keywords-hidden").value.trim();

                    if (!title || !description || !keywords) {
                        event.preventDefault();
                        alert("กรุณากรอกข้อมูลให้ครบถ้วน.");
                    }
                });
            </script>

            <script>
                function handlePageChange() {
                    var selectedValue = document.getElementById('page').value;

                    if (selectedValue) {
                        fetchSEOData();
                    }
                }

                function fetchSEOData() {
                    fetch('../../database/admin/content_read_seo.php?page=' + document.getElementById('page').value)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                            } else {
                                // ล้างข้อมูลเก่าก่อนเพิ่มข้อมูลใหม่
                                clearPreviousData();
                                // กรอกข้อมูลที่ได้จาก API ลงในฟอร์ม
                                document.getElementById("title").value = data[0].seo_title || ''; // Access the first object in the array
                                document.getElementById("description").value = data[0].seo_description || '';
                                document.getElementById("seo-id").value = data[0].id || ''; // เพิ่มค่า 'id' สำหรับส่งในฟอร์ม

                                if (data[0].seo_keywords) {
                                    let keywordsArray = data[0].seo_keywords.split(',').map(keyword => keyword.trim());
                                    let tagContainer = document.getElementById("tags-container");

                                    keywordsArray.forEach(keyword => {
                                        addTag(keyword);
                                    });

                                    // อัปเดต hidden input
                                    document.getElementById("keywords-hidden").value = keywordsArray.join(',');
                                }
                            }
                        })
                        .catch(error => console.error("Error fetching data:", error));
                }

                function clearPreviousData() {
                    // ลบแท็กทั้งหมดใน tag container
                    let tagContainer = document.getElementById("tags-container");
                    tagContainer.innerHTML = ''; // ลบแท็กทั้งหมด

                    // ล้างค่าภายใน input fields
                    document.getElementById("title").value = '';
                    document.getElementById("description").value = '';
                    document.getElementById("seo-id").value = '';
                    document.getElementById("keywords-hidden").value = '';
                }

                function addTag(tagValue) {
                    let tagContainer = document.getElementById("tags-container");

                    let tag = document.createElement("span");
                    tag.classList.add("tag");
                    tag.textContent = tagValue;

                    let deleteButton = document.createElement("span");
                    deleteButton.textContent = "x";
                    deleteButton.classList.add("delete-tag");

                    deleteButton.addEventListener("click", function() {
                        tagContainer.removeChild(tag);
                        updateKeywordsHidden();
                    });

                    tag.appendChild(deleteButton);
                    tagContainer.appendChild(tag);
                }

                function updateKeywordsHidden() {
                    let tags = [];
                    let tagElements = document.querySelectorAll("#tags-container .tag");

                    tagElements.forEach(function(tag) {
                        tags.push(tag.textContent.replace('x', '').trim());
                    });

                    document.getElementById("keywords-hidden").value = tags.join(',');
                }
            </script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const urlParams = new URLSearchParams(window.location.search);

                    if (urlParams.get('success') === '1') {
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            // ลบพารามิเตอร์ success ออกจาก URL
                            urlParams.delete('success'); // ลบพารามิเตอร์
                            // สร้าง URL ใหม่
                            const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;

                            // ถ้ามีพารามิเตอร์เหลือ ให้เพิ่มพารามิเตอร์ไปใน URL
                            if (urlParams.toString()) {
                                window.history.replaceState({}, '', newUrl + '?' + urlParams.toString());
                            } else {
                                window.history.replaceState({}, '', newUrl); // ถ้าไม่มีพารามิเตอร์, ไม่ต้องเพิ่ม '?'
                            }
                        });
                    }

                });
            </script>
</body>

</html>