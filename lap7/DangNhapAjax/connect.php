<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "udn.sql"; // Hoặc "udn.sql" tùy theo tên bạn đã đặt trong phpMyAdmin[cite: 21]
$con = mysqli_connect($server, $user, $pass, $db);
mysqli_query($con, "set names 'utf8'");
?>