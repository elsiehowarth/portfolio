<?php
    include 'Includes/bootstrap.php';
?>

<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,width=device-width" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="Style/style.css"/>
    
    

</head>


<body>

<header id="main-header">
    <div id="header-content">
        <div class="wrapper">
            <div id="header-logo">
                <a href="index.php" class="logo"><i class="fa fa-home""></i><span class="loft">Loft</span><span class="share">Share</span></a>
            </div>
        </div>
    </div>



        <div id="header-navigation">
            <div class="wrapper">

            <nav class="left-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="findStorage.php">Find Storgae</a></li>
                    <li><a href="advertiseSpace.php">Advertise Your Space</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </nav>

                <nav class="right-nav">

                    <?php if(is_null($userData)): ?>
                        <ul>
                        <li><a href="./register.php"><i class="fa fa-user-plus fa-fw"></i>Register</a><li>
                        <li><a href="./login.php"><i class="fa fa-sign-in fa-fw"></i>Sign In</a></li>
                        <?php endif; ?>
                        </ul>

                        <?php if(!is_null($userData)): ?>
                        <ul>
                            <li><a href=""><i class="fa fa-bell fa-fw"></i></a></li>
                            <li><a href=""><i class="fa fa-envelope fa-fw"></i></a></li>
                            <li class="dropdown">
                                <a href="" class="dropbtn"><i class="fa fa-cog fa-fw"></i><?php echo $userData['first_name'] . ' ' . $userData['last_name'];?></a>
                                <div class="dropdown-content">
                                    <a href="personalProfile.php"><i class="fa fa-fw fa-user"></i>My Account</a>
                                    <a href="mylistings.php"><i class="fa fa-fw fa-check"></i>My Listings</a>
                                    <a href="#"><i class="fa fa-fw fa-search"></i>My History</a>
                                    <a href="./Logout.php"><i class="fa fa-fw fa-sign-out"></i>Log Out</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                        </ul>
                </nav>

            </div>
    </div>
</header>