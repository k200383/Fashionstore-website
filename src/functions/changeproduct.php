<?php 

// error_reporting(0);
session_start();
$username = $_SESSION['username'];
$loggedin = $_SESSION['loggedin'];


 $servername = "localhost";
    $uname="root";
    $pword ="";
    $dbname="fashionstore";
   
    $conn =mysqli_connect($servername, $uname, $pword,$dbname);
    if ($conn -> connect_error){
       // echo("connection failed:");
        die("connection failed:".$conn->connect_error);
    }

    // $conn =mysqli_connect($servername, $uname, $pword,$dbname);

    // session_start();
    // $loggedin = $_SESSION['loggedin'];

    $name = $nameError = $filename = $name1 = $name1Error= "";
    // $category = $categoryError = $category1 = $category1Error =  "";
    $size =  $sizeError ="";
    $price= $priceError ="";
    $quantity= $quantityError ="";
  
    if(isset($_POST['add-btn'])){
        $flag=1;

        if (empty($_POST['name'])) {
            $nameError = "Name is required";
            $flag=0;
        } 
        else {
            $name = ($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            //    echo "<script>alert(' ". $_SESSION['Only letters and white space allowed'] ."');</script>"; 
              $nameError = "Only letters and white space allowed";
              $flag =0;
            }
        }
        $size =$_POST["size"];

        if (empty($_POST['price'])) {
            $priceError = "Price is required";
            $flag=0;
        } 
        else{
            $price =$_POST["price"];
            if(!preg_match("/^[0-9]*$/", $price)){
                $priceError="Only numeric value is allowed.";
                $flag=0;
            }
        }

        if (empty($_POST['quantity'])) {
            $quantityError = "Quantity is required";
            $flag=0;
        } 
        else{
            $quantity =$_POST["quantity"];
            if(!preg_match("/^[0-9]*$/", $quantity)){
                $quantityError="Only numeric value is allowed.";
                $flag=0;
            }
        }

        // if (empty($_POST['category'])) {
        //     $categoryError = "Category is required";
        //     $flag=0;
        // }

        if (empty($_POST['size'])) {
            $sizeError = "size is required";
            $flag=0;
        }

        if(empty($_FILES["filename"]["name"])){ 
            $flag=0;
        }

        else{
            $file = $_FILES["filename"]["name"];
            $tempname = $_FILES["filename"]["tmp_name"];
            $folder = "./image/" . $file;

        }

        if($flag==1){
            $sql1 = "Insert into products(ProductName,Size, Quantity)
            values('$name','$size','$quantity')";
            if( mysqli_query($conn, $sql1)){
                $_SESSION['inserted'] = true;
                // echo "<br><br>Successfully Inserted data";
            }
           
            $sql = "Insert into productdetails(ProductName, Price, Image) 
            values('$name','$price', '$file')";
            if(mysqli_query($conn, $sql) )
            {
                $_SESSION['inserted'] = true;
                // echo "<br><br>Successfully Inserted data";
            }
           

            if (move_uploaded_file($tempname, $folder)) {
                $_SESSION['image'] = true;
                // echo "<br><br>Successfully Inserted image";
            } 
            // else {
                // echo "<br><br>Failed to inserted image";
            // }

            $_SESSION['message'] = "Inserted records";
        // header("location: home.php"); //redirecting to home page    
        }
    }

    if(isset($_POST['update-btn'])){
        $flag=1;
        
        if (empty($_POST['name'])) {
            $nameError = "Name is required";
            $flag=0;
        } 
        else {
            $name = ($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
              $nameError = "Only letters and white space allowed";
              $flag =0;
            }
        }
            
        if (empty($_POST['size'])) {
            $sizeError = "Size is required";
            $flag=0;
        }
            $price =$_POST["price"];
            if(!preg_match("/^[0-9]*$/", $price)){
                $priceError="Only numeric value is allowed.";
                $flag=0;
            }
    
            $quantity =$_POST["quantity"];
            if(!preg_match("/^[0-9]*$/", $quantity)){
                $quantityError="Only numeric value is allowed.";
                $flag=0;
            }
       
        // if (empty($_POST['category'])) {
        //     $categoryError = "Category is required";
        //     $flag=0;
        // }

        if(empty($_FILES["filename"]["name"])){ 
            $flag=0;
        }

        else{
            $file = $_FILES["filename"]["name"];
            $tempname = $_FILES["filename"]["tmp_name"];
            $folder = "./image/" . $file;

        }
        $size =$_POST["size"];

        if($flag==1){
            $sql1 = "update products SET ProductName ='$name', Size  = '$size', Quantity = '$quantity'
            where ProductName = '$name'";
            if(mysqli_query($conn, $sql1)){
                $_SESSION['message'] = "Updated $name";
            }          
            else{
                $_SESSION['message'] = "couldn't update";
            }

            $sql = "update productdetails SET ProductName ='$name', Price = '$price',
            Image = '$filename' where ProductName = '$name'";
            if(mysqli_query($conn, $sql)){
                $_SESSION['message'] = "Updated $name";
            }
            else{
                $_SESSION['message'] = "couldn't update";
            }
        // header("location: home.php"); //redirecting to home page
        }
    }

    if(isset($_POST['delete-btn'])){
        $flag=1;
      
        if (empty($_POST['name1'])) {
            $name1Error = "Name is required";
            $flag=0;
        } 
        else {
            $name1 = ($_POST["name1"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name1)) {
            //    echo "<script>alert(' ". $_SESSION['Only letters and white space allowed'] ."');</script>"; 
              $name1Error = "Only letters and white space allowed";
              $flag =0;
            }
        }
        // if (empty($_POST['category1'])) {
        //     $category1Error = "Category is required";
        //     $flag=0;
        // } 
        // $name = $_POST['name'];  
        if($flag==1){
           

            $sql = "delete from products where ProductName = '$name1'";
            if(mysqli_query($conn, $sql)){
                $_SESSION['message'] = "Deleted $name";
            }

            $sql1 = "delete from productdetails where ProductName = '$name1'";
            if(mysqli_query($conn, $sql1)){
                $_SESSION['message'] = "Deleted $name1";
            }
            else{
                $_SESSION['message'] = "couldn't delete";
            }

        }
        // header("location: home.php"); //redirecting to home page
    }
    
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="./style2.css"/>
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

<?php
    if(isset($_SESSION['message'])) {
        echo "<div id='error_msg'><br><br><br>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
// $_GET['username'];
?>

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
    
    <div class="changeproductpage">
        <div class="container2">
            <div class="row">
                <div class="bg">
                    <!-- <img src="image/acc2.png" width="100%"> -->
                </div>
                <div class="col2">
                    <div class="formcontainer">
                        <div class="forms-btn">
                            <!-- <h2 onclick="login()">Login</h2> -->
                            <!-- <h2 onclick="register()">Register</h2> -->
                            <span onclick="addProduct()">Add Product</span>
                            <span onclick="deleteProduct()">Delete Product</span>
                            <hr id="Indicator">
                        </div>

                        <form method = "post" action = "changeproduct.php" id="addProductForm"  enctype="multipart/form-data"> 
                            <input type="text" name = "name" value="<?php echo $name;?>" class= "textInput" placeholder="Name" <p><span1 class="error"></span1> </p><?php echo $nameError;?> 
                             <!-- <input type="number" min="1" name = "size" value="<?php echo $size;?>" class= "textInput" placeholder="Size" <p><span1 class="error"></span1> </p><?php echo $sizeError;?>  -->
                             <input type="number" min="1" name = "price" value="<?php echo $price;?>" class= "textInput" placeholder="Price" <p><span1 class="error"></span1> </p><?php echo $priceError;?> 
                             <input type="number" min="1" name = "quantity" value="<?php echo $quantity;?>" class= "textInput" placeholder="Quantity" <p><span1 class="error"></span1> </p><?php echo $quantityError;?> 
                        
                            <br> <br> 
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Size:
                            <input type="radio" name="size" <?php if (isset($size) && $size=="XL") echo "checked";?> value="XL">XL
                            <input type="radio" name="size" <?php if (isset($size) && $size=="L") echo "checked";?> value="L">L    
                            <input type="radio" name="size" <?php if (isset($size) && $size=="M") echo "checked";?> value="M">M    
                            <input type="radio" name="size" <?php if (isset($size) && $size=="S") echo "checked";?> value="S ">S    
                            <input type="radio" name="size" <?php if (isset($size) && $size=="XS") echo "checked";?> value="XS">XS

                            <br> <br> 
                            <input type="file" name="filename" class="form-control" value="" />   
                            <button class="add-btn" name = "add-btn" >Add Product</button>
                            <button class="update-btn" name = "update-btn" >Update Product</button>
                        </form>

                        <form method = "post" action = "changeproduct.php" id="deleteProductForm"> 
                        <input type="text" name = "name1" value="<?php echo $name1;?>" class= "textInput" placeholder="Name" <p><span1 class="error"></span1> </p><?php echo $name1Error;?> 
                                       
                           
                            <button class="delete-btn" name = "delete-btn" >Delete Product</button>
                        </form>

                    </div>
                  
                </div>
            </div>
        </div>
    </div>
 <!-- js for toggle menu
 <script>
    var menuItems = document.getElementById("menuItems");

    menuItems.style.maxHeight = "0px";

    function menuToggle(){
        if(menuItems.style.maxHeight=="0px"){
            menuItems.style.maxHeight="200px";
        }
        else{
            menuItems.style.maxHeight="0px";
        }
    }
</script> -->

  <!-- js for toggle form -->
  <script>
    var addProductForm = document.getElementById("addProductForm");
    var deleteProductForm = document.getElementById("deleteProductForm");
    var Indicator = document.getElementById("Indicator");

    function addProduct(){
       addProductForm.style.transform = "translateX(300px)";
       deleteProductForm.style.transform = "translateX(300px)";
       Indicator.style.transform = "translateX(0px)";
    }
    function deleteProduct(){
       addProductForm.style.transform = "translateX(0px)";
       deleteProductForm.style.transform = "translateX(0px)";
       Indicator.style.transform = "translateX(100px)";
    }
   
</script>

<!-- 
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footercol1">
                    <h1>Contact Us:</h1>
                    <p>Phone: 03322398476<br>
                        Email: k200406@nu.edu.pk</p>
                </div>
                   
            </div>
        </div>
    </div>

     -->
</body>
</html>