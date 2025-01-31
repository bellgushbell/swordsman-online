// particlesJS("particles-js", {
//     "particles": {
//         "number": {
//             "value": 50, // จำนวนของ bubble
//             "density": {
//                 "enable": true,
//                 "value_area": 800
//             }
//         },
//         "color": {
//             "value": ["#f8b400", "#6fc3df", "#e45d5d", "#a3d977"] // สี bubble ที่หลากหลาย
//         },
//         "shape": {
//             "type": "circle", // รูปทรงของ bubble
//             "stroke": {
//                 "width": 0,
//                 "color": "#000000"
//             }
//         },
//         "opacity": {
//             "value": 0.8, // ความโปร่งใส
//             "random": true, // สุ่มความโปร่งใส
//             "anim": {
//                 "enable": true,
//                 "speed": 1, // ความเร็วของการกระพริบ
//                 "opacity_min": 0.2, // ความโปร่งใสน้อยสุด
//                 "sync": false
//             }
//         },
//         "size": {
//             "value": 10, // ขนาดเริ่มต้นของ bubble
//             "random": true, // สุ่มขนาด
//             "anim": {
//                 "enable": true,
//                 "speed": 10, // ความเร็วของการเปลี่ยนขนาด
//                 "size_min": 5, // ขนาดเล็กสุด
//                 "sync": false
//             }
//         },
//         "line_linked": {
//             "enable": false // ปิดการเชื่อมโยงเส้นระหว่าง bubble
//         },
//         "move": {
//             "enable": true, // เปิดการเคลื่อนไหว
//             "speed": 2, // ความเร็วของ bubble
//             "direction": "none", // ทิศทางการเคลื่อนไหว
//             "random": true, // การเคลื่อนที่แบบสุ่ม
//             "straight": false, // เคลื่อนที่เป็นเส้นตรงหรือไม่
//             "out_mode": "out", // ออกนอกจอได้
//             "attract": {
//                 "enable": false
//             }
//         }
//     },
//     "interactivity": {
//         "detect_on": "canvas",
//         "events": {
//             "onhover": {
//                 "enable": true,
//                 "mode": "bubble" // เอฟเฟกต์ bubble เมื่อชี้เมาส์
//             },
//             "onclick": {
//                 "enable": true,
//                 "mode": "push" // เพิ่ม bubble เมื่อคลิก
//             },
//             "resize": true
//         },
//         "modes": {
//             "bubble": {
//                 "distance": 200, // ระยะห่างที่เกิดเอฟเฟกต์ bubble
//                 "size": 20, // ขนาดของ bubble ที่เพิ่มขึ้นเมื่อ hover
//                 "duration": 2, // ระยะเวลาของเอฟเฟกต์
//                 "opacity": 0.8, // ความโปร่งใสระหว่างเอฟเฟกต์
//                 "speed": 3
//             },
//             "repulse": {
//                 "distance": 100,
//                 "duration": 0.4
//             },
//             "push": {
//                 "particles_nb": 4
//             },
//             "remove": {
//                 "particles_nb": 2
//             }
//         }
//     },
//     "retina_detect": true
// });


//ขาวได้แล้ว

particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 1, // จำนวนของ bubble
            "density": {
                "enable": true,
                "value_area": 500
            }
        },
        "color": {
            "value": "#ffffff"
        },
        "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000"
            }
        },
        "opacity": {
            "value": 0.6,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 1.5,
                "opacity_min": 0.2,
                "sync": false
            }
        },
        "size": {
            "value": 5,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 5,
                "size_min": 2,
                "sync": false
            }
        },
        "line_linked": {
            "enable": false
        },
        "move": {
            "enable": true,
            "speed": 1.8,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "attract": {
                "enable": false
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": true,
                "mode": "bubble"
            },
            "onclick": {
                "enable": true,
                "mode": "push"
            },
            "resize": true
        },
        "modes": {
            "push": {
                "particles_nb": 3
            },
            "bubble": {
                "distance": 150,
                "size": 5,
                "duration": 1,
                "opacity": 0.8,
                "speed": 3
            },
            "repulse": {
                "distance": 100,
                "duration": 0.4
            }
        }
    },
    "retina_detect": true
});

// ฟังก์ชันลบ particles ที่ถูกเพิ่มเข้ามาหลังจากเวลาที่กำหนด
function removeExtraParticles() {
    setInterval(() => {
        if (window.pJSDom && window.pJSDom.length > 0) {
            let particles = window.pJSDom[0].pJS.particles.array;
            if (particles.length > 1) {
                particles.splice(1, particles.length - 1); // ลบอนุภาคที่ถูกเพิ่มเข้ามา
            }
        }
    }, 10000); // กำหนดให้ particles หายไปใน 2 วินาที
}

// เรียกใช้งานฟังก์ชัน
removeExtraParticles();
