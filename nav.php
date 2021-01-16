<?php
  session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/style1.css">
<meta charset="utf-8" />
    <title>Metronic | Extra - Search Results</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <script src="ckeditor/ckeditor.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link
      href="assets/plugins/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="assets/plugins/font-awesome/css/font-awesome.css"
      rel="stylesheet"
      type="text/css"
    />
    
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link
      href="assets/css/style-responsive.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="assets/css/themes/default.css"
      rel="stylesheet"
      type="text/css"
      id="style_color"
    />
</head>
<style>
  th,td{
    color:#fff;
  }
</style>

<body style = "background-color:#fff;">
<div
		class="span3 responsive"
		data-tablet="span6"
		data-desktop="span3"
	  >
		<div class="dashboard-stat yellow">
		  <div class="visual">
			<i class="icon-bar-chart"></i>
		  </div>
		  <div class="details">
			<div class="number"><?php
   $con = mysqli_connect("localhost","root","","webca2");
 
   $sql="select count(*) as total from xuathoadon where iduser =  $_SESSION[iduser] AND trangthai = 'Chưa nhận hàng'";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?></div>
			<div class="desc">Mặt Hàng Đang Giao</div>
		  </div>
		  <a class="more" href="xem.php">
			View more <i class="m-icon-swapright m-icon-white"></i>
		  </a>
      
		</div>
	  </div>
    <div
		class="span3 responsive"
		data-tablet="span6"
		data-desktop="span3"
	  >
		<div class="dashboard-stat yellow">
		  <div class="visual">
			<i class="icon-bar-chart"></i>
		  </div>
		  <div class="details">
			<div class="number"><?php
   $con = mysqli_connect("localhost","root","","webca2");
     
   $sql="select count(*) as total from xuathoadon where iduser =  $_SESSION[iduser] AND trangthai = 'Đã nhận hàng'";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?></div>
			<div class="desc">Mặt Hàng Đã Giao</div>
		  </div>
		  <a class="more" href="dagiao.php">
			View more <i class="m-icon-swapright m-icon-white"></i>
		  </a>
      
		</div>
	  </div>

<?php


$con = mysqli_connect("localhost","root","","webca2");
   $sql="select count(*) as total from hoadon where idnguoidung = $_SESSION[iduser] ";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
 if($data['total']==0){
    echo '<div class = "full">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
            <img src = "./images/iconsad.jpg" style = "width:120px;height:80px;margin-left:100px;">
                <form action="quenmatkhau.php" method="POST" autocomplete="">
                   
                          
                            <div class="alert alert-danger text-center">
                                <H5>BẠN CHƯA TỪNG MUA SẢN PHẨM NÀO</H5>
                            </div>
                            <h6 style= "text-align:center;"><a href = "productgird.php">Bắt đầu mua hàng!</a></h6>
                       
                   
                </form>
            </div>
        </div>
    </div></div>';

    
 }
 else{
     
$ketnoi = mysqli_connect("localhost", "root", "","webca2");
  $sql = "SELECT * FROM hoadon WHERE idnguoidung= $_SESSION[iduser]";
  $kq = mysqli_query($ketnoi,$sql);
  $STT = 1;
    echo '<div class = "container" style = "margin-top:100px;">
 <table class="table table-bordered" border = "3px">
       <tr>
         <th width = "50px">MÃ HÓA ĐƠN</th>
         <th width = "50px"> TÊN HÀNG</th>
         <th width = "50px">ẢNH</th>
        </tr>';
   while( $row = mysqli_fetch_array($kq)){   
     
       $sql1 = "SELECT * FROM hanghoa WHERE id in ($row[idsanpham])";
       
       $kq1 = mysqli_query($ketnoi,$sql1);
      
       
       while( $row1 = mysqli_fetch_array($kq1)){
        
        
         echo '<tr>';
               echo '<td>'.$row['id'].'</td>';
          echo '<td>'.$row1['tenhang'].'</td>';
         echo "<td>
          <img src=".$row1['anh']." style = width:80px;height:80px;>
            </td>";
            echo '</tr>';
 }
 
            
              
}
 }
     echo '<a href = "productgird.php"><img src = "./images/muiten.jpg" style ="position:relative;left:-100px;top:50px;width:80px;">TRỞ VỀ TRANG CHỦ</a>';
   ?>
 
   </body>
</html>