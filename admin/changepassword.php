<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php $uid =Session::get('userId') ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block">  

                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $oldpass = md5($fm->validation($_POST['oldpass']));
                        $newpass = md5($fm->validation($_POST['newpass']));
                        $conpass = md5($fm->validation($_POST['conpass']));

                        $oldpass = mysqli_real_escape_string($db->link, $oldpass);
                        $newpass = mysqli_real_escape_string($db->link, $newpass);
                        $conpass = mysqli_real_escape_string($db->link, $conpass);

                        if (empty($oldpass) || empty($newpass) || empty($conpass)) {
                            echo "<span style='color:red;font-size:18px'>Password Field must not be empty </span>";
                        }else{

                            $query = "SELECT * FROM tbl_user WHERE id = $uid";
                            $pass = $db->select($query);
                            if ($pass) {
                                while ($result = $pass->fetch_assoc()) {
                                    $sel_oldpass =$result['password'];
                                }
                            }

                                if ($sel_oldpass == $oldpass) {
                                        if ($newpass == $conpass) {
                                            
                                            $query = "UPDATE tbl_user 
                                                            SET 
                                                         password = '$conpass'
                                                         WHERE id = $uid
                                            ";
                                            $changepass = $db->update($query);
                                            if ($changepass) {
                                                 echo "<span style='green:red;font-size:18px'>Password Changed Successfully </span>";
                                            }

                                        }else{
                                            echo "<span style='color:red;font-size:18px'>New and Confirm Password not match! </span>";
                                        }
                                    
                                }else{
                                    echo "<span style='color:red;font-size:18px'>Invalid old Password </span>";
                                }
                          }
                    }
                 ?>

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="oldpass" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirm Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Confirm Password..." name="conpass" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>
