<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['wloggedin']) || $_SESSION['wloggedin']!=true)
{
    header("location: worker_login.php");
    exit;
}



if(isset($_GET['w_id']))
{
  $workerid = $_GET['w_id'];
}

if(isset($_POST['submit']))
{
  $extension = pathinfo($_FILES["doc"]["name"], PATHINFO_EXTENSION);
    if($extension=='jpg' || $extension=='jpeg' || $extension=='png')
    {

    

    $filename=$_FILES['doc']['name'];
    $tempname=$_FILES['doc']['tmp_name'];
    move_uploaded_file($tempname,'./uploads/'.$filename);


  $sql="INSERT INTO `media`(`w_id`, `doc`) VALUES ('$workerid','$filename')";
  $result=mysqli_query($conn,$sql);

  if($result)
  {
    echo'data inserted';
    header("location: add_image.php?w_id=$workerid");
  }
  else
  {
    echo'error';
  }
}
}




 

      
      

      ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title> Upload file </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

</head>
<body>

<?php

include 'connect.php';


if(isset($_GET['delid']))
{
    $delid=$_GET['delid'];

    $sql="DELETE FROM media WHERE img_id='".$delid."'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo"
        <script>
        alert('Photo Deleted Successfully');
        window.location.href='worker_dashboard.php';
        </script>
        ";
    }
    else
    {
        echo'error';
    }
}

?>


<div class="container mt-3">
  <h2>Image Upload</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
   
      <!-- <img src="uploads/<?php echo $editdata['doc'];?>" style="height:100px"> -->
      
      <input type="file" class="form-control"  required name="doc"></input>
    </div>
  
    <button type="submit" name="submit"class="btn btn-primary">Submit</button>
    <a href="worker_dashboard.php" class="btn btn-primary">Go Back</a>
  </form>
</div>
  
<div class="container mt-3">
  <h2>All Images</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Delete</th>
      </tr>
      <?php
      if(isset($_GET['w_id']))
      {
        $workerid = $_GET['w_id'];
      }
      $sql="SELECT * FROM `media` WHERE w_id='$workerid'";
      $result=mysqli_query($conn,$sql);

      while($data=mysqli_fetch_array($result))
      {?>
      <tr>
        <td><img src="uploads/<?php echo $data['doc'];?>"
      style="height:100px;"></td>
      <!-- <td><a href="edit.php?editid=<?php echo $data['id'];?>">Edit</a></td> -->
        <td onclick="return confirm('Are you sure you want delete this photo?')"><a class="btn btn-primary" style="background-color:#D11A2A; border-color:#D11A2A;" href="add_image.php?delid=<?php echo $data['img_id'];?>">Delete</a></td>
        <!-- <td>/td> -->
      </tr>
    <?php } ?>
    </thead>
    <tbody>
     
    </tbody>
  </table>