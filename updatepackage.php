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
        $f1 = 0;
        $f2 = 0;
        $f3 = 0;

        $target_dir = "images/";
        //t4
        $target_file = $target_dir . basename($_FILES["t4"]["name"]);
        $uploadok = 1;
        $imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)) {
            $f1 = 1;
        }

    }
    ?>

    <?php
    if (isset($_POST["sbmt"])) {
        $cn = connect();
        if (empty($_FILES['t3']['name'])) {
            $s = "update package set Packname='" . $_POST["t1"] . "',Category='" . $_POST["t2"] . "'Packprice='" . $_POST["t3"] . "',Pic1='" . $_POST["t4"] ."' where Packid='" . $_POST["t0"] . "'";

        } else {
            $s = "update package set Packname='" . $_POST["t1"] . "',Category='" . $_POST["t2"] ."' Packprice='" . $_POST["t3"] . "',Pic1='" . basename($_FILES["t4"]["name"]) . "' where Packid='" . $_POST["t0"] . "'";
        }
        mysqli_query($cn, $s);
        mysqli_close($cn);
        echo "<script>alert('Record Update');</script>";
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
                    <table border="2px" width="80%" height="400px" align="center" class="tableshadow">
                        <tr>
                            <td colspan="2" class="toptd"> <center>Update Package</center> </td>
                        </tr>
                        <tr>
                            <td class="lefttxt">Select Package</td>
                            <td><select name="t0" required />
                                <option value="">Select</option>

                                <?php
                                $cn = connect();
                                $s = "select * from package";
                                $result = mysqli_query($cn, $s);
                                $r = mysqli_num_rows($result);
                                //echo $r;
                                
                                while ($data = mysqli_fetch_array($result)) {
                                    if (isset($_POST["show"]) && $data[0] == $_POST["s1"]) {
                                        echo "<option value=$data[0] selected>$data[1]</option>";
                                    } else {
                                        echo "<option value=$data[0]>$data[1]</option>";
                                    }
                                }
                                mysqli_close($cn);
                                ?>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td class="lefttxt">Package Name</td>
                            <td><input type="text" value="<?php if (isset($_POST["show"])) {
                                echo $Packname; } ?> "
                                    name="t1" required pattern="[a-zA-z _]{1,50}" title " Please Enter Only Characters between 1 to 50 for Package Name" /></td>
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
                                    if (isset($_POST["show"]) && $Category == $data[0]) {

                                        echo "<option value=$data[0] selected='selected' >$data[1]</option>";
                                    } else {
                                        echo "<option value=$data[0]>$data[1]</option>";

                                    }
                                }
                                mysqli_close($cn);
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="lefttxt">Package Price</td>
                            <td><input type="text" name="t3"
                                    value="<?php if (isset($_POST["show"])) {
                                        echo $Packprice;
                                    } ?> " /></td>
                        </tr>
                
                        <tr>
                            <td class="lefttxt">Upload Pic1</td>
                            <td><input type="file" name="t4" /></td>
                        </tr>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" value="Update" name="sbmt" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <?php include('bottom.php'); ?>

</body>

</html>