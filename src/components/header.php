<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="./styleheader.css"/>
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
    </div>
</body>
</html>
