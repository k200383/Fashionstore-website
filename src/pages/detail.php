<?php 

include('header.php');

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
// $_SESSION['username'] = $username;
$loggedin = $_SESSION['loggedin'];
$id=0;
$id = $_GET['id'];
// $id = $_SESSION['id'];
// inner join categories on categories.catid = products.catid
$sql = "SELECT * FROM products p1, productdetails p2 where p1.ProductName = p2.ProductName and p1.ProductID= '$id'";

$rs = mysqli_query($conn, $sql);
// $data = mysqli_fetch_array($rs);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- <link rel="stylesheet" href="https://pro.fontawsome.com/releases/v5.10.0/css/all.css" /> -->
	<link rel="stylesheet" href="https://fontawesome.com/icons" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <link rel="stylesheet" href="style5.css">
</head>
<!-- <div class="container"> -->
<br><br><br>
    <div class="row mb-5">

            <div class="col-lg-6">
            <?php
			  while($data = mysqli_fetch_array($rs)){
			?>
            <img src="<?=$data['Image']?>" height="250px" alt="">

            </div>
         
            <div class="col-lg-6">

            <!-- <label>: </label> -->
            <h3><b><?=$data['ProductName']?></b></p><h3>
           
            <label>Size: </label>
            <td><b>$<?php echo $data['Size']; ?></b></td>
                <!-- Price: <h3><?=$data['Price']?></h3> -->

                <form  action="addtocart.php" method="get">
                <!-- <div class="form-group">
                        <label>Size:</label>
                        <input type="text"class="form-control" id="size" onkeyup="calc(this)" name="size"  >
                        </div> -->
                <input type="hidden" name="proid" value="<?=$data['ProductId']?>">
                <input type="hidden" name="size" value="<?=$data['Size']?>">
                <input type="hidden" name="price" value="<?=$data['Price']?>">
                <input type="hidden" name="proname" value="<?=$data['ProductName']?>">
                <input type="hidden" name="pimage" value="<?=$data['Image']?>">

                        <label>Price: </label>
                        <td><b>$<?php echo $data["Price"]; ?></b></td>
                    
                        
                    <div class="form-group">
                        <label>Quantity: </label>
                        <input type="text" min=1 class="form-control" id="qty" onkeyup="calc(this)" name="pqty"  >
                        </div>

                        <!-- <label>Size: </label>
                        <td><b>$<?php echo $data["Size"]; ?></b></td>
              -->
                        <div class="form-group">
                        <label>Total :</label>
                        <input type="text" class="form-control" id="total" name="ptotal" 
                         value="<?=$data['Price'] * $data['Quantity']?>" >
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add to Cart" name="add">
               
           </form>

           <form  action="addtowishlist.php" method="get">
              
                <input type="hidden" name="proid" value="<?=$data['ProductId']?>">
                <input type="hidden" name="size" value="<?=$data['Size']?>">
                <input type="hidden" name="price" value="<?=$data['Price']?>">
                <input type="hidden" name="proname" value="<?=$data['ProductName']?>">
                <input type="hidden" name="pimage" value="<?=$data['Image']?>">

                 <input type="submit" class="btn btn-primary" value="Add to Wishlists" name="add">
                 <?php 
                }   ?>
           </form>

           <script>
                  function calc(){
                      var qty = document.getElementById("Quantity").value;
                      var price = document.getElementById("Price").value;
                    //   document.getElementById("total").value = parseInt(qty) * parseInt(price);

                  }

           </script>
          </div>
        </div>

     <!-- </div> -->

<!-- <?php include('footer.php')  ?> -->
    
</body>
</html>