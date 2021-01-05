<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?>
<?php
include '../classes/Product.php';
?><?php
if (!isset($_GET['productId']) || $_GET['productId'] == NULL) {
    echo "<script>window.location = 'productlist.php'; </script>";
}else{
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['productId']);
}
?>
<?php
    $pd = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateProduct = $pd->productUpdate($_POST, $_FILES, $id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block">  
        <?php
               if (isset($updateProduct)) {
                   echo $updateProduct;
               }
               ?>   

               <?php
                    $getpro = $pd->getProductById($id);
                    if ($getpro) {
                        while ($value = $getpro->fetch_assoc()) {
                ?>

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Auction Product Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Product Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                            ?>
                            <option
                            <?php 
                                if ($value['catId'] == $result['catId']) { ?>
                                    selected = "selected";
                            <?php  } ?>
                             value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Product Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo $value['body']; ?>
                            </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Bid Starting Price</label>
                    </td>
                    <td>
                        <input type="text" name="bid_start_from" value="<?php echo $value['bid_start_from'];?>" class="medium" />
                    </td>
                </tr>
            <tr>
                    <td>
                        <label>Product Publish date</label>
                    </td>
                    <td>
                      <lebel><?php echo $value['publish_date'];?></lebel>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Bid End Date & Time</label>
                    </td>
                    <td>
                        <input type="datetime-local" name="end_date_time" value="<?php echo $value['end_date_time'];?>" class="medium" />
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image']?>" height="80px" width="200px"/><br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
             <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


