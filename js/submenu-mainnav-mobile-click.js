function initMobileDropdown() {
    // ตรวจสอบขนาดหน้าจอ
    if (window.innerWidth <= 768) {
        document.querySelectorAll(".menu-item.has-submenu > .menu-link").forEach((link) => {
            link.addEventListener("click", (e) => {
                const dropdown = link.nextElementSibling;

                // แสดง/ซ่อนเมนูย่อย
                if (dropdown && dropdown.classList.contains("dropdown-menu-mainnav")) {
                    e.preventDefault(); // ป้องกันการนำลิงก์ไปทำงาน
                    const isOpen = dropdown.style.display === "flex";
                    dropdown.style.display = isOpen ? "none" : "flex"; // แสดงหรือซ่อน
                }
            });
        });
    }
}

// เรียกใช้งานเมื่อโหลดหน้า
initMobileDropdown();

// เพิ่ม Event Listener เพื่อเช็คขนาดหน้าจอเมื่อมีการปรับขนาด
window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
        // รีเซ็ตการแสดงผลเมนูเมื่อเปลี่ยนกลับเป็นคอมพิวเตอร์
        document.querySelectorAll(".dropdown-menu-mainnav").forEach((dropdown) => {
            dropdown.style.display = "none";
        });
    } else {
        // เรียกใช้ฟังก์ชันอีกครั้งเมื่อกลับไปยังมือถือ
        initMobileDropdown();
    }
});
