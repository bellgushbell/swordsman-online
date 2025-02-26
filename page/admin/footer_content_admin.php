<script>
    let quill;
    // Initialize Quill editor
    window.addEventListener('DOMContentLoaded', (event) => {
        // กำหนดค่าเริ่มต้นให้กับ Quill Editor
        quill = new Quill('#description-editor', {
            theme: 'snow',
            modules: {
                toolbar: [

                    ['bold', 'italic', 'underline'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['link', 'image'],
                    [{
                        'align': []
                    }],
                    [{
                        'size': ['small', 'medium', 'large', 'huge'] // เพิ่มส่วนนี้
                        // 'size': ['11px', '14px', '16px', '18px', '20px', '22px', '24px'] // ขนาดตัวอักษรที่ต้องการ
                    }],
                    ['clean']
                ]
            }
        });

        // ตรวจสอบค่าจาก PHP และใส่ลงใน Quill Editor
        <?php if (isset($data['description']) && !empty($data['description'])): ?>
            // ถ้ามีค่าจาก $data['description'] ให้ใส่ลงใน Quill Editor
            quill.root.innerHTML = <?php echo json_encode($data['description']); ?>;
        <?php else: ?>
            // ถ้าไม่มีค่า ให้ปล่อยให้ Quill Editor ว่างไว้
            quill.root.innerHTML = '';
        <?php endif; ?>
    });

    async function uploadImage(imageData) {

        const response = await fetch('../../database/admin/description_upload.php', {
            method: 'POST',
            body: JSON.stringify({
                image_data: imageData
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        const data = await response.json();
        return data.image_url;
    }

    // ปรับปรุงการจัดการเมื่อส่งฟอร์ม
    document.querySelector('form').onsubmit = async function(e) {
        e.preventDefault();

        let descriptionContent = quill.root.innerHTML;
        // ลบเครื่องหมาย escape ที่มี backslashes


        const images = descriptionContent.match(/data:image\/[^;]+;base64[^"]+/g);
        if (images) {
            for (let image of images) {
                const imageUrl = await uploadImage(image);
                descriptionContent = descriptionContent.replace(image, imageUrl);
            }
        }


        document.querySelector('#description').value = descriptionContent;
        this.submit();
    };

    // เมื่อคลิกที่ปุ่มเลือกไฟล์
    document.getElementById('file-upload-btn').addEventListener('click', function() {
        document.getElementById('upload').click(); // เปิดหน้าต่างเลือกไฟล์
    });

    // ตรวจจับการเลือกไฟล์ใหม่
    document.getElementById('upload').addEventListener('change', function(event) {
        let file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('preview');
                let previewText = document.getElementById('preview-text');
                let fileNameDisplay = document.getElementById('file-name-text'); // ส่วนแสดงชื่อไฟล์

                preview.src = e.target.result;
                preview.style.border = "2px solid #000"; // เปลี่ยนเส้นขอบเป็นเส้นเต็ม
                previewText.style.display = 'none'; // ซ่อนข้อความ "ยังไม่ได้เลือกรูป"
                document.getElementById('removeImage').style.display = 'inline-block'; // แสดงปุ่มลบ

                fileNameDisplay.value = file.name; // อัปเดตชื่อไฟล์ที่เลือกใน input
            };
            reader.readAsDataURL(file);
        }
    });

    // ฟังก์ชันลบรูปภาพ
    document.getElementById('removeImage').addEventListener('click', function() {
        let preview = document.getElementById('preview');
        let previewText = document.getElementById('preview-text');
        let upload = document.getElementById('upload');
        let fileNameDisplay = document.getElementById('file-name-text'); // ส่วนแสดงชื่อไฟล์

        preview.src = ''; // ล้างรูปภาพ
        preview.style.border = "2px dashed #ccc"; // เปลี่ยนกลับเป็นเส้นขอบแบบเดิม
        previewText.style.display = 'block'; // แสดงข้อความ "ยังไม่ได้เลือกรูป"
        upload.value = ''; // รีเซ็ตค่า input file
        fileNameDisplay.value = 'ยังไม่ได้เลือกไฟล์'; // คืนค่าชื่อไฟล์ใน input เป็นค่าเริ่มต้น
        this.style.display = 'none'; // ซ่อนปุ่มลบ
    });

    // โหลดข้อมูลภาพเดิมเมื่อหน้าเว็บโหลด
    document.addEventListener('DOMContentLoaded', function() {
        let preview = document.getElementById('preview');
        let previewText = document.getElementById('preview-text');
        let removeButton = document.getElementById('removeImage');
        let fileNameDisplay = document.getElementById('file-name-text'); // ส่วนแสดงชื่อไฟล์

        // ดึงชื่อไฟล์จาก PHP
        let imageUrl = '<?php echo isset($data['image']) ? "../../images/news/" . $data['image'] : ""; ?>';
        let imageName = '<?php echo isset($data['image']) ? $data['image'] : ""; ?>';

        if (imageUrl) {
            preview.src = imageUrl; // แสดงรูปภาพเริ่มต้น
            preview.style.border = "2px solid #000"; // เปลี่ยนเส้นขอบเป็นเส้นเต็ม
            previewText.style.display = 'none'; // ซ่อนข้อความ "ยังไม่ได้เลือกรูป"
            removeButton.style.display = 'inline-block'; // แสดงปุ่มลบ
            fileNameDisplay.value = imageName; // แสดงชื่อไฟล์เดิมใน input

        } else {
            preview.src = ''; // ถ้าไม่มีรูปเริ่มต้น
            preview.style.border = "2px dashed #ccc"; // เส้นขอบแบบเดิม
            previewText.style.display = 'block'; // แสดงข้อความ "ยังไม่ได้เลือกรูป"
            removeButton.style.display = 'none'; // ซ่อนปุ่มลบ
            fileNameDisplay.value = 'ยังไม่ได้เลือกไฟล์'; // ข้อความเริ่มต้น
        }
    });
</script>



</body>

</html>