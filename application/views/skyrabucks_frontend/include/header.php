<!DOCTYPE html>
<html lang="en">

<?php $general_settings=$this->Crud_model->getRows('general_settings',$arrayName=array(),'result');?>
<?php $cities=$this->Crud_model->getRows('cities',$arrayName=array(),'result');?>
<?php $customer=$this->Crud_model->getRows('customer',$arrayName=array(),'result');?>
<?php $jobs=$this->Crud_model->getRows('jobs',$arrayName=array(),'result');?>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Skyrabucks">
    <meta name="keywords" content="Skyrabucks">
    <meta name="author" content="Skyrabucks">
    <!-- <link rel="icon" href="<?php echo base_url()?>assets/images/favicon/5.png" type="image/x-icon"> -->
    <!-- <title>Skyrabucks</title> -->

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/animate.min.css" />

<!-- toastr css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/toastr.css" />



    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendors/feather-icon.css">

    <!-- Plugin CSS file with desired skin css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendors/ion.rangeSlider.min.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendors/slick/slick-theme.css">

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/font-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style-1.css">
</head>

<body class="theme-color-3 dark">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
<header class="header-3">
        <div class="top-nav sticky-header sticky-header-2">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-block p-0 me-3" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <!-- <span class="navbar-toggler-icon">
                                    <i class="iconly-Category icli"></i>
                                </span> -->
                            </button>
                            <a href="<?php echo base_url()?>home/index" class="web-logo nav-logo">
                                <img src="<?php echo base_url()?>uploads/logos/<?php echo($general_settings[8]->value)?>" class="img-fluid blur-up lazyload" alt="Skyrabucks" title="Skyrabucks">
                            </a>

                            <div class="search-full">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="search" class="font-light"></i>
                                    </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                        <i data-feather="x" class="font-light"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="middle-box">
                                <div class="center-box">
                                    <div class="location-box-2">
                                        <button class="btn location-button" data-bs-toggle="modal"
                                            data-bs-target="#locationModal">
                                            <i class="iconly-Location icli"></i>
                                            <span>Location</span>
                                            <i class="fa-solid fa-angle-down down-arrow"></i>
                                        </button>
                                    </div>

                                    <div class="searchbar-box-2 input-group d-xl-flex d-none">
                                        <button class="btn search-icon" type="button">
                                            <i class="iconly-Search icli"></i>
                                        </button>
                                        <input type="search" id="search" value="<?php echo @$search_key ?>" class="form-control"
                                            placeholder="Search for products, styles,brands...">
                                            
                                        <button class="btn search-button" id="searchBtn" type="button">Search</button>
                                    </div> 
                                    
                                      
                                </div>
                            </div>

                            <div class="rightside-menu support-sidemenu">
                                <div class="support-box">
                                    <div class="support-image">
                                        <img src="<?php echo base_url()?>assets/images/icon/support.png" class="img-fluid blur-up lazyload"
                                            alt="">
                                    </div>
                                    <div class="support-number">


                                        <h2> <?php echo($general_settings[6]->value)?></h2>
                                        <!-- <h4>24/7 Support Center</h4> -->

                                         <!-- <h2>02462352159</h2>
                                        <h4>24/7 Support Center</h4> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12 position-relative">
                    <div class="main-nav nav-left-align">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky p-0">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <!-- <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div> -->
                               <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                          <!--<li class="nav-item dropdown dropdown-mega">
                                            <a class="nav-link dropdown-toggle ps-0" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Home</a>

                                            <div
                                                class="dropdown-menu dropdown-menu-2 dropdown-menu-left dropdown-image">
                                                <div class="dropdown-column">
                                                    <a class="dropdown-item" href="index">
                                                        <img src="<?php echo base_url()?>assets/images/theme/1.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <span>Kartshop</span>
                                                    </a>

                                                    <a class="dropdown-item" href="index-2">
                                                        <img src="<?php echo base_url()?>assets/images/theme/2.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <span>Sweetshop</span>
                                                    </a>

                                                    <a class="dropdown-item" href="index-3">
                                                        <img src="<?php echo base_url()?>assets/images/theme/3.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <span>Organic</span>
                                                    </a>

                                                    <a class="dropdown-item" href="index-4">
                                                        <img src="<?php echo base_url()?>assets/images/theme/4.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <span>Supershop</span>
                                                    </a>

                                                    <a class="dropdown-item" href="index-5">
                                                        <img src="<?php echo base_url()?>assets/images/theme/5.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                        <span>Slicktech</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li> -->

                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Shop</a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="shop-category-slider">Shop
                                                        Category Slider</a>
                                                </li>
                                               
                                                <li>
                                                    <a class="dropdown-item" href="shop-banner">Shop Banner</a>
                                                </li>
                                               
                                                <li>
                                                    <a class="dropdown-item" href="shop-list">Shop List</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-right-sidebar">Shop
                                                        Right Sidebar</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-top-filter">Shop Top
                                                        Filter</a>
                                                </li>
                                            </ul>
                                        </li> -->

                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Product</a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="product_4_image">Product
                                                        4 Image</a>
                                                </li>
                                                <li class="sub-dropdown-hover">
                                                    <a href="javascript:void(0)" class="dropdown-item">Product
                                                        Thumbnail</a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="product-left-thumbnail">Left Thumbnail</a>
                                                        </li>

                                                        <li>
                                                            <a href="product-right-thumbnail">Right
                                                                Thumbnail</a>
                                                        </li>

                                                        <li>
                                                            <a href="product-bottom-thumbnail">Bottom
                                                                Thumbnail</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="product-bundle" class="dropdown-item">Product
                                                        Bottom Thumbnail</a>
                                                </li>
                                                <li>
                                                    <a href="product-left-thumbnail" class="dropdown-item">Product
                                                        Left Thumbnail</a>
                                                </li>
                                                <li>
                                                    <a href="product-right-thumbnail" class="dropdown-item">Product
                                                        Right Thumbnail</a>
                                                </li>
                                                <li>
                                                    <a href="product-slider" class="dropdown-item">Product
                                                        Slider</a>
                                                </li>
                                                <li>
                                                    <a href="product-sticky" class="dropdown-item">Product
                                                        Sticky</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown dropdown-mega">
                                            <a class="nav-link dropdown-toggle ps-xl-2 ps-0" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Mega Menu</a>

                                            <div class="dropdown-menu dropdown-menu-2 dropdown-menu-left">
                                                <div class="row">
                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Daily Vegetables</h5>
                                                        <a class="dropdown-item" href="shop-left-sidebar">Beans &
                                                            Brinjals</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Broccoli
                                                            & Cauliflower</a>

                                                        <a href="shop-left-sidebar" class="dropdown-item">Chilies,
                                                            Garlic, Lemon & Ginger</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Cut
                                                            Vegetables & Salads</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Gourd,
                                                            Cucumber & Pumpkin</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Herbs &
                                                            Sprouts</a>

                                                        <a href="demo-personal-portfolio"
                                                            class="dropdown-item">Lettuce
                                                            & Leafy</a>
                                                    </div>

                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Baby Tender</h5>
                                                        <a class="dropdown-item" href="shop-left-sidebar">Beans &
                                                            Brinjals</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Broccoli
                                                            & Cauliflower</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Chilies,
                                                            Garlic, Lemon & Ginger</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Cut
                                                            Vegetables & Salads</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Gourd,
                                                            Cucumber & Pumpkin</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Onions,
                                                            Potatoes & Tomatoes</a>

                                                        <a href="shop-left-sidebar" class="dropdown-item">Peas &
                                                            Corn</a>
                                                    </div>

                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Exotic Vegetables</h5>
                                                        <a class="dropdown-item" href="shop-left-sidebar">Asparagus
                                                            & Artichokes</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Avocados
                                                            & Peppers</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Broccoli
                                                            & Zucchini</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Celery,
                                                            Fennel & Leeks</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar">Chilies &
                                                            Lime</a>
                                                    </div>

                                                    <div class="dropdown-column dropdown-column-img col-3"></div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Blog</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="blog_detail">Blog Detail</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="blog_grid">Blog Grid</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="blog_list">Blog List</a>
                                                </li>
                                            </ul>
                                        </li> -->

                                        <!-- <li class="nav-item dropdown new-nav-item">
                                            <label class="new-dropdown">New</label>
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Pages</a>
                                            <ul class="dropdown-menu">
                                                <li class="sub-dropdown-hover">
                                                    <a class="dropdown-item" href="javascript:void(0)">Email
                                                        Template <span class="new-text"><i
                                                                class="fa-solid fa-bolt-lightning"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a
                                                                href="../email-templete/abandonment-email">Abandonment</a>
                                                        </li>
                                                        <li>
                                                            <a href="../email-templete/offer-template">Offer
                                                                Template</a>
                                                        </li>
                                                        <li>
                                                            <a href="../email-templete/order_success-2">Order
                                                                Success</a>
                                                        </li>
                                                        <li>
                                                            <a href="../email-templete/reset-password-2">Reset
                                                                Password</a>
                                                        </li>
                                                        <li>
                                                            <a href="../email-templete/welcome-2">Welcome
                                                                template</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="sub-dropdown-hover">
                                                    <a class="dropdown-item" href="javascript:void(0)">Invoice
                                                        Template <span class="new-text"><i
                                                                class="fa-solid fa-bolt-lightning"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="../invoice/invoice-1">Invoice 1</a>
                                                        </li>

                                                        <li>
                                                            <a href="../invoice/invoice-2">Invoice 2</a>
                                                        </li>

                                                        <li>
                                                            <a href="../invoice/invoice-3">Invoice 3</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="404">404</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="about_us">About Us</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="cart">Cart</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="contact_us">Contact</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="checkout">Checkout</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="comming_soon">Comming Soon</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="compare">Compare</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="faq">Faq</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="order_success">Order
                                                        Success</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="order_tracking">Order
                                                        Tracking</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="otp">OTP</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="search">Search</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="user_dashboard">User
                                                        Dashboard</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="wishlist">Wishlist</a>
                                                </li>
                                            </ul>
                                        </li> -->

                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Service provider</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="service_provider_become">Become a
                                                        service provider</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="service_provider_dashboard">Service provider
                                                        Dashboard</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="service_provider_detail">service provider Detail</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="service_provider_detail_2">service provider Detail
                                                        2</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="service_provider_grid">service provider Grid</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="service_provider_grid_2">service provider Grid 2</a>
                                                </li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-menu">
                            <ul class="option-list-2">
                                <li>
                                    <a href="<?php echo base_url('Home/Search/')?>" class="header-icon search-box search-icon">
                                        <i class="iconly-Search icli"></i>
                                    </a>
                                </li>

                               <!--  <li>
                                    <a href="compare" class="header-icon">
                                        <small class="badge-number badge-light">2</small>
                                        <i class="iconly-Swap icli"></i>
                                    </a>
                                </li> -->

                                <li class="onhover-dropdown">
                                    <!-- <a href="javascript:void(0)" class="header-icon swap-icon"> -->
                                   <!--  <a href="<?php echo base_url('Home/cart/')?>" class="header-icon swap-icon">
                                        <i class="iconly-Heart icli"></i>
                                    </a> -->

                                    <!-- <div class="onhover-div"> -->
                                       <!--  <ul class="cart-list">
                                            <li>
                                                <div class="drop-cart">
                                                    <a href="product-left-thumbnail" class="drop-image">
                                                        <img src="<?php echo base_url()?>assets/images/vegetable/product/1.png"
                                                            class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="drop-contain">
                                                        <a href="product-left-thumbnail">
                                                            <h5>Fantasy Crunchy Choco Chip Cookies</h5>
                                                        </a>
                                                        <h6><span>1 x</span> ₹80.58</h6>
                                                        <button class="close-button">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="drop-cart">
                                                    <a href="product-left-thumbnail" class="drop-image">
                                                        <img src="<?php echo base_url()?>assets/images/vegetable/product/2.png"
                                                            class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="drop-contain">
                                                        <a href="product-left-thumbnail">
                                                            <h5>Peanut Butter Bite Premium Butter Cookies 600 g</h5>
                                                        </a>
                                                        <h6><span>1 x</span> ₹25.68</h6>
                                                        <button class="close-button">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul> -->

                                        <!-- <div class="price-box">
                                            <h5>Price :</h5>
                                            <h4 class="theme-color fw-bold">₹106.58</h4>
                                        </div> -->

                                      <!--   <div class="button-group">
                                            <a href="<?php echo base_url('Home/cart/')?>" class="btn btn-sm cart-button">View Cart</a>
                                            <a href="<?php echo base_url('Home/checkout/')?>" class="btn btn-sm cart-button theme-bg-color
                                                    text-white">Checkout</a>
                                        </div> -->
                                    <!-- </div> -->
                                </li>

                                <li>
                                    <a href="<?php echo base_url('Home/cart/')?>" class="header-icon bag-icon">
                                        <!-- <small class="badge-number badge-light">2</small> -->
                                        <i class="iconly-Bag-2 icli"></i>
                                    </a>
                                </li>
                            </ul>

                            <a href="<?php echo base_url('Home/login1/')?>" class="user-box">
                                <span class="header-icon">
                                    <i class="iconly-Profile icli"></i>
                                </span>
                                <div class="user-name">
                                    <h6 class="text-content">My Account</h6>
                                    <p>
                                                                            <?php echo($customer[6]->full_name)?>
                                                                        </p>
                                </div>
                            </a>

                            <a target="_blank" class="btn mobile-app d-xxl-flex d-none"
                                href="https://play.google.com/store/games?utm_source=apac_med&amp;utm_medium=hasem&amp;utm_content=Oct0121&amp;utm_campaign=Evergreen&amp;pcampaignid=MKT-EDR-apac-in-1003227-med-hasem-py-Evergreen-Oct0121-Text_Search_BKWS-BKWS%7CONSEM_kwid_43700065205026415_creativeid_535350509927_device_c&amp;gclid=Cj0KCQjw8uOWBhDXARIsAOxKJ2H1K3VqdJFHodt0-XSnQzcuOuTP-s2aPBE6lG0QVOf8D5cJBsB-DxQaAkNAEALw_wcB&amp;gclsrc=aw.ds">
                                <div class="mobile-image">
                                    <img src="<?php echo base_url()?>assets/images/icon/mobile.png" class="img-fluid blur-up lazyload"
                                        alt="">
                                </div>

                                <div class="mobile-name">
                                    <h4>Download App</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="<?php echo base_url()?>">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('Home/search')?>">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>
            <!-- <li>
                <a href="wishlist" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li> -->

            <li>
                <a href="<?php echo base_url('Home/cart')?>">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('Home/user_dashboard')?>">
                    <i class="iconly-Profile icli"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>
 <!-- mobile fix menu end -->

    </header>