<?php
 include 'connect_db.php';
// Prepare and bind
$stmt = $conn->prepare("INSERT INTO admin_user (username, password,first_name,last_name,created_at,roles) VALUES ('admin_dev', '@dm1n', 'Admin', 'Dev', '2019-01-01 00:00:00', '1')");
$stmt->bind_param("ss", $username, $password);

// Set parameters and execute
$username = "new_user";
$password = password_hash("user_password", PASSWORD_DEFAULT);
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>