<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if (!isset($_GET['rid']) && $_GET['rid']==NULL ) {
      echo "<script>window.location = 'inbox.php';</script>";
    }else{
      $conid = $_GET['rid'];
    }
 ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>View message</h2>
                <div class="block">


                 <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $to =$fm->validation($_POST['to']);
                        $from =$fm->validation(md5($_POST['from']));
                        $subject =$fm->validation(md5($_POST['subject']));
                        $msg =$fm->validation(md5($_POST['msg']));
   
                        $sendmail =mail($to, $subject, $msg,$from);
                        if ($sendmail) {
                             echo "<span class='success'> Mail sended succesfully</span>";
                        }else{
                            echo "<span class='error'>Something Went wrong</span>";
                        }

                      }
                      ?>


	            <?php 
	              $query = "SELECT * FROM tbl_contact WHERE id=$conid";
	              $contact  = $db->select($query);
	              if ($contact) {
	                while ($result = $contact->fetch_assoc()) {
	            ?>
                  
                 <form action="" method="POST">
                    <table class="form">					
						 <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly name="to" value="<?php echo $result['email'] ?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="from" placeholder="Enter your email address" class="medium" />
                            </td>
                        </tr>
					     <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Enter your subject" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Message</label>
                            </td>
                           <td>
                                <textarea readonly="" class="tinymce" name="msg"></textarea>
                            </td>
                        </tr>
                        <tr>
                        	<td></td>
                        	<td>
                               <input type="submit" name="submit" value="Send">   
                            </td>
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
