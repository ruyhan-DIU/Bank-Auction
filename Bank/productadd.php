<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?>
<?php

include '../classes/Product.php';
?>
<?php
    $pd = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertProduct = $pd->productInsert($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">  
        <?php
               if (isset($insertProduct)) {
                   echo $insertProduct;
               }
               ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Auction Product Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Auction Product Name..." class="medium" />
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
                            <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Product Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Bid Starting Price</label>
                    </td>
                    <td>
                        <input type="number" name="bid_start_from" placeholder="Enter Starting Price BDT" class="medium" />
                    </td>
                </tr>
            <tr>
                    <td>
                        <label>Product Publish date(Today)</label>
                    </td>
                    <td>
                        <script>
                            $(function(){
                        var dtToday = new Date();
    
                        var month = dtToday.getMonth() + 1;
                        var day = dtToday.getDate();
                        var year = dtToday.getFullYear();
                        if(month < 10)
                        month = '0' + month.toString();
                        if(day < 10)
                        day = '0' + day.toString();
    
                        var minDate= year + '-' + month + '-' + day;
    
                        $('#txtDate').attr('min', minDate);
                        });
                        </script>
                        <input type="date" id="txtDate" name="publish_date" class="medium" />
                    </td>
                </tr>
                   <tr>
                    <td>
                        <label>Bid End Date & Time</label>
                    </td>
                    <td>
                        

                        <input type="datetime-local"  name="end_date_time"  class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


