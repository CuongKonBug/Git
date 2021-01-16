<?php session_start(); ?>
<?php
   
   $con = mysqli_connect("localhost","root","","webca2");
   $email = "";
   $name = "";
   $errors = array();
   // Xử lí nút signup
   if(isset($_POST['signup'])) {
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $cpassword =  $_POST['cpassword'];
    if($password !== $cpassword){
        $errors['password'] = "Mật khẩu không khớp!";
    }
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $qr = mysqli_query($con,$sql);
    if(mysqli_num_rows($qr) > 0){
        $errors['email'] = "Email này đã tồn tại!";
    }
    if(count($errors) === 0) {
       
        $password = md5($password);

        $random = rand(999999,111111);
        $status = "notverified";
        $sql1 = "INSERT INTO user (name,email,password,code,status)
        VALUES('$name','$email','$password','$code','$status')";
        $qr = mysqli_query($con,$sql1);
      

        
        header('location: login.php');
        exit();
    }
   }
//Xử lí khi ấn nút login
if(isset($_POST["login"])) {
        $email =  $_POST['email'];
        $password =  $_POST['password'];
        $mahoa = md5($password);
      
        $check_email = "SELECT * FROM user WHERE  email = '$email' AND password = '$mahoa'";
        $res = mysqli_query($con, $check_email);
        $kq= mysqli_num_rows($res);
        if($kq= mysqli_num_rows($res) == 0){
            $errors['email'] = "Email hoặc password không đúng!";
                
             
        }else{
            while($data = mysqli_fetch_array($res)){
                $errors['email'] = "correct email or password!";
                $_SESSION['iduser'] = $data['iduser'];
                $_SESSION['name'] = $data["name"];
                $_SESSION['phanquyen'] = $data["phanquyen"];
                header('location: productgird.php');
              
               
            }
        }
}
// Kiểm tra mail khi ấn nút quên mk
   if(isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM user WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) > 0) {
        $mahoa = rand(999999,111111);
        $sql_3 = "UPDATE user SET code = $mahoa WHERE email = '$email'";
        $qr_3 = mysqli_query($con,$sql_3);
        if($qr_3){
            $subject = "Mã lấy lại mật khẩu";
            $message = "Mã của bạn là $mahoa";
            $sender = "From: nguyenmanhcuong271002@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Chúng tôi đã gửi 1 mã đến - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: laycode.php');
                exit();
            }else{
                $errors['otp-error'] = "Gửi mã không thành công!";
            }
        }
        else{
            $errors['db-error'] = "Đã xảy ra lỗi!";

        }
    } else {
        $errors['email'] = "Email không chính xác!";

    }
   }
   /// Xử lí lấy code
   if(isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM user WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0) {
        $data = mysqli_fetch_assoc($code_res);
        $email = $data['email'];
        $_SESSION['email'] = $email;
        $info = "Hãy tạo một mật khẩu mới chưa từng được sử dụng.";
        $_SESSION['info'] = $info;
        header('location: newpassword.php');
        exit();
    }else{
        $errors['otp-error'] = "Mã của bạn không chính xác!";
    }
   }
   //
   if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Mật khẩu xác thực không đúng!";
    }else{
        $code = 0;
        $email = $_SESSION['email'];
        $encpass = md5($password);
        $status = "verified";
        //echo $encpass;
        $update_pass = "UPDATE user SET status = $status, code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
            $info = "Mật khẩu của bạn đã được thay đổi. Bây giờ bạn có thể đăng nhập";
            $_SESSION['info'] = $info;
            header('location: login.php');
        }else{
            $errors['db-error'] = "Đổi mật khẩu không thành công!";
        }
    }
}



?>