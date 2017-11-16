<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 

     if (!isset($_GET['uid']) || $_GET['uid']==NULL) {
         echo "<script>window.location='userlist.php'</script>";
     }else{
        $uid = $_GET['uid'];
     }

 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User Profile</h2>            
                <div class="block">   

             <?php 
                if ($_SERVER['REQUEST_METHOD']=='POST') {

                   echo "<script>window.location='userlist.php'</script>";
                }
              ?>





                <?php 

                $query = "SELECT * FROM tbl_user WHERE id=$uid";
                $getUser = $db->select($query);
                if ($getUser) {
                    while ($result= $getUser->fetch_assoc()) {
                    

                ?>    

                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly="" name="name" value="<?php echo $result['name'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" readonly="" name="username" value="<?php echo $result['username'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly="" name="email" value="<?php echo $result['email'] ?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <input type="text" readonly="" name="role" value="<?php echo $result['role'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" readonly="" name="details"><?php echo $result['details'] ?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
 <?php include 'inc/footer.php'; ?>