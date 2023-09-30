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
                            <td class="toptd"> <center>View Booking</center> </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" style="padding-top:10px;">
                                <table border="0" align="center" width="95%">
                                    <tr>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Package Name</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold; ">Package Id</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Name</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Mobile No.</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Email</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">No. of Children</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">no. of Adults</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">check in</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">check out</td>
                                        <td style="font-size:15px; padding:5px; font-weight:bold;">Status Field</td>
                                    </tr>


                                    <?php

                                    $s = "select * from booking,package where booking.Packageid=package.Packid";
                                    $result = mysqli_query($cn, $s);
                                    $r = mysqli_num_rows($result);
                                    //echo $r;
                                    
                                    while ($data = mysqli_fetch_array($result)) {


                                        echo "<td style=' padding:5px;'>$data[12]</td>
		                                <td style=' padding:5px;'>$data[1]</td> 
		                                <td style=' padding:5px;'>$data[2]</td>
		                                <td style=' padding:5px;'>$data[3]</td>
		                                <td style=' padding:5px;'>$data[4]</td>
		                                <td style=' padding:5px;'>$data[5]</td>
		                                <td style=' padding:5px;'>$data[6]</td>
		                                <td style=' padding:5px;'>$data[7]</td>
		                                <td style=' padding:5px;'>$data[8]</td>
		                                <td style=' padding:5px;'>$data[9]</a></td>
		                                </tr>";

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