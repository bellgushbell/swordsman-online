<?php
$openId = "XevyOf";
$productCode = "98031708133907698966724390246666";
$username = "TestNes";
$password = "123456789";
$callbackKey = "eDSPiIaFD96cfbE6hyUjAjSWMQbho0xD";

// ข้อมูลที่ต้องส่ง (ไม่รวม callbackKey)
$data = [
    "openId" => $openId,
    "productCode" => $productCode,
    "username" => $username,
    "password" => $password
];

// เรียงลำดับพารามิเตอร์ตามคีย์
ksort($data);

// สร้างสตริงสำหรับคำนวณลายเซ็น
$signKey = '';
foreach ($data as $key => $val) {
    $signKey .= $key . '=' . $val . '&';
}

// เพิ่ม callbackKey ต่อท้ายสตริง
$signKey .= 'openKey=' . $callbackKey;

// คำนวณค่า MD5 เพื่อสร้าง sign
$sign = md5($signKey);

// ตรวจสอบค่า sign ที่สร้างขึ้น
echo "Generated Sign: " . $sign . "\n";

// เพิ่ม sign ลงในข้อมูลที่ต้องส่ง
$data['sign'] = $sign;

// API URL
$url = "http://sdkapi.exptopup.com/open/userRegiste";

// ส่ง API ด้วย cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
curl_close($ch);

// แสดงผลลัพธ์
echo "Response: " . $response;
?>