<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 

     $id = Session::get('userId');

 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User Profile</h2>            
                <div class="block">   

             <?php 
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $details = $_POST['details'];

                    $name = mysqli_real_escape_string($db->link, $name);
                    $username = mysqli_real_escape_string($db->link, $username);
                    $email = mysqli_real_escape_string($db->link, $email);
                    $details = mysqli_real_escape_string($db->link, $details);

                    if (empty($name) || empty($username) || empty($email) ||empty($details)) {
                        echo "<span class='error'>User Profile Field must not be emtpy </span>";
                    }else{
                      $query =" UPDATE tbl_user 
                              SET 
                              name='$name',
                              username='$username',
                              email='$email',
                              details='$details'

                              WHERE id=$id
                      ";
                      $result = $db->update($query);
                      if ($result) {
                         echo "<span class='success'>Profile Updated succefully </span>"; 
                      }else{
                         echo "<span class='error'>error..Profile Update failed </span>";
                      }
                    }
                }
              ?>





                <?php 

                $query = "SELECT * FROM tbl_user WHERE id=$id";
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
                                <input type="text" name="name" value="<?php echo $result['name'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result['username'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $result['email'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details"><?php echo $result['details'] ?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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