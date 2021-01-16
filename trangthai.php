

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
  <!--<![endif]-->
  <!-- BEGIN HEAD -->
  <head>
    <meta charset="utf-8" />
    <title>Metronic | Extra - Search Results</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
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
   
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    
    
    
    
    <!-- END PAGE LEVEL STYLES -->
  
  </head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    <?php include("quanli.php"); ?>
		  <div class="row-fluid" >
      <h1 style = "text-align:center;">THÔNG TIN HÓA ĐƠN</h1>
<table class="table table-striped" border = "3px">
<tr>
  <th width = "50px">TÊN USER</th>
  <th width = "50px">ID HÓA ĐƠN</th>
  <th width = "50px">TỔNG TIỀN</th>
  <th width = "50px">ĐỊA CHỈ</th>

  <th width = "50px">THỜI GIAN</th>
  <th width = "50px">TRẠNG THÁI</th>
  <th width = "50px">CẬP NHẬT</th>
  <th width = "50px">XÓA</th>
 
  
  
 </TR>

 <?php
     $con = mysqli_connect("localhost","root","","webca2");
     $sql="select * from xuathoadon ";
  $result=mysqli_query($con,$sql);
  $ss = "Đã nhận hàng";
  while ($row=mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<td>' .$row['tenuser'].'</td>';
      echo '<td>' .$row['idhoadon'].'</td>';

      echo '<td>' .$row['tongtien'].'</td>';
      echo '<td>' .$row['diachigiaohang'].'</td>';
      echo '<td>' .$row['ngayxuathoadon'].'</td>';
      echo '<td>' .$row['trangthai'].'</td>';
    
      echo '<td ><a href = "updatehoadon.php?id='.$row['id'].'"><img src = "./images/icondelete.jpg" style = "width:30px;"></a></td>';
    
      if($row['trangthai'] == $ss){
          echo '<form action = "trangthai.php" method = "POST">';
        echo '<td ><a href = "deletehoadon.php?id='.$row['id'].'"><img src = "./images/icondelete.jpg" style = "width:30px;"></a></td>';
      ECHO  '</form>';
      }
      
      //echo '<td ><a href = "delete.php?id='.$row['id'].'"><img src = "./images/icondelete.jpg" style = "width:30px;"></a></td>';
   //   echo '<td><a href = "updateitem.php?id='.$row['id'].'"><img src = "./images/iconrepair.jpg" style = "width:30px;"></a></td>';
     
      
      echo '</tr>';
     }
     ?> 
   

		   </div>
        </div>
        <div class="dashboard-stat yellow">
		  <div class="visual">
			<i class="icon-bar-chart"></i>
		  </div>
		  <div class="details">
			<div class="number">  <?php
      $con = mysqli_connect("localhost","root","","webca2");
      $sql="select * from xuathoadon where trangthai = 'Đã nhận hàng'";
      $result=mysqli_query($con,$sql);
      $total = 0;
      while($roww = mysqli_fetch_assoc($result)){
          $total += $roww['tongtien'];        
      }
 echo number_format($total,3)  .'VND';
     ?></div>
			<div class="desc">Doanh Thu</div>
		  </div>
		  <a class="more" href="#">
			View more <i class="m-icon-swapright m-icon-white"></i>
		  </a>
        <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <script
      src="assets/plugins/jquery-1.10.1.min.js"
      type="text/javascript"
    ></script>
    
    <!--[if lt IE 9]>
      <script src="assets/plugins/excanvas.min.js"></script>
      <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
      
    
    
    <!-- END CORE PLUGINS -->
   
    
    <script src="assets/scripts/app.js"></script>
    <script src="assets/scripts/search.js"></script>
    <script>
      jQuery(document).ready(function () {
        App.init();
        Search.init();
      });
    </script>
    <!-- END JAVASCRIPTS -->
  </body>
  <!-- END BODY -->
</html>
