<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>

        <?php
        include 'connect.php';
        $sql = "SELECT * FROM feedback";
        $query = mysqli_query($conn, $sql); 
        while($raw = mysqli_fetch_assoc($query))
        {?>
            <tr>
                <td><?php echo $raw['UserName']?></td>
                <td><?php echo $raw['Email']?></td>
                <td><?php echo $raw['Message']?></td>
            </tr>
            <?php
        }
        ?>


    </table>
</body>
</html>