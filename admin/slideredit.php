<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if (!isset($_GET['pid']) && $_GET['sid']==NULL ) {
      echo "<script>window.location = 'postlist.php';</script>";
    }else{
      $sid = $_GET['sid'];
    }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Slider</h2>

                <?php 
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $title = $_POST['title'];
                        $title = mysqli_real_escape_string($db->link, $title);

                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        $permited  = array('jpg', 'jpeg', 'png', 'gif');

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "upload/slider/".$unique_image;

                     if($title ==""){
                       echo "<span class='error'>Title field must not be empty</span>";
                       }
                  elseif(!empty($file_name)){

                    if ($file_size >1048567) {
                         echo "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                     } elseif (in_array($file_ext, $permited) == false) {
                         echo "<span class='error'>You can upload only:-"
                         .implode(', ', $permited)."</span>";
                     } else{
                        
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query ="UPDATE `tbl_slider`
                                    SET
                                `title`  = '$title',
                                `image`  = '$uploaded_image'

                                WHERE `id`='$sid'
                        ";    
                        $postInsert = $db->update($query);
                        if($postInsert){
                            echo "<span class='success'>Slider Updated succesfully</span>";
                        }else{
                            echo "<span class='error'>error.. Slider Update failed</span>";
                        }       
                       }
                     } else{
                           $query ="UPDATE `tbl_slider`
                                    SET
                                `title`  = '$title'

                                WHERE `id`='$sid'
                        ";    
                        $postInsert = $db->update($query);
                        if($postInsert){
                            echo "<span class='success'>Slider Updated succesfully</span>";
                        }else{
                            echo "<span class='error'>error.. Slider Update failed</span>";
                        }

                    }


                    }
                 ?>
                <div class="block">   

                <?php 

                $pquery = "SELECT * FROM tbl_slider WHERE id = $sid";
                $slider = $db->select($pquery);
                if ($slider) {
                    while ($presult= $slider->fetch_assoc()) {
                    

                ?>    

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $presult['title'] ?>" class="medium" />
                            </td>
                        </tr>
                    
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $presult['image']; ?>" width="80px" height="50px">
                                <br>
                                 <input type="file" name="image" />
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