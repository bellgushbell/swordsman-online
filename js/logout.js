// ฟังก์ชัน Logout
document.getElementById("logoutBtn").addEventListener("click", function () {
  fetch("logout.php", {
    method: "POST",
  }) // ส่งคำขอไปที่ logout.php
    .then((response) => {
      if (response.ok) {
        window.location.href = "login.php"; // ไปที่หน้า Login
      }
    });
});

document.addEventListener("DOMContentLoaded", function () {
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
});
