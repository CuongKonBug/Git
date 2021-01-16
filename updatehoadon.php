<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/style1.css">
</head>
<body>


<?php
 
  if(isset($_GET['id']))
 {
    $conn = mysqli_connect("localhost","root","","webca2");
   $sql = "SELECT * FROM xuathoadon WHERE id=".$_GET['id'];
   $kq = mysqli_query($conn,$sql);
   $row1 = mysqli_fetch_assoc($kq);
 }
 if(isset($_POST['update']) ){
    
     
       $conn = mysqli_connect("localhost","root","","webca2");
         $sql = "UPDATE xuathoadon SET trangthai = 'Đã nhận hàng' WHERE id=".$_GET['id'];
         $ketqua=mysqli_query($conn,$sql);
         echo '<script language="javascript">alert("Hoàn thành"); window.location="trangthai.php";</script>';
  }
  if(isset($_POST['khong']) ){
    header('location: trangthai.php');
    
     
    
 
}
 ?>

  
<div class = "full">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
            <img src = "./images/iconsad.jpg" style = "width:120px;height:80px;margin-left:100px;">
                <form action="" method="POST" autocomplete="">
                   
                          
                            <div class="alert alert-danger text-center">
                                <H5>BẠN CHẮC CHẮN??</H5>
                            </div>
                         
                        <button  class="btn btn-success" name = "update" style= "margin-left:50px;">OK</button> 
                        <button  class="btn btn-success"  name = "khong" style= "margin-left:100px;">Không</button> 
                   
                </form>
            </div>
        </div>
    </div></div>';
   
 

</body>
</html>