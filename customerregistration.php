<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Registration</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>

    
   <div class="navbar">
  <a href="customerlogin.php">Customer Login</a>
  <a href="Bank/login.php">Bank Login</a>
</div>


<center>
<h1>Bank Auction Customer Registration</h1>
<!------ Include the above in your HEAD tag ---------->
</center>
<div class="container">

    <div class="row">
      <form role="form" action="customerregistration.php" method="POST">
        <div class="col-md-6 col">
            <div class="card">
            <h3>Personal Info</h3>
            
            <input type="text" placeholder="Enter Full Name" name="name" class="form-control" required="">
<br>
    <select name="gender" class="form-control" required> 
     <option value="">Select Gender</option>
     <option value = "Male" >Male</option>
     <option value = "Female">Female</option>
   </select>
   <br>

   <select name="religion" required="" class="form-control"> 
     <option value="">Select Religion</option>
     <option value = "Islam" >Islam</option>
     <option value = "Hindu">Hindu</option>
     <option value = "Christian">Christian</option>
   </select>
   <br>

    <input type="phone" placeholder="Enter Your Phone Number" name="phone" class="form-control" required="">
<br>
     <select name="district" required="" class="form-control"> 
     <option value="">Select District</option>
     <option value = "Barguna" >Barguna</option>
     <option value = "Barisal">Barisal</option>
     <option value = "Bhola">Bhola</option>
     <option value = "Jhalokati">Jhalokati</option>
     <option value = "Patuakhali ">Patuakhali </option>
     <option value = "Pirojpur ">Pirojpur </option>
     <option value = "Bandarban ">Bandarban </option>
     <option value = "Brahmanbaria ">Brahmanbaria </option>
     <option value = "Chandpur ">Chandpur </option>
     <option value = "Chittagong ">Chittagong </option>
     <option value = "Comilla ">Comilla </option>
     <option value = "Dhaka ">Dhaka </option>
     <option value = "Cox's Bazar">Cox's Bazar</option>
     <option value = "Feni ">Feni </option>
     <option value = "Khagrachhari ">Khagrachhari </option>
     <option value = "Lakshmipur ">Lakshmipur </option>
     <option value = "Noakhali ">Noakhali </option>
     <option value = "Rangamati ">Rangamati </option>
     <option value = "Faridpur ">Faridpur </option>
     <option value = "Gazipur ">Gazipur </option>
     <option value = "Gopalganj ">Gopalganj </option>
     <option value = "Kishoreganj ">Kishoreganj </option>
     <option value = "Madaripur ">Madaripur </option>
     <option value = "Manikganj ">Manikganj </option>
     <option value = "Munshiganj ">Munshiganj </option>
     <option value = "Narayanganj ">Narayanganj </option>
     <option value = "Narsingdi ">Narsingdi </option>
     <option value = "Rajbari ">Rajbari </option>
     <option value = "Shariatpur ">Shariatpur </option>
     <option value = "Tangail ">Tangail </option>
     <option value = "Bagerhat ">Bagerhat </option>
     <option value = "Chuadanga ">Chuadanga </option>
     <option value = "Jessore ">Jessore </option>
     <option value = "Jhenaidah">Jhenaidah </option>
     <option value = "Khulna ">Khulna </option>
     <option value = "Kushtia ">Kushtia </option>
     <option value = "Magura ">Magura </option>
     <option value = "Meherpur ">Meherpur </option>
     <option value = "Narail ">Narail </option>
     <option value = "Satkhira ">Satkhira </option>
     <option value = "Jamalpur ">Jamalpur </option>
     <option value = "Mymensingh ">Mymensingh </option>
     <option value = "Netrokona ">Netrokona </option>
     <option value = "Sherpur ">Sherpur </option>
     <option value = "Bogra ">Bogra </option>
     <option value = "Joypurhat ">Joypurhat </option>
     <option value = "Naogaon ">Naogaon </option>
     <option value = "Natore ">Natore </option>
     <option value = "Chapai Nawabganj ">Chapai Nawabganj </option>
     <option value = "Pabna ">Pabna </option>
     <option value = "Rajshahi ">Rajshahi </option>
     <option value = "Sirajganj ">Sirajganj </option>
     <option value = "Dinajpur ">Dinajpur </option>
     <option value = "Gaibandha ">Gaibandha </option>
     <option value = "Kurigram ">Kurigram </option>
     <option value = "Lalmonirhat ">Lalmonirhat </option>
     <option value = "Nilphamari ">Nilphamari </option>
     <option value = "Panchagarh ">Panchagarh </option>
     <option value = "Rangpur ">Rangpur </option>
     <option value = "Thakurgaon ">Thakurgaon </option>
     <option value = "Habiganj ">Habiganj </option>
     <option value = "Moulvibazar ">Moulvibazar </option>
     <option value = "Sunamganj ">Sunamganj </option>
     <option value = "Sylhet ">Sylhet </option>
   </select>
  <br>
  <input type="number" placeholder="Enter Zip-Code" name="zipcode" class="form-control" required="">
<br>
    <input type="text" placeholder="Enter Your Address" name="address" class="form-control" required="">
    <br>
    <input type="number" placeholder="Enter Your NID/PASSPORT Number" name="nid_passport" class="form-control" required="">
<br>
    <select name="occupation" required="" class="form-control"> 
     <option value="">Select Occupation</option>
     <option value = "Businessman" >Businessman</option>
     <option value = "Job Holder">Job Holder</option>
   </select>
<br>

<input type="number" placeholder="Enter Your Anual Income" name="anual_income" class="form-control" required="">
<br>
     </div>
       </div>

        <div class="col-md-6 col">
            <div class="card">

 <h3>Create Password</h3>
    <input type="email" placeholder="Enter Email" name="email" class="form-control" required="">
        <br>
    <input type="password" placeholder="Create New Password" name="password" class="form-control" required="">
        <br>

               </div>
       </div>

   </div>

        <br>
        <center>

            <label>Note: All information I provided in this form is true</label>
            <br>
            <br>
            <input type="submit" class="btn btn-default" name="submit" value="Agree & Signup">
        </center>
    </form>
 
    <br>
        <br>


    </body>
</html>
<br>
<br>
<?php include_once "inc/footer.php"  ?>


<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/lib/Database.php');
$db = new Database();

   if(isset($_POST['submit'])){
        $name=$_POST['name'];
       $gender=$_POST['gender'];
       $religion=$_POST['religion'];
       $phone=$_POST['phone'];
       $district=$_POST['district'];
       $zipcode = $_POST['zipcode'];
       $address =$_POST['address'];
        $nid_passport  =$_POST['nid_passport'];
         $occupation =$_POST['occupation'];
          $anual_income =$_POST['anual_income'];
               $email =$_POST['email'];
                $password =$_POST['password'];

       $res = $db->insert("insert into customerreg(name,gender,religion,phone,district,zipcode,address,nid_passport,occupation,anual_income,email,password) values('$name','$gender','$religion','$phone','$district', '$zipcode','$address','$nid_passport','$occupation','$anual_income','$email','$password')");
  

       if($res){
           echo '<script type="text/javascript">'; 
          echo 'alert("Succesfully Registered");'; 
          echo 'window.location.href = "customerregistration.php";';
          echo '</script>';
       }
       else{
           echo '<script type="text/javascript">'; 
          echo 'alert("Your email already registered");'; 
          echo 'window.location.href = "customerregistration.php";';
          echo '</script>';
       }

   }

?>


<style>
    
 * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 38px;
  text-align: center;
  background-color: #f1f1f1;
  margin-top: 10px;
}

</style>




