<?php
  session_start();
include("checkout2.php");
  ?>
  <?php
if(isset($_POST['submit']))
{
foreach($_POST['qty'] as $key=>$value)
{
if( ($value == 0) and (is_numeric($value)))
{
unset ($_SESSION['cart'][$key]);
}
else if(($value > 0) and (is_numeric($value)))
{
$_SESSION['cart'][$key]=$value;
}
}

}
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
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
</script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
</script>
<![endif]-->
  </head>
  <body>  
        <div class="page-index">
          <div class="container">
            <p>
              Home - Shopping Cart
            </p>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
          <?php
           $ok=1;
           if(isset($_SESSION['cart']))
              {
                // k = id, v = soluongsp
                 foreach($_SESSION['cart'] as $k => $v)
                 {
                     if(isset($k)){
                         $ok =2;
                     }
                 }
              }
              if($ok==2)
              {
                  echo "<form action = 'cart.php' method = 'POST'>";
                  foreach($_SESSION['cart'] as $key => $value)
                    {
                        $item[] = $key;
                    }
                    $str = implode(",",$item);
                    $conn =mysqli_connect("localhost","root","","webca2");
                    $sql = "SELECT * FROM hanghoa where id in ($str)";
                    $kq = mysqli_query($conn,$sql);
                    $total =0;
                  echo  "<div class='row'>";
                  echo  "<div class='col-md-12'>";
                  echo "<table class='shop-table'>";
                       echo "<thead>";
                         echo "<tr>";
                             echo "<th>";
                               echo "<p>IMAGES</p>";
                             echo "</th>";
                             echo "<th>";
                              echo "<p>TÊN SẢN PHẨM</p>";
                             echo "</th>";
                             echo "<th>";
                             echo "<p>GIÁ</p>";
                             echo "</th>";
                             echo "<th>";
                              echo "<p>SỐ LƯỢNG</p>";
                             echo "</th>"; 
                             echo "<th>";
                               echo "<p>TẠM TÍNH</p>";
                             echo "</th>";
                              echo "<th>";
                               echo "<p>XÓA</p>";
                               echo "</th>";
                  echo "</tr>";
                echo "</thead>";
                   echo "<tbody>";                 
                  while($row = mysqli_fetch_array($kq)){
                    if(is_numeric($_SESSION['cart'][$row['id']])){                                                     
                    echo "<tr>
                     <td><img src = '$row[anh]'></td>                    
                     <td>
                      <div class='shop-details'>
                        <div class='productname'>
                          <p>$row[tenhang]</p>
                        </div>
                        <p>
                         <img  src='images/star.png'>
                          <a class='review_num'>
                            02 Review(s)
                          </a>
                        </p>                        
                      </div>
                    </td>/
                    <td>
                      <h5>
                      <p> ".number_format($row['gia'],3) ." VND</p>                    
                      </h5>
                    </td>
                    <td>                                  
                  <input type='number' name='qty[$row[id]]' min='0' max='100' value='{$_SESSION['cart'][$row['id']]}'>                             
                  </td>
                  <td>                                  
    <p> ".number_format($_SESSION['cart'][$row['id']]*$row['gia'],3) ." VND</p>                                
                    </td>
                    <td>
                    <a href='delcart.php?productid=$row[id]'>Xóa </a>
                    </td>
                    </tr>";
    $total += $_SESSION['cart'][$row['id']]*$row['gia'];
                    }
                  }
                  echo "<tfoot>";
                  echo "<tr>";               
                  echo    "<td colspan='7'>";              
                  echo "<button class=' pull-right' ";
                  echo "<b><a href='productgird.php'>Mua hàng Tiep</a>";
                  echo "</button>";
                echo "</td>";                 
                    echo    "<td colspan='7'>";               
                    echo "<button class=' pull-right'";
                   echo "<button class=' pull-right' name = 'submit'>";
                   echo "<b><a>Cập nhật </a>";
                      echo "</button>";
                    echo "</button>";
                  echo "</td>";
                  echo "</tr>";
              echo   "</tfoot>";
                  echo "</tbody>";
                  echo "</table>";
                echo "</div>";
                echo "</div>";            
               echo "<div class='col-md-4 col-sm-6' style = 'float:right;'>
                 <div class='shippingbox'>
                 <div class='subtotal'>
                      <h5>
                        Thành Tiền
                     </h5>
                     <span>
                       
                     </span>
                     </div>
                    <div class='randtotal'>
                      <h5>
                       TOTAL 
                        </h5>
                     <span>
                     <b> <font color='red'>".
                     number_format($total,3)." VND</font></b>
                    </span>
                      </div>
                        <a href='delcart.php?productid=0'>Xoa Bo Gio Hang</a></b>
                        
                        <button class=' pull-right' name = 'submit_hoadon'>
                <a href='hoadon.php?total=$total & str=$str'>XEM HÓA ĐƠN</a>
               </button>                         
                </div>             
                </div>";
                }
                else
                {               
                echo "<div class='pro'>";
                echo "<p align='center'>Bạn không có món hàng nào trong giỏ hàng<br /><a
                href='productgird.php'>Mua Hàng</a></p>";
                echo "</div>";            
                }              
        ?>     
            </div>
          </div>
          <div class="clearfix">
          </div>
        
      <div class="clearfix">
      </div>
     
    <!-- Bootstrap core JavaScript==================================================-->
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
  </body>
</html>