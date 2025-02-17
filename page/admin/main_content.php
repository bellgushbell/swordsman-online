<!-- main_content.php -->
<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-3 p-3 rounded shadow-sm table-container">
        <div class="gap-2">
            <div class="gap-2">
                <a href="javascript:void(0);" class="btn btn-outline-info" onclick="changeCategory('ทั้งหมด')">ALL</a>
                <a href="javascript:void(0);" class="btn btn-outline-info" onclick="changeCategory('ข่าว')">News</a>
                <a href="javascript:void(0);" class="btn btn-outline-info" onclick="changeCategory('โปรโมชั่น')">Promotions</a>
                <a href="javascript:void(0);" class="btn btn-outline-info" onclick="changeCategory('กิจกรรม')">Events</a>
            </div>
        </div>
        <a href="../admin/create_view.php" class="btn btn-outline-success">Create</a>
    </div>

    <div class="table-container">
        <h2 id="categoryTitle">ALL</h2> <!-- เริ่มต้นด้วย "ALL" -->
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
                <?php
                // ตรวจสอบว่า contentData มีข้อมูลหรือไม่ก่อนที่จะทำการแสดงผล
                if (!empty($contentData)) {
                    foreach ($contentData as $content) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($content['typr']) . '</td>';
                        echo '<td>' . htmlspecialchars($content['title']) . '</td>';
                        echo '<td><img src="' . htmlspecialchars($content['image']) . '" class="news-thumbnail" alt="รูปข่าว"></td>';
                        echo '<td>' . htmlspecialchars($content['created_date']) . '</td>';
                        echo '<td>' . htmlspecialchars($content['created_td']) . '</td>';
                        echo '<td>';
                        echo '<button class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></button>';
                        echo '<button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-center">No data available</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>