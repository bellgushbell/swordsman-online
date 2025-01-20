// เพิ่มการแบ่งส่วนด้วย JavaScript
document.addEventListener("DOMContentLoaded", () => {
    const wrapper = document.querySelector(".bg-image-wrapper");

    // แบ่งออกเป็น 7 ส่วน
    for (let i = 0; i < 7; i++) {
        const section = document.createElement("div");
        section.style.backgroundPosition = `${(i * 14.28).toFixed(2)}% 0`; // กำหนดตำแหน่งแต่ละส่วน
        wrapper.appendChild(section);
    }

    // เพิ่มอนิเมชัน
    document.querySelectorAll(".bg-image-wrapper > div").forEach((section, index) => {
        section.addEventListener("mousemove", (e) => {
            const x = (e.clientX / window.innerWidth - 0.5) * 10; // ความเอียงในแนวนอน
            const y = (e.clientY / window.innerHeight - 0.5) * 10; // ความเอียงในแนวตั้ง
            gsap.to(section, {
                scale: 1.2, // ขยายเมื่อ hover
                x: x, // เลื่อนแนวนอน
                y: y, // เลื่อนแนวตั้ง
                duration: 0.5,
                ease: "power1.out", // เพิ่มความลื่นไหล
            });
        });

        section.addEventListener("mouseleave", () => {
            gsap.to(section, {
                scale: 1, // กลับไปขนาดปกติ
                x: 0,
                y: 0,
                duration: 0.5,
                ease: "power1.out",
            });
        });
    });
});
