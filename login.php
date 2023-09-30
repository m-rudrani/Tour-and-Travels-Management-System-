<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login |Wanderlust</title>
        
	<?php include ('header.php')?>
    </head>
    <style>
	body {
		width: 100%;
		height: calc(100%);
		/*background: #007bff;*/
	}

	main#main {
		width: 100%;
		height: calc(100%);
		background: white;
	}

	#login-right {
		position: absolute;
		right: 0;
		width: 40%;
		height: calc(100%);
		background: white;
		display: flex;
		align-items: center;
	}

	#login-left {
		position: absolute;
		width: 60%;
		height: calc(100%);
		background: #59b6ec61;
		display: flex;
		align-items: left;
		background: url(images/WLTV.jpg);
		background-size: cover;
	}

	#login-right .card {
		margin: auto;
		z-index: 1
	}

	.logo {
		margin: auto;
		font-size: 8rem;
		background: white;
		padding: .5em 0.7em;
		border-radius: 50% 50%;
		color: #000000b3;
		z-index: 10;
	}

	div#login-right::before {
		content: "";
		position: absolute;
		top: 0;
		left: 0;
		width: calc(100%);
		height: calc(100%);
		background: #9fa3a7e0;
	}

	.form-control {
		margin: .5em;

	}

	.control-label {
		padding-left: .7em;
	}
</style>

    <body>
    <?php include('config.php'); ?>
    <?php
	$_SESSION['loginstatus'] = "";
    if (isset($_POST["sbmt"])) {
		$cn = connect();
		$s = "select * from users where Username='" . $_POST["t1"] . "' and Pwd='" . $_POST["t2"] . "'";

		$q = mysqli_query($cn, $s);
		$r = mysqli_num_rows($q);
		$data = mysqli_fetch_array($q);
		mysqli_close($cn);
		if ($r > 0) {
			$_SESSION["Username"] = $_POST["t1"];
			$_SESSION["usertype"] = $data[2];
			$_SESSION['loginstatus'] = "yes";
			header("location:index.php");
		} else {
			echo "<script>alert('Invalid User Name or Password');</script>";
		}
	}
	?>

	 <main id="main" class=" bg-dark">
		<div id="login-left">
		</div>

		<div id="login-right">
			<div class="card col-md-8">
				<div class="card-body">

					<form method="post">
						<center>
							<img src="./images/logo.png" alt="logo" height="40px">
							<h6>ADMIN LOGIN </h6>
						</center>
						<hr>
						<div class="form-group">
							<label for="username" class="control-label">Username</label>

							<input type="text" id="username" name="t1" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" class="control-label">Password</label>

							<input type="password" id="password" name="t2" class="form-control">
						</div>
						<div>
						<center><button class="btn btn-sm btn-primary" type="submit" value="LOGIN" name="sbmt">LOGIN</button>
						<br>

						<a href="index.html">Go to Website</a>
						</center>
						</div>
						
					</form>
				</div>

			</div>
		</div>
	</main>>

    </body>