function initMobileDropdown() {
    // ตรวจสอบขนาดหน้าจอ
    if (window.innerWidth <= 768) {
        document.querySelectorAll(".menu-item.has-submenu > .menu-link").forEach((link) => {
            let clickedOnce = false; // ติดตามว่าคลิกครั้งแรกหรือไม่
            link.addEventListener("click", (e) => {
                const dropdown = link.nextElementSibling;

                if (dropdown && dropdown.classList.contains("dropdown-menu-mainnav")) {
                    if (!clickedOnce) {
                        // ยกเลิกการนำไปยัง href ครั้งแรก
                        e.preventDefault();
                        // แสดงเมนูย่อย
                        dropdown.style.display = "flex";
                        clickedOnce = true; // บันทึกสถานะว่าคลิกครั้งแรกแล้ว
                    } else {
                        // คลิกครั้งที่สองไปยัง href ตามปกติ
                        resetDropdowns(); // ปิดเมนูย่อยทั้งหมด
                    }
                }
            });
        });
    }
}

// ฟังก์ชันปิดเมนูย่อยทั้งหมด
function resetDropdowns() {
    document.querySelectorAll(".dropdown-menu-mainnav").forEach((dropdown) => {
        dropdown.style.display = "none";
    });

    // รีเซ็ตสถานะการคลิก
    document.querySelectorAll(".menu-item.has-submenu > .menu-link").forEach((link) => {
        link.clickedOnce = false;
    });
}

// เรียกใช้งานเมื่อโหลดหน้า
initMobileDropdown();

// เพิ่ม Event Listener เพื่อเช็คขนาดหน้าจอเมื่อมีการปรับขนาด
window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
        // รีเซ็ตการแสดงผลเมนูเมื่อเปลี่ยนกลับเป็นคอมพิวเตอร์
        resetDropdowns();
    } else {
        // เรียกใช้ฟังก์ชันอีกครั้งเมื่อกลับไปยังมือถือ
        initMobileDropdown();
    }
});

// ปิดเมนูย่อยเมื่อคลิก Hamburger Bar เพื่อหุบ
document.querySelector(".mobile-nav").addEventListener("click", () => {
    resetDropdowns(); // รีเซ็ตเมนูย่อยทั้งหมด
});
