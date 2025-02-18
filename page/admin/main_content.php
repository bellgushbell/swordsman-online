<?php  


$roles = isset($_SESSION['roles']) ? $_SESSION['roles'] : null;

?>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-1 p-3 rounded shadow-sm"
        style="background-color: rgba(255, 255, 255, 0.5); backdrop-filter: blur(8px); border-radius: 10px;">
        <div class="gap-2">
            <a href="javascript:void(0);" class="btn btn-outline-info" onclick="loadData('ทั้งหมด')">ALL</a>
            <a href="javascript:void(0);" class="btn btn-outline-info" onclick="loadData('ข่าว')">News</a>
            <a href="javascript:void(0);" class="btn btn-outline-info" onclick="loadData('โปรโมชั่น')">Promotions</a>
            <a href="javascript:void(0);" class="btn btn-outline-info" onclick="loadData('กิจกรรม')">Events</a>
        </div>
        <div class="d-flex gap-2">
            <?php if ($roles == 1) { ?> 
            <a href="../../page/admin/add_user.php" class="btn btn-outline-danger">Add User</a>
            <?php }?>
            <a href="../../page/admin/create_view.php" class="btn btn-outline-success">Create</a>
        </div>
    </div>

    <div class="table-container">
        <h2 id="categoryTitle">ALL</h2> <!-- เริ่มต้นด้วย "ALL" -->
        <table id="dataTable" class="table table-bordered">
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
                <!-- ข้อมูลจะถูกแทรกที่นี่ -->
            </tbody>
        </table>
        <div id="pagination" class="d-flex justify-content-center  ">
            <!-- ปุ่ม Pagination จะแสดงที่นี่ -->
        </div>
    </div>



</div>

<!-- Modal สำหรับแสดงรูป -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">ดูรูปภาพ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- ภาพที่จะแสดงใน Modal -->
                <img id="modalImage" src="" class="img-fluid" alt="รูปที่เลือก" />
            </div>
        </div>
    </div>
</div>