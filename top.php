<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include('header.php')
        ?>
</head>

<body>
    <?php include_once('config.php')?>
    <div class="container-fluid">
        <div class="row top">
            <div class="col-md-3 fit ">
            <img src="./images/logo.png" alt="logo" height="40px">
            </div>

            <div class="col-md-6 fit">
                <h3><center>WELCOME TO ADMIN PANEL</center></h3>
            </div>

            <div class="col-md-3 fit">
                <ul>
                    <ol class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $_SESSION['Username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                        </ul>
                    </ol>
                </ul>
            </div>
        </div>

    </div>

</body>

</html>

