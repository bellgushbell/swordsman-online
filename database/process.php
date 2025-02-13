<?php
include(__DIR__ . '/connect_db.php');

header('Content-Type: application/json');

// เช็คว่ามีการส่ง request มาหรือไม่
$request_method = $_SERVER['REQUEST_METHOD'];
$is_ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

// ตรวจสอบการทำงานของ API
if ($request_method === 'GET') {
    handleGetRequest();
} elseif ($request_method === 'POST') {
    handlePostRequest();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}

// 🔹 ฟังก์ชันจัดการ GET Request
function handleGetRequest()
{
    global $conn; // ใช้ตัวแปรฐานข้อมูล

    // ตรวจสอบว่ามีการส่งค่า table หรือไม่
    if (empty($_GET['table'])) {
        die(json_encode(["status" => "error", "message" => "Missing table name"]));
    }

    $table = $_GET['table'];
    $id = $_GET['id'] ?? null;

    // ตรวจสอบว่า table มีอยู่จริงในฐานข้อมูล
    $check_table = $conn->query("SHOW TABLES LIKE '$table'");
    if ($check_table->num_rows == 0) {
        die(json_encode(["status" => "error", "message" => "Table '$table' does not exist"]));
    }

    // ตรวจสอบว่ามี id หรือไม่
    if ($id === null) {
        $sql = "SELECT * FROM $table";
        $stmt = $conn->prepare($sql);
    } else {
        $sql = "SELECT * FROM $table WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
    }

    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}


// 🔹 ฟังก์ชันจัดการ POST Request (INSERT, UPDATE, DELETE)
function handlePostRequest()
{
    global $conn;

    $type = $_POST['type'] ?? null;
    $table = $_POST['table'] ?? null;
    $data = $_POST['data'] ?? null;

    if (!$type || !$table || !$data) {
        echo json_encode(["status" => "error", "message" => "Missing required parameters"]);
        exit;
    }

    // ป้องกัน SQL Injection
    $allowed_tables = ['news', 'articles'];
    if (!in_array($table, $allowed_tables)) {
        echo json_encode(["status" => "error", "message" => "Invalid table name"]);
        exit;
    }

    if ($type === "insert") {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_map([$conn, 'real_escape_string'], array_values($data)));
        $sql = "INSERT INTO `$table` ($columns) VALUES ('$values')";
    } elseif ($type === "update") {
        if (!isset($data['id'])) {
            echo json_encode(["status" => "error", "message" => "Missing ID for update"]);
            exit;
        }
        $id = $data['id'];
        unset($data['id']);
        $updates = implode(", ", array_map(function ($key, $value) use ($conn) {
            return "$key = '" . $conn->real_escape_string($value) . "'";
        }, array_keys($data), array_values($data)));
        $sql = "UPDATE `$table` SET $updates WHERE id = '$id'";
    } elseif ($type === "delete") {
        if (!isset($data['id'])) {
            echo json_encode(["status" => "error", "message" => "Missing ID for delete"]);
            exit;
        }
        $id = $data['id'];
        $sql = "DELETE FROM `$table` WHERE id = '$id'";
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid type"]);
        exit;
    }

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => ucfirst($type) . " successful"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }
}
