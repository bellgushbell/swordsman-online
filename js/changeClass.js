// $(document).ready(function () {
//     const classData = {
//         class1: {
//             video: 'video/class1.mp4',
//             title: 'อาชีพที่ 1',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 1...',
//             image: 'images/class1.png',
//             stats: 'images/ClassStatus/class1-status.png'
//         },
//         class2: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 2',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 2...',
//             image: 'images/class2.png',
//             stats: 'images/ClassStatus/class2-status.png'
//         }, class3: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 3',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 3...',
//             image: 'images/class3.png',
//             stats: 'images/ClassStatus/class3-status.png'
//         },
//         class4: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 4',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 4...',
//             image: 'images/class4.png',
//             stats: 'images/ClassStatus/class4-status.png'
//         },
//         class5: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 5',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 5...',
//             image: 'images/class5.png',
//             stats: 'images/ClassStatus/class5-status.png'
//         },
//         class6: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 6',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 6...',
//             image: 'images/class6.png',
//             stats: 'images/ClassStatus/class6-status.png'
//         },
//         class7: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 7',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 7...',
//             image: 'images/class7.png',
//             stats: 'images/ClassStatus/class7-status.png'
//         },
//         class8: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 8',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 8...',
//             image: 'images/class8.png',
//             stats: 'images/ClassStatus/class8-status.png'
//         },
//         class9: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 9',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 9...',
//             image: 'images/class9.png',
//             stats: 'images/ClassStatus/class9-status.png'
//         },
//         class10: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 10',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 10...',
//             image: 'images/class10.png',
//             stats: 'images/ClassStatus/class10-status.png'
//         },
//         class11: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 11',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 11...',
//             image: 'images/class11.png',
//             stats: 'images/ClassStatus/class11-status.png'
//         },
//         class12: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 12',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 12...',
//             image: 'images/class12.png',
//             stats: 'images/ClassStatus/class12-status.png'
//         },
//         class13: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 13',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 13...',
//             image: 'images/class13.png',
//             stats: 'images/ClassStatus/class13-status.png'
//         },
//         class14: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 14',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 14...',
//             image: 'images/class14.png',
//             stats: 'images/ClassStatus/class14-status.png'
//         },
//         class15: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 15',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 15...',
//             image: 'images/class15.png',
//             stats: 'images/ClassStatus/class15-status.png'
//         },
//         class16: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 16',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 16...',
//             image: 'images/class16.png',
//             stats: 'images/ClassStatus/class16-status.png'
//         },
//         class17: {
//             video: 'video/video.mp4',
//             title: 'อาชีพที่ 17',
//             description: 'รายละเอียดเกี่ยวกับอาชีพที่ 17...',
//             image: 'images/class17.png',
//             stats: 'images/ClassStatus/class17-status.png'
//         }

//     };

//     // ฟังก์ชันอัปเดตคลาส `active` และแสดงข้อมูล
//     function updateActiveClass(target) {
//         $('.class-menu li').removeClass('active'); // ลบ active ทุก <li>
//         target.addClass('active'); // เพิ่ม active ให้กับ <li> ที่เลือก

//         const classId = target.data('class'); // ดึง data-class จาก <li>
//         const { video, title, description, image, stats } = classData[classId];

//         // อัปเดตเนื้อหาใน DOM
//         $('#classVideo').attr('src', video);
//         $('#classTitle').text(title);
//         $('#classDescription').text(description);
//         $('#classImage').attr('src', image);
//         $('#statImage').attr('src', stats);
//     }

//     // เมื่อคลิกที่ Class Menu
//     $('.class-menu li').on('click', function () {
//         updateActiveClass($(this)); // อัปเดตสถานะ active
//     });



//     // Scroll Buttons
//     $('#scrollUp').on('click', function () {
//         const sidebar = $('#classSidebar');
//         sidebar.scrollTop(sidebar.scrollTop() - 200); // เลื่อนขึ้น
//     });

//     $('#scrollDown').on('click', function () {
//         const sidebar = $('#classSidebar');
//         sidebar.scrollTop(sidebar.scrollTop() + 200); // เลื่อนลง
//     });
// });


/*แบบรุปภาพแทน */

$(document).ready(function () {
    const classData = {
        class1: { detailsImage: 'images/Class-Pic/ข้อมูลตัวละคร-บูตึ้ง.jpg' },
        class2: { detailsImage: 'images/Class-Pic/ข้อมูลตัวละคร-วังวารี.jpg' },
        class3: { detailsImage: 'images/Class-Pic/ข้อมูลตัวละคร-หมื่นบุปผา.jpg' },
        class4: { detailsImage: 'images/Class-Pic/ข้อมูลตัวละคร-ไป๋ลู่.jpg' },
        class5: { detailsImage: 'images/Class-Pic/ข้อมูลตัวละคร-เทียนเหริ่น.jpg' },
        class6: { detailsImage: 'images/Class-Pic/ข้อมูลตัวละคร-กระบี่ลี้ลับ.jpg' },
        class7: { detailsImage: 'images/Class-Pic/ข้อมูลตัวละคร-เทียนหวัง.jpg' },
    };

    function updateActiveClass(target) {
        $('.class-menu li').removeClass('active');
        target.addClass('active');

        const classId = target.data('class');
        const classInfo = classData[classId];

        if (classInfo && classInfo.detailsImage) {
            $('.bg-image-class').attr('src', classInfo.detailsImage);
        } else {
            console.error('ข้อมูลของ class ไม่พบ:', classId);
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
