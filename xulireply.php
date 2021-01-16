<?php
      session_start();
      $conn = mysqli_connect("localhost","root","","webca2");
      $noidung = $_POST['noidung'];
      $id = $_POST['idsach'];
     $ids = $_POST['idrep'];
      $sql = "INSERT INTO replybinhluan (idrep,iduser,noidung,idsach) VALUES ($ids,$_SESSION[iduser],'$noidung',$id)";
      $kq = mysqli_query($conn,$sql);
?>