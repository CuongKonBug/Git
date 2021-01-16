<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Huong Dan tao trang dang ki/Dang Nhap</title>';
if (session_destroy())

echo "<script>alert('THOÁT THÀNH CÔNG');window.location='productgird.php' ;</script>"; 

else
echo "KO thể thoát dc, có lỗi trong việc hủy session";

echo '<br><a href="productgird.php">Bấm vào đây để quay lại trang chủ<br></a>';
?>