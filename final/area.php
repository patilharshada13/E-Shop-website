<?php

$con=mysqli_connect('localhost','root','','task3');


if(mysqli_connect_error()){
    echo "<script>alert('can not connect to data base');</script>";
    exit();
}

$query="SELECT * FROM panel where story='area'";
        $result=mysqli_query($con,$query);
    
        
         
           
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local Story</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
  header.sticky-header {
    position: -webkit-sticky; 
    position:fixed;
    top: 0;
    background-color:black;
    color: white;
    padding: 10px 0;
    /* text-align: center; */
    z-index: 1000;
    /* height:5%; */
    width: 100%;
    
}
header.sticky-header a img{
  width:2%;
  height:7%;
  margin-left:2%;
}


  .carousel-item img {
  width: 70%;
  height: 600px; /* Set a fixed height for the images */
  object-fit: cover; /* Ensure the images cover the area without distortion */
}

</style>

</head>
<body style="background-color:black;">

<header class="sticky-header">
  <a href="main.php"><img src="icons8-left-arrow-80.png"></a>
</header>
  
      <div class="carousel-item active my-5 px-5"> 
        <?php 
            while($row_fetch=mysqli_fetch_assoc($result))
            {
        echo"<img src='$row_fetch[profile]' class='d-block w-100'> <br><br>br><br>";
            }?>
       
      </div>
</body>
</html>