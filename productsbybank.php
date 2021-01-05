<?php
include 'inc/header.php';
include 'navbar.php';
?>
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
	echo "<script>window.location = '404.php'; </script>";
}else{
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['id']);
}
?>
<div class="main">
    <div class="content">
    	<div class="row section group">
	        <div class="col-lg-2 rightsidebar span_3_of_1">
				<h2>BANKS</h2>
				<ul>
				<?php
					$getbank = $bank->getAllBank();
					if ($getbank) {
						while ($result = $getbank->fetch_assoc()) {
				?>
			      <li><a href="productsbybank.php?id=<?php echo $result['id']?>"><?php echo $result['bank_name']?></a></li>
			      <?php } } ?>
				</ul>    
            </div>
            <div class="col-lg-8">
            	<div class="content">
	    		    <div class="heading">
	    		    <?php
					$getbank = $bank->getBankById($id);
					if ($getbank) {
						while ($result = $getbank->fetch_assoc()) {
				?>
	    		       <h3 href="productsbybank.php?id=<?php echo $result['id']?>">All Products From <?php echo $result['bank_name']?> Bank </h3>
	    		       <?php } } ?>
	    		    </div>
    		        <div class="clear"></div>
	    	    </div>
		        <div class="row section group">
		      		<?php
						$getPdB = $pd->productByBank($id);
						if ($getPdB) {
							while ($result = $getPdB->fetch_assoc()) {
							
					?>
						<div class="col-lg-3 grid_1_of_4 images_1_of_4 cake_snippet_width">
							 <a href="preview.php?proid=<?php echo $result['productId']?>"><img src="Bank/<?php echo $result['image']?>" height="100px" width="100px" alt="" /></a>
							 <h2><?php echo $result['bank_name'];?> Bank </h2>
							 <h2><?php echo $result['productName'];?> </h2>
							 <p>Bid start from<span class="bid_start_from"><?php echo $result['bid_start_from'];?> BDT/-</span></p>
						     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']?>" class="details">Details</a></span></div>
						</div>
				    <?php } } ?>
	            </div>
            </div>
        </div>
    </div>
</div>

<style>
	
	.heading{
	float:left;
	margin-right:10%;
}
.heading h3{
	font-family: 'Monda', sans-serif;
	font-size:40px;
	color:#090909;
	text-transform:uppercase;
	padding-top: 3%;
}
</style>