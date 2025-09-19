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

<body> 

<!-- <section class="ftco-section"> -->
    	<!-- <div class="container"> -->
				<!-- <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		 -->
    	<!-- </div> -->
		<br><br><br><br>
    	<div class="container">
    		<div class="row">
			<?php
			  
			  $sql = "select * from products p1, productdetails p2 where p1.ProductName = p2.ProductName";
			  $rs = mysqli_query($conn,$sql);
			  while($data = mysqli_fetch_array($rs)){

			?>
    			<div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
    				<div class="product">
    					<a href="detail.php?id=<?= $data['ProductId']?>" class="img-prod">
						<img style="height:250px;" class="img-fluid" src="<?=$data['Image']?>" alt="Colorlib Template">
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?=$data['ProductName']?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price">
										<span class="price-sale">$<?=$data['Price']?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			
				
				<?php
					
			     }
               ?>

    		</div>
    	</div>
    </section>