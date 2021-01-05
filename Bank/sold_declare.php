<?php

require('DB_conn.php');
$query = mysqli_query($conn, "update tbl_bid set declare_sold='".$_POST['val']."' where id='".$_POST['id']."' ");

if ($query) {
	
	$q = mysqli_query($conn, "select * from tbl_bid where id = '".$_POST['id']."'");

	$data = mysqli_fetch_assoc($query);
	echo $data["declare_sold"];
}




 ?>