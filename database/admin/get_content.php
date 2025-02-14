<?php
session_start();
require_once __DIR__ . '/../connect_db.php';  // Include the database connection

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['category']) && !empty($_POST['category'])) {
        $category = trim($_POST['category']); // กำจัดช่องว่าง
        $category = mysqli_real_escape_string($conn, $category); // ป้องกัน SQL Injection

        if ($category === 'ทั้งหมด') {
            $query = "SELECT t.type, t.title, t.image, t.created_at, t.created_by, a.first_name FROM title t  LEFT JOIN admin_user a ON t.created_by = a.id";
        } else {
            $query = "SELECT t.type, t.title, t.image, t.created_at, t.created_by, a.first_name FROM title t  LEFT JOIN admin_user a ON t.created_by = a.id WHERE type = '$category'";
        }


        $result = $conn->query($query);

        if ($result) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // Return data as JSON
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            // ถ้ามีข้อผิดพลาด
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Query failed.', 'details' => $conn->error]);
        }

        // Close the connection
        $conn->close();
    } else {
        // ถ้าไม่มีค่า category
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No category provided.']);
    }
} else {
    // ถ้าวิธีการร้องขอไม่ใช่ POST
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request method.']);
}
