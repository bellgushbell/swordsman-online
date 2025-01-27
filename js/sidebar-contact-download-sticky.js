function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("sidebar-toggle");

    // Toggle the 'collapsed' class on the sidebar
    if (sidebar.classList.contains("collapsed")) {
        sidebar.classList.remove("collapsed"); // แสดง Sidebar
        toggleButton.innerHTML = '<i class="fas fa-angle-right"></i> ปิด';  // เปลี่ยนข้อความเป็น "ปิด"
    } else {
        sidebar.classList.add("collapsed"); // ซ่อน Sidebar
        toggleButton.innerHTML = '<i class="fas fa-angle-left"></i> เปิด'; // เปลี่ยนข้อความเป็น "เปิด"
    }
}
