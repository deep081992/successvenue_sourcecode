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
       <div class="col-md-8 justify-center">
           <div class="card">
               <div class="card-header bg-lightseagreen text-light text-font">
                   <h3>Register here!</h3>
               </div>
               <div class="card-body">
               

        <?php

            if(isset($_POST['register']))
            {
                $sname=(isset($_POST['firstname']))?$_POST['firstname']:"";
                $semail=(isset($_POST['semail']))?$_POST['semail']:"";
                $spass=(isset($_POST['spass']))?$_POST['spass']:"";
                $spass=password_hash($spass,PASSWORD_DEFAULT);
                $smobile=(isset($_POST['smobile']))?$_POST['smobile']:"";
                $sstate=(isset($_POST['sstate']))?$_POST['sstate']:"";
                $scity=(isset($_POST['scity']))?$_POST['scity']:"";
                date_default_timezone_set("Asia/Calcutta");
                $date_of_reg=date("Y-m-d h:i:s");
                $ip=$_SERVER['REMOTE_ADDR'];
                $token=md5(str_shuffle($sname.$spass.$smobile.$semail));


              //insert data into table

              $res=mysqli_query($conn,"insert into student_personal_data(firstname,semail,spassword,mobile,state,city,sdate_of_reg,ip,token) values('$sname','$semail','$spass','$smobile','$sstate','$scity','$date_of_reg','$ip','$token')");
              echo mysqli_error($conn);
             if(mysqli_affected_rows($conn)==1)
             {
                echo "<p class='alert alert-success'>Account created Successfully!</p>";
             }
             else
             {
                echo "<p class='alert alert-danger'>Sorry! Unable to create an account try again</p>";
             }
            }
            
        ?>
            <form method="post" action=""
             onsubmit="return validateRegistrationForm()">
                <table class="table">
                <tr>
                    <td>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="User's Name">
                    </td>
                </tr>

            <tr>
                <td>
                <input type="text" name="semail" id="semail" class="form-control" placeholder="Email" onblur="checkEmail(this.value)">
                <div class="text-danger" id="error_msg"></div>
             </td>
            </tr>

            <tr>
             <td>
                <input type="password" name="spass" id="spass" class="form-control" placeholder="Password">
             </td>
            </tr>

            <tr>
                <td>
                <input type="password" name="scpass" id="scpass" class="form-control" placeholder="Confirm Password">
                </td>
            </tr>

            <tr>
                 <td>
                <input type="text" name="smobile" id="smobile" class="form-control" placeholder="Contact Number">
                </td>
            </tr>

             <tr>
                <td>
<?php

    $res=mysqli_query($conn,"select distinct state as state from list_state_and_city ORDER BY `list_state_and_city`.`state` ASC");    
  ?>  
                 <select id="sstate" name="sstate" class="form-control" onchange="getAllState(this.value)">
                     <option value="1">Select State</option>
               <?php      
               
                while($row=mysqli_fetch_assoc($res))
                    {
                  ?>      
                       <option value="<?php echo $row['state'];?>"><?php echo $row['state'] ?></option>
                <?php       
                    }
                  ?>
                 </select>
                </td>
            </tr>

            <tr>
                <td>
                  <select id="scity" name="scity" class="form-control">
                     <option value="">Select City</option>
                      
                 </select>
                </td>
             </tr>

            <tr>
                <td>
                  <input type="submit" name="register" id="register" value="Register" class="form-control bg-lightseagreen text-light text-font" >
                  Already have an account?
                        <a href="#" class="text-yellowgreen" data-toggle="modal" data-target="#login-modal">Login</a>

                            
                </td>
             </tr>
            </form>
        </table>

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
                    document.getElementById("error_msg").innerText=obj.responseText;
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