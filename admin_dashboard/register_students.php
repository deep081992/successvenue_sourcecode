<?php 
session_start();
if(isset($_SESSION['logintrue']))
{
  include("../connect.php");
  $res=mysqli_query($conn,"select * from student_personal_data");
  include("admin_header.php");
  ?>
   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Admin , Love to see you back. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />

                <div class="row" >
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default bg-warning">
                        <div class="panel-heading font-weight-bold ">
                           Active Registered Students List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                           <th>Email</th>
                                            <th>contact Number</th>
                                           <th>State</th>
                                            <th>City</th>
                                           <th>Remark</th>
                                        </tr>
                                    </thead>
                                      <?php
                        if(mysqli_num_rows($res)>0)
                        {
                          while($row=mysqli_fetch_assoc($res))
                          {
                            if($row['status']=='active')
                            {
                            ?>
                                    <tbody>
                                       
                                         <tr>
                              <td><?php echo $row['firstname']?></td>
                              <td><?php echo $row['semail']?></td>
                              <td><?php echo $row['mobile']?></td>
                              <td><?php echo $row['state']?></td>
                              <td><?php echo $row['city']?></td>
                              <td>
                                <?php
                                 $id=$row['studentid'];
                                 $form_status=$row['form_status'];
                                  if($form_status=='0')
                                  {
                                    
                                    ?>
                                    <a href="admin_updateform_status.php?key=<?php echo $row['studentid']?>" class="btn btn-warning">Form Not Filled</a>
                                    <?php
                                  }   
                                  else
                                  {
                                    ?>
                                      <button class="btn btn-success" disabled="">Form Filled</button>
                                      <?php
                                  }               
                                  ?>
                                
                              </td>
                            </tr>
                               <?php
                          }
                        }
                      }
                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
               
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
       
    <?php
    include("admin_footer.php");

}
 ?>
