<?php
session_start();
include('includes/config.php');
error_reporting(0);
include('includes/header.php');
?>
<!-- end loader -->
<div class="full_bg">
    <!-- header -->
    <header class="header-area">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3">
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="#" width="150" />
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-9">
                    <div class="navbar-area">
                        <nav class="site-navbar">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="shop.php">Meats</a></li>
                                <li><a class="active" href="faq.php">FAQS</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                            <button class="nav-toggler">
                                <span></span>
                            </button>
                        </nav>
                    </div>
                </div>
                <div class="col-md-1 padd_0 d_none">
                    <ul class="email text_align_right">
                            <li>
                            <a href="shopping-cart.php">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">
                                        <div class="badge">
                                            <?php 
                                            if(isset($_SESSION['cart'])){
                                                $cart = mysqli_query($con,"SELECT * FROM cart WHERE order_id = '".$_SESSION['cart']."'");
                                                $count = mysqli_num_rows($cart);
                                                echo $count;
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </div>
                                    </i>
                           </a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- top -->
    <div class="slider_main">
        <!-- carousel code -->
        <div id="banner1" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
            <ol class="carousel-indicators">
                <li data-target="#banner1" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <picture>
                        <source srcset="images/about-banner.png" class="img-fluid">

                        <img srcset="images/about-banner.png" alt="responsive image" class="about-banner img-fluid d-block">
                    </picture>
                    <div class="carousel-caption" style="top: 25% !important;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slider_content">
                                        <h1 class="header-text">Queries? Concerns?</h1>
                                        <h1 class="sub-text text-bold">
                                            FREQUENTLY ASKED QUESTIONS
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.carousel-item -->
                </div>
            </div>
        </div>
    </div>
    <!-- end banner -->
    <!-- about -->
    <div class="about mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" style="font-size: 30px;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How do I place an order?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">

                                    <p>
                                        We can happily receive your payments from one of the following accounts:
                                    </p>
                                    <br>
                                    <p>

                                    <b>BDO</b> - Online banking or Over the counter deposit
                                        PAUL JOHN AGDON
                                        006860044321
                                        Savings Account
                                        <Br>
                                        <b>BPI</b> - Online banking or Over the counter deposit
                                        PAUL JOHN AGDON
                                        1889219579
                                        Savings Account
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" style="font-size: 30px;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    How do I reheat the packaged food?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>
<b>SIMMER</b><br>
1.Fill pot with enough water to submerge bag. Using stove or induction plate, bring it boil and then simmer on low heat.<br>
2.Simmer the bag for 15 minutes.<br>
3.Remove the bag from the water. Open the bag and set juices aside.<br>
4.Pour some remaining juices on the meat and baste it with sauce.<br>
                                       
                                    
<br><br>

<b>SOUS VIDE</b><br>
1. Pre-heat water bath to 65°C.<br>
2.Fully submerge bag for 30 minutes (1 hour if frozen)<br>
3.Remove the bag from the water bath. Open the bag and set juices aside.<br>
4.Pour some remaining juices on the meat and baste it with sauce.<br><br>





<b>NOTE: Use of microwave reheating can diminish the quality of the product.</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" style="font-size: 30px;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    How many people is each order suitable for?
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo ducimus omnis, tempora necessitatibus facilis ipsum, sed dolorum quasi pariatur, consequuntur magni neque labore vel nostrum nemo distinctio autem esse amet?</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" style="font-size: 30px;" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        Do you accept personal pick-up?
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseFour" class="collapse" style="font-size: 30px;" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Yes, we accept personal pick-up</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- end about -->


        <!--  footer -->
        <?php
        include('includes/footer.php');
        ?>