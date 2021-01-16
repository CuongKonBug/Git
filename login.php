<?php
    require_once "controllerUserData.php";
?>
<!DOCTYPE html>
<html>
   <head>
   <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Login Form</title> -->
 
    <link rel="stylesheet" href="./css/style1.css">
   </head>
   <body>
   <?php
         include("checkout2.php");
   ?>
   <div class = "full">
   <div class="container" style = "margin-left:25%;" >
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left">
                    <a href="quenmatkhau.php">Forgot password?</a> 
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? 
                      <a href="signup.php">Signup now</a>
                  </div>
                </form>
            </div>
        </div>
    </div>
    </div>
   </body>
</html>