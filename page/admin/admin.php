<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Google Fonts: IBM Plex Sans Thai -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link rel="stylesheet" href="../../css/admin/responsive.css">

</head>

<body>

    <div class="wrapper">

        <!-- Main Content -->
        <main class="content">
            <div class="d-flex justify-content-end mb-3">
                <div class="card p-3 shadow-sm w-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- โลโก้ -->
                        <img src="../../images/Logo SwordMan3-Final-white-transparent.png"
                            alt="Overlay Text" class="img-fluid w-25 w-md-50">

                        <!-- ชื่อผู้ใช้ & ไอคอนออกจากระบบ (บรรทัดเดียวกัน) -->
                        <div class="d-flex align-items-center flex-grow-1 justify-content-end">
                            <!-- ชื่อผู้ใช้ -->
                            <span class="fw-bold text-primary me-2"> Administrator</span>
                            <!-- ปุ่มออกจากระบบ -->
                            <button class="btn btn-success rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                                <i class="bi bi-box-arrow-right text-white fs-6"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap Icons & Tooltip -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl);
                    });
                });
            </script>



            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-3 p-3 rounded shadow-sm bg-light">
                    <div class="gap-2">
                        <a href="" class="btn btn-outline-secondary">News</a>
                        <a href="" class="btn btn-outline-secondary">Promotions</a>
                        <a href="" class="btn btn-outline-secondary">Events</a>
                    </div>
                    <a href="" class="btn btn-success">Create</a>
                </div>




                <div class="table-container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Headline</th>
                                <th>Image</th>
                                <th>Created Date</th>
                                <th>Author</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ข่าว</td>
                                <td>ตัวอย่างข่าว</td>
                                <td><img src="image.jpg" class="news-thumbnail" alt="รูปข่าว"></td>
                                <td>2024-02-11</td>
                                <td>Admin</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>