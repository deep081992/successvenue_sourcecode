<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Success Venue</title>
	<link rel="stylesheet" href="">
</head>
<body>
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
</body>
</html>