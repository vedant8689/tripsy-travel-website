<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>TripSy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script
		type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	
</head>

<body>
	<?php include('includes/header.php'); ?>
	<?php include('includes/herosection.php'); ?>
	<div class="container">
		<div class="rupes">
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s"
				style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-inr fa-5x" style="color:#CA9C1A"></i></a>
				</div>
				<div class="rup-rgt">
					<h3 style="color: #CA9C1A">UP TO INR. 5000 OFF</h3>
					<h4><a href="offers.html">TRAVEL SMART</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s"
				style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-h-square fa-5x" style="color:#CA9C1A"></i></a>
				</div>
				<div class="rup-rgt">
					<h3 style="color: #CA9C1A">UP TO 70% OFF</h3>
					<h4><a href="offers.html">ON HOTELS ACROSS WORLD</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s"
				style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-mobile fa-5x" style="color:#CA9C1A"></i></a>
				</div>
				<div class="rup-rgt">
					<h3 style="color: #CA9C1A">FLAT INR. 5000 OFF</h3>
					<h4><a href="offers.html">APP OFFER</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
	<div class="container">
		<div class="holiday" style="padding-bottom:0px">
			<h3 style="color: #CA9C1A">Package List</h3>
			<?php $sql = "SELECT * from tbltourpackages order by rand() limit 4";
			$query = $dbh->prepare($sql);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			$cnt = 1;
			if ($query->rowCount() > 0) {
				foreach ($results as $result) { ?>
					<div class="rom-btm">
						<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
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
						<div class="clearfix"></div>
					</div>

				<?php }
			} ?>


			<div><a href="package-list.php" class="view" style="background-color: #C8EADF; color:black">View More Packages</a></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<section class="text-gray-600 body-font">
        <div class="container flex flex-wrap justify-center items-center">
            <div class="flex flex-wrap">
                <!-- card 1  -->
                <div class="p-4 lg:w-1/3 ">
                    <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                    <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-[#C8EADF] text-[#463560]  flex-shrink-0">
						<i class="fa fa-users fa-2x" aria-hidden="true"></i>
                        
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Users</h2>
                        <p class="leading-relaxed text-base">100+</p>                                                                        
                    </div>
                    </div>
                </div>
                <!-- card 2 -->
                <div class="p-4 lg:w-1/3">
                    <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                    <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-[#C8EADF] text-[#463560]  flex-shrink-0">
						<i class="fa fa-question-circle fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Enquiries</h2>
                        <p class="leading-relaxed text-base">100+</p>                                                                        
                    </div>
                    </div>
                </div>
                <!-- card 3 -->
                <div class="p-4 lg:w-1/3">
                    <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                    <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-[#C8EADF] text-[#463560]  flex-shrink-0">
						<i class="fa fa-book fa-2x"></i>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Bookings</h2>
                        <p class="leading-relaxed text-base">100+</p>                                                                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


	<?php include('includes/footer.php'); ?>
	<?php include('includes/signup.php'); ?>
	<?php include('includes/signin.php'); ?>
	<?php include('includes/write-us.php'); ?>
	
</body>
</html>