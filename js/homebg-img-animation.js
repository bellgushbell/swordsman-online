document.querySelectorAll('.bg-image-section').forEach((section) => {
    section.addEventListener('mousemove', (e) => {
        const x = (e.clientX / window.innerWidth - 0.5) * 20;
        const y = (e.clientY / window.innerHeight - 0.5) * 20;
        section.style.transform = `translate(${x}px, ${y}px) scale(1.1)`;
    });

    section.addEventListener('mouseleave', () => {
        section.style.transform = `translate(0, 0) scale(1)`;
    });
});
