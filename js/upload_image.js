$(document).ready(function () {
  $("#upload").on("change", function (e) {
    e.preventDefault();

    var formData = new FormData();
    var file = $("#upload")[0].files[0];
    formData.append("upload_title", file);

    // ตรวจสอบว่าไฟล์ถูกส่งไปหรือไม่
    if (file) {
      console.log("File selected:", file.name);
    } else {
      console.log("No file selected.");
    }

    $.ajax({
      url: "../../database/upload_image.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log("Upload successful, file path:", response.filePath);
        if (response.filePath) {
          $("#preview").attr("src", response.filePath).show();
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Image upload failed:", textStatus, errorThrown);
      },
    });
  });
});
