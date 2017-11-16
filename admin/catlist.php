<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">

                    <?php 
                    	if (isset($_GET['catId'])) {
                    		$catId = $_GET['catId'];

                    		$query = "DELETE FROM tbl_category WHERE id=$catId";
                    		$delcat =$db->delete($query);
                    		if ($delcat) {
                    			echo "<span class='success'>Category Deleted succefully </span>";
                    		}else{
                    			echo "<span class='error'>Category Delete Failed </span>";
                    		}
                    	}
                     ?>
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT *FROM tbl_category order by id desc";
							$Category = $db->select($query);
							if ($Category) {
								$i=0;
								while ($result =$Category->fetch_assoc()) {
								$i++;	
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['name'] ?></td>
							<td><a href="catedit.php?catId=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are you sure wnat to delete');" href="?catId=<?php echo $result['id'] ?>">Delete</a></td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();
       });
    </script>
    <?php include 'inc/footer.php'; ?>