<?php if (!isset($_SESSION)) {
    session_start();
} ?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
	<?php include ('header.php')?>
</head>

<body>
    <?php
    if ($_SESSION['loginstatus'] == "") {
        header("location:login.php");
    }
    ?>


    <?php include_once('config.php'); ?>
    <?php
    if (isset($_POST["sbmt"])) {
        $cn = connect();
        $s = "insert into category(Cat_name) values('" . $_POST["t1"] . "')";
        mysqli_query($cn, $s);

        echo "<script>alert('Record Save');</script>";
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
                <form method="post">
                    <table border="2px" width="90%" height="300px" align="center" class="tableshadow">
                        <tr>
                            <td class="toptd"> <center>View Package</center> </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" style="padding-top:10px;">
                                <table border="0" align="center" width="95%">
                                    <tr>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">ID</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Package Name</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Category</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Price</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Pic1</td>
                                    </tr>

                                    <?php

                                    $s = "select * from package";
                                    $result = mysqli_query($cn, $s);
                                    $r = mysqli_num_rows($result);
                                    //echo $r;
                                    
                                    while ($data = mysqli_fetch_array($result)) {

                                        echo "<tr><td style=' padding:5px;'>$data[0]</td>
		                                <td style=' padding:5px;'>$data[1]</td>
		                                <td style=' padding:5px;'>$data[2]</td>
		                                <td style=' padding:5px;'>$data[3]</td>
		                                <td style=' padding:5px;'><IMG src='images/$data[4]' style='height:50PX' /></td></tr>";

                                    }
                                    ?>

                                </table>
                            </td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
    </div>
    
    <?php include('bottom.php'); ?>
</body>

</html>