<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['category']) && !empty($_POST['category'])) {
        $category = trim($_POST['category']);
        $category = mysqli_real_escape_string($conn, $category);

        // รับค่าหน้าปัจจุบัน
        $currentPage = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $itemsPerPage = 6;  // จำนวนรายการต่อหน้า
        $startIndex = ($currentPage - 1) * $itemsPerPage;

        if ($category === 'ทั้งหมด') {
            $countQuery = "SELECT COUNT(*) AS total FROM title  t  
                      INNER JOIN description d ON d.id_title = t.id";
            $query = "SELECT  t.id, t.type, t.title, t.image, t.created_at, t.created_by, a.first_name, aa.first_name as update_by,t.updated_at,t.alt_text,t.highlight_text
                      FROM title t  
                      INNER JOIN description d ON d.id_title = t.id
                      LEFT JOIN admin_user a ON t.created_by = a.id 
                      LEFT JOIN admin_user aa ON t.update_by = aa.id 
                      LIMIT $startIndex, $itemsPerPage";
        } else {
            $countQuery = "SELECT COUNT(*) AS total FROM title  t  
                      INNER JOIN description d ON d.id_title = t.id WHERE type = '$category'";
            $query = "SELECT t.id, t.type, t.title, t.image, t.created_at, t.created_by, a.first_name, aa.first_name as update_by,t.updated_at,t.alt_text,t.highlight_text
                      FROM title t  
                      INNER JOIN description d ON d.id_title = t.id
                      LEFT JOIN admin_user a ON t.created_by = a.id 
                      LEFT JOIN admin_user aa ON t.update_by = aa.id 
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
