<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    $Chkid = Session::get('userId') ;
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">

                    <?php 
                    	if (isset($_GET['delid'])) {
                    		$delid = $_GET['delid'];

                    		$query = "DELETE FROM tbl_user WHERE id=$delid";
                    		$deluser =$db->delete($query);
                    		if ($deluser) {
                    			echo "<span class='success'>User Deleted succefully </span>";
                    		}else{
                    			echo "<span class='error'>User Delete Failed </span>";
                    		}
                    	}
                     ?>
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
                            <th>Username</th>
							<th>Email</th>
                            <th>Role</th>
                            <th>Details</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT *FROM tbl_user order by id desc";
							$user = $db->select($query);
							if ($user) {
								$i=0;
								while ($result =$user->fetch_assoc()) {
								$i++;	
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['name'] ?></td>
                            <td><?php echo $result['username'] ?></td>
                            <td><?php echo $result['email'] ?></td>
                            <td><?php echo $result['role'] ?></td>
                            <td><?php echo $fm->textShorten($result['details'] , 40) ?></td>
							<td><a href="viewuser.php?uid=<?php echo $result['id'] ?>">View User</a>  

                            <?php 
                              $query = "SELECT * FROM tbl_user WHERE id=$Chkid";
                               $msg = $db->select($query);
                               if ($msg) {
                                   while ($result =$msg->fetch_assoc()) {
                                     if ($result['role']=='admin') {
                                
                              ?>
                            ||<a onclick="return confirm('Are you sure wnat to delete');" href="?delid=<?php echo $result['id'] ?>">Delete
                            </a>
                            <?php }}} ?>
                            </td>
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