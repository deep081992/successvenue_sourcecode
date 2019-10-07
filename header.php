<?php
ob_start();
//session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SuccessVenue</title>
    <meta charset="UTF-8">

 <!-- icons and fonts ---------->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/font-awesome-5.8.1.css">

    <!------font awesome------------>
    <script src="https://kit.fontawesome.com/6406cffecb.js"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    <script src="https://kit.fontawesome.com/14868d82cf.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.min.css">

    <!-----custom--------->
   <link rel="stylesheet" href="bootstrap/css/customestyle.css">
    <link rel="stylesheet" href="bootstrap/css/contact.css">
   
    
</head>
<body>

<nav class="navbar navbar-default navbar-dark bg-dark navbar-expand-sm sticky-top">
    <div class="container">
        <a href="index.php" class="navbar-brand">
            <img src="img/favicon.ico" width="30px" height="30px">
            <p class="d-inline text-light">sv</p>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#uiNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="uiNavbar">
            <!---------home------------->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a href="index.php" class="nav-link ">
                       HOME</a>
                </li>
                <!---------Courses---------->
                <li class="nav-item px-2 dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="coursesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">COURSES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="coursesDropdown">
                        <a class="dropdown-item" href="#">MANAGEMENT</a>
                        <a class="dropdown-item" href="#">ENGINEERING</a>
                    </div>
                </li>
                <!----------Colleges---------->
                <li class="nav-item px-2 dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">COLLEGES</a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="all_colleges.php">MANAGEMENT Colleges</a>
                        <a class="dropdown-item" href="all_colleges.php">ENGINEERING Colleges</a>
                    </ul>
                </li>
              <!-----------Application fORM---------->
                <li class="nav-item px-2">
                    <a href="applicationform.php" class="nav-link ">
                        APPLICATION FORM</a>
                </li>

                <!-----------Gallery---------->
                <li class="nav-item px-2">
                    <a href="applicationform.php" class="nav-link ">
                        GALLERY</a>
                </li>
                <!-----------contact---------->
                <li class="nav-item px-2">
                    <a href="contact.php" class="nav-link ">
                        CONTACT</a>
                </li>

        <?php

                if(isset($_SESSION['loginid']))
                {
                    $studentid=$_SESSION['loginid'];
                    $studentdataresult=mysqli_query
                    ($conn,"select * from student_personal_data where 
                    studentid='$studentid'");
                    $row=mysqli_fetch_assoc($studentdataresult);
          ?>       
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarUserDropdown">
                        <?php echo strtoupper($row['firstname'])?>
                        <img src="img/user_icon.png" width="25" height="25">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUserDropdown">
                <a class="dropdown-item" href="home.php">My Profile</a>
                <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                <a class="dropdown-item" href="change_pass.php">Change Password</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
              
            </div>
                </li>     
                 <?php
         }
         else
         {
             ?>
        

                <!-----------signup---------->
                <li class="nav-item px-2 active">
                    <a href="register.php" class="nav-link ">
                        REGISTER</a>
                </li>

                <!-----------login---------->
                <li class="nav-item px-2">
                    <a href="login.php" class="nav-link " data-toggle="modal" data-target="#login-modal">
                       LOGIN</a>
                </li>
        <?php
            }
        ?>

            </ul>

        </div>
</div>
</nav>



