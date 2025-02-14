<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link rel="stylesheet" href="../../css/admin/responsive.css">

    <!-- Quill -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/upload_image.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <div class="wrapper overflow-auto">

        <!-- Main Content -->
        <main class="content">
            <div class="d-flex justify-content-end mb-3">
                <div class="card p-3 shadow-sm w-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <img src="../../images/Logo SwordMan3-Final-white-transparent.png" alt="Overlay Text"
                            class="img-fluid w-25 w-md-50">

                        <span class="text-end flex-grow-1">ยินดีต้อนรับ, ผู้ดูแลระบบ</span>
                    </div>
                </div>
            </div>

            <div class="main-content">
                <div class="card-header">
                    <h3>Create New Entry</h3>
                </div>
                <div class="card-body">
                    <form action="../../database/save_create.php" method="POST" >
                        <div class="form-group mb-3 text-center">
                            <label for="role" class="me-3">Type</label>
                            <select class="form-control d-inline-block w-50 text-start" id="type" name="type" required>
                                <option value="ข่าว">ข่าว</option>
                                <option value="กิจกรรม">กิจกรรม</option>
                                <option value="โปรโมชั่น">โปรโมชั่น</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="upload">Upload File</label>
                            <input type="file" class="form-control" id="upload" name="upload_title">
                            <div class="mt-3">
                                <img id="preview" class="img-fluid" style="display: none; max-height: 200px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <div id="description-editor" class="form-control" style="height: 200px;"></div>
                            <input type="hidden" id="description" name="description">
                        </div>

                        <div class="form-actions d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      //Initialize Quill editor
    var quill = new Quill('#description-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'color': [] }, { 'background': [] }],
                ['link', 'image'],
                [{ 'align': [] }],
                ['clean']
            ]
        }
    });

    
    async function uploadImage(imageData) {
        const response = await fetch('../../database/description_upload.php', {
            method: 'POST',
            body: JSON.stringify({ image_data: imageData }),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        const data = await response.json();
        return data.image_url;
    }

    
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
    </script>
</body>

</html>