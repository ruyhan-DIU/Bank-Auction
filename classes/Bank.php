<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helper/Format.php');
?>
<?php
class Bank
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	public function getAllBank(){
		$query = "SELECT * FROM bank_reg ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function checkbank($query){
		$result = $this->db->select($query);
		return $result;
	}

	public function getBankById($id){
			$query = "SELECT *
					FROM bank_reg
					WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
		}

}
?>