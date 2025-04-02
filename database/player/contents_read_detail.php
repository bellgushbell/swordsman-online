<?php
session_start();
require_once __DIR__ . '/../connect_db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Error: ID not provided.");
}

// Corrected SQL Query
$sql  = "
SELECT contents.*, 
       category.category_name_th AS category_name
FROM contents
LEFT JOIN category ON contents.category_id = category.id
WHERE contents.status = 'post'
AND contents.deleted_at IS NULL
AND contents.id = ?
ORDER BY contents.id DESC
";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Store data in session
    $_SESSION['data_contents'] = $data;

    // Redirect with ID only (not full session data)
    header("Location: ../../page/player/contents_detail.php?id=" . $id);
    exit();
} else {
    die("Error: Data not found.");
}

$stmt->close();
$conn->close();
