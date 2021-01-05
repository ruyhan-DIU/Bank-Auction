<?php
	$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
$db = new Database();
	
		$B_name = $_POST['B_name'];
		$phone = $_POST['phone'];
		$swiftcode = $_POST['swiftcode'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$img = $_POST['img'];

		$test=$db->select("select bank_email from bank_reg where bank_email='$email'");


		if($test)
		{
			echo "<script> alert('Email is Already Exist. Try Anoter Email') </script>";
			
		}
		else
		{
			$result = $db->insert("INSERT into bank_reg(bank_name,customer_care_name,swift_code,head_office_address,logo,bank_email,password) VALUES('$B_name','$phone','$swiftcode','$address','$img','$email','$password')");
		
			if($result)
			{
				echo '<script type="text/javascript">'; 
				echo 'alert("Successfully Registered");'; 
				echo 'window.location.href = "bank_registration.php";';
				echo '</script>';
			}
			else
			{
				echo '<script type="text/javascript">'; 
				echo 'alert("Failed Try Again");'; 
				echo 'window.location.href = "bank_registration.php";';
				echo '</script>';
			}
		}
	
	
?>