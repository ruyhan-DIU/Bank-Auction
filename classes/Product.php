<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helper/Format.php');
?>

<?php
class Product
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function productInsert($data, $files){
		$productName = $this->fm->validation($data['productName']);
		$catId = $this->fm->validation($data['catId']);
		$body = $this->fm->validation($data['body']);
		$bid_start_from = $this->fm->validation($data['bid_start_from']);
		$publish_date = $this->fm->validation($data['publish_date']);
		$end_date_time = $this->fm->validation($data['end_date_time']);

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['catId']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		$bid_start_from = mysqli_real_escape_string($this->db->link, $data['bid_start_from']);
		$publish_date = mysqli_real_escape_string($this->db->link, $data['publish_date']);
		$end_date_time = mysqli_real_escape_string($this->db->link, $data['end_date_time']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
   		 $file_name = $files['image']['name'];
   		 $file_size = $files['image']['size'];
    	 $file_temp = $files['image']['tmp_name'];

    	 $div = explode('.', $file_name);
   		 $file_ext = strtolower(end($div));
   		 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    	 $uploaded_image = "uploads/".$unique_image;


    	 $bankName = Session::get('bank_name');

    	 if ($productName == "" || $catId == 0 || $body == "" || $bid_start_from == "" || $publish_date == "" || $end_date_time == "") {
    	 	$msg = "<span class='error'>Fields Should not empty.</span>";
				return $msg;
    	 }
    	 elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) == false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }
    	 else{
	move_uploaded_file($file_temp, $uploaded_image);
	
	$randId = rand();
    $query = "INSERT INTO tbl_product(productName, catId, body, bid_start_from, image, publish_date, end_date_time, bank_name, rand_id) 
    VALUES('$productName','$catId','$body','$bid_start_from','$uploaded_image','$publish_date','$end_date_time','$bankName', '$randId')";
	$productinsert = $this->db->insert($query);

    $query2 = "insert into tbl_bid(productName,bid_start_from,name,email,phone,district,bid_data,bank_name, rand_id) VALUES ('$productName','$bid_start_from','0','0',0,'0',0,'$bankName', '$randId')";
    $forTableBid = $this->db->insert($query2);
			if ($productinsert) {
				$msg = "<span class='success'>Product Inserted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Inserted.</span>";
				return $msg;
			}
		}
		}
		public function getAllProduct(){
			$bankName = Session::get('bank_name');
		$query = "SELECT * FROM tbl_product JOIN tbl_category ON tbl_product.catId = tbl_category.catId where tbl_product.bank_name = '$bankName'";
		$result = $this->db->select($query);
		return $result;
		}
		public function getAllProduct2(){
		$query = "SELECT *
					FROM tbl_product
					ORDER BY productId DESC";
		$result = $this->db->select($query);
		return $result;
		}
		public function getAllProduct3(){
		$query = "SELECT *
					FROM tbl_product
					ORDER BY productId DESC LIMIT 9";
		$result = $this->db->select($query);
		return $result;
		}
		public function getSingleProduct($id){
				$query = "SELECT p.*, c.catName,b.bid_data
					FROM tbl_product as p, tbl_category as c,tbl_bid as b
					WHERE p.productName = b.productName AND  p.catId = c.catId AND p.productId = '$id'";
		$result = $this->db->select($query);

		return $result;
		}


		public function productByBank($id){
			$bankName = mysqli_real_escape_string($this->db->link, $id);
			$query = "SELECT tbl_product.*, bank_reg.bank_name
					FROM tbl_product
					JOIN bank_reg
					ON tbl_product.bank_name = bank_reg.bank_name 
		 			ORDER BY tbl_product.productId DESC";
		$result = $this->db->select($query);
		return $result;
		}

		public function getProductById($id) {
				$query = "SELECT *
					FROM tbl_product
					WHERE productId = '$id'";
		$result = $this->db->select($query);
		return $result;
		}

		public function productUpdate($data, $files, $id){
		$productName = $this->fm->validation($data['productName']);
		$catId = $this->fm->validation($data['catId']);
		$body = $this->fm->validation($data['body']);
		$bid_start_from = $this->fm->validation($data['bid_start_from']);
		$end_date_time = $this->fm->validation($data['end_date_time']);

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['catId']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		$bid_start_from = mysqli_real_escape_string($this->db->link, $data['bid_start_from']);
		$end_date_time = mysqli_real_escape_string($this->db->link, $data['end_date_time']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
   		 $file_name = $files['image']['name'];
   		 $file_size = $files['image']['size'];
    	 $file_temp = $files['image']['tmp_name'];

    	 $div = explode('.', $file_name);
   		 $file_ext = strtolower(end($div));
   		 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    	 $uploaded_image = "uploads/".$unique_image;

    	 if ($productName == "" || $catId == 0 || $body == "" || $bid_start_from == "" || $end_date_time == "") {
    	 	$msg = "<span class='error'>Fields Must Not Inserted.</span>";
				return $msg;
    	 } else {

    	 	if (!empty($file_name)) {

    	 if ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) == false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }
    	 else{
    move_uploaded_file($file_temp, $uploaded_image);

    $query = "UPDATE tbl_product
    			SET
    			productName = '$productName',
    			catId       = '$catId',
    			body        = '$body',
    			bid_start_from       = '$bid_start_from',
    			image       = '$uploaded_image',
    			publish_date = '$publish_date',
    			end_date_time = '$end_date_time'
    			WHERE productId = '$id'
    ";

    $productupdate = $this->db->update($query);
			if ($productupdate) {
				$msg = "<span class='success'>Product Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Updated.</span>";
				return $msg;
			}
		}
	} else{
    $query = "UPDATE tbl_product
    			SET
    			productName = '$productName',
    			catId       = '$catId',
    			body        = '$body',
    			bid_start_from       = '$bid_start_from',
    			end_date_time        = '$end_date_time'
    			WHERE productId = '$id'
    ";

    $productupdate = $this->db->update($query);
			if ($productupdate) {
				$msg = "<span class='success'>Product Updated Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Updated.</span>";
				return $msg;
			}
	}
		}
	}
public function delProductById($id){
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$getData = $this->db->select($query);
		if ($getData) {
			while ($delImg = $getData->fetch_assoc()) {
				$dellink = $delImg['image'];
				unlink($dellink);
			}
		}

		$delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
		$deldata = $this->db->delete($delquery);
		if ($deldata) {
				$msg = "<span class='success'>Product Deleted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Product Not Deleted.</span>";
				return $msg;
			}
	}

}
?>
