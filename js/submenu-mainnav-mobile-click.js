// // เก็บสถานะการเปิด/ปิดเมนูย่อย
// document.querySelectorAll('.menu-item.has-submenu > .menu-link').forEach((menuLink) => {
//     let isMenuOpen = false;

//     menuLink.addEventListener('click', (e) => {
//         e.preventDefault(); // ป้องกันไม่ให้ลิงก์ทำงานทันที

//         const submenu = menuLink.nextElementSibling; // เลือก dropdown menu

//         // ปิดเมนูย่อยทั้งหมดก่อน
//         document.querySelectorAll('.dropdown-menu-mainnav').forEach((dropdown) => {
//             if (dropdown !== submenu) {
//                 dropdown.style.display = 'none';
//             }
//         });

//         // สลับสถานะการเปิดเมนู
//         if (submenu.style.display === 'block') {
//             submenu.style.display = 'none';
//             isMenuOpen = false;
//         } else {
//             submenu.style.display = 'block';
//             isMenuOpen = true;
//         }
//     });

//     // ถ้ากดอีกครั้งเมื่อเมนูเปิดอยู่ ให้ยอมให้ไปยังหน้าลิงก์จริง
//     menuLink.addEventListener('dblclick', () => {
//         if (isMenuOpen) {
//             window.location.href = menuLink.getAttribute('href');
//         }
//     });
// });

// // คลิกนอกเมนูเพื่อปิด
// document.addEventListener('click', (e) => {
//     if (!e.target.closest('.menu-item.has-submenu')) {
//         document.querySelectorAll('.dropdown-menu-mainnav').forEach((dropdown) => {
//             dropdown.style.display = 'none';
//         });
//     }
// });



document.querySelectorAll(".menu-link").forEach((link) => {
    let isDropdownVisible = false; // สถานะการแสดงเมนูย่อย

    link.addEventListener("click", (e) => {
        const dropdown = link.nextElementSibling;

        if (dropdown && dropdown.classList.contains("dropdown-menu-mainnav")) {
            e.preventDefault(); // หยุดการทำงานของลิงก์ชั่วคราว
            if (!isDropdownVisible) {
                dropdown.style.display = "flex"; // แสดงเมนูย่อย
                isDropdownVisible = true;
            } else {
                window.location.href = link.href; // เข้าสู่ลิงก์ในคลิกครั้งที่สอง
                isDropdownVisible = false;
            }
        }
    });

    // ซ่อนเมนูเมื่อคลิกนอกเมนู
    document.addEventListener("click", (event) => {
        if (!link.contains(event.target)) {
            const dropdown = link.nextElementSibling;
            if (dropdown && dropdown.classList.contains("dropdown-menu-mainnav")) {
                dropdown.style.display = "none";
                isDropdownVisible = false;
            }
        }
    });
});
