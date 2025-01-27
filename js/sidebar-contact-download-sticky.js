function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggle-btn");
    const navItems = document.querySelectorAll(".nav-item:not(.toggle-button)");

    if (sidebar.classList.contains("collapsed")) {
        // เปิด Sidebar
        sidebar.classList.remove("collapsed");
        toggleBtn.innerHTML = '<i class="fas fa-angle-right"></i>';
        navItems.forEach((item) => (item.style.display = "flex"));
    } else {
        // ซ่อน Sidebar
        sidebar.classList.add("collapsed");
        toggleBtn.innerHTML = '<i class="fas fa-angle-left"></i>';
        toggleBtn.style.background = 'rgba(0, 0, 0, 0.001)';
        toggleBtn.style.boxShadow = 'none';
        toggleBtn.style.border = 'none';


        navItems.forEach((item) => (item.style.display = "none"));
    }
}
