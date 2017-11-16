<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">

           <?php 
            if (!isset($_GET['pageid']) || $_GET['pageid']==NULL) {
                    header("Location:404.php");
            }else{
                $id = $_GET['pageid'];
            }

         ?>
		
            <div class="box round first grid">
                <h2>Edit Page</h2>

                <?php 
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $name = $_POST['name'];
                        $body = $_POST['body'];

                        $name = mysqli_real_escape_string($db->link, $name);
                        $body = mysqli_real_escape_string($db->link, $body);


                     if($name =="" || $body ==""){
                       echo "<span class='error'>Page field must not be empty</span>";
                       }
                   else{
                        
                        $query ="UPDATE `tbl_page` 
                                SET 
                              `name`='$name',
                              `body`='$body'
                                WHERE `id` = '$id'
                        ";    
                        $pageupdate = $db->update($query);
                        if($pageupdate){
                            echo "<span class='success'>Page updated succesfully</span>";
                        }else{
                            echo "<span class='error'>error.. Page update failed</span>";
                        }       
                    }


                    }
                 ?>
                <div class="block">  

                     <?php 

                        $query ="SELECT * FROM tbl_page WHERE `id` ='$id'";
                        $page=$db->select($query);
                        if ($page) {
                            while ($result= $page->fetch_assoc()) {

                     ?>

                 <form action="" method="POST" enctype="multipart/form-data">
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $result['body'] ?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span  class="delete"><a onclick="return confirm('Are u sure');" href="delpage.php?delid=<?php echo $result['id'] ?>">Delete</a></span>
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

 <style>
     
 .delete{
    border: 1px solid #ddd;
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 4px 10px;
    margin-left: 10px;

 }

 </style>