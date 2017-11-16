<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if (!isset($_GET['conid']) && $_GET['conid']==NULL ) {
      echo "<script>window.location = 'inbox.php';</script>";
    }else{
      $conid = $_GET['conid'];
    }
 ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>View message</h2>
                <div class="block">

	            <?php 
	              $query = "SELECT * FROM tbl_contact WHERE id=$conid";
	              $contact  = $db->select($query);
	              if ($contact) {
	                while ($result = $contact->fetch_assoc()) {
	            ?>
                  
                 <form>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input readonly="" type="text" name="fb" value="<?php echo $result['firstname'] ?> <?php echo $result['lastname'] ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input readonly="" type="text" name="tw" value="<?php echo $result['email'] ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Message</label>
                            </td>
                           <td>
                                <textarea readonly="" class="tinymce" name="body"><?php echo $result['body'] ?></textarea>
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input readonly="" type="text" name="gp" value="<?php echo $fm->formatdate($result['date']) ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        	<td></td>
                        	<td><span  class="ok"><a href="inbox.php">Ok</a></span></td>
                        </tr>
                    </table>
                   </form>
                   <?php }} ?>
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
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    <style>
     
 .ok{
    border: 1px solid #ddd;
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 4px 10px;


 }

 </style>