<!-- footer.php -->
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script สำหรับการเปลี่ยนหมวดหมู่ -->
<script>
    function changeCategory(category, page = 1) {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '../../database/admin/content_read.php', true);
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

                '<td>' +
                (content.image ?
                    // ถ้ามีรูป ให้แสดงรูปภาพ
                    '<img src="../../images/news/' + content.image + '" class="news-thumbnail" alt="รูปข่าว" data-bs-toggle="modal" data-bs-target="#imageModal" />' :
                    // ถ้าไม่มีรูป ให้แสดงข้อความ "ไม่มีรูป"
                    'ไม่มีรูป') +
                '</td>' +
                '<td>' + content.category_name + '</td>' +
                '<td style="text-align: left;">' + content.header_thumbnail + '</td>' +
                '<td>' + formatDate(content.created_at) + '<br>' + formatDate(content.updated_at) + '</td>' +
                '<td>' + ((content.created_by === content.update_by || content.update_by == null) ? content.created_by : content.created_by + '<br>' + content.update_by) + '</td>' +
                '<td>' +
                '<button class="btn btn-outline-warning btn-sm me-2 edit-btn" data-id="' + content.id + '" data-title="' + content.header_thumbnail + '" data-type="' + content.category_name + '" data-image="' + content.image + '"><i class="bi bi-pencil"></i></button>' +

                '<button class="btn btn-outline-danger btn-sm delete-btn" data-id="' + content.id + '" data-image="' + content.image + '"><i class="bi bi-trash3"></i></button>' +
                '</td>' +
                '</tr>';

            tableBody.innerHTML += row;
        });

        function formatDate(datetime) {
            var date = new Date(datetime); // แปลงค่าจาก string เป็น Date object
            // กำหนดชื่อเดือนในภาษาไทย
            var monthsOfYear = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            var month = monthsOfYear[date.getMonth()]; // เดือน

            // ปี ค.ศ.
            var year = date.getFullYear();

            // เวลาในรูปแบบ 24 ชั่วโมง
            var hours = ('0' + date.getHours()).slice(-2); // เพิ่ม leading zero ถ้าจำเป็น
            var minutes = ('0' + date.getMinutes()).slice(-2); // เพิ่ม leading zero ถ้าจำเป็น

            // คืนค่าในรูปแบบที่ต้องการ: วัน (ภาษาไทย) เดือน (ตัวย่อ) ปี ค.ศ. เวลา 24 ชั่วโมง
            return date.getDate() + ' ' + month + ' ' + year + ' ' + hours + ':' + minutes;
        }

        // ใส่ event listener เพียงครั้งเดียว หลังจากที่ตารางอัพเดต
        document.querySelectorAll('.news-thumbnail').forEach(function(imgElement) {
            imgElement.addEventListener('click', function() {
                var imageSrc = imgElement.src;
                console.log(imageSrc); // ตรวจสอบว่า src ถูกต้องหรือไม่
                document.getElementById('modalImage').src = imageSrc;
            });
        });


        // ฟังก์ชันการลบข้อมูล
        document.querySelectorAll('.delete-btn').forEach(function(deleteButton) {
            deleteButton.addEventListener('click', function() {
                var id = deleteButton.getAttribute('data-id');
                var image = deleteButton.getAttribute('data-image');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteDataFromDatabase(id, image).then(function(response) {
                            if (response.success) {
                                // ลบข้อมูลจาก array และอัปเดตตาราง
                                data = data.filter(function(content) {
                                    return content.id !== id;
                                });
                                updateTable(data); // อัปเดตตารางใหม่
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ลบข้อมูลสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
                                alert('Failed to delete data: ' + response.message); // แสดงข้อความข้อผิดพลาด
                            }
                        }).catch(function(error) {
                            console.error('Error:', error);
                            alert('Error deleting data');
                        });
                    }
                });

            });
        });



        // ฟังก์ชันแก้ไขข้อมูล
        document.querySelectorAll('.edit-btn').forEach(function(editButton) {
            editButton.addEventListener('click', function() {
                var id = editButton.getAttribute('data-id');
                // ส่งไปที่หน้าแก้ไขโดยส่ง id ผ่าน URL
                window.location.href = "../../database/admin/content_read_detail.php?id=" + id;
            });
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

    // ฟังก์ชันการลบข้อมูล
    function deleteDataFromDatabase(id, image) {
        return fetch('../../database/admin/content_delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: id,
                    image: image
                })
            })
            .then(response => response.json()) // รับคำตอบเป็น JSON
            .then(data => {
                if (data.success) {
                    return {
                        success: true,
                        message: data.message
                    };
                } else {
                    return {
                        success: false,
                        message: data.message || 'Failed to delete'
                    };
                }
            })
            .catch(error => {
                console.error('Error:', error);
                return {
                    success: false,
                    message: 'Error deleting data'
                };
            });
    }

    // โหลดหน้าเสร็จให้ดึงข้อมูล "ทั้งหมด" อัตโนมัติ
    window.onload = function() {
        changeCategory('ALL'); // เรียกฟังก์ชัน changeCategory เพื่อโหลดข้อมูล "ทั้งหมด"
    };

    function loadData(category) {
        changeCategory(category); // เรียกฟังก์ชัน changeCategory ที่มีอยู่แล้ว
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.get('success') === '1') {
            Swal.fire({
                icon: 'success',
                title: 'สร้างข่าวสารสำเร็จ',
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
        // ตรวจสอบว่า URL มีพารามิเตอร์ 'delete' ที่ค่าเป็น '1' หรือไม่
        if (urlParams.get('delete') === '1') {
            // แสดงข้อความสำเร็จโดยใช้ SweetAlert2
            Swal.fire({
                icon: 'success',
                title: 'ลบสำเร็จ',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                // ลบพารามิเตอร์ 'delete' ออกจาก URL
                urlParams.delete('delete'); // ลบพารามิเตอร์
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
        if (urlParams.get('edit') === '1') {
            // แสดงข้อความสำเร็จโดยใช้ SweetAlert2
            Swal.fire({
                icon: 'success',
                title: 'แก้ไขสำเร็จ',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                // ลบพารามิเตอร์ 'delete' ออกจาก URL
                urlParams.delete('edit'); // ลบพารามิเตอร์
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