// datetime.js
function updateDateTime() {
  const currentDateTime = new Date();
  const options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
    hour: "numeric",
    minute: "numeric",
    second: "numeric",
    hour12: true,
  };
  const formattedDate = currentDateTime.toLocaleString("en-US", options);

  // เก็บข้อมูลใน sessionStorage
  sessionStorage.setItem("currentDateTime", formattedDate);

  // อัปเดตใน HTML
  document.getElementById("currentDateTime").textContent = formattedDate;
}

// เรียกใช้งานฟังก์ชันทุกๆ 1 วินาที
setInterval(updateDateTime, 1000);

// เรียกใช้ครั้งแรกเพื่อแสดงทันที
updateDateTime();

// ถ้าต้องการดึงข้อมูลจาก sessionStorage หลังจากโหลดหน้าเว็บ
window.onload = function () {
  const storedDateTime = sessionStorage.getItem("currentDateTime");
  if (storedDateTime) {
    document.getElementById("currentDateTime").textContent = storedDateTime;
  }
};
