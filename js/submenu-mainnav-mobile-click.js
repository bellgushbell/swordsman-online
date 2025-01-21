// เก็บสถานะการเปิด/ปิดเมนูย่อย
document.querySelectorAll('.menu-item.has-submenu > .menu-link').forEach((menuLink) => {
    let isMenuOpen = false;

    menuLink.addEventListener('click', (e) => {
        e.preventDefault(); // ป้องกันไม่ให้ลิงก์ทำงานทันที

        const submenu = menuLink.nextElementSibling; // เลือก dropdown menu

        // ปิดเมนูย่อยทั้งหมดก่อน
        document.querySelectorAll('.dropdown-menu-mainnav').forEach((dropdown) => {
            if (dropdown !== submenu) {
                dropdown.style.display = 'none';
            }
        });

        // สลับสถานะการเปิดเมนู
        if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
            isMenuOpen = false;
        } else {
            submenu.style.display = 'block';
            isMenuOpen = true;
        }
    });

    // ถ้ากดอีกครั้งเมื่อเมนูเปิดอยู่ ให้ยอมให้ไปยังหน้าลิงก์จริง
    menuLink.addEventListener('dblclick', () => {
        if (isMenuOpen) {
            window.location.href = menuLink.getAttribute('href');
        }
    });
});

// คลิกนอกเมนูเพื่อปิด
document.addEventListener('click', (e) => {
    if (!e.target.closest('.menu-item.has-submenu')) {
        document.querySelectorAll('.dropdown-menu-mainnav').forEach((dropdown) => {
            dropdown.style.display = 'none';
        });
    }
});
