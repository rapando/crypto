<?php
	if(isset($_POST['login_btn'])) {
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		// look up the user name
		$con = mysqli_connect('localhost', 'root', '', 'crypto');
		$qry = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname' AND pass = '$pass' ");
		$no = mysqli_num_rows($qry);
		if($no < 1) {
			$err = "<span class='text-danger'>Wrong credentials</span>";
		} else {
			$err = "<span class='text-success'>Welcome $uname</span>";
			session_start();
			$_SESSION['uname'] = $uname;
			header("refresh:1;url=./");
		}
		
	}else {
		$err = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login ! Crypto</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="authors" content="samson rapando" />
	<meta name="description" content="Login to rent me" />
	<meta name="keywords" content="rentme" />
	<!-- dependencies -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/crypto.css" />
</head>
<body>
<h2  class="login_logo">Crypto</h2>
<div id="login">
	<form name="loginform" method="post" action="">
		<p>
			<label for="uname">Username</label>
			<input type="text" name="uname" class="form-control" autofocus required />
		</p>
		<p>
			<label for="pass">Password</label>
			<input type="password" name="pass" class="form-control" required />
		</p>
		<button class="btn btn-success" type="submit" name="login_btn" value="login">Login</button>
		<br />
		<?php  print "$err"; ?>
	</form>
</div>
</body>
</html>