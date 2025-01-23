window.addEventListener("load", function () {
    const loadingScreen = document.getElementById("loadingScreen");

    // เพิ่มคลาส 'hidden' เพื่อซ่อน Loading Screen
    setTimeout(() => {
        loadingScreen.classList.add("hidden");
    }, 1000); // ปรับเวลาให้เหมาะสม เช่น 1 วินาที
});
