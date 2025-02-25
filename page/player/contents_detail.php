<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();

    // ดึงข้อมูลจาก session ที่ชื่อว่า edit_data ถ้ามี
    if (isset($_SESSION['data_news'])) {
        $data = $_SESSION['data_news'];
        $type = $data['type'];
        if ($type === 'ข่าว') {
            $type = 'ข่าวสาร';
        }
        $date = $data['created_at'];
    }
}
?>


<?php include '../../page/player/contents_head.php'; ?>
<?php include '../../page/player/contents_navber.php'; ?>

<!-- Header Section -->
<div class="news-banner">
    <!-- <h1><?php echo $type; ?></h1> -->
</div>


<div class="wrapper">

    <main class="content mt-3">

        <div class="col-md-8 mx-auto">
            <div class="text-center">
                <h2 class="mb-1" style="color:rgb(110, 93, 0); font-weight: bold;">
                    <?php echo $type; ?>
                </h2>
                <div class="d-flex align-items-center justify-content-center" style="gap: 10px;">
                    <hr style="width: 30%; border-top: 3px solid rgb(110, 93, 0); margin: 0;">
                    <p style="color:rgb(110, 93, 0); font-style: italic; margin: 0;">
                        <?php echo date("Y-m-d", strtotime($date)); ?>
                    </p>
                    <hr style="width: 30%; border-top: 3px solid  rgb(110, 93, 0); margin: 0;">
                </div>
            </div>

            <div class="content">
                <div class="col-md-12" style="border: 1px solid rgb(196, 169, 15);; backdrop-filter: blur(8px); border-radius: 10px; padding: 20px; position: relative;">
                    <div class="row">
                        <div class="p-3 text-center">
                            <img id="preview" class="img-fluid" style="max-width: 1200px; aspect-ratio: 1200 / 540; object-fit: cover;" src="../../images/news/<?php echo ($data['image']); ?>">

                        </div>
                    </div>
                    <div class="row">
                        <div class="p-3 text-center ">
                            <h5 class="fw-bold"><?php echo $data['title']; ?></h5>
                        </div>
                    </div>

                    <div class="row">

                        <div class="p-3">
                            <?php
                            $description = $data['description'];
                            $description = str_replace('ql-', '', $description); // แทนที่ 'ql-' ด้วยค่าว่าง
                            $description = str_replace('background-color: rgb(255, 255, 255);', '', $description); // แทนที่ 'abc-' ด้วยค่าว่าง

                            echo $description;
                            ?>
                        </div>

                    </div>
                </div>
                <!-- ปุ่มย้อนกลับ -->

            </div>

            <div style=" margin: 20px; text-align: center;">
                <div style=" margin: 20px; text-align: center;">
                    <?php
                    $tab = 'all';
                    if ($type == 'โปรโมชั่น') {
                        $tab = 'promotions';
                    } elseif ($type == 'กิจกรรม') {
                        $tab = 'events';
                    } elseif ($type == 'ข่าวสาร') {
                        $tab = 'news';
                    }
                    ?>
                    <a href="contents.php?tab=<?php echo $tab; ?>" class="btn" style="background-color: #FFD700; color: black; font-weight: bold; border: none; padding: 10px 20px;">เมนู<?php echo $type; ?></a>
                </div>

            </div>

        </div>

    </main>
</div>

<?php include '../player/contents_footer.php'; ?>