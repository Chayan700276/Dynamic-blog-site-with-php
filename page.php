<?php include 'inc/header.php'; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
	       <?php 
            if (!isset($_GET['pageid']) || $_GET['pageid']==NULL) {
            		header("Location:404.php");
            }else{
                $id = $_GET['pageid'];
            }

         ?>
           <?php 

             $query ="SELECT * FROM tbl_page WHERE `id` ='$id'";
             $page=$db->select($query);
             if ($page) {
             while ($result= $page->fetch_assoc()) {?>
               
             		<p style="font-size: 30px;" class="name"><?php echo $result['name'] ?></p>

             <?php	echo $result['body'];
             }}
             ?>
	      
	</div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <p>&copy; Copyright Training with live project.</p>
	</div>
	<div class="fixedicon clear">
		<a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
		<a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
	</div>
</body>
</html>
<style>
.name{
	font-size: 50px;
	color: green;
	width: 200px;
	border-bottom: 1px solid #ddd;
}
