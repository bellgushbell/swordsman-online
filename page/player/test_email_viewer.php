<?php
// ตัวอย่าง token จำลอง (จริงๆ ต้องมาจากฐานข้อมูล)
$token = "sample_test_token";
$confirmUrl = "https://dev.stationidea.com/page/player/email_success_validate_preregister.php?token=" . $token;
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อีเมลยืนยันการลงทะเบียน</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdf2e9;
            text-align: center;
            padding: 20px;
        }
        .email-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-width: 600px;
            margin: 20px auto;
        }
        .email-header {
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            padding: 20px;
            border-radius: 10px 10px 0 0;
            color: white;
        }
        .email-content {
           
            padding: 20px;
            text-align: left;
            padding-bottom:0px;
        }
        .email-footer {
            font-size: 14px;
            color: #777;
            border-top: 1px solid #ffd4b8;
            padding: 10px;
            margin-top: 20px;
        }
        .confirm-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background: #ff7e5f;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top:10px
            
        }
        .confirm-button:hover {
            background: #e05c4f;
        }
        .gif-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .gif-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="email-container">
    <div class="email-header">
        <h1>ยืนยันอีเมลของคุณ</h1>
    </div>
    <div class="email-content">
        
       
        <div class="gif-container">
            <img src="https://www.lappymaker.com/images/greentick-unscreen.gif" alt="Email Confirmation">
        </div>

        <p>ขอบคุณที่ลงทะเบียนล่วงหน้า! กรุณากดปุ่มด้านล่างเพื่อยืนยันอีเมลของคุณ</p>
        <p>หลังจากยืนยัน ระบบจะเพิ่มสถานะลงทะเบียนให้คุณโดยอัตโนมัติ</p>
        <p style="text-align: center;">
            <a href="<?php echo $confirmUrl; ?>" class="confirm-button">ยืนยันอีเมล</a>
        </p>
    </div>
    <div class="email-footer">
        <p>หากคุณไม่ได้ทำรายการนี้ โปรดเพิกเฉยต่ออีเมลนี้</p>
        <p>© 2024 SwordsMan3 Mobile. All rights reserved.</p>
    </div>
</div>

</body>
</html>
