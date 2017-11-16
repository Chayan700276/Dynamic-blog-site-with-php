<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

        <div class="grid_10">	
            <div class="box round first grid">
                <h2>Change Theme</h2>
               <div class="block copyblock"> 
                <?php 
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                     $theme = $_POST['theme'];

                      $query =" UPDATE tbl_theme 
                              SET 
                              name = '$theme'
                              WHERE id=1
                      ";
                      $uptheme = $db->update($query);
                      if ($uptheme) {
                         echo "<span class='success'>Theme Changed succefully </span>"; 
                      }else{
                         echo "<span class='error'>error..Theme Changed failed </span>";
                      }
                    }
           ?>

              <?php 
              	$query = "SELECT * FROM tbl_theme WHERE id=1";
              	$theme = $db->select($query);
              	if ($theme) {
              		while ($result = $theme->fetch_assoc()) {
              			
               ?>
                 <form action="" method="POST">
                    <table class="form">    				
                        <tr>
                            <td>
                                <input <?php if ($result['name']=='default') { echo "checked";}?>	 type="radio" name="theme" value="default" />Default
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['name']=='green') { echo "checked";}?> type="radio" name="theme" value="green" />Green
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change Theme" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
      <?php include 'inc/footer.php'; ?>