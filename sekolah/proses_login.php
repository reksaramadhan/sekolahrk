<?php
	if(isset($_POST['submit']))
	{
		include '.../admin/aksi/koneksi.php';

		$username =  $_POST['username'];
		$pass = $_POST['password'];

		echo $username;
		echo $pass;

		$query = mysql_query($conn, "SELECT * FROM user WHERE username = '".$username."' AND password = '".$pass."' "); 

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
			elseif ($user_role == 'staff') 
			{
				header('location: nasabah/staff.php');
			}
		} 
		else 
		{
			echo "Username / password anda salah";
		}
	}
?>
