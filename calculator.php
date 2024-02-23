<!DOCTYPE html>
<html lang="en">
<head>







    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="css/calculator.css?v=<?php echo time();?>">    

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    </div>
    <!-- End --> <!------------------------ Header Section ----------------------->

    <?php
    include 'connect.php';

    session_start();
		if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
		{
			echo "<div class='container'>
            <nav>
                <ul class='nav'>
                <a href='index.php'>
                    <img src='images/logo.png' class='logo'>
                    </a>
                    <li><a style='	text-decoration: none; color:black;' href='Register.php'>Register/Login</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='index.php'>Home</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='product_page.php'>Products</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='worker.php'>Workers</a></li>
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
        <div class='container1'>
            <nav>
            <div class='menu-bar'>
            <a href='index.php'>
             <img src='images/logo.png' alt='' class='logo1'>
             </a> 
            <ul>
            <li><a href='loggedinpg.php'>Home</a></li>
            <li><a href='product_page.php'>Product</a></li>
            <li><a href='worker.php'>Workers</a></li>
            <li><a href='join_us.php'>Join Us</a></li>
            <li><a href='about_us.php'>About Us</a></li>
            <li><a href='contact.php'>Contact us</a></li>
            <li><a href='user_profilenew.php'>MyProfile</a></li>

            </ul>
        </div>
    </div>
            </nav>";
		}
	?>
	
</div>





<form method="GET" enctype="multipart/form-data">
                <div class="form">
                    <div class="form-txt">
                    </div>
                    <div class="form-details">
                        <h2>Calculate Estimate of Plywood</h2>
                           <select name="category" class="select_cat">
                           <option value="">Select Categories</option>
                           <option value="TV cabinet">TV cabinet (243.84cm x 91.44cm)</option>
                           <option value="king">King side bed (182.88cm x 198.12cm)</option>
                           <option value="queen">Queen side bed (152.4cm x 182.88cm)</option>
                           <option value="single">Single bed (76.2cm x 182.88cm)</option>
                           <option value="wardrobe small">Wardrobe 8FT Height(243.84cm x 121.92cm)</option>
                           <option value="wardrobe big">Wardrobe 10FT Height(365.76cm x 365.76cm)</option>
                           <option value="kitchen">Kitchen Cabinate(243.84cm x 121.92cm)</option>
                           <option value="dressing">Dressing Table(304.8cm x 121.92cm)</option>
                           </select>
                        <br>
                       <button name="submit">Calculate</button>
                        
                        </div>    
                    </div>  
                </div>
            </form>

            <?php
if(isset($_GET['submit']))
{
    $bed = $_GET['category'];
    if($bed=='TV cabinet')
    {?>
             <table>
             <tr>
                <th>Dimension</th>
                <th>Quantity</th>
                <th>Thickness</th>
            </tr>  
            <tr>
                <td>243.84cm x 91.44cm</td>
                <td>2</td>
                <td>19mm</td>
            </tr>
            <tr>
                <td>243.84cm x 91.44cm</td>
                <td>3</td>
                <td>12mm</td>
            </tr>
            <tr>
                <td>243.84cm x 91.44cm</td>
                <td>2</td>
                <td>6mm</td>
            </tr>
                <img src="images/tv.jpg" style="position:relative; top:80px; left:200px; height:300px; width:500px;" alt="">
             </table>
    <?php
    }
    ?>
    <?php 
    if($bed=='king')
    {?>
        <table>
        <tr>
           <th>Dimension</th>
           <th>Quantity</th>
           <th>Thickness</th>
       </tr>  
       <tr>
           <td>182.88cm x 198.12cm</td>
           <td>5</td>
           <td>19mm</td>
       </tr>
       <tr>
           <td>182.88cm x 198.12cm</td>
           <td>3</td>
           <td>12mm</td>
       </tr>
       <tr>
           <td>182.88cm x 198.12cm</td>
           <td>2</td>
           <td>6mm</td>
       </tr>
       <img src="images/king.jpg" style="position:relative; top:80px; left:200px; height:300px; width:500px;" alt="">

        </table>
    <?php }?>
    <?php 
    if($bed=='queen')
    {?>
        <table>
        <tr>
           <th>Dimension</th>
           <th>Quantity</th>
           <th>Thickness</th>
       </tr>  
       <tr>
           <td>152.4cm x 182.88cm</td>
           <td>3</td>
           <td>19mm</td>
       </tr>
       <tr>
           <td>152.4cm x 182.88cm</td>
           <td>2</td>
           <td>12mm</td>
       </tr>
       <tr>
           <td>152.4cm x 182.88cm</td>
           <td>2</td>
           <td>6mm</td>
       </tr>
       <img src="images/queen.jpg" style="position:relative; top:80px; left:200px; height:300px; width:500px;" alt="">
        </table>
    <?php }?>
    <?php 
    if($bed=='single')
    {?>
        <table>
        <tr>
           <th>Dimension</th>
           <th>Quantity</th>
           <th>Thickness</th>
       </tr>  
       <tr>
           <td>76.2cm x 182.88cm</td>
           <td>1</td>
           <td>19mm</td>
       </tr>
       <tr>
           <td>76.2cm x 182.88cm</td>
           <td>1</td>
           <td>12mm</td>
       </tr>
       <tr>
           <td>76.2cm x 182.88cm</td>
           <td>2</td>
           <td>6mm</td>
       </tr>
       <img src="images/single.jpg" style="position:relative; top:80px; left:200px; height:300px; width:500px;" alt="">
        </table>
    <?php }?>
    <?php 
    if($bed=='wardrobe small')
    {?>
        <table>
        <tr>
           <th>Dimension</th>
           <th>Quantity</th>
           <th>Thickness</th>
       </tr>  
       <tr>
           <td>243.84cm x 121.92cm</td>
           <td>5</td>
           <td>19mm</td>
       </tr>
       <tr>
           <td>243.84cm x 121.92cm</td>
           <td>1</td>
           <td>12mm</td>
       </tr>
       <tr>
           <td>243.84cm x 121.92cm</td>
           <td>1</td>
           <td>6mm</td>
       </tr>
       <img src="images/wardrobe small.jpg" style="position:relative; top:80px; left:200px; height:400px; width:400px;" alt="">
        </table>
    <?php }?>
    
    <?php 
    if($bed=='wardrobe big')
    {?>
        <table>
        <tr>
           <th>Dimension</th>
           <th>Quantity</th>
           <th>Thickness</th>
       </tr>  
       <tr>
           <td>365.76cm x 365.76cm</td>
           <td>24</td>
           <td>19mm</td>
       </tr>
       <tr>
           <td>365.76cm x 365.76cm</td>
           <td>9</td>
           <td>12mm</td>
       </tr>
       <tr>
           <td>365.76cm x 365.76cm</td>
           <td>12</td>
           <td>6mm</td>
       </tr>
       <img src="images/wardrobe big.jpg" style="position:relative; top:80px; left:200px; height:400px; width:400px;" alt="">
        </table>
    <?php }?>
    <?php 
    if($bed=='kitchen')
    {?>
        <table>
        <tr>
           <th>Dimension</th>
           <th>Quantity</th>
           <th>Thickness</th>
       </tr>  
       <tr>
           <td>243.84cm x 121.92cm</td>
           <td>20</td>
           <td>19mm</td>
       </tr>
       <tr>
           <td>243.84cm x 121.92cm</td>
           <td>15</td>
           <td>12mm</td>
       </tr>
       <tr>
           <td>243.84cm x 121.92cm</td>
           <td>10</td>
           <td>6mm</td>
       </tr>
       <img src="images/kitchen.jpeg" style="position:relative; top:80px; left:200px; height:300px; width:500px;" alt="">
        </table>
    <?php }?>
    <?php 
    if($bed=='dressing')
    {?>
        <table>
        <tr>
           <th>Dimension</th>
           <th>Quantity</th>
           <th>Thickness</th>
       </tr>  
       <tr>
           <td>304.8cm x 121.92cm</td>
           <td>2</td>
           <td>12mm</td>
       </tr>
       <img src="images/dressing.jpg" style="position:relative; top:80px; left:200px; height:400px; width:400px;" alt="">
        </table>
    <?php }?>
<?php
}
?>

<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
   <!-- ----------------------Footer Section----------------------- -->
    
	

 <footer class="footer-distributed">

<div class="footer-left">
    <h3>MAHADEV<span>PLYWOOD</span></h3>

    <p class="footer-links">
    <!-- <p><a class="explore-link" href="index.php" style="color:black; text-decoration:none;"> <b>Home</b></a></p> -->
        <!-- <a href="#">Home</a> -->
        
        <!-- <a href="#">About</a> -->
        <p><a class="explore-link" href="product_page.php" style="color:black; text-decoration:none;"> <b>Products</b></a></p>
        
        <!-- <a href="#">Contact</a> -->
        <p><a class="explore-link" href="contact.php" style="color:black; text-decoration:none;">Contact Us <b></b></a></p>
        
        <!-- <a href="#">Blog</a>  -->
        <p><a class="explore-link" href="join_us.php" style="color:black; text-decoration:none;"> <b>Join Us</b></a></p> 
        <!-- <p><a class="explore-link" href="index.php"> <b>Home</b></a></p>
		
		<p><a class="explore-link" href="contact.php">Contact Us <b></b></a></p>
		<p><a class="explore-link" href="#"> <b>Join Us</b></a></p> -->
    </p>

    <p class="footer-company-name">Copyright © 2023 <strong>MAHADEV PLYWOOD</strong> All rights reserved</p>
</div>

<div class="footer-center">
    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>Rokadiya hanuman</span>
            Porbandar</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>+91 9313560787</p>
    </div>
    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:sagar00001.co@gmail.com">mahadevplywood@gmail.com</a></p>
    </div>
</div>
<div class="footer-right">
    <p class="footer-company-about">
        <span>About the Shop</span>If you're in need of plywood for your next project, look no further than our hardware shop. We offer a variety of grades, sizes, and thicknesses, along with all the hardware and tools you need to get the job done right.
       
    </p>
    <div class="footer-icons">

       
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
   <a href="#"><i class="fa fa-youtube"></i></a>
</div>

</footer>
</body>
</html>



