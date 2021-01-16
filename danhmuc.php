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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet">
  </head>
  
  <body>  
    
      
  <div class="clearfix">
      </div>
     

      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="category leftbar">
                <h3 class="title">
                 Danh Mục Sản Phẩm
                </h3>
              
                <ul>
                 
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
              </div>
            
              
              <div class="clearfix">
              </div>
             
              <div class="clearfix">
              </div>
              <div class="product-tag leftbar">
              <img src = "images/anhnen2.jpg">
              </div>
              <div class="clearfix">
              </div>

              <div class="branch leftbar">
                <img src = "images/anhnen.jpg">
               
              </div>


             
              <div class="clearfix">
              </div>
          
              
              <div class="others leftbar">
                <h3 class="title">
                  Others
                </h3>
              </div>
              <div class="clearfix">
              </div>
              <div class="fbl-box leftbar">
                <h3 class="title">
                  Facebook
                </h3>
                <span class="likebutton">
                  <a href="#">
                    <img src="images/fblike.png" alt="">
                  </a>
                </span>
                <p>
                  12k people like Flat Shop.
                </p>
                <ul>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    </a>
                  </li>
                </ul>
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
                    
                    </div>
                  </div>
                  <div class="pager">
              <!----------------------------->
                  </div>
                </div>
              
                </div>
              
            
                <div id = 'cart'>
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
                <div class="row">
               
                    <div class="products">
                    <?php
// PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
$conn = mysqli_connect('localhost', 'root', '', 'webca2');
// BƯỚC 2: TÌM TỔNG SỐ RECORDS\
$sql = "select count(id) as total from hanghoa ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;

          ////////
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);
// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page){
$current_page = $total_page;
}
else if ($current_page < 1){
$current_page = 1;
}
// Tìm Start
$start = ($current_page - 1) * $limit;
// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức

                 
                     

$result = mysqli_query($conn, "SELECT * FROM hanghoa  WHERE iddanhmuc= '.$_GET[iddanhmuc].'    LIMIT $start,$limit" );
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
<a href=addcart.php?item=$row[id] style = color:black; >
Mua Hàng</a>
</button>
<button class='button favorite'>
  <i class='fa fa-heart-o'>
  </i>
</button>

</div>                       
  <div>
   <p><span> SỐ LƯỢNG: $row[soluong]</span></p>
<p><span>GIÁ :$row[gia]</span></p> 
  </div>
 
  <a href=details.php?id=$row[id]>xem chi tiết</a>

  </div>
  
  </div>";


   
 }

         
                ?>
                       
                    
                  
                </div>
            
                <div class="toolbar">
                  <div class="sorter bottom">
                    <div class="view-mode">
                      <a href="productlitst.html" class="list">
                        List
                      </a>
                      <a href="#" class="grid active">
                        Grid
                      </a>
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
  
    <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.sequence-min.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
  </body>
</html>