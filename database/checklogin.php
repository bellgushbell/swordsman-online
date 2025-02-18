<?php
//class testapi
// {
//     public function Getapi()
//     {
//         $openId = "maPb8q";
//         $productCode = "66355736788710143598608629216002";
//         $username = "TESEUSER";
//         $password = "789456123";
//         $callbackkey = "74821199077278614690677970030168";

//         // กำหนดค่าพารามิเตอร์ (ไม่รวม sign)
//         $params = [
//             'openId' => $openId,
//             'productCode' => $productCode,
//             'username' => $username,
//             'password' => $password
//         ];

//         // คำนวณค่า MD5 sign
//         $sign = $this->getMd5Sign($params, $callbackkey);
//         $params['sign'] = $sign;

//         // แสดงค่าที่ใช้ส่งไปยัง API
//         echo "Final Params:\n";
//         print_r($params);

//         // API URL
//         $url = "http://sdkapi.exptopup.com/open/userRegiste";

//         // ส่ง API
//         $response = $this->sendPostRequest($url, $params);
//         echo "Response: " . $response;
//     }

//     public function getMd5Sign($params_in, $callbackkey)
//     {
//         $params = $params_in;
//         ksort($params); // เรียงพารามิเตอร์ตาม key
//         $signKey = '';

//         foreach ($params as $key => $val) {
//             $signKey .= $key . '=' . $val . '&';
//         }

        
//         $signKey .= $callbackkey;

        
//         echo "Sign String: " . $signKey . "\n";

       
//         return strtolower(md5($signKey));
//     }

//     private function sendPostRequest($url, $params)
//     {
//         $ch = curl_init($url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, '', '&', PHP_QUERY_RFC3986));
//         curl_setopt($ch, CURLOPT_HTTPHEADER, [
//             'Content-Type: application/x-www-form-urlencoded'
//         ]);

//         $response = curl_exec($ch);
//         curl_close($ch);
//         return $response;
//     }
// }

// $api = new testapi();
// $api->Getapi();


// Function to generate the MD5 sign
function getMd5Sign($params, $callbackKey) {
    // Remove 'sign' from parameters
    unset($params['sign']);
    
    // Sort parameters by keys
    ksort($params);
    
    // Concatenate key-value pairs
    $signString = '';
    foreach ($params as $key => $value) {
        $signString .= $key . '=' . $value . '&';
    }
    
    // Append the callbackKey at the end
    $signString .=  $callbackKey;
    
    // Generate MD5 of the concatenated string
    return md5($signString);
}

// Sample data
$params = [
    'openId' => 'maPb8q',
    'productCode' => '66355736788710143598608629216002',
    'username' => 'TESEUSER',
    'password' => '789456123',
    'sign' => '' // This will be added after sign generation
];

// Sample callback key
$callbackKey = '1Yob3ncP2RADVIaNjgXJh36zatKZFTpG';

// Generate the sign
$generatedSign = getMd5Sign($params, $callbackKey);

// Add the generated sign to the parameters
$params['sign'] = $generatedSign;

// Output the final parameters
echo "Generated Sign: " . $generatedSign . "\n";

// Now you can send these parameters in your request

