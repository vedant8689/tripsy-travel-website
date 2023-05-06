<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit2'])) {
	$pid = intval($_GET['pkgid']);
	$useremail = $_SESSION['login'];
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	$comment = $_POST['comment'];
	$status = 0;
	$sql = "INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:comment,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
	$query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
	$query->bindParam(':todate', $todate, PDO::PARAM_STR);
	$query->bindParam(':comment', $comment, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		$msg = "Booked Successfully";
	} else {
		$error = "Something went wrong. Please try again";
	}

}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>TripSy | Package Details</title>
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
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--animate-->
	<!-- <link href="css/animate.css" rel="stylesheet" type="text/css" media="all"> -->
	<script src="js/wow.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script scr="https://cdn.tailwindcss.com"></script>
	<script>
		new WOW().init();
	</script>
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
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
	<?php include('includes/header.php'); ?>
	<div class="relative overflow-hidden bg-cover bg-no-repeat"
    style=" background-position: 50%; background-image: url('https://tecdn.b-cdn.net/img/new/slides/146.webp');
      height: 350px;">
    <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.75)">
      <div class="flex h-full items-center justify-center">
        <div class="px-6 text-center text-white md:px-12">
			<h1 class="mb-6 text-5xl"><p style="color: #4F89F3">Trip<span style="color: #CA9C1A">Sy - Package Details</span></p></h1>
	        <h3 class="mb-8 text-3xl">Travel Beyond Dreams</h3>		          
          <button
            type="button"
            class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
            data-te-ripple-init
            data-te-ripple-color="light">
            <a href="#selectroom">Get started</a>            
          </button>
        </div>
      </div>
    </div>
  </div>
	<div class="selectroom">
		<div class="container">
			<?php if ($error) { ?>
				<div class="errorWrap"><strong>ERROR</strong>:
					<?php echo htmlentities($error); ?>
				</div>
			<?php } else if ($msg) { ?>
					<div class="succWrap"><strong>SUCCESS</strong>:
					<?php echo htmlentities($msg); ?>
					</div>
			<?php } ?>
			<?php
			$pid = intval($_GET['pkgid']);
			$sql = "SELECT * from tbltourpackages where PackageId=:pid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':pid', $pid, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			$cnt = 1;
			if ($query->rowCount() > 0) {
				foreach ($results as $result) { ?>

					<form name="book" method="post">
						
						<div class="selectroom_top" style="display: flex">
							<div class="col-md-8 selectroom_left wow fadeInLeft animated " data-wow-delay=".5s">
								<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>"
									class="img-responsive"  alt="" width="500px">
							</div>
							<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
								<h2 style="color: #463560">
									<?php echo htmlentities($result->PackageName); ?>
								</h2>
								<p class="dow"><b>#Package ID- <b>
									<?php echo htmlentities($result->PackageId); ?>
								</p>
								<p><b>Package Type: </b>
									<?php echo htmlentities($result->PackageType); ?>
								</p>
								<p><b>Package Location :</b>
									<?php echo htmlentities($result->PackageLocation); ?>
								</p>
								<p><b>Features: </b>
									<?php echo htmlentities($result->PackageFetures); ?>
								</p>
								<div class="ban-bottom">
									<div class="bnr-right">
										<label class="inputLabel">From</label>
										
										<input class="date" id="datepicker" type="text" placeholder="dd-mm-yyyy" name="fromdate"
											required="" style=" background-color: white; color: black">
									</div>
								</div>
								<div class="clearfix"></div>
								
							</div>
							<br>
				
							<p style="padding-top:5px">
								<h3 class="text-2xl pb-5">Package Details</h3>
								<?php echo htmlentities($result->PackageDetails); ?>
								<div class="grand" style="height: 50%; display: flex; flex-direction: column; justify-content: end; align-items: end; font-size: 20px;">
										<p style="font-weight:900; color:black">Grand Total</p>
										<h3 style="color:#463560"><?php echo htmlentities($result->PackagePrice);?></h3>
								</div>
							</p>
							<div class="clearfix"></div>
						</div>
						<div class="selectroom_top">
							<h2>Travels</h2>
							<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms"
								data-wow-delay="500ms"
								style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
								<ul>

									<li class="spe">
										<label class="inputLabel">Comment</label>
										<input class="special" type="text" name="comment" required="">
									</li>
									<?php if ($_SESSION['login']) { ?>
										<li class="spe" align="center">
											<button type="submit" name="submit2" style="background-color: #C8EADF; color:black; padding:5px; width:100px; border-radius:8px;">Book</button>
										</li>
									<?php } else { ?>
										<li class="" align="center" style="margin-top: 1%">
											<a href="#" class="" style="background-color: #C8EADF; color:black; padding:5px; width:100px; border-radius:8px;">
												Book</a>
										</li>
									<?php } ?>
									<div class="clearfix"></div>
								</ul>
							</div>				
						</div>
					</form>
				<?php }
			} ?>


		</div>
	</div>
	<!--- /selectroom ---->
	<!--- /footer-top ---->
	<?php include('includes/footer.php'); ?>
	<?php include('includes/signup.php'); ?>
	<?php include('includes/signin.php'); ?>
	<?php include('includes/write-us.php'); ?>
	
		
</body>

</html>