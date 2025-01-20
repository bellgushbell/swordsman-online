document.addEventListener("DOMContentLoaded", () => {
    const swiper = new Swiper(".swiper-container", {
        loop: true, // วนลูปสไลด์
        slidesPerView: 3, // แสดง 3 สไลด์พร้อมกัน
        spaceBetween: 50, // เพิ่มระยะห่างระหว่างสไลด์
        centeredSlides: true, // จัดสไลด์ให้ตรงกลาง
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        on: {
            init: function () {
                this.update();
            },
        },
    });
});
