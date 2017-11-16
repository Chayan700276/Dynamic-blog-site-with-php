<?php include '../lib/session.php'; 
	Session::checkLogin();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php 
				$fm = new Format();
			   	$db = new Database();
 ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

			<?php 
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$username =$fm->validation($_POST['username']);
					$password =$fm->validation(md5($_POST['password']));

					$username = mysqli_real_escape_string($db->link, $username);
					$password = mysqli_real_escape_string($db->link, $password);

					$query = "SELECT * FROM tbl_user WHERE username='$username' AND
					 password = '$password'";
					 $result = $db->select($query);
					 if ($result !=false) {
					 	$value = $result->fetch_assoc();
					 		Session::set("login",true);
					 		echo Session::set("username",$value['username']);
					 		echo Session::set("userId",$value['id']);
					 		header("Location:index.php");
					  }else{
					 	echo "<span style='color:red;font-size:18px'>Username or password not match</span>";
					 }
				}
			 ?>

		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required=""  name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required=""  name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="passrecovery.php">Forgot Password!</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Blog site admin login</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>