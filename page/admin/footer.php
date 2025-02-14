<!-- footer.php -->
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script สำหรับ Tooltip -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // ฟังก์ชัน Logout
        document.getElementById("logoutBtn").addEventListener("click", function() {
            fetch('logout.php', {
                    method: 'POST'
                }) // ส่งคำขอไปที่ logout.php
                .then(response => {
                    if (response.ok) {
                        window.location.href = 'login.php'; // ไปที่หน้า Login
                    }
                });
        });
    });
</script>

<!-- ฟังก์ชันในการอัปเดตวันที่และเวลา -->
<script>
    function updateDateTime() {
        const currentDateTime = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: true
        };
        const formattedDate = currentDateTime.toLocaleString('en-US', options);

        document.getElementById("currentDateTime").textContent = formattedDate; // อัปเดตใน HTML
    }

    // เรียกใช้งานฟังก์ชันทุกๆ 1 วินาที
    setInterval(updateDateTime, 1000);

    // เรียกใช้ครั้งแรกเพื่อแสดงทันที
    updateDateTime();
</script>
<script>
    function changeCategory(category) {
        // ส่งคำขอไปยัง get_content.php ผ่าน AJAX
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '../../database/admin/get_content.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    var contentData = JSON.parse(xhr.responseText);
                    if (contentData.error) {
                        // แสดงข้อความผิดพลาดที่ส่งมาจากเซิร์ฟเวอร์
                        console.error(contentData.error);
                    } else {
                        // แสดงข้อมูลที่ได้รับจากการค้นหา
                        var tableBody = document.querySelector('table tbody');
                        tableBody.innerHTML = '';

                        contentData.forEach(function(content) {
                            var row = '<tr>' +
                                '<td>' + content.type + '</td>' +
                                '<td>' + content.title + '</td>' +
                                '<td><img src="' + content.image + '" class="news-thumbnail" alt="รูปข่าว"></td>' +
                                '<td>' + content.created_at + '</td>' +
                                '<td>' + content.first_name + '</td>' +
                                '<td>' +
                                '<button class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></button>' +
                                '<button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></button>' +
                                '</td>' +
                                '</tr>';
                            tableBody.innerHTML += row;
                        });
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                }
            }
        };



        // Send category data as POST request
        xhr.send('category=' + encodeURIComponent(category));
    }

    // 📌 **โหลดหน้าเสร็จให้ส่งค่า "ทั้งหมด" โดยอัตโนมัติ**
    window.onload = function() {
        changeCategory('ทั้งหมด');
    };
</script>


</body>

</html>