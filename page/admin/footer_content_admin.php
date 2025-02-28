<script>
    // <!-- ต้องรวมสคริปต์ Bootstrap สำหรับ tooltip -->

    $(document).ready(function() {
        // เปิดใช้งาน tooltip
        $('[data-toggle="tooltip"]').tooltip();
    });



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

    document.getElementById('upload').addEventListener('change', function(event) {
        let file = event.target.files[0];

        if (file) {
            // เช็คขนาดไฟล์ (ไม่เกิน 2MB)
            const fileSize = file.size / 1024 / 1024; // ขนาดไฟล์เป็น MB
            if (fileSize > 2) {
                Swal.fire({
                    icon: 'error',
                    title: 'ขนาดไฟล์เกิน 2MB กรุณาเลือกไฟล์ที่เล็กกว่า',
                    showConfirmButton: false,
                    timer: 1500
                });
                resetFileInput();
                return; // ถ้าขนาดไฟล์เกิน จะไม่ทำการดำเนินการต่อ
            }

            let reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('preview');
                let previewText = document.getElementById('preview-text');
                let fileNameDisplay = document.getElementById('file-name-text'); // ส่วนแสดงชื่อไฟล์
                let removeImageButton = document.getElementById('removeImage'); // ปุ่มลบ

                // เช็คขนาดภาพ (สูงไม่เกิน 500px และกว้างไม่เกิน 800px)
                let img = new Image();
                img.onload = function() {
                    let width = img.width;
                    let height = img.height;

                    // สร้าง canvas เพื่อปรับขนาดภาพ
                    let canvas = document.createElement('canvas');
                    let ctx = canvas.getContext('2d');

                    // ถ้าภาพกว้างกว่า 800px หรือสูงกว่า 500px
                    if (width > 800 || height > 500) {
                        // คำนวณอัตราส่วน
                        let ratio = Math.min(800 / width, 500 / height);
                        canvas.width = width * ratio;
                        canvas.height = height * ratio;
                    } else {
                        // ถ้าภาพไม่เกินขนาดที่กำหนด กำหนดขนาดให้ตรงตามของต้นฉบับ
                        canvas.width = width;
                        canvas.height = height;
                    }

                    // วาดภาพบน canvas
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                    // แปลง canvas เป็น data URL
                    let resizedImage = canvas.toDataURL('image/jpeg', 0.8);

                    // อัปเดตตัวอย่างรูปภาพด้วยภาพที่ถูกปรับขนาด
                    preview.src = resizedImage;
                    preview.style.border = "2px solid #000"; // เปลี่ยนเส้นขอบเป็นเส้นเต็ม
                    previewText.style.display = 'none'; // ซ่อนข้อความ "ยังไม่ได้เลือกรูป"
                    removeImageButton.style.display = 'inline-block'; // แสดงปุ่มลบ

                    // อัปเดตชื่อไฟล์ที่เลือกใน input
                    fileNameDisplay.value = file.name;

                    // เช็คว่าไฟล์นี้เคยมีในเซิร์ฟเวอร์หรือยัง
                    checkIfFileExists(file.name).then(exists => {
                        if (exists) {
                            Swal.fire({
                                icon: 'error',
                                title: 'ไฟล์นี้มีอยู่แล้ว กรุณาเปลี่ยนไฟล์',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // รีเซ็ตการแสดงผลถ้าไฟล์มีอยู่แล้ว
                            resetFileInput();
                        }
                    }).catch(error => {
                        console.error('Error checking file existence:', error);
                    });
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // ฟังก์ชั่นสำหรับรีเซ็ตการแสดงผล
    function resetFileInput() {
        document.getElementById('preview').src = ''; // ลบตัวอย่างรูปภาพ
        document.getElementById('preview').style.border = "2px dashed #ccc"; // รีเซ็ตขอบ
        document.getElementById('preview-text').style.display = 'block'; // แสดงข้อความ "ยังไม่ได้เลือกรูป"
        document.getElementById('file-name-text').value = ''; // ลบชื่อไฟล์จากช่องกรอกข้อมูล
        document.getElementById('removeImage').style.display = 'none'; // ซ่อนปุ่มลบ
    }

    // ฟังก์ชั่นตรวจสอบว่าไฟล์มีอยู่ในเซิร์ฟเวอร์หรือไม่
    function checkIfFileExists(fileName) {
        return new Promise((resolve, reject) => {
            fetch(`../../database/img_read.php?image_name=${fileName}`)
                .then(response => response.json())
                .then(data => resolve(data.exists))
                .catch(error => reject(error));
        });
    }

    // // ฟังก์ชันตรวจสอบว่าไฟล์มีอยู่ในเซิร์ฟเวอร์แล้วหรือไม่
    // function checkIfFileExists(fileName) {
    //     return fetch('../../database/img_read.php?image_name=' + encodeURIComponent(fileName))
    //         .then(response => response.json())
    //         .then(data => {
    //             // สมมติว่า response มี field "exists" ที่บอกว่าไฟล์มีหรือไม่
    //             return data.exists; // คืนค่าผลลัพธ์ true/false ตามที่ได้รับจากเซิร์ฟเวอร์
    //         })
    //         .catch(error => {
    //             console.error("Error checking file existence:", error);
    //             return false; // ถ้ามีข้อผิดพลาดในการตรวจสอบ ก็จะคืนค่า false
    //         });
    // }


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
        let renameInput = document.getElementById('rename'); // ช่องกรอกชื่อไฟล์
        let alt_textInput = document.getElementById('alt_text'); // ช่องกรอกชื่อไฟล์

        // ดึงชื่อไฟล์จาก PHP
        let imageUrl = '<?php echo isset($data['image']) ? "../../images/news/" . $data['image'] : ""; ?>';
        let imageName = '<?php echo isset($data['image']) ? $data['image'] : ""; ?>'; // ใช้ PHP ในการแทรกค่าตรงนี้
        let imageNameWithoutPrefix = imageName.replace('swordsman_', ''); // ใช้ JavaScript ในการตัดคำว่า "swordsman_"

        if (imageUrl) {
            preview.src = imageUrl; // แสดงรูปภาพเริ่มต้น
            preview.style.border = "2px solid #000"; // เปลี่ยนเส้นขอบเป็นเส้นเต็ม
            previewText.style.display = 'none'; // ซ่อนข้อความ "ยังไม่ได้เลือกรูป"
            removeButton.style.display = 'inline-block'; // แสดงปุ่มลบ
            fileNameDisplay.value = imageName; // แสดงชื่อไฟล์เดิมใน input

            // เปิดใช้งานช่องกรอกชื่อไฟล์ (rename)
            renameInput.disabled = false;
            alt_textInput.disabled = false;
        } else {
            preview.src = ''; // ถ้าไม่มีรูปเริ่มต้น
            preview.style.border = "2px dashed #ccc"; // เส้นขอบแบบเดิม
            previewText.style.display = 'block'; // แสดงข้อความ "ยังไม่ได้เลือกรูป"
            removeButton.style.display = 'none'; // ซ่อนปุ่มลบ
            fileNameDisplay.value = 'ยังไม่ได้เลือกไฟล์'; // ข้อความเริ่มต้น

            // ปิดใช้งานช่องกรอกชื่อไฟล์ (rename)
            // renameInput.disabled = true;
            // alt_textInput.disabled = true;
        }
    });


    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('rename').addEventListener('input', function() {
            const imageName = this.value;
            const fileName = document.getElementById('file-name-text').value;
            const fileParts = fileName.split('.');

            if (fileParts.length > 1) {
                const extension = fileParts[fileParts.length - 1];
                fetch(`../../database/img_read.php?image_name=swordsman_${imageName + "." + extension}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            Swal.fire({
                                icon: 'error',
                                title: 'ไฟล์นี้มีอยู่แล้ว กรุณาเปลี่ยนชื่อไฟล์',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            document.getElementById('rename').value = '';
                        }
                    })
                    .catch(error => console.error("Error checking file:", error));
            }
        });
    });
</script>



</body>

</html>