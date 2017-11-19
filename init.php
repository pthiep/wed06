<?php
// PHP hiển thị lỗi
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Khởi tạo session
session_start();

// Gán biến page giống với tên file
$page = basename($_SERVER['SCRIPT_NAME'], '.php');

// Kết nối CSDL
$db = new PDO('mysql:host=localhost;dbname=btcn08;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Kiểm tra thông tin người dùng
$currentUser = null;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require_once 'functions.php';

if (isset($_SESSION['userId'])) {
  $currentUser = findUserById($_SESSION['userId']);
}