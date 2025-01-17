function adjustImageToOverlay() {
    const wrapper = document.querySelector('.bg-image-wrapper');
    const img = wrapper.querySelector('img');
    const overlay = document.querySelector('.bg-image-overlay');

    img.style.width = `${overlay.offsetWidth}px`;
    img.style.height = `${overlay.offsetHeight}px`;
}

window.addEventListener('resize', adjustImageToOverlay);
window.addEventListener('load', adjustImageToOverlay);
