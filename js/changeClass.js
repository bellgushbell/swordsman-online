

// /*แบบรุปภาพแทน */

// $(document).ready(function () {
//     const classData = {
//         class1: { detailsImage: 'images/Class-Pic/butung.jpg' },
//         class2: { detailsImage: 'images/Class-Pic/wangwaree.jpg' },
//         class3: { detailsImage: 'images/Class-Pic/muenbuppha.jpg' },
//         class4: { detailsImage: 'images/Class-Pic/bai-lu.jpg' },
//         class5: { detailsImage: 'images/Class-Pic/tian-ren.jpg' },
//         class6: { detailsImage: 'images/Class-Pic/mysterious-sword.jpg' },
//         class7: { detailsImage: 'images/Class-Pic/tian-wang.jpg' },
//         class8: { detailsImage: 'images/Class-Pic/chang-ger.jpg' },
//         class9: { detailsImage: 'images/Class-Pic/ancient-grave.jpg' },
//         class10: { detailsImage: 'images/Class-Pic/beggar-clan.jpg' },
//     };

//     function updateActiveClass(target) {
//         $('.class-menu li').removeClass('active');
//         target.addClass('active');

//         const classId = target.data('class');
//         const classInfo = classData[classId];

//         if (classInfo && classInfo.detailsImage) {
//             $('.bg-image-class').attr('src', classInfo.detailsImage);
//         } else {
//             console.error('ข้อมูลของ class ไม่พบ:', classId);
//         }
//     }

//     $('.class-menu li').on('click', function () {
//         updateActiveClass($(this));
//     });

//     $('#scrollUp').on('click', function () {
//         const sidebar = $('#classSidebar');
//         sidebar.scrollTop(sidebar.scrollTop() - 100);
//     });

//     $('#scrollDown').on('click', function () {
//         const sidebar = $('#classSidebar');
//         sidebar.scrollTop(sidebar.scrollTop() + 100);
//     });
// });



$(document).ready(function () {
    // ตรวจว่าเบราว์เซอร์รองรับ WebP หรือไม่
    function supportsWebP() {
        const elem = document.createElement('canvas');
        if (!!(elem.getContext && elem.getContext('2d'))) {
            return elem.toDataURL('image/webp').indexOf('data:image/webp') === 0;
        }
        return false;
    }

    const isWebpSupported = supportsWebP();
    console.log(`🔍Class รองรับ WebP: ${isWebpSupported ? '✅ ใช้ WebP' : '🟡 fallback เป็น JPG'}`);

    const classData = {
        class1: 'butung',
        class2: 'wangwaree',
        class3: 'muenbuppha',
        class4: 'bai-lu',
        class5: 'tian-ren',
        class6: 'mysterious-sword',
        class7: 'tian-wang',
        class8: 'chang-ger',
        class9: 'ancient-grave',
        class10: 'beggar-clan',
    };

    // 🔁 ล้อกชื่อภาพที่ระบบจะโหลดไว้ล่วงหน้า
    Object.entries(classData).forEach(([key, name], i) => {
        const file = isWebpSupported
            ? `images/Class-Pic/${name}.webp`
            : `images/Class-Pic/${name}.jpg`;

        console.log(`🖼️ Class ${i + 1} (${key}) → ไฟล์ที่จะโหลด: ${file}`);
    });

    function updateActiveClass(target) {
        $('.class-menu li').removeClass('active');
        target.addClass('active');

        const classId = target.data('class');
        const imageName = classData[classId];

        if (imageName) {
            const imagePath = isWebpSupported
                ? `images/Class-Pic/${imageName}.webp`
                : `images/Class-Pic/${imageName}.jpg`;

            $('.bg-image-class').attr('src', imagePath);

            console.log(`🎯 คลิก ${classId} → โหลดไฟล์: ${imagePath}`);
        } else {
            console.error('❌ ไม่พบ classId หรือชื่อภาพ:', classId);
        }
    }

    $('.class-menu li').on('click', function () {
        updateActiveClass($(this));
    });

    $('#scrollUp').on('click', function () {
        const sidebar = $('#classSidebar');
        sidebar.scrollTop(sidebar.scrollTop() - 100);
    });

    $('#scrollDown').on('click', function () {
        const sidebar = $('#classSidebar');
        sidebar.scrollTop(sidebar.scrollTop() + 100);
    });
});


