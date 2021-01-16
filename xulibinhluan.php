<?php  session_start() ?>

<?php
      $conn = mysqli_connect("localhost","root","","webca2");
      $noidung = $_POST['noidung'];
      $id = $_POST['idsach'];
      $i = $_POST['i1'];
    
      $sql = "INSERT INTO binhluan (iduser,idsach,noidung) VALUES ( '$_SESSION[iduser]',$id,'$noidung')";
      $kq = mysqli_query($conn,$sql);
?>