<html>
    <head>
    <style>

header {
	background-color: #333;
	color: #fff;
	padding: 20px;
	text-align: center;
	font-size: 24px;
}
header h1 {
	margin: 0;
	font-size: 36px;
	line-height: 1.5;
	text-transform: uppercase;
	letter-spacing: 3px;
}

section a {
	display: inline-block;
	background-color: #333;
	color: #fff;
	padding: 10px 20px;
	margin-right: 20px;
	text-decoration: none;
	transition: all 0.3s ease-in-out;
	font-size: 18px;
	text-transform: uppercase;
	letter-spacing: 2px;
}
section a:hover {
	background-color: #fff;
	color: #333;
	transform: translateY(-3px);
	box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

table {
	width: 100%;
	border-collapse: collapse;
	font-size: 18px;
	margin-top: 20px;
}
th, td {
	border: 1px solid #333;
	padding: 10px;
	text-align: center;
}
th {
	background-color: #333;
	color: #fff;
}
tr:nth-child(even) {
	background-color: #eee;
}
tr:hover {
	background-color: #ddd;
	animation: highlight 1s ease-in-out;
}
@keyframes highlight {
	0% {
		background-color: #ddd;
	}
	100% {
		background-color: #fff;
	}
}

</style>
    </head>
    <body>
        
	<?php

include 'connect.php';
if (isset($_GET['w_id'])) {
    $workerid = $_GET['w_id']; 
$sel = "SELECT * FROM `work_order` WHERE worker_id='$workerid'";
$qry = mysqli_query($conn,$sel);
$result= mysqli_fetch_assoc($qry);
}


        ?>
<!-- <h5>Approved </h5> -->
					
					
				
				
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
                                   include 'connect.php';
									$sql = "SELECT * FROM `work_order` WHERE order_status = 1 AND worker_id='$workerid'";
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
											echo "<span>Approved</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
						<section>
							<br>
							<a href="worker_dashboard.php"><i></i> Go Back</a>
						</section>
			
             
                    </body>
 </html>
	