<?php

// error_reporting(0);
session_start();
$username = $_SESSION['username'];
$loggedin = $_SESSION['loggedin'];

include("header.php");
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
// {
//     echo("connected");
// }

// session_start();
// $username = $_SESSION['username'];


$sql = "select * from cart c, productdetails pd, products p where c.ProductName = pd.ProductName and
p.ProductName = pd.ProductName" ;
// "SELECT * FROM cart c, cartdetails cd, products p, productdetails pd where cd.CartID = c.CartID
// -- and cd.ProductID = p.ProductId and p.ProductName = pd.ProductName;";
$all_cart = $conn->query($sql);


$sum = 0;
$sumwithshipping=0;
$sumafterdiscount=0;

$subtotal = 0;

$total=0;
$quantity=1;
$shipping = 30;
$discount=0;
$totalamount=0;
$price=0;
$quantity = 1;
$price = 0;


if(isset($_POST['plus'])) {
    $quantity = (isset($_SESSION['quantity']) ? $_SESSION['quantity'] : 0);
//     $name = (isset($_SESSION['name']));
//  echo $name;

      $quantity++; 
      $_SESSION['quantity'] = $quantity; 

 }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://pro.fontawsome.com/releases/v5.10.0/css/all.css" /> -->

    <link rel="stylesheet" href="style4.css">
</head>

<body> 

<!-- <div class="header"> -->
        <!-- <div class="container"> -->
           <br><br><br>
    <main class="container3">

    <h1 class="heading">
      <ion-icon name="cart-outline"></ion-icon> Shopping Cart
    </h1>

    <div class="item-flex">

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>         
                <td>Image</td>
                <td>Product</td>
                <td>Size</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
                <td>Remove</td>
            </tr>
        </thead>

        <tbody>
            <?php
            
                while($row = mysqli_fetch_assoc($all_cart)){
               
            ?>
            <tr>
           <form method= "POST" action="cart.php">
                <td><img src="<?php echo $row["Image"]; ?>" alt= "" ></td>

                    <td><?php $name = $row["ProductName"]; echo $row["ProductName"]; $name = $row["ProductName"];?></td>
                    <td><b><?php echo $row["Size"]; ?></b></td>

                    <td><b>$<?php $price = $row["Price"];  echo $price; ?></b></td>

                    <td>
                    
                    <form action="#" method="post">
                         <!-- <h4>Quantity:  </h4> -->
                         <input type="submit" value="+" name="plus" id="plus" /> 
                         <input type="text" class="form-control" id="quantity" name="quantity" 
                         value= <?php echo $_SESSION['quantity'] = $quantity; ?>>
                         <button type="submit"><i class="fa fa-minus"></i></button>
                        </form>
                    </td>
                    
                    <td> &nbsp;&nbsp;&nbsp;<b>$<?php echo $price * $quantity; ?></b></td>
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 

                    <td class="product-remove"><a href="removecart.php?name=<?=$row['ProductName'];?>">
                    <span class="fa fa-times-circle"style="font-size:24px;color:black"></span></a></td>

                    <a></button></td>
                    </form>
            </tr>
            
            <?php
            
            $total =$price * $_SESSION['quantity'];
            $sum = $sum + $total;
            }
            ?>
          
        </tbody>

    </table>
</section>

<br><br>
<section id="cart-add" class="section-p1">
    <div id="discount">
        <h3>Add Discount</h3>
        <div>
        <form method="post">
            <input type="text" name = "discount" class= "textInput" placeholder="Enter Discount Code">
            <button class="normal" name = "add-discount" >Add</button>
        </form>
        </div>
    </div>
    <br><br>
    <br><br>
</section>
<section id="cart-add" class="section-p1">

    <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
            <tr>
                <td>Cart Subtotal</td>
                <td><b>$<?php echo $sum;
                $_SESSION['subtotal']= $sum;
                 ?></b></td>
                

            </tr>
            <tr>
                <td>Shipping</td>
                <td><b>$<?php
                if($sum>200 || $sum==200){
                    $shipping = 0;
                    echo $shipping; 
                }
                else{
                    $shipping=30;
                    echo $shipping; 
                }
                $_SESSION['shipping']= $shipping;
                $sumwithshipping = $sum + $shipping;
                $sumafterdiscount= $sumwithshipping;

                // $_SESSION['shipping']= $shipping;

                ?></b></td>
            </tr>

            <tr>
              <td>Discount</td>

              <?php
             
   
            //   echo $sum;
              if(isset($_POST['add-discount'])){
                  $discount = ($_POST["discount"]);
              
                  if($discount=="fashion20" || $discount=="FASHION20"){
                      $discount=(0.2*$sumwithshipping);
                      $sumafterdiscount= $sumwithshipping - $discount; 
                  }
                  else{
                      $discount=0;
                      $sumafterdiscount= $sumwithshipping;
                  }
                  $_SESSION['discount']= $discount;

              } 
              ?>
                <td><b>$<?php echo $discount;?></b></td>
          </tr>
            <tr>

                <td><strong>Total</strong></td>
                <td><strong>$<?php echo $sumafterdiscount;
                $_SESSION['totalamount']= $sumafterdiscount;
                ?></strong></td>
            </tr>
        </table>

        <button class="normal" name = "payment" onclick="window.location.href='payment.php';">Proceed to payment</button>
        <!-- <button class="normal" name = "payment" >Proceed to payment</button> -->

    </div>

</section>
     <!--
    - custom js link
  -->
  <script src="./script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  


</body>

</html>
