<?php
  include 'connect.php';
  session_start();
if(!isset($_SESSION['wloggedin']) || $_SESSION['wloggedin']!=true)
{
    header("location: workerlogin.php");
    exit;
}

if (isset($_GET['w_id'])) {
		$workerid = $_GET['w_id']; 
  $sel = "SELECT * FROM `work_order` WHERE worker_id='$workerid'";
  $qry = mysqli_query($conn,$sel);
  $result= mysqli_fetch_assoc($qry);
	}


  

?>
<head>
<link rel="stylesheet" href="css/workorder.css?v=<?php echo time();?>">
</head>

<body>
	
	<!--This Is Header-->
	<header>
		
					<h1><i></i> Work Order</h1>
			
	</header>
	<br>
	
	<section >
		
				
					<a href="pending.php?w_id=<?php echo $workerid?>" ><i></i> Pending </a> &nbsp &nbsp
				
					<a href="approve.php?w_id=<?php echo $workerid?>"><i></i> Approved</a>
					<a href="worker_dashboard.php"><i></i> Go Back</a>
				
	
	</section>
	
	
	<section >
		
			<table >
							<thead>
                                <th>Sr No.</th>
								<th>Name</th>
								<th>Email</th>
								<th>RequestInfo</th>
								<th>Date</th>
								<th>Address</th>
								<th>Mb no</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM work_order WHERE worker_id='$workerid'";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
										
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
                                    <td><?php echo $result['Customername']; ?></td>
							 		<td><?php echo $result['Email']; ?></td>
							 		<td><?php echo $result['Request_Info']; ?></td>
							 		<td><?php echo $result['Date_of_order']; ?></td>
							 		<td><?php echo $result['customer_address']; ?></td>
							 		<td><?php echo $result['Mb_no']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['order_status'] == 0) {
											echo "<span>Pending</span>";
							 			}
							 			else{
											echo "<span >Approved</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>
								
							 </tbody>
						</table>
			
	</section>
	
	
	
	
	
						
  
</body>
</html>


