<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

  <?php 
      $chkid = Session::get('userId');
      $query = "SELECT * FROM tbl_user WHERE id=$chkid";
       $msg = $db->select($query);
       if ($msg) {
           while ($result =$msg->fetch_assoc()) {
             if ($result['role']!=='admin') {
                echo "<script>window.location='index.php'</script>";
             }}}
   ?>

        <div class="grid_10">	
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
               <?php 
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $role     = $_POST['role'];
                    $email     = $_POST['email'];

                    
                    $username = mysqli_real_escape_string($db->link, $username);
                    $password = mysqli_real_escape_string($db->link, $password);
                    $email = mysqli_real_escape_string($db->link, $email);
                    $role = mysqli_real_escape_string($db->link, $role);

                    if (empty($username) || empty($password) || empty($role) || empty($email )) {
                        echo "<span class='error'>User Field must not be emtpy </span>";
                    }else{

                      $query = "SELECT * FROM tbl_user WHERE email = '$email'";
                      $mailChk =$db->select($query);
                      if ($mailChk !=false) {
                         echo "<span class='error'>Email Already exits! </span>";
                      }else{

                      $query ="INSERT INTO tbl_user (`username`,`password`,`email`,`role`)VALUES('$username','$password','$email','$role')";
                      $result = $db->insert($query);
                      if ($result) {
                         echo "<span class='success'>User Data inserted succefully </span>"; 
                      }
                      }
                    }
                }
           ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                               <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                               <label>Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter Password" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label>E-mail</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Email" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label>User Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                  <option>Select Role</option>
                                  <option value="admin">Admin</option>
                                  <option value="author">Author</option>
                                  <option value="editor">Editor</option>
                                </select>
                            </td>
                        </tr>
						            <tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
      <?php include 'inc/footer.php'; ?>