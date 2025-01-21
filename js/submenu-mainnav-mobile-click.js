// ฟังก์ชันสำหรับจัดการการแสดงเมนูย่อยและลูกศร
document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
        e.preventDefault();

        const dropdown = toggle.nextElementSibling; // เมนูย่อย
        const isOpen = dropdown.classList.contains("active");

        // ปิดเมนูย่อยทั้งหมดก่อน
        document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
            menu.classList.remove("active");
        });

        // รีเซ็ตสถานะลูกศรทั้งหมด
        document.querySelectorAll(".submenu-toggle").forEach((btn) => {
            btn.classList.remove("open");
        });

        // เปิดเมนูย่อยและเปลี่ยนทิศทางลูกศร
        if (!isOpen) {
            dropdown.classList.add("active");
            toggle.classList.add("open");
        }
    });
});
