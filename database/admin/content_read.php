<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['category']) && !empty($_POST['category'])) {

        $category = trim($_POST['category']);

        // รับค่าหน้าปัจจุบัน
        $currentPage = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $itemsPerPage = 6; // จำนวนรายการต่อหน้า
        $startIndex = ($currentPage - 1) * $itemsPerPage;

        if ($category === 'ALL') {
            $countQuery = "SELECT COUNT(*) AS total FROM contents";
            $query = "SELECT contents.*, category.category_name_en AS category_name, created_users.username AS created_by, updated_users.username AS updated_by  
                      FROM contents 
                      INNER JOIN category ON contents.category_id = category.id 
                      INNER JOIN users AS created_users ON contents.created_by = created_users.id
                      LEFT JOIN users AS updated_users ON contents.updated_by = updated_users.id
                      LIMIT ?, ?";
        } else {
            $countQuery = "SELECT COUNT(*) AS total FROM contents 
                           INNER JOIN category ON contents.category_id = category.id 
                           WHERE category.category_name_en = ?";
            $query = "SELECT contents.*, category.category_name_en AS category_name , created_users.username AS created_by, updated_users.username AS updated_by  
                      FROM contents 
                      INNER JOIN category ON contents.category_id = category.id 
                      INNER JOIN users AS created_users ON contents.created_by = created_users.id
                      LEFT JOIN users AS updated_users ON contents.updated_by = updated_users.id
                      WHERE category.category_name_en = ? 
                      LIMIT ?, ?";
        }

        // นับจำนวนทั้งหมดของข้อมูล
        $stmt = $conn->prepare($countQuery);
        if ($category !== 'ALL') {
            $stmt->bind_param("s", $category);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $totalItems = $row['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);
        $stmt->close();

        // ดึงข้อมูลที่ต้องการแสดง
        $stmt = $conn->prepare($query);
        if ($category === 'ALL') {
            $stmt->bind_param("ii", $startIndex, $itemsPerPage);
        } else {
            $stmt->bind_param("sii", $category, $startIndex, $itemsPerPage);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $stmt->close();
        $conn->close();

        // ส่งข้อมูล JSON รวม Pagination ไปด้วย
        header('Content-Type: application/json');
        echo json_encode([
            'data' => $data,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage
        ]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No category provided.']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request method.']);
}
