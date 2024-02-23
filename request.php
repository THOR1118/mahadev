<?php
  include 'connect.php';
  if (isset($_GET['user_id'])) 
  {
    $user_id = $_GET['user_id'];
  }
  session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: workerlogin.php");
    exit;
}

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="workorder.css?v=<?php echo time();?>"> 
    <title>Your Request</title>
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
  margin-top:10px;
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
input[type="submit"] {
  background-color: green;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

input[type="submit"]:hover {
  background-color: green;
  transform: scale(1.1);
}

input[type="submit"]:active {
  transform: translateY(3px);
}


</style>




  </head>
<body>


<table id="customers">
<thead>
  <tr>
    <th>Order ID</th>
    <th>Worker Name</th>
    <th>Worker Email</th>
    <th>Request Info.</th>
    <th>Date</th>
    <th>Worker MobileNumber</th>
    <th>Status</th>
  </tr>
  </thead>
                    <tbody>
                   
                     <?php
                     include 'connect.php'; 
  $sel = "SELECT * FROM `work_order` WHERE `user_id`=$user_id";
  $qry = mysqli_query($conn,$sel);
  while($row=mysqli_fetch_array($qry))
                     {
                      $id = $row['order_id'];
                      $name = $row['worker_name'];
                      $email = $row['worker_email']; 
                      $info = $row['Request_Info']; 
                      $date = $row['Date_of_order'];
                      $number = $row['worker_number'];
                      echo "
                      <tr>
                  <td>$id</td>
                  <td>$name</td>
							 		<td>$email</td>
							 		<td>$info</td>
							 		<td>$date</td>
							 		<td>$number</td>";
                  ?>
                  <?php
                  if ($row['order_status'] == 1) {
                    echo "<td>Approved</td>"; 
                  }
                    else
                    {
                    echo "<td>Pending</td>"; 
                    }
                  
                  
                  }
                  ?>
                  </td>
                     
                    </tbody>
                </table>


                <section>
							<a href="user_profilenew.php"><i></i> Go Back</a>
                </section>

    
</body>
</html>

