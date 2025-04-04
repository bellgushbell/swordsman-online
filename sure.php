     <!---- Class Preview Section class preview -->

     <section class="class-page-section">
  <div class="image-container">
    <img src="images/Class-Pic/butung.jpg" alt="Background" class="bg-image-class" />
    
    <!-- ปุ่มวิดีโออิงจากรูป -->
    <div class="floating-video-button">
      <img src="images/Class-Pic/playbutton.png" class="video-play-button" id="openVideoModal" />
    </div>
  </div>

  <!-- Sidebar -->
  <div class="class-sidebar-wrapper">
    <!-- รายการคลาส -->
  </div>
</section>


        <!--End Class Preview Section-->


/* ==============================
  Class Preview 
   ============================== */
.class-page-section {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #000;
    overflow: hidden;
}

.image-container {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    max-width: 100%;
    z-index: 1;
}

.bg-image-class {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    z-index: 0;
}

.floating-video-button {
    position: absolute;
    top: 34%;
    /* คำนวณจากรูปจริง 2550x1440 */
    left: 23%;
    transform: translate(-50%, -50%);
    z-index: 2;
    pointer-events: auto;
}

.video-play-button {
    width: 48px;
    height: 48px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.video-play-button:hover {
    transform: scale(1.1);
}

.class-sidebar-wrapper {
    position: absolute;
    left: 1%;
    top: 50%;
    transform: translateY(-50%);
    z-index: 3;
    /* ... อื่น ๆ ... */
}
