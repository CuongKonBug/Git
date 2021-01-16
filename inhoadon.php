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
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
</script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
</script>
<![endif]-->
  </head>
  <style>
    
  </style>
  <body>
      <?php
              $total = $_GET['total'];
              echo $total;
      ?>
        <?php
            include("checkout2.php");
        ?>
        <div class = "container" style = "margin-top:60px;">
    


    <table class="table table-striped" border = "3px" >
<tr> 
  <th width = "200px">ID User</th>
  <th width = "200px">Ngày Tạo</th>
  <th width = "200px">Tổng Tiền</th> 
 </TR>
 <tr>
     <?php 
      $ketnoi = mysqli_connect("localhost", "root", "","webca2");
      $sql = "SELECT * FROM hoadon ";
      $kq = mysqli_query($ketnoi,$sql);
      $dong = mysqli_fetch_assoc($kq);
      echo "<td>";
     echo $_SESSION['name'];
      echo "</td>"; echo "<td>";
     echo  $dong['ngaytao'];
      echo "</td>";
        echo "<td>";
        echo $total;
        echo "</td>";
     
     ?>
 </tr>
 
  
    
    
        </div>
       
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