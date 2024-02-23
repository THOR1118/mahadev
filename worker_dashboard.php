<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['wloggedin']) || $_SESSION['wloggedin']!=true)
{
    header("location: worker_login.php");
    exit;
}
else
{

$sel = "SELECT * FROM `worker` WHERE `email`='$_SESSION[emailid]'";
$query = mysqli_query($conn,$sel);
$result = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/worker_dashboard.css?v=<?php echo time();?>">  
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">


	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Worker Dashboard</title>
	<link rel="stylesheet"
		href="style.css">
	<link rel="stylesheet"
		href="responsive.css">
</head>

<body>


	<!-- for header part -->
	<header>

		<div class="logosec">
			<div class="logo">Worker Dashboard</div>
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
		</div>

        <div class="searchbar">
            <h2><?php echo "Welcome ".$result['worker_name'];?></h2>
              </div>
        </div>

			<div class="dp">
			<img src="./worker_img/<?php echo $result['worker_img'];?>"
					class="dpicn"
					alt="workerdp">
			</div>
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1">
                    <img src="images/user.png"
							class="nav-img"
							alt="blog">
							<a style="text-decoration:none; color:black;" href="worker_dashboard.php">
						<h3> Profile</h3>
                         </a>
					</div>

					<div class="option2 nav-option">
						<img src="images/reset.png"
							class="nav-img"
							alt="articles">
                            <a style="text-decoration:none; color:black;" href="sendemail_worker.php">
						<h3> Reset Password</h3>
                          </a>
					</div>

					<div class="nav-option option3">
						<img src="images/order.png"
							class="nav-img"
							alt="report">
							<?php
							$sel = "SELECT * FROM `worker` WHERE `email`='$_SESSION[emailid]'";
							$res = mysqli_query($conn,$sel);
							while($row=mysqli_fetch_assoc($res))
							{
								$workerid = $row['worker_id'];
								$workername = $row['worker_name'];             
								$emailid = $row['email'];
								$adress = $row['worker_address'];
								$mobileno = $row['mobile_number'];
								$typesofworker = $row['type_of_work'];
								$workexperience = $row['Work_Experience'];
								$workerimg = $row['worker_img'];
							}
							?>
                            <a style="text-decoration:none; color:black;" href="work_order.php?w_id=<?php echo $workerid; ?>">
							<!-- <a href='re.php?w_id=<?php echo $workerid; ?>'>Request</a> -->
						<h3> View work order</h3>
                            </a>
					</div>

					<div class="nav-option logout">
					<img src="images/add-image.png"
							class="nav-img"
							alt="logout">
                            <a style="text-decoration:none; color:black;" href="add_image.php?w_id=<?php echo $workerid ?>">
						<h3>Add Image</h3>
                        </a>
					</div>
					<div class="nav-option option4">
						<img src="images/delete.png"
							class="nav-img"
							alt="institution">
                            <form action="worker_delete.php" method="POST" onclick="return confirm('Are you sure you want to Delete your Account <?php echo $workername;?>?')">
                    <input  type="hidden" name="id" value="<?php echo $emailid?>">
                    <input type="submit" name="delete" value="Delete Account" class="btn">
                </form>
						<!-- <h3> Delete Account</h3> -->
					</div>
					

					<div class="nav-option logout">
					<!-- <i class="fa fa-sign-out" aria-hidden="true"></i> -->
						<img src="images/logout.png"
							class="nav-img"
							alt="logout">
                            <a style="text-decoration:none; color:black;" href="worker_logout.php">
						<h3>Logout</h3>
                        </a>
					</div>

				</div>
			</nav>
		</div>

		
				<div class="main">
        <h2>My Profile</h2>
        <div class="card">
            <div class="card-body">
                <a href="update_worker_profile.php?update_worker_profile">
                <i class="fa fa-pen fa-xs edit" style="color:black;"></i>
                </a>
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $result['worker_name'];?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['email'];?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $result['worker_address'];?></td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>:</td>
                            <td><?php echo $result['mobile_number'];?></td>
                        </tr>
						<tr>
                            <td>Type Of Work</td>
                            <td>:</td>
                            <td><?php echo $result['type_of_work'];?></td>
                        </tr>
						<tr>
                            <td>Work Experience</td>
                            <td>:</td>
                            <td><?php echo $result['Work_Experience'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

	<script src="./index.js"></script>
</body>
</html>
<script>
let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click",()=>
{
	nav.classList.toggle("navclose");
})
</script>
