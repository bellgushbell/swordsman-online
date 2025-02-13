<?php
header('Content-Type: application/json');
// include 'connect_db.php'; // เชื่อมต่อฐานข้อมูล
include 'config.php'; // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['table'] ?? null;
    $action = $_POST['action'] ?? null;
    $data = $_POST['data'] ?? [];

    if (!$table || !$action || empty($data)) {
        die(json_encode(["status" => "error", "message" => "❌ ข้อมูลไม่ครบ"]));
    }

    try {
        if ($action === "insert") {
            insertData($conn, $table, $data);
        } elseif ($action === "update") {
            $where = $_POST['where'] ?? null;
            if (!$where) die(json_encode(["status" => "error", "message" => "❌ ต้องระบุเงื่อนไขสำหรับการอัปเดต"]));
            updateData($conn, $table, $data, $where);
        } elseif ($action === "delete") {
            $where = $_POST['where'] ?? null;
            if (!$where) die(json_encode(["status" => "error", "message" => "❌ ต้องระบุเงื่อนไขสำหรับการลบ"]));
            deleteData($conn, $table, $where);
        }
    } catch (PDOException $e) {
        die(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $table = $_GET['table'] ?? null;
    $where = $_GET['where'] ?? null;

    if (!$table) {
        die(json_encode(["status" => "error", "message" => "❌ ต้องระบุตารางที่ต้องการดึงข้อมูล", "debug" => $_GET]));
    }

    try {
        $data = getData($conn, $table, $where);
        header('Content-Type: application/json');
        echo json_encode(["status" => "success", "data" => $data]);
    } catch (PDOException $e) {
        die(json_encode(["status" => "error", "message" => $e->getMessage()]));
    }
}


// ✅ ฟังก์ชัน INSERT (ป้องกัน SQL Injection)
function insertData($conn, $table, $data)
{
    $columns = implode(", ", array_keys($data));
    $values = ":" . implode(", :", array_keys($data));
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    echo json_encode(["status" => "success", "message" => "✅ เพิ่มข้อมูลสำเร็จ!"]);
}

// ✅ ฟังก์ชัน UPDATE (ป้องกัน SQL Injection)
function updateData($conn, $table, $data, $where)
{
    $set = implode(", ", array_map(fn($key) => "$key = :$key", array_keys($data)));
    $sql = "UPDATE $table SET $set WHERE $where";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    echo json_encode(["status" => "success", "message" => "✅ อัปเดตข้อมูลสำเร็จ!"]);
}

// ✅ ฟังก์ชัน DELETE (ป้องกัน SQL Injection)
function deleteData($conn, $table, $where)
{
    $sql = "DELETE FROM $table WHERE $where";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo json_encode(["status" => "success", "message" => "✅ ลบข้อมูลสำเร็จ!"]);
}

// ✅ ฟังก์ชัน SELECT (ป้องกัน SQL Injection)
function getData($conn, $table, $where = null, $params = [])
{
    $sql = "SELECT * FROM `$table`"; // 🔹 ป้องกันชื่อ Table ผิดพลาด

    if ($where) {
        $sql .= " WHERE $where"; // 🚨 ควรใช้ `?` แล้วส่ง `$params` มาด้วย
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
    } else {
        $stmt = $conn->query($sql);
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}





// $queryV3 = " select * from admin_user";
// $resultV3 = mysqli_query($conn, $queryV3);

// while ($row = mysqli_fetch_array($resultV3)) {
//     $valu = $row['username'];
// }

// $response = [
//     'valu' => $valu,
// ];

// $response = json_encode($response);
// echo $response;
