document.querySelectorAll(".menu-item.has-submenu > .menu-link").forEach((link) => {
    link.addEventListener("click", (e) => {
        const dropdown = link.nextElementSibling;

        // แสดง/ซ่อนเมนูย่อย
        if (dropdown && dropdown.classList.contains("dropdown-menu-mainnav")) {
            e.preventDefault(); // ป้องกันการนำลิงก์ไปทำงาน
            const isOpen = dropdown.style.display === "block";
            dropdown.style.display = isOpen ? "none" : "block"; // แสดงหรือซ่อน
        }
    });
});
