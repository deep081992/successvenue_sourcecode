<?php
session_start();
if(isset($_SESSION['logintrue']) AND ($_SESSION['loginid']))
{
    include("header.php");
    $token=$_SESSION['logintrue'];
    $studentid=$_SESSION['loginid'];
 ?> 
   <section>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!--------First Slider---------->
                <img class="d-block w-100 h-50" src="img/banner/s5.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, fugit.</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <!--------Second Slider---------->
            <div class="carousel-item ">
                <img class=" d-block w-100 h-50" src="img/banner/s6.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, fugit.</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <!--------Third Slider---------->
            <div class="carousel-item">
                <img class="d-block w-100 h-50" src="img/banner/s2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, fugit.</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <!--------Fourth Slider---------->
            <div class="carousel-item">
                <img class="d-block w-100 h-50" src="img/banner/s1.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, fugit.</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<?php 
include("footer.php");
?>


<?php
}
else
{
    include("header.php");
?>
<!----------------slider------------------->
<section>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!--------First Slider---------->
                <img class="d-block w-100 h-50" src="img/banner/s5.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, fugit.</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <!--------Second Slider---------->
            <div class="carousel-item ">
                <img class=" d-block w-100 h-50" src="img/banner/s6.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, fugit.</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <!--------Third Slider---------->
            <div class="carousel-item">
                <img class="d-block w-100 h-50" src="img/banner/s2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, fugit.</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <!--------Fourth Slider---------->
            <div class="carousel-item">
                <img class="d-block w-100 h-50" src="img/banner/s1.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, fugit.</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section  style=" height:10;">
    <div class="row">
        <div class="col text-center mt-2">
            <h4>APPLY NOW IN TOP COLLEGES ACROSS INDIA</h4>
       <p>Single Application Form. Zero Application Cost. Unbeatable Scholarship Opportunity!</p>
       <a href="applicationform.php" class="btn btn-dark amber-text font-weight-bold">Apply Now</a>
        </div>
    </div>
</section>
<?php 
include("footer.php");
}    
?>