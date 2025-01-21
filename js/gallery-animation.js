function openModal(imageSrc) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    modalImage.src = imageSrc;
    modal.classList.add('active');
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('active');
}

let requestId;

function handleMouseMove(e, card) {
    if (requestId) return;

    requestId = requestAnimationFrame(() => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        // ลดองศาการหมุนเพื่อไม่ให้เอียงผิดธรรมชาติ
        const rotateX = ((centerY - y) / centerY) * 10; // หมุนแกน X เล็กน้อย
        const rotateY = ((centerX - x) / centerX) * -10; // หมุนแกน Y เล็กน้อย

        // เพิ่มการเลื่อนลงเพื่อให้เหมือนถูกผลัก
        card.style.transform = `perspective(1000px) translateZ(10px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;

        requestId = null;
    });
}

function handleMouseLeave(card) {
    // รีเซ็ตการ์ดกลับสู่ตำแหน่งปกติ
    card.style.transform = `perspective(1000px) translateZ(0px) rotateX(0deg) rotateY(0deg) scale(1)`;
}

// Attach listeners dynamically
document.querySelectorAll('.card').forEach((card) => {
    card.addEventListener('mousemove', (e) => handleMouseMove(e, card));
    card.addEventListener('mouseleave', () => handleMouseLeave(card));
});

