<?php if (!isset($_SESSION)) {
	session_start();
} ?>
<!DOCTYPE html>
<head>
	<?php include ('header.php')?>
	<title>Admin Login |Wanderlust</title>
        
</head>
<style>
	.ad{
		padding:3em;
	}
</style>
<body>
	<?php
	if ($_SESSION['loginstatus'] == "") {
		header("location:login.php");
	}
	?>

	<div class="container-fluid">
		<div class="row">
			<?php include('top.php'); ?>
		</div>

		<div class="row">
			<div class="col-md-3">
				<?php include('left.php'); ?>
			</div>
			<div class="col-md-9">
				<h4 class="ad"> <center>WELCOME ADMINISTRATOR </center> </h4>
			</div>


		</div>
	</div>

	<?php include('bottom.php'); ?>
</body>

</html>