<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include_once '../helper/Format.php';?>
<?php
  $pd = new Product();
  $fm = new Format();
?>

<?php
    if(isset($_GET['delpro'])){
    	 $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
    	$delPro = $pd->delProductById($id);
    }
    ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block"> 
          <?php
               if (isset($delPro)) {
                   echo $delPro;
               }
               ?>        
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Description</th>
					<th>Bid Start from</th>
					<th>Publish Date</th>
					<th>End Date&Time</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$getPd = $pd->getAllProduct();
						if ($getPd) {
							$i = 0;
							while ($result = $getPd->fetch_assoc()) {
								$i++;
					?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['catName']?></td>
					<td><?php echo $fm->textShorten($result['body'],50)?></td>
					<td>BDT<?php echo $result['bid_start_from']?></td>
					<td><?php echo $result['publish_date']?></td>
					<td><?php echo $result['end_date_time']?></td>
					<td><img src="<?php echo $result['image']?>" height="40px" width="60px"/></td>
					<td><a href="productedit.php?productId=<?php echo $result['productId']?>">Edit</a> || 
							<a onclick="return confirm('Are You Sure?')" href="?delpro=<?php echo $result['productId']?>">Delete</a></td>
						</tr>
				</tr>
				<?php } } ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
