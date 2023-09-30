<?php if (!isset($_SESSION)) {
	session_start();
} ?>

<!DOCTYPE html>
<html>

<head>
	<title></title>
	
	<?php include ('header.php')?>
</head>
<style>
	#tableshadow{
		padding: .5em;

	}
</style>

<body>
	<?php
	if ($_SESSION['loginstatus'] == "") {
		header("location:login.php");
	}
	?>

	<?php include_once('config.php'); ?>

	<div class="container-fluid">
		<div class="row">
			<?php include('top.php'); ?>
		</div>

		<div class="row">
			<div class="col-md-3">
				<?php include('left.php'); ?>
			</div>
			<div class="col-md-9">
				<form method="post" enctype="multipart/form-data">
					<table border="2px" width="80%" height="400px" align="center" class="tableshadow">
						<tr>
							<td colspan="2" class="toptd"> <center>Add Package</center> </td>
						</tr>
						<tr>
							<td class="lefttxt">Package Name</td>
							<td><input type="text" name="t1" required pattern="[a-zA-z _]{3,50}" title="Please Enter Only Characters between 3 to 50 for Package Name" /></td>
						</tr>
						<tr>
							<td class="lefttxt">Select Category</td>
							<td><select name="t2" required />
								<option value="">Select</option>

								<?php
								$cn = connect();
								$s = "select * from category";
								$result = mysqli_query($cn, $s);
								$r = mysqli_num_rows($result);
								//echo $r;
								while ($data = mysqli_fetch_array($result)) {
									if (isset($_POST["show"]) && $data[0] == $_POST["t2"]) {
										echo "<option value=$data[0] selected='selected'>$data[1]</option>";
									} else {
										echo "<option value=$data[0]>$data[1]</option>";
									}
								}
								?>
								</select>
								<input type="submit" value="Show" name="show" formnovalidate />
							</td>
						</tr>
						<tr>
							<td class="lefttxt">Package Price</td>
							<td><input type="text" name="t3" /></td>
						</tr>
						<tr>
							<td class="lefttxt">Photograph</td>
							<td><input type="file" name="t4" /></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" value="SAVE" name="sbmt" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>

	<?php include('bottom.php'); ?>

	<?php
	if (isset($_POST["sbmt"])) {
		$cn = connect();
		$f1 = 0;
		$f2 = 0;
		$f3 = 0;


		$target_dir = "images/";
		//t4
		$target_file = $target_dir . basename($_FILES["t4"]["name"]);
		$uploadok = 1;
		$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
		//check if image file is a actual image or fake image
		$check = getimagesize($_FILES["t4"]["tmp_name"]);
		if ($check !== false) {
			echo "file is an image - " . $check["mime"] . ".";
			$uploadok = 1;
		} else {
			echo "file is not an image.";
			$uploadok = 0;
		}
		//check if file already exists
		if (file_exists($target_file)) {
			echo "sorry,file already exists.";
			$uploadok = 0;
		}
		if ($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg" && $imagefileype != "gif") {
			echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
			$uploadok = 0;
		} else {
			if (move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)) {
				$f1 = 1;
			} else {
				echo "sorry there was an error uploading your file.";
			}
		}

		if ($f1 > 0 && $f2 > 0 && $f3 > 0) {

			$s = "insert into package(packname,category,packprice,pic1) values('" . $_POST["t1"] . "','" . $_POST["t2"] . "','" . $_POST["t3"] . "','" . basename($_FILES["t4"]["name"]) . "')";
			mysqli_query($cn, $s);
			mysqli_close($cn);
			echo "<script>alert('Record Save');</script>";
		}
	}
	?>
</body>

</html>