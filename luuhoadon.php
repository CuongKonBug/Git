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
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
</script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
</script>
<![endif]-->
  </head>
  <style>
    body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
   
    text-align:left;
    float:left;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
  </style>
 
        <?php
             $id = $str = '';
            $id = $_GET['id'];          
            $str = $_GET['str'];           
                $conn = mysqli_connect("localhost","root","","webca2");
               $sql = "SELECT * FROM hoadon WHERE id= '$id'";
               $kq = mysqli_query($conn,$sql);
               $row1 = mysqli_fetch_assoc($kq); 
               //               Hàng Hóa         
                $ketnoi = mysqli_connect("localhost", "root", "","webca2");
                $sql = "SELECT * FROM hanghoa WHERE id in ($str)";
                $kq = mysqli_query($ketnoi,$sql);
                $row = mysqli_fetch_array($kq);                            
        ?> 
      
        <body>  <!--- onload='window.print();' --->
        <?php  include("checkout2.php");  ?>
    <div id="page" class="page" style = "margin-top:70px;">
    <div class="header">       
    </div>
  <br/>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <table class='TableData'>
       <tr>
             <th>STT</th>        
              <th>Tên sản phẩm</th>
              <th>Số Lượng</th>
              <th>Gía</th>
              <th>Thành Tiền</th>
            </tr>
            <tr>        
               <?php
                    $ketnoi = mysqli_connect("localhost", "root", "","webca2");
                    $sql = "SELECT * FROM hanghoa WHERE id in ($str)";
                    $kq = mysqli_query($ketnoi,$sql);
                     $STT = 0;
                     $total = 0;                 
                     while( $row = mysqli_fetch_array($kq)){   
                         $STT ++;
                      echo "<tr>";                     
                             echo "<td name = 'STT'>";
                                echo $STT;
                              echo "</td>";                            
                             echo "<td name = 'TENHANG'>";
                             echo $row['tenhang'];
                            // echo number_format($row['gia'],3);
                                echo "</td>"; 
                                echo "<td name = 'SOLUONG'>";
                                echo  $_SESSION['cart'][$row['id']]  ;
                                echo "</td>"; 
                                echo "<td name = 'gia'>";
                                echo number_format($row['gia'],3);
                                   echo "</td>";   
                                   echo "<td name = 'gia'>";
                                   echo number_format($_SESSION['cart'][$row['id']]*$row['gia'],3);
                                      echo "</td>";  
                                       $total += $_SESSION['cart'][$row['id']]*$row['gia'];
                             echo "</tr>";                                                                                                              
                     }                
           ?>
             <form action = '' method = "POST">
               <tr>
                 <th colspan="4" class="tong">Tổng cộng</th>
                 <td class="cotSo" name = 'tongtien'><?php echo number_format((float)$total, 3);?></td>
               </tr>
               <tr>
               <th class="cotSo" class="tong"> Địa chỉ nhận hàng</th>
                 <td colspan="4" name = 'diachi'> <?php echo $row1["diachigiaohang"]; ?></td>              
               </tr>
               <tr>
               <th class="cotSo" class="tong"> Hình Thức Vận Chuyển</th>
                 <td colspan="4" name = 'hinhthuc'> <?php echo $row1["hinhthucvanchuyen"]; ?></td>              
               </tr>            
             <button type='submit' class='btn btn-success' name = 'inhoadon' style = "position:relative;top:450px;" >Hoàn Thành</button>
             
          </form>  
          <?php
          
          if(isset($_POST['inhoadon'])){
              $tongtien = '';
              $trangthai = 'Chưa nhận hàng';
            $tongtien = number_format((float)$total, 3);
           echo $tongtien;
            $conn = mysqli_connect("localhost","root","","webca2");
             $sql3 = "INSERT INTO xuathoadon(iduser,tenuser,idhoadon,tongtien,diachigiaohang,trangthai) VALUES
              ('$_SESSION[iduser]','$_SESSION[name]','$_GET[id]',$tongtien,'$row1[diachigiaohang]','$trangthai')";
             $kq = mysqli_query($conn,$sql3);
             $email = "nguyenmanhcuong271002@gmail.com";
             $subject = "Xác Nhận Đơn Hàng";
             $message = "Đơn Hàng Của Bạn Là $_GET[id] Và $tongtien VND, Giao đến: $row1[diachigiaohang]";
             $sender = "From: nguyenmanhcuong271002@gmail.com";
             if(mail($email, $subject, $message, $sender)){
                
               
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
          }
   ?>
  
   
   
             <p class="footer-left"> Đà Nẵng, ngày 16 tháng 12 năm 2020<br/>
               Khách hàng <br><br><br><br><br> <b><?php echo $_SESSION['name'];  ?></b></p>
             <div class="footer-right"> Đà Nẵng, ngày 16 tháng 12 năm 2020<br/>
               Nhân viên
              
   
                </div>
           </div>
         
           

              
            
            </tr>
        </table>
      
      
  <br/>
  <br/>
 
   


</body>
  </body>
  </html>