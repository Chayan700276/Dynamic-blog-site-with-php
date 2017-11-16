<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                		<?php 
							if (isset($_GET['delid'])) {
								$pid = $_GET['delid'];

								$uquery = "SELECT * FROM tbl_post WHERE id = $pid";
								$getData = $db->select($uquery);
								if ($getData) {
									while ($delImg = $getData->fetch_assoc()) {
										$dellink = $delImg['image'];
										unlink($dellink);
									}
								}

								$query ="DELETE FROM tbl_post WHERE id=$pid";
								$delpost = $db->delete($query);
								if ($delpost) {
									echo "<span class='success'>Post Deleted Success</span>";
								}else{
									echo "<span class='error'>Post Deleted Failed</span>";
								}
							}
						 ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Post Title</th>
							<th>Description</th>
							<th>Tags</th>
							<th>Author</th>
							<th>Date</th>
							<th>Category</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					  <?php 
					  		$query = "SELECT * FROM tbl_post order by id desc";
					  		$post = $db->select($query);
					  		if ($post) {
					  			while ($result= $post->fetch_assoc()) {
					  				
					   ?>
						<tr class="odd gradeX">
							<td><?php echo $result['title'] ?></td>
							<td><?php echo $fm->textShorten($result['body'], 50) ?></td>
							<td><?php echo $result['tags'] ?></td>
							<td><?php echo $result['author'] ?></td>
							<td><?php echo $result['date'] ?></td>
							<td>
							  <?php
							    $catId = $result['cat'];
							    $query= "SELECT * FROM tbl_category WHERE id=$catId";
							    $cat =$db->select($query);
							    if ($cat) {
							    	while ($cresult =$cat->fetch_assoc()) { 
							    		
							    	echo $cresult['name'];
							   
						    }}  ?>	
							</td>
							<td><img width="50px" height="30px" src="<?php echo $result['image'] ?>"></td>
							<td>
							<a href="viewpost.php?pid=<?php echo $result['id'] ?>">View</a>

							<?php 
							      $chkid = Session::get('userId');
							      $query = "SELECT * FROM tbl_user WHERE id=$chkid";
							       $msg = $db->select($query);
							       if ($msg) {
							           while ($rresult =$msg->fetch_assoc()) {
							             if ($rresult['role']=='admin' || $chkid== $result['userid']) {
							               
							            
  							 ?>

							||<a href="postedit.php?pid=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are u sure want 2 delete')" href="?delid=<?php echo $result['id'] ?>">Delete</a>
							<?php }}} ?>

							</td>
						</tr>
						<?php }} ?>
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
    <?php include 'inc/footer.php'; ?>
