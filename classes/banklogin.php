<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helper/Format.php');
?>

<?php

class AdminLogin
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function adminLogin($bank_email, $password){
		$bank_email = $this->fm->validation($bank_email);
		$password = $this->fm->validation($password);

		$bank_email = mysqli_real_escape_string($this->db->link, $bank_email);
		$password = mysqli_real_escape_string($this->db->link, $password);

		if (empty($bank_email) || empty($password)) {
		$loginmsg = "Username or Password Must Not be Empty";
		return $loginmsg;
	} else{

		$query = "SELECT * FROM bank_reg WHERE bank_email = '$bank_email' AND password = '$password'";
		$result = $this->db->select($query);
		if ($result != false) {

			$query1 = "SELECT * FROM bank_reg WHERE bank_email = '$bank_email' AND password = '$password' AND status = '1'";
			$result1 = $this->db->select($query1);
				if($result1 != false)
					{
					$value = $result->fetch_assoc();
					Session::set("login", true);
					Session::set("id", $value['id']);
					Session::set("bank_name", $value['bank_name']);
					Session::set("bank_email", $value['bank_email']);
					Session::set("password", $value['password']);
					header("Location:login.php");
					}
				else
					{
						$loginmsg = "Account is Not active yet. Wait for Approval";
						return $loginmsg;
					}	

			
		}
		else{
			$loginmsg = "Username or Password Did Not Match";
		return $loginmsg;
		}
	}
	}
}
?>