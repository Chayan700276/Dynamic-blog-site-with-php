<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
       
 

                    <?php 
                         if (!isset($_GET['delid']) || $_GET['delid']==NULL) {
                               header("Location:404.php");
                         }else{
                             $delid = $_GET['delid'];
                         }

 

                            $query = "DELETE FROM tbl_page WHERE id = $delid";
                            $delpage = $db->delete($query);
                            if ($delpage) {
                                echo "<script>alert('Page Deleted succesfully')</script>";
                                echo "<script>window.location='index.php'</script>";

                            }

                     ?>


 <?php include 'inc/footer.php'; ?>
