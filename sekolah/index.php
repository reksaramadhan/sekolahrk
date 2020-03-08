<?php  
include 'admin/aksi/koneksi.php';
  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php  

	if(isset($_POST['submit']))
    {
        

        $username =  $_POST['username'];
        $pass = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$username."' AND password = '".$pass."' "); 

        $data = mysqli_fetch_array($query);
        $user_login = $data['username'];
        $user_role = $data['user_role'];


        if (mysqli_num_rows($query)>0) 
        {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = $user_role;

            echo "berhasil login";
            if ($user_role == 'admin') 
            {
                header('location: admin/index.php');
            }
            elseif ($user_role == 'guru') 
            {
                header('location: guru/index.php');
            }
        } 
        else 
        {
            $error = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="admin/asset/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="admin/asset/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="admin/asset/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="admin/asset/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/css/main.css">
	<link href="admin/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="admin/asset/css/font-awesome.css" rel="stylesheet">
    <link href="admin/asset/css/font-awesome-ie7.css" rel="stylesheet">
    <link href="admin/asset/css/font-awesome-ie7.min.css" rel="stylesheet">
    <link href="admin/asset/css/main.css" rel="stylesheet">
    <link href="admin/asset/css/util.css" rel="stylesheet">
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
					<?php if (isset($error)) { ?>
                        <p style="font-style: italic; color: red;">Username / Password anda salah</p>
                    <?php } ?>
					

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">Login</button>
					</div>
				</form>
				</form>
			</div>
		</div>
	</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="admin/asset/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="admin/asset/vendor/animsition/js/animsition.min.js"></script>
	<script src="admin/asset/vendor/bootstrap/js/popper.js"></script>
	<script src="admin/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/asset/vendor/select2/select2.min.js"></script>
	<script src="admin/asset/vendor/daterangepicker/moment.min.js"></script>
	<script src="admin/asset/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="admin/asset/vendor/countdowntime/countdowntime.js"></script>
	<script src="admin/asset/js/main.js"></script>
</body>
</html>
