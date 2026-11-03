<?php
if(isset($_GET["chon"]) && $_GET["chon"] != "") {
    $op = $_GET["chon"];
    
    // Đổi từ include thành include_once để chỉ nạp tệp lớp Dao 1 lần duy nhất
    include_once("database.class.php");
    
    $dao = new Dao("root", "", "udn.sql"); // Hoặc "udn" tùy tên CSDL của bạn
    $sql = "select * from {$op}";
    $header = "DANH SÁCH " . strtoupper($op);
    $dao->table($sql, $header);
}
?>