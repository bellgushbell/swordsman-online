<?php
require_once __DIR__ . '/../connect_db.php'; // เรียกใช้ไฟล์เชื่อมต่อฐานข้อมูล


$page = $_GET['page'] ?? null;

if (!$page) {
    die("Error: page not provided.");
}

header('Content-Type: application/json; charset=UTF-8'); // Set the proper content type for UTF-8


$sql = "SELECT id, title, description, keywords FROM seo_web WHERE page = '$page'";
$result = $conn->query($sql);

$seoData = [];

if ($result) { // Check if the query was successful
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $seoData[] = $row;
        }
        echo json_encode($seoData, JSON_UNESCAPED_UNICODE); // Encode without escaping Unicode characters
    } else {
        echo json_encode(["error" => "No data found"]);
    }
} else {
    // Output MySQL error message
    echo json_encode(["error" => "Query failed", "details" => $conn->error]);
}

$conn->close();
