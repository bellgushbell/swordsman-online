<?php
session_start();
session_unset();
session_destroy();
http_response_code(200); // แจ้งว่า Logout สำเร็จ
exit();
