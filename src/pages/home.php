<?php

error_reporting(0);
session_start();
$username = $_SESSION['username'];
$loggedin = $_SESSION['loggedin'];
// include("header.php");
// $servername = "localhost";
// $uname="root";
// $pword ="";
// $dbname="Fashion_store";

// $conn =mysqli_connect($servername, $uname, $pword,$dbname);
// if ($conn -> connect_error){
//    // echo("connection failed:");
//     die("connection failed:".$conn->connect_error);
// }


    // if(isset($_POST['logout'])) {
    //     $_SESSION['loggedin']=null;

    //     unset($_SESSIION['username']);
    //     $_SESSION['message'] = "You are now logged out";
    //     header("location: start.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="./style.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <img src="image/logo6.jpg" alt="logo">
                </div>

                <?php if(isset($_SESSION['loggedin'])) : ?>
                        Welcome <?php echo $_SESSION['username']?>
                    <?php endif; ?> 

                <ul class="navlist" id="MenuItems">
                    <li><a onclick="window.location.href='home.php';">Home</a></li>
                    <li><a onclick="window.location.href='products.php';">Product</a> </li>
                    
                    <?php if(isset($_SESSION['admin'])) : ?>
                        <li><a onclick="window.location.href='changeproduct.php';">Manage Products</a> </li>
                    <?php endif; ?> 

                    <li><a onclick="window.location.href='wishlist.php';">Wishlist</a> </li>
                    <li><a onclick="window.location.href='account.php';">Account</a> </li>   
                    <li><a onclick="window.location.href='review.php';">Reviews</a> </li>
                
                    
                    <?php if(isset($_SESSION['loggedin'])) : ?>
                        <li><a href='logout.php'>Logout</a> </li>   
                    <?php endif; ?> 
                </ul>


                <img src="image/cart.png"  onclick="window.location.href='cart.php';" alt="cart" width="30px" height="30px" class="cart">    
        
            </nav>   
        </div>
        <!-- <body> -->

        <section class="background firstSection">
            <div class="row">
                <div class="col1">
                    <h1>Free shipping on all orders above $200<br>Shop Now</h1>
                    <p>Use Discount code: Fashion20 to get 20% OFF</p>
                </div>
            </div>
        </section>    
    </div>

    <div class="categories">
        <div class="smallcontainer">
            <!-- <button class="Explorebtn">Explore Now</button> -->
            <a href="" class="Explorebtn">Explore More</a>
            <!-- <h2>Featured Products</h2> -->
            <div class="row">
                <div class="col3">
                    <img src="image/category-1.jpg">
                </div>
                <div class="col3">
                    <img src="image/category-2.jpg">
                </div>
                <div class="col3">
                    <img src="image/category-3.jpg">
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footercol1">
                    <h1>Contact Us:</h1>
                    <p>Phone: 03322398476<br>
                        Email: k200406@nu.edu.pk</p>
                </div>
                <!-- <div class="footercol2">
                    <h1>Information</h1>
                    <ul>
                        <li></li>
                    </ul>
    
                </div> -->
            </div>
        </div>
    </div>

   

    <!-- 
    <section class="background firstSection">
        <div class="box-main">
            <div class="firstHalf">
                
                <p class="text-big">SALE-25%</p>
                <p class="text-small"> Free shipping on all orders above PKR 1000</p>
                <p class="text-medium">Shop Now</p>

                <div class="buttons">
                    <button class="btn Products-btn">Go to Products</button>
                </div>

            </div>
            <div class="secondHalf">
                <img src="image/bg.jpg" alt="store">
            </div> 
        </div>

    </section>  -->

    <!-- <script>
    var homebutton = document.getElementById("home");
    var productbutton = document.getElementById("product");
    var accountbutton = document.getElementById("account");
    var wishlistbutton = document.getElementById("wishlist");
    var cartbutton = document.getElementById("cart");

    function home(){
       homebutton.style.transform = "translateX(0px)";
       productbutton.style.transform = "translateX(0px)";
       accountbutton.style.transform = "translateX(100px)";
    }
    function account(){
       RegisterForm.style.transform = "translateX(300px)";
       LoginForm.style.transform = "translateX(300px)";
       Indicator.style.transform = "translateX(0px)";
    }
</script> -->
    
</body>
</html>