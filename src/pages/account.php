<?php 
    error_reporting(0);
    session_start();
    $username = $_SESSION['username'];
    $loggedin = $_SESSION['loggedin'];
    
//    require("functions.php");
    $servername = "localhost";
    $uname="root";
    $pword ="";
    $dbname="fashionstore";
   
    $conn =mysqli_connect($servername, $uname, $pword,$dbname);
    if ($conn -> connect_error){
       // echo("connection failed:");
        die("connection failed:".$conn->connect_error);
    }
//    else{
//        echo("connected");
//    }
// }

// if(isset($_SESSION['loggedin']==true)){
//     $loggedin=true;
// }
// else{
//     $loggedin=false;
// }
$username = $username1 = $firstname = $lastname= $email= "";
$password = $password1 = $password2 ="";
$confirmpassword1=  $confirmpassword = $confirmpassword2 =$email ="";



$usernameError = $username1Error = $emailError = $genderError =$firstnameError = $lastnameError= $dobError= $passwordError ="";
$gender = $dob = $confirmpasswordError = $confirmpassword1Error = $password1Error="";
$showAlert = false;

    if(isset($_POST['login-btn'])) {
        session_start();
        $flag=1;
        if (empty($_POST['username1'])) {
            $username1Error = "Username is required";
            $flag =0;
        } 
        else {
            $username1 = ($_POST["username1"]);
        }
        
        if (empty($_POST['password1'])) {
            $password1Error = "Password is required";
            $flag =0;
        } 
        else {
            $password1 = ($_POST["password1"]);
            // $password2 = ($_POST["password1"]);
            // $password1 = md5($password1);
        }

        if($flag==1){

            $sql1 = "SELECT * FROM userdetails WHERE Username= '$username1' AND Password= '$password1'";
            // $sql1 = "SELECT * FROM user WHERE username= '$username1'";
            $result = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result)){
                // while($row=mysqli_num_rows($result)){
                    // if(password_verify($password2, $row['password'])){
                
                // $showAlert=true;
                // $_SESSION['message'] = "You are now logged in";
                $_SESSION['username1'] = $username1;
                if($username1=='admin'){
                 
                    $_SESSION['loggedin'] = true;
   	                $_SESSION['username'] = $username1;
                    $_SESSION['admin']= true;

                    echo "Welcome" .$username1;
                    header("location: home.php");
                }
                else{
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username1;
                    echo "Welcome" .$username1;

                    header("location: home.php"); //redirecting to home page
                }
            }
            // }
            // }
            else{
                $password1Error="Invalid username or password";
            }
        }
    }
// echo("checking");



    if(isset($_POST['register-btn'])){
        session_start();
        $flag =1;

        if (empty($_POST['firstname'])) {
            $firstnameError = "First Name is required";
            $flag=0;
        } 
        else {
            $firstname = ($_POST["firstname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            //    echo "<script>alert(' ". $_SESSION['Only letters and white space allowed'] ."');</script>"; 
              $firstnameError = "Only letters and white space allowed";
              $flag =0;
            }
        }

        if (empty($_POST['lastname'])) {
            $lastnameError = "Last Name is required";
            $flag =0;
        } 
        else {
            $lastname = ($_POST["lastname"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
              $lastnameError = "Only letters and white space allowed";
              $flag =0;
            }
        }

        if (empty($_POST['username'])) {
            $usernameError = "Username is required";
            $flag =0;
        } 
        else {
            $username = ($_POST["username"]);
        }
        
        if (empty($_POST["email"])) {
            $emailError = "Email is required";
            $flag =0;
        } 
        else {
            $email = ($_POST['email']);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailError = "Invalid email format";
              $flag =0;
            }
        }
        if (empty($_POST['password'])) {
            $passwordError = "Password is required";
            $flag =0;
        } 
        else {
            $password = ($_POST["password"]);
            // $password2 = ($_POST["password"]);
            // $password = md5($password);
        }

        if (empty($_POST['confirmpassword'])) {
            $passwordError = "Password is required";
            $flag =0;
        } 
        else {
            $confirmpassword = ($_POST["confirmpassword"]);
            // $confirmpassword2 = ($_POST["confirmpassword"]);
            // $confirmpassword = md5($confirmpassword);
        }

     
        if (empty($_POST["dob"])) {
            $dob = "";
        } 
        else {
            $dob = ($_POST["dob"]);
            if(!isRealDate($dob)){
            // if (!preg_match("/^[0-9' ]*$/",$dob)) {
                $dobError = "Enter a valid date";
                $flag =0;
            }
        }
        
        if($flag==1){
            if($password == $confirmpassword){
                // $hash = password_hash($password2, PASSWORD_DEFAULT);
                $sql4 = "Insert into user(Username) values('$username')";
                if(mysqli_query($conn, $sql4)){

                
               $sql = "Insert into userdetails(First_name, Last_name, Username, Email, Password, Gender, Date_of_birth)
               values('$firstname', '$lastname', '$username', '$email','$password', '$gender' , '$dob')";

               if(mysqli_query($conn, $sql)){
                // $showAlert=true;

                     echo "record inserted successfully!";
                     $_SESSION['loggedin'] = true;
   	                 $_SESSION['username'] = $username;

                     echo "Welcome" .$username;

                     header("location: home.php"); //redirecting to home page
                 }
                 else{
                     echo "Error inserting records!".mysqli_connect_error();
                 }
                
            }
        }
            else{
                $confirmpasswordError = "Passwords do not match";
            }
            
        }
        
            //  else{
                //  $_SESSION['message'] = "The passwords does not match";
            //  }
    }    
    // $month = $day = $year =0;
    // $date = "";
    function isRealDate($dob) { 

        $orderdate=$dob;
        $orderdate = explode('/', $orderdate);
        $day = $orderdate[0];
        $month   = $orderdate[1];
        $year  = $orderdate[2];
        // list($day, $month, $year) = explode('-', $dob); 
        return var_dump( checkdate($month, $day, $year) );

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
    
    <div class="accountpage">
        <div class="container2">
            <div class="row">
                <div class="bg">
                    <img src="image/acc2.png" width="100%">
                </div>
                <div class="col2">
                    <div class="formcontainer">
                        <div class="forms-btn">
                            <!-- <h2 onclick="login()">Login</h2> -->
                            <!-- <h2 onclick="register()">Register</h2> -->
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>

                        <form method = "post" action = "account.php" id="LoginForm"  > 
                            <input type="text" name = "username1" value="<?php echo $username1;?>" class= "textInput" placeholder="Username" <p><span1 class="error"></span1> <?php echo $username1Error;?>  
                            <input type="password" name = "password1" value="<?php echo $password1;?>" class= "textInput" placeholder="Password" <p><span1 class="error"></span1> <?php echo $password1Error;?> 
                            <!-- <input type="text" name = "username" class= "textInput" placeholder="Username" > -->
                            <!-- <input type="password" name = "password" class= "textInput" placeholder="Password"> -->
                            <button class="login-btn" name = "login-btn" >Login</button>
                        </form>
    
                        <form method = "post" action = "account.php" id="RegisterForm" > 
                            <p><span1 class="error">* required field</span1></p>
                            <input type="text" name = "firstname" value="<?php echo $firstname;?>" class= "textInput" placeholder="First Name" <p><span1 class="error">*</span1> </p><?php echo $firstnameError;?> 
                            <input type="text" name = "lastname" value="<?php echo $lastname;?>" class= "textInput" placeholder="Last Name"<p><span1 class="error">*</span1> <?php echo $lastnameError;?> 
                            <input type="text" name = "username" value="<?php echo $username;?>" class= "textInput" placeholder="Username" <p><span1 class="error">*</span1> <?php echo $usernameError;?> 

                            <input type="email" name = "email" value="<?php echo $email;?>" class= "textInput" placeholder="Email" <p><span1 class="error">*</span1> <?php echo $emailError;?>
                            <input type="password" name = "password" value="<?php echo $password;?>" class= "textInput" placeholder="Password" <p><span1 class="error">*</span1> <?php echo $passwordError;?>
                            <input type="password" name = "confirmpassword" value="<?php echo $confirmpassword;?>" class= "textInput" placeholder="Confirm Password"<p><span1 class="error">*</span1> <?php echo $confirmpasswordError;?>
                          <br><br>
                            Date of Birth: <input type="date" name = "dob" value="<?php echo $dob;?>" class= "textInput" <p><span1 class="error"></span1> <?php echo $dobError;?> 

                            <!-- <input type="dob" name = "dob" value="<?php echo $dob;?>" class= "textInput" placeholder="Date of Birth: _ /_ /_"  <p><span1 class="error"></span1> <?php echo $dobError;?>          -->
                         <br> <br>
                            Gender:
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
                            <button class="register-btn" name = "register-btn">Register</button>
                        </form>

                    </div>
                  
                </div>
            </div>
        </div>
    </div>

  <!-- js for toggle form -->
  <script>
    var LoginForm = document.getElementById("LoginForm");
    var RegisterForm = document.getElementById("RegisterForm");
    var Indicator = document.getElementById("Indicator");

    function register(){
       RegisterForm.style.transform = "translateX(0px)";
       LoginForm.style.transform = "translateX(0px)";
       Indicator.style.transform = "translateX(100px)";
    }
    function login(){
       RegisterForm.style.transform = "translateX(300px)";
       LoginForm.style.transform = "translateX(300px)";
       Indicator.style.transform = "translateX(0px)";
    }
</script>

</body>
</html>