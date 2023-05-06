<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>TripSy Package List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script
		type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="relative overflow-hidden bg-cover bg-no-repeat"
    style=" background-position: 50%; background-image: url('https://img.freepik.com/free-vector/road-trip-by-car-summer-vacation-travel-trip_107791-9489.jpg?w=2000');
      height: 350px;">
    <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
      style="background-color: rgba(0, 0, 0, 0.75)">
      <div class="flex h-full items-center justify-center">
        <div class="px-6 text-center text-white md:px-12">
			<h1 class="mb-6 text-5xl"><p style="color: #4F89F3">Trip<span style="color: #CA9C1A">Sy - Package List</span></p></h1>
	        <h3 class="mb-8 text-3xl">Travel Beyond Dreams</h3>			          
          <button
            type="button"
            class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
            data-te-ripple-init
            data-te-ripple-color="light">
            <a href="#">Get started</a>            
          </button>
        </div>
      </div>
    </div>
  </div>
	<div class="rooms">
		<div class="container" style="margin-bottom:30px;">

			<div class="room-bottom">
				<h3 style="color: #CA9C1A">Package List</h3>


				<?php $sql = "SELECT * from tbltourpackages";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $result) { ?>
						<div class="rom-btm" >
							<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s" >
								<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>"
									class="img-responsive" alt="">
							</div>
							<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
								<h4 style="color: #463560">Package Name:
									<?php echo htmlentities($result->PackageName); ?>
								</h4>
								<h6>Package Type :
									<?php echo htmlentities($result->PackageType); ?>
								</h6>
								<p><b>Package Location :</b>
									<?php echo htmlentities($result->PackageLocation); ?>
								</p>
								<p><b>Features</b>
									<?php echo htmlentities($result->PackageFetures); ?>
								</p>
							</div>
							<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
								<h5 style="color:#463560">INR
									<?php echo htmlentities($result->PackagePrice); ?>
								</h5>
								<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>"
								class="view" style="background-color: #C8EADF; color:black">Details</a>
							</div>
							
							</div>
							<div class="clearfix"></div>
						</div>

					<?php }
				} ?>



			</div>
		</div>
	</div>
	<!--- /rooms ---->

	<!--- /footer-top ---->
<?php include('includes/footer.php'); ?>
<?php include('includes/signup.php'); ?>
<?php include('includes/signin.php'); ?>
<?php include('includes/write-us.php'); ?>
</body>

</html>