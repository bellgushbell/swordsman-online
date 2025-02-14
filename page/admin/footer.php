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
    function changeCategory(category, page = 1) {
        // ส่งคำขอไปยัง get_content.php ผ่าน AJAX
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '../../database/admin/get_content.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // ในฟังก์ชัน changeCategory
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                try {
                    var responseData = JSON.parse(xhr.responseText);
                    if (responseData.error) {
                        console.error(responseData.error);
                    } else {
                        // อัปเดตข้อมูลในตาราง
                        updateTable(responseData.data);

                        // เปลี่ยนชื่อหมวดหมู่ที่แสดง
                        var categoryTitle = document.getElementById('categoryTitle');
                        categoryTitle.textContent = category; // เปลี่ยนชื่อหมวดหมู่

                        // อัปเดต pagination
                        updatePagination(responseData.currentPage, responseData.totalPages, category);
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                }
            }
        };


        // ส่งข้อมูล category และ page
        xhr.send('category=' + encodeURIComponent(category) + '&page=' + page);
    }

    function updateTable(data) {
        var tableBody = document.querySelector('table tbody');
        tableBody.innerHTML = '';

        if (data.length === 0) {
            tableBody.innerHTML = '<tr><td colspan="6" class="text-center">No data available</td></tr>';
            return;
        }

        data.forEach(function(content) {
            var row = '<tr>' +
                '<td>' + content.type + '</td>' +
                '<td>' + content.title + '</td>' +
                '<td><img src="' + content.image + '" class="news-thumbnail" alt="รูปข่าว"></td>' +
                '<td>' + content.created_at + '</td>' +
                '<td>' + content.first_name + '</td>' +
                '<td>' +
                '<button class="btn btn-outline-warning btn-sm  me-2"><i class="bi bi-pencil"></i></button>' +
                '<button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></button>' +
                '</td>' +
                '</tr>';
            tableBody.innerHTML += row;
        });
    }

    function updatePagination(currentPage, totalPages, category) {
        var paginationDiv = document.getElementById('pagination');
        paginationDiv.innerHTML = ''; // ล้างปุ่มที่มีอยู่ก่อน

        // ปุ่ม "หน้าก่อน" (prev)
        if (currentPage > 1) {
            var prevButton = document.createElement('button');
            prevButton.classList.add('btn', 'btn-outline-primary', 'me-2');
            prevButton.textContent = 'Previous';
            prevButton.onclick = function() {
                changeCategory(category, currentPage - 1); // เปลี่ยนหน้าไปที่หน้าก่อน
            };
            paginationDiv.appendChild(prevButton);
        }

        // ปุ่มหมายเลขหน้า
        for (var i = 1; i <= totalPages; i++) {
            var pageButton = document.createElement('button');
            pageButton.classList.add('btn', 'btn-outline-primary', 'me-2');
            pageButton.textContent = i;

            // ถ้าเป็นหน้าปัจจุบันจะทำให้ปุ่มดูเด่น
            if (i === currentPage) {
                pageButton.classList.add('active'); // เพิ่มคลาส active ให้กับปุ่มหน้าปัจจุบัน
            }

            // ตั้งค่า onclick ให้สามารถเปลี่ยนหน้าได้
            pageButton.addEventListener('click', (function(i) {
                return function() {
                    changeCategory(category, i); // เรียกฟังก์ชัน changeCategory ให้ไปที่หน้าที่เลือก
                };
            })(i)); // ใช้ IIFE (Immediately Invoked Function Expression) เพื่อให้ i ถูกเก็บค่าอย่างถูกต้องในทุกปุ่ม

            paginationDiv.appendChild(pageButton);
        }

        // ปุ่ม "หน้าถัดไป" (next)
        if (currentPage < totalPages) {
            var nextButton = document.createElement('button');
            nextButton.classList.add('btn', 'btn-outline-primary', 'me-2');
            nextButton.textContent = 'Next';
            nextButton.onclick = function() {
                changeCategory(category, currentPage + 1); // เปลี่ยนหน้าไปที่หน้าถัดไป
            };
            paginationDiv.appendChild(nextButton);
        }
    }



    // โหลดหน้าเสร็จให้ดึงข้อมูล "ทั้งหมด" อัตโนมัติ
    window.onload = function() {
        changeCategory('ทั้งหมด');
    };

    function loadData(category) {
        changeCategory(category); // เรียกฟังก์ชัน changeCategory ที่มีอยู่แล้ว
    }
</script>


</body>

</html>