<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>

                     <?php 
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $copyright = $fm->validation($_POST['copyright']);

                        $copyright = mysqli_real_escape_string($db->link, $copyright);


                     if($copyright ==""){
                       echo "<span class='error'>copyright field must not be empty</span>";
                       }
                     else{ 
                        $query ="UPDATE `tbl_footer`
                                    SET
                                `footer`    = '$copyright'
                                WHERE `id`='1'
                        ";    
                        $copy = $db->update($query);
                        if($copy){
                            echo "<span class='success'> copyright Updated succesfully</span>";
                        }else{
                            echo "<span class='error'>error.. copyright Update failed</span>";
                        }       
                       }
                     } 
                 ?>

                <div class="block copyblock"> 
                 <?php 
                    $query = "SELECT * FROM tbl_footer WHERE id = 1";
                    $copyright = $db->select($query);
                    if ($copyright) {
                        while ($result = $copyright->fetch_assoc()) {
                           
                 ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['footer']; ?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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
<?php include 'inc/footer.php'; ?>