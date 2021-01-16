<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
      Welcome to FlatShop
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css">
 </head>
 <style>
     table{
         text-align: center;
        
     }
     H1{
         text-align:center;
     }
 </style>
<body>

  
<?php session_start()  ?>
<?php include("checkout2.php");  ?>
<H1>SẢN PHẨM ĐANG GIAO</H1>
<table  class='shop-table'>
    <tr>
        <th>Tên Sản phẩm</th>
        <th>ẢNH</th>

    </tr>
<?php 
    $con = mysqli_connect("localhost","root","","webca2");
    $sql = "SELECT * FROM xuathoadon where iduser = $_SESSION[iduser] and trangthai = 'Chưa nhận hàng'";
    $qr = mysqli_query($con,$sql);
    $kq = mysqli_fetch_assoc($qr);
    
   $sql1 = "SELECT * FROM hoadon where id = $kq[idhoadon]";
   $qr1 = mysqli_query($con,$sql1);
  $kq1 = mysqli_fetch_assoc($qr1);

  $sql2 = "SELECT * FROM hanghoa where id in ($kq1[idsanpham])";
  $qr2 = mysqli_query($con,$sql2);
  
 while($kq2 = mysqli_fetch_assoc($qr2)){
     echo "<tr>";
        echo '<td> '.$kq2['tenhang'].'</td>';
        echo  '<td><img src = '.$kq2['anh'].' style ="width:90px;height:90px;"></td>';
        
    echo  "</tr>";
     
 }
 
?>  
<tr>
    <th>Tỏng tiền</th>
    <td><?php echo $kq['tongtien']; ?> VND</td>
</tr>
</table>
</body>
</html>