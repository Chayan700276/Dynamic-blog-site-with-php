<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
				<?php 
					$query = "SELECT * FROM tbl_category";
					$Category= $db->select($query);
					if ($Category) {
						while ($result = $Category->fetch_assoc()) {
				 ?>
					<ul>
						<li><a href="postBycat.php?catId=<?php echo $result['id'] ?>"><?php echo $result['name'] ?></a></li>
						<?php }} else{?>
						<li>NO Category Created</li>
						<?php } ?>						
					</ul>

			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
					$query = "SELECT * FROM tbl_post order by id desc limit 5";
					$Lpost= $db->select($query);
					if ($Lpost) {
						while ($Lresult = $Lpost->fetch_assoc()) {
				 ?>
					<div class="popular clear">
						<h2><a href="post.php?id=<?php echo $Lresult['id'] ?>"><?php echo $Lresult['title'] ?></a>
						</h2>
						 <a href="post.php?id=<?php echo $Lresult['id']; ?>"><img src="admin/<?php echo $Lresult['image']; ?>" alt="post image"/></a>
						<p>
							<?php echo $fm->textShorten($Lresult['body'], 120) ?>
						</p>
						<div class="readmore clear">
							<a href="post.php?id=<?php echo $Lresult['id']; ?>">Read More</a>
						</div>
					</div>
					<?php }}else{header("Location:404.php");} ?>
	
			</div>
			
		</div>
