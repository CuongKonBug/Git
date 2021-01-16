<?php
	session_start(); 
 ?>


<?php  
  if(isset($_GET['post_content'])){
      
      $conn = mysqli_connect("localhost","root","","webca2");
      $sql = "INSERT INTO danhmuc(tendanhmuc) VALUES('".$_GET['post_content']."')";
      $ketqua = mysqli_query($conn, $sql);
   echo '<script language="javascript">alert("Thêm danh mục thành công"); window.location="admin.php";</script>';

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
             
    
          <form action = "insertdm.php" method = "GET">
   TÊN DANH MỤC: <textarea name="post_content" id="post_content" rows="10" cols="150" ></textarea>
  <br></br>
  
  <button type="submit" class="btn btn-success">Thêm Danh Mục</button>
   
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
