<?php

require('DB_conn.php');
$query = mysqli_query($conn, "update bank_reg set status='".$_POST['val']."' where id='".$_POST['id']."' ");

if ($query) {
	
	$q = mysqli_query($conn, "select * from bank_reg where id = '".$_POST['id']."'");

	$data = mysqli_fetch_assoc($query);
	echo $data["status"];
}




 ?>