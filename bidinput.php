<?php  

	session_start();
	if(!isset($_SESSION['email']))
	{
		header("location:customerlogin.php");
	}
	include 'inc/header.php';


if(isset($_POST['submit']))
	{
		$productName = $_POST['productName'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$district = $_POST['district'];

		$bidAmount = $_POST['bidAmount'];
		

		$test2 = $db->select("select bid_start_from from tbl_product");
				foreach($test2 as $res2){
    $bid_start_from= $res2 ['bid_start_from'];  
    }



		$test=$db->select("select productName,bid_start_from,bid_data from tbl_bid");
		foreach($test as $res){
    $productNameH= $res ['productName']; 
    $bidAmountH= $res ['bid_data']; 
    $bid_start_from=$res ['bid_start_from'];
    }

		
		if(!isset($productNameH))
			{
				$db->insert("insert into tbl_bid (productName,name,email,phone,district,bid_data) values ('$productName','$name','$email','$phone','$district','$bidAmount')");
				echo '<script>';
				echo 'alert("BID SUCCESSFULLY");';
				echo 'window.location.href = "preview.php?proid='.$_POST['proid'].'";';
				echo '</script>';

		}

		elseif(strcmp("productName","productNameH") && $bidAmountH<$bidAmount && $bid_start_from<$bidAmount){
			$db->update("update tbl_bid set productName ='$productName',name = '$name',email = '$email',phone = '$phone',district = '$district',bid_data = '$bidAmount'  where productName ='$productName'");
			 	echo '<script>';
				echo 'alert("BID SUCCESSFULLY");';
				echo 'window.location.href = "preview.php?proid='.$_POST['proid'].'";';
				echo '</script>';

		
		}
		else{
       			 echo '<script>';
				echo 'alert("Amount Should be greater than product or last Bid amount");';
				echo 'window.location.href = "preview.php?proid='.$_POST['proid'].'";';
				echo '</script>';
				




		}

	}

?>



