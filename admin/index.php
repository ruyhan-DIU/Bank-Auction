<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("location:adminlogin.php");
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
  <div class="dropdown">
    <button class="dropbtn">Logout
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="logout.php">logout</a>
    </div>
  </div> 
</div>


<?php
  require ('DB_conn.php');
  $result = mysqli_query($conn,"select * from bank_reg")
 ?>

 <table border="1" id="bank">
   <tr>
     <th>Bank Name</th>
     <th>Swift Code</th>
     <th>Bank Email</th>
     <th>Current Status</th>
     <th>Change Status</th>

   </tr>
   <?php 

   while ($row=mysqli_fetch_assoc($result)) {
    
    ?>

   <tr>
     <td><?php echo $row['bank_name']; ?></td>
     <td><?php echo $row['swift_code']; ?></td>
     <td><?php echo $row['bank_email']; ?></td>
     <td>
       <?php  
       if ($row['status']==1) {
         echo "<p id=str".$row['id'].">Active</p>";

       }
       else{

        echo "<p id=str".$row['id'].">Deactive</p>";
       }

       ?>

     </td>
     <td>
       <select onchange="active_deactive_user(this.value,<?php echo $row['id']; ?>)">

        <option value="1">Active</option>
        <option value="0">Deactive</option>
         
       </select>

     </td>

   </tr>

   <?php  

 }?>

 </table>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
  function active_deactive_user(val,id){
    $.ajax({
        type : 'post',
        url : 'change.php',
        data: {val:val,id:id},
        success: function(result){
          if (result==1){
            $('#str'+id).html('Active');
          }
          else{
             $('#str'+id).html('Deactive');
          }
        }


    })
  }

</script>
</html>


<style type="text/css">

  #bank {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
  th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

td,th,select {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}


</style>


