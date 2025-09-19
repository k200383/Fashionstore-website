<?php
//   error_reporting(0);

// require_once 'connection.php';
$servername = "localhost";
$uname="root";
$pword ="";
$dbname="fashionstore";

$conn =mysqli_connect($servername, $uname, $pword,$dbname);
if ($conn -> connect_error){
   // echo("connection failed:");
    die("connection failed:".$conn->connect_error);
}
session_start();
$username = $_SESSION['username'];
$loggedin = $_SESSION['loggedin'];

include("header.php");
// else
// {
//     echo("connected");
// }

// session_start();

// $username = $_SESSION['username'];
$comments= $ratings="";


if(isset($_POST['review-btn'])){
    // echo "checking";
    $comments = $_POST['comments'];
    $ratings = $_POST['ratings'];
    // echo $comments;
    // echo $username;
    
        $sql4 = "Insert into review(Username,Comment, Rating) 
        values('$username','$comments','$ratings')";
        if(mysqli_query($conn, $sql4)){
            // echo "record inserted successfully!";
            $_SESSION['message'] = "Review posted successfully";
        }
        else{
            $_SESSION['message'] = "Review posted unsuccessfully";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="./style2.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store</title>
</head>
<body>
<h1 class="heading">
    <br><br><br>
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
      <ion-icon name="cart-outline"></ion-icon> Reviews
    </h1>
    <br><br>
    <?php
    if(isset($_SESSION['message'])) {
        echo "<div id='error_msg'><br><br><br>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
?>
<!-- style="text-align:center"      -->
      <form method = "post" action = "review.php" enctype="multipart/form-data"> 

         


        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 

        Comment:
        <input type="text" name = "comments"value="<?php echo $comments;?>" class= "textInput" placeholder="Comment here"
        style="width:40%;height:90px;padding:2%;font:22px/30px sans-serif;">
<br>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;


        Rating:
        <input type="number" min=0 max=5 name = "ratings"value="<?php echo $ratings;?>" class= "textInput" placeholder="rating"
        style="width:40%;height:30px;padding:3px;font-size:18px;padding:3px;">
      <br>

&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

        <button 
        class = "review-btn" type="review" name="review-btn"
        style="width:40%;background-color: #4c88d185;color:white;padding:5px;font-size:18px;border:none;padding:8px;">
        Submit Review</button>
    </form>
    
</body>
</html>
