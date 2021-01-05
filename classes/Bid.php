<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helper/Format.php');
?>
<?php

class Bid{


	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

		public function getAllBidProduct(){
			$bankName = Session::get('bank_name');
			$query = "SELECT * FROM tbl_bid where bank_name= '$bankName'";
		$result = $this->db->select($query);
		return $result;
		}
	}
	
?>