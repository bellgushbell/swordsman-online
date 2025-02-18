<script>
    let quill;
    // Initialize Quill editor
    window.addEventListener('DOMContentLoaded', (event) => {
        quill = new Quill('#description-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
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
                    }],
                    ['clean']
                ]
            }
        });
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


    document.getElementById('upload').addEventListener('change', function(event) {
        let file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('preview');
                let previewText = document.getElementById('preview-text');

                preview.src = e.target.result;
                preview.style.border = "2px solid #000"; // เปลี่ยนเส้นขอบเป็นเส้นเต็ม
                previewText.style.display = 'none'; // ซ่อนข้อความ "ยังไม่ได้เลือกรูป"
                document.getElementById('removeImage').style.display = 'inline-block'; // แสดงปุ่มลบ
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('removeImage').addEventListener('click', function() {
        let preview = document.getElementById('preview');
        let previewText = document.getElementById('preview-text');
        let upload = document.getElementById('upload');

        preview.src = ''; // ล้างรูปภาพ
        preview.style.border = "2px dashed #ccc"; // เปลี่ยนกลับเป็นเส้นขอบแบบเดิม
        previewText.style.display = 'block'; // แสดงข้อความ "ยังไม่ได้เลือกรูป"
        upload.value = ''; // รีเซ็ตค่า input file
        this.style.display = 'none'; // ซ่อนปุ่มลบ
    });
</script>



</body>

</html>