<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <?php 
	  	$query = "SELECT *FROM tbl_footer WHERE id=1";
	  	$copy = $db->select($query);
	  	if ($copy) {
	  		while ($result = $copy->fetch_assoc()) {
	  			
	   ?>
	  <p><?php echo $result['footer'] ?><?php echo date('Y') ?></p>
	  <?php }} ?>
	</div>
	<div class="fixedicon clear">
		 <?php 
			 	$query = "SELECT * FROM tbl_social WHERE id=1";
			 	$social = $db->select($query);
			 	if ($social) {
			 		while ($result = $social->fetch_assoc()) {
		  ?>
		<a href="<?php echo $result['fb'] ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['tw'] ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['ln'] ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['gp'] ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php }} ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>