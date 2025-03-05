<?php
require 'vendor/autoload.php'; // โหลด AWS SDK
require_once __DIR__ . '/../connect_db.php'; // เชื่อมต่อฐานข้อมูล

use Aws\Ses\SesClient;
use Aws\Exception\AwsException;

// โหลดค่า AWS จาก .env
$env = parse_ini_file(__DIR__ . '/../.env', false, INI_SCANNER_RAW);
$awsKey = trim($env['AWS_ACCESS_KEY'], '"');
$awsSecret = trim($env['AWS_SECRET_KEY'], '"');
$region = trim($env['AWS_REGION'], '"');
$senderEmail = trim($env['AWS_EMAIL_SENDER'], '"');

// ✅ กำหนดค่าอีเมลที่ได้รับการยืนยันแล้ว (สามารถเปลี่ยนเป็นอีเมลอื่นที่ Verify แล้ว)
$allowedEmail = "gushbellpiriyapong@gmail.com"; 

// รับค่าอีเมลจากฟอร์ม
$recipientEmail = $_POST['email'] ?? '';

if (!filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'อีเมลไม่ถูกต้อง']);
    exit;
}

// ✅ ตรวจสอบว่าอีเมลปลายทางได้รับการยืนยันหรือไม่ (เฉพาะ Sandbox Mode เท่านั้น)
if ($recipientEmail !== $allowedEmail) {
    echo json_encode(['success' => false, 'message' => 'ไม่สามารถส่งอีเมลไปยังที่อยู่นี้ได้ (ต้องเป็นอีเมลที่ได้รับการยืนยันแล้ว)']);
    exit;
}

// ✅ สร้าง token แบบสุ่ม
$token = bin2hex(random_bytes(16));
$confirmUrl = "https://dev.stationidea.com/page/player/email_success_validate_preregister.php?token=" . $token;

// ✅ สร้างเนื้อหาอีเมล
$emailBody = "
<!DOCTYPE html>
<html lang='th'>
<head>
    <meta charset='UTF-8'>
    <title>ยืนยันอีเมลของคุณ</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #fdf2e9; }
        .email-container { background: white; padding: 30px; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0px 4px 12px rgba(0,0,0,0.15); }
        .email-header { background: linear-gradient(90deg, #ff7e5f, #feb47b); padding: 20px; border-radius: 10px 10px 0 0; color: white; }
        .confirm-button { padding: 10px 20px; font-size: 16px; color: white; background: #ff7e5f; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px; }
        .confirm-button:hover { background: #e05c4f; }
    </style>
</head>
<body>
<div class='email-container'>
    <div class='email-header'><h1>ยืนยันอีเมลของคุณ</h1></div>
    <p>ขอบคุณที่ลงทะเบียน! กรุณากดยืนยันอีเมลของคุณ:</p>
    <p><a href='{$confirmUrl}' class='confirm-button'>ยืนยันอีเมล</a></p>
</div>
</body>
</html>";

try {
    // ✅ สร้าง SES Client
    $SesClient = new SesClient([
        'version' => 'latest',
        'region'  => $region,
        'credentials' => [
            'key'    => $awsKey,
            'secret' => $awsSecret,
        ],
    ]);

    // ✅ ส่งอีเมล
    $SesClient->sendEmail([
        'Destination' => ['ToAddresses' => [$recipientEmail]],
        'Message' => [
            'Body' => ['Html' => ['Data' => $emailBody]],
            'Subject' => ['Data' => 'ยืนยันอีเมลของคุณ - SwordsMan3 Mobile'],
        ],
        'Source' => $senderEmail, // ✅ ต้องเป็นอีเมลที่ Verify แล้ว
    ]);

    echo json_encode(['success' => true, 'message' => 'อีเมลถูกส่งเรียบร้อย']);
} catch (AwsException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
