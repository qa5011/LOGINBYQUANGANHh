<?php
$host = 'localhost';
$db = 'moviedb';
$user = 'root';
$pass = '';

try {
    $database = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
