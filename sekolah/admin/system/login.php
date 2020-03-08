<?php  
	session_start();
	include "koneksi.php";
?>
<?php  
	if (isset($_POST['fmasuk'])) {
		$username = $_POST['fusername'];
		$password = $_POST['fpassword'];
		$qry = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username' AND password = md5('$password')");
		$cek = mysqli_num_rows($qry);
		if ($cek==1) {
			$_SESSION['userweb']=$username;
			header("location:../index.php");
			exit;
		}
		else {
			echo "Login Gagal";
		}
	}

	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="asset/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="asset/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="asset/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="asset/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="asset/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="asset/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="asset/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="asset/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="asset/css/main.css">
	<link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="../asset/css/font-awesome.css" rel="stylesheet">
    <link href="../asset/css/font-awesome-ie7.css" rel="stylesheet">
    <link href="../asset/css/font-awesome-ie7.min.css" rel="stylesheet">
    <link href="../asset/css/main.css" rel="stylesheet">
    <link href="../asset/css/util.css" rel="stylesheet">
</head>
<body>
	<form method="post">
	<div class="limiter">
		
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="fusername">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="fpassword">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="fmasuk">Login</button>
					</div>
				</form>

					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="#" class="txt2">
								Sign up
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="asset/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="asset/vendor/animsition/js/animsition.min.js"></script>
	<script src="asset/vendor/bootstrap/js/popper.js"></script>
	<script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="asset/vendor/select2/select2.min.js"></script>
	<script src="asset/vendor/daterangepicker/moment.min.js"></script>
	<script src="asset/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="asset/vendor/countdowntime/countdowntime.js"></script>
	<script src="asset/js/main.js"></script>

</body>
</html>