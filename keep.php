 <!---- Class Preview Section class preview -->

         <!-- Class Preview Section -->
        <section class="class-page-section" id="class">
           <!-- ปุ่มวิดีโอลอย -->
            <!-- <div class="floating-video-button">
            <img src="images/Class-Pic/playbutton.png" alt="Play Video" class="video-play-button" id="openVideoModal" />
            </div> -->

            
             <!-- <div
                class="bg-blur-background"
                style="
                position: absolute;
                inset: 0;
                background: url('images/background/bg-class.jpg') no-repeat center center;
                background-size: cover;
                filter: blur(20px) brightness(0.7);
                z-index: -1;
                pointer-events: none;"
            ></div> -->
        <div class="container-fluid relative">
            <div class="row">
          
            <div class="col-12 class-visual-wrapper">
                 <!-- <div class="bg-fallback" style="background-image: url('images/Class-Pic/butung.jpg');"></div> -->
                
               
                <img src="images/Class-Pic/butung.jpg" alt="Background Image Class" class="bg-image-class">
                

                 <!-- กล่องรวมปุ่มวิดีโอ + sidebar -->
                <div class="left-side-tools">
                

                <div class="class-sidebar-wrapper">

             
                <button class="scroll-btn up" id="scrollUp">▲</button>
                <div class="class-sidebar" id="classSidebar">
                    <ul class="class-menu">
                    <li data-class="class1" class="active" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(244, 159, 47, 0.93))'"
                        onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/butung-icon.png" alt="อาชีพที่ 1" class="menu-icon"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(244, 151, 30, 0.93))'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">บู้ตึ้ง</span>
                    </li>
                    <li data-class="class2" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(30, 194, 254, 0.93))'"
                        onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/wangwaree-icon.png" alt="อาชีพที่ 2" class="menu-icon"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(30, 194, 254, 0.93))'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">วังวารี</span>
                    </li>
                    <li data-class="class3" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(5, 96, 7, 0.93))'"
                        onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/muenbuppha-icon.png" alt="อาชีพที่ 3" class="menu-icon"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(5, 96, 20, 0.93))'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">หมื่นบุปผา</span>
                    </li>
                    <li data-class="class4" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(5, 96, 20, 0.93))'"
                        onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/bailu-icon.png" alt="อาชีพที่ 4" class="menu-icon"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(5, 96, 20, 0.93))'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">ไป๋ลู่</span>
                    </li>
                    <li data-class="class5" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(251, 9, 9, 0.93))'"
                        onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/tian-ren-icon.png" alt="อาชีพที่ 5" class="menu-icon"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(251, 9, 9, 0.93))'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">เทียนเหริ่น</span>
                    </li>
                    <li data-class="class6" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px #edb518)'" onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/mysterioussword-icon.png" alt="อาชีพที่ 6" class="menu-icon"
                            style="transition: filter 0.3s ease;" onmouseover="this.style.filter='drop-shadow(0 0 15px #edb518)'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">กระบี่ลี้ลับ</span>
                    </li>
                    <li data-class="class7" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px #edb518)'" onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/tian-wang-icon.png" alt="อาชีพที่ 7" class="menu-icon"
                            style="transition: filter 0.3s ease;" onmouseover="this.style.filter='drop-shadow(0 0 15px #edb518)'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">เทียนหวัง</span>
                    </li>
                    <li data-class="class8" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(30, 194, 254, 0.93))'"
                        onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/changer-icon.png" alt="อาชีพที่ 8" class="menu-icon"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(30, 194, 254, 0.93))'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">ฉางเกอ</span>
                    </li>
                    <li data-class="class9" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(244, 159, 47, 0.93))'"
                        onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/ancientgrave-icon.png" alt="อาชีพที่ 9" class="menu-icon"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(244, 159, 47, 0.93))'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">สุสานโบราณ</span>
                    </li>
                    <li data-class="class10" style="transition: filter 0.3s ease;"
                        onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(251, 9, 9, 0.93))'"
                        onmouseout="this.style.filter='none'">
                        <img src="images/ClassIcon/beggarclan-icon.png" alt="อาชีพที่ 10" class="menu-icon"
                            style="transition: filter 0.3s ease;"
                            onmouseover="this.style.filter='drop-shadow(0 0 15px rgba(251, 9, 9, 0.93))'"
                            onmouseout="this.style.filter='none'">
                        <span class="class-label">พรรคกระยาจก</span>
                    </li>
                    </ul>
                </div>
                
                <button class="scroll-btn down" id="scrollDown">▼</button>
                </div><!-- /class-sidebar-wrapper -->
                <!-- ปุ่มเล่นวิดีโอ -->
                <!-- <div class="video-button-container">
                    <img src="images/Class-Pic/playbutton.png" alt="Play Video" class="video-play-button" id="openVideoModal" />
                </div> -->
                </div><!-- /left-side-tools -->
            </div><!-- /class-visual-wrapper -->
           
       
    </div>


       <!-- Modal สำหรับแสดงวิดีโอ -->
            <div id="videoModal" class="video-modal">
            <div class="video-modal-content">
                <!-- ปุ่มปิด Modal -->
                <span class="close-video-modal" id="closeVideoModal">&times;</span>

                <!-- วิดีโอ YouTube Embed -->
                <iframe width="853" height="480"
                src="https://www.youtube.com/embed/xqSF_zi2-7M"
                title="บรรยากาศในเกมกระบี่เย้ยยุทธจักร3  มีสภาพอากาศเปลี่ยนแปลงสมจริงตลอด 24 ชั่วโมง #กระบี่เย้ยยุทธจักร3"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
                </iframe>
            </div>
            </div>




        </section>
        
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const playBtn = document.querySelector(".video-play-button");
            const modal = document.getElementById("videoModal");
            const closeBtn = document.getElementById("closeVideoModal");

            playBtn.addEventListener("click", () => {
            modal.style.display = "flex";
            });

            closeBtn.addEventListener("click", () => {
            modal.style.display = "none";
            // หยุดวิดีโอเมื่อปิด
            const iframe = modal.querySelector("iframe");
            iframe.src = iframe.src;
            });

            // ปิด modal เมื่อคลิกนอกกรอบ
            window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.style.display = "none";
                const iframe = modal.querySelector("iframe");
                iframe.src = iframe.src;
            }
            });
        });
        </script>


        <!--End Class Preview Section-->