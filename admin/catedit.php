<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if (!isset($_GET['catId']) && $_GET['catId']==NULL ) {
      echo "<script>window.location = 'catlist.php';</script>";
    }else{
      $catId = $_GET['catId'];
    }
 ?>

        <div class="grid_10">	
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               <?php 
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $catName = $_POST['catName'];
                    $catName = mysqli_real_escape_string($db->link, $catName);

                    if (empty($catName)) {
                        echo "<span class='error'>Category Field must not be emtpy </span>";
                    }else{
                      $query =" UPDATE tbl_category 
                              SET 
                              name='$catName'
                              WHERE id=$catId
                      ";
                      $result = $db->update($query);
                      if ($result) {
                         echo "<span class='success'>Category Updated succefully </span>"; 
                      }else{
                         echo "<span class='error'>error..Category Update failed </span>";
                      }
                    }
                }
           ?>

           <?php 
              $query = "SELECT * FROM tbl_category WHERE id=$catId";
              $cat  = $db->select($query);
              if ($cat) {
                while ($result = $cat->fetch_assoc()) {
            ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['name'] ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="UPDATE" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
      <?php include 'inc/footer.php'; ?>