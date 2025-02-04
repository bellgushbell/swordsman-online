$(document).ready(function () {
    const tabButtons = $(".nav-link");
    const tabPanes = $(".tab-pane");

    function activateTab(tabId) {
        // ซ่อน tab-pane ทั้งหมด
        tabPanes.hide();

        // แสดง tab-pane ที่เลือก
        $(`#${tabId}-tab-pane`).show();

        // ตั้งค่า active ให้ปุ่ม
        tabButtons.removeClass("active");
        $(`[data-tab="${tabId}"]`).addClass("active");
    }

    // เพิ่ม event listener ให้ปุ่มทั้งหมด
    tabButtons.on("click", function () {
        const targetTab = $(this).data("tab");
        activateTab(targetTab);
    });

    // บังคับแสดงลิสต์ "ข่าว" ตอนเริ่มต้น
    activateTab("news");
});


document.querySelectorAll('.carousel-indicators-custom .indicator').forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        // เลื่อน Carousel ไปยัง Slide ที่ถูกเลือก
        const carousel = document.querySelector('#imageCarousel');
        const carouselInstance = bootstrap.Carousel.getInstance(carousel);
        carouselInstance.to(index);

        // กำหนด Active Class ให้ Indicators
        document.querySelectorAll('.carousel-indicators-custom .indicator').forEach(el => el.classList.remove('active'));
        indicator.classList.add('active');
    });
});

// อัปเดต Active Class ระหว่างเลื่อน Slide
const carouselElement = document.querySelector('#imageCarousel');
carouselElement.addEventListener('slid.bs.carousel', (e) => {
    const index = e.to;
    document.querySelectorAll('.carousel-indicators-custom .indicator').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.carousel-indicators-custom .indicator')[index].classList.add('active');
});
