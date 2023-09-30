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
        $s = "delete from package  where packid='" . $_POST["t1"] . "'";
        mysqli_query($cn, $s);
        mysqli_close($cn);
        echo "<script>alert('Record Delete');</script>";
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
                <form method="post" enctype="multipart/form-data">
                    <table border="2px" width="500px" height="300px" align="center" class="tableshadow">
                        <tr>
                            <td colspan="2" class="toptd"><center>Delete Package</center></td>
                        </tr>
                        <tr>
                            <td class="lefttxt">Select Package</td>
                            <td><select name="t1" required />
                                <option value="">Select</option>

                                <?php
                                $cn = connect();
                                $s = "select * from package";
                                $result = mysqli_query($cn, $s);
                                $r = mysqli_num_rows($result);
                        
                                while ($data = mysqli_fetch_array($result))
                                {
                                    echo "<option value=$data[0]>$data[1]</option>";
                                }
                                mysqli_close($cn);
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" value="Delete" name="sbmt" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php include('bottom.php'); ?>

</body>

</html>