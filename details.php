<?php
   session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>  
      Welcome to FlatShop
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
</script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
</script>
<![endif]-->
<!---------------------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  

<input type="hidden" id="_token" name="_token" value="<?php echo $_SESSION['name'];  ?>">
      
    </div>
    <script>
        $(document).ready(function() {
            $("#guibinh").click(function() {
                var url_string = window.location.href;
                var url = new URL(url_string);
                var idsp = url.searchParams.get("id");
                var txt = $("#noidungbinhluan").val();
               var a = $("#_token").val();
               var today = new Date();
 var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
 
              
                $.post("xulibinhluan.php",{noidung: txt,idsach:idsp,},function(result){
                    $("#dsbinhluan").append('<hr>'+".<img src='images/avt.jpg'  width='30' height='23'> <span>&nbsp&nbsp;</span>&nbsp."+a+'<span>&nbsp&nbsp;</span>&nbsp'+today+'<br><br>'+txt+'<hr>');

                });
            });
        });
          function layid(id){
           
           
            var url_string = window.location.href;
                var url = new URL(url_string);
             
            var id = id;
         
            var t = "#noidungrepbinhluan"+id;
            var txt = $(t).val();
            var a = $("#_token").val();
               var today = new Date();
 var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var idsp = url.searchParams.get("id");
            $.post("xulireply.php",{idrep:id,noidung: txt,idsach:idsp},function(result){
              $("#dsbinhluan").append('<hr>'+".<img src='images/avt.jpg'  width='30' height='23'> <span>&nbsp&nbsp;</span>&nbsp."+a+'<span>&nbsp&nbsp;</span>&nbsp'+today+'<br><br>'+txt+'<hr>');
                 
                });
              
       

        }
        
    </script>
     
      
  
   
  </head>
  <body>
    <?php
include("checkout2.php");
    ?>
     
      <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <div class="products-details">
                <div class="preview_image">
                  <div class="preview-small">
                 
                    <!--------------PHP---------------------------------------->
                    <?php
                             $idd = $_GET['id'];
                            
                             $ketnoi = mysqli_connect("localhost", "root", "","webca2");
                             $sql = "SELECT * FROM hanghoa WHERE id = $idd";
                             $kq = mysqli_query($ketnoi,$sql);
                              $row = mysqli_fetch_assoc($kq);
                             echo "<img src=".$row['anh']." width='240px' height='250px'>";
                   
                      ?>  
                  </div>
                 </div>
                <div class="products-description">
                  <h5 class="name">
                  <?php
                    echo "<p><b>$row[tenhang]</b></p>";
                  ?>
                  </h5>
                  <p>
                    <img alt="" src="images/star.png">
                    <a class="review_num" href="#">
                    
                    </a>
                  </p>
                  <p>
                   Số Lượng: 
                    <span class=" light-red">
                    <?php
                         echo "<p><span> $row[soluong]</span></p>";
                    ?>
    
                    </span>
                  </p>
                  <p>
                  <?php                   
                  echo "<p><span> $row[mota]</span></p>";
                    ?>
                  </p>
                  <hr class="border">
                  <div class="price">
                    Price : 
                    <span class="new_price">
                      <?php
                      echo "<p><span>$row[gia]</span></p>";
                         
                      ?>
                      
                  </div>
                  <hr class="border">
                  <div class="wided">
                   
                    <div class="button_group">
                      
                       <?php
                             echo "<button class='button add-cart' type='button'>
                             <a href=addcart.php?item=$row[id] style = color:black; >Mua Hàng</a>
                               </button>";
                       ?>
                    
                      <button class="button favorite">
                        <i class="fa fa-heart-o">
                        </i>
                      </button>
                      <button class="button favorite">
                        <i class="fa fa-envelope-o">
                        </i>
                      </button>
                    </div>
                  </div>
                  <div class="clearfix">
                  </div>
                  <hr class="border">
                  <img src="images/share.png" alt="" class="pull-right">
                </div>
              </div>
              <div class="clearfix">
              </div>
              <div class="tab-box">
                <div id="tabnav">
                  <ul>
                    <li>
                      <a href="#Descraption">
                        MÔ TẢ SẢN PHẨM
                      </a>
                    </li>
                    
                  </ul>
               </div>
                <div class="tab-content-wrap">
                  <div class="tab-content" id="Descraption">
                    <?php
                        echo "<p><span>$row[mota]</span></p>";
                    ?>
              
                 
                  </div>
                  <div class="tab-content" id="Reviews">
                   
                  </div>
                  <div class="tab-content" >
                    <div class="review">
                      <p class="rating">
                        <i class="fa fa-star light-red">
                        </i>
                        <i class="fa fa-star light-red">
                        </i>
                        <i class="fa fa-star light-red">
                        </i>
                        <i class="fa fa-star-half-o gray">
                        </i>
                        <i class="fa fa-star-o gray">
                        </i>
                      </p>
                      <h5 class="reviewer">
                        Reviewer name
                      </h5>
                      <p class="review-date">
                        Date: 01-01-2014
                      </p>
                      
                    </div>
                    <div class="review">
                      <p class="rating">
                        <i class="fa fa-star light-red">
                        </i>
                        <i class="fa fa-star light-red">
                        </i>
                        <i class="fa fa-star light-red">
                        </i>
                        <i class="fa fa-star-half-o gray">
                        </i>
                        <i class="fa fa-star-o gray">
                        </i>
                      </p>
                      <h5 class="reviewer">
                        Reviewer name
                      </h5>
                      <p class="review-date">
                        Date: 01-01-2014
                      </p>
                      
                    </div>
                  </div>
                  <div class="tab-content" id="tags">
                    <div class="tag">
                      Add Tags : 
                      <input type="text" name="">
                      <input type="submit" value="Tag">
                    </div>
                  </div>
                </div>
              </div>
              <div class="clearfix">
              </div>
              <div id="productsDetails" class="hot-products">
               
                <div class="control">
                  <a id="prev_hot" class="prev" href="#">
                    &lt;
                  </a>
                  <a id="next_hot" class="next" href="#">
                    &gt;
                  </a>
                </div> 
                <!---------------------------COMMENTS----------------->
                <?php
                 $ketnoi = mysqli_connect("localhost", "root", "","webca2");
        $sql = "SELECT * FROM binhluan WHERE idsach = '$idd' ";
        $kq = mysqli_query($ketnoi,$sql);
        while($dong = mysqli_fetch_assoc($kq))
        {
            echo "<img src='images/avt.jpg'  width='30' height='23'> <span>&nbsp&nbsp;</span> <span><b>$_SESSION[name]</b> &nbsp; 
            <span style = 'margin-left:40px;'><b>$dong[thoigian]</b></span></span>";
            echo "<br>";
            echo "<p style = 'margin-left:20px;'>.$dong[noidung].</p>";
            
         
          echo " <button type='button' class='btn btn-info' data-toggle='collapse' data-target='#repbinhluan".$dong['id']."'
           style ='position:relative;left:700px;top:-10px;'>
           Trả lời</button>";

           $sqlrep = "SELECT * FROM replybinhluan WHERE idrep = ".$dong['id']."";
           $kqrep = mysqli_query($ketnoi,$sqlrep);
           while($dongrep = mysqli_fetch_assoc($kqrep))
           {
               echo "<img src='images/avt.jpg'  width='30' height='23'> <span>&nbsp&nbsp;</span> <span><b>$_SESSION[name]</b> &nbsp; 
               <span style = 'margin-left:80px;'><b>$dongrep[thoigian]</b></span></span>";
               echo "<br>";
               echo "<p style = 'margin-left:100px;'>.$dongrep[noidung].</p>";

           }
           echo'<div id = "dsbinhluan'.$dong['id'].'">
           </div><br><br>';
           echo "  <div  id='repbinhluan".$dong['id']."'  class='collapse'>      
           <textarea class='form-control' rows='1' id='noidungrepbinhluan".$dong['id']."' name='noidungrepbinhluan".$dong['id']."' ></textarea>
            <button type='button' class='btn btn-primary' value = 'Gửiii'  onclick = layid($dong[id])>GỬIii</button>
           </div>";
        
        }
           
           
          
        ?>    <!-------->
        <!---------------------------reply comments------------------->

    
      
        <div id = "dsbinhluan">
      
        
      </div><br><br>
     
     <?php
               if(isset($_SESSION['iduser'])){

                  echo "<h3 class='title'>
                  <strong>
                    Bình 
                  </strong>
                  Luận
                </h3>
           <div class='form-group' >      
                <textarea class='form-control' rows='2'name = 'noidungbinhluan' id = 'noidungbinhluan'></textarea>
              
                 <button type='submit' class='btn btn-primary' value = 'Gửi' id = 'guibinh'>GỬI</button>

              </div>";
               }

      ?>
   
              <!------------->
              
          
            
       
        

         
         

      
                </div>
              </div>
              <div class="clearfix">
              </div>
            </div>  </div>
         
      <div class="clearfix">
      </div>
      <?php
           include("footer.php");
      ?>
    </div>
    <!-- Bootstrap core JavaScript==================================================-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src='js/jquery.elevatezoom.js'>
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
  </body>
</html>