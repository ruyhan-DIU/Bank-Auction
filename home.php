<?php
session_start();
	if(!isset($_SESSION['email']))
	{
		header("location:customerlogin.php");
	}

include 'inc/header.php';
include 'navbar.php';
?>


<div class="main">
 <div class="clear"></div>
    <div class="content">
    	<div class="row section group">
	        <div class="col-lg-2 rightsidebar span_3_of_1">
				<h2>Banks</h2>
				<ul>
				<?php
					$getbank = $bank->getAlLBank();
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
	    		    <?php echo "        "?>
	    		       <h3>All Bank Products</h3>
	    		    </div>
    		        <div class="clear"></div>
	    	    </div>
		        <div class="row section group">
		      		<?php
						$getPd = $pd->getAllProduct2();
						if ($getPd) {
							while ($result = $getPd->fetch_assoc()) {
								
					?>
						<div class="col-lg-3 grid_1_of_4 images_1_of_4 cake_snippet_width">
							 <a href="preview.php?proid=<?php echo $result['productId']?>"><img src="Bank/<?php echo $result['image']?>" height="100px" width="100px" alt="" /></a>
							 <h3><?php echo $result['bank_name'];?> Bank</h3>
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
<br>
<br>
<br>
<?php include_once "inc/footer.php"  ?>