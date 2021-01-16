<?php session_start() ?>
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
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
        <div class="container-fluid">
          <!-- BEGIN LOGO -->
          <a class="brand" href="index.html">
            <img src="assets/img/logo.png" alt="logo" />
          </a>
          <!-- END LOGO -->
          <!-- BEGIN RESPONSIVE MENU TOGGLER -->
          <a
            href="javascript:;"
            class="btn-navbar collapsed"
            data-toggle="collapse"
            data-target=".nav-collapse"
          >
            <img src="assets/img/menu-toggler.png" alt="" />
          </a>
          <!-- END RESPONSIVE MENU TOGGLER -->
          <!-- BEGIN TOP NAVIGATION MENU -->

          <!-- END INBOX DROPDOWN -->
          <!-- BEGIN TODO DROPDOWN -->

          <!-- END TODO DROPDOWN -->
          <!-- BEGIN USER LOGIN DROPDOWN -->

          <!-- END TOP NAVIGATION MENU -->
        </div>
      </div>
      <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar nav-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
          <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          </li>
          <li>
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <form class="sidebar-search">
              <div class="input-box">
                <a href="javascript:;" class="remove"></a>
                <input type="text" placeholder="Search..." />
                <input type="button" class="submit" value=" " />
              </div>
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
          </li>
          <li class="start">
            <a href="admin.php">
              <i class="admin.php"></i>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <li class="start">
            <a href="productgird.php">
              <i class="admin.php"></i>
              <span class="title">HOME</span>
            </a>
          </li>
          <li class="start">
            <a href="insertitem.php">
              <i class="icon-home"></i>
              <span class="title">Thêm Hàng Hóa</span>
            </a>
          </li>
          <li class="start">
            <a href="insertdm.php">
              <i class="icon-home"></i>
              <span class="title">Thêm Danh Mục</span>
            </a>
          </li>
         
          <li class="start">
            <a href="dangxuat.php">
              <i class="icon-home"></i>
              <span class="title">Đăng Xuất</span>
            </a>
          </li>
        </ul>
        <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
          <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
            <h3>portlet Settings</h3>
          </div>
          <div class="modal-body">
            <p>Here will be a configuration form</p>
          </div>
        </div>
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
          <!-- BEGIN PAGE HEADER-->
          <div class="row-fluid">
            <div class="span12">
              <!-- BEGIN STYLE CUSTOMIZER -->
              <div class="color-panel hidden-phone">
                <div class="color-mode-icons icon-color"></div>
                <div class="color-mode-icons icon-color-close"></div>
                <div class="color-mode">
                  <p>THEME COLOR</p>
                  <ul class="inline">
                    <li
                      class="color-black current color-default"
                      data-style="default"
                    ></li>
                    <li class="color-blue" data-style="blue"></li>
                    <li class="color-brown" data-style="brown"></li>
                    <li class="color-purple" data-style="purple"></li>
                    <li class="color-grey" data-style="grey"></li>
                    <li class="color-white color-light" data-style="light"></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div id="dashboard">
 BEGIN DASHBOARD STATS
	<div class="row-fluid">
	  <div
		class="span3 responsive"
		data-tablet="span6"
		data-desktop="span3"
	  >
		<div class="dashboard-stat blue">
		  <div class="visual">
			<i class="icon-comments"></i>
		  </div>
		  <div class="details">
			<div class="number"><?php
   $con = mysqli_connect("localhost","root","","webca2");
   $sql="select count(*) as total from user";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?></div>
			<div class="desc">User đã đăng kí</div>
		  </div>
		  <a class="more" href="dsachuser.php">
			View more <i class="m-icon-swapright m-icon-white"></i>
		  </a>
		</div>
	  </div>
	  <div
		class="span3 responsive"
		data-tablet="span6"
		data-desktop="span3"
	  >
		<div class="dashboard-stat green">
		  <div class="visual">
			<i class="icon-shopping-cart"></i>
		  </div>
		  <div class="details">
			<div class="number"><?php
   $con = mysqli_connect("localhost","root","","webca2");
   $sql="select count(*) as total from xuathoadon where trangthai = 'Chưa nhận hàng'";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?></div>
			<div class="desc">Số Lượng Đơn Hàng XN</div>
		  </div>
		  <a class="more" href="trangthai.php">
			View more <i class="m-icon-swapright m-icon-white"></i>
		  </a>
		</div>
	  </div>
	  <div
		class="span3 responsive"
		data-tablet="span6  fix-offset"
		data-desktop="span3"
	  >
		<div class="dashboard-stat purple">
		  <div class="visual">
			<i class="icon-globe"></i>
		  </div>
		  <div class="details">
			<div class="number"><?php
   $con = mysqli_connect("localhost","root","","webca2");
   $sql="select count(*) as total from binhluan  ";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?></div>
			<div class="desc">Tổng số bình luận</div>
		  </div>
		  <a class="more" href="danhsachbinhluan.php">
			View more <i class="m-icon-swapright m-icon-white"></i>
		  </a>
		</div>
	  </div>
	  <div
		class="span3 responsive"
		data-tablet="span6"
		data-desktop="span3"
	  >
		<div class="dashboard-stat yellow">
		  <div class="visual">
			<i class="icon-bar-chart"></i>
		  </div>
		  <div class="details">
			<div class="number"><?php
   $con = mysqli_connect("localhost","root","","webca2");
   $sql="select count(*) as total from hanghoa ";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
?></div>
			<div class="desc">Tổng Mặt Hàng</div>
		  </div>
		  <a class="more" href="#">
			View more <i class="m-icon-swapright m-icon-white"></i>
		  </a>
      
		</div>
	  </div>
   
</div>-->