<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">


                    <?php 
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $title = $_POST['title'];
                        $slogan = $_POST['slogan'];

                        $title = mysqli_real_escape_string($db->link, $title);
                        $slogan = mysqli_real_escape_string($db->link, $slogan);

                        $file_name = $_FILES['logo']['name'];
                        $file_size = $_FILES['logo']['size'];
                        $file_temp = $_FILES['logo']['tmp_name'];
                        $permited  = array( 'png');

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $same_image = "logo".'.'.$file_ext;
                        $uploaded_image = "upload/".$same_image;

                     if($title =="" || $slogan ==""){
                       echo "<span class='error'>Title or Slogan must not be empty</span>";
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
                        $query ="UPDATE `title_slogan`
                                    SET
                                `title`    = '$title',
                                `slogan`  = '$slogan',
                                `logo`  = '$uploaded_image'
                                WHERE `id`='1'
                        ";    
                        $TSL = $db->update($query);
                        if($TSL){
                            echo "<span class='success'> T+S+L Updated succesfully</span>";
                        }else{
                            echo "<span class='error'>error.. T+S+L Update failed</span>";
                        }       
                       }
                     } else{
                           $query ="UPDATE `title_slogan`
                                    SET
                                `title`    = '$title',
                                `slogan`  = '$slogan'

                                WHERE `id`='1'
                        ";    
                        $TSL = $db->update($query);
                        if($TSL){
                            echo "<span class='success'>Title and Slogan Updated succesfully</span>";
                        }else{
                            echo "<span class='error'>error.. Title and Slogan Update failed</span>";
                        }

                    }


                    }
                 ?>





                 <?php 
                    $query = "SELECT * FROM title_slogan WHERE id = '1'";
                    $title_slogan = $db->select($query);
                    if ($title_slogan) {
                        while ($result= $title_slogan->fetch_assoc()) {

                 ?>  
                <div class="leftside">         
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'] ?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'] ?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo">
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
                 <div class="rightside">
                    <center> <img src="<?php echo $result['logo'] ?>" alt="logo"></center>
                 </div>
                 <?php }} ?>    
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>
<style>
.leftside{
 width: 70%;
 float:left;
}
.rightside{
width: 20%;
float: left;
border: 1px solid #ddd;
}
</style>