<?php

$con=mysqli_connect('localhost','root','','task3');

if(mysqli_connect_error()){
    echo "<script>alert('can not connect to data base');</script>";
    exit();
}
if(isset($_POST['submit']))
{
    $img_loc=$_FILES['profile']['tmp_name'];
   $img_name=$_FILES['profile']['name'];
    $story=$_POST['story'];
    $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);

    $img_des=$img_name;

   if(($img_ext!='jpg')&&($img_ext!='png')&&($img_ext!='jpeg')&&($img_ext!='webp'))
   {
    echo"<script>alert('Invalid image extention !');</script>";
    exit();
   }


   $query="INSERT INTO panel(story,profile) VALUES ('$story','$img_des')";
   if(mysqli_query($con,$query))
   {
    move_uploaded_file($img_loc,$img_des);
    
    echo"<script>alert('Successful');</script>";
    header("location:admin.php");
   }
   else
   {
    echo"<script>alert('Un-successful');</script>";
   }



}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>admin Panel</title>

    <style>
        input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}


button[type=submit] {
  background-color: black;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}


button[type=submit]:hover {
  background-color: #45a049;
}


.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
    </style>
  </head>
  <body>
 <div class="container my-5">
 <form method="POST" enctype="multipart/form-data">



    <label>Story</label>
    <select name="story">
      <option value="local">Local</option>
      <option value="area">Area</option>
      <option value="shop">Shop</option>
      <option value="promotion">Promotion</option>
    </select>

    

    <label>Select An Image</label><br><br>
    <input type="file" name="profile"><br><br><br>

    <button type="submit" name="submit">Submit</button>

  </form>
 </div>

    
  </body>
</html>

