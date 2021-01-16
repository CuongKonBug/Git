<?php
 session_start();
 include("checkout2.php");

?>
<!-------NUT GIO HANG--------->
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
header("location:cart.php");
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
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet">
  </head>
 
  <style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}

.show-btn{
  position: absolute;
  z-index:999;
  top:600px;
  left: 150px;
  user-select: none;
  transform: translate(-50%, -50%);
}
.show-btn.disabled{
  pointer-events: none;
}
.modal{
  margin-top:80px;
  position: absolute;
  top:500px;
  right: 600px;
  opacity: 0;
  
  width: 360px;
 overflow: hidden;
 overflow y: hidden;
 
}
.modal.show{
  bottom: 0;
  opacity: 1;
  overflow: hidden;
 overflow y: hidden;
}
.modal .top-content{
  
}
.close-icon{
  font-size:25px;
  margin-left:300px;
}
.close-icon:hover{
  color: #b6b6b6;
}
.top-content .fa-camera-retro{
  font-size: 80px;
  color: #f2f2f2;
}
.modal .bottom-content{
  background: white;
  width: 100%;
  padding: 15px 20px;
}
.bottom-content .text{
  font-size: 28px;
  font-weight: 600;
  color: #34495e;
}
.bottom-content p{
  font-size: 18px;
  line-height: 27px;
  color: grey;
}
.bottom-content .close-btn{
  padding: 15px 0;
}
.show-btn button,
.close-btn button{
  padding: 9px 13px;
 
  border: none;
  outline: none;
  font-size: 18px;
  text-transform: uppercase;
  border-radius: 300px;
  color: #f2f2f2;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s;
}
.show-btn button{
  padding: 12px 15px;
}
.show-btn button:hover,
.close-btn button:hover{
  background: #26a65b;
}

  </style>
  <body>  
  <div class="show-btn">
      <button><img src = "./images/mess.jpg" style = "width:40px;"></button>
    </div>
<div class="modal" >
<span class="close-icon"><i class="fas fa-times"></i></span>
     <?php  
          include("bot.php");

     ?>

</div>
</div>
<script>
      $('.show-btn').click(function(){
        $('.modal').toggleClass("show");
        $('.show-btn').addClass("disabled");
      });
      $('.close-icon').click(function(){
        $('.modal').toggleClass("show");
        $('.show-btn').removeClass("disabled");
      });
      $('.close-btn').click(function(){
        $('.modal').toggleClass("show");
        $('.show-btn').removeClass("disabled");
      });
    </script>

<!----<form  action = "" method = "GET" >
  <input type="text" name="phantrang">
  <button class="btn btn-success" type="submit" name = "btn">OK</button>
</form> -->
      <div class="clearfix"></div>
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="category leftbar">
                <h3 class="title">
                 Danh Mục Sản Phẩm
                
                </h3>             
                <ul>
                
                
               <!------------PHP CHO DANH MỤC-------->                                
                  <?php
               
                       $conn = mysqli_connect("localhost","root","","webca2");
                       $sql1 = "SELECT * FROM danhmuc";
                       $kq1  = mysqli_query($conn,$sql1);
                       while($row1 = mysqli_fetch_assoc($kq1))
                       {
                         echo '<li><a href = "danhmuc.php?iddanhmuc='.$row1['id'].'" style = "color:black;">'.$row1['tendanhmuc'].'</li>';
                       }
                   ?>                 
                </ul>
                <!------------------------------------->
                <!------------------------------------->
              </div>              
              <div class="clearfix"></div>             
              <div class="clearfix"></div>
              <div class="product-tag leftbar">
                 <img src = "images/anhnen2.jpg">
              </div>
              <div class="clearfix"></div>
              <div class="branch leftbar">
                <img src = "images/anhnen.jpg">      
              </div>     
              <div class="clearfix"></div>               
              <div class="others leftbar">
                <h3 class="title"> Others </h3>  
                         
              </div>
              <div class="clearfix"></div>
              <div class="fbl-box leftbar">
                <h3 class="title">Facebook </h3>                                 
                <span class="likebutton">
                  <a href="#">
                    <img src="images/fblike.png" alt="">
                  </a>
                </span>
                <p>12k people like Flat Shop. </p>
                   <ul><!--------FORM GIÁ------>
                   <form action="" method = "GET">
  <input type="checkbox" id="vehicle1" name="gia1" value="30">
  <label for="vehicle1">  << 30.000 </label><br>
  <input type="checkbox" id="vehicle2" name="gia1" value="50">
  <label for="vehicle1">  << 50.000 </label><br>
  <input type="checkbox" id="vehicle3" name="gia1" value="100">
  <label for="vehicle3"> << 100.000</label><br><br>
  <button class='button add-cart' type="button" name = 'timkiemgia'>Tìm</button>
</form> <!-----FORM GIA------>
             
                <div class="fbplug">
                  <a href="#">
                    <span>
                      <img src="images/fbicon.png" alt="">
                    </span>
                    Facebook social plugin
                  </a>
                </div>
              </div>
              <div class="clearfix">
              </div>
              <div class="leftbanner">
                <img src="images/slide1.jpg" alt="sdsd">
              </div>
            </div>
            <div class="col-md-9">
              <div class="banner">
                <div class="bannerslide" id="bannerslide">
                  <ul class="slides">
                    <li>
                      <a href="#">
                      <img src="images/slide2.jpg" alt="sdsd">

                      </a>
                    </li>
                    <li>
                      <a href="#">
                      <img src="images/slide3.jpg" alt="sdsd">

                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="clearfix">
              </div>
              <div class="products-grid">
                <div class="toolbar">
                  <div class="sorter">
                    <div class="view-mode">
                      <a href="productlitst.html" class="list">
                        List
                      </a>
                      <a href="#" class="grid active">
                        Grid
                      </a>
                    </div>
                    <div class="sort-by">  
                            
                    </div>
                    <div class="limiter">  
                    <!------FORM TÌM KIẾM-------->
                    <form action = '' method = "GET">
                     <input type="text" name="timkiem" placeholder="Search.." style = "width:400px;margin-left:80px;">    
                     <button class="btn btn-success" type="submit" name = "btn" style = "margin-top:-7px;margin-left:25px">TÌM</button>  
                   
                    </form><!------FORM TÌM KIẾM-------->
                               
                    </div>
                  </div>
                  <div class="pager">
                  
                  <form  action = "" method = "GET" >
        <!--- FORM CHỌN SL SẢN PHẨM HIỂN THỊ -->
<div class="form-group">    
      <select class="form-control" id="sel1" name = "phantrang" style = "width:40px;">
        <option>Số trang</option>
        <option>3</option>
        <option>6</option>
        <option>9</option>
        <option>12</option>      
      </select>
     <span>
     <button class="btn btn-success" type="submit" name = "btn" style = "margin-top:-40px;margin-left:75px">OK</button>
     </span>
    </div>
    </form>          
    
         <!----FORM--->
              <!----------------------------->
                  </div>
                </div>             
                </div>                        
                <div id = 'cart'>
            <!--------PHP CHO CART----------------->
            <!--------XỬ LÍ HIỂN THỊ CHO CART----------------->

                        <?php
                            $ok =1;
                            if(isset($_SESSION['cart']))
                              {
                                foreach($_SESSION['cart'] as $k  => $v)
                                {
                                  if(isset($v)){
                                                  $ok =2;
                                               }
                                }
                              }
                              
                            if($ok !=2)
                             {
                               echo '<p>Bạn không có mốn hàng nào</p>';
                             }
                           else{
                                $items = $_SESSION['cart'];
                                echo '<p>Ban dang co <a href="cart.php">'.count($items).' mon hang trong
                                gio hang</a></p>';
                               }
                         ?>
                    <!---------------------
                       ------------------>
                <div class="row">              
                    <div class="products">
                    <?php
// PHẦN XỬ LÝ PHP 

                         if(isset($_GET['phantrang'])){
                           $limit = $_GET['phantrang'];                           
                           $_SESSION['limit'] = $limit;                         
                         }    
                         else{
                        $_SESSION['limit'] =10;
                        }

                         $conn = mysqli_connect('localhost', 'root', '', 'webca2');
                         $sql = "select count(id) as total from hanghoa ";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_fetch_assoc($result);
                         $total_records = $row['total'];
                         $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                         $phantrang = "";
                        
                        
                                          
// tổng số trang        
                       
                          $total_page = ceil($total_records /$_SESSION['limit']);
                       
// Giới hạn current_page trong khoảng 1 đến total_page
                         if ($current_page > $total_page){
                               $current_page = $total_page;
                             }
                         else if ($current_page < 1){
                                     $current_page = 1;
                             }
                        $start = ($current_page - 1) * $_SESSION['limit'];
                              

                                $timkiem = "";
                                $gia1  = "";
                                $gia2 = "";
                                if(isset($_GET['timkiem']) ){
                                $timkiem = $_GET['timkiem'];
                                $result = mysqli_query($conn, "SELECT * FROM hanghoa WHERE  tenhang LIKE '%$timkiem%' LIMIT $start, $_SESSION[limit] ");
                                }   
                                else{
                                  $result = mysqli_query($conn, "SELECT * FROM hanghoa LIMIT $start, $_SESSION[limit]");
                                
                                }
                                if(isset($_GET['timkiemgia']) ){
                                  $gia1 = $_GET['gia1'];
                               $result = mysqli_query($conn, "SELECT * FROM hanghoa WHERE  gia  < $gia1 ORDER BY gia ASC LIMIT $start, $_SESSION[limit] ");
                                  }                                                                                        
              ?>         
                    <?php                  
// PHẦN HIỂN THỊ TIN TỨC
                    while($row = mysqli_fetch_assoc($result)){                     
                    echo "<div class = 'col-md-4 col-sm-6'>                  
                    <div class='products'>
                     <div class='thumbnail'>
                       <img src=".$row['anh']." style = 'width:300px;height:200px;'>
                   </div>
                   <div class='productname'>
                     <p><b>$row[tenhang]</b></p>
                   </div>
                  <div class='button_group'>
                    <button class='button add-cart' type='button'>
                  <a href=addcart.php?item=$row[id] style = color:black; >Mua Hàng</a>
                    </button>
                  <button class='button favorite'>
                   <a href=details.php?id=$row[id] style = color:black;>Chi Tiết</a>
                  </button>
                </div>                       
                 <div>
                   <p><span> SỐ LƯỢNG: $row[soluong] </span></p>
                  
                      <p><span>GIÁ  ".number_format($row['gia'],3) ." VND</span></p> 
                </div>
                
                </div> 
               </div>";
                       }
                ?>                                  
               </div>                  
                  </div>
                  <div class="pager">                   
                    <?php
                    if ($current_page > 1 && $total_page > 1){
                      echo '<a href="productgird.php?page='.($current_page-1).'"><i class="fa fa-angle-left">
                      </i></a>  ';
                      }
                      for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                         echo "<a href='' class='active'>";
                         echo "<span>$i</span> ";
                        "</a>";
                        }
                       else{
                        echo "<a href='productgird.php?page='.$i.'' class='active'>$i</a> ";
                        }
                      }
                      if ($current_page < $total_page && $total_page > 1){
                        echo '<a href="productgird.php?page='.($current_page+1).'"><i class="fa fa-angle-right">
                        </i></a>  ';
                        }
                    ?>
                    
                  </div>
                </div>
                <div class="clearfix">
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
          
        </div>
      </div>
        </div>
    <?php
          include("footer.php");
          
          

    ?>
  
 
  
  </body>
    
</html>