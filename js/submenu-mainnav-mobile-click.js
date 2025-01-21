document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
        e.preventDefault(); // ป้องกันพฤติกรรมเริ่มต้น
        e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์ไปยังลิงก์ a

        const dropdown = toggle.nextElementSibling; // เมนูย่อย
        const isOpen = dropdown.classList.contains("active");

        if (isOpen) {
            // ถ้าเมนูย่อยเปิดอยู่ ให้ปิด
            dropdown.classList.remove("active");
            toggle.classList.remove("open");
        } else {
            // ปิดเมนูย่อยทั้งหมดก่อน
            document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
                menu.classList.remove("active");
            });

            // รีเซ็ตสถานะลูกศรทั้งหมด
            document.querySelectorAll(".submenu-toggle").forEach((btn) => {
                btn.classList.remove("open");
            });

            // เปิดเมนูย่อยและเปลี่ยนทิศทางลูกศร
            dropdown.classList.add("active");
            toggle.classList.add("open");
        }
    });
});

// ปิดเมนูย่อยเมื่อคลิกนอกเมนู
document.addEventListener("click", (e) => {
    if (!e.target.closest(".menu-item")) {
        document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
            menu.classList.remove("active");
        });
        document.querySelectorAll(".submenu-toggle").forEach((btn) => {
            btn.classList.remove("open");
        });
    }
});
