// $(document).ready(function () {
//     // กำหนดตัวแปร clickedOnce สำหรับแต่ละเมนูย่อย
//     $(".menu-item.has-submenu").each(function () {
//         let clickedOnce = false; // ตัวแปรเก็บสถานะคลิกของเมนูนี้

//         // จัดการคลิกที่ลิงก์ (ข่าว)
//         $(this)
//             .find(".menu-link")
//             .on("click", function (e) {
//                 e.preventDefault(); // ป้องกันการทำงานเริ่มต้นของลิงก์
//                 e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

//                 const $dropdown = $(this).siblings(".dropdown-menu-mainnav"); // เมนูย่อย

//                 if (!clickedOnce) {
//                     // คลิกครั้งแรก (เลขคี่)
//                     $(".dropdown-menu-mainnav").removeClass("active"); // ปิดเมนูอื่น
//                     $(".submenu-toggle").removeClass("open"); // รีเซ็ตลูกศร

//                     $dropdown.addClass("active"); // เปิดเมนูย่อยปัจจุบัน
//                     $(this).siblings(".submenu-toggle").addClass("open"); // หมุนลูกศร
//                     clickedOnce = true; // อัปเดตสถานะคลิก
//                 } else {
//                     // คลิกครั้งที่สอง (เลขคู่)
//                     $dropdown.removeClass("active"); // ปิดเมนูย่อย
//                     $(this).siblings(".submenu-toggle").removeClass("open"); // รีเซ็ตลูกศร
//                     clickedOnce = false; // รีเซ็ตสถานะคลิก

//                     // นำทางไปยังลิงก์
//                     window.location.href = $(this).attr("href");
//                 }
//             });
//     });

//     // จัดการการคลิกที่ปุ่มลูกศร
//     $(".submenu-toggle").on("click", function (e) {
//         e.preventDefault(); // ป้องกันพฤติกรรมเริ่มต้น
//         e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

//         const $dropdown = $(this).siblings(".dropdown-menu-mainnav"); // เมนูย่อย
//         const isOpen = $dropdown.hasClass("active");

//         if (isOpen) {
//             $dropdown.removeClass("active"); // ปิดเมนูย่อย
//             $(this).removeClass("open"); // รีเซ็ตลูกศร
//         } else {
//             // ปิดเมนูย่อยทั้งหมดก่อน
//             $(".dropdown-menu-mainnav").removeClass("active");
//             $(".submenu-toggle").removeClass("open");

//             $dropdown.addClass("active"); // เปิดเมนูย่อยปัจจุบัน
//             $(this).addClass("open"); // หมุนลูกศร
//         }
//     });

//     // ปิดเมนูย่อยเมื่อคลิกนอกเมนู
//     $(document).on("click", function (e) {
//         if (!$(e.target).closest(".menu-item").length) {
//             $(".dropdown-menu-mainnav").removeClass("active"); // ปิดเมนูย่อย
//             $(".submenu-toggle").removeClass("open"); // รีเซ็ตลูกศร
//         }
//     });
// });








// $(document).ready(function () {
//     // จัดการการคลิกที่ <span> ลูกศร
//     $(".submenu-toggle").on("click", function (e) {
//         e.preventDefault(); // ป้องกันพฤติกรรมเริ่มต้น
//         e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์

//         const $dropdown = $(this).siblings(".dropdown-menu-mainnav"); // เลือกเมนูย่อย (ul)
//         const isActive = $dropdown.hasClass("active");

//         if (isActive) {
//             // ถ้าเมนูเปิดอยู่ ให้ปิด
//             $dropdown.removeClass("active");
//             $(this).removeClass("open"); // รีเซ็ตลูกศร
//         } else {
//             // ปิดเมนูย่อยทั้งหมดก่อน
//             $(".dropdown-menu-mainnav").removeClass("active");
//             $(".submenu-toggle").removeClass("open");

//             // เปิดเมนูย่อยปัจจุบัน
//             $dropdown.addClass("active");
//             $(this).addClass("open"); // หมุนลูกศร
//         }
//     });

//     // ป้องกันการคลิกที่ <a> ทำงานเมื่อเป็นมือถือ
//     $(".menu-item.has-submenu > .menu-link").on("click", function (e) {
//         e.preventDefault(); // ป้องกันลิงก์ทำงาน
//         e.stopPropagation(); // หยุดการส่งต่อเหตุการณ์
//     });

//     // ปิดเมนูย่อยเมื่อคลิกนอกเมนู
//     $(document).on("click", function (e) {
//         if (!$(e.target).closest(".menu-item").length) {
//             $(".dropdown-menu-mainnav").removeClass("active"); // ปิดเมนูย่อย
//             $(".submenu-toggle").removeClass("open"); // รีเซ็ตลูกศร
//         }
//     });
// });






// document.addEventListener("DOMContentLoaded", function () {
//     if (window.innerWidth <= 768) {
//         // จัดการการคลิกที่ปุ่มลูกศร
//         document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
//             toggle.addEventListener("click", function (e) {
//                 e.preventDefault();
//                 e.stopPropagation();

//                 const dropdown = this.nextElementSibling; // เมนูย่อย (ul)
//                 const isActive = dropdown.classList.contains("active");

//                 if (isActive) {
//                     // ถ้าปุ่มเปิดอยู่ ให้ปิด (ซ่อนเมนู)
//                     dropdown.style.display = "none"; // ซ่อน dropdown
//                     dropdown.classList.remove("active");
//                     this.classList.remove("open");
//                 } else {
//                     // ปิดเมนูอื่นทั้งหมดก่อน
//                     document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
//                         menu.style.display = "none"; // ซ่อนเมนูอื่นทั้งหมด
//                         menu.classList.remove("active");
//                     });
//                     document.querySelectorAll(".submenu-toggle").forEach((btn) => {
//                         btn.classList.remove("open");
//                     });

//                     // เปิดเมนูปัจจุบัน
//                     dropdown.style.display = "flex"; // แสดง dropdown
//                     dropdown.classList.add("active");
//                     this.classList.add("open");
//                 }
//             });
//         });

//         // ปิดเมนูเมื่อคลิกนอกเมนู
//         document.addEventListener("click", function (e) {
//             if (!e.target.closest(".menu-item")) {
//                 document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
//                     menu.style.display = "none"; // ซ่อน dropdown
//                     menu.classList.remove("active");
//                 });
//                 document.querySelectorAll(".submenu-toggle").forEach((btn) => {
//                     btn.classList.remove("open");
//                 });
//             }
//         });
//     }
// });

document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth <= 768) {
        // จัดการการคลิกที่ปุ่มลูกศร
        document.querySelectorAll(".submenu-toggle").forEach((toggle) => {
            toggle.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();

                const dropdown = this.closest(".menu-item").querySelector(".dropdown-menu-mainnav");
                const isActive = dropdown.classList.contains("active");

                if (isActive) {
                    // ถ้าปุ่มเปิดอยู่ ให้ปิด
                    dropdown.classList.remove("active");
                    dropdown.style.display = "none";
                    this.classList.remove("open");
                } else {
                    // ปิดเมนูอื่นทั้งหมดก่อน
                    document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
                        menu.classList.remove("active");
                        menu.style.display = "none";
                    });
                    document.querySelectorAll(".submenu-toggle").forEach((btn) => {
                        btn.classList.remove("open");
                    });

                    // เปิดเมนูปัจจุบัน
                    dropdown.classList.add("active");
                    dropdown.style.display = "flex";
                    this.classList.add("open");
                }
            });
        });

        // ปิดเมนูเมื่อคลิกนอกเมนู
        document.addEventListener("click", function (e) {
            if (!e.target.closest(".menu-item")) {
                document.querySelectorAll(".dropdown-menu-mainnav").forEach((menu) => {
                    menu.classList.remove("active");
                    menu.style.display = "none";
                });
                document.querySelectorAll(".submenu-toggle").forEach((btn) => {
                    btn.classList.remove("open");
                });
            }
        });
    }
});
