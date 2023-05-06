<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit1'])) {
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobileno'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$sql = "INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':fname', $fname, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query->bindParam(':subject', $subject, PDO::PARAM_STR);
	$query->bindParam(':description', $description, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		$msg = "Enquiry  Successfully submited";
	} else {
		$error = "Something went wrong. Please try again";
	}

}

?>
<!DOCTYPE HTML>
<html>

<head>
	<title>TripSy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script
		type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
</head>

<body>
	<!-- top-header -->
	<div class="top-header">
		<?php include('includes/header.php'); ?>
		<div class="relative overflow-hidden bg-cover bg-no-repeat" style="
	  background-position: 50%;
	  background-image: url('https://img.freepik.com/free-vector/road-trip-by-car-summer-vacation-travel-trip_107791-9489.jpg?w=2000');
	  height: 350px;
	">
			<div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
				style="background-color: rgba(0, 0, 0, 0.75)">
				<div class="flex h-full items-center justify-center">
					<div class="px-6 text-center text-white md:px-12">
						<h1 class="mb-6 text-5xl"><p style="color: #4F89F3">Trip<span style="color: #CA9C1A">Sy</span></p></h1>
						<h3 class="mb-8 text-3xl">Travel Beyond Dreams</h3>
						<button type="button"
							class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
							data-te-ripple-init data-te-ripple-color="light">
							<a href="#">Get started</a>
						</button>
					</div>
				</div>
			</div>
		</div>
		<!--- privacy ---->
		<div class="privacy">
			<div class="container">
				<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s"
					style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown; color: #463560">Enquiry Form</h3>
				<form name="enquiry" method="post">
					<?php if ($error) { ?>
						<div class="errorWrap"><strong>ERROR</strong>:
							<?php echo htmlentities($error); ?>
						</div>
					<?php } else if ($msg) { ?>
							<div class="succWrap"><strong>SUCCESS</strong>:
							<?php echo htmlentities($msg); ?>
							</div>
					<?php } ?>
					<p style="width: 350px;">

						<b>Full name</b> <input type="text" name="fname" class="form-control" id="fname"
							placeholder="Full Name" required="">
					</p>
					<p style="width: 350px;">
						<b>Email</b> <input type="email" name="email" class="form-control" id="email"
							placeholder="Valid Email id" required="">
					</p>

					<p style="width: 350px;">
						<b>Mobile No</b> <input type="text" name="mobileno" class="form-control" id="mobileno"
							maxlength="10" placeholder="10 Digit mobile No" required="">
					</p>

					<p style="width: 350px;">
						<b>Subject</b> <input type="text" name="subject" class="form-control" id="subject"
							placeholder="Subject" required="">
					</p>
					<p style="width: 350px;">
						<b>Description</b> <textarea name="description" class="form-control" rows="6" cols="50"
							id="description" placeholder="Description" required=""></textarea>
					</p>

					<p style="width: 350px;">
						<button type="submit" name="submit1" style="background-color: #C8EADF; color:black; padding:5px; width:100px; border-radius:8px; font-weight:700;">Submit</button>
					</p>
				</form>


			</div>
		</div>
		<?php include('includes/footer.php'); ?>
		<!-- signup -->
		<?php include('includes/signup.php'); ?>
		<!-- //signu -->
		<!-- signin -->
		<?php include('includes/signin.php'); ?>
		<!-- //signin -->
		<!-- write us -->
		<?php include('includes/write-us.php'); ?>
</body>

</html>