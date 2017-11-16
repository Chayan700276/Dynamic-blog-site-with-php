<?php include 'inc/header.php'; ?>

<?php 
	if (!isset($_GET['id']) || $_GET['id']==NULL) {
		header("Location:404.php");
	}else{
		$id = $_GET['id'];
	}
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

				<?php 
					$query = "SELECT * FROM tbl_post WHERE id=$id";
					$post = $db->select($query);
					if ($post) {
						while ($result = $post->fetch_assoc()) {
							
				 ?>
				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>, By
				     <a href="#"><?php echo $result['author']; ?>
				     </a></h4>
				<img src="admin/<?php echo $result['image']; ?>" alt="post image"/>
				<p><?php echo $result['body']; ?></p>

				 <div class="relatedpost clear">
				 <h2>Related articles</h2>
				 <?php 
				    $catId = $result['cat']; 
					$query = "SELECT * FROM tbl_post WHERE cat=$catId order by rand() limit 2";
					$relatedpost =$db->select($query);
					if ($relatedpost) {
						while ($relateresult=$relatedpost->fetch_assoc()) {
							
				 ?>

					<a href="post.php?id=<?php echo $relateresult['id']; ?>"><img src="admin/<?php echo $relateresult['image']; ?>" alt="post image"/></a>
					<?php }}else{echo "NO related Post";} ?>
				</div>

				<?php }}else{header("Location:404.php");} ?>
	</div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

	<?php include 'inc/footer.php'; ?>