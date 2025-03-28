@media (max-width: 768px) and (orientation: landscape) {
    /* .bg-video-class {
        position: absolute;
        top: 0;
        left: 0.7;
        width: 100vw !important;
        height: 100vh !important;
        object-fit: cover;
        z-index: -1;
        pointer-events: none;
        border-radius: 10px;
    } */

    .bg-image-class {
        position: absolute;
        top: 0 !important;
        /* ✅ เอารูปกลับมาอยู่บนจอ */
        left: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        object-fit: contain !important;
        /* ✅ ปรับให้ครอบจอ */
        z-index: 0;
        pointer-events: none;
    }

    /* คอนเทนต์ */
    .class-content {
        position: relative;
        display: flex;
        height: 100vh;
        flex-direction: column;
        /* ปรับให้สมดุลกับ bg-video-class */
        justify-content: space-between;
        align-items: flex-end;
        /* ชิดล่าง */
        z-index: 2;
        padding-left: 20px;
        padding-right: 0px !important;
        font-size: 10px;
    }

    /* รายละเอียดคลาส */
    /* .class-details {
        position: absolute;
        right: 0;
     
        bottom: 0;
   
        width: 250px;
  
        height: auto;
        font-size: 12px;
        overflow: hidden;
    } */

    .class-sidebar-wrapper {
        position: absolute;
        left: 100px;
        /* ระยะห่างจากด้านซ้าย */
        top: 50%;
        /* ตรงกลางในแนวตั้ง */
        transform: translateY(-50%);
        /* ปรับให้อยู่ตรงกลางพอดี */
        width: 80px !important;
        /* ลดความกว้างให้สมดุล */
        height: 250px !important;
        /* ความสูงที่กำหนด */
        font-size: 8px;
        overflow: hidden;
        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .class-menu li {
        display: flex;
        flex-direction: column;
        /* ✅ จัดให้แนวตั้ง */
        align-items: center;
        /* ✅ จัดให้อยู่กลาง */
        justify-content: center;
        /* padding: 5px; */
        text-align: center;
    }


    .menu-icon {
        width: 30px !important;
        height: 30px !important;
        margin: 0 auto;
    }

    /* .class-stats img {
    width: 50px !important;

    height: 50px !important;
} */

    /* .class-image img {
        width: 200px !important;

        height: auto !important;

    } */

    .class-title {
        font-size: 15px;
    }
}

/* ✅ iPad แนวตั้ง */
@media (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {

    .class-page-section {
        width: 100%;
        height: auto;
        display: block;
        position: relative;
        overflow: hidden;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center center;

        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

        padding: 0px 0;
    }


    .bg-image-class {
        position: absolute;
        top: -120%;
        left: 0;
        width: 100vw !important;
        height: 100vh !important;

        object-fit: contain;
        /* ครอบคลุมพื้นที่ */
        z-index: 0;
        /* ให้อยู่ด้านหลัง */
        pointer-events: none;
        /* ปิดการโต้ตอบ */
        border-radius: 0px;
        /* ไม่มีขอบโค้ง */
        /* ให้รูปภาพอยู่ด้านหลังวิดีโอ */
        /* display: none; */
        /* เปิด/ปิด */

    }

    /* คอนเทนต์ */
    .class-content {
        position: relative;
        display: flex;
        height: 30vh;
        /* ปรับให้สมดุลกับ bg-video-class */
        justify-content: space-between;
        align-items: flex-end;
        /* ชิดล่าง */
        z-index: 2;
        padding-left: 20px;
        padding-right: 0px !important;
        font-size: 10px;
    }

    /* .bg-video-class {
        position: absolute;
        top: 0;
        left: 0;

        width: 100vw !important;
        height: 55vh !important;
        object-fit: cover;
        z-index: -1;
        pointer-events: none;
        border-radius: 0px;
    } */



    /* .class-details {
        position: absolute;
        right: 0;
     
        bottom: 0;
      
        width: auto !important;
  
        height: auto !important;
   
        font-size: 10px;
        overflow: hidden;
    } */

    .class-sidebar-wrapper {
        position: absolute;
        left: 2px;
        /* ระยะห่างจากด้านซ้าย */
        top: 50%;
        /* ตรงกลางในแนวตั้ง */
        transform: translateY(-50%);
        /* ปรับให้อยู่ตรงกลางพอดี */
        width: 60px !important;
        /* ลดความกว้างให้สมดุล */
        height: 150px !important;
        /* ความสูงที่กำหนด */
        font-size: 10px;
        overflow: hidden;
        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .class-sidebar {
        height: calc(100% - 60px);
        /* หักพื้นที่สำหรับปุ่มเลื่อน */
        overflow-y: auto;
        /* เปิด Scroll สำหรับ Sidebar */
        padding: 10px;
    }

    /* .class-stats img {
        width: 50px !important;
  
        height: 50px !important;
    } */

    /* .class-image img {
        width: 200px !important;

        height: auto !important;

    } */

    .class-title {
        margin-right: 10px;
        font-size: 15px;
    }

    /* .class-description {
        margin-right: 10px;
        font-size: 10px;
    } */
}


/* ✅ iPad และ Tablet (แนวนอน) */
@media (min-width: 1024px) and (max-width: 1400px) and (orientation: landscape) {
    .bg-image-class {
        position: absolute;
        top: 0 !important;
        /* ✅ เอารูปกลับมาอยู่บนจอ */
        left: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        object-fit: contain !important;
        /* ✅ ปรับให้ครอบจอ */
        z-index: 0;
        pointer-events: none;
    }


    .class-content {
        position: relative;
        display: flex;
        height: 100vh;
        flex-direction: column;

        justify-content: space-between;
        align-items: flex-end;

        z-index: 2;
        padding-left: 20px;
        padding-right: 0px !important;
        font-size: 10px;
    }


    .class-sidebar-wrapper {
        position: absolute;
        left: 30px;

        top: 50%;

        transform: translateY(-50%);

        width: 90px !important;

        height: 250px !important;

        font-size: 8px;
        overflow: hidden;
        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .menu-icon {
        width: 30px !important;
        height: 30px !important;
        margin: 0 auto;
    }

    .class-title {
        font-size: 15px;
    }
}
