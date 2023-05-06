<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>TripSy | Admin Manage Packages</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script
			type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/morris.css" type="text/css" />
		<!-- Graph CSS -->
		<link href="css/font-awesome.css" rel="stylesheet">
		<!-- jQuery -->
		<script src="js/jquery-2.1.4.min.js"></script>
		<!-- //jQuery -->
		<!-- tables -->
		<!-- <link rel="stylesheet" type="text/css" href="css/table-style.css" /> -->
		<link rel="stylesheet" type="text/css" href="css/basictable.css" />
		<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
		<script src="https://cdn.tailwindcss.com"></script>

		<!-- //tables -->
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet'
			type='text/css' />
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<!-- lined-icons -->
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
		<!-- //lined-icons -->
	</head>

	<body>
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="mother-grid-inner">
					<!--header start here-->
					<?php include('includes/header.php'); ?>
					<div class="clearfix"> </div>
				</div>
				<!--heder end here-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage
						Packages</li>
				</ol>
				<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
					<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
						<thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
							<tr>
								<th scope="col" class="px-6 py-3">
									#
								</th>
								<th scope="col" class="px-6 py-3">
									Name
								</th>
								<th scope="col" class="px-6 py-3">
									Type
								</th>
								<th scope="col" class="px-6 py-3">
									Location
								</th>
								<th scope="col" class="px-6 py-3">
									Price
								</th>
								<th scope="col" class="px-6 py-3">
									Creation Date
								</th>
								<th scope="col" class="px-6 py-3">
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							<tr class="bg-white ">
								<?php $sql = "SELECT * from TblTourPackages";
								$query = $dbh->prepare($sql);
								//$query -> bindParam(':city', $city, PDO::PARAM_STR);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $result) { ?>
										<th scope="row" class="px-6 py-4 whitespace-nowrap text-black bg-whitepx-6 py-4 font-medium whitespace-nowrap text-black bg-white">
											<?php echo htmlentities($cnt); ?>
										</th>
										<td class="px-6 py-4 whitespace-nowrap text-black bg-white">
											<?php echo htmlentities($result->PackageName); ?>
										</td>
										<td class="px-6 py-4 whitespace-nowrap text-black bg-white">
											<?php echo htmlentities($result->PackageType); ?>
										</td>
										<td class="px-6 py-4 whitespace-nowrap text-black bg-white">
											<?php echo htmlentities($result->PackageLocation); ?>
										</td>
										<td class="px-6 py-4 whitespace-nowrap text-black bg-white">
											INR <?php echo htmlentities($result->PackagePrice); ?>
										</td>
										<td class="px-6 py-4 whitespace-nowrap text-black bg-white">
											<?php echo htmlentities($result->Creationdate); ?>
										</td>
										<td class="px-6 py-4 whitespace-nowrap text-black bg-white">
											<a href="update-package.php?pid=<?php echo htmlentities($result->PackageId);?>" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View
												Details</button></a>
										</td>
									</tr>
									<?php $cnt = $cnt + 1;
									}
								} ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- script-for sticky-nav -->
			<script>
				$(document).ready(function () {
					var navoffeset = $(".header-main").offset().top;
					$(window).scroll(function () {
						var scrollpos = $(window).scrollTop();
						if (scrollpos >= navoffeset) {
							$(".header-main").addClass("fixed");
						} else {
							$(".header-main").removeClass("fixed");
						}
					});

				});
			</script>
			<!-- /script-for sticky-nav -->
			<!--inner block start here-->
			<div class="inner-block">

			</div>
			<!--inner block end here-->
			<!--copy rights start here-->
			<?php include('includes/footer.php'); ?>
			<!--COPY rights end here-->
		</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include('includes/sidebarmenu.php'); ?>
		<div class="clearfix"></div>
		</div>
		<script>
			var toggle = true;

			$(".sidebar-icon").click(function () {
				if (toggle) {
					$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
					$("#menu span").css({ "position": "absolute" });
				}
				else {
					$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
					setTimeout(function () {
						$("#menu span").css({ "position": "relative" });
					}, 400);
				}

				toggle = !toggle;
			});
		</script>
		<!--js -->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- /Bootstrap Core JavaScript -->

	</body>

	</html>
<?php } ?>