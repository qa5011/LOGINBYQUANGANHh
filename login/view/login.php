<?php
require_once 'database.php'; // Tệp kết nối cơ sở dữ liệu
require_once 'AuthController.php';

$auth = new AuthController($database);
$auth->login();
include 'view/login.php';
?>

<form action="login.php" method="POST">
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
