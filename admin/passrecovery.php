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
<title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

			<?php 
				if ($_SERVER['REQUEST_METHOD']=='POST') {
						$email =$fm->validation($_POST['email']);
						$email = mysqli_real_escape_string($db->link, $email);

						if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	                	 echo "<span style='color:red;font-size:18px'>Invalid email Address</span>";
	                	}else{

						$query = "SELECT * FROM tbl_user WHERE email = '$email'";
	                    $mailChk =$db->select($query);
						 if ($mailChk !=false) {
						 	while ( $value = $mailChk->fetch_assoc()) {
						 		$userId   = $value['id'];
						 		$username = $value['username'];	
						 	}

						 	$text = substr($email, 0,3);
						 	$rand = rand(10000,99999);
						 	$newpass = "$text$rand";
						 	$password = md5($newpass);

						 	$upquery =" UPDATE tbl_user
                              SET 
                              password='$password'
                              WHERE id=$userId ";
                              $upresult = $db->update($query);
                              $to       = "$email";
                              $from     ="chayanroycmt50@gmail.com";
                              $headers  = "From:$from\n";
                              $headers .= 'MIME-Version:1.0'."\r\n";
                              $headers .='Content-type:text/html; charset=iso-8859-1'."\r\n"; 
                              $subject  = "Your Password";
                              $message  = "Your username is".$username."and password is".$newpass."To loging .. visite website";
                              $sendMail = mail($to, $subject, $message, $headers);
	                              if ($sendMail) {
	                              	 echo "<span style='color:green;font-size:18px'>Check Your Email for new password</span>";
	                              }else{
	                              	echo "<span style='color:red;font-size:18px'>Mail not sent</span>";
	                              }

						  }else{
						 	echo "<span style='color:red;font-size:18px'>Email Not Found..</span>";
						 }
						}
				}
			 ?>

		<form action="" method="POST">
			<h1>Password Recovery</h1>
			<div>
				<input type="text" placeholder="Enter your Email" required=""  name="email"/>
			</div>
			<div>
				<input type="submit" value="Send Mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Log In!</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>