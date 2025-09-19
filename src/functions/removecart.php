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
// else
// {
//     echo("connected");
// }

session_start();
$username = $_SESSION['username'];

// $id = $_GET['id'];
$name = $_GET['name'];
unset($_SESSION['cart'][$name]);
// unset($_SESSION['cart'][$id]);

$sql = "delete from cart where ProductName = '$name'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['delete'] = "Deleted $name";
    }
    else{
        $_SESSION['delete'] = "couldn't delete";
    }
header("Location:cart.php");

?>