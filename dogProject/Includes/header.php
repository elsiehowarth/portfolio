<?php
    include 'userInformation.php';
?>
<!--open html tag-->
<html>
<!--head tag-->
<head>
    <meta charset="UTF-8">
    <!--title tag which include the title variable from user information.php -->
    <title><?php echo $title; ?></title>

    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,width=device-width">
    <!--include font awesome-->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet" type="text/css">
    <!--link to css style sheet-->
    <link rel="stylesheet" type="text/css" href="../Style/style.css"/>
<!--close head tag-->
</head>
<!--open body tag-->
<body>
<!--open header tag-->
<header id="main-header">
    <!--open div -->
    <div id="header-content">
        <!-- open wrapper div-->
        <div class="wrapper">
            <!--open logo div-->
            <div id="header-logo">
                <!--create logo using font awesome icons and text-->
                <a href="index.php" class="logo"><i class="fa fa-paw""></i><span class="dog">Dog</span><span class="project">Project</span></a>
            <!--close logo div-->
            </div>
        <!--close wrapper div-->
        </div>
     <!--close div-->
    </div>


    <!--create div for navigation which will be inside the header-->
    <div id="header-navigation">
        <!--open wrapper div-->
        <div class="wrapper">
            <!--main navigation positioned to the left-->
            <nav class="left-nav">
                <!--ul open tag-->
                <ul>
                    <!--li for each page listed, this include links to the pages-->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="findADog.php">Find a Dog</a></li>
                    <li><a href="addAdvert.php">Sell your Dog</a></li>
                <!--close ul tag-->
                </ul>
            <!--close nav tag-->
            </nav>
            <!--nav tag to position right nav which will include login/register and change if there is a session to user name-->
            <nav class="right-nav">
                <!--if there is no session in the user information variable inside the userInformation.php file then display login and register buttons-->
                <?php if(is_null($userInformation)): ?>
                <!--open ul tag-->
                <ul>
                    <!--create the login and register buttons-->
                    <li><a href="./login.php"><i class="fa fa-sign-in fa-fw"></i>Sign In</a></li>
                    <li><a href="./register.php"><i class="fa fa-user-plus fa-fw"></i>Register</a><li>
                <!--end the if statement-->
                <?php endif; ?>
                <!--close ul tag-->
                </ul>
                 <!--if there is data inside the userinformation variable then display navigation which includes usersname and other pages-->
                 <?php if(!is_null($userInformation)): ?>
                    <ul>
                        <!--create dropdown-->
                        <li class="dropdown">
                            <!--show users name and make it so when they click it a drop down menu is included-->
                            <a href="" class="dropbtn"><i class="fa fa-cog fa-fw"></i><?php echo $userInformation['first_name'] . ' ' . $userInformation['surname'];?></a>
                            <!--create the drop down with pages when the usersname is clicked on-->
                            <div class="dropdown-content">
                                <!--create links which will appear in the drop down menu-->
                                <a href="./accountDetails.php"><i class="fa fa-fw fa-user"></i>My Account</a>
                                <a href="./addAdvert.php"><i class="fa fa-fw fa-plus"></i>Post an Advert</a>
                                <a href="./logout.php"><i class="fa fa-fw fa-sign-out"></i>Log Out</a>
                <!--end if-->
                <?php endif; ?>
                            <!--close drop down div-->
                            </div>
                        <!--close li-->
                        </li>
                    <!--close ul-->
                    </ul>
            <!--close nav tag-->
            </nav>
        <!--close wrapper div-->
        </div>
    <!--close header-navigation-->
    </div>
<!--end header-->
</header>



