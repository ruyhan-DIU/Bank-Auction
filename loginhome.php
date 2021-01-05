<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("location:customerlogin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>

<div class="navbar">
  <a href="loginhome.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Logout 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="logout.php">logout</a>
    </div>
  </div> 
</div>

</body>
</html>


