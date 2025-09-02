<?php
require_once '../model/database.php'; // Kết nối cơ sở dữ liệu
require_once 'AuthController.php';

$auth = new AuthController($database); // Khởi tạo AuthController với kết nối CSDL
$auth->register(); // Gọi hàm đăng ký
?>
