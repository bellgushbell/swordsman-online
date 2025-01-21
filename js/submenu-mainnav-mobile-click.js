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
// ฟังก์ชันสำหรับจัดการเมนูย่อยในมือถือ


document.querySelectorAll(".menu-item.has-submenu > .menu-link").forEach((link) => {
    let clickCount = 0; // ตัวแปรนับจำนวนการคลิก

    link.addEventListener("click", (e) => {
        e.preventDefault(); // ป้องกันการทำงานของลิงก์
        e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

        const dropdown = link.nextElementSibling.nextElementSibling; // เมนูย่อย (ul)

        clickCount++; // เพิ่มจำนวนการคลิก
        if (clickCount % 2 === 1) {
            // คลิกครั้งที่ 1 (เลขคี่)
            document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
                menu.classList.remove("active"); // ปิดเมนูอื่น
            });

            document.querySelectorAll(".submenu-toggle").forEach((btn) => {
                btn.classList.remove("open"); // รีเซ็ตลูกศรทั้งหมด
            });

            dropdown.classList.add("active"); // เปิดเมนูย่อย
            link.nextElementSibling.classList.add("open"); // หมุนลูกศร
        } else {
            // คลิกครั้งที่ 2 (เลขคู่)
            dropdown.classList.remove("active"); // ปิดเมนูย่อย
            link.nextElementSibling.classList.remove("open"); // รีเซ็ตลูกศร
            clickCount = 0; // รีเซ็ตการนับคลิก
        }
    });
});

// จัดการการคลิกที่ปุ่มลูกศร
document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
        e.preventDefault(); // ป้องกันพฤติกรรมเริ่มต้น
        e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

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
