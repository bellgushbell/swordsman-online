    <!-- Navbar -->
    <nav class="main-nav dark dark-after-scroll transparent stick-fixed wow-menubar">
        <div class=" relative clearfix gradient-bg">


            <div class="nav-logo-wrap local-scroll">
                <a href="#" class="logo">

                    <img src="../../images/Logo SwordMan3-Final-white-transparent.png" alt="Company logo" width="250"
                        height="50" class="logo-white" />
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
                    <img src="../../images/member-icon.gif" alt="Member Icon" width="30" />
                    สมาชิก
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="memberDropdown">
                    <li><a class="dropdown-item notify" href="login.html">เข้าสู่ระบบ</a></li>
                    <li><a class="dropdown-item notify" href="register.html">สมัครสมาชิก</a></li>
                </ul>
            </div>



            <script>
                document.addEventListener('DOMContentLoaded', function() {

                    const notifyLinks = document.querySelectorAll('.notify');


                    notifyLinks.forEach(link => {
                        link.addEventListener('click', function(event) {
                            event.preventDefault();

                            Swal.fire({
                                html: `
                        <div style="text-align: center;">
                            <img src="../../images/error-icon.png" alt="Error Icon" style="width: 100px; height: auto; " />
                            
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
    </nav>
    <!-- End Navbar -->