<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<?php 
	if (!isset($_GET['catId']) || $_GET['catId']==NULL) {
		header("Location:404.php");
	}else{
		$id = $_GET['catId'];
	}
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		     <!--pagination-->
			 <?php 

			   	$query = "SELECT * FROM tbl_post WHERE cat= $id";
			   	$post  =$db->select($query); 
			   	 if ($post) {
			   	 	while ($result = $post->fetch_assoc()) {

			    ?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a>
				</h2>
				 <h4><?php echo $fm->formatDate($result['date']); ?>, By
				     <a href=""><?php echo $result['author']; ?></a>
				  </h4>
				 <a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
				<p>
					<?php echo $fm->textShorten($result['body']); ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>
		<?php }?><!-- end of while loop-->

		<?php }else{;?>
			<p>No Post Available in this Category</p>
		<?php } ?>
		</div> 
		<?php include 'inc/sidebar.php'; ?>
	</div>

	<?php include 'inc/footer.php'; ?>