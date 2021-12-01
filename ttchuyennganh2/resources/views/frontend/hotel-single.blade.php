<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Detail</title>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>
<body>
<!-- start cssload-loader -->
<div class="preloader" id="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href="#"><i class="la la-phone mr-1"></i>(123) 123-456</a></li>
                                <li><a href="#"><i class="la la-envelope mr-1"></i>nhom16@example.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-right d-flex align-items-center justify-content-end">
                          
                            @if (session('userName')!= null)
                            @php
                                echo "welcome ". session('userName');
                            @endphp
                            <a href="{{URL::route('logout')}}" style="margin-left: 10px;">Log out</a>
                            @else
                            <div class="header-right-action">
                                <a href="{{ route("login.register") }}" class="theme-btn theme-btn-small theme-btn-transparent mr-1">Sign Up</a>
                                <a href="{{ route("login") }}" class="theme-btn theme-btn-small">Login</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu-wrapper padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper"> 
                        <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                        <div class="logo">
                            <a href="{{ route("home.index") }}"><img height="50px" src="{{ asset('assets/upload/img/logo2.png') }}" alt="logo"></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                        </div><!-- end logo -->
                        <div class="main-menu-content">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ route("home.index") }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route("hotel.index") }}">Hotel</a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->

<!-- ================================
    START BREADCRUMB TOP BAR
================================= -->
<section class="breadcrumb-top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-list breadcrumb-top-list">
                    <ul class="list-items bg-transparent radius-none p-0">
                        <li><a href="{{ route("home.index") }}">Home</a></li>
                        <li><?php echo $data->country; ?></li>
                        <li><?php echo $data->name; ?></li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-top-bar -->
<!-- ================================
    END BREADCRUMB TOP BAR
================================= -->

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-7 py-0">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-btn">
                        <div class="btn-box">
                            <a class="theme-btn" data-fancybox="video" data-src="https://www.youtube.com/watch?v=5u1WISBbo5I"
                               data-speed="700">
                                <i class="la la-video-camera mr-2"></i>Video
                            </a>
                            <a class="theme-btn" data-src="{{ asset('assets/upload/img/1617541117_img4.jpg ') }}"
                               data-fancybox="gallery"
                               data-speed="700">
                                <i class="la la-photo mr-2"></i>More Photos
                            </a>
                            <?php foreach($getImages as $rows): ?>
                                <a class="d-none"
                                data-fancybox="gallery"
                                data-src="{{ asset('assets/upload/img/'.$rows->name) }}"
                                data-speed="700"></a>
                            <?php endforeach; ?>
                        </div>
                        
                    </div><!-- end breadcrumb-btn -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START TOUR DETAIL AREA
================================= -->
<section class="tour-detail-area padding-bottom-90px">
    <div class="single-content-navbar-wrap menu section-bg" id="single-content-navbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content-nav" id="single-content-nav">
                        <ul>
                            <li><a data-scroll="description" href="#description" class="scroll-link active">Hotel Details</a></li>
                            <li><a data-scroll="availability" href="#availability" class="scroll-link">Availability</a></li>
                            <li><a data-scroll="amenities" href="#amenities" class="scroll-link">Amenities</a></li>
                            <li><a data-scroll="faq" href="#faq" class="scroll-link">Faq</a></li>
                            <li><a data-scroll="reviews" href="#reviews" class="scroll-link">Reviews</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single-content-navbar-wrap -->
    <div class="single-content-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content-wrap padding-top-60px">
                        <div id="description" class="page-scroll">
                            <div class="single-content-item pb-4">
                                <h3 class="title font-size-26"><?php echo $data->name; ?></h3>
                                <div class="d-flex align-items-center pt-2">
                                    <p class="mr-2"><?php echo $data->city; ?>, <?php echo $data->country; ?></p>
                                    <p>
                                        <span class="badge badge-warning text-white font-size-16">4.7</span>
                                        <span>(4,209 Reviews)</span>
                                    </p>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item py-4">
                                <div class="row">
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-hotel"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Hotel Type</h3>
                                                <span class="font-size-13"><?php echo $data->hotel_type; ?> Star</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Extra People</h3>
                                                <span class="font-size-13"><?php echo $data->extra_people; ?></span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-bed"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Minimum Stay</h3>
                                                <span class="font-size-13"><?php echo $data->minium_stay; ?> Nights</span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-money"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Security Deposit</h3>
                                                <span class="font-size-13">$<?php echo $data->price; ?></span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-globe"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">Country</h3>
                                                <span class="font-size-13"><?php echo $data->country; ?></span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 responsive-column">
                                        <div class="single-tour-feature d-flex align-items-center mb-3">
                                            <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                <i class="la la-map"></i>
                                            </div>
                                            <div class="single-feature-titles">
                                                <h3 class="title font-size-15 font-weight-medium">City</h3>
                                                <span class="font-size-13"><?php echo $data->city; ?></span>
                                            </div>
                                        </div><!-- end single-tour-feature -->
                                    </div><!-- end col-lg-4 -->
                                </div><!-- end row -->
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">About <?php echo $data->name; ?></h3>
                                @php
                                    echo $data->description;
                                @endphp
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end description -->
                        <div id="availability" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-30px">
                                <h3 class="title font-size-20">Available Rooms</h3>
                                @php
                                    $i=0;
                                @endphp
                                 
                                <?php foreach($room as $rows): ?>
                                
                                @php
                                    $i++;
                                @endphp
                                <input type="hidden" value="<?php echo $rows->id ?>" id="b<?php echo $i?>">
                                <div class="cabin-type padding-top-30px">
                                    <div class="cabin-type-item seat-selection-item d-flex">
                                        <div class="cabin-type-img flex-shrink-0">
                                            <img src="{{ asset('assets/upload/img/'.$rows->img) }}" alt="">
                                        </div>
                                        <div class="cabin-type-detail">
                                            <h3 class="title"><?php echo $rows->name; ?></h3>
                                            <div class="row padding-top-20px">
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-wifi"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">Free Wi-Fi</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-bed"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">2 Single beds</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6 responsive-column">
                                                    <div class="single-tour-feature d-flex align-items-center mb-3">
                                                        <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                            <i class="la la-building"></i>
                                                        </div>
                                                        <div class="single-feature-titles">
                                                            <h3 class="title font-size-15 font-weight-medium">15 m²</h3>
                                                        </div>
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                 <div class="col-lg-6 responsive-column">
                                                     <div class="single-tour-feature d-flex align-items-center mb-3">
                                                         <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-2">
                                                             <i class="la la-hotel"></i>
                                                         </div>
                                                         <div class="single-feature-titles">
                                                             <h3 class="title font-size-15 font-weight-medium">Shower and bathtub</h3>
                                                         </div>
                                                     </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                            
                                        </div>
                                        <div class="cabin-price">
                                            <div style="font-size: 20px;margin-top: 20px;color:#2273e5;"><label for="selectChb<?php echo $i ?>">SELECT</label>
                                                <input type="checkbox" id="selectChb<?php echo $i ?>"  onclick="a<?php echo $i ?>()">
                                            </div>
                                               
                                        </div>
                                    </div><!-- end cabin-type-item -->
                                </div><!-- end cabin-type -->
                                <?php endforeach; ?>
                                <script>
                                    function a4(){
                                            document.getElementById("room123").value = document.getElementById("b4").value;
                                            document.getElementById("selectChb2").checked= false;
                                            document.getElementById("selectChb3").checked= false;
                                            document.getElementById("selectChb1").checked= false;
                                    }
                                    function a3(){
                                            document.getElementById("room123").value = document.getElementById("b3").value;
                                            document.getElementById("selectChb2").checked= false;
                                            document.getElementById("selectChb4").checked= false;
                                            document.getElementById("selectChb1").checked= false;
                                    }
                                    function a2(){
                                            document.getElementById("room123").value = document.getElementById("b2").value;
                                            document.getElementById("selectChb4").checked= false;
                                            document.getElementById("selectChb3").checked= false;
                                            document.getElementById("selectChb1").checked= false;
                                    }
                                    function a1(){
                                            document.getElementById("room123").value = document.getElementById("b1").value;
                                            document.getElementById("selectChb2").checked= false;
                                            document.getElementById("selectChb3").checked= false;
                                            document.getElementById("selectChb4").checked= false;
                                    }
                                </script>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end location-map -->
                        <div id="amenities" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-20px">
                                <h3 class="title font-size-20">Amenities</h3>
                                <div class="amenities-feature-item pt-4">
                                    <div class="row">
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-wifi"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">WI-FI</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-check"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Swimming Pool</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-television"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Television</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-coffee"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Coffee</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-tree"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Air Conditioning</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-gear"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Fitness Facility</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-check"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Fridge</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-glass"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Wine Bar</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-music"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Entertainment</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-lock"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Secure Vault</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                         <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-car"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Pick And Drop</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-check"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Room Service</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-check-circle"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Pets Allowed</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-coffee"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Breakfast</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-car"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Free Parking</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-fire"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Fire Place</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-wheelchair"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Handicap Accessible</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-user-secret"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Doorman</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-building"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Elevator In Building</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-gift"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Suitable For Events</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 responsive-column">
                                            <div class="single-tour-feature d-flex align-items-center mb-3">
                                                <div class="single-feature-icon icon-element ml-0 flex-shrink-0 mr-3">
                                                    <i class="la la-gamepad"></i>
                                                </div>
                                                <div class="single-feature-titles">
                                                    <h3 class="title font-size-15 font-weight-medium">Play Place</h3>
                                                </div>
                                            </div><!-- end single-tour-feature -->
                                        </div><!-- end col-lg-4 -->
                                    </div><!-- end row -->
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end faq -->
                        <div id="faq" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">FAQs</h3>
                                <div class="accordion accordion-item padding-top-30px" id="accordionExample2">
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseFour" aria-expanded="true" aria-controls="faqCollapseFour">
                                                    <span class="ml-3">How do I know a reservation is accepted or confirmed?</span>
                                                    <i class="la la-minus"></i>
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseFour" class="collapse show" aria-labelledby="faqHeadingFour" data-parent="#accordionExample2">
                                            <div class="card-body d-flex">
                                                <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingFive">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                                                    <span class="ml-3">Am I allowed to decline reservation requests?</span>
                                                    <i class="la la-minus"></i>
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseFive" class="collapse" aria-labelledby="faqHeadingFive" data-parent="#accordionExample2">
                                            <div class="card-body d-flex">
                                                <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingSix">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseSix" aria-expanded="false" aria-controls="faqCollapseSix">
                                                    <span class="ml-3">What happens if I let a reservation request expire?</span>
                                                    <i class="la la-minus"></i>
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseSix" class="collapse" aria-labelledby="faqHeadingSix" data-parent="#accordionExample2">
                                            <div class="card-body d-flex">
                                                <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="faqHeadingSeven">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faqCollapseSeven" aria-expanded="false" aria-controls="faqCollapseSeven">
                                                    <span class="ml-3">How do I set reservation requirements?</span>
                                                    <i class="la la-minus"></i>
                                                    <i class="la la-plus"></i>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="faqCollapseSeven" class="collapse" aria-labelledby="faqHeadingSeven" data-parent="#accordionExample2">
                                            <div class="card-body d-flex">
                                                <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end faq -->
                        <div id="reviews" class="page-scroll">
                            <div class="single-content-item padding-top-40px padding-bottom-40px">
                                <h3 class="title font-size-20">Reviews</h3>
                                <div class="review-container padding-top-30px">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="review-summary">
                                                <h2><?php echo isset($avgRate) ? number_format($avgRate,1) : '5'; ?><span>/5</span></h2>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-8">
                                            <div class="review-bars">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="progress-item">
                                                            <h3 class="progressbar-title">Total star</h3>
                                                            <div class="progressbar-content line-height-20 d-flex align-items-center justify-content-between">
                                                                <div class="progressbar-box flex-shrink-0">
                                                                    <?php  $a = isset($avgRate) ? number_format($avgRate,1) : '5';
                                                                            $avg = ($a/5)*100; ?>
                                                                    <div class="progressbar-line" data-percent="<?php echo $avg; ?>%">
                                                                        <div class="progressbar-line-item bar-bg-1"></div>
                                                                    </div> <!-- End Skill Bar -->
                                                                </div>
                                                                <div class="bar-percent"><?php echo isset($avgRate) ? number_format($avgRate,1) : '5'; ?></div>
                                                            </div>
                                                        </div><!-- end progress-item -->
                                                    </div><!-- end col-lg-6 -->
                                                </div><!-- end row -->
                                            </div>
                                        </div><!-- end col-lg-8 -->
                                    </div>
                                </div>
                            </div><!-- end single-content-item -->
                            <div class="section-block"></div>
                        </div><!-- end reviews -->
                        <div class="review-box">
                            <div class="single-content-item padding-top-40px">
                                <h3 class="title font-size-20">Showing <?php echo count($rate) ?> guest reviews</h3>
                                <?php foreach ($rate as $rows): ?>
                                <div class="comments-list padding-top-50px">
                                    <div class="comment-body">
                                            <div class="meta-data">
                                                <h3 class="comment__author"><?php echo $rows->name; ?></h3>
                                                <div class="meta-data-inner d-flex">
                                                    <span class="ratings d-flex align-items-center mr-1">
                                                        <?php for($i=1;$i<=$rows->total_star;$i++): ?>
                                                        <i class="la la-star"></i>
                                                        <?php endfor; ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <p class="comment-content">
                                                <?php echo $rows->message; ?>
                                            </p>    
                                        </div>
                                </div><!-- end comments-list -->
                               <?php endforeach ?>
                                <div class="comment-forum padding-top-40px">
                                    <div class="form-box">
                                        <div class="form-title-wrap">
                                            <h3 class="title">Write a Review</h3>
                                        </div><!-- form-title-wrap -->
                                        <div class="form-content">
                                            <div class="rate-option p-2">
                                                <div class="row">
                                                    <div class="col-lg-4 responsive-column">
                                                        <div class="rate-option-item">
                                                            <label onclick="star1()">Total rating</label>
                                                            <div class="rate-stars-option">
                                                                <input type="checkbox" id="lst1">
                                                                <label for="lst1"  onclick="star5()"></label>
                                                                <input type="checkbox" id="lst2">
                                                                <label for="lst2" onclick="star4()"></label>
                                                                <input type="checkbox" id="lst3">
                                                                <label for="lst3" onclick="star3()"></label>
                                                                <input type="checkbox" id="lst4">
                                                                <label for="lst4" onclick="star2()"></label>
                                                                <input type="checkbox" id="lst5">
                                                                <label for="lst5" onclick="star1()"></label>
                                                            </div>
                                                        </div>
                                                    </div><!-- col-lg-4 -->
                                                </div><!-- end row -->
                                            </div><!-- end rate-option -->
                                            <div class="contact-form-action">
                                                <form method="post" action="">
                                                    {{ csrf_field()}}
                                                    <input type="hidden" name="star" id="star">
                                                    <script>
                                                        function star1(){
                                                            document.getElementById('star').value = 1;
                                                        }
                                                        function star2(){
                                                            document.getElementById('star').value = 2;
                                                        }
                                                        function star3(){
                                                            document.getElementById('star').value = 3;
                                                        }
                                                        function star4(){
                                                            document.getElementById('star').value = 4;
                                                        }
                                                        function star5(){
                                                            document.getElementById('star').value = 5;
                                                        }
                                                    </script>
                                                    <div class="row">
                                                        <div class="col-lg-6 responsive-column">
                                                            <div class="input-box">
                                                                <label class="label-text">Your nick name</label>
                                                                <div class="form-group">
                                                                    <span class="la la-user form-icon"></span>
                                                                    <input class="form-control" type="text" name="name" placeholder="Your name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="input-box">
                                                                <label class="label-text">Message</label>
                                                                <div class="form-group">
                                                                    <span class="la la-pencil form-icon"></span>
                                                                    <textarea class="message-control form-control" name="message" placeholder="Write message" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                @if (session('userName')!= null)
                                                                     <input type="submit" value="Leave a Review"  class="theme-btn">
                                                                @else
                                                                    <a href="{{ route("login") }}" class="theme-btn theme-btn-small">Login to review</a>
                                                                @endif
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- end contact-form-action -->
                                        </div><!-- end form-content -->
                                    </div><!-- end form-box -->
                                </div><!-- end comment-forum -->
                            </div><!-- end single-content-item -->
                        </div><!-- end review-box -->
                    </div><!-- end single-content-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar single-content-sidebar mb-0">
                        <div class="sidebar-widget single-content-widget">
                            <div class="sidebar-widget-item">
                                <div class="sidebar-book-title-wrap mb-3">
                                    <h3>Popular</h3>
                                    <p><span class="text-form">From</span><span class="text-value ml-2 mr-1">$<?php echo $data->price-(($data->price*$data->discount)/100) ?></span> <span class="before-price">$<?php echo $data->price ?></span></p>
                                </div>
                            </div><!-- end sidebar-widget-item -->
                            <div class="sidebar-widget-item">
                                <div class="contact-form-action">
                                    {{-- <form action="../paymentDetail/<?php echo $data->id ?>" method="POST">
                                        {{ csrf_field()}} --}}
                                        <input type="hidden" id="room123" name="room_id">
                                        <div class="input-box">
                                            <label class="label-text">Check in - Check out</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text" name="daterange" id="daterange" readonly>
                                            </div>
                                        </div>
                                        <div class="input-box">
                                            <label class="label-text">Rooms</label>
                                            <div class="form-group">
                                                <div class="select-contain w-auto">
                                                    <select class="select-contain-select" name="rooms" id="rooms">
                                                        <option value="0">Select Rooms</option>
                                                        <option value="1">1 Room</option>
                                                        <option value="2">2 Rooms</option>
                                                        <option value="3">3 Rooms</option>
                                                        <option value="4">4 Rooms</option>
                                                        <option value="5">5 Rooms</option>
                                                        <option value="6">6 Rooms</option>
                                                        <option value="7">7 Rooms</option>
                                                        <option value="8">8 Rooms</option>
                                                        <option value="9">9 Rooms</option>
                                                        <option value="10">10 Rooms</option>
                                                        <option value="11">11 Rooms</option>
                                                        <option value="12">12 Rooms</option>
                                                        <option value="13">13 Rooms</option>
                                                        <option value="14">14 Rooms</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sidebar-widget-item">
                                            <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                                <label class="font-size-16">People <span>Age 18+</span></label>
                                                <div class="qtyBtn d-flex align-items-center">
                                                    <div class="qtyDec"><i class="la la-minus"></i></div>
                                                    <input type="text" name="qtyInput1" id="adult" value="0">
                                                    <div class="qtyInc"><i class="la la-plus"></i></div>
                                                </div>
                                            </div><!-- end qty-box -->
                                            <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                                <label class="font-size-16">Children <span>2-12 years old</span></label>
                                                <div class="qtyBtn d-flex align-items-center">
                                                    <div class="qtyDec"><i class="la la-minus"></i></div>
                                                    <input type="text" name="qtyInput2" id="children" value="0">
                                                    <div class="qtyInc"><i class="la la-plus"></i></div>
                                                </div>
                                            </div><!-- end qty-box -->                            
                                        </div><!-- end sidebar-widget-item -->
                                        <input type="button" class="btn btn-primary" value="Book Now" style="font-size: 18px; padding:10px 100px ;margin-top: 15px ;margin-left:10px;" onclick="asd123()">
                                        <script>
                                            function asd123(){
                                                var daterange = document.getElementById("daterange").value;
                                                var rooms = document.getElementById("rooms").value;
                                                var people = parseInt(document.getElementById("adult").value) + parseInt(document.getElementById("children").value);
                                                var room_id = document.getElementById("room123").value;
                                                daterange1 = daterange.replaceAll('/','-'    );
                                                if(document.getElementById("rooms").value ==0)
                                                { alert("Vui lòng nhập số phòng")}
                                                else if(document.getElementById("adult").value == 0 && document.getElementById("children").value ==0)
                                                { alert("Vui lòng nhập số lượng người")}
                                                else if(isNaN(parseInt(document.getElementById("room123").value)) == true)
                                                { alert("Vui lòng chọn loại phòng")}
                                                else{location.replace("../paymentDetail/<?php echo $data->id ?>/"+daterange1+"/"+rooms+"/"+people+"/"+room_id);}
                                            }
                                        </script>
                                    {{-- </form> --}}
                                </div>
                            </div><!-- end sidebar-widget-item -->
                            
                            <div class="btn-box pt-2">                                                        
                                <div class="d-flex align-items-center justify-content-between pt-2">
                                    <a href="#" class="btn theme-btn-hover-gray font-size-15" data-toggle="modal" data-target="#sharePopupForm"><i class="la la-share mr-1"></i>Share</a>
                                    <p><i class="la la-eye mr-1 font-size-15 color-text-2"></i>3456</p>
                                </div>
                            </div>
                        </div><!-- end sidebar-widget -->
                        <!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Why Book With Us?</h3>
                            <div class="sidebar-list">
                                <ul class="list-items">
                                    <li><i class="la la-dollar icon-element mr-2"></i>No-hassle best price guarantee</li>
                                    <li><i class="la la-microphone icon-element mr-2"></i>Customer care available 24/7</li>
                                    <li><i class="la la-thumbs-up icon-element mr-2"></i>Hand-picked Tours & Activities</li>
                                    <li><i class="la la-file-text icon-element mr-2"></i>Free Travel Insureance</li>
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget single-content-widget">
                            <h3 class="title stroke-shape">Get a Question?</h3>
                            <p class="font-size-14 line-height-24">Do not hesitate to give us a call. We are an expert team and we are happy to talk to you.</p>
                            <div class="sidebar-list pt-3">
                                <ul class="list-items">
                                    <li><i class="la la-phone icon-element mr-2"></i><a href="#">+ 61 23 8093 3400</a></li>
                                    <li><i class="la la-envelope icon-element mr-2"></i><a href="mailto:info@trizen.com">info@trizen.com</a></li>
                                </ul>
                            </div><!-- end sidebar-list -->
                        </div><!-- end sidebar-widget -->
                       
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end single-content-box -->
</section><!-- end tour-detail-area -->
<!-- ================================
    END TOUR DETAIL AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START RELATE TOUR AREA
================================= -->
<section class="related-tour-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">You might also like</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <?php foreach($suggest as $rows): ?>
                <div class="col-lg-4 responsive-column">
                    <div class="card-item">
                        <div class="card-img">
                            <a href="{{ route("hotelDetail.index", ["id"=>$rows->id]) }}" class="d-block">
                                <img src="{{ asset('assets/upload/img/'.$rows->img) }}" alt="hotel-img">
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><a href="{{ route("hotelDetail.index", ["id"=>$rows->id]) }}"><?php echo $rows->name ?></a></h3>
                            <p class="card-meta"><?php echo $rows->city ?>, <?php echo $rows->country ?></p>
                            <div class="card-price d-flex align-items-center justify-content-between">
                                <p>
                                    <span class="price__from">From</span>
                                    <span class="price__num">$<?php echo $rows->price-(($rows->price*$rows->discount)/100) ?></span>
                                    <span class="price__text">Per night</span>
                                </p>
                                <a href="{{ route("hotelDetail.index", ["id"=>$rows->id]) }}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                            </div>
                        </div>
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
            <?php endforeach; ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end related-tour-area -->
<!-- ================================
    END RELATE TOUR AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2 class="sec__title font-size-30 text-white">Subscribe to see Secret Deals</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="subscriber-box">
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text text-white">Enter email address</label>
                                <div class="form-group mb-0">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                    <button class="theme-btn theme-btn-small submit-btn" type="submit">Subscribe</button>
                                    <span class="font-size-14 pt-1 text-white-50"><i class="la la-lock mr-1"></i>Don't worry your information is safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area section-bg padding-top-100px padding-bottom-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <div class="footer-logo padding-bottom-30px">
                        <a href="{{ route("home.index") }}"><img height="50px" src="{{ asset('assets/upload/img/logo2.png') }}" ></a>
                    </div><!-- end logo -->
                    <p class="footer__desc">Morbi convallis bibendum urna ut viverra. Maecenas consequat</p>
                    <ul class="list-items pt-3">
                        <li>3015 Grand Ave, Coconut Grove,<br> Cerrick Way, FL 12345</li>
                        <li>+123-456-789</li>
                        <li><a href="#">trizen@yourwebsite.com</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Company</h4>
                    <ul class="list-items list--items">
                        <li><a href="about.html">About us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="blog-grid.html">News</a></li>
                        <li><a href="contact.html">Support</a></li>
                        <li><a href="#">Advertising</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Other Services</h4>
                    <ul class="list-items list--items">
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Trizen.com Rewards</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">List My Hotel</a></li>
                        <li><a href="#">All Hotels</a></li>
                        <li><a href="#">TV Ads</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item">
                    <h4 class="title curve-shape pb-3 margin-bottom-20px" data-text="curvs">Other Links</h4>
                    <ul class="list-items list--items">
                        <li><a href="#">USA Vacation Packages</a></li>
                        <li><a href="#">USA Flights</a></li>
                        <li><a href="#">USA Hotels</a></li>
                        <li><a href="#">USA Car Hire</a></li>
                        <li><a href="#">Create an Account</a></li>
                        <li><a href="#">Trizen Reviews</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="term-box footer-item">
                    <ul class="list-items list--items d-flex align-items-center">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="footer-social-box text-right">
                    <ul class="social-profile">
                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                        <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block mt-4"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="copy-right padding-top-30px">
                    <p class="copy__desc">
                        &copy; Copyright Trizen 2020. Made with
                        <span class="la la-heart"></span> by <a href="https://themeforest.net/user/techydevs/portfolio">TechyDevs</a>
                    </p>
                </div><!-- end copy-right -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="copy-right-content d-flex align-items-center justify-content-end padding-top-30px">
                    <h3 class="title font-size-15 pr-2">We Accept</h3>
                    <img src="{{ asset('assets/frontend/images/payment-img.png ')}}" alt="">
                </div><!-- end copy-right-content -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- end modal-shared -->
<div class="modal-popup">
    <div class="modal fade" id="signupPopupForm" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title title" id="exampleModalLongTitle">Sign Up</h5>
                        <p class="font-size-14">Hello! Welcome Create a New Account</p>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form-action">
                        <form method="post">
                            <div class="input-box">
                                <label class="label-text">Username</label>
                                <div class="form-group">
                                    <span class="la la-user form-icon"></span>
                                    <input class="form-control" type="text" name="text" placeholder="Type your username">
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Email Address</label>
                                <div class="form-group">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="text" name="text" placeholder="Type your email">
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Password</label>
                                <div class="form-group">
                                    <span class="la la-lock form-icon"></span>
                                    <input class="form-control" type="text" name="text" placeholder="Type password">
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Repeat Password</label>
                                <div class="form-group">
                                    <span class="la la-lock form-icon"></span>
                                    <input class="form-control" type="text" name="text" placeholder="Type again password">
                                </div>
                            </div><!-- end input-box -->
                            <div class="btn-box pt-3 pb-4">
                                <button type="button" class="theme-btn w-100">Register Account</button>
                            </div>
                            <div class="action-box text-center">
                                <p class="font-size-14">Or Sign up Using</p>
                                <ul class="social-profile py-3">
                                    <li><a href="#" class="bg-5 text-white"><i class="lab la-facebook-f"></i></a></li>
                                    <li><a href="#" class="bg-6 text-white"><i class="lab la-twitter"></i></a></li>
                                    <li><a href="#" class="bg-7 text-white"><i class="lab la-instagram"></i></a></li>
                                    <li><a href="#" class="bg-5 text-white"><i class="lab la-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div><!-- end contact-form-action -->
                </div>
            </div>
        </div>
    </div>
</div><!-- end modal-popup -->

<!-- end modal-shared -->


<!-- end modal-shared -->
<div class="modal-popup">
    <div class="modal fade" id="replayPopupForm" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLongTitle3">Replay to review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form-action">
                        <form method="post">
                            <div class="input-box">
                                <div class="form-group mb-0">
                                    <i class="la la-pencil form-icon"></i>
                                    <textarea class="message-control form-control" name="message" placeholder="Write message here..."></textarea>
                                </div>
                            </div>
                        </form>
                    </div><!-- end contact-form-action -->
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn font-weight-bold font-size-15 color-text-2 mr-2" data-dismiss="modal">Cancel</button>
                    <button type="button" class="theme-btn theme-btn-small">Replay</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- end modal-popup -->

<!-- end modal-shared -->
<div class="modal-popup">
    <div class="modal fade" id="sharePopupForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLongTitle4">Share this tour</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="copy-to-clipboard-wrap">
                        <div class="copy-to-clipboard">
                            <div class="contact-form-action d-flex align-items-center">
                                <span class="text-success-message">Copied!</span>
                                <input type="text" class="form-control copy-input" value="https://www.trizen.com/share/101WxMB0oac1hVQQ==/">
                                <div class="btn-box">
                                    <button class="theme-btn theme-btn-light copy-text">Copy</button>
                                </div>
                            </div>
                        </div><!-- end copy-to-clipboard -->
                        <ul class="social-profile text-center">
                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end modal-popup -->


<!-- Template JS Files -->
<script src="{{ asset('assets/frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/animated-headline.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.ripples-min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/quantity-input.js') }}"></script>
<script src="{{ asset('js/navbar-sticky.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>
</html>