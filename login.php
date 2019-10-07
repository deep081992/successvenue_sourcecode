<?php
ob_start();
session_start();
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
   
    
</head>
<body>

<nav class="navbar navbar-default navbar-dark bg-dark navbar-expand-sm">
    <div class="container">
        <a href="index.php" class="navbar-brand">
            <img src="img/favicon.ico" width="30px" height="30px">
            <p class="d-inline text-light">uiTechnologies</p>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#uiNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="uiNavbar">
            <!---------home------------->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
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
                        <li class="dropdown-item">MANAGEMENT Colleges</li>
                        <li class="dropdown-item">ENGINEERING Colleges</li>
                    </ul>
                </li>
              <!-----------Application fORM---------->
                <li class="nav-item px-2">
                    <a href="application_form.php" class="nav-link ">
                        APPLICATION FORM</a>
                </li>

                <!-----------Gallery---------->
                <li class="nav-item px-2">
                    <a href="#" class="nav-link ">
                        GALLERY</a>
                </li>
                <!-----------contact---------->
                <li class="nav-item px-2">
                    <a href="#" class="nav-link ">
                        CONTACT</a>
                </li>

        <?php

                if(isset($_SESSION['logintrue']))
                {
          ?>       
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarUserDropdown">
                        <?php
                        ucfirst($row['firstname']);
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUserDropdown">
                <a class="dropdown-item" href="home.php">My Profile</a>
                <a class="dropdown-item" href="">Edit Profile</a>
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
                    <a href="login.php" class="nav-link">
                       LOGIN</a>
                </li>
        <?php
            }
        ?>

            </ul>

        </div>
</div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 justify-center">
            <div class="card">
                <div class="card-header bg-lightseagreen text-light text-font">
                      <h3 class="text-font">Login here!</h3>
                </div>
                <div class="card-body">
                    
            <?php

            if(isset($_POST['loginbtn']))
            {
               $loginid=(isset($_POST['loginid']))?$_POST['loginid']:"";
               $loginpass=(isset($_POST['loginpass']))?$_POST['loginpass']:"";

               $res=mysqli_query($conn,"select * from student_personal_data where semail='$loginid'");

               if(mysqli_num_rows($res)==1)
               {
                    $row=mysqli_fetch_assoc($res);
                    if(password_verify($loginpass,$row['spassword']))
                    {
                        if($row['status']=='active')
                        {
                            $_SESSION['logintrue']=$row['token'];
                            $_SESSION['loginid']=$row['studentid'];
                            header("location:home.php");
                        }
                        else if($row['status']=='admin')
                        {
                            $_SESSION['logintrue']=$row['token'];
                            header("location:admin_dashboard/dashboard.php");
                        }
                        else
                        {
                            echo "<p class='alert alert-danger'>Your account is inactive please contact to admin</p>";
                        }
                        
                    }
                    else
                    {
                        echo "<p class='alert alert-danger'>password not match</p>";
                    }
               }
               else
               {
                    echo "<p class='alert alert-danger'>Sorry Record not found please Register first!</p>";
               }
            }
            

            ?>
            <form method="post" action="">
                <table class="table">
                    <tr>
                        <td>
                            <input type="text" name="loginid" id="loginid" placeholder="Enter email id" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="password" name="loginpass" id="loginpass" placeholder="Password" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="loginbtn" id="loginbtn" value="Login" class="btn-block bg-yellogreen form-control font-weight-bold text-light display-3">
                            <a href="forgotpassword.php" class="text-primary font-weight-bold text-font">Forgot password?</a>

                        
                        </td>
                    </tr>
                </table>
            </form>
        </div>
               
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>
 <!-------------------------------javascript------------------------------->
<script>
/*----------------------validateRegistrationForm-----------------------------*/
    function validateRegistrationForm()
    {
        if(document.getElementById('sname').value=="")
        {
            alert("Enter Name");
            return false;
        }
       /* if(document.getElementById('semail').value=="")
        {
            alert("Enter Email");
            return false;
        }
        if(document.getElementById('spass').value=="")
        {
            alert("Enter Password");
            return false;
        }
        if(document.getElementById('scpass').value=="")
        {
            alert("Enter Confirm Password");
            return false;
        }
        if(document.getElementById('smobile').value=="")
        {
            alert("Enter Mobile");
            return false;
        }
        if(document.getElementById('sstate').value=="")
        {
            alert("Select State");
            return false;
        }
        if(document.getElementById('scity').value=="")
        {
            alert("Select City");
            return false;
        }*/
    }
/*------------------------ajax_for_email------------------------------------*/
     function checkEmail(e)
        {
            var obj;
            if(window.XMLHttpRequest)
            {
                obj=new XMLHttpRequest();
            }
            else
            {
                obj=new ActiveXobject("Microsoft.XMLHTTP");
            }

            obj.onreadystatechange=function()
            {
                if(obj.readyState==4 && obj.status==200)
                {
                    document.getElementById("error").innerText=obj.responseText;
                }
            }
            obj.open("GET","checkemail.php?key="+e,true);
            obj.send();
        }
/*------------------------ajax_for_select box------------------------------------*/
 function getAllState(s)
 {
    var obj1;
    if(window.XMLHttpRequest)
    {
        obj1=new XMLHttpRequest();
    }
    else
    {
        obj1=new ActiveXObject("Microsoft.XMLHTTP");
    }

    obj1.onreadystatechange=function()
    {
        if(obj1.readyState==4 && obj1.status==200)
        {
            document.getElementById("scity").innerHTML=obj1.responseText;
        }
    }
    obj1.open("GET","city.php?key="+s,true);
    obj1.send();
 }
</script>
<?php
include("footer.php");
?>