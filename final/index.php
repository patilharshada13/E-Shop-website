<?php

$con=mysqli_connect('localhost','root','','task3');
session_start();

if(mysqli_connect_error()){
    echo "<script>alert('can not connect to data base');</script>";
    exit();
}

if(isset($_POST['submit']))
{
  $query="INSERT INTO ee_shop(district,taluka) VALUES ('$_POST[district]','$_POST[taluka]')";
 
  if(mysqli_query($con,$query))
  {
           $_SESSION['taluka']=$_POST['taluka'];
           echo "<script>
            window.location.href = 'main.php';
          </script>";
                
                }
                else
                {

                    echo"
                    <script>
                      alert('Server Down !');
                      window.location.href = 'index.php';
                    </script>
                "; 
                }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enter District and Taluka</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
    }

    form{
        margin-left:10px;
     margin-right:10px;
    }

    .container {
      text-align: center;
      width: 90%;
      max-width: 400px;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding-right: 1px;
    }

    button {
      width: 100%;
      padding: 15px;
      font-size: 18px;
      color: white;
      background-color: #28a745;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 20px;
    }

    button:hover {
      background-color: #218838;
    }
  </style>
</head>

<body>
    <form method="post" action="index.php">
  <div class="container">
    <h1>Enter District and Taluka</h1>
    <div>
      <label for="district">District:</label>
      <input type="text" name="district" placeholder="Enter District">
    </div>
    <div>
      <label for="taluka">Taluka:</label>
      <input type="text" name="taluka" placeholder="Enter Taluka">
    </div>
    <button name="submit">Submit</button>
  </div>
</form>
</body>

</html>