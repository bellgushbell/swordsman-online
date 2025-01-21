// document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
//     toggle.addEventListener("click", (e) => {
//         e.preventDefault(); // ป้องกันพฤติกรรมเริ่มต้น
//         e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์ไปยังลิงก์ a

//         const dropdown = toggle.nextElementSibling; // เมนูย่อย
//         const isOpen = dropdown.classList.contains("active");

//         if (isOpen) {
//             // ถ้าเมนูย่อยเปิดอยู่ ให้ปิด
//             dropdown.classList.remove("active");
//             toggle.classList.remove("open");
//         } else {
//             // ปิดเมนูย่อยทั้งหมดก่อน
//             document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
//                 menu.classList.remove("active");
//             });

//             // รีเซ็ตสถานะลูกศรทั้งหมด
//             document.querySelectorAll(".submenu-toggle").forEach((btn) => {
//                 btn.classList.remove("open");
//             });

//             // เปิดเมนูย่อยและเปลี่ยนทิศทางลูกศร
//             dropdown.classList.add("active");
//             toggle.classList.add("open");
//         }
//     });
// });

// // ปิดเมนูย่อยเมื่อคลิกนอกเมนู
// document.addEventListener("click", (e) => {
//     if (!e.target.closest(".menu-item")) {
//         document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
//             menu.classList.remove("active");
//         });
//         document.querySelectorAll(".submenu-toggle").forEach((btn) => {
//             btn.classList.remove("open");
//         });
//     }
// });


// document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
//     toggle.addEventListener("click", (e) => {
//         e.preventDefault(); // ป้องกันพฤติกรรมเริ่มต้น
//         e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์ไปยังลิงก์ a

//         const dropdown = toggle.nextElementSibling; // เมนูย่อย
//         const isOpen = dropdown.classList.contains("active");

//         if (isOpen) {
//             // ถ้าเมนูย่อยเปิดอยู่ ให้ปิด
//             dropdown.classList.remove("active");
//             toggle.classList.remove("open");
//         } else {
//             // ปิดเมนูย่อยทั้งหมดก่อน
//             document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
//                 menu.classList.remove("active");
//             });

//             // รีเซ็ตสถานะลูกศรทั้งหมด
//             document.querySelectorAll(".submenu-toggle").forEach((btn) => {
//                 btn.classList.remove("open");
//             });

//             // เปิดเมนูย่อยและเปลี่ยนทิศทางลูกศร
//             dropdown.classList.add("active");
//             toggle.classList.add("open");
//         }
//     });
// });

// // ปิดเมนูย่อยเมื่อคลิกนอกเมนู
// document.addEventListener("click", (e) => {
//     if (!e.target.closest(".menu-item")) {
//         document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
//             menu.classList.remove("active");
//         });
//         document.querySelectorAll(".submenu-toggle").forEach((btn) => {
//             btn.classList.remove("open");
//         });
//     }
// });
// ฟังก์ชันสำหรับจัดการเมนูย่อยในมือถือ
function initMobileDropdown() {
    if (window.innerWidth <= 768) { // ตรวจสอบขนาดหน้าจอ
        document.querySelectorAll(".menu-item.has-submenu > .menu-link").forEach((link) => {
            let clickedOnce = false; // ตัวแปรเก็บสถานะการคลิกครั้งแรก
            link.addEventListener("click", (e) => {
                const dropdown = link.nextElementSibling.nextElementSibling; // เมนูย่อย (ul)
                e.preventDefault(); // ยกเลิกการนำลิ้งค์ไปทำงานทันที

                if (!clickedOnce) {
                    // แสดงเมนูย่อยถ้าคลิกครั้งแรก
                    document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
                        menu.classList.remove("active"); // ปิดเมนูอื่น
                    });

                    dropdown.classList.add("active"); // เปิดเมนูย่อยปัจจุบัน
                    clickedOnce = true; // อัปเดตสถานะการคลิก
                } else {
                    // ถ้าคลิกครั้งที่สอง ให้ไปยัง href ปกติ
                    window.location.href = link.getAttribute("href");
                }
            });
        });

        // จัดการการคลิกที่ปุ่มลูกศร
        document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
            toggle.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์ไปยังลิงก์ a
                const dropdown = toggle.nextElementSibling; // เมนูย่อย (ul)
                const isOpen = dropdown.classList.contains("active");

                if (isOpen) {
                    dropdown.classList.remove("active"); // ปิดเมนูย่อย
                    toggle.classList.remove("open"); // รีเซ็ตลูกศร
                } else {
                    // ปิดเมนูย่อยทั้งหมดก่อน
                    document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
                        menu.classList.remove("active");
                    });

                    document.querySelectorAll(".submenu-toggle").forEach((btn) => {
                        btn.classList.remove("open");
                    });

                    dropdown.classList.add("active"); // เปิดเมนูย่อยปัจจุบัน
                    toggle.classList.add("open"); // หมุนลูกศร
                }
            });
        });
    }
}

// รีเซ็ตเมนูทั้งหมดเมื่อคลิกนอกเมนู
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

// เรียกใช้ฟังก์ชันเมื่อโหลดหน้า
initMobileDropdown();

// เพิ่ม Event Listener เพื่อเช็คขนาดจอเมื่อปรับขนาด
window.addEventListener("resize", () => {
    initMobileDropdown();
});
