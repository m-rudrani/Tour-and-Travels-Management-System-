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
        $s = "insert into users values('" . $_POST["t1"] . "','" . $_POST["t2"] . "','" . $_POST["s1"] . "')";
        mysqli_query($cn, $s);
        mysqli_close($cn);
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
                <form method="post ">
                    <table border="2px" width="80%" height="400px" align="center" class="tableshadow">
                        <tr>
                            <td colspan="2" class="toptd"><center> Add User</center></td>
                            
                        </tr>
                        <tr>
                            <td class="lefttxt">User Name</td>
                            <td><input type="text" name="t1" required pattern="[a-zA-z1 _]{3,50}" title="Please Enter
                                    Only Characters and numbers between 3 to 50 for User name" /></td>
                        </tr>
                        <tr>
                            <td class="lefttxt">Password</td>
                            <td><input type="password" name="t2" required pattern="[a-zA-z0-9]{1,10}" title="Please Enter
                                    Only Characters and numbers between 1 to 10 for Company name" /></td>
                        </tr>
                        <tr>
                            <td class="lefttxt">Confirm Password</td>
                            <td><input type="password" name="t3" required pattern="[a-zA-z0-9]{1,10}" title='Please Enter
                                    Only Characters and numbers between 1 to 10 for Company name'/></td>
                        </tr>
                        <tr>
                            <td class="lefttxt">Type of User</td>
                            <td><select name="s1" required>
                                    <option value="">Select</option>
                                    <option value="Admin">Admin</option>
                                    <option value="General">General</option>
                                </select></td>
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
</body>

</html>