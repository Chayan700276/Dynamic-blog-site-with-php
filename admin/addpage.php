<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>

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
                        
                        $query ="INSERT INTO tbl_page (`name`,`body`)VALUES('$name','$body')";    
                        $pageInsert = $db->insert($query);
                        if($pageInsert){
                            echo "<span class='success'>Page Inserted succesfully</span>";
                        }else{
                            echo "<span class='error'>error.. Page insert failed</span>";
                        }       
                    }


                    }
                 ?>
                <div class="block">               
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter page name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
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