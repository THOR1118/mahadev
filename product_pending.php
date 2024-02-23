<?php
include 'connect.php';

	if (isset($_POST['approve'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE `user_info` SET status='1' WHERE id = '$appid'";
		$run = mysqli_query($conn,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Order Delivered');
					window.open('all_user_orders.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Delivered');
			</script>";
		}
	}
	
 ?>