
<div class="header" style="background-image: linear-gradient(to right, #C8EADF , #A5D2E5);">
	<div class="container" style="display:flex; justify-content:center">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s" style="width:80vw" align="center">
			<a href="index.php" style="font-size:50px; font-weight:300; text-decoration:none; hover:none; color:#4F89F3;">Trip<span style="color:#463560;">Sy</span></a>
		</div>
	</div>
</div>

	<?php if ($_SESSION['login']) { ?>
		<div class="top-header" style="background-image: linear-gradient(to right, #C8EADF , #A5D2E5);">
			<div class="container" style="display:flex; padding-bottom:5px">
				<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s" style="padding:2px; width:30%;   display:flex; justify-content: start; align-items:center">
					<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
					<li class="hm"><a href="profile.php" style="font-size:20px; margin-left:20px; color:#463560;">My Profile</a></li>
				</ul>
				
				<div style="width:40%; margin-left:5px; display:flex; justify-content:center; align-items:center;">					
					<a href="change-password.php"  style="margin:10px; font-size:20px; color:#463560">Change Password</a>
					<a href="tour-history.php" style="margin:10px; font-size:20px; color:#463560;">Tour History</a>
					<a href="issuetickets.php" style="margin:10px; font-size:20px; color:#463560">Issue Ticket</a>
					
				</div>
				
				<div style="width:30%;  margin-left:5px; padding-top:4px; display:flex; justify-content:end; align-items:center; padding-left:30px;">
					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s" >
						<li class="tol" style="font-size:15px; margin-left:15px; color:#5C9CFD">Welcome,
							<span style="color:#463560;"><?php echo htmlentities($_SESSION['login']); ?></span>
						</li>
						<li class="sigi" style="padding:5px; margin:5px; border-radius:8px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)"><a href="logout.php"  style="font-size:20px; color:#463560;">Log Out</a></li>
					</ul>
				</div>				
			</div>
			<div style="width:100%;   margin-left:5px; display:flex; justify-content:center; align-items:center; color:#463560">					
					<a href="index.php"  style="margin:10px; font-size:20px; color:#463560;">Home</a>
					<a href="page.php?type=aboutus" style="margin:10px; font-size:20px ;color:#463560;">About</a>
					<a href="package-list.php" style="margin:10px; font-size:20px; color:#463560;">Tour Packages</a>
					<a href="page.php?type=privacy" style="margin:10px; font-size:20px; color:#463560;">Privacy Policy</a>
					<a href="page.php?type=terms" style="margin:10px; font-size:20px; color:#463560;">Terms of Use</a>
					<a href="page.php?type=contact" style="margin:10px; font-size:20px; color:#463560;">Contact Us</a>
					<a href="enquiry.php" style="margin:10px; font-size:20px; color:#463560;">Enquiry</a>
			</div>
		</div>
	<?php } else { ?>
		<div class="top-header" style="background-image: linear-gradient(to right, #C8EADF , #A5D2E5); padding-bottom:5px">
			<div class="container" style="display:flex">
				<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s" style="padding:2px; width:15%;   display:flex; justify-content: center; align-items:center">
					<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
					<li class="hm"><a href="admin/index.php" style="font-size:20px; margin-left:20px color:#463560;">Admin Login</a></li>
				</ul>
				<div style="width:70%;   margin-left:5px; display:flex; justify-content:center; align-items:center; color:#463560">					
					<a href="index.php"  style="margin:10px; font-size:20px">Home</a>
					<a href="page.php?type=aboutus" style="margin:10px; font-size:20px">About</a>
					<a href="package-list.php" style="margin:10px; font-size:20px">Tour Packages</a>
					<a href="page.php?type=privacy" style="margin:10px; font-size:20px">Privacy Policy</a>
					<a href="page.php?type=terms" style="margin:10px; font-size:20px">Terms of Use</a>
					<a href="page.php?type=contact" style="margin:10px; font-size:20px">Contact Us</a>
					<a href="enquiry.php" style="margin:10px; font-size:20px">Enquiry</a>
				</div>
				<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s" style=" width:15%;   margin-left:5px; padding-top:4px; padding-left:30px">
					<!-- <li class="tol">Toll Number : +91-81-3151-8954</li> -->
					<li class="sig" style="padding:5px; margin:5px; border-radius:8px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)"><a href="#" data-toggle="modal" data-target="#myModal" style="font-size:20px; color:#463560">Sign Up</a></li>
					<li class="sigi" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding:5px; margin:5px; border-radius:8px"><a href="#" data-toggle="modal" data-target="#myModal4" style="font-size:20px; color:#463560">Sign In</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php } ?>

<!--- /top-header ---->
<!--- header ---->
<!-- <div class="header"> -->
	<!-- <div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="index.php">Tourism <span>Management System</span></a>
		</div> -->

		<!-- <div class="lock fadeInDown animated" data-wow-delay=".5s">
			<li><i class="fa fa-lock"></i></li>
			<li>
				<div class="securetxt">SAFE &amp; SECURE </div>
			</li>
			<div class="clearfix"></div>
		</div> -->
		<!-- <div class="clearfix"></div>
	</div>
</div> -->
<!--- /header ---->
<!--- footer-btm ---->
<!-- <div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
		<div class="navigation">
			<nav class="navbar navbar-default">
				Brand and toggle get grouped for better mobile display
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				Collect the nav links, forms, and other content for toggling -->
				<!-- <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php" style="  color:black">Home</a></li>
							<li><a href="page.php?type=aboutus">About</a></li>
							<li><a href="package-list.php">Tour Packages</a></li>
							<li><a href="page.php?type=privacy">Privacy Policy</a></li>
							<li><a href="page.php?type=terms">Terms of Use</a></li>
							<li><a href="page.php?type=contact">Contact Us</a></li>
							//if ($_SESSION['login']) { ?>
								<>Need Help?< href="#" data-toggle="modal" data-target="#myModal3"> / Write Us
							// } else { ?>
								<li><a href="enquiry.php"> Enquiry </a> </li>
							 //} ?>
							<div class="clearfix"></div>

						</ul>
					</nav>
				</div> /.navbar-collapse
			</nav>
		</div>

		<div class="clearfix"></div>
	</div>
</div> -->