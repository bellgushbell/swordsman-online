<?php

$envPath = realpath(__DIR__ . '/../.env'); // ระบุ path ของไฟล์ .env

if (!$envPath || !file_exists($envPath)) {
    die("❌ Error: .env file not found at " . realpath(__DIR__ . '/../'));
}

// อ่านค่าใน .env
$env = parse_ini_file($envPath, false, INI_SCANNER_RAW);

if (!$env || !is_array($env)) {
    die("❌ Error: Failed to parse .env file. Check its format.");
}

// กำหนดตัวแปรเชื่อมต่อฐานข้อมูล
$servername = trim($env['DB_HOST'], '"');
$username   = trim($env['DB_USER'], '"');
$password   = trim($env['DB_PASS'], '"');
$dbname     = trim($env['DB_NAME'], '"');

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
