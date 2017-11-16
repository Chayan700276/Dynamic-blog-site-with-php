<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>

                <?php 
                	if (isset($_GET['delid'])) {
                		$delid = $_GET['delid'];

                		$query = "DELETE FROM tbl_contact WHERE id = $delid";
                            $delmsg = $db->delete($query);
                            if ($delmsg) {
                               echo "<span class='success'>Message Deleted succesfully </span>";
                               }else{
                               echo "<span class='error'>error..Message not Delete </span>";
                               } 
                           }
                 ?>

                 	<?php 
                 		if (isset($_GET['unseenid'])) {
                		$unseenid = $_GET['unseenid'];


                		$query =" UPDATE tbl_contact  
                              SET 
                              status='0'
                              WHERE id=$unseenid
                      ";
                      $result = $db->update($query);
                      if ($result) {
                         echo "<span class='success'>Message sent into Inbox </span>"; 
                      }else{
                         echo "<span class='error'>error..Something went wrong </span>";
                      }
                	}

                 	 ?>

                <?php 
                	if (isset($_GET['seenid'])) {
                		$seenid = $_GET['seenid'];


                		$query =" UPDATE tbl_contact  
                              SET 
                              status='1'
                              WHERE id=$seenid
                      ";
                      $result = $db->update($query);
                      if ($result) {
                         echo "<span class='success'>Message sent into Seen box </span>"; 
                      }else{
                         echo "<span class='error'>error..Something went wrong </span>";
                      }
                	}
                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					 <?php 
							$query = "SELECT *FROM tbl_contact WHERE status=0 order by id desc";
							$contact = $db->select($query);
							if ($contact) {
								$i=0;
								while ($result =$contact->fetch_assoc()) {
								$i++;	
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['firstname']; ?> <?php echo $result['lastname'] ?></td>
							<td><?php echo $result['email'] ?></td>
							<td><?php echo $fm->textShorten($result['body'], 50) ?></td>
							<td><?php echo $fm->formatdate($result['date']) ?></td>
							<td>
							  <a href="viewmsg.php?conid=<?php echo $result['id']?>">View</a> || 
							  <a href="reply.php?rid=<?php echo $result['id']?>">Reply</a>|| 
							   <a onclick ="return confirm('Are you Sure')" href="?seenid=<?php echo $result['id']?>">Seen</a>  
							 </td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
               </div>
               </div>
               </div>
               <div class="grid_10">
               <div class="box round first grid">
                <h2>Seen message</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					 <?php 
							$query = "SELECT *FROM tbl_contact WHERE status=1 order by id desc";
							$contact = $db->select($query);
							if ($contact) {
								$i=0;
								while ($result =$contact->fetch_assoc()) {
								$i++;	
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['firstname']; ?> <?php echo $result['lastname'] ?></td>
							<td><?php echo $result['email'] ?></td>
							<td><?php echo $fm->textShorten($result['body'], 50) ?></td>
							<td><?php echo $fm->formatdate($result['date']) ?></td>
							<td> 
							    <a href="viewmsg.php?conid=<?php echo $result['id']?>">View</a>||
							   <a onclick="return confirm('Are you sure sent to inbox ')" href="?unseenid=<?php echo $result['id']?>">Unseen</a>|| 
							   <a onclick="return confirm('Are you sure want to delete')" href="?delid=<?php echo $result['id']?>">Delete</a> 
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
