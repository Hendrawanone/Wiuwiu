<?php

session_start();

if( isset($_SESSION["login"]) ) {
    header("Location: admin/");
    exit;
}

require '../functions.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_num_rows($result) === 1 ) {

		$row = mysqli_fetch_assoc($result);

		if( password_verify($password, $row["password"]) ) {
			if( $row["status"] === admin ) {
		        $_SESSION["admin"] = true;
		        $_SESSION["username"] = $row["username"];
		        header("Location: ../admin/index.php");
		        exit;
		    } else if( $row["status"] === user ) {
		        $_SESSION["user"] = true;
		        $_SESSION["username"] = $row["username"];
		        $_SESSION["nama"] = $row["nama"];
		        header("Location: ../karyawan/");
		        exit;
		    }
		}

	}

	$error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<!-- <img src="img/icon.png"> -->
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" action="">
							 
							 	<?php if(isset($error)) : ?>
					                <div class="alert alert-danger alert-dismissible fade show" role="alert">
					                  <strong>Username / password salah!</strong> Silahkan coba lagi!
					                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                    <span aria-hidden="true">&times;</span>
					                  </button>
					                </div>
				                <?php endif; ?>

								<div class="form-group">
									<label for="email">Username</label>

									<input id="email" type="text" class="form-control" name="username" value="" required autofocus>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="forgot.html" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

								<div class="form-group">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block" name="login">
										Login
									</button>
								</div>
								<div class="margin-top20 text-center">
									Don't have an account? <a href="register.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; PrimaItech 2017
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>