<?php
include("inc/connect.php");
$lop = $_GET['lop'];

$sql = "Select * from sinhvien where lop='{$lop}'";
$rs = mysqli_query($con, $sql);
$str = "<table>
<tr class=hd>
<td>TT</td>
<td>Mã số</td>
<td>Họ tên</td>
<td>Địa chỉ</td>
</tr>";

$tt = 1;
while($row = mysqli_fetch_array($rs)) {
    $str .= "<tr>
    <td>{$tt}</td>
    <td>{$row['masv']}</td>
    <td>{$row['hoten']}</td>
    <td>{$row['diachi']}</td>
    </tr>";
    $tt++;
}
$str .= "</table>";

echo $str;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ajax - Danh sách lớp</title>
<link href="style/style.css" type="text/css" rel="stylesheet">
<style>
body { font-size: 11pt; }
div { padding: 3px 5px; font: normal 13pt Arial; }
table { background-color: #eaeaea; border-collapse: collapse; width: 100%; }
td { font: normal 11pt Arial; padding: 6px 10px; border: 1px solid #ccc; }
.hd { background-color: navy; color: white; }
</style>
<script>
function sendajax() {
    var lop = document.getElementById("lop").value;
    var objds = document.getElementById("ds");
    var xml = new XMLHttpRequest();
    
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            objds.innerHTML = xml.responseText;
        }
    }
    
    var url = "ds.php?lop=" + lop;
    xml.open("GET", url, true);
    xml.send();
}
</script>
</head>

<body>
<h3>In danh sách theo từng lớp</h3>
<?php
include("inc/connect.php");
$lop = $_GET['lop'];
function initClass($conn) {
    $sql = "Select distinct lop from sinhvien";
    $rs = mysqli_query($conn, $sql);
    $str = "Chọn lớp: <select id='lop' onChange='sendajax();'>";
    while($row = mysqli_fetch_array($rs)) {
        $str .= "<option value='{$row['lop']}'>{$row['lop']}</option>";
    }
    $str .= "</select>";
    echo $str;
}

initClass($con);
?>
<hr>
<div id="ds">Danh sách sinh viên sẽ hiển thị ở đây</div>
</body>
</html>