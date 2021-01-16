
<?php
$conn = mysqli_connect("localhost", "root", "", "webca2");
$text = mysqli_real_escape_string($conn, $_POST['text']);
$check_data = "SELECT traloi FROM chatbot WHERE cauhoi LIKE '%$text%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");
if(mysqli_num_rows($run_query) > 0){
    
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['traloi'];
    echo $replay;
}else{
    echo "Sorry can't be able to understand you!";
}

?>
