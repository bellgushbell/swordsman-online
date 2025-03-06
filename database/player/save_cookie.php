<?php
require_once __DIR__ . '/../connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_uuid = mysqli_real_escape_string($conn, $_POST['user_uuid']);
    $consent_given = isset($_POST['consent_given']) ? (int)$_POST['consent_given'] : 0;

    // ฟังก์ชันดึง IP จริง
    function getUserIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
    
    $ip_address = mysqli_real_escape_string($conn, getUserIP());
    $user_agent = mysqli_real_escape_string($conn, $_SERVER['HTTP_USER_AGENT']);

    if (!empty($user_uuid)) {
        $query = "INSERT INTO cookie_consent (user_uuid, ip_address, user_agent, consent_given) 
                  VALUES ('$user_uuid', '$ip_address', '$user_agent', '$consent_given') 
                  ON DUPLICATE KEY UPDATE consent_given = '$consent_given', consent_date = NOW(), ip_address = '$ip_address', user_agent = '$user_agent'";

        @mysqli_query($conn, $query);
    }
}

mysqli_close($conn);
?>
