<?php
$openId = "XevyOf";
$productCode = "98031708133907698966724390246666";
$username = "TestNes";
$password = "123456789";
$openKey = "eDSPiIaFD96cfbE6hyUjAjSWMQbho0xD";

// จัดเรียงพารามิเตอร์และสร้าง sign
$params = "openId=$openId&password=$password&productCode=$productCode&username=$username&openKey=$openKey";
$sign = md5($params);

echo $sign ;
// API URL
 $url = "http://sdkapi.exptopup.com/open/userRegiste";

// // ข้อมูลที่ต้องส่ง
// $data = [
//     "openId" => $openId,
//     "productCode" => $productCode,
//     "username" => $username,
//     "password" => $password,
//     "sign" => $sign
// ];

// // ส่ง API ด้วย cURL
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
// $response = curl_exec($ch);
// curl_close($ch);

// // แสดงผลลัพธ์
// echo "Response: " . $response;
?>