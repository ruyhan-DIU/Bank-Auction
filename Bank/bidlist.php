<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Bid.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Product Name</th>
							<th>User Name</th>
							<th>User Email</th>
							<th>User Phone</th>
							<th>User District</th>
							<th>Last Bid Amount</th>
							<th>Status</th>
							<th>Take Action</th>

						</tr>
					</thead>
					<tbody>
					<?php
						$bd = new Bid();
						$getBid = $bd->getAllBidProduct();
						if ($getBid) {
							$i=0;
							while ($result = $getBid->fetch_assoc()) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['phone'];?></td>
							<td><?php echo $result['district'];?></td>
							<td><?php echo $result['bid_data'];?></td>
							<td>
     <?php  
       if ($result['declare_sold']==1) {
         echo "<p id=str".$result['id'].">Sold</p>";

       }
       else{

        echo "<p id=str".$result['id'].">Pending</p>";
       }

       ?>

     </td>
     <td>
       <select id="select" onchange="sold(this.value,<?php echo $result['id']; ?>)">

        <option>Take Action</option>
        <option value="1">Sold</option>
        <option value="0">Pending</option>
         
       </select>

     </td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>


<script type="text/javascript">
  function sold(val,id){
    $.ajax({
        type : 'post',
        url : 'sold_declare.php',
        data: {val:val,id:id},
        success: function(result){
          if (result==1){
            $('#str'+id).html('Sold');
          }
          else if(result==0){
             $('#str'+id).html('Pending');
          }
        }


    })
  }

</script>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
