
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
<style>
    p.round2 {
  border: 2px solid green;
  border-radius: 8px;
  width: 120px;
}
b{
  position: relative;
  top:-5px;
}
</style>
  <body>
   
      <div class="header" style =  "background-color:green;">
      
          <div class="row">
            <div class="col-md-2 col-sm-2">
              <div class="logo" style = "margin-left:90px;">
                <a href="index.html">
                  <img src="images/logo.png" alt="FlatShop">
                </a>
              </div>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="header_top">
                <div class="row">
                  <div class="col-md-3">
                    
                  </div>
                 
                  <div class="col-md-11">
                    <ul class="usermenu" style = "margin-right:1px;">
                    <li>
                        <a href="dangxuat.php" class="log">
                          LogOut
                        </a>
                      </li>
                      <li>
                        <a href="login.php" class="log">
                          Login
                        </a>
                      </li>
                      <li>
                        <a href="dangnhap.php" class="reg">
                          Register
                        </a>
                      </li>
                      <?php
                       if(isset($_SESSION['name'])){
                         echo  "<li style =''>
                       <p class'round2'> <span> <img src='images/avt.jpg' class='img-circle' style='width:20px;'></span> <b style = 'color:#fff'>$_SESSION[name]</b></p>
                      </li>";
                       }
                        ?>
                    
                    </ul>
                  </div>
                </div>
              </div>
              <div class="clearfix">
              </div>
              <div class="header_bottom">
                <ul class="option" style="margin-right:90px;">
                  
                  <li class="option-cart">
                    
                    <a href="cart.php" class="cart-icon">
                      cart 
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
      echo "<span class='cart_no'>";
      echo 0;
              echo  "</span>";
     }
     else{
       $items = $_SESSION['cart'];
        echo "<span class='cart_no'>";
             echo count($items);
                     echo  "</span>";
     }  ?>                
                    </a>             
                      </li>                                 
                    </ul>
                  </li>
                </ul>
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">
                      Toggle navigation
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                  </button>
                </div>
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li>
                      <a href="productgird.php">
                        TRANG CHỦ
                      </a>
                      
                    </li>
                    <li>
                      <a href="contact.php">
                         LIÊN HỆ
                      </a>
                    </li>
                    <li>
                   
                      <a href="GioiThieu.php">
                         GIỚI THIỆU
                      </a>
                    </li>
                    
                    <?php
                        if(isset($_SESSION['phanquyen']) ){ 
                          if(($_SESSION['phanquyen']) == 1 ){
                              echo  "<li style =''>
                         <a href='admin.php'>
                         Quản lí
                      </a>
                      </li>";
                          }                                                                                   
                        }
                         
                       
                        ?>
                           <?php
                        if(isset($_SESSION['phanquyen']) ){ 
                          if(($_SESSION['phanquyen']) == 0 ){
                              echo  "<li style =''>
                         <a href='nav.php'>
                         SẢN PHẨM CỦA BẠN
                      </a>
                      </li>";
                          }                                                                                   
                        }
                         
                       
                        ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        
        <div class="clearfix">
        </div>   


        
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