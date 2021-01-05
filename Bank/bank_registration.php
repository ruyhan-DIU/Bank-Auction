<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank Registration</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/home.css">

</head>

<body>

    
   <div class="navbar">
  <a href="../home.php">Customer Login</a>
  <a href="login.php">Bank Login</a>
</div>


<center>
<h1>Bank Registration</h1>
<!------ Include the above in your HEAD tag ---------->
</center>
<div class="container">

    <div class="row">
        <form role="form" action="bank_registration.php" method="POST">
        	<div class="col-md-6 col">
		            <div class="card">
		        	  <center>  <h3>Bank Info</h3></center>
		           
		            <input type="text" placeholder="Enter Bank Name" id="B_name" class="form-control" required>
					<br>
		  

		   			 <input type="phone" placeholder="Enter Customer Care Number" id="phone" class="form-control" required>
					 <br>
		     
		 			 <input type="number" placeholder="Enter SWIFT Code" id="swiftcode" class="form-control" required>
					<br>
		  		    <input type="text" placeholder="Enter Head Office Address" id="address" class="form-control" required>
					<br>
                    
                    <img id="preview" style="width:70px;" src="images/noimage.png" required/><br><br>
		 			<form>
                          
                          <div class="custom-file">
                            <input class="custom-file-input form-control" type="file" onchange="showMyImage(this,'preview')"  id="imgURL"/><br>
                            
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                          </div>
                    </form>

                </div>
                    </div>

                <div class="col-md-6 col">
                    <div class="card">
                        <center>  <h3>Create user account</h3></center>
                   
					<input type="email" placeholder="Enter Bank Official Email" id="email" class="form-control" required="">
					<br>
					<input type="password" placeholder="Create New Password" id="password" class="form-control" required="">
					<br>
			


		            </div>
                    </div>
       
         </div>
                <br>
		        <center>
		            <br>
		            <br>
		            <input type="button" class="btn btn-default" id="add" value="Agree & Signup">

              </div>
		            
		        </center>
               

        </form>


	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript">


    	function showMyImage(fileInput,id) {
            
            console.log(fileInput);
            
            var files = fileInput.files;
            console.log(files);
            for (var i = 0; i < files.length; i++) {           
                    var file = files[i];
                    var imageType = /image.*/;     
                    if (!file.type.match(imageType)) {
                        continue;
                    }           
                    var img=document.getElementById(""+id);            
                    img.file = file;    
                    var reader = new FileReader();
                    reader.onload = (function(aImg) { 
                        return function(e) { 
                            aImg.src = e.target.result; 
                        }; 
                    })(img);
                    reader.readAsDataURL(file);
                }    
        }

        
        $(document).ready(function(){
            
            $('#add').click(function(){
                
                var B_name = $('#B_name').val();
                var phone = $('#phone').val();
                var swiftcode = $('#swiftcode').val();
                var address = $('#address').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var img = $('#preview').attr('src');

                $.ajax({
                    url:"AddAction.php",
                    type:"POST",
                    data: {B_name : B_name, phone : phone, swiftcode : swiftcode, address : address, email : email, password : password, img : img },
                    success: function(data){
                        
                        if(data == 'success'){ 
                            var B_name = $('#B_name').val('');
                            var phone = $('#phone').val('');
                            var swiftcode = $('#swiftcode').val('');
                            var address = $('#address').val('');
							var email = $('#email').val('');
							var password = $('#password').val('');
						    window.alert("Succesfully Registered");
						    console.log("data");
                        }
                        else{
                           window.alert("Succesfully Registered");
                        }
                    }
                })
            })
        
        })
        
    </script>

				  
    

   

 
    <br>
        <br>

    </body>
</html>





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


<br>
<br>
<?php include_once "inc/footer2.php"  ?>