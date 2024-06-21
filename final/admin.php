<?php

$con=mysqli_connect('localhost','root','','task3');


if(mysqli_connect_error()){
    echo "<script>alert('can not connect to data base');</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

</head>
<body>
   <div class="container">
    <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add User</a>
</button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Srno</th>
      <th scope="col">Story</th>
      <th scope="col">Profile</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
  
  $query="SELECT * FROM panel";
        $result=mysqli_query($con,$query);
        while($row_fetch=mysqli_fetch_assoc($result))
        {
            $srno=$row_fetch['srno'];
            echo"
            <tr>
            <td>$row_fetch[srno]</td>
            <td>$row_fetch[story]</td>
            
            <td><img src='$row_fetch[profile]' width='150px'></td>
            <td>
            <button class='btn btn-primary' ><a href='update.php? updateid=".$srno."' class='text-light'>Update</a></button>
            <button class='btn btn-danger'><a href='delete.php? deleteid=".$srno."' class='text-light'>Delete</a></button>
            </td>
            
            </tr>";
        }
  ?>  
  
  </tbody>
</table>
   </div> 
</body>
</html>