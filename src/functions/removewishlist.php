<?php
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

session_start();
$username = $_SESSION['username'];

$name = $_GET['name'];
unset($_SESSION['cart'][$name]);

$sql = "delete from wishlist where ProductName = '$name'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['delete'] = "Deleted $id";
    }
    else{
        $_SESSION['delete'] = "couldn't delete";
    }
header("Location:wishlist.php");

?>