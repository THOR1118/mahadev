<?php
include 'connect.php';

	if (isset($_POST['approve'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE `work_order` SET order_status='1' WHERE order_id = '$appid'";
		$run = mysqli_query($conn,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Application Approved');
					window.open('worker_dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
	
 ?>