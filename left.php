<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<!DOCTYPE html>
<html>

<head>
    
    <title></title>
    <?php include('header.php') ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row left ">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link text-light" href="dashboard.php">Dashboard</a>
                    </li> -->
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link text-secondary">Manage users</a>
                        <?php if ($_SESSION["usertype"] == "Admin") { ?>
                            <a class="nav-link text-light" href="adduser.php">Add User</a>
                            <a class="nav-link text-light" href="deleteuser.php">Delete User</a>
                        <?php } ?>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link text-secondary">Tour Packages</a>
                        <a class="nav-link text-light" href="viewpackages.php">View Packages</a>
                        <a class="nav-link text-light" href="addpackages.php">Add Packages</a>
                        <?php if ($_SESSION["usertype"] == "Admin") { ?>
                            <a class="nav-link text-light" href="updatepackage.php">Update Packages</a>
                            <a class="nav-link text-light" href="deletepackage.php">Delete Packages</a></td>
                        <?php } ?>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="booking.php">Manage Booking</a>
                    </li>
                    <hr>
                    <!-- <li class="nav-item">
                        <a class="nav-link text-light " href="viewenquiry.php">Enquiry</a>
                    </li> -->
                    <br>
                </ul>
        </div>
    </div>
</body>

</html>