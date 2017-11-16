<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if (!isset($_GET['pid']) && $_GET['pid']==NULL ) {
      echo "<script>window.location = 'postlist.php';</script>";
    }else{
      $pid = $_GET['pid'];
    }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View Post</h2>
                <div class="block"> 
                <?php 
                	if ($_SERVER['REQUEST_METHOD']=='POST') {
                		echo "<script>window.location='postlist.php'</script>";
                	}
                 ?>  

                <?php 

                $pquery = "SELECT * FROM tbl_post WHERE id = $pid";
                $post = $db->select($pquery);
                if ($post) {
                    while ($presult= $post->fetch_assoc()) {
                    

                ?>    

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" readonly name="title" value="<?php echo $presult['title'] ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select readonly id="select" name="cat">
                                <option>Select Category</option>
                              <?php 
                                $query = "SELECT * FROM tbl_category";
                                $Category = $db->select($query);
                                if ($Category) {
                                    while ($result = $Category->fetch_assoc()) {
                                        
                               ?>
                                    <option 
                                       <?php 
                                            if ($presult['cat']==$result['id']) {?>
                                                selected= "selected";
                                  <?php   } ?>

                                    value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                <?php }} ?>
                            </select>
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $presult['body'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input readonly type="text" name="tags" value="<?php echo $presult['tags'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input readonly type="text" name="author" value="<?php echo $presult['author'] ?>" />
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