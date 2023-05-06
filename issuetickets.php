<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
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
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<script src="https://cdn.tailwindcss.com"></script>
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
			<?php include('includes/herosection.php'); ?>
			<!--- privacy ---->
			<div class="privacy">
				<div class="container">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s"
						style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown; color:#463560">Issue Tickets</h3>
					<form name="chngpwd" method="post" onSubmit="return valid();">
						<?php if ($error) { ?>
							<div class="errorWrap"><strong>ERROR</strong>:
								<?php echo htmlentities($error); ?>
							</div>
						<?php } else if ($msg) { ?>
								<div class="succWrap"><strong>SUCCESS</strong>:
								<?php echo htmlentities($msg); ?>
								</div>
						<?php } ?>
						<div class="relative overflow-x-auto shadow-md sm:rounded-lg m-2 border-[5px]">
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Ticket ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Issue
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
					Admin Remark
                </th>
                <th scope="col" class="px-6 py-3">
                    Reg Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Remark Date
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b">
			<?php

$uemail = $_SESSION['login'];
;
$sql = "SELECT * from tblissues where UserEmail=:uemail";
$query = $dbh->prepare($sql);
$query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
	foreach ($results as $result) { ?>
	<th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">
		<?php echo htmlentities($cnt); ?>
	</th>
	<td class="px-6 py-4">
		#TKT-<?php echo htmlentities($result->id); ?>
    </td>
	<td class="px-6 py-4">
		<?php echo htmlentities($result->Issue); ?>
	</td>
	<td class="px-6 py-4" width="300">
		<?php echo htmlentities($result->Description); ?>
	</td>
	<td class="px-6 py-4">
		<?php if($result->AdminRemark == NULL){
			echo "---";
		}else{
			echo htmlentities($result->AdminRemark);
		} ?>
	</td>
	<td class="px-6 py-4" width="100">
		<?php echo htmlentities($result->PostingDate); ?>
	</td>
	<td class="px-6 py-4" width="100">
	<?php if($result->AdminremarkDate == NULL){
			echo "---";
		}else{
			echo htmlentities($result->AdminremarkDate);
		} ?>
		<!-- <?php echo htmlentities($result->AdminremarkDate); ?> -->
	</td>
	</tr>
		<?php $cnt = $cnt + 1;
	}
} ?>
	</tbody>
    </table>
</div>
</div>
</div>
			<!--- /privacy ---->
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
<?php } ?>