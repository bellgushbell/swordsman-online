// document.addEventListener("DOMContentLoaded", () => {
//     const swiper = new Swiper(".swiper-container", {
//         loop: true, // วนลูปสไลด์
//         slidesPerView: 3, // แสดง 3 สไลด์พร้อมกัน
//         spaceBetween: 50, // เพิ่มระยะห่างระหว่างสไลด์
//         centeredSlides: true, // จัดสไลด์ให้ตรงกลาง
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev",
//         },
//         autoplay: {
//             delay: 3000,
//             disableOnInteraction: false,
//         },
//         on: {
//             init: function () {
//                 this.update();
//             },
//         },
//         effect: "slide",
//     });
// });
document.addEventListener("DOMContentLoaded", () => {
    const swiper = new Swiper(".swiper-container", {
        loop: true,
        slidesPerView: 3,
        spaceBetween: 50,
        centeredSlides: true,
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
        effect: "slide",
        on: {
            init: function () {
                this.update();

                // 🔍 ตรวจสอบว่าใช้ภาพ WebP หรือ PNG
                setTimeout(() => {
                    const slides = document.querySelectorAll(".swiper-slide picture img");
                    slides.forEach((img, index) => {
                        const usedSrc = img.currentSrc || img.getAttribute("src");

                        if (!usedSrc) {
                            // console.warn(`⚠️ Slide ${index + 1} ยังโหลด src ไม่เสร็จ`);
                            return;
                        }

                        if (usedSrc.includes(".webp")) {
                            // console.log(`✅ Slide ${index + 1} ใช้ WebP:`, usedSrc);
                        } else if (usedSrc.includes(".png")) {
                            // console.log(`🟡 Slide ${index + 1} fallback PNG:`, usedSrc);
                        } else {
                            // console.warn(`❌ Slide ${index + 1} ไม่รู้ว่าใช้ไฟล์อะไร:`, usedSrc);
                        }
                    });
                }, 1000); // รอโหลดรูปให้เสร็จก่อนเช็ก
            },
        },
    });
});
