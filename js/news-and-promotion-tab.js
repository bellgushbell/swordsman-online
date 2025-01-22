$(document).ready(function () {
    const tabButtons = $(".nav-link");
    const tabPanes = $(".tab-pane");

    function activateTab(tabId) {
        // ซ่อน tab-pane ทั้งหมด
        tabPanes.hide();

        // แสดง tab-pane ที่เลือก
        $(`#${tabId}`).show();

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

function activateTab(tabId) {
    console.log(`Activating tab: ${tabId}`);
    tabPanes.hide();
    $(`#${tabId}`).show();
    tabButtons.removeClass("active");
    $(`[data-tab="${tabId}"]`).addClass("active");
}

