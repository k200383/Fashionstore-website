<?php

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
// echo "connected";
session_start();
$username = $_SESSION['username'];

       $proid   = $_GET['proid'];
       $name    = $_GET['proname'];
       $image   = $_GET['pimage'];
       $price   = $_GET['price'];
       $qty     = $_GET['pqty'];
       $size     = $_GET['size'];
       $total   = $_GET['ptotal'];


      $cart =  $_SESSION['cart'];
      $_SESSION['cart'][$proid] = array("id"=>$proid, "name"=>$name, "price"=>$price, "qty"=>$qty, "image"=>$image,"total"=>$total); 
       
    //   print_r($_SESSION['cart']);
  // $username = "fatima123";

    // $sql = "Insert into cart(Username, Name,
    // Size, Price, Image, Quantity, Total)
    // values('$username', '$name', '$size', '$price','$image', '$qty' , '$total')";
    $sql = "Insert into cart(Username, ProductName,Total)
    values('$username','$name','$total')";

    if(mysqli_query($conn, $sql)){
          echo "record inserted successfully!";
    }

    if($cart!=null){

        foreach ($cart as $item) {
          if($proid == $item['id'] ){
              
         

            $_SESSION['cart'][$proid] = array("id"=>$proid, "name"=>$name, "price"=>$price, "qty"=>$tot_qty, "image"=>$image,"total"=>$total_bill); 
 

          }
        }
    }

      header('Location: products.php');
?>