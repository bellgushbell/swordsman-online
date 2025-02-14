<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Administrator";
// ตรวจสอบถ้าชื่อผู้ใช้เป็นภาษาอังกฤษให้แปลงเป็นตัวพิมพ์ใหญ่
if (preg_match('/^[a-zA-Z0-9]*$/', $username)) {
    $username = strtoupper($username); // แปลงเป็นตัวพิมพ์ใหญ่
}
$currentDateTime = date("l, F j, Y g:i A"); // รูปแบบของวันที่และเวลา
?>

<!-- navbar.php -->
<div class="d-flex justify-content-end mb-3">
    <div class=" p-3 shadow-sm w-100" style="background-color: transparent;  box-shadow: none;">


        <div class="d-flex align-items-center justify-content-between">
            <!-- โลโก้ -->
            <img src="../../images/Logo SwordMan3-Final-white-transparent.png"
                alt="Overlay Text" class="img-fluid w-25 w-md-50">

            <!-- ชื่อผู้ใช้ & ไอคอนออกจากระบบ -->
            <div class="d-flex align-items-center flex-grow-1 justify-content-end">

                <div class="p-1 text-center">
                    <!-- เอากรอบออกโดยการลบคลาส card -->
                    <span class="fw-bold text-primary" style="font-size: 50px;"><?php echo $username; ?></span>
                    <br>
                    <span class="text-muted" style="font-size: 0.8rem;" id="currentDateTime"><?php echo $currentDateTime; ?></span> <!-- แสดงวันที่และเวลา -->
                </div>


                <button id="logoutBtn" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center"
                    style="width: 32px; height: 32px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                    <i class="bi bi-box-arrow-right fs-6"></i>
                </button>
            </div>
        </div>
    </div>
</div>