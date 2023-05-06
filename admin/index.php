<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$uname = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':uname', $uname, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['alogin'] = $_POST['username'];
		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details');</script>";

	}

}

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>TripSy | Admin Sign in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/morris.css" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-2.1.4.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
		type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />	
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<div class="h-[100vh] p-2 flex justify-center items-center text-3xl bg-white">
		<div class="m-2 p-10">
			<div class="flex flex-col justify-center items-center p-5">
				<h2 class="text-4xl text-white bg-blue-600 italic m-5 p-2 italic font-bold drop-shadow-lg w-full flex justify-center rounded-lg ">Sign In</h2>
				<form method="post">
					<div class="p-2 flex justify-evenly items-center">
						<h1 class="font-bold mr-2">Username</h1>
						<input type="text" name="username" class="name   border-2 border-black     p-2 rounded-lg" placeholder="" required="">
						<!-- <div class="clearfix"></div> -->
					</div>
					<div class="p-2 flex justify-evenly items-center">
					<h1 class="font-bold mr-2">Password</h1>
						<input type="password" name="password" class="password  border-2 border-black   p-2 rounded-lg" placeholder="" required="">
						<!-- <div class="clearfix"></div> -->
					</div>

					<div class="login-w3   w-full flex justify-evenly items-center p-2">
						<input type="submit" class="login bg-rose-600 rounded-md p-2 text-white m-2 font-bold " name="login" value="Sign In">
						<div class="rounded-md p-2 m-2 text-white bg-blue-600 ">
							<a href="../index.php" class="font-bold">Back to home</a>
						</div>					
					</div>
					
				</form>
				

			</div>
		</div>
	</div>
</body>

</html>