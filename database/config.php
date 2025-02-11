<?php
$host = "192.168.1.136";
$dbname = "swordsmancms";
$username = "swordsman3V2";
$password = "swordsman3!!@$%$";

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // เปิดโหมดแสดง Error
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // ให้ผลลัพธ์เป็น array
        PDO::ATTR_EMULATE_PREPARES => false, // ป้องกัน SQL Injection
    ];

    $conn = new PDO($dsn, $username, $password, $options);
    echo "✅ Connected successfully";
} catch (PDOException $e) {
    die("❌ Connection failed: " . $e->getMessage());
}
