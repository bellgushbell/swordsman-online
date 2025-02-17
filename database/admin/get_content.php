<?php
session_start();
require_once __DIR__ . '/../connect_db.php';  // Include the database connection

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['category']) && !empty($_POST['category'])) {
        $category = trim($_POST['category']);
        $category = mysqli_real_escape_string($conn, $category);

        // รับค่าหน้าปัจจุบัน
        $currentPage = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $itemsPerPage = 10;  // จำนวนรายการต่อหน้า
        $startIndex = ($currentPage - 1) * $itemsPerPage;

        if ($category === 'ทั้งหมด') {
            $countQuery = "SELECT COUNT(*) AS total FROM title";
            $query = "SELECT t.type, t.title, t.image, t.created_at, t.created_by, a.first_name 
                      FROM title t  
                      LEFT JOIN admin_user a ON t.created_by = a.id 
                      LIMIT $startIndex, $itemsPerPage";
        } else {
            $countQuery = "SELECT COUNT(*) AS total FROM title WHERE type = '$category'";
            $query = "SELECT t.type, t.title, t.image, t.created_at, t.created_by, a.first_name 
                      FROM title t  
                      LEFT JOIN admin_user a ON t.created_by = a.id 
                      WHERE type = '$category' 
                      LIMIT $startIndex, $itemsPerPage";
        }

        // ดึงจำนวนทั้งหมดของข้อมูล
        $result = mysqli_query($conn, $countQuery);
        $row = mysqli_fetch_assoc($result);
        $totalItems = $row['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);

        $result = $conn->query($query);

        if ($result) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // ส่งข้อมูล JSON รวม Pagination ไปด้วย
            header('Content-Type: application/json');
            echo json_encode([
                'data' => $data,
                'totalPages' => $totalPages,
                'currentPage' => $currentPage
            ]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Query failed.', 'details' => $conn->error]);
        }

        $conn->close();
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No category provided.']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request method.']);
}
