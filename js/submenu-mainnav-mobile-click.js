function initMobileDropdown() {
    // ตรวจสอบขนาดหน้าจอ
    if (window.innerWidth <= 768) {
        document.querySelectorAll(".menu-item.has-submenu > .menu-link").forEach((link) => {
            let clickedOnce = false; // ติดตามว่าคลิกครั้งแรกหรือไม่
            link.addEventListener("click", (e) => {
                const dropdown = link.nextElementSibling;

                if (dropdown && dropdown.classList.contains("dropdown-menu-mainnav")) {
                    e.preventDefault(); // ป้องกันลิงก์ทำงานทันที
                    if (!clickedOnce) {
                        // แสดงเมนูย่อยเมื่อคลิกครั้งแรก
                        dropdown.style.display = "flex";
                        clickedOnce = true; // บันทึกว่าคลิกครั้งแรกแล้ว
                    } else {
                        // ให้เข้าไปยัง href เมื่อคลิกครั้งที่สอง
                        dropdown.style.display = "none"; // ปิดเมนูย่อย
                        clickedOnce = false; // รีเซ็ตการคลิก
                        window.location.href = link.getAttribute("href"); // ไปยัง href
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
document.querySelector(".hamburger-menu").addEventListener("click", () => {
    resetDropdowns(); // รีเซ็ตเมนูย่อยทั้งหมด
});
