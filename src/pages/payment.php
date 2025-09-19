<?php
    error_reporting(0);
    session_start();
    $username = $_SESSION['username'];
    $loggedin = $_SESSION['loggedin'];
include("header.php");

$servername = "localhost";
$uname="root";
$pword ="";
$dbname="fashionstore";

$conn =mysqli_connect($servername, $uname, $pword,$dbname);
if ($conn -> connect_error){
   // echo("connection failed:");
    die("connection failed:".$conn->connect_error);
}
// session_start();
// $username = $_SESSION['username'];

$_SESSION['creditcard'] =null;
$_SESSION['cod'] =null;
$_SESSION['save'] =null;
$_SESSION['order'] =null;
$_SESSION['vieworder'] =null;  
$_SESSION['placeorder'] =null;  


$discount =0;


if(isset($_POST['creditcard'])){
  $_SESSION['creditcard'] =true;
  // echo "dasd";
} 

if(isset($_POST['cod'])){
   $_SESSION['cod'] =true;
   $_SESSION['save'] =true;

}

if(isset($_POST['save'])){
  $_SESSION['save'] =true;
  // echo "dasd";
} 
// $subtotal = "";

// $totalamount = $_SESSION['totalamount'];


if(isset($_POST['pay']) || isset($_POST['cod'])){

  // $sql2 = "SELECT * FROM cart";
  // $all_cart = $conn->query($sql2);

  // while($row = mysqli_fetch_assoc($all_cart)){
  //   $name = $row["Name"];
  //   $quantity = $row["Quantity"];
  //   $price = $row["Price"];

  //   $sql1 = "Insert into orderdetails(Product_name,quantity, price)
  //   values('$name','$quantity', '$price')";
  //   if(mysqli_query($conn, $sql1)){
  //     $_SESSION['order'] = true;
  //     $_SESSION['message'] = "Order Placed Successfully";
     
  //     //  header("location: checkout.php"); //redirecting to home page
  //  }
  //  else{
  //   $_SESSION['message'] = "Couldn't place Order";
  //  }

  // }

  
  $subtotal = $_SESSION['subtotal'];
  $discount = $_SESSION['discount'];
  $shipping = $_SESSION['shipping'];
  $totalamount = $_SESSION['totalamount'];

     $sql = "Insert into orderdetails(subtotal, discount, shipping, total)
     values('$subtotal', '$discount',  '$shipping', '$totalamount')";

    //  $sql1 = "Insert into orderdetails"

     if(mysqli_query($conn, $sql)){
          $_SESSION['order'] = true;
          // $_SESSION['message'] = "Order Placed Successfully";
         
          //  header("location: checkout.php"); //redirecting to home page
       }
       else{
        $_SESSION['message'] = "Couldn't place Order";
       }
      
  }
 

  // $orderid = $price = $quantity =0;
  // $productname = $

  if(isset($_POST['vieworder'])){
    $_SESSION['order'] = true;
    $_SESSION['vieworder'] =true;  
  }

  if(isset($_POST['placeorder'])){//} && isset($_SESSION['order'])){
    $_SESSION['message'] = "Order Placed Successfully";
  }
    $subtotal = $_SESSION['subtotal'];
    $discount = $_SESSION['discount'];
    $shipping = $_SESSION['shipping'];
    $totalamount = $_SESSION['totalamount'];

  
    // $sql2 = "SELECT * FROM orderdetails";
    // $all_cart = $conn->query($sql2);

  //   while($row = mysqli_fetch_assoc($all_cart)){
  //     if(mysqli_query($conn, $sql2)){
  //     $_SESSION['order'] = true;
  //     $_SESSION['message'] = "Order Placed Successfully";
     
  //     //  header("location: checkout.php"); //redirecting to home page
  //  }
  //  else{
  //   $_SESSION['message'] = "Couldn't place Order";
  //  }

  // }
  // }



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://pro.fontawsome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style4.css">
</head>

<body> 

  <br><br><br>
    <!-- <main class="container3">     -->
    <div id="checkout">
        <h3>Payment Details</h3>
        <table>
                <td>
                    <div class="payment-form">

                      <div class="payment-method">
                        <form action = "payment.php" method="post">

                        <button class="normal" name = "creditcard" >Credit Card
                        
                        <?php if(!isset($_SESSION['creditcard'])) : ?>
                        <ion-icon name="creditcard"></ion-icon>
                        <ion-icon class="checkmark" name="checkmark-circle-outline"></ion-icon>
                        <?php endif; ?> 

                        <?php if(isset($_SESSION['creditcard'])) : ?>
                        <ion-icon name="creditcard"></ion-icon>
                        <ion-icon class="checkmark fill" name="checkmark-circle"></ion-icon>
                        <?php endif; ?> 
            
                        </button>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button class="normal" name = "cod" >Cash on Delivery
                    
                        <?php if(!isset($_SESSION['cod'])) : ?>
                        <ion-icon name="cod"></ion-icon>
                        <ion-icon class="checkmark" name="checkmark-circle-outline"></ion-icon>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['cod'])) : ?>
                        <ion-icon name="cod"></ion-icon>
                        <ion-icon class="checkmark fill" name="checkmark-circle"></ion-icon>
                        <?php endif; ?> 

                        </button>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                       <?php 
                        if(isset($_SESSION['save'])): ?>
                          <button class="normal" name = "vieworder" >View Order Details </button>
                      <?php endif; ?> 
                    
                         </form>
                      </div>       


                    <?php if(isset($_SESSION['creditcard'])) : ?>
                    
                        <form method = "post" action = "payment.php" id="cardForm"  > 
              
                          <div class="cardholder-name">
                            <label for="cardholder-name" class="label-default">Cardholder name</label>
                            <input type="text" name="cardholder-name" id="cardholder-name" class="input-default">
                          </div>
              
                          <div class="card-number">
                            <label for="card-number" class="label-default">Card number</label>
                            <input type="number" name="card-number" id="card-number" class="input-default">
                          </div>
              
                          <div class="input-flex">
              
                            <div class="expire-date">
                              <label for="expire-date" class="label-default">Expiration date</label>
              
                              <div class="input-flex">
              
                                <input type="date" name="day" id="expire-date" placeholder="31" min="1" max="31"
                                  class="input-default">
                            
                              </div>
                            </div>
              
                            <div class="cvv">
                              <label for="cvv" class="label-default">CVV</label>
                              <input type="number" name="cvv" id="cvv" class="input-default">
                            </div>
              
                          </div>

                          <button class="normal" name = "save" >Save</button>
              
                        <?php endif; ?> 

                      </div>

                      <?php if(isset($_SESSION['save']) && !isset($_SESSION['cod'])) : ?>
                      <button class="btn btn-primary" name="pay">
             
                        <b>Pay</b> $ <span id="payAmount">
                          <?php echo  $_SESSION['totalamount'] ?> </span>
                      </button>
                      </form>

                      <?php endif; ?> 
                
                
                </td>

        </table>

              <?php
                  if(isset($_SESSION['message'])) {
                    echo "<div id='error_msg'><br><br><br>".$_SESSION['message']."</div>";
                    unset($_SESSION['message']);
                  }
                ?>
                    <?php if(isset($_SESSION['vieworder'])) : ?>
                      <form method="post">
                          <tr>   
                          <h3>Order Summary: </h3>                         
                            <td> Subtotal:<?php echo  $subtotal?></td> 
                            <td> <br>Shipping:<?php echo  $shipping?></td> 
                            <td> <br>Discount:<?php echo  $discount?></td> 
                            <td> <br>Total:<?php echo  $totalamount?><br><br></td> 
                            <button class="normal" name = "placeorder" >Place Order</button>
                          </tr>
                          <?php endif; ?> 
                    </form>

     
    </div>
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
