<?php
 include("checkout22.php");
 ?>
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
<html>
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="style/style.css">
		<script src="ckeditor/ckeditor.js"></script>
</head>
<style>
    * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
html {
  color: #333;
  font-size: 62.5%;
  font-family: "Open Sans", sans-serif;
}
.main {
  background: #f1f1f1;
  min-height: 100vh;
  display: flex;
  justify-content: center;
}
.form {
  width: 360px;
  min-height: 100px;
  padding: 32px 24px;
  text-align: center;
  background: #fff;
  border-radius: 2px;
  margin: 24px;
  align-self: center;
  box-shadow: 0 2px 5px 0 rgba(51, 62, 73, 0.1);
}
.form .heading {
  font-size: 2rem;
}
.form .desc {
  text-align: center;
  color: #636d77;
  font-size: 1.6rem;
  font-weight: lighter;
  line-height: 2.4rem;
  margin-top: 16px;
  font-weight: 300;
}

.form-group {
  display: flex;
  margin-bottom: 16px;
  flex-direction: column;
}

.form-label,
.form-message {
  text-align: left;
}

.form-label {
  font-weight: 700;
  padding-bottom: 6px;
  line-height: 1.8rem;
  font-size: 1.4rem;
}

.form-control {
  height: 40px;
  padding: 8px 12px;
  border: 1px solid #b3b3b3;
  border-radius: 3px;
  outline: none;
  font-size: 1.4rem;
}

.form-control:hover {
  border-color: #1dbfaf;
}

.form-group.invalid .form-control {
  border-color: #f33a58;
}

.form-group.invalid .form-message {
  color: #f33a58;
}

.form-message {
  font-size: 1.2rem;
  line-height: 1.6rem;
  padding: 4px 0 0;
}

.form-submit {
  outline: none;
  background-color: #1dbfaf;
  margin-top: 12px;
  padding: 12px 16px;
  font-weight: 600;
  color: #fff;
  border: none;
  width: 100%;
  font-size: 14px;
  border-radius: 8px;
  cursor: pointer;
}

.form-submit:hover {
  background-color: #1ac7b6;
}

.spacer {
  margin-top: 36px;
}
</style>
<body>


 <form action = "update.php" method = "POST" class="form" id="form-1" style = "margin-left:500px;width:800px;">
  
  <p class="desc"> ❤️</p>

  <div class="spacer"></div>

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
   <br><br><br>
   Mô Tả : <textarea name="post_content" id="post_content" rows="10" cols="150" ><?php echo $row1['mota'] ?></textarea>
  <br></br>
   <input type = "submit" value = "UPDATE">
</form>

</body>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_content' );
</script>


</html>