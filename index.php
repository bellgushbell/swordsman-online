<!-- <script src="js/layout_link_page.js" defer></script> -->
<!-- GreenSock Animation Platform -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<!-- scroll trigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<!-- scroll Plugin ล้อกสกอเม้าส์-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>

<!-- Favicons -->
<link rel="shortcut icon" href="images/shortcut-icon.png">

<!-- 
<div id="header-container"></div> -->
<!-- Change the value of lang="en" attribute if your website's language is not English.
You can find the code of your language here - https://www.w3schools.com/tags/ref_language_codes.asp -->
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="author" content="EXPUP">
    <link rel="canonical" href="https://swordsman3.com/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="description" content="เกมกระบี่เย้ยยุทธจักร3 (Swordsman3) เกม MMORPG แนวกำลังภายใน ซึ่งบริษัท EXP UP จำกัด ประกาศความร่วมมือกับบริษัท Kingsoft ในการได้มาซึ่งสิทธิ์การให้บริการเกม Swordsman World3 ในประเทศไทย">
    <meta name="keywords" content="Swordsman3, กระบี่เย้ยยุทธจักร ,กระบี่เย้ยยุทธจักร3 ,swordsman ,กระบี่ ,เกมกระบี่ ,จอมยุทธ ,เกมสำนัก ,กำลังภายใน ,เกมกำลังภายใน ,วรยุทธ ,กระบี่พิชิตมาร ,เก้ากระบี่เดียวดาย , เกมกระบี่เย้ยยุทธจักร3 ,MMORPG"> -->
    <meta name="description" content="เกมกระบี่เย้ยยุทธจักร3 (Swordsman3) เกม MMORPG แนวกำลังภายใน ซึ่งบริษัท EXP UP จำกัด ประกาศความร่วมมือกับบริษัท Kingsoft ในการได้มาซึ่งสิทธิ์การให้บริการเกม Swordsman World3 ในประเทศไทย">
    <meta name="keywords" content="Swordsman3, กระบี่เย้ยยุทธจักร ,กระบี่เย้ยยุทธจักร3 ,swordsman ,กระบี่ ,เกมกระบี่ ,จอมยุทธ ,เกมสำนัก ,กำลังภายใน ,เกมกำลังภายใน ,วรยุทธ ,กระบี่พิชิตมาร ,เก้ากระบี่เดียวดาย , เกมกระบี่เย้ยยุทธจักร3 ,MMORPG">
    <title>กระบี่เย้ยยุทธจักร3 swordsman3 Mobile</title>


    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="css/vertical-rhythm.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/splitting.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Preload Video -->
    <!-- <link rel="preload" as="fetch" href="video/swordsman-3-video-web-ver01-final-pc.mp4" type="video/mp4" crossorigin="anonymous">
    <link rel="preload" as="fetch" href="video/swordsman-3-video-web-ver01-final-mobile.mp4" type="video/mp4" crossorigin="anonymous"> -->

        <!-- แยกโหลดล่วงหน้ามือถือ/คอม -->
        <!-- <script>
        const preload = document.createElement('link');
        preload.rel = 'preload';
        preload.as = 'fetch';
        preload.type = 'video/mp4';
        preload.href = isMobile
            ? 'video/swordsman-3-video-web-ver01-final-mobile.mp4'
            : 'video/swordsman-3-video-web-ver01-final-pc.mp4';
        preload.crossOrigin = 'anonymous';
        document.head.appendChild(preload);

        </script> -->


    <!-- swiper highlight -->
    <!-- CSS ของ Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@11.2.6/swiper-bundle.min.css" />
    <!-- JS ของ Swiper -->
    <script src="https://unpkg.com/swiper@11.2.6/swiper-bundle.min.js"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    


    <!-- font prompt -->
    <script type="e3b09c3dc2113874ef6e7812-text/javascript">
        WebFont.load({
            google: {
                families: [
                    "Prompt:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic:latin,thai",
                ],
            },
        });
    </script>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1133484845101990');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1133484845101990&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YQBP9C72H3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-YQBP9C72H3');
    </script>


    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WKMDJPGM');
    </script>
    <!-- End Google Tag Manager -->


    <!-- Hotjar Tracking Code for SW3 -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 5300044,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>


    <meta name="google-site-verification" content="aoWtdh5IPB2qY9vXUJv4WHbc90NAUKNtgL9_t8CYoMc" />

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1184062776628862');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1184062776628862&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11490628923"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-11490628923');
    </script>


    <!-- Event snippet for Website Click conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-11490628923/nfKGCNqvkJ8aELuqlOcq'
        });
    </script>

    <script src="https://analytics.ahrefs.com/analytics.js" data-key="XQIuBBNfnYVxBEj6iQNvwQ" async></script>

    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <!-- framer motion -->
    <!-- <script src="https://unpkg.com/framer-motion/dist/framer-motion.umd.min.js"></script> -->


    <!-- Motion One -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@motionone/dom/dist/motion.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@motionone/dom"></script> -->


</head>


<body class="appear-animate" >



    <!-- particle js จุลภาค -->
    <!-- <div id="particles-js"></div> -->

    <!--  End particle js จุลภาค -->

    <!-- !!!!! -->

    <!--Navigation panel-->

    <!-- <nav class="main-nav dark dark-after-scroll transparent stick-fixed wow-menubar">
    <div class=" relative clearfix gradient-bg">


        <div class="nav-logo-wrap local-scroll">
            <a href="#" class="logo">

                <img src="images/Logo SwordMan3-Final-white-transparent.png" alt="Company logo" width="250" height="50"
                    class="logo-white" />
            </a>

        </div>


        <div class="mobile-nav" role="button" tabindex="0">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Menu</span>
        </div>

        <div class="inner-nav desktop-nav">
            <ul class="clearlist scroll-nav local-scroll">
                <li>
                    <a href="#home">หน้าหลัก</a>
                </li>
                <li class="menu-item has-submenu">




                    <a href="#" class="menu-link nav-tag-desktop notify">ข่าว</a>


                    <div class="menu-header">
                        <a href="#" class="menu-link notify">ข่าว</a>
                        <button class="submenu-toggle" aria-label="Toggle submenu">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                    </div>

                    <ul class="dropdown-menu-mainnav">
                        <li><a href="#" class="notify">ประกาศ</a></li>
                        <li><a href="#" class="notify">กิจกรรม</a></li>
                        <li><a href="#" class="notify">โปรโมชั่น</a></li>
                    </ul>
                </li>
                <li class="menu-item has-submenu">


                    <a href="#" class="menu-link nav-tag-desktop notify">ไกด์</a>


                    <div class="menu-header">
                        <a href="#" class="menu-link notify">ไกด์</a>
                        <button class="submenu-toggle" aria-label="Toggle submenu">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                    </div>
                    <ul class="dropdown-menu-mainnav">
                        <li><a href="#" class="notify">แนะนำตัวละคร</a></li>
                        <li><a href="#" class="notify">วิธีสมัครสมาชิก</a></li>
                        <li><a href="#" class="notify">วิธีดาวน์โหลดเกม</a></li>
                        <li><a href="#" class="notify">คู่มือการเล่น</a></li>
                        <li><a href="#" class="notify">วิธีเติมเงิน</a></li>
                        <li><a href="#" class="notify">วิธีใช้งานไอเท็มโค้ด</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="notify">ร้านค้า</a>
                </li>
                <li>
                    <a href="#" class="notify">ดาวน์โหลด</a>
                </li>
                <li class="menu-item has-submenu">

                    <a href="#" class="menu-link nav-tag-desktop notify">ติดต่อ</a>

                    <div class="menu-header">
                        <a href="#" class="menu-link notify">ติดต่อ</a>
                        <button class="submenu-toggle" aria-label="Toggle submenu">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                    </div>
                    <ul class="dropdown-menu-mainnav">
                        <li><a href="#" class="notify">แจ้งปัญหา</a></li>
                    </ul>
                </li>
            </ul>
        </div>

<div class="member-btn dropdown">
    <a href="#" class="btn d-flex align-items-center gap-2 dropdown-toggle" id="memberDropdown"
        data-bs-toggle="dropdown" aria-expanded="false">
        |
        <img src="images/member-icon.gif" alt="Member Icon" width="30" />
        สมาชิก
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="memberDropdown">
        <li><a class="dropdown-item notify" href="login.html">เข้าสู่ระบบ</a></li>
        <li><a class="dropdown-item notify" href="register.html">สมัครสมาชิก</a></li>
    </ul>
</div>


      
        <script>

            document.addEventListener('DOMContentLoaded', function () {

                const notifyLinks = document.querySelectorAll('.notify');


                notifyLinks.forEach(link => {
                    link.addEventListener('click', function (event) {
                        event.preventDefault();

                        Swal.fire({
                            html: `
                    <div style="text-align: center;">
                        <img src="images/error-icon.png" alt="Error Icon" style="width: 100px; height: auto; " />
                        
                        <h5><br>เร็วๆ นี้!</h5>
                    </div>
                `,
                            customClass: {
                                popup: 'custom-swal-popup' // ตั้ง class custom
                            },
                            showConfirmButton: false,


                        });
                    });
                });
            });



        </script>

    </div>
</nav> -->


    <!-- End Navigation panel -->


    <!-- Sidebar Navigation Panel -->

   


    <main id="main" style="background: url('images/background/bg.jpeg') no-repeat center center; background-size: cover; z-index: -9999;">

        <!-- Home Section -->
        <section id="home-section" class="home-section bg-dark-alfa-30 light-content relative"
            data-background="images/webcover-fallback-opening-game.jpg" id="home">
            <div class="container height-100vh d-flex align-items-center">

                <!-- BG Video BG Init -->
                <!-- Please replace the video files in folder "video" with your own videos -->



                <div class="bg-video-wrapper">
                    <video class="bg-video" poster="images/webcover-videoimage.jpg" preload="auto" autoplay muted loop
                        playsinline>
                        <source src="video/swordsman-3-video-web-ver01-final-pc.mp4" type="video/mp4">
                    </video>

                    <video class="bg-video-mobile" poster="images/webcover-videoimage.jpg" preload="auto" autoplay muted
                        loop playsinline>
                        <source src="video/swordsman-3-video-web-ver01-final-mobile.mp4" type="video/mp4">
                    </video>

                    <div class="text-overlay">
                        <img src="images/text-video.png" alt="Overlay Text" class="overlay-text" loading="lazy">
                    </div>
                </div>

                <!-- BG Video BG Init แบบpreregister opening-->
                <!-- <div class="bg-video-wrapper">
                    <video class="bg-video" poster="images/webcover-fallback-opening-game.jpg" preload="auto" autoplay muted loop playsinline>
                        <source src="video/opening-game-video-pc.mp4" type="video/mp4">
                    </video>

                    <video class="bg-video-mobile" poster="images/webcover-fallback-opening-game.jpg" preload="auto" autoplay muted loop
                        playsinline>
                        <source src="video/opening-game-video-mobile.mp4" type="video/mp4">
                    </video> -->





                <!-- BG Image แบบรูป-->
                <!-- <img src="images/ปกเว็บมือภือ.jpg" class="bg-image-mobile" alt="Background Image mobile">
                    <img src="images/ปกWeb2560x1440.jpg" class="bg-image-landscape"
                        alt="Background Image mobile landscape"> -->

                <div class="bg-video-overlay bg-dark-alfa-30"></div>
            </div>
            <a href="#" role="button" class="bg-video-button-muted"><i class="fa fa-volume-off"></i></a>



            <!-- ข้อความVideo Fade -->

            <script>
                // ฟังก์ชันแสดงข้อความ Overlay
                function showTextOverlay() {
                    const textOverlay = document.querySelector('.text-overlay');

                    if (textOverlay) {
                        gsap.to(textOverlay, {
                            opacity: 1, // ทำให้ข้อความค่อยๆ ปรากฏ
                            duration: 1.5,
                            ease: 'power1.inOut', // ใช้เอฟเฟกต์นุ่มนวล
                            delay: 8,
                            onStart: () => {
                                textOverlay.style.visibility = 'visible'; // ทำให้ Text Overlay มองเห็น
                            }
                        });
                        // console.log("✅ Text overlay is displayed successfully.");
                    } else {
                        // console.error("❌ .text-overlay element not found in DOM.");
                    }
                }
                showTextOverlay()


                //  บังคับเล่นวีดีโอให้ม่านloader เปิดเลย 
                // แก้วีดีโอ


                document.addEventListener("DOMContentLoaded", async () => {
                    const videoDesktop = document.querySelector('.bg-video');
                    const videoMobile = document.querySelector('.bg-video-mobile');
                    const videoUrlDesktop = "video/swordsman-3-video-web-ver01-final-pc.mp4";
                    const videoUrlMobile = "video/swordsman-3-video-web-ver01-final-mobile.mp4";
                    const fallbackBackground = "images/webcover2560x1440.jpg";
                    const isMobile = window.innerWidth <= 768;
                    const videoElement = isMobile ? videoMobile : videoDesktop;
                    const videoUrl = isMobile ? videoUrlMobile : videoUrlDesktop;



                    // ✅ ให้เปิดม่านโดยไม่ต้องรอวิดีโอโหลด
                    setTimeout(() => {
                        openLoader();
                    }, 1000); // 🔥 ลดดีเลย์จาก 3000ms → 1000ms

                    // ✅ บังคับให้เริ่มโหลดวิดีโอทันที
                    videoElement.src = videoUrl;
                    
                    videoElement.style.visibility = "visible";

                    // ✅ ถ้าวิดีโอโหลดไม่เสร็จภายใน 2 วินาที → ใช้ภาพพื้นหลังแทน
                    setTimeout(() => {
                        if (!videoElement.readyState || videoElement.readyState < 3) {
                            document.querySelector("#home-section").style.backgroundImage = `url(${fallbackBackground})`;
                        }
                    }, 2000); // 🔥 ลดจาก 5000ms → 2000ms เพื่อความเร็ว
                });
            </script>


            <!-- End Video BG Init -->


            <!-- Loading ใช้งาน loading เปิดม่านฟ้า Loader -->
            <div class="page-loader" id="loader">
                <div class="door left"></div>
                <div class="door right"></div>
                <div class="logo-container">
                    <img id="quote-image" src="" class="loading-icon" style="display: none;" loading="eager">
                </div>
            </div>


            <style>
                /* Loader Container */
                .page-loader {
                    position: relative;
                    top: 0;
                    left: 0;
                    width: 100vw;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: transparent;
                    overflow: hidden;
                    z-index: 9999;
                }

                /* Doors */
                .door {
                    position: absolute;
                    width: 50%;
                    height: 100%;
                    background-size: cover;
                    background-position: center;
                    z-index: 1;
                    transition: opacity 0.5s ease-in-out;
                    backface-visibility: hidden;
                    perspective: 1000px;
                    will-change: transform, opacity;
                }

                .door.left {
                    background-image: url('images/PageLoad/cloud-no-cloud-left.jpg');
                    left: 0;
                    transform: translateX(0);
                    transform-origin: right center;
                }

                .door.right {
                    background-image: url('images/PageLoad/cloud-no-cloud-right.jpg');
                    right: 0;
                    transform: translateX(0);
                    transform-origin: left center;
                }


                .logo-container {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    z-index: 2;
                    width: 100%;
                    max-width: 800px;
                    text-align: center;
                }


                .loading-icon {
                    width: 100%;
                    max-width: 800px;
                    height: auto;
                    /* รักษาอัตราส่วน */
                    z-index: 2;
                    opacity: 0;
                    /* ซ่อนก่อน */
                    transition: opacity 0.5s ease;
                    /* เอฟเฟกต์ค่อยๆ ปรากฏ */
                }


                .door.loaded {
                    opacity: 1;
                    /* แสดงเมื่อโหลดเสร็จ */
                }

                /* Responsive for small screens */
                @media (max-width: 961px) {
                  .logo-container {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 100%;
                    padding: 0 0px;
                    text-align: center;
                    z-index: 2;
                }

               .loading-icon {
                    max-width: 250px !important;
                    width: 100%;
                    height: auto;
                    display: block;
                    margin: 0 auto;
                }


                    .door {
                        position: absolute;
                        width: 50%;
                        height: 100%;
                        background-size: cover;
                        z-index: 1;
                        transition: opacity 0.5s ease-in-out;
                        backface-visibility: hidden;
                        perspective: 1000px;
                        will-change: transform, opacity;

                    }

                    .door.left {
                        background-image: url('images/PageLoad/cloud-no-cloud-left.jpg');
                        left: 0;
                        transform: translateX(0);
                        transform-origin: right center;
                        width: 50%;
                        background-size: cover;
                        background-position: right;
                    }

                    .door.right {
                        background-image: url('images/PageLoad/cloud-no-cloud-right.jpg');
                        right: 0;
                        transform: translateX(0);
                        transform-origin: left center;
                        width: 50%;
                        background-size: cover;
                        background-position: left;
                    }

                    .door.loaded {
                        opacity: 1;
                        /* แสดงเมื่อโหลดเสร็จ */
                    }

                }

                @media (orientation: landscape) and (max-width: 1024px) {


                    .door {
                        position: absolute;
                        width: 50%;
                        height: 100%;
                        background-size: cover;
                        z-index: 1;
                        transition: opacity 0.5s ease-in-out;
                        backface-visibility: hidden;
                        perspective: 1000px;
                        will-change: transform, opacity;

                    }

                    .door.left {
                        background-image: url('images/PageLoad/cloud-no-cloud-left.jpg');
                        left: 0;
                        transform: translateX(0);
                        transform-origin: right center;
                        width: 50%;
                        background-size: cover;
                        background-position: right;
                    }

                    .door.right {
                        background-image: url('images/PageLoad/cloud-no-cloud-right.jpg');
                        right: 0;
                        transform: translateX(0);
                        transform-origin: left center;
                        width: 50%;
                        background-size: cover;
                        background-position: left;
                    }

                    .door.loaded {
                        opacity: 1;
                        /* แสดงเมื่อโหลดเสร็จ */
                    }

                }
            </style>

            <script>
                // รายการรูปภาพคำคม
                const quoteImages = [
                    'images/PageLoad/pageload-word/01.png',
                    'images/PageLoad/pageload-word/02.png',
                    'images/PageLoad/pageload-word/03.png',
                    'images/PageLoad/pageload-word/04.png',
                    'images/PageLoad/pageload-word/05.png',
                    'images/PageLoad/pageload-word/06.png'
                ];

                function getRandomQuoteImage() {
                    const randomIndex = Math.floor(Math.random() * quoteImages.length);
                    return quoteImages[randomIndex];
                }

                // โหลดภาพประตูซ้ายและขวาก่อนเปิดม่าน
                const preloadDoors = new Promise((resolve) => {
                    const doorLeft = new Image();
                    const doorRight = new Image();
                    let loadedCount = 0;

                    doorLeft.src = 'images/PageLoad/cloud-no-cloud-left.jpg';
                    doorRight.src = 'images/PageLoad/cloud-no-cloud-right.jpg';

                    function checkLoaded() {
                        loadedCount++;
                        if (loadedCount === 2) {
                            document.querySelector('.door.left').classList.add('loaded');
                            document.querySelector('.door.right').classList.add('loaded');
                            resolve();
                        }
                    }

                    doorLeft.onload = checkLoaded;
                    doorRight.onload = checkLoaded;
                });

                // ฟังก์ชันเปิดม่านฟ้า
                function openLoader() {
                    const timeline = gsap.timeline();

                    if (window.innerWidth <= 768) {
                        timeline
                            .set('.door.left', {
                                x: '0'
                            })
                            .set('.door.right', {
                                x: '0'
                            })
                            .to({}, {
                                duration: 0.5
                            }) // ตั้งค่าดีเลย์
                            .to('.door.left', {
                                x: '-100%',
                                duration: 4,
                                ease: 'power2.inOut'
                            })
                            .to('.door.right', {
                                x: '100%',
                                duration: 4,
                                ease: 'power2.inOut'
                            }, '<')
                            .to('.logo-container', {
                                opacity: 0,
                                duration: 0.3,
                                ease: 'power2.inOut'
                            }, '-=0.5')
                            .to('#loader', {
                                opacity: 0,
                                duration: 0.5,
                                ease: 'power2.inOut'
                            })
                            .set('#loader', {
                                display: 'none'
                            });
                    } else {
                        timeline
                            .set('.door.left', {
                                x: '0'
                            })
                            .set('.door.right', {
                                x: '0'
                            })
                            .to({}, {
                                duration: 0.5
                            }) // ตั้งค่าดีเลย์
                            .to('.door.left', {
                                x: '-100%',
                                duration: 5,
                                ease: 'power2.inOut'
                            })
                            .to('.door.right', {
                                x: '100%',
                                duration: 5,
                                ease: 'power2.inOut'
                            }, '<')
                            .to('.logo-container', {
                                opacity: 0,
                                duration: 0.5,
                                ease: 'power2.inOut'
                            }, '-=1.5')
                            .to('#loader', {
                                opacity: 0,
                                duration: 0.5,
                                ease: 'power2.inOut'
                            })
                            .set('#loader', {
                                display: 'none'
                            });
                    }
                }


                // สุ่มภาพคำคมทันทีและกำหนดเป็น placeholder ก่อนที่ DOMContentLoaded
                const randomQuote = getRandomQuoteImage();
                const quoteImageElement = document.getElementById('quote-image');

                // ถ้าพบ element #quote-image ให้แสดงภาพคำคมทันที
                if (quoteImageElement) {
                    quoteImageElement.src = randomQuote;
                    // console.log("found word", randomQuote);
                } else {
                    console.error("❌ ไม่พบ #quote-image ใน DOM ขณะเริ่มต้น");
                }

                // โหลดภาพคำคมและแสดงทันที
                function loadAndDisplayQuoteImage() {
                    const quoteImageElement = document.getElementById('quote-image');
                    if (!quoteImageElement) {
                        console.error("❌ ไม่พบ #quote-image ใน DOM");
                        return;
                    }

                    const randomQuote = getRandomQuoteImage();
                    const img = new Image();
                    img.src = randomQuote;

                    // แสดงภาพทันที (ใช้เป็น placeholder)
                    quoteImageElement.src = randomQuote;

                    // console.log("📜 คำคมแสดงทันที:", randomQuote);

                    // โหลดภาพและตรวจสอบความสำเร็จ
                    img.onload = () => {
                        quoteImageElement.src = randomQuote; // อัปเดตภาพเมื่อโหลดเสร็จ
                        quoteImageElement.style.display = "block";
                        // console.log("📜 downlaod complete", randomQuote);
                        gsap.to(quoteImageElement, {
                            opacity: 1,
                            duration: 1,
                            scale: 1.5
                        });
                    };

                    img.onerror = () => {
                        // console.error("❌ โหลดภาพคำคมไม่สำเร็จ:", randomQuote);
                    };
                }

                gsap.fromTo(".loading-icon", {
                    opacity: 0,
                    scale: 0.8
                }, {
                    opacity: 1,
                    scale: 1,
                    duration: 1,
                    ease: "power2.out"
                });


                // เริ่มทำงาน
                document.addEventListener("DOMContentLoaded", async () => {
                    const video = document.querySelector('.bg-video');
                    // const videoUrl = "video/swordsman-3-video-web-ver01-final.mp4";
                    const fallbackBackground = "images/webcover2560x1440.jpg";

                    // แสดงภาพคำคมทันที
                    loadAndDisplayQuoteImage();

                    // โหลดภาพประตู -> เปิดม่าน
                    await preloadDoors;
                    openLoader();

                    // โหลดวิดีโอ
                    // preloadVideo(video, videoUrl, fallbackBackground);
                });
            </script>


            <!--End Loading ใช้งาน  loading เปิดม่านฟ้า Loader วิธีใหม่  ปรับแก้ภาพไม่เท่ากัน -->


     <!-- Sidebar -->
    <div id="sidebar" class="sidebar">


        <a id="toggle-btn" href="javascript:void(0)" class="nav-item toggle-button" onclick="toggleSidebar()">
            <i class="fas fa-angle-right"></i>
        </a>
        <a href="https://www.facebook.com/profile.php?id=61570578922652" class="nav-item" target="_blank">
            <img src="images/SideBar-Nav-Icon/facebook.png" alt="Facebook">
        </a>
        <a href="https://www.youtube.com/@%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%B5%E0%B9%88%E0%B9%80%E0%B8%A2%E0%B9%89%E0%B8%A2%E0%B8%A2%E0%B8%B8%E0%B8%97%E0%B8%98%E0%B8%88%E0%B8%B1%E0%B8%81%E0%B8%A33"
            class="nav-item" target="_blank">
            <img src="images/SideBar-Nav-Icon/youtube.png" alt="YouTube">
        </a>
        <a href="https://www.tiktok.com/@swordsman3mobile" class="nav-item" target="_blank">
            <img src="images/SideBar-Nav-Icon/tiktok.png" alt="TikTok">
        </a>
        <a href="https://x.com/Swordsman3game" class="nav-item" target="_blank">
            <img src="images/SideBar-Nav-Icon/x.png" alt="X">
        </a>
        <a href="https://www.instagram.com/swordsman3.mobile" class="nav-item" target="_blank">
            <img src="images/SideBar-Nav-Icon/ig.png" alt="Instagram">
        </a>
    </div>
    <!--End Sidebar -->


    <!--End Sidebar Navigation Panel -->


            <!-- Loading แบบจางเฉยๆ -->

            <!-- <style>
    /* Page Loader Container */
    .page-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url('images/PageLoad/cloud-no-cloud-full-width.webp') no-repeat center center;
        background-size: cover;
        z-index: 99999;
        overflow: hidden;
      
    }
    

    /* Text Quote */
    .quote-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
   
    }

    .quote-image {
        width: auto;
        /* กำหนดขนาดคำคม */
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }
    

@media (max-width: 961px) {
  .quote-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%;
    max-width: 400px !important; 
    min-height: 80px; /* ป้องกันการขยายผิดรูป */
    display: flex;
    justify-content: center;
    align-items: center;
}


    .quote-image {
        max-width: 250px; /* ลดขนาดภาพในมือถือ */
    }

     .page-loader {
    position: fixed;
     top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url('images/PageLoad/cloud-no-cloud-full-width.jpg') no-repeat center center;
    background-size: cover;
    z-index: 99999;
    overflow: hidden;
      
    }


}   
</style>

<div class="page-loader" id="loader">
    <div class="quote-container">
        <img id="quote-image" class="quote-image" src="" alt="Quote Image">
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // รายการคำคม
        const quotes = [
            'images/PageLoad/pageload-word/01.png',
            'images/PageLoad/pageload-word/02.png',
            'images/PageLoad/pageload-word/03.png',
            'images/PageLoad/pageload-word/04.png',
            'images/PageLoad/pageload-word/05.png',
            'images/PageLoad/pageload-word/06.png'
        ];

        // สุ่มเลือกคำคม
        const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];

        // ตั้งค่าภาพคำคม
        const quoteImage = document.getElementById("quote-image");
        quoteImage.src = randomQuote;

        // แสดงคำคมด้วยการค่อย ๆ ปรากฏ

            quoteImage.style.opacity = 1; // ค่อยๆ แสดง
    

   // หน่วง Loader ค้างไว้ x วินาที ก่อน Fade-Out
        setTimeout(() => {
            gsap.to(loader, {
                opacity: 0,
                duration: 2, // เวลาในการจางหาย
                ease: "power2.out",
                onComplete: () => {
                    loader.style.display = "none"; // ซ่อน Loader เมื่อจางเสร็จ
                }
            });
        }, 2000); // ⏳ ตั้งค่าให้ค้าง x วินาที ก่อนเริ่ม Fade-Out

        
    });
</script> -->
            <!-- Loading วิธีใหม่ ใหม่ -->











            <!--พื้นหลังภาพ BG Image Init -->
            <!-- <div class="bg-image-wrapper"> -->

            <!-- <img src="images/background-pic.jpg" class="bg-image" alt="Background Image"> -->
            <!-- <img src="images/bgimg-withText.jpg" class="bg-image-with-text" alt="Background Image"> -->
            <!-- <div class="bg-image-overlay"></div> -->
            <!-- </div> -->


            <!-- End Image BG Init -->



            <!-- Video Promote Content ตรงปุ่มกด เก็บไว้ -->

            <!-- <div class="video-container" id="videoContainer" style="display: none;"> -->
            <!-- เปลี่ยนจาก <video> เป็น <iframe> -->
            <!-- <iframe id="background-video" class="bg-video"
                    src="https://www.youtube.com/embed/_jVcmdtyp-o?autoplay=1&mute=1&loop=1&playlist=_jVcmdtyp-o&rel=0&controls=0"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div> -->

            <!-- JavaScript สำหรับ Toggle -->
            <!-- <script>
                function toggleVideo(event) {
                    event.preventDefault(); // ป้องกันไม่ให้ลิงก์รีโหลดหน้าเว็บ
                    const videoContainer = document.getElementById("videoContainer");

                    // Toggle เปิด/ปิดเนื้อหา
                    if (videoContainer.style.display === "none" || videoContainer.style.display === "") {
                        videoContainer.style.display = "block"; // แสดงเนื้อหา
                    } else {
                        videoContainer.style.display = "none"; // ซ่อนเนื้อหา
                    }
                }
            </script> -->




            <!-- End Video Promote Content -->



            <!--Home Content Download Button-->


            <div class="home-content">


                <!--ปัจจุบัน Buttons Group -->

                <!-- <div class="game-buttons-container">
                    <div class="download-buttons">
                     
                        <a href="#" class="video-button button" onclick="toggleVideo(event)">
                            <img src="images/PlayVideo.png" alt="Video Icon" />
                        </a>
                       
                        <a href="#" class="ios-button notify button">
                            <img src="images/download_ios.png" alt="iOS Icon" />
                        </a>
                  
                        <a href="#" class="android-button notify button">
                            <img src="images/download_google.png" alt="Android Icon" />
                        </a>
                       
                        <a href="#" class="android-button notify button">
                            <img src="images/download_APK.png" alt="APK Icon" />
                        </a>
                     
                        <a href="#" class="android-button notify button">
                            <img src="images/windows_play_on.png" alt="Windows Icon" />
                        </a>

                    </div>
                </div> -->



                <!-- ปุ่มลงทะเบียนล่วงหน้า -->

                <div class="pre-register-container">
                    <!-- <a href="page/player/preregister-reward.php" target="_blank" class="pre-register">
                        <img src="images/PreregisterButtonandReward/pre-register-home.png" alt="PRE-REGISTER"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(255, 215, 0, 0.7))'"
                            onmouseout="this.style.filter='none'" />

                    </a> -->

                    <!-- 👇 ลูกศรลอยอยู่ล่าง section -->
                    <div class="scroll-arrow-container-real">
                        <a href="#" class="scroll-down-button-real" id="scrollToClassBtn">
                            <img src="images/RewardPage/button-down.png" alt="Scroll Down" class="scroll-down-icon-real" />
                        </a>

                    </div>
                </div>



                <!-- End ปุ่มลงทะเบียนล่วงหน้า -->



                <!--Scroll Down-->
                <!-- <div class="local-scroll scroll-down-wrap wow fadeInUpShort" data - wow -
                                    offset="0">
                                    <a href="#about" class="scroll-down"><i class="scroll-down-icon"></i><span
                                            class="sr-only">Scroll to
                                            the next section</span></a>
        </div> -->



                <style>
                    .scroll-arrow-container-real {
                        margin-top: 200px;
                        text-align: center;
                        animation: bounce-real 2s infinite;
                    }

                    .scroll-down-button-real {
                        display: inline-block;
                        cursor: pointer;
                        transition: transform 0.3s ease;
                    }

                    .scroll-down-button-real:hover {
                        transform: scale(1.1);
                    }

                    .scroll-down-icon-real {
                        width: 40px;
                        height: auto;
                        filter: drop-shadow(0 0 8px rgba(255, 255, 255, 0.7));
                    }

                    @keyframes bounce-real {

                        0%,
                        100% {
                            transform: translateY(0);
                        }

                        50% {
                            transform: translateY(5px);
                        }
                    }

                    @media (max-width: 576px) {
                        .scroll-down-icon-real {
                            width: 28px;
                        }
                    }
                </style>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // ลบ hash ออกจาก URL และป้องกัน scroll อัตโนมัติ
                        if (window.location.hash === "#class") {
                            history.replaceState(null, null, window.location.pathname);
                            window.scrollTo(0, 0);
                        }

                        const scrollBtn = document.getElementById("scrollToClassBtn");
                        const targetSection = document.getElementById("class");

                        scrollBtn.addEventListener("click", function(e) {
                            e.preventDefault();

                            if (targetSection) {
                                const targetY = targetSection.getBoundingClientRect().top + window.scrollY;

                                window.scrollTo({
                                    top: targetY,
                                    behavior: "smooth"
                                });
                            }
                        });
                    });
                </script>



                <!--End Scroll Down-->



            </div>
        </section>
        <!--End Home Section-->








        <!---- Class Preview Section class preview -->

      <!-- Class Preview Section -->
        <section class="class-page-section" id="class" style="background: url('images/background/bg-class.jpg') no-repeat center center; background-size: cover;">
        <div class="container-fluid relative">
            <div class="row">
            <div class="col-12 class-visual-wrapper">
                 <div class="bg-fallback" style="background-image: url('images/Class-Pic/butung.jpg');"></div>
                <img src="images/Class-Pic/butung.jpg" alt="Background Image Class" class="bg-image-class">

               
                <div class="class-sidebar-wrapper">
                <button class="scroll-btn up" id="scrollUp">▲</button>
                <div class="class-sidebar" id="classSidebar">
                    <ul class="class-menu">
                    <li data-class="class1" class="active">
                        <img src="images/ClassIcon/butung-icon.png" alt="อาชีพที่ 1" class="menu-icon">
                        <span class="class-label">บู้ตึ้ง</span>
                    </li>
                    <li data-class="class2">
                        <img src="images/ClassIcon/wangwaree-icon.png" alt="อาชีพที่ 2" class="menu-icon">
                        <span class="class-label">วังวารี</span>
                    </li>
                    <li data-class="class3">
                        <img src="images/ClassIcon/muenbuppha-icon.png" alt="อาชีพที่ 3" class="menu-icon">
                        <span class="class-label">หมื่นบุปผา</span>
                    </li>
                    <li data-class="class4">
                        <img src="images/ClassIcon/bailu-icon.png" alt="อาชีพที่ 4" class="menu-icon">
                        <span class="class-label">ไป๋ลู่</span>
                    </li>
                    <li data-class="class5">
                        <img src="images/ClassIcon/tian-ren-icon.png" alt="อาชีพที่ 5" class="menu-icon">
                        <span class="class-label">เทียนเหริ่น</span>
                    </li>
                    <li data-class="class6">
                        <img src="images/ClassIcon/mysterioussword-icon.png" alt="อาชีพที่ 6" class="menu-icon">
                        <span class="class-label">กระบี่ลี้ลับ</span>
                    </li>
                    <li data-class="class7">
                        <img src="images/ClassIcon/tian-wang-icon.png" alt="อาชีพที่ 7" class="menu-icon">
                        <span class="class-label">เทียนหวัง</span>
                    </li>
                    <li data-class="class8">
                        <img src="images/ClassIcon/changer-icon.png" alt="อาชีพที่ 8" class="menu-icon">
                        <span class="class-label">ฉางเกอ</span>
                    </li>
                    <li data-class="class9">
                        <img src="images/ClassIcon/ancientgrave-icon.png" alt="อาชีพที่ 9" class="menu-icon">
                        <span class="class-label">สุสานโบราณ</span>
                    </li>
                    <li data-class="class10">
                        <img src="images/ClassIcon/beggarclan-icon.png" alt="อาชีพที่ 10" class="menu-icon">
                        <span class="class-label">พรรคกระยาจก</span>
                    </li>
                    </ul>
                </div>
                <button class="scroll-btn down" id="scrollDown">▼</button>
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- End Class Preview Section -->

    




        <!-- Highlight Game Section -->
        <section class="highlight-page-section pt-0 pb-0" style="background: url('images/background/bg-highlight.jpg') no-repeat center center; background-size: cover;">
            <div class="swiper-container">
        <div class="swiper-wrapper">
              <div class="swiper-slide">
                <picture>
                    <source srcset="images/highlight-game/highlight1.png" type="image/webp">
                    <img src="images/highlight-game/highlight1.webp" alt="Promo 1" loading="lazy"/>
                </picture>
                </div>
                <div class="swiper-slide">
                <picture>
                    <source srcset="images/highlight-game/highlight2.png" type="image/webp">
                    <img src="images/highlight-game/highlight2.webp" alt="Promo 2" loading="lazy"/>
                </picture>
                </div>
                <div class="swiper-slide">
                <picture>
                    <source srcset="images/highlight-game/highlight3.png" type="image/webp">
                    <img src="images/highlight-game/highlight3.webp" alt="Promo 3" loading="lazy"/>
                </picture>
                </div>
                <div class="swiper-slide">
                <picture>
                    <source srcset="images/highlight-game/highlight4.png" type="image/webp">
                    <img src="images/highlight-game/highlight4.webp" alt="Promo 4" loading="lazy"/>
                </picture>
                </div>
                <div class="swiper-slide">
                <picture>
                    <source srcset="images/highlight-game/highlight5.png" type="image/webp">
                    <img src="images/highlight-game/highlight5.webp" alt="Promo 5" loading="lazy"/>
                </picture>
                </div>
                <div class="swiper-slide">
                <picture>
                    <source srcset="images/highlight-game/highlight6.png" type="image/webp">
                    <img src="images/highlight-game/highlight6.webp" alt="Promo 6" loading="lazy"/>
                </picture>
                </div>
                <div class="swiper-slide">
                <picture>
                    <source srcset="images/highlight-game/highlight7.png" type="image/webp">
                    <img src="images/highlight-game/highlight7.webp" alt="Promo 7" loading="lazy"/>
                </picture>
                </div>
                <div class="swiper-slide">
                <picture>
                    <source srcset="images/highlight-game/highlight8.png" type="image/webp">
                    <img src="images/highlight-game/highlight8.webp" alt="Promo 8" loading="lazy"/>
                </picture>
                </div>

                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation -->
                <div class="swiper-button-next" type="button"></div>
                <div class="swiper-button-prev" type="button"></div>
            </div>
        </section>

        <!--End Highlight Game Section-->


        <!--News and Promotion Section-->

        <section class="page-section-news" id="news">
            <div class="container">
                <div class="row gy-4">

                    <div class="col-12 col-lg-6">


                        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/imageCarousel1.jpg" class="d-block" alt="Image 1" loading="lazy" fetchpriority="low">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/imageCarousel2.jpg" class="d-block" alt="Image 2" loading="lazy" fetchpriority="low">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/imageCarousel3.jpg" class="d-block" alt="Image 3" loading="lazy" fetchpriority="low">
                                </div>
                            </div>


                            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                            <div class="carousel-indicators-custom">
                                <span class="indicator active" data-bs-target="#imageCarousel" data-bs-slide-to="0"></span>
                                <span class="indicator" data-bs-target="#imageCarousel" data-bs-slide-to="1"></span>
                                <span class="indicator" data-bs-target="#imageCarousel" data-bs-slide-to="2"></span>
                            </div>


                        </div>
                    </div>


                    <!-- News and Promotion Select Tab -->
                    <div class="col-12 col-lg-6 d-flex flex-column align-items-center">

                        <ul class="nav nav-tabs justify-content-center w-100" id="newsTabs" role="tablist">
                            <li class="nav-item-news" role="presentation">
                                <button class="nav-link text-center active" id="all-tab" data-tab="All" type="button">ทั้งหมด</button>
                            </li>
                            <li class="nav-item-news" role="presentation">
                                <button class="nav-link text-center" id="news-tab" data-tab="News" type="button">ประกาศ</button>
                            </li>
                            <li class="nav-item-news" role="presentation">
                                <button class="nav-link text-center" id="events-tab" data-tab="Events" type="button">กิจกรรม</button>
                            </li>
                            <li class="nav-item-news" role="presentation">
                                <button class="nav-link text-center" id="promotions-tab" data-tab="Promotions"
                                    type="button">โปรโมชั่น</button>
                            </li>
                        </ul>

                        <div class="tab-content mt-3 w-100" id="newsTabsContent">
                            <div id="All-tab-pane" class="tab-pane" style="display: block;">
                                <div class="image-header">
                                    <img src="images/crop-box-news.png" alt="Header Image" class="header-img">
                                </div>
                                <ul class="list-group" id="All-news-list"></ul>
                                <div class="bottom-image-header">
                                    <img src="images/crop-box-news-reverse.png" alt="Header Image" class="bottom-img">
                                </div>
                            </div>

                            <div id="News-tab-pane" class="tab-pane" style="display: none;">
                                <div class="image-header">
                                    <img src="images/crop-box-news.png" alt="Header Image" class="header-img">
                                </div>
                                <ul class="list-group" id="News-news-list"></ul>
                                <div class="bottom-image-header">
                                    <img src="images/crop-box-news-reverse.png" alt="Header Image" class="bottom-img">
                                </div>
                            </div>

                            <div id="Events-tab-pane" class="tab-pane" style="display: none;">
                                <div class="image-header">
                                    <img src="images/crop-box-news.png" alt="Header Image" class="header-img">
                                </div>
                                <ul class="list-group" id="Events-news-list"></ul>
                                <div class="bottom-image-header">
                                    <img src="images/crop-box-news-reverse.png" alt="Header Image" class="bottom-img">
                                </div>
                            </div>

                            <div id="Promotions-tab-pane" class="tab-pane" style="display: none;">
                                <div class="image-header">
                                    <img src="images/crop-box-news.png" alt="Header Image" class="header-img">
                                </div>
                                <ul class="list-group" id="Promotions-news-list"></ul>
                                <div class="bottom-image-header">
                                    <img src="images/crop-box-news-reverse.png" alt="Header Image" class="bottom-img">
                                </div>
                            </div>

                            <div class="news-more-btn">
                                <a href="javascript:void(0);" class="btn-more" id="openPromotionLink" target="_blank">เพิ่มเติม</a>

                                <script>
                                    // รอให้ DOM โหลดเสร็จ
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // ดึงค่าจาก localStorage สำหรับ 'activeTab' (หรือค่า default เป็น 'all')
                                        const activeTab = localStorage.getItem("activeTab") || "All";

                                        // สร้าง URL ใหม่ที่มีพารามิเตอร์ tab
                                        const url = `page/player/contents.php?tab=${activeTab}`;

                                        // ตั้งค่า href ของลิงก์โดยใช้ URL ที่ประกอบด้วย activeTab
                                        document.getElementById("openPromotionLink").setAttribute("href", url);
                                    });
                                </script>

                            </div>
                        </div>
                    </div>




                </div>
            </div>
            </div>

            <script>
                $(document).ready(function() {
                    const tabButtons = $(".nav-link");
                    const tabPanes = $(".tab-pane");

                    // ฟังก์ชันการแสดงแท็บที่ถูกเลือก
                    function activateTab(tabId) {

                        // ซ่อน tab-pane ทั้งหมด
                        tabPanes.hide();
                        // แสดง tab-pane ที่เลือก
                        $(`#${tabId}-tab-pane`).show();
                        // ตั้งค่า active ให้ปุ่ม
                        tabButtons.removeClass("active");

                        $(`[data-tab="${tabId}"]`).addClass("active");
                        // บันทึกค่า active tab ลง localStorage
                        localStorage.setItem("activeTab", tabId);

                        // อัปเดต href ของลิงก์ "เพิ่มเติม" ให้ตรงกับ activeTab
                        const url = `page/player/contents.php?tab=${tabId}`;
                        document.getElementById("openPromotionLink").setAttribute("href", url);
                    }

                    // เพิ่ม event listener ให้ปุ่มทั้งหมด
                    tabButtons.on("click", function() {
                        const targetTab = $(this).data("tab");

                        activateTab(targetTab);
                    });

                    // กำหนดค่า default เป็น "all" ถ้าไม่มีค่าใน localStorage
                    const storedTab = localStorage.getItem("activeTab") || "All";
                    console.log('storedTab', storedTab)
                    activateTab(storedTab);
                });



                document.querySelectorAll('.carousel-indicators-custom .indicator').forEach((indicator, index) => {
                    indicator.addEventListener('click', () => {
                        // เลื่อน Carousel ไปยัง Slide ที่ถูกเลือก
                        const carousel = document.querySelector('#imageCarousel');
                        const carouselInstance = bootstrap.Carousel.getInstance(carousel);
                        carouselInstance.to(index);

                        // กำหนด Active Class ให้ Indicators
                        document.querySelectorAll('.carousel-indicators-custom .indicator').forEach(el => el.classList.remove('active'));
                        indicator.classList.add('active');
                    });
                });

                // อัปเดต Active Class ระหว่างเลื่อน Slide
                const carouselElement = document.querySelector('#imageCarousel');
                carouselElement.addEventListener('slid.bs.carousel', (e) => {
                    const index = e.to;
                    document.querySelectorAll('.carousel-indicators-custom .indicator').forEach(el => el.classList.remove('active'));
                    document.querySelectorAll('.carousel-indicators-custom .indicator')[index].classList.add('active');
                });



                /*axios news promotion response*/
                document.addEventListener('DOMContentLoaded', function() {
                    // ฟังก์ชันเพื่อดึงข้อมูลจาก PHP
                    axios.get('database/player/contents_index.php') // เปลี่ยน URL เป็นไฟล์ PHP ของคุณที่ส่งข้อมูล JSON
                        .then(function(response) {
                            const newsData = response.data; // ข้อมูลที่ได้รับมาในรูปแบบ JSON
                            renderNews(newsData, "All"); // แสดงข่าวทั้งหมด
                            renderNews(newsData, "News"); // แสดงข่าวประกาศ
                            renderNews(newsData, "Events"); // แสดงข่าวกิจกรรม
                            renderNews(newsData, "Promotions"); // แสดงข่าวโปรโมชั่น
                        })
                        .catch(function(error) {
                            console.error('Error fetching data:', error);
                        });

                    // ฟังก์ชันในการแสดงข่าว
                    function renderNews(newsData, category) {
                        console.log('category', category)
                        // console.log('newsdata', newsData)
                        const container = document.getElementById(category + "-news-list");

                        if (container) { // ตรวจสอบว่า container ไม่เป็น null
                            container.innerHTML = ""; // ล้างข้อมูลเก่า

                            let filteredNews = category === "" ? newsData : newsData.filter(news => news.category_name === category);

                            if (filteredNews.length === 0 && category !== "") {
                                // ถ้าข้อมูลประเภทนี้ไม่มี ให้ดึงข้อมูลทั้งหมดมาแสดง
                                // filteredNews = newsData;
                            }
                            if (category === "All") {
                                // ถ้าเป็น All ให้แสดงข่าวทั้งหมด
                                filteredNews = newsData;
                            } else {
                                // ถ้าไม่ใช่ All ให้กรองข่าวตามประเภทที่เลือก
                                filteredNews = newsData.filter(news => news.category_name === category);
                            }

                            const limitedNews = filteredNews.slice(0, 6); // แสดงแค่ 6 รายการ

                            limitedNews.forEach(news => {
                                const li = document.createElement("li");
                                const dateOnly = news.created_at.substring(0, 10); // 10 ตัวแรก (YYYY-MM-DD)

                                const newtypefilter = news.category_name == "News" ? "ประกาศ" : news.category_name;

                                let newTypeColor;
                                if (news.category_name === "News") {
                                    newTypeColor = "rgb(127,169,209)";
                                } else if (news.category_name === "Events") {
                                    newTypeColor = "rgb(153, 127, 209)";
                                } else if (news.category_name === "Promotions") {
                                    newTypeColor = "rgb(209, 138, 127)";
                                } else {
                                    newTypeColor = "rgba(0, 0, 0, 0.8)";
                                }


                                li.classList.add("list-group-item");
                                li.innerHTML = `
                                    <div class="news-item" style="display: flex; justify-content: space-between; align-items: center;">
                                        <div style="display: flex; align-items: center;">
                                       <a href="#" class="text-decoration-none" 
                                    style="color: white; display: inline-block; padding: 0px 8px; border-radius: 6px; 
                                            background: linear-gradient(135deg, ${newTypeColor} 0%, ${newTypeColor} 100%, #fff 100%, #fff 100%);">
                                        ${newtypefilter}
                                    </a>

                                                
                                         &nbsp
                                             <a style="display: inline; cursor: pointer;">${news.header_thumbnail}</a>
                                        </div>
                                        <span class="date" style="margin-left: 10px;">${dateOnly}</span>
                                    </div>`;

                                li.addEventListener("click", function() {
                                    window.location.href = `database/player/contents_read_detail.php?id=${news.id}`; // 
                                });
                                container.appendChild(li);
                            });
                        } else {
                            console.error(`Cannot find the container with id: ${category}-news-list`);
                        }
                    }
                });
            </script>

        </section>

        <!--End News and Promotion Section-->




        <!--ใหม่ใช้งาน New Gallery Game Section-->
        <!--Gallery Game Section-->
        <!-- <section class="gallery-section">
            <div class="character-container">
              <img src="images/gallery-pic/g-char.png" alt="Character"> -->
        <!-- <img src="images/gallery-pic/g-char.png" alt="Character"
            style="transition: filter 0.3s ease;"
            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(0, 153, 255, 0.7))'"
            onmouseout="this.style.filter='none'" />
        </div>

        <div class="gallery-container">
            <div class="gallery-header">
                <div class="tabs">
                    <button class="tab-btn active" data-tab="photo" onclick="toggleGallery('photo')">รูปภาพ</button>
                    <span class="divider-gallery">/</span>
                    <button class="tab-btn" data-tab="video" onclick="toggleGallery('video')">วีดีโอ</button>
                </div>
                <a href="page/player/gallery-more.php" target="_blank">
                    <div class="more-btn">เพิ่มเติม+</div>
                </a>

            </div> -->

            <!-- Photo Gallery -->
            <!-- <div class="gallery" id="photoGallery">
                    <div class="gallery-item large"
                        onclick="openModal('photo', 'images/gallery-pic/g1.jpg')">
                        <img src="images/gallery-pic/g1.jpg" alt="Moonglow Fest">

                        <h3>เข้าร่วมสงครามจักพรรดิ์</h3>
                    </div>
                    <div class="gallery-item small-right"
                        onclick="openModal('photo', 'images/gallery-pic/g2.jpg')">
                        <img src="images/gallery-pic/g2.jpg" alt="Frosty Festival">
                        <h3>รักสุดโรแมนติก</h3>
                    </div>
                    <div class="gallery-item small-right new-event"
                        onclick="openModal('photo', 'images/gallery-pic/g3.jpg')">
                        <img src="images/gallery-pic/g3.jpg" alt="New Event 1">
                        <h3>สู้ศึกสังเวียนบอส</h3>
                    </div>
                    <div class="gallery-item small-right"
                        onclick="openModal('photo', 'images/gallery-pic/g4.jpg')">
                        <img src="images/gallery-pic/g4.jpg" alt="Global Launch">
                        <h3>บุพผาไร้พ่าย</h3>
                    </div>
                    <div class="gallery-item small-right"
                        onclick="openModal('photo', 'images/gallery-pic/g5.jpg')">
                        <img src="images/gallery-pic/g5.jpg" alt="Chinese New Year">
                        <h3>หมื่นบุพผาบทกวี</h3>
                    </div>
                    <div class="gallery-item small-right"
                        onclick="openModal('photo', 'images/gallery-pic/g6.jpg')">
                        <img src="images/gallery-pic/g6.jpg" alt="2024 New Year">
                        <h3>บ่อน้ำพุร้อน</h3>
                    </div>
                </div> -->

            <!-- Video Gallery -->
            <!-- <div class="gallery" id="videoGallery" style="display: none;">
                    <div class="gallery-item large video-overlay"
                        onclick="openModal('video', 'https://www.youtube.com/embed/i08KHjxYKuw?si?autohide=1')">
                        <img src="https://img.youtube.com/vi/i08KHjxYKuw/maxresdefault.jpg" alt="Baking Contest">
                        <h3>ฝากตัวเป็นศิษย์กับสำนักที่ใช่! เพื่อก้าวขึ้นเป็นอันดับ 1 แห่งยุทธภพ!!</h3>
                    </div>
                    <div class="gallery-item small-right video-overlay"
                        onclick="openModal('video', 'https://www.youtube.com/embed/8a085o8nwAs?autohide=1')">
                        <img src="https://img.youtube.com/vi/8a085o8nwAs/maxresdefault.jpg" alt="Claw Wars">
                        <h3>สำนักหมื่นบุปผา</h3>
                    </div>
                    <div class="gallery-item small-right video-overlay"
                        onclick="openModal('video', 'https://www.youtube.com/embed/GVQeNk10y-A?autohide=1')">
                        <img src="https://img.youtube.com/vi/GVQeNk10y-A/maxresdefault.jpg" alt="Playground Clubhouse">
                        <h3>สำนักบู๊ตึง</h3>
                    </div>
                    <div class="gallery-item small-right video-overlay"
                        onclick="openModal('video', 'https://www.youtube.com/embed/cISz3y-Wcyg?autohide=1')">
                        <img src="https://img.youtube.com/vi/cISz3y-Wcyg/maxresdefault.jpg" alt="Who's Rotten?">
                        <h3>สำนักเทียนเหริ่น</h3>
                    </div>
                    <div class="gallery-item small-right video-overlay"
                        onclick="openModal('video', 'https://www.youtube.com/embed/qdqvUUiCmkw?autohide=1')">
                        <img src="https://img.youtube.com/vi/qdqvUUiCmkw/maxresdefault.jpg" alt="Ice Bean Battle">
                        <h3>สำนักวังวารี</h3>
                    </div>
                    <div class="gallery-item small-right video-overlay"
                        onclick="openModal('video', 'https://www.youtube.com/embed/3fUKs3xwxI4?autohide=1')">
                        <img src="https://img.youtube.com/vi/3fUKs3xwxI4/maxresdefault.jpg" alt="Ice Bean Battle">
                        <h3>สำนักไป๋ลู่</h3>
                    </div>
                </div>
            </div>
        </section> -->

            <!-- Modal for Image or Video -->
            <!-- <div id="modal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div id="modal-content"></div>
            </div>
        </div> -->

            <!-- Inline Style -->
            <!-- <style>
            .gallery-section {

                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px 100px 20px 100px;
                gap: 50px;
                height: auto;
                overflow: hidden;
                align-items: stretch;
            }

            .character-container {
                flex: 0 0 30%;
                display: flex;
                justify-content: center;
                align-items: center;

            }

            .character-container img {
                text-align: end;
                height: 650px;
                width: auto;
                object-fit: fill;
            }

            .gallery-container {
                flex: 0 0 65%;
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            .gallery-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .tabs {
                display: flex;
                align-items: center;
                justify-content: center;
                /* วางทุกอย่างตรงกลางในแกน X */
                gap: 10px;
                /* เพิ่มช่องว่างระหว่างปุ่ม */
            }

            .divider-gallery {
                font-size: 24px;
                font-weight: bold;
                margin: 0 0px;
                /* ระยะห่างจากปุ่มทั้งสอง */
            }


            .tabs button {
                background: none;
                border: none;
                font-size: 18px;
                font-weight: bold;
                cursor: pointer;
                padding: 5px 10px;
            }

            .tabs button.active {
                background: linear-gradient(90deg, #DCC072, #edb518);
                color: white;
                border-radius: 15px;
            }

            .more-btn {
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                text-decoration: none;
            }

            .gallery {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;

            }

            .gallery-item {
                background: none;
                border-radius: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 0;
                position: relative;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            }

            .gallery-item img {
                width: 100%;
                height: 100%;
                border-bottom: 2px solid #ddd;
                transition: transform 0.3s ease-in-out;
            }

            .gallery-item:hover img {
                transform: scale(1.04);
                cursor: pointer;
            }

            .gallery-item h3 {
                font-size: 16px;
                margin-top: 10px;
                position: absolute;
                bottom: 10px;
                /* วางข้อความที่ด้านล่างของรูป */
                left: 0;
                right: 0;
                bottom: 0;
                text-align: center;
                color: white;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.001));
                padding: 5px;
                border-radius: 0 0 10px 10px;
                /* ขอบโค้งล่าง */
                margin: 0;
            }

            .gallery-item.large {
                grid-column: span 2;
                grid-row: span 2;
            }

            .gallery-item.small-right {
                grid-column: span 1;
                grid-row: span 1;
            }

            .gallery-item.new-event {
                grid-column: 3;
                grid-row: 1;
                grid-row: span 1;
            }

            /* Modal Style */
            .modal {
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;

                background-color: rgba(0, 0, 0, 0.4);
                overflow-y: hidden;
                z-index: 2000;
            }

            .modal-content {
                background-color: #f7df9d;
                padding: 0px 10px 10px 10px;
                border: 1px solid #888;
                width: 80%;
                max-width: 800px;

                /* ใช้ translate เพื่อย้าย modal ไปกลางจอ */
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);

            }


            .close {
                line-height: 0.8;
                text-align: end;
                color: black;
                float: right;
                font-size: 16px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            .video-overlay {
                position: relative;
                height: 100%;
                cursor: pointer;
            }

            .video-overlay img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease-in-out;
            }

            .video-overlay:hover img {
                transform: scale(1.04);
                cursor: pointer;
            }

            .video-overlay::after {
                content: "▶";
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 30px;
                color: white;
                font-weight: bold;
                background: rgba(0, 0, 0, 0.5);
                padding: 1px 10px;
                border-radius: 50%;
            }


            /* ✅ สำหรับมือถือ (Mobile Only) */
            @media only screen and (max-width: 767px) {
                .gallery-section {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 0px 20px;

                    gap: 10px;
                    height: 520px;
                }

                .character-container img {
                    display: none;
                }

                .character-container {

                    display: none;
                }

                .gallery-container {
                    flex: 0 0 100%;
                    display: flex;
                    flex-direction: column;
                }

                .gallery-item h3 {
                    font-size: 8px;
                    margin-top: 5px;
                    margin-bottom: 0px;
                }

                .video-overlay::after {
                    content: "▶";
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 15px;
                    color: white;
                    font-weight: bold;
                    background: rgba(0, 0, 0, 0.5);
                    padding: 5px 10px;
                    border-radius: 50%;
                }

                .video-overlay h3 {
                    font-size: 8px;
                }

                .tabs button {
                    background: none;
                    border: none;
                    font-size: 14px;
                    font-weight: bold;
                    cursor: pointer;
                    padding: 2px 5px;
                }



                .more-btn {
                    font-size: 14px;
                    font-weight: bold;
                    cursor: pointer;
                    text-decoration: none;
                }

            }

            @media only screen and (min-width: 768px) and (max-width: 1400px) {
                .gallery-section {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 20px;
                    gap: 10px;
                }

                .character-container img {
                    display: none;

                }

                .character-container {
                    display: none;

                }

                .gallery-container {
                    flex: 0 0 100%;
                    display: flex;
                    flex-direction: column;
                }

                .gallery-item h3 {
                    font-size: 13px;
                    margin-top: 5px;
                    margin-bottom: 0px;
                }

                .video-overlay::after {
                    content: "▶";
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 15px;
                    color: white;
                    font-weight: bold;
                    background: rgba(0, 0, 0, 0.5);
                    padding: 5px 10px;
                    border-radius: 50%;
                }

            .video-overlay h3 {
            font-size: 13px;
            }
}


          


            
        </style>

         Inline Script -->
            <!-- <script>
            function toggleGallery(tab) {
                const photoGallery = document.getElementById("photoGallery");
                const videoGallery = document.getElementById("videoGallery");

                if (tab === "photo") {
                    photoGallery.style.display = "grid";
                    videoGallery.style.display = "none";
                    document.querySelector('[data-tab="photo"]').classList.add("active");
                    document.querySelector('[data-tab="video"]').classList.remove("active");
                } else {
                    photoGallery.style.display = "none";
                    videoGallery.style.display = "grid";
                    document.querySelector('[data-tab="video"]').classList.add("active");
                    document.querySelector('[data-tab="photo"]').classList.remove("active");
                }
            }

            function openModal(type, source) {
                const modal = document.getElementById('modal');
                const modalContent = document.getElementById('modal-content');

                if (type === 'photo') {
                    modalContent.innerHTML = `<img src="${source}" alt="Image" style="width:100%; height:auto;">`;
                } else if (type === 'video') {
                    modalContent.innerHTML = `<iframe width="100%" height="400px" src="${source}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`;
                }

                modal.style.display = "block";
            }

            function closeModal() {
                const modal = document.getElementById('modal');
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                const modal = document.getElementById('modal');
                if (event.target == modal) {
                    closeModal();
                }
            }
        </script>
 -->





            <!--End Gallery Game Section-->


            <!--Divider -->
            <!-- < hr class="mt-0 mb-10" /> -->
            <!--End Divider-->































            <!--Divider -->
            <!-- < hr class="mt-0 mb-0" /> -->
            <!--End Divider-->


            <!--Footer -->
            <!-- <footer class="footer-page-section  footer pb-100 pb-sm-50">
            <div class="container">


                <div class="footer-social-links">
                    <a href="#" title="Facebook" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                        <span class="sr-only">Facebook profile</span>
                    </a>
                    <a href="#" title="YouTube" target="_blank">
                        <i class="fab fa-youtube"></i>
                        <span class="sr-only">YouTube profile</span>
                    </a>
                    <a href="#" title="TikTok" target="_blank">
                        <i class="fab fa-tiktok"></i>
                        <span class="sr-only">TikTok profile</span>
                    </a>
                    <a href="#" title="X (Twitter)" target="_blank">
                        <i class="fab fa-twitter"></i>
                        <span class="sr-only">X (Twitter) profile</span>
                    </a>

                    <a href="#" title="Instagram" target="_blank">
                        <i class="fab fa-instagram"></i>
                        <span class="sr-only">Instagram profile</span>
                    </a>
                </div>



                <div class="footer-text">


                    <div class="footer-copy">
                        <a href="index.html">© กระบี่เย้ยยุทธจักร</a>.
                    </div>



        </footer> -->

            <footer class="text-white pt-4 pb-3 custom-footer-swordsman3" style="background: transparent; font-family: 'Prompt', sans-serif; font-size: 0.95rem;">
                <div class="container text-center">
                    <div class="row justify-content-center g-4">



                        <!-- บริษัทในเครือ -->
                        <div class="col-12 col-lg-4">
                            <!-- <h5 class="fw-bold mb-2 mt-4 mt-lg-0"></h5> -->
                            <div class="footer-logos d-flex flex-wrap justify-content-center gap-3 mb-2">
                                <img src="images/footer-icon/logo-exp-up-company-original.png" alt="EXP UP Logo" width="30">
                                <img src="images/footer-icon/logo-seasun-black.png" alt="Seasun Logo" width="85">
                            </div>
                            <p class="small text-secondary m-0 mt-2">© กระบี่เย้ยยุทธจักร. All rights reserved.</p>
                        </div>

                    </div>
                </div>
            </footer>


            <!--End Footer-->

    </main>





    <!-- </div> -->

    <!--End Page Wrap-->


    <!--JS -->
    <script src="js/jquery.min.js"></script>
    <!-- <script src="js/jquery.easing.1.3.js"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/SmoothScroll.js"></script> -->
    <script src="js/jquery.scrollTo.min.js" defer></script>
    <script src="js/jquery.localScroll.min.js" defer></script>
    <script src="js/jquery.viewport.mini.js" defer></script>
    <!-- <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.lazyload.min.js"></script>
    <script src="js/wow.min.js" defer></script>
    <script src="js/morphext.js" defer></script>
    <script src="js/typed.min.js" defer></script> -->
    <script src="js/all.js"></script>
    <!-- <script src="js/contact-form.js" defer></script> -->
    <!-- <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/objectFitPolyfill.min.js" defer></script>
    <script src="js/splitting.min.js" defer></script> -->
    <script src="js/changeClass.js" defer></script>


    <!-- alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <!-- <script src="https://unpkg.com/swiper@11.2.6/swiper-bundle.min.js"></script> -->

    <script src="js/highlight-game-Swiper.js"></script>



    <!-- Nav hamburger -->

    <script src="js/submenu-mainnav-mobile-click.js"></script>



    <!-- tab news and promotion vanilla.js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/tabbyjs@12.0.0/dist/tabby.min.js"></script> -->





    <!-- particle JS -->
    <!-- <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer></script> -->
    <!-- <script src="js/particle-js-home-animation.js"></script> -->

    <!-- sidebar contact -->
    <script src="js/sidebar-contact-download-sticky.js" defer></script>
    <!-- <script src="js/layout_link_page.js"></script> -->



    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKMDJPGM" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <script>
        // Ensure the DOM is fully loaded before running the script
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Fetching SEO data..."); // Debugging line

            // Fetch the SEO data from content_read_seo.php
            fetch('database/admin/content_read_seo.php') // Make sure the path is correct
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error); // Log any error
                    } else {
                        // console.log(data); // Check what data is returned

                        // Assuming that the data contains multiple entries, here we use the first entry for simplicity
                        if (data.length > 0) {
                            const seo = data[0]; // Use the first item from the data array

                            // Update the title, description, and keywords meta tags dynamically
                            document.title = seo.seo_title; // Set the page title
                            // console.log("Updated Title:", document.title); // Debugging line

                            document.querySelector("meta[name='description']").setAttribute("content", seo.seo_description); // Set the description
                            // console.log("Updated Description:", seo.description); // Debugging line

                            document.querySelector("meta[name='keywords']").setAttribute("content", seo.seo_keywords); // Set the keywords
                            // console.log("Updated Keywords:", seo.keywords); // Debugging line
                            document.querySelector("link[rel='canonical']").setAttribute("href", seo.seo_canonical_url);
                        }
                    }
                })
                .catch(error => {
                    // console.error("Error fetching SEO data:", error);
                });
        });
    </script>



</body>

</html>