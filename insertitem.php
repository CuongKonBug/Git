<?php
  $conn = mysqli_connect("localhost","root","","webca2");
   $sql = "SELECT * FROM hanghoa";
   $ketqua = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($ketqua)
?>
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
  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
       $tenhang = $_POST['tenhang'];
       $soluong = $_POST['soluong'];
       $gia = $_POST['gia'];
       $iddanhmuc = $_POST['iddanhmuc'];
       $anhh = $_POST['anhh'];
       $mota = $_POST['post_content'];
       $conn = mysqli_connect("localhost","root","","webca2");
     $sql = "INSERT INTO hanghoa(tenhang,soluong,gia,iddanhmuc,anh,mota) VALUES ('$tenhang',$soluong,$gia,$iddanhmuc,'images/$anhh','$mota')";
    $ketqua = mysqli_query($conn,$sql);
    if($ketqua){
       echo '<script language="javascript">alert("Thêm hàng thành công"); window.location="insertitem.php";</script>';
    }
    else{
      echo '<script language="javascript">alert("Thêm hàng thất bại"); window.location="insertitem.php";</script>';
    }
  

   }
   ?>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    <?php include("quanli.php"); ?>
		 

    <div class="row-fluid">
     
      <form action = "insertitem.php" method = "POST" class="form" id="form-1" style = "margin-left:500px;width:800px;">
   <div class = "row">
  <p class="desc"> ❤️</p>

  <div class="spacer"></div>

  
  <div class = "col-sm-4" style = "margin-left:-400px;">
  <div class="form-group">
    <label for="email" class="form-label">Tên hàng</label>
   <input type = "text" class="form-control" name = "tenhang"><br><br>
    <span class="form-message"></span>
  </div>

  <div class="form-group">
    <label for="password" class="form-label">Số lượng</label>
   <input type = "text" class="form-control" name = "soluong" ><br><br>
    <span class="form-message"></span>
  </div>

  <div class="form-group">
    <label for="password_confirmation" class="form-label">Đơn giá</label>
    <input type = "text" class="form-control" name = "gia" ><br><br>
    <span class="form-message"></span>
  </div>
 
  <input type = "file" name = "anhh" /><br><br>
   

   
   DANH MỤC:
    <select name = "iddanhmuc">
     <?php
      $conn = mysqli_connect("localhost","root","","webca2");
        $sql = "SELECT * FROM danhmuc";
        $ketqua = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($ketqua)){
              echo '<option value ="'.$row['id'].'">'.$row['tendanhmuc'].'</option>';

        }

?>    
     </select><br>
     </div>
  <div class = "col-sm-8" style = "margin-top:-350px;">
   Mô Tả : <textarea name="post_content" id="post_content" rows="10" cols="150"></textarea><br><br>
   </div>
   <button type="submit" class="btn btn-success">Thêm </button>

</div>
</form> 

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_content' );
</script>
		   </div>
        </div>
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
    >
    
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
