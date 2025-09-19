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


      $wishlist =  $_SESSION['wishlist'];
      $_SESSION['wishlist'][$proid] = array("id"=>$proid, "name"=>$name, "price"=>$price, "image"=>$image); 
      // $username = "fatima123";
    //   print_r($_SESSION['cart']);
    $sql = "Insert into wishlist(Username, ProductName)
    values('$username','$name')";

    // $sql = "Insert into wishlist(Username, Name, Price, Image)
    // values('$username', '$name', '$price','$image')";

    if(mysqli_query($conn, $sql)){
          echo "record inserted successfully!";
    }

    if($wishlist!=null){

        foreach ($wishlist as $item) {
          if($proid == $item['id'] ){
            $_SESSION['wishlist'][$proid] = array("id"=>$proid, "name"=>$name, "price"=>$price, "image"=>$image); 

          }
        }
    }

      header('Location: products.php');
?>