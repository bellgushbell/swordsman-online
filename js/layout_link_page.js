fetch('layout/header.html')
    .then(response => response.text())
    .then(data => {
        const headerContainer = document.getElementById('header-container');
        if (headerContainer) {
            headerContainer.innerHTML = data;
        } else {
            console.error("❌ #header-container not found in DOM");
        }
    });

// fetch('layout/menu.html')
//     .then(response => response.text())
//     .then(data => {
//         const menuContainer = document.getElementById('menu-container');
//         if (menuContainer) {
//             menuContainer.innerHTML = data;
//         } else {
//             console.error("❌ #menu-container not found in DOM");
//         }
//     });

// fetch('layout/footer.html')
//     .then(response => response.text())
//     .then(data => {
//         const footerContainer = document.getElementById('footer-container');
//         if (footerContainer) {
//             footerContainer.innerHTML = data;
//         } else {
//             console.error("❌ #footer-container not found in DOM");
//         }
//     });
// document.addEventListener("DOMContentLoaded", () => {
//     const footerContainer = document.getElementById('footer-container');
//     if (footerContainer) {
//         footerContainer.style.display = "none"; // แสดง footer
//         console.log("✅ #footer-container is loaded.");
//     } else {
//         console.error("❌ #footer-container is not found in DOM.");
//     }
// });
