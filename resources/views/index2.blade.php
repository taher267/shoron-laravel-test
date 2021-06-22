<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <!-- lightbox css -->
        <link href="{{asset('assets/css/lightbox.min.css')}}" rel="stylesheet">
        <!-- owl carousel css -->
        <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
        <!-- owl carousel theme css -->
        <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
        <!--  bootstrap css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- font Awesome css -->
        <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet">
        <!-- Custom font css -->
        <link href="{{asset('assets/customfonts/poppins.css')}}" rel="stylesheet">
        <!-- Custom css -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        
    </head>
    <body>
        <header id="header" class="fixed-top" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <span class="logo">
                            <img class="main_logo" id="main_logo" src="{{asset('assets/images/logo.png')}}" alt="Fitness Gym">
                            <img id="stiky_logo" class="stiky_logo" src="{{asset('assets/images/logo-fix.png')}}" alt="Fitness Gym">
                        </span>
                    </div>
                    <div class="col-sm-9 col-xs-12 nav_wrap">
                        <!--  Nav Start -->
                        <nav class="navbar navbar-expand-lg navbar-light  ">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav custom_nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Classes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Schedule</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Trainers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">News</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Contact Us</a>
                                        </li>
                                    </ul>
                                    <!--  <form class="d-flex">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit" >Search</button>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                
                <!--  Nav End -->
            </div>
            </header><!-- /header -->
            <!-- Banner Start -->
            <div id="home_banner" class="home_banner" style="background: url({{asset('assets/images/home-banner.jpg')}});">
                <div class="container">
                    <div class="banner_content" data-aos="fade-right">
                        <h1>BUILD YOUR BODY</h1>
                        <h2>STRONG</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quam libero, molestie in sapien sit amet, vestibulum ultricies est. Vestibulum ac odio a magna aliquet iaculis. Ut vehicula mauris a magna </p>
                        <a href="#" class="btn join_btn">JOIN WITH US</a>
                    </div>
                </div>
            </div>
            <!--Banner End -->
            
            <!-- pure javascript -->
            
            
            <!-- Start building -->
            <div class="building" style="background:url({{asset('assets/images/building_bg.png')}});">
                <!-- #f89830 url(../images/.png) no-repeat center top / cover -->
                <div class="container">
                    <div class="building-list">
                        <div class="row text-center">
                            <div class="col-lg-4 col-sm-12 ">
                                <div class="building-box">
                                <figure><img src="{{asset('assets/images/build1.png')}}" alt=""></figure>
                                <h4>BODY BUILDING</h4>
                                <p>Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.</p>
                                <a href="#classes-detail.html" class="btn">View Detail</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="building-box">
                            <figure><img src="{{asset('assets/images/build2.png')}}" alt=""></figure>
                            <h4>FITNESS & BOXING</h4>
                            <p>Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.</p>
                            <a href="" class="btn">View Detail</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="building-box">
                        <figure><img src="{{asset('assets/images/build3.png')}}" alt=""></figure>
                        <h4>YOGA</h4>
                        <p>Lorem ipsum dolor sit amet, ei veritus consetetur repudiandae eam, duo ne homero nostro moderatius.</p>
                        <a href="" class="btn">View Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End building sec -->
<!-- Start building -->
<div class="feature_class">
    <div class="container">
        <div class="freature_heading heading_right_line heading">
            <h3><span style="padding-right: 5px">FEATURED CLASSES </span> </h3>
        </div>
        <div class="feature-list">
            <div class="freature_slide owl-carousel heading_straight_owl_nav">
                <div class="col-lg-12 feature_box">
                    <div class="feature">
                        <img src="{{asset('assets/images/feature-thumb1.png')}}">
                        <div class="time_box">
                            <span class="date"><span>16 dec</span></span>
                            <span class="time"><span>6:30 am</span></span>
                        </div>
                    </div>
                    <h4><a href="#" >Weight Lifting</a></h4>
                </div>
                <div class="col-lg-12 feature_box">
                    <div class="feature">
                        <img src="{{asset('assets/images/feature-thumb2.png')}}">
                        <div class="time_box">
                            <span class="date"><span>16 dec</span>    </span>
                            <span class="time"><span>6:30 am</span></span>
                        </div>
                    </div>
                    <h4><a href="#" >Daily Yoga</a></h4>
                </div>
                <div class="col-lg-12 feature_box">
                    <div class="feature">
                        <img src="{{asset('assets/images/feature-thumb3.png')}}">
                        <div class="time_box">
                            <span class="date"><span>16 dec</span>    </span>
                            <span class="time"><span>6:30 am</span></span>
                        </div>
                    </div>
                    <h4><a href="#" >Running Way</a></h4>
                </div>
                <div class="col-lg-12 feature_box">
                    <div class="feature">
                        <img src="{{asset('assets/images/feature-thumb3.png')}}">
                        <div class="time_box">
                            <span class="date"><span>16 dec</span>    </span>
                            <span class="time"><span>6:30 am</span></span>
                        </div>
                    </div>
                    <h4><a href="#" >Running Way</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End building sec -->
<!-- Muscle Start -->
<div class="container-fluid m-0 p-0">
    <div class="row  m-0">
        <div class="col-lg-6 muscle_feature p-0"> <!--  -->
        <img src="{{asset('assets/images/mucle-img.png')}}" alt="">
    </div>
    <div class="col-lg-6 muscle_content"> <!-- m-0 p-0 -->
    <div class="muscle_para">
        <h3>MUSCLE BUILDING</h3>
        <h4>12-Week Bulking Trainer Expert Brandon Poe</h4>
        <a href="" class="btn">JOIN WITH US</a>
    </div>
</div>
</div>
</div>
<!-- Muscle End  -->
<!--  Expart Trainers Start-->
<div class="expart_trainers div_bg" style="background: url({{asset('assets/images/trainers_bg.png')}});">
<div class="container">
<div class="expart_heading heading_right_line heading">
    <h3><span style="padding-right: 5px">EXPERT TRAINERS</span> </h3>
</div>
<div class="trainer_list">
    <div class="trainer_slide owl-carousel heading_straight_owl_nav">
        <div class="col-lg-12 trainer_box">
            <div class="feature">
                <img src="{{asset('assets/images/trainer1.png')}}">
            </div>
            <span class="trainer_name">justin hessen</span>
        </div>
        <div class="col-lg-12 trainer_box">
            <div class="feature">
                <img src="{{asset('assets/images/trainer2.png')}}">
            </div>
            <span class="trainer_name">justin hessen</span>
        </div>
        <div class="col-lg-12 trainer_box">
            <div class="feature">
                <img src="{{asset('assets/images/trainer3.png')}}">
            </div>
            <span class="trainer_name">justin hessen</span>
        </div>
        <div class="col-lg-12 trainer_box">
            <div class="feature">
                <img src="{{asset('assets/images/trainer4.png')}}">
            </div>
            <span class="trainer_name">justin hessen</span>
        </div>
        <div class="col-lg-12 trainer_box">
            <div class="feature">
                <img src="{{asset('assets/images/trainer5.png')}}">
            </div>
            <span class="trainer_name">justin hessen</span>
        </div>
    </div>
</div>
</div>
</div>
<!--  Expart Trainers End -->
<!--  Gallery Start-->
<div class="gallery ">
<div class="container">
<div class="gallery_heading heading">
    <h3>Our Gallery</h3>
</div>
<ul class="tabs">
    <li class="active"><span data-filter="*">All</span></li>
    <li><span data-filter=".yoga">Yoga</span></li>
    <li><span data-filter=".running">Running</span></li>
    <li><span data-filter=".gym">Gym</span></li>
    <li><span data-filter=".fitness">Fitness</span></li>
</ul>
<div class="gallery_list">
    <div class="row grid_list">
        <div class="col-lg-3 col-sm-12 element-item yoga">
            <div class="gallery_box">
                <img class="featured" src="{{asset('assets/images/gallery1.png')}}" alt="">
                <a href="#" class="gallery_overlay">
                    <i class="fa fa-search-plus"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 element-item running">
            <div class="gallery_box">
                <div class="gallary_fig"><img src="{{asset('assets/images/gallery2.png')}}" alt=""></div>
                <a href="{{asset('assets/images/gallery1.png')}}" class="gallery_overlay"><i class="fa fa-search-plus"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--  Gallary End -->
<!-- Start building -->
<div class="latest_news ">
<div class="container">
<div class="latest_news_heading heading">
    <h3><span style="padding-right: 5px">latest news</span> </h3>
</div>
<div class="latest_news_list">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="news_box">
                <div class="featured">
                    <img src="{{asset('assets/images/news-img1.png')}}" alt="">
                    <div class="date">
                        <span>JAN</span>
                        <strong>20</strong>
                    </div>
                </div>
                <h4>Lorem ipsum dolor sit amet</h4>
                <p>Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus. <a href="news-detail.html">Read More...</a></p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<footer class="footer " >
<div class="footer_top div_bg" style="background: url({{asset('assets/images/footer_bg.png')}});">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-12 widget widget-1">
            <h4>about</h4>
            <div class="about_content content">
                <p>Lorem ipsum dolor sit amet, ei ubique fastidii vim. Elitr feugait complectitur eu pro, sea audire ponderum eleifend cu.</p>
                <p> <i class="fa fa-map-marker-alt"></i> 23 New Design Street, Melbourne</p>
                <p> <i class="fa fa-envelope"></i>fitnessgym@gmail.com</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i>+880-123-456-7890</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 widget widget-2">
            <h4>newsletter</h4>
            <div class="newsletter_content content">
                <p>Lorem ipsum dolor sit amet, ei ubique fastidii vim. Elitr feugait complectitur eu pro, sea audire ponderum eleifend cu.sign up for our mailing list to get latest updates and offers</p>
                <form class="form clearfix">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control outline-none" placeholder="Enter Your Email" aria-label="Enter Your Email" aria-describedby="basic-addon2">
                        <button type="submit" onclick="return false" class="input-group-text" id="basic-addon2" name=""><i class="fa fa-long-arrow-alt-right"></i></button>
                    </div>
                </form>
                <div class="foot_social clearfix">
                    <ul class="list-inline list-unstyled">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></a></i></li>
                        
                    </ul>
                    </div> <!-- end foot social -->
                    </div><!-- end newsletter_content -->
                    </div><!-- end widget-2 -->
                    <div class="col-lg-4 col-sm-12 widget widget-3">
                        <h4>FLICKR PHOTOS</h4>
                        <div class="about_content content">
                            <div class="row flicker_box cleafix">
                                    <div class="col-lg-4 flicker_item"><a href="{{asset('assets/images/flic1B.png')}}"><img src="{{asset('assets/images/flic1.png')}}" alt=""></a></div>
                                    <div class="col-lg-4 flicker_item"><a href="{{asset('assets/images/flic2B.png')}}"><img src="{{asset('assets/images/flic2.png')}}" alt=""></a></div>
                                    <div class="col-lg-4 flicker_item"><a href="{{asset('assets/images/flic3B.png')}}"><img src="{{asset('assets/images/flic3.png')}}" alt=""></a></div>
                                    <div class="col-lg-4 flicker_item"><a href="{{asset('assets/images/flic3B.png')}}"><img src="{{asset('assets/images/flic3.png')}}" alt=""></a></div>
                                    <div class="col-lg-4 flicker_item"><a href="{{asset('assets/images/flic5B.png')}}"><img src="{{asset('assets/images/flic5.png')}}" alt=""></a></div>
                                    <div class="col-lg-4 flicker_item"><a href="{{asset('assets/images/flic6B.png')}}"><img src="{{asset('assets/images/flic6.png')}}" alt=""></a></div>
                            </div>
                            <!-- <ul class="flicker_box clearfix">
                                <li><a href="{{asset('assets/images/flic1B.png')}}"><img src="{{asset('assets/images/flic1.png')}}" alt=""></a></li>
                                <li><a href="{{asset('assets/images/flic2B.png')}}"><img src="{{asset('assets/images/flic2.png')}}" alt=""></a></li>
                                <li><a href="{{asset('assets/images/flic3B.png')}}"><img src="{{asset('assets/images/flic3.png')}}" alt=""></a></li>
                                <li><a href="{{asset('assets/images/flic4B.png')}}"><img src="{{asset('assets/images/flic4.png')}}" alt=""></a></li>
                                <li><a href="{{asset('assets/images/flic5B.png')}}"><img src="{{asset('assets/images/flic5.png')}}" alt=""></a></li>
                                <li><a href="{{asset('assets/images/flic6B.png')}}"><img src="images/flic6.png" alt=""></a></li>
                            </ul> -->
                        </div>
                        </div> <!-- end widget 3-->
                    </div> <!-- end Row-->
                </div><!-- end Cointainer-->
            </div><!-- end footer_top-->
            <div class="footer_copyright text-center">
                <div class="container">
                    <div class="col-lg-12 col-sm-12">
                        <p><a href="#">Shoron </a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End building sec -->
        <!-- Jquery -->
        <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>        
        <!-- lightbox JS -->
        <script src="{{asset('assets/js/lightbox.min.js')}}"></script>
        <!-- isotope JS -->
        <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
        <!-- Owl Carousle JS -->
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <!-- Fontawesome JS -->
        <!-- <script src="{{asset('assets/js/all.min.js')}}"></script> -->
        <!-- Bootstrap JS -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script type="text/javascript">
        </script>
    </body>
</html>