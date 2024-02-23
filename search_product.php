<?php
include 'connect.php';

session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
// {
//     header("location: newlogin.php");
//     exit;
// }
// if (!isset($_SESSION['registered_user'])) 
// {
//     header("location: Register.php");
//     exit;
// }



    // $sel = "SELECT * FROM `user`";
    // $query = mysqli_query($conn,$sel);
    // $result = mysqli_fetch_assoc($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>MAHADEV SHOP  | Products</title>

	<!-- Site Icon -->
	<link rel="shortcut Icon" type="image/png" href="img/favicon.png">

	<!-- Font Awesome Icons -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/search_product.css?v=<?php echo time();?>"> 
	<!-- <link href="css/style.css" rel="stylesheet"> -->

</head>
<body id="page-top">
<?php
		if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
		{
			echo "<div class='container1'>
            <nav>
                <ul class='nav1'>
				<a href='index.php'>
                    <img src='images/newlogo.jpg' class='logo1'>
					</a>
                    <li><a style='	text-decoration: none; color:black;' href='Register.php'>Register/Login</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='index.php'>Home</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='product_page.php'>Products</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='join_us.php'>Join Us</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='about_us.php'>About Us</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='contact.php'>Contact Us</a></li>
                    <i class='fa-solid fa-xmark'></i>
                </ul>
            </nav>
        </div>";
		
		}
		else
		{
			echo "<div class='header'>
        <a href='logo.png'>
        </a>
        <div class='container'>
            <nav>
            <div class='menu-bar'>
			<a href='loggedinpg.php'>
             <img src='logo.png' alt='' class='logo'>
			 </a> 
            <ul>
            <li><a href='user_profile.php'>MyProfile</a></li>
            <li><a href='loggedinpg.php'>Home</a></li>
            <li><a href='product_page.php'>Product</a></li>
			<li><a style='	text-decoration: none; color:black;'href='join_us.php'>Join Us</a></li>
			<li><a style='	text-decoration: none; color:black;'href='about_us.php'>About Us</a></li>
            <li><a href='contact.php'>Contact us</a></li>
            </ul>
        </div>
    </div>
            </nav>";
		}
	?>
</div>
		
		
	</header>
<?php
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
} 
$ip = getIPAddress(); 
$total = 0;
$cart_qry = "SELECT * FROM `cart` WHERE IP_address='$ip'";
$res=mysqli_query($conn,$cart_qry);
while($row=mysqli_fetch_array($res))
{
	$pr_id = $row['Product_ID'];
	$sel_pr = "SELECT * FROM `product` WHERE Product_ID='$pr_id'";
	$res_pr=mysqli_query($conn,$sel_pr);
	while($row_pr_price=mysqli_fetch_array($res_pr))
	{
		$pr_price = array($row_pr_price['Product_Price']);
		$pr_value = array_sum($pr_price);
		$total+=$pr_value;
	}
}
?>
	<section class="page-section">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 blog-form">
					<h2 class="blog-sidebar-title"><b><a href="cart.php" style="color:black; text-decoration:none;">Cart<i href="cart.php"class="fa fa-shopping-cart" aria-hidden="true"></i></a></b></h2>
					<h6>Total Price: <?php echo 	$total."/-";?></h6>					
					<hr />

					<div>&nbsp;</div>
					<div>&nbsp;</div>

					<h2 class="blog-sidebar-title"><b>Categories</b></h2>
					<hr />

					
					<!--------------------------Code For Display Category-------------------------------->
					<?php

                    $sel_category = "SELECT * FROM `category`";
					$res = mysqli_query($conn,$sel_category);
					// echo $row_data['Category_Name'];
					while($row_data = mysqli_fetch_assoc($res))
					{
						$category_name = $row_data['Category_Name'];
						$category_ID = $row_data['Category_ID'];

						echo "<p class='blog-sidebar-list'><b><span class='list-icon'></span>
						<a href='product_page.php?category=$category_ID' style='color:black; text-decoration:none;'>$category_name</b></p></a>";
					}


					?>

					<div>&nbsp;</div>
					<div>&nbsp;</div>

					<h2 class="blog-sidebar-title"><b>Filter</b></h2>
					<hr />

                    <form  action="" method="get">
					<div class="input-group mb-3">
						<input type="search" class="form-control" placeholder="Search" aria-label="Receipient's username" name="search_data" aria-describely="basic-addon2">
						<div class="input-group-append">
							
							<input type="submit" value="Search" name="search_data_product">
							<!-- <i class="fa fa-search"></i> -->
						</div>
						
					</div>
                </form>

					<!-- <p class="tags">Price ₹ 10 - ₹ 500</p>
					<button type="button" class="btn btn-dark btn-lg">Filter</button> -->

					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<!-- <h2 class="blog-sidebar-title"><b>Tags</b></h2>
					<p class="product-sidebar-list"><b>diwali offers</b></p>
					<p class="product-sidebar-list"><b>best scims</b></p> -->
					<!-- <p class="product-sidebar-list"><b></b></p>
  -->

				</div>



			
				<!--END  <div class="col-lg-3 blog-form">-->

				<div class="col-lg-9" style="padding-left: 30px;">
					<div class="row">
						<div class="col">
							<!-- Showing all 9 results -->
						</div>

						<div class="col">
							<!-- <select class="form-control">
								<option value="">Default Sorting</option>
								<option value="popularity">Sorting by popularity</option>
								<option value="average">Sorting by average</option>
								<option value="latest">Sorting by latest</option>
								<option value="low">Sorting by low</option>
								<option value="high">Sorting by high</option>
							</select> -->
						</div>

					</div>
					<!-- Sorting by  -->
					<div class="row">
					<!-- <div>&nbsp;</div>
					<div>&nbsp;</div> -->

					<div class="row">

					<?php




						if(isset($_GET['search_data_product']))
						{
							$search_data_value = $_GET['search_data'];
						$search_product = "SELECT * FROM `product` WHERE Product_Description like '%$search_data_value%' ";
					$res = mysqli_query($conn,$search_product);
                    $row = mysqli_num_rows($res);
					if($row==0)
					{
						echo "<h2 class='text-center text-danger'> No Result Match. No product found on this category </h2>";
					}
					while($row=mysqli_fetch_assoc($res))
					{
						$pr_id = $row['Product_ID'];
						$pr_name = $row['Product_Name'];
                        $pr_price = $row['Product_Price'];
                        $pr_des = $row['Product_Description'];
                        // $pr_qun = $row['Product_Stock'];
                        $pr_cat = $row['Category_ID'];
						$pr_img = $row['Product_img'];
						echo "<div class='prd'>
						<div class='card'>
							<div class='card-body text-center'>
								<img src='./product_img/$pr_img' class='product-image'>
								<h5 class='card-title'><b>$pr_name</b></h5>
								<p class='card-text small'>$pr_des.</p>
								<p class='tags'>$pr_price</p>
								<a href='product_details.php?Product_ID=$pr_id' class='btn btn-success button-text'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
							</div>
						</div>
					</div>";
					}
				}







					?>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					</div>
					<!-- Sorting by <div class="row"> -->
				</div>
				<!--END  <div class="col-lg-9">-->
			</div>
		</div>
	 </section>


	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<section class="page-section subscribe-section">
		<div class="container">
			<div class="row">

				<div class="col-lg-4">
					z
					<p class="logo-text-white"> mahadev and plywood shop </p>
				</div>

				<div class="col-lg-4">
					<h3 class="contact-heading">EXPLORE</h3>
					<div class="row">
						<div class="col-lg-6">
							<p><a class="explore-link" href="index.php"> <b>Home</b></a></p>
							<p><a class="explore-link" href="product_page.php"> <b>Products</b></a></p>
							<p><a class="explore-link" href="contact.php">Contact Us <b></b></a></p>
							<p><a class="explore-link" href="#"> <b>Join Us</b></a></p>
						</div>

						<div class="col-lg-6">
							<!-- <p><a class="explore-link" href="#"> > <b>Blog</b></a></p>
							<p><a class="explore-link" href="about.html"> > <b>stores</b></a></p> -->
							
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<h3 class="contact-heading">CONTACT US</h3>
					<p class="contact-info"><i class="fa fa-map-marker"></i>  Rokadiya Hanuman temple near yard gate, Shop no :- 3/4, Porbandar</p>
					<p class="contact-info"><i class="fa fa-phone"></i> +91(63)5588-9599</p>
					<p class="contact-info"><i class="fa fa-envelope"></i>  mahadevplywood@gmail.com</p>
					<p class="contact-info"><i class="fa fa-globe"></i> www.mahadevshop.com</p>
				</div>

			</div>
		</div>
	</section>
					
	<footer class="footer-info pt-5 py-4">
		<div class="container">
			<div class="small text-center text-muted">
				<span class="footer-title">MAHADEV SHOP </span> <span class="copyright">&copy; All Right Reserved 2023</span>
			</div>

			

		</div>
	</footer>



	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	

</body>
</html>