<?php
 
  if(isset($_GET['id']))
 {
    $conn = mysqli_connect("localhost","root","","webca2");
   $sql = "SELECT * FROM hanghoa WHERE id=".$_GET['id'];
   $kq = mysqli_query($conn,$sql);
   $row1 = mysqli_fetch_assoc($kq);
 }
 if($_SERVER['REQUEST_METHOD'] == "POST"){
   $tenhang=$_POST['tenhang'];
		$soluong=$_POST['soluong'];
		$gia=$_POST['gia'];
		$iddanhmuc=$_POST['iddanhmuc'];
		$mota=$_POST['post_content'];
      $anhh = $_POST['anhh'];
      $id1=$_POST['id'];
      $conn = mysqli_connect("localhost","root","","webca2");
		$sql = "UPDATE hanghoa SET tenhang='$tenhang',soluong='$soluong',gia='$gia',iddanhmuc=$iddanhmuc,anh='images/$anhh',mota='$mota'WHERE id=".$id1;
        $ketqua=mysqli_query($conn,$sql);
   echo '<script language="javascript">alert("Sửa thành công"); window.location="admin.php";</script>';
        
 }
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
    <script src="ckeditor/ckeditor.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
  <?php include("quanli.php"); ?>
    <!-- BEGIN HEADER -->
   
		  <div class="row-fluid">
          <form action = "updateitem.php" method = "POST" class="form" id="form-1" style = "margin-left:500px;width:800px;">
  
  <p class="desc"> ❤️</p>

  <div class="spacer"></div>
   <div class = "row">
     <div class = "col-sm-4" style = "margin-left:-400px;">
  <div class="form-group">
    <label for="fullname" class="form-label">ID</label>
    <input type = "text" class="form-control" name = "id" value = "<?php echo $row1['id'] ?>">
    <span class="form-message"></span>
  </div>

  <div class="form-group">
    <label for="email" class="form-label">Tên hàng</label>
   <input type = "text" class="form-control" name = "tenhang" value = "<?php echo $row1['tenhang'] ?>"><br><br>
    <span class="form-message"></span>
  </div>

  <div class="form-group">
    <label for="password" class="form-label">Số lượng</label>
   <input type = "text" class="form-control" name = "soluong" value = "<?php echo $row1['soluong'] ?>"><br><br>
    <span class="form-message"></span>
  </div>

  <div class="form-group">
    <label for="password_confirmation" class="form-label">Đơn giá</label>
    <input type = "text" class="form-control" name = "gia" value = "<?php echo $row1['gia'] ?>"><br><br>
    <span class="form-message"></span>
  </div>
  
  <input type = "file" name = "anhh"><br><br>
   

   DANH MỤC:
   <select name="iddanhmuc">
   <?php
      $sql = "SELECT * FROM danhmuc";
      $ketqua = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($ketqua)){
         $selected = "";
         if($row['id'] == $row1['iddanhmuc']) 
         $selected = "selected";
         echo '<option value ="'.$row['id'].'" '.$selected.'>'.$row['tendanhmuc'].'</option>';
      }
   ?>
   
   </select>
   </div>
   <br><br><br>
   <div class = "col-sm-8" style = "margin-top:-470px;">
   Mô Tả : <textarea name="post_content" id="post_content" rows="10" cols="150" ><?php echo $row1['mota'] ?></textarea>
  <br></br>
  </div>
   <input type = "submit" value = "UPDATE">
</form>


<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_content' );
</script>
    
          


		   </div>
       
        <!-- END PAGE CONTAINER-->
     -->

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
