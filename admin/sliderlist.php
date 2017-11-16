<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                		<?php 
							if (isset($_GET['delid'])) {
								$sid = $_GET['delid'];

								$uquery = "SELECT * FROM tbl_slider WHERE id = $sid";
								$getData = $db->select($uquery);
								if ($getData) {
									while ($delImg = $getData->fetch_assoc()) {
										$dellink = $delImg['image'];
										unlink($dellink);
									}
								}

								$query ="DELETE FROM tbl_slider WHERE id=$sid";
								$delpost = $db->delete($query);
								if ($delpost) {
									echo "<span class='success'>Slider Deleted Success</span>";
								}else{
									echo "<span class='error'>error.. Slider Delete Failed</span>";
								}
							}
						 ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
						    <th>Serial No:</th>
							<th>Slider Title</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					  <?php 
					  		$query = "SELECT * FROM tbl_slider order by id desc";
					  		$slider = $db->select($query);
					  		if ($slider) {
					  			$i=0;
					  			while ($result= $slider->fetch_assoc()) {
					  			 $i++;
					   ?>
						<tr class="odd gradeX">
						    <td><?php echo $i ?></td>
							<td><?php echo $result['title'] ?></td>
							<td><img width="50px" height="30px" src="<?php echo $result['image'] ?>"></td>
							<td>

							<?php 
							      $chkid = Session::get('userId');
							      $query = "SELECT * FROM tbl_user WHERE id=$chkid";
							       $msg = $db->select($query);
							       if ($msg) {
							           while ($rresult =$msg->fetch_assoc()) {
							             if ($rresult['role']=='admin') {
							               
							            
  							 ?>

							<a href="slideredit.php?sid=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are u sure want 2 delete')" href="?delid=<?php echo $result['id'] ?>">Delete</a>
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
