<?php
error_reporting(0);
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
// else
// {
//     echo("connected");
// }

// session_start();
// $username = $_SESSION['username'];

$sql = "select * from wishlist w, productdetails pd, products p  where w.ProductName = pd.ProductName and
p.ProductName = pd.ProductName" ;

// $sql = "SELECT * FROM wishlist";
$all = $conn->query($sql);

// $sql1 = "SELECT * FROM newproduct_info";
// $r = $conn->query($r);

$sum = 0;
$sumwithshipping=0;
$sumafterdiscount=0;

$subtotal = 0;


$shipping = 0;
$discount=0;
$totalamount=0;

$quantity = 1;
$price = 0;

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
      <ion-icon name="cart-outline"></ion-icon> Wishlist
    </h1>

    <div class="item-flex">

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>         
                <td>Image</td>
                <td>Product</td>
                <td>Price</td>
                <td>Remove</td>
            </tr>
        </thead>

        <tbody>
            <?php
               
                while($row = mysqli_fetch_assoc($all)){

                    // while($data = mysqli_fetch_assoc($r)){

                    
            ?>
<?php  
                // $cart = $_SESSION['cart'];
                // if($cart == null){
                //     echo "<h3 style='color:red'> your cart is empty </h3>";
                // }else{
                //     // $cart  = $_SESSION['cart'];
                //     foreach($cart as $c){
                //      ?>
            <tr>
           <form method= "POST" action="wishlist.php">
           <!-- <form action="addtocart.php" method="get"> -->
            
                <td><img src="<?php echo $row["Image"]; ?>" alt= "" ></td>

                <!-- <input type="hidden" name="size" value="<?=$data['Size']?>"> -->

                    <td><?php echo $row["ProductName"]; $name = $row["ProductName"];?></td>
                    
                    <td><b>$<?php echo $row["Price"]; ?></b></td>

                    <td class="product-remove"><a href="removewishlist.php?name=<?=$row['ProductName']?>">
                    <span class="fa fa-times-circle"style="font-size:24px;color:black"></span></a></td>
              
                    <!-- <a></button></td> -->

                    <!-- <td><input type="submit" class="btn btn-primary" value="Add to Cart" name="add"></td> -->
                    </form>
            </tr>
            
            <?php
                    // }
            }
     
            ?>
          
        </tbody>


        

    </table>
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
