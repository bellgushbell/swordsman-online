<?php

// กำหนด path ของไฟล์ .env
$envPath = realpath(__DIR__ . '/../.env'); // ไฟล์ .env จะต้องอยู่ในโฟลเดอร์เดียวกับไฟล์นี้ หรือในโฟลเดอร์ข้างต้น

// ตรวจสอบว่าไฟล์ .env มีอยู่หรือไม่
if (!$envPath || !file_exists($envPath)) {
    die("❌ Error: .env file not found at " . realpath(__DIR__ . '/../'));
}

// อ่านข้อมูลจากไฟล์ .env
$env = parse_ini_file($envPath, false, INI_SCANNER_RAW);

// ตรวจสอบว่าอ่านค่าได้สำเร็จหรือไม่
if (!$env || !is_array($env)) {
    die("❌ Error: Failed to parse .env file. Check its format.");
}

// กำหนดค่าตัวแปรเชื่อมต่อฐานข้อมูล
$servername = trim($env['DB_HOST'], '"');
$username   = trim($env['DB_USER'], '"');
$password   = trim($env['DB_PASS'], '"');
$dbname     = trim($env['DB_NAME'], '"');

// เชื่อมต่อฐานข้อมูล MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    // หากการเชื่อมต่อล้มเหลว ให้เขียนข้อผิดพลาดลงในไฟล์ log แทนการแสดงข้อผิดพลาดตรงๆ
    error_log("Database connection failed: " . $conn->connect_error, 3, __DIR__ . '/../error_log.txt');
    die("❌ Database connection failed. Please try again later.");
}

// ตั้งค่ารูปแบบการเข้ารหัสเป็น utf8mb4 (เหมาะสำหรับตัวอักษรหลายภาษาหรืออีโมจิ)
$conn->set_charset("utf8mb4");
