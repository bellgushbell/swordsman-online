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


// document.querySelectorAll(".menu-item.has-submenu > .menu-link").forEach((link) => {
//     let clickedOnce = false; // ตัวแปรสำหรับสถานะการคลิก

//     link.addEventListener("click", (e) => {
//         e.preventDefault(); // ป้องกันไม่ให้ลิงก์ทำงาน
//         e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

//         const dropdown = link.nextElementSibling.nextElementSibling; // เมนูย่อย (ul)

//         if (!clickedOnce) {
//             // ถ้าเป็นการคลิกครั้งแรก (เลขคี่)
//             document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
//                 menu.classList.remove("active"); // ปิดเมนูอื่น
//             });

//             document.querySelectorAll(".submenu-toggle").forEach((btn) => {
//                 btn.classList.remove("open"); // รีเซ็ตลูกศรทั้งหมด
//             });

//             dropdown.classList.add("active"); // เปิดเมนูย่อยปัจจุบัน
//             link.nextElementSibling.classList.add("open"); // หมุนลูกศร
//             clickedOnce = true; // ตั้งค่าสถานะการคลิกเป็น true
//         } else {
//             // ถ้าเป็นการคลิกครั้งที่สอง (เลขคู่)
//             dropdown.classList.remove("active"); // ปิดเมนูย่อย
//             link.nextElementSibling.classList.remove("open"); // รีเซ็ตลูกศร
//             clickedOnce = false; // รีเซ็ตสถานะการคลิก
//             window.location.href = link.getAttribute("href"); // นำไปยังลิงก์
//         }
//     });
// });

// // จัดการการคลิกที่ปุ่มลูกศร
// document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
//     toggle.addEventListener("click", (e) => {
//         e.preventDefault(); // ป้องกันพฤติกรรมเริ่มต้น
//         e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

//         const dropdown = toggle.nextElementSibling; // เมนูย่อย (ul)
//         const isOpen = dropdown.classList.contains("active");

//         if (isOpen) {
//             dropdown.classList.remove("active"); // ปิดเมนูย่อย
//             toggle.classList.remove("open"); // รีเซ็ตลูกศร
//         } else {
//             // ปิดเมนูย่อยทั้งหมดก่อน
//             document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
//                 menu.classList.remove("active");
//             });

//             document.querySelectorAll(".submenu-toggle").forEach((btn) => {
//                 btn.classList.remove("open");
//             });

//             dropdown.classList.add("active"); // เปิดเมนูย่อยปัจจุบัน
//             toggle.classList.add("open"); // หมุนลูกศร
//         }
//     });
// });

// // รีเซ็ตเมนูทั้งหมดเมื่อคลิกนอกเมนู
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
$(document).ready(function () {
    $(".menu-item.has-submenu > .menu-link").each(function () {
        let clickedOnce = false; // ตัวแปรเก็บสถานะคลิก

        $(this).on("click", function (e) {
            e.preventDefault(); // ป้องกันการทำงานเริ่มต้นของลิงก์
            e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

            const $dropdown = $(this).siblings(".dropdown-menu-mainnav"); // เมนูย่อย

            if (!clickedOnce) {
                // คลิกครั้งแรก (เลขคี่)
                $(".dropdown-menu-mainnav").removeClass("active"); // ปิดเมนูอื่น
                $(".submenu-toggle").removeClass("open"); // รีเซ็ตลูกศร

                $dropdown.addClass("active"); // เปิดเมนูย่อยปัจจุบัน
                $(this).siblings(".submenu-toggle").addClass("open"); // หมุนลูกศร
                clickedOnce = true;
            } else {
                // คลิกครั้งที่สอง (เลขคู่)
                $dropdown.removeClass("active"); // ปิดเมนูย่อย
                $(this).siblings(".submenu-toggle").removeClass("open"); // รีเซ็ตลูกศร
                clickedOnce = false;

                // นำทางไปยังลิงก์
                window.location.href = $(this).attr("href");
            }
        });
    });

    // จัดการการคลิกที่ปุ่มลูกศร
    $(".submenu-toggle").on("click", function (e) {
        e.preventDefault(); // ป้องกันพฤติกรรมเริ่มต้น
        e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

        const $dropdown = $(this).siblings(".dropdown-menu-mainnav"); // เมนูย่อย
        const isOpen = $dropdown.hasClass("active");

        if (isOpen) {
            $dropdown.removeClass("active"); // ปิดเมนูย่อย
            $(this).removeClass("open"); // รีเซ็ตลูกศร
        } else {
            // ปิดเมนูย่อยทั้งหมดก่อน
            $(".dropdown-menu-mainnav").removeClass("active");
            $(".submenu-toggle").removeClass("open");

            $dropdown.addClass("active"); // เปิดเมนูย่อยปัจจุบัน
            $(this).addClass("open"); // หมุนลูกศร
        }
    });

    // ปิดเมนูย่อยเมื่อคลิกนอกเมนู
    $(document).on("click", function (e) {
        if (!$(e.target).closest(".menu-item").length) {
            $(".dropdown-menu-mainnav").removeClass("active"); // ปิดเมนูย่อย
            $(".submenu-toggle").removeClass("open"); // รีเซ็ตลูกศร
        }
    });
});