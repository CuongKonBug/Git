  <!--------------PHP---------------------------------------->

  <?php
   session_start();
    
  ?>
 
   <!DOCTYPE html>
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

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <style>
    
  </style>
  <?php
      if(isset($_SESSION['name']) == false){
        echo '<script language="javascript">alert("Bạn cần có tài khoản"); window.location="login.php";</script>';
       }   else{
     
  
     $data2 =""         ;     
     $data1 = "";
        $id = $_GET['str'];
     
        $_SESSION['id'] = $_GET['str'];
      if(isset($_POST['hoanthanh'])) {     
        $diachi = $_POST['diachi'];
        $hinhthuc = $_POST['hinhthuc'];
        $vanchuyen = $_POST["vanchuyen"];
       
if($vanchuyen == "Vận chuyển nhanh")
{
    echo "<p style= 'display:none;'>$vanchuyen</p>";
}
else if ($vanchuyen == "Bình Thường")
{
  echo "<p style= 'display:none;'>$vanchuyen</p>";
}                  
        $ketnoi = mysqli_connect("localhost","root","","webca2");
        $sql = "SELECT * FROM hanghoa WHERE id in ($id)";
        $kq = mysqli_query($ketnoi,$sql);
         $total = $_GET['total'];
         while( $row = mysqli_fetch_assoc($kq)){
              
          $ketnoi = mysqli_connect("localhost","root","","webca2");
         $sql1 = "INSERT INTO hoadon(idnguoidung,idsanpham,tongtien,diachigiaohang,hinhthucvanchuyen) VALUES('$_SESSION[iduser]','$_GET[str]',$data1,'$diachi','$vanchuyen')";
          $ketqua = mysqli_query($ketnoi, $sql1);                     
         $data2 = $id;      
         //  echo number_format($row['gia'],3);
         if(is_numeric(number_format($row['gia'],3))){         
          $data = $_SESSION['cart'][$row['id']];        
          $data1 = number_format((float)$total, 3);       
        
         }            
         }                       
      }
  ?>
  
  <body>
  
        <?php
            include("checkout2.php");
            
        ?>
        <div class = "container" style = "margin-top:-7px;">
             <div class="row">
                 
              <div class="col-sm-4" style = "margin-top:-100px;">
                  <table class="table table-striped" border = "3px" >
                   <tr>
                   <th width = "200px">STT</th>
                      <th width = "200px">TÊN HÀNG</th>
                      <th width = "200px">SỐ LƯỢNG</th>
                      <th width = "200px">ĐƠN GIÁ</th>
               
                   </tr>
    <?php                          
  $total = $_GET['total'];         
  $id = $_GET['str'];  
   
  $ketnoi = mysqli_connect("localhost", "root", "","webca2");
  $sql = "SELECT * FROM hanghoa WHERE id in ($id)";
  $kq = mysqli_query($ketnoi,$sql);
  $STT = 1;
  echo "<form action = '' method = 'POST'>";
   
   while( $row = mysqli_fetch_array($kq)){   
   
    echo "<tr>";
    echo "<td name = 'idsanpham'>";
       echo $STT++;
    echo "</td>";
           echo "<td name = 'tenhang'>";
            echo $row['tenhang'];
            echo "</td>";
            echo "<td name = 'soluong'>";
           echo  $_SESSION['cart'][$row['id']]  ;
           echo "</td>";
           echo "<td name = 'gia'>";
           echo number_format($row['gia'],3);
              echo "</td>";     
           echo "</tr>";
           echo "<tr>";
           echo "<td>";
            
           
              
   } 
   
 
  
?> 
<tr>
  <th>Tông Cộng</th>
  <th></th>
  <?php 
   echo "<th>";  
   echo number_format((float)$total, 3);
   //echo $_SESSION['iduser'];
   echo "</th>";
   
 ?>
 </tr>
 <tr>
 <?php
  
 ?>
 </tr>
 </div>
<div class='col-sm-8' style = "position:relative;left:500px; top:250px;">
              
                      <p class='desc'></p>
                     <div class='spacer'></div>
                     <div class='form-group'>
                     <label for='email' class='form-label'>Địa Chỉ</label>
                      <input type = 'text' class='form-control' name = 'diachi' >
                      <span class='form-message'></span>
                      </div>
                      <div class="form-group">
      <label for="sel1">Hình Thức Thanh Toán</label>
      <select class="form-control" id="sel1" name = "hinhthuc">
        <option>COD</option>
        <option>AirPay</option>
        <option>Thẻ Ngân Hàng </option>
      </select>
      <div class="radio">
  <label><input type="radio" name="vanchuyen" checked value = "Vận chuyển nhanh">Nhanh</label>
</div>
<div class="radio">
  <label><input type="radio" name="vanchuyen" value = "Bình Thường">Gói thường</label>
</div>
   
      </div>
                     
               
  
   <button type='submit' class='btn btn-success' name = 'hoanthanh' >Hoàn Thành</button>
  
  


</form>
         </div>
         <?php
         if(isset($_POST['hoanthanh'])){
            $total = $_GET['total'];
  $id = $_GET['str'];
  
     $conn = mysqli_connect("localhost","root","","webca2");
    $sql = "SELECT * FROM hoadon ";
    $kq = mysqli_query($conn,$sql);
    while($row2 = mysqli_fetch_assoc($kq)){
       $_SESSION['id'] = $row2['id'];
      
      
    }
   echo '<p style = "position:relative;left:500px;top:450px;"><a href = "luuhoadon.php?str='.$_GET['str'].' & id='.$_SESSION['id'].'"><button type="submit" class="btn btn-success" name ="hoanthanh" >Hóa Đơn Của Bạn</button></a></p>';
         }
 
  
//echo "<button type='submit' class='btn btn-success' name = 'hoanthanh' style= 'position:relative;top:430px;left:800px;' ><a href = 'luuhoadon.php?ma=$aa'>Xuất Hóa Đơn</a></button>";
  
               ?>
      <?php  } ?>
  </body>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
  </html>                   