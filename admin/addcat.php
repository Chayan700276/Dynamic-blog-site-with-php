<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

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
                      $query ="INSERT INTO tbl_category (`name`)VALUES('$catName')";
                      $result = $db->insert($query);
                      if ($result) {
                         echo "<span class='success'>Category Inserted succefully </span>"; 
                      }
                    }
                }
           ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
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