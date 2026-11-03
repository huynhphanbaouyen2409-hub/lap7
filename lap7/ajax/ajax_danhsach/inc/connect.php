<?php
$server = "localhost"; // Lấy tên server hiện tại (thường là localhost)
$user = "root";                    // Tên tài khoản quản trị MySQL mặc định của XAMPP
$pass = "";                        // Mật khẩu tài khoản (mặc định XAMPP để trống)
$db = "udn.sql";                       // Tên CSDL bạn đã tạo (ở bước 1: udn)

// Thực hiện kết nối vào CSDL MySQL
$con = mysqli_connect($server, $user, $pass, $db);

// Thiết lập bảng mã tiếng Việt (UTF-8) để tránh lỗi font khi hiển thị dữ liệu
mysqli_query($con, "set names 'utf8'");
?>