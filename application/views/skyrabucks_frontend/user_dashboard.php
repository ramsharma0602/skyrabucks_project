<title>User dashboard</title>
<?php  include ('include/header.php'); ?>

    <!-- mobile fix menu start -->
 <!--    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="search" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div> -->
    <!-- mobile fix menu end -->

    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>User Dashboard</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
               
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                         
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="<?php echo base_url()?>assets/images/inner-page/cover-img.jpg" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="<?php echo base_url()?>assets/images/inner-page/user/user.png"
                                            class="blur-up lazyload update_img" alt="">
                                        <!-- <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <!-- <h3><?php echo $customer_value->full_name?></h3>
                                    <h6 class="text-content"><?php echo $customer_value->email?></h6> -->
                                <p id="customer_name">
                                </p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button" role="tab"
                                    aria-controls="pills-dashboard" aria-selected="true"><i data-feather="home"></i>
                                    DashBoard</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order"
                                    aria-selected="false"><i data-feather="shopping-bag"></i>Order</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button" role="tab"
                                    aria-controls="pills-address" aria-selected="false"><i data-feather="map-pin"></i>
                                    Address</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false"><i data-feather="user"></i>
                                    Profile</button>
                            </li> 


                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-logout-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-logout" type="button" role="tab"
                                    aria-controls="pills-logout" aria-selected="false">
                                     <a href="<?php echo base_url('Home/log_out'); ?>"> 
                                    <!-- <a href="<?php echo base_url()?>Home/login"></a> -->
                                    <i data-feather="log-out"></i>
                                    Logout</button>
                                    </a>
                            </li> 
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                aria-labelledby="pills-dashboard-tab">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>My Dashboard</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="<?php echo base_url()?>assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Hello, <b class="text-title"> <p id="customer_name1">
                                                                        </p></b></h6>
                                        <p class="text-content">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="<?php echo base_url()?>assets/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="<?php echo base_url()?>assets/images/svg/order.svg" class="blur-up lazyload"
                                                        alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Order</h5>
                                                        <h3>3658</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="<?php echo base_url()?>assets/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="<?php echo base_url()?>assets/images/svg/pending.svg" class="blur-up lazyload"
                                                        alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Pending Order</h5>
                                                        <h3>254</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="<?php echo base_url()?>assets/images/svg/wishlist.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="<?php echo base_url()?>assets/images/svg/wishlist.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Wishlist</h5>
                                                        <h3>32158</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dashboard-title">
                                        <h3>Account Information</h3>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-xxl-6">
                                            <div class="dashboard-contant-title">
                                                <h4>Contact Information <a href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#editProfile">Edit</a>
                                                </h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content"> <p id="customer_name">
                                                                            <!-- <?php echo($customer[6]->full_name)?> -->
                                                                            
                                                                        </p></h6>
                                                <h6 class="text-content"> <p id="customer_email">
                                                                            <!-- <?php echo($customer[6]->email)?> -->
                                                                        </p></h6>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#changePassword">Change Password</a>
                                            </div>
                                        </div>
                                        <!-- <div class="col-12">
                                            <div class="dashboard-contant-title">
                                                <h4>Address Book <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Edit</a></h4>
                                            </div>

                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Default Billing Address</h6>
                                                        <h6 class="text-content">You have not set a default billing
                                                            address.</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Edit Address</a>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Default Shipping Address</h6>
                                                        <h6 class="text-content">You have not set a default shipping
                                                            address.</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Edit Address</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-wishlist" role="tabpanel"
                                aria-labelledby="pills-wishlist-tab">
                                <div class="dashboard-wishlist">
                                    <div class="title">
                                        <h2>1 History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="<?php echo base_url()?>assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="row g-sm-4 g-3">
                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail">
                                                            <img src="<?php echo base_url()?>assets/images/cake/product/2.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail">
                                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Cheesy feet
                                                            cheesy grin brie. Mascarpone cheese and wine hard cheese the
                                                            big cheese everyone loves smelly cheese macaroni cheese
                                                            croque monsieur.</p>
                                                        <h6 class="unit mt-1">250 ml</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">₹08.02</span>
                                                            <del>₹15.15</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail">
                                                            <img src="<?php echo base_url()?>assets/images/cake/product/3.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail">
                                                            <h5 class="name">Peanut Butter Bite Premium Butter Cookies
                                                                600 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Feta taleggio
                                                            croque monsieur swiss manchego cheesecake dolcelatte
                                                            jarlsberg. Hard cheese danish fontina boursin melted cheese
                                                            fondue.</p>
                                                        <h6 class="unit mt-1">350 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">₹04.33</span>
                                                            <del>₹10.36</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail">
                                                            <img src="<?php echo base_url()?>assets/images/cake/product/4.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Snacks</span>
                                                        <a href="product-left-thumbnail">
                                                            <h5 class="name">SnackAmor Combo Pack of Jowar Stick and
                                                                Jowar Chips</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Lancashire
                                                            hard cheese parmesan. Danish fontina mozzarella cream cheese
                                                            smelly cheese cheese and wine cheesecake dolcelatte stilton.
                                                            Cream cheese parmesan who moved my cheese when the cheese
                                                            comes out everybody's happy cream cheese red leicester
                                                            ricotta edam.</p>
                                                        <h6 class="unit mt-1">570 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">₹12.52</span>
                                                            <del>₹13.62</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail">
                                                            <img src="<?php echo base_url()?>assets/images/cake/product/5.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Snacks</span>
                                                        <a href="product-left-thumbnail">
                                                            <h5 class="name">Yumitos Chilli Sprinkled Potato Chips 100 g
                                                            </h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Cheddar
                                                            cheddar pecorino hard cheese hard cheese cheese and biscuits
                                                            bocconcini babybel. Cow goat paneer cream cheese fromage
                                                            cottage cheese cauliflower cheese jarlsberg.</p>
                                                        <h6 class="unit mt-1">100 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">₹10.25</span>
                                                            <del>₹12.36</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail">
                                                            <img src="<?php echo base_url()?>assets/images/cake/product/6.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail">
                                                            <h5 class="name">Fantasy Crunchy Choco Chip Cookies</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Bavarian
                                                            bergkase smelly cheese swiss cut the cheese lancashire who
                                                            moved my cheese manchego melted cheese. Red leicester paneer
                                                            cow when the cheese comes out everybody's happy croque
                                                            monsieur goat melted cheese port-salut.</p>
                                                        <h6 class="unit mt-1">550 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">₹14.25</span>
                                                            <del>₹16.57</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail">
                                                            <img src="<?php echo base_url()?>assets/images/cake/product/7.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail">
                                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Melted cheese
                                                            babybel chalk and cheese. Port-salut port-salut cream cheese
                                                            when the cheese comes out everybody's happy cream cheese
                                                            hard cheese cream cheese red leicester.</p>
                                                        <h6 class="unit mt-1">1 Kg</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">₹12.68</span>
                                                            <del>₹14.69</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail">
                                                            <img src="<?php echo base_url()?>assets/images/cake/product/2.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail">
                                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Squirty cheese
                                                            cottage cheese cheese strings. Red leicester paneer danish
                                                            fontina queso lancashire when the cheese comes out
                                                            everybody's happy cottage cheese paneer.</p>
                                                        <h6 class="unit mt-1">250 ml</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">₹08.02</span>
                                                            <del>₹15.15</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- ========================================================================= -->
                            <div class="tab-pane fade show" id="pills-order" role="tabpanel"
                                aria-labelledby="pills-order-tab">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>My Order History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="<?php echo base_url()?>assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- Cart Section Start -->
<!-- <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-12 col-lg-12">
                    <div class="cart-table order-table order-table-2">
                        <div class="col-lg-12 table-responsive">
                            <table class="table mb-0">
                                <tbody id='product_body1'>
                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section> -->
<!-- Cart Section ends -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                                    <div class="order-contain" id="product_body1">
                                       
                                       <!--  <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>

                                                <div class="order-detail">
                                                    <h4>Delivered <span>Pending</span></h4>
                                                    <h6 class="text-content">Cheesy grin boursin cheesy grin cheesecake
                                                        blue castello cream cheese lancashire melted cheese.</h6>
                                                </div>
                                            </div>

                                            <div class="product-order-detail">
                                                <a href="product_detail" class="order-image">
                                                    <img src="<?php echo base_url()?>assets/images/vegetable/product/3.png" alt=""
                                                        class="blur-up lazyload">
                                                </a>

                                                <div class="order-wrap">
                                                    <a href="product_detail">
                                                        <h3>Peanut Butter Bite Premium Butter Cookies 600 g</h3>
                                                    </a>
                                                    <p class="text-content">Cow bavarian bergkase mascarpone paneer
                                                        squirty cheese fromage frais cheese slices when the cheese comes
                                                        out everybody's happy.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Price : </h6>
                                                                <h5>₹20.68</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Quantity : </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>

                                                <div class="order-detail">
                                                    <h4>Delivered <span class="success-bg">Success</span></h4>
                                                    <h6 class="text-content">Caerphilly port-salut parmesan pecorino
                                                        croque monsieur dolcelatte melted cheese cheese and wine.</h6>
                                                </div>
                                            </div>

                                            <div class="product-order-detail">
                                                <a href="product_detail" class="order-image">
                                                    <img src="<?php echo base_url()?>assets/images/vegetable/product/4.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="order-wrap">
                                                    <a href="product_detail">
                                                        <h3>SnackAmor Combo Pack of Jowar Stick and Jowar Chips</h3>
                                                    </a>
                                                    <p class="text-content">The big cheese cream cheese pepper jack
                                                        cheese slices danish fontina everyone loves cheese on toast
                                                        bavarian bergkase.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Price : </h6>
                                                                <h5>₹20.68</h5>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Quantity : </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div> 
                                </div>
                            </div>
<!-- ==================================================================================== -->
                            <div class="tab-pane fade show" id="pills-address" role="tabpanel"
                                aria-labelledby="pills-address-tab">
                                <div class="dashboard-address">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>My Address Book</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="<?php echo base_url()?>assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                                        </div>

                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                            data-bs-toggle="modal"  data-bs-target="#add-address"><i data-feather="plus"
                                                class="me-2"></i> Add New Address</button>
                                    </div>

                                    <div class="row g-sm-4 g-3" id="showaddress">
                                        <!-- <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6"  > -->
                                            <!-- <div class="address-box"> -->
                                                <!-- <div> -->
                                                    
                                                            <!-- <tbody> -->
                                                                <!-- <tr>
                                                                    <p id=customer_name3></p>
                                                                </tr>

                                                                <tr>
                                                                    <td>Address :</td>
                                                                    <td>
                                                                        <p id="address_fetch2"></p>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td> Pin code :</td>
                                                                    <td><p id="pincode"></p></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Mobile :</td>
                                                                    <td><p id="mobile">
                                                                        </p></td>
                                                                </tr>-->
                                                            <!-- </tbody> -->
                                                        <!-- </table>
                                                    </div> -->
                                                <!-- </div> -->

                                                
                                            <!-- </div> -->
                                        <!-- </div> -->

                                     <!--<div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            '<div class="address-box">'
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault3">
                                                    </div>

                                                    <div class="label">
                                                        <label>Office</label>
                                                    </div>

                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Terry S. Sutton</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Address :</td>
                                                                    <td>
                                                                        <p>2280 Rose Avenue Kenner, LA 70062</p>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td> Pincode :</td>
                                                                    <td>+25</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Phone :</td>
                                                                    <td>+ 504-228-0969</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Edit</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>
 --><!-- 
                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault4">
                                                    </div>

                                                    <div class="label">
                                                        <label>Neighbour</label>
                                                    </div>

                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Juan M. McKeon</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Address :</td>
                                                                    <td>
                                                                        <p>1703 Carson Street Lexington, KY 40593</p>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td> Pincode :</td>
                                                                    <td>+78</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Phone :</td>
                                                                    <td>+ 859-257-0509</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Edit</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault5">
                                                    </div>

                                                    <div class="label">
                                                        <label>Home 2</label>
                                                    </div>

                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Gary M. Bailey</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Address :</td>
                                                                    <td>
                                                                        <p>2135 Burning Memory Lane Philadelphia, PA
                                                                            19135</p>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td> Pincode :</td>
                                                                    <td>+26</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Phone :</td>
                                                                    <td>+ 215-335-9916</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Edit</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault1">
                                                    </div>

                                                    <div class="label">
                                                        <label>Home 2</label>
                                                    </div>

                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">Gary M. Bailey</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Address :</td>
                                                                    <td>
                                                                        <p>2135 Burning Memory Lane Philadelphia, PA
                                                                            19135</p>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td> Pincode :</td>
                                                                    <td>+26</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Phone :</td>
                                                                    <td>+ 215-335-9916</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Edit</button>
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                        Remove</button>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-card" role="tabpanel"
                                aria-labelledby="pills-card-tab">
                                <div class="dashboard-card">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>My Card Details</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="<?php echo base_url()?>assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                                        </div>

                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                            data-bs-toggle="modal" data-bs-target="#editCard"><i data-feather="plus"
                                                class="me-2"></i> Add New Card</button>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 2548</h4>
                                                    </div>

                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>valid</span>
                                                            <span>thru</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>08/05</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">primary</span>
                                                        </div>
                                                    </div>

                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>Audrey Carol</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="<?php echo base_url()?>assets/images/payment-icon/1.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> delete</a>
                                                </div>
                                            </div>

                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details card-visa">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 1536</h4>
                                                    </div>

                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>valid</span>
                                                            <span>thru</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>12/23</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">primary</span>
                                                        </div>
                                                    </div>

                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>Leah Heather</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="<?php echo base_url()?>assets/images/payment-icon/2.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> delete</a>
                                                </div>
                                            </div>

                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                            <div class="payment-card-detail">
                                                <div class="card-details dabit-card">
                                                    <div class="card-number">
                                                        <h4>XXXX - XXXX - XXXX - 1366</h4>
                                                    </div>

                                                    <div class="valid-detail">
                                                        <div class="title">
                                                            <span>valid</span>
                                                            <span>thru</span>
                                                        </div>
                                                        <div class="date">
                                                            <h3>05/21</h3>
                                                        </div>
                                                        <div class="primary">
                                                            <span class="badge bg-pill badge-light">primary</span>
                                                        </div>
                                                    </div>

                                                    <div class="name-detail">
                                                        <div class="name">
                                                            <h5>mark jecno</h5>
                                                        </div>
                                                        <div class="card-img">
                                                            <img src="<?php echo base_url()?>assets/images/payment-icon/3.jpg"
                                                                class="img-fluid blur-up lazyloaded" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="edit-card">
                                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                        href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#removeProfile"><i
                                                            class="far fa-minus-square"></i> delete</a>
                                                </div>
                                            </div>

                                            <div class="edit-card-mobile">
                                                <a data-bs-toggle="modal" data-bs-target="#editCard"
                                                    href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>My Profile</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="<?php echo base_url()?>assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="profile-detail dashboard-bg-box">
                                        <div class="dashboard-title">
                                            <h3>Profile Name</h3>
                                        </div>
                                        <div class="profile-name-detail">
                                            <div class="d-sm-flex align-items-center d-block">
                                                <!-- <h3>Vicki E. Pope</h3> -->
                                                <p id="customer_name2">
                                                    <!-- <?php echo($customer[6]->full_name)?> -->
                                                </p>
                                                
                                            </div>

                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#editProfile">Edit</a>
                                        </div>

                                        <div class="location-profile">
                                            <ul>
                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="map-pin"></i>
                                                        <!-- <h6>Downers Grove, IL</h6> -->
                                                        <h6> <p id=address_fetch></p></h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="mail"></i>
                                                        <!-- <h6>vicki.pope@gmail.com</h6> -->
                                                        <p id="customer_email2">
                                                            <!-- <?php echo($customer[6]->email)?> -->
                                                        </p>
                                                    </div>
                                                </li>

                                                
                                            </ul>
                                        </div>

                                        <div class="profile-description">
                                            <p>Residences can be classified by and how they are connected to
                                                neighbouring residences and land. Different types of housing tenure can
                                                be used for the same physical type.</p>
                                        </div>
                                    </div>

                                    <div class="profile-about dashboard-bg-box">
                                        <div class="row">
                                            <div class="col-xxl-7">
                                                <div class="dashboard-title mb-3">
                                                    <h3>Profile About</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                          
                                                            <tr>
                                                                <td>Phone Number :</td>
                                                                <td>
                                                                        <p id="customer_mobile">
                                                                        </p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address :</td>
                                                                <td>
                                                                 <p id="address_fetch1"></p>
                                                             </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="dashboard-title mb-3">
                                                    <h3>Login Details</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Email :</td>
                                                                <td>
                                                                            <p id="customer_email1"></p>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">●●●●●●
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#changePassword">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-xxl-5">
                                                <div class="profile-image">
                                                    <img src="<?php echo base_url()?>assets/images/inner-page/dashboard-profile.png"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
<!-- 
                                <div class="tab-pane fade show" id="pills-security" role="tabpanel"
                                aria-labelledby="pills-security-tab">
                                <div class="dashboard-privacy">
                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Privacy</h3>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Allows others to see my profile</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio" aria-checked="false">
                                                    <label class="form-check-label" for="redio"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">all peoples will be able to see my profile</p>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>who has save this profile only that people see my profile</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio2" aria-checked="false">
                                                    <label class="form-check-label" for="redio2"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">all peoples will not be able to see my profile</p>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Save
                                            Changes</button>
                                    </div>

                                    <div class="dashboard-bg-box mt-4">
                                        <div class="dashboard-title mb-4">
                                            <h3>Account settings</h3>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Deleting Your Account Will Permanently</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio3" aria-checked="false">
                                                    <label class="form-check-label" for="redio3"></label>
                                                </div>
                                            </div>
                                            <p class="text-content">Once your account is deleted, you will be logged out
                                                and will be unable to log in back.</p>
                                        </div>

                                        <div class="privacy-box">
                                            <div class="d-flex align-items-start">
                                                <h6>Deleting Your Account Will Temporary</h6>
                                                <div class="form-check form-switch switch-radio ms-auto">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="redio4" aria-checked="false">
                                                    <label class="form-check-label" for="redio4"></label>
                                                </div>
                                            </div>

                                            <p class="text-content">Once your account is deleted, you will be logged out
                                                and you will be create new account</p>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Delete My
                                            Account</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->

   
    <!-- Tap to top start -->
    <div class="theme-option">
       <!--  <div class="setting-box">
            <button class="btn setting-button">
                <i class="fa-solid fa-gear"></i>
            </button>

            <div class="theme-setting-2">
                <div class="theme-box">
                    <ul>
                        <li>
                            <div class="setting-name">
                                <h4>Color</h4>
                            </div>
                            <div class="theme-setting-button color-picker">
                                <form class="form-control">
                                    <label for="colorPick" class="form-label mb-0">Theme Color</label>
                                    <input type="color" class="form-control form-control-color" id="colorPick"
                                        value="#0da487" title="Choose your color">
                                </form>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>Dark</h4>
                            </div>
                            <div class="theme-setting-button">
                                <button class="btn btn-2 outline" id="darkButton">Dark</button>
                                <button class="btn btn-2 unline" id="lightButton">Light</button>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>RTL</h4>
                            </div>
                            <div class="theme-setting-button rtl">
                                <button class="btn btn-2 rtl-unline">LTR</button>
                                <button class="btn btn-2 rtl-outline">RTL</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
 -->
        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- Add address modal box start -->
     <div class="modal fade theme-modal" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down" >
            <div class="modal-content" id="product_body">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
               
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-12">
                            <form>
                                <div class="form-floating theme-form-floating">
                                           <input name="new_mobile"type="text" class="form-control" id="AddressMobile"
                                            placeholder="Enter Your Mobile Number" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                    <label for="mobile">Mobile number</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            
                                <label for="state">State</label>
                                    <select class="form-control" id="state_id" name="state_id"
                                        required>
                                    <option selected hidden="">Choose</option>
                                    </select>
                                
                        </div>
                        <div class="col-12">
                           
                                <label for="city">City</label>
                                    <select class="form-control" id="city_id" name="city_id"
                                        required>
                                        <option selected hidden="">Choose</option>
                                    </select>
                                
                        </div>
                        <div class="col-12">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="AddressLandmark" name="landmark"
                                        value="">
                                    <label for="landmark">Land mark</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="AddressPincode" name="pincode"
                                        value="" maxlength="6">
                                    <label for="pincode">Pin code</label>
                                </div>
                            </form>
                        </div>
  
                        <div class="col-12">
                            <form>
                                <div class="form-floating mb-4 theme-form-floating">
                                    <input type="text" class="form-control" placeholder="Mention your address here" id="AddressAddress" name="address"
                                        value="">
                                    <label for="address">Enter Address</label>
                                </div>
                          </form>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-bg-color btn-md text-white" id="insertAddress" data-bs-dismiss="modal">Save
                        changes</button>
                </div> 
            </div>
        </div>
    </div>
    <!-- Add address modal box end -->

   <!-- Location Modal Start -->
   <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" onkeyup="search()" name="search_input" id="myInput" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height" id="myUL">

                        <?php foreach($cityload as $city_key => $city_value){?>
                        <li>
                                <a href="javascript:void(0)" onclick="selectCity('<?php echo $city_value->city; ?>')">
                                    <p>
                                        <?php echo($city_value->city)?>
                                    </p>
                                </a>
                            </li>
                        <?php }?>
                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->

    <!-- Edit Profile Start -->
    <div class="modal fade theme-modal" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-12">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="number" class="form-control"  type="tel" value="" name="mobile" id="mobile"
                                        maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                    <label for="mobile">Mobile number</label>
                                </div>
                            </form>
                        </div>

                        
                        <div class="col-12">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="pincode" name="pincode"
                                        value="">
                                    <label for="pincode">Pin code</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="landmark" name="landmark"
                                        value="">
                                    <label for="landmark">Land mark</label>
                                </div>
                            </form>
                        </div>
                       
                        <div class="col-12">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="city" name="city"
                                        value="">
                                    <label for="city">City</label>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-12">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="state" name="state"
                                        value="">
                                    <label for="state">State</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <form>
                                <div class="form-floating mb-4 theme-form-floating">
                                    <!-- <textarea class="form-control" id="address" style="height: 100px"></textarea> -->
                                    <input type="text" class="form-control" placeholder="Mention your address here" id="address" name="address"
                                        value="">
                                    <label for="address">Enter Address</label>
                                </div>
                          </form>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" data-bs-dismiss="modal"
                       id="update_address" class="btn theme-bg-color btn-md fw-bold text-light">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Profile End -->

    <!-- Edit Card Start -->
    <div class="modal fade theme-modal" id="editCard" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel8">Edit Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-xxl-6">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="finame" value="Mark">
                                    <label for="finame">First Name</label>
                                </div>
                            </form>
                        </div>

                        <div class="col-xxl-6">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="laname" value="Jecno">
                                    <label for="laname">Last Name</label>
                                </div>
                            </form>
                        </div>

                        <div class="col-xxl-4">
                            <form>
                                <div class="form-floating theme-form-floating">
                                    <select class="form-select" id="floatingSelect12"
                                        aria-label="Floating label select example">
                                        <option selected>Card Type</option>
                                        <option value="kindom">Visa Card</option>
                                        <option value="states">MasterCard Card</option>
                                        <option value="fra">RuPay Card</option>
                                        <option value="china">Contactless Card</option>
                                        <option value="spain">Maestro Card</option>
                                    </select>
                                    <label for="floatingSelect12">Card Type</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn theme-bg-color btn-md fw-bold text-light">Update Card</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Card End -->

    <!-- Remove Profile Modal Start -->
    <div class="modal fade theme-modal remove-profile" id="removeProfile" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header d-block text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box">
                        <p>The permission for deletion of this Address</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                    <button type="button" id="item-confirm" class="btn theme-bg-color btn-md fw-bold text-light"
                        data-bs-target="#removeAddress" data-bs-toggle="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade theme-modal remove-profile" id="removeAddress" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box text-center">
                        <h4 class="text-content">It's Removed.</h4>
                    </div>
                </div>
                <div class="modal-footer pt-0">
                    <button type="button" class="btn theme-bg-color btn-md fw-bold text-light"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Remove Profile Modal End -->

       <!--Change password Modal -->

<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <form id="myformPassword" action="" >
          <input type="" name="user_id"  hidden=""  >
 
	    <div class="col form-group">
	      <label>Old Password</label>
	        <input type="Password" name="old_password" class="form-control" value="">
	    </div> 
        <div class="col form-group">
          <label>New Password</label>
            <input type="Password" name="new_password" class="form-control" value="">
        </div> 
        <div class="col form-group">
          <label>confirm Password</label>
            <input type="Password" name="confirm_password" class="form-control"value="">
        </div> 

</form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
        <button type="button" id="btnsavePassword" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <!--End change password Modal -->

     <!-- Cart Section Start -->
     <!-- <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table" >
                                <tbody class="item" id="showorderhistory" >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Cart Section End -->

 <?php  include ('include/footer.php'); ?>

<!-- <script type="text/javascript">
    var is_logged_in = <?php echo $this->session->has_userdata('active_customer');?>;
    console.log(is_logged_in);
    $(document).ready(function(){
        $('#btnsavePassword').click(function(){
        var data = $('#myformPassword').serialize();
        $.ajax({
            url:'<?= base_url('api/Owner/update_owner_password') ?>',
            type:'post',
            data:data,
            success:function(data){
            // alert(data);
            $('#changePassword').modal('hide');
            }
        });
        });
    });
</script> -->


<script type="text/javascript">



  
$(function(){ 

      //for save / insert data

$('#btnsaveInfo').click(function(){
    
    $('#btnsaveInfo').attr("disabled", true);
   var url = $('#myform').attr('action');

    var data = $('#myform').serialize();
    // validation 
  
    $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
         beforeSend: function() {
        // setting a timeout

            $('#btnsaveInfo').attr("disabled", true);
            
            },
        success: function(response){
                 $('#btnsaveInfo').attr("disabled", false);
               $('#myform')[0].reset();
               $('#exampleModal').modal('hide');

                if (response.status) {
                 toastr.success(response.message);
                }
                else {
                   toastr.error(response.message);
                }
                
                showallData();
        },
        error: function(response){
            
          
            $('#btnsaveInfo').attr("disabled", false);
            

               var text=JSON.parse(response.responseText);
            toastr.error(text.message);

        }
    });
  

});

 $('#btnaddPassword').click(function(){
   
    $('#myformPassword')[0].reset();
    $('#btnsavePassword').html('Update password');
    $('#changePassword').find('.modal-title').text('Update Password');
    $('#myformPassword').attr('action','<?php echo base_url(); ?>api/Owner/update_owner_password');

});


  //for save / insert data

$('#btnsavePassword').click(function(){
      $('#btnaddPassword').attr("disabled", true);
   var url = $('#myformPassword').attr('action');
   var data = $('#myformPassword').serialize();
    // validation 
  
    $.ajax({
        type: 'ajax',
        method:'post',
        url: '<?php echo base_url(); ?>api/Owner/update_owner_password',
        data: data,
        async: false,
        dataType: 'json',
         beforeSend: function() {
        // setting a timeout
  
            $('#btnaddPassword').attr("disabled", true);
            
            },
        success: function(response){
    
                     $('#btnaddPassword').attr("disabled", false);
                if (response.status) {

                  if (response.flag==0) {

                     toastr.error(response.message);
                   }

                    else{
                          $('#myformPassword')[0].reset();
                          $('#changePassword').modal('hide');
                          toastr.success(response.message);
                    }
                }

                
                else{
                   toastr.error(response.message);
                }
                
                showallData();
        },
        error: function(response){
                
                
               $('#btnaddPassword').attr("disabled", false);
            


               var text=JSON.parse(response.responseText);
            toastr.error(text.message);

        }
    });
  

});
    
//Active Status Change
        
$('#brand_data').on('change','#is_active', function() {

   var $this = $( this ),
        customer_id = $this.val();
        $.ajax({
          url:"<?php echo base_url('api/Customer/change_is_active/');?>"+customer_id,
          method:"POST",
          async: false,
          dataType: 'json',  
            success:function(response){
              data=response.data;
              toastr.success(response.message);
              
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(response.message);

            }
        });

});

var is_logged_in = '<?php echo $this->session->has_userdata('active_customer');?>';
// console.log(is_logged_in);

// showallData();
// showalladdress();
//  function showallData(){

//     if(is_logged_in==1){
//     var log_data_customer_id='<?php $row = $this->session->userdata('active_customer'); if($row) { echo $row->customer_id;};?>';
//     var log_data_full_name = '<?php $row = ($this->session->userdata('active_customer')); if($row) { echo $row->full_name;};?>'; 
//     var log_data_mobile = '<?php $row = ($this->session->userdata('active_customer')); if($row) { echo $row->mobile;};?>'; 
//     var log_data_email = '<?php $row = ($this->session->userdata('active_customer'));if($row) { echo $row->email;};?>'; 

//           $.ajax({
//                 type: 'ajax',
//                 method:'get',
//                 url: "<?php echo base_url() ?>api/Customer_login/customer_fetch_details/"+log_data_customer_id,
//                 async: false,
//                 success: function(response) {
//                         var data = response.customer;
//                         var name = data.full_name;
//                         var email = data.email;
//                         var mobile = data.mobile;
//                         //var address = data.address;
//                         document.getElementById("customer_name").innerHTML = name;
//                         document.getElementById("customer_name1").innerHTML = name;
//                         document.getElementById("customer_name2").innerHTML = name;
//                         document.getElementById("customer_name3").innerHTML = name;
//                         document.getElementById("customer_email").innerHTML = email;
//                         document.getElementById("customer_email1").innerHTML = email;
//                         document.getElementById("customer_mobile").innerHTML = mobile;
//                         document.getElementById("customer_email2").innerHTML = email;
//                         // document.getElementById("customer_mobile1").innerHTML = mobile;
//                         // document.getElementById("customer_address").innerHTML = address;

//                     },
//                     error: function()
//                     {
                          
//                     }

//             });

//     }else{
//         // user is not logged in
//         // console.log("first"); 
//     }

//         }

});



$(function() {
var is_logged_in ='<?php echo $this->session->has_userdata('active_customer') ?>';
if(is_logged_in !="" || is_logged_in ==0){
    var log_data="";
}else{
    var log_data =is_logged_in;
}


$('#brand_data').on('click', '.item-customer-addresses', function(){
   var id = $(this).attr('data');
 
   $('#addressModal').modal('show');
   
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Customer/all_customer_address/',
        data:{'customer_id':id},
        async: false,
        dataType: 'json',

        success: function(response){
            
            if (response.status) {
                var data=response.data;
                var html='';
                 for (x =0 ; x<data.length; x++) {
                    
                    html+='<div class="myDiv border" style="padding:10px; margin-top:10px;"> '+
                           '<p>House No:- '+data[x].house_no+'</p>'+
                           '<p>Address:- '+data[x].addresses+'</p>'+
                           '<p>Landmark:- '+data[x].land_mark+'</p>'+
                           '<p>pincode:- '+data[x].pincode+'</p>'+
                           '<p>City:- '+data[x].city+'</p>'+
                           '<p>State:- '+data[x].state+'</p>'+
                           '<p>Is Default Address:- '+data[x].is_default+'</p>'+
                    '</div>';
                 }
            }
            
              $('#address_body').html(html);  

        }
        ,
        error: function(){
             $('#addressModal').modal('hide');
             toastr.error(response.message);
        }
    });
   
});
function search(){
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function selectCity(city) {
  $.ajax({
    url: '<?php echo base_url() ?>/api/City/fetch_all_location/',
    type: 'GET',
    data: {
      city: city
    },
    success: function(response) {
         toastr.succeess(response.message)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      toastr.error(response.message)
    }
  });
}


$(function() {

    // fetchAddress();
    // showallData();
    // $('#insertAddress').click(function() {
    //     var customer_id = log_data;
    //     var address = $('#AddressAddress').val();
    //     var city = $('#AddressCity').val();
    //     var pincode = $('#AddressPincode').val();
    //     var landmark = $('#AddressLandmark').val();
    //     var mobile = $('#AddressMobile').val();
    //     var state = $('#AddressState').val();
           

    //      $.ajax({
    //             type: 'ajax',
    //             url: "<?php echo base_url() ?>api/Customer/insert_address/",
    //             async: false,
    //             method: 'post',
    //             dataType: 'json',
    //             data:{
    //                 customer_id: log_data,
    //                 address:address,
    //                 city:city,
    //                 pincode:pincode,
    //                 landmark:landmark,
    //                 mobile:mobile,
    //                 state:state
    //         },
    //             success: function(response) {
    //                 var customer_id = log_data;
    //                 var address = $('#AddressAddress').val();
    //                 var city = $('#AddressCity').val();
    //                 var pincode = $('#AddressPincode').val();
    //                 var landmark = $('#AddressLandmark').val();
    //                 var mobile = $('#AddressMobile').val();
    //                 var state = $('#AddressState').val();
    //                 if (response.status) {
    //                         toastr.success('Inserted address Successfully  !');
    //                     } 
    //             },
    //             error: function() {
    //                 var customer_id = log_data;
    //                 var address = $('#AddressAddress').val();
    //                 var city = $('#AddressCity').val();
    //                 var pincode = $('#AddressPincode').val();
    //                 var landmark = $('#AddressLandmark').val();
    //                 var mobile = $('#AddressMobile').val();
    //                 var state = $('#AddressState').val();
    //                 toastr.error('Not Found !');
    //             }

    //        });
    //  });

fetchAddress();
});




function fetchAddress(){
    if(is_logged_in == 1){
        var  log_data = '<?php $row = ($this->session->userdata('active_customer')); if($row){ echo $row->customer_id;};?>';
        
        $.ajax({
        type: 'ajax',
        url: "<?php echo base_url() ?>api/Customer_login/fetch_single_address/"+log_data,
        async: false,
        dataType: 'json',
        success: function(response) {
            var html = '';
            var x, i;
            var data = response.data;
            
            console.log(data);
            for (x = 0; x < data.length; x++){

                var i = x + 1;
                html +=   
               ' <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6"  >'+
                '<div class="address-box">'+
                '<div>'+
                '<div class="form-check">'+
                    '<input class="form-check-input" type="radio" onclick="myclick('+data[x].address_id+')" name="myRadio"  id="flexRadioDefault2" checked>'+
                    // '<input class="form-check-input" type="radio" name="myRadio"  id="flexRadioDefault2" checked>'+

                '</div>'+

                '<div class="table-responsive address-table">'+
                    '<table class="table" >'+
                    '<tbody>'+
                        '<tr>'+
                            '<p id=customer_name3>'+data[x].full_name+'</p>'+    
                        '</tr>'+

                        '<tr>'+
                            '<td>Address :</td>'+
                            '<td>'+
                                '<p id="address_fetch2">'+data[x].address+'</p>'+
                            '</td>'+
                        '</tr>'+

                        '<tr>'+
                            '<td> Pin code :</td>'+
                            '<td><p id="pincode"></p>'+data[x].pincode+'</td>'+
                        '</tr>'+

                       ' <tr>'+
                            '<td>Mobile :</td>'+
                            '<td><p id="mobile">'+data[x].new_mobile+'</p></td>'+
                        '</tr>'+
                    '</tbody>'+
                '</table>'+
                '</div>'+
                '</div>'+
               ' <div class="button-group">'+
                //    ' <button class="btn btn-sm add-button w-100" data-bs-toggle="modal" data-bs-target="#editProfile"><i data-feather="edit"></i> Edit</button>'+
                    '<button class="item-delete btn btn-sm add-button w-100" data="'+data[x].address_id+'"  data-bs-toggle="modal" data-bs-target="#removeProfile"><i data-feather="trash-2"></i> Remove</button>'+
                '</div>'+
                '</div>'+
                '</div>';

            }
                
                           
        $('#showaddress').html(html);
    },
          error: function(response) {
            html = '';
            $('#showaddress').html(html);
        }

    });

    }

}
// console.log($('input[name=landmark]').val());
var log_data = '<?php $row = ($this->session->userdata('active_customer')); if($row){ echo $row->customer_id;};?>';
$('#insertAddress').click(function() {
    var url=$('#myform').attr('action');
    var data=$('#myform').serialize();

    var customer_id = log_data;
    var address=$('input[name=address]').val();
    var city_id=$('select[name=city_id]').val();
    var pincode=$('input[name=pincode]').val();
    var landmark=$('input[name=landmark]').val();
    var new_mobile=$('input[name=new_mobile]').val();
    var state_id=$('select[name=state_id]').val();
    console.log(customer_id+" "+city_id+" "+address+" "+pincode+" "+landmark+" " +new_mobile+" "+state_id);
   if (address != "") {
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url(); ?>api/Customer/insert_address',
            async: false,
            dataType: 'json',
            data:{
                customer_id: customer_id,
                address:address,
                city_id:city_id,
                pincode:pincode,
                landmark:landmark,
                new_mobile:new_mobile,
                state_id:state_id,
                is_default: 0
            },
            
            success: function(response) {
                
                    
                if (response.status) {
                    toastr.success('Successfully updated records !');
                    fetchAddress();
                } 
                else {
                    toastr.error('Error, Please Try again !');
                }
                fetchAddress();

            },
            error: function(response) {
                
                toastr.error(response.message);


            }
        });
    } else {
        toastr.error("please enter address");
    }
});  
     
// function showalladdress() {
//             $.ajax({
//                 type: 'ajax',
//                 url: "<?php echo base_url() ?>api/Customer/fetch_single_address/"+log_data,
//                 async: false,
//                 dataType: 'json',
//                 success: function(response) {
//                     var data =response.data;
//                     var cust_address = data.address;
//                     var cust_pincode = data.pincode;
//                     var cust_mobile = data.mobile;
//                     var cust_landmark = data.landmark;
//                     console.log(data);
//                     document.getElementById("address_fetch").innerHTML = cust_address;
//                     document.getElementById("address_fetch1").innerHTML = cust_address;
//                     document.getElementById("address_fetch2").innerHTML = cust_address;
//                     document.getElementById("pincode").innerHTML = cust_pincode;
//                     document.getElementById("mobile").innerHTML = cust_mobile;
//                     document.getElementById("landmark").innerHTML = cust_landmark;


//                     $('input[name=address]').val(data.address);
//                     $('input[name=city]').val(data.city);
//                     $('input[name=pincode]').val(data.pincode);
//                     $('input[name=mobile]').val(data.mobile);
//                     $('input[name=state]').val(data.state);
//                     $('input[name=landmark]').val(data.landmark);

                    

//                 },
//                 error: function() {
//                     toastr.error('Not Found !');
//                 }
//             });
//         }

// showorderhistory();
// function showorderhistory(){
//     $.ajax({
//             type: 'ajax',
//             method: 'get',
//             url: "<?php echo base_url() ?>api/Cart/fetch_Cart",
//             async: false,
//             dataType: 'json',
//             success: function(response) {
               
//                 var html = '';
//                 var fetch_subtotal = '';
//                 var x, i;
//                 var data = response.data;
//                 console.log(data[0]);
//                 var subtotal = 0;
//                 for (x = 0; x < data.length; x++) {
//                     var i = x + 1;
//                     html +=

//                     '<div class="order-box dashboard-bg-box">' +
//                                             '<div class="order-container">' +
//                                                 '<div class="order-icon">' +
//                                                     '<i data-feather="box"></i>' +
//                                                 '</div>' +

//                                                 '<div class="order-detail">' +
//                                                     '<h4>Delivered <span>'+data[x].is_delivered+'</span></h4>' +
//                                                 '</div>' +
//                                             '</div>' +

//                                             '<div class="product-order-detail">' +
//                                                 '<a href="product_detail" class="product-image">' +
//                                                 '<img src="<?php echo base_url()?>uploads/job/'+data[x].job_image+'" class="img-fluid blur-up lazyload" alt="" >'+
//                                                 ' </a>'+ 

//                                                 '<div class="order-wrap">' +
//                                                     '<a href="product_detail">' +
//                                                     '<ul>'+
//                                                         '<li class="name">'+
//                                                             '<h4 class="table-title text-content">Name</h4>'+
//                                                             ' <a href="product_detail">'+data[x].name+'</a>'+
//                                                         '</li>'+
//                                                     ' </ul>'+
//                                                     '</a>' +
//                                                     '<ul class="product-size">' +
//                                                        ' <li>' +
//                                                             '<div class="size-box">' +
//                                                             '<h4 class="table-title text-content">Price</h4>'+
//                                                             '<h5>₹'+data[x].price+'<del class="text-content">₹'+data[x].discount+'</del></h5>'+
//                                                             '</div>' +
//                                                         '</li>' +
//                                                      '</ul>' +
//                                                      '<ul class="product-size">' +
//                                                         '<li>' +
//                                                             '<div class="size-box">' +
//                                                                 '<h6 class="text-content">Quantity : </h6>' +
//                                                                 '<h5>250 G</h5>' +
//                                                            ' </div>' +
//                                                        ' </li>' +
//                                                     '</ul>' +
//                                                 '</div>' +
//                                            ' </div>' +
//                                         '</div>'
                        
//                 $('#showorderhistory').html(html);
//             }
//             },
//             error: function(response) {
//                 html = '';
//                 // document.getElementById("total-sub").innerHTML = '₹ '+0;
//                 $('#showorderhistory').html(html);
//             }

//         });

//     }

// function myclick(chanval){
// var va = chanval;
// }
$('#flexRadioDefault2').on('change', function() {
    var address_id= $(this).attr('data');
    console.log(address_id);
   $.ajax({
    type: 'ajax',
    method:'get',
    url: '<?php echo base_url(); ?>api/Customer/update_default_address/'+address_id,
    async: false,
    dataType:'json',
    data:{
        address_id: address_id,
        is_default: 1
    },
    success: function(response) {
        toastr.success(response.message);
    },
    error: function(response) {
        toastr.error(response.message);
    }
   })
});


$('input[type="radio"]').on('change', function(){
    $('input[type="radio"]').not(this).prop('checked', false);
    if($('#flexRadioDefault2').is(":checked")){
        valueAddress=$('#flexRadioDefault2').attr('value');
        $('#advanceRow').hide();
    }
    else{
        $('input[type="radio"]').prop('checked', false);
    }
            $.ajax({
            type: 'ajax',
            method:'get',
            url: '<?php echo base_url(); ?>api/Customer/update_default_address/'+address_id,
            async: false,
            dataType:'json',
            data:{
                address_id: address_id,
                is_default: 1
            },
            success: function(response) {
                toastr.success(response.message);
            },
            error: function(response) {
                toastr.error(response.message);
            }
        })
});

$('#showaddress').on('click', '.item-delete', function(){
    var address_id= $(this).attr('data');
    $('#item-confirm').unbind().click(function(){
    $.ajax({
        type: 'ajax',
        method: 'delete',
        url: '<?php echo base_url(); ?>api/Customer/remove_address/'+address_id,
        async: false,
        dataType: 'json',
        data: {
            address_id: address_id
        },

        success: function(response) {
            $('#removeProfile').modal('hide');

            if (response.status) {
                toastr.success('Successfully removed records !');
                fetchAddress();
            } else {
                toastr.error('Error, Please Try again !');
            }
            fetchAddress();
            
        },
        error: function(response) {
            $('#removeProfile').modal('hide');

            toastr.error('Can not remove address!');
        }
    });
});

});

});
all_state();

function all_state(){
    $.ajax({
          url:"<?php echo base_url('api/State_location/fetch_all_states');?>",
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                 
                var html='<option value="" selected hidden>Please select state</option>';

                var x,i;
                var data=response.data;
                  if (data) {
                    for (x =0 ; x<data.length; x++) {
                         var i=x+1;
                         html+='<option value="'+data[x].state_id+'">'+data[x].state_name+'</option>';
                        
                      }
                }
                
            $('#state_id').html(html);
           
   
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(data.message);

            }
        });


      }
// ============================================================
$(function() {
var is_logged_in ='<?php echo $this->session->has_userdata('active_customer') ?>';
if(is_logged_in !="" || is_logged_in ==0){
    var log_data="";
}else{
    var log_data =is_logged_in;
}

var log_data = '<?php $row = ($this->session->userdata('active_customer')); if($row){ echo $row->customer_id;};?>';

// fetchAddress();
      $(function() {
        showOrder();
        function showOrder(){
            // var is_logged_in ='<?php echo json_encode($this->session->userdata('active_customer')) ?>';
            // is_logged_in = JSON.parse(is_logged_in);
            $.ajax({
            type: 'ajax',
            method: 'get',
            url: "<?php echo base_url('api/Order_details/customer_order_list'); ?>",
            data: {
                customer_id:log_data,
            },
            async: false,
            dataType: 'json',
            success: function(response) {
                var data=response.data;
                console.log(data);
                var html ='';
                var x;
                var i=1;
            
                for (x =0 ; x<data.length; x++) {
                    for(var i=0;i<data[x].product_detail.length;i++){
                        var job_details = data[x].product_detail[i];

                    console.log(job_details);
                    // for(var i=0;i<data[x].p)s
                    // console.log(data[x].order_detail_id);
                    html+=
                    // '<tr>'+
                            // '<div class="order-contain" >'+
                                       '<div class="order-box dashboard-bg-box">'+

                                            //   ' <div class="order-detail">'+
                                                //    '<h4>Delivered <span>Pending </span></h4>'+
                                                //    '<h6 class="text-content">Cheesy grin boursin cheesy grin cheesecake blue castello cream cheese lancashire melted cheese.</h6>'+
                                            //    '</div>'+

                                           '<div class="product-order-detail">'+
                                               '<a href="product_detail" class="order-image">'+
                                                   '<img src="<?php echo base_url()?>uploads/job/'+job_details.job_image+'" alt="" class="blur-up lazyload">'+
                                              ' </a>'+

                                              ' <div class="order-wrap">'+
                                                  ' <a href="product_detail">'+
                                                       '<h3>'+job_details.job_name+'</h3>'+
                                                  ' </a>'+
                                                   '<p class="text-content">'+job_details.short_description+'</p>'+
                                                  ' <ul class="product-size">'+
                                                      ' <li>'+
                                                           '<div class="size-box">'+
                                                              ' <h6 class="text-content">Price : </h6>'+
                                                               '<h5>'+job_details.price+'</h5>'+
                                                          ' </div>'+
                                                      ' </li>'+

                                                       '<li>'+
                                                           '<div class="size-box">'+
                                                               '<h6 class="text-content">Quantity : </h6>'+
                                                               '<h5>'+job_details.qty+'</h5>'+
                                                           '</div>'+
                                                       '</li>'+
                                                   '</ul>'+
                                               '</div>'+
                                           '</div>'+
                                    '</div>';
                                        // '<td class="product-detail">'+
                                        //     '<div class="product border-0">'+
                                        //         '<a href="product.left-sidebar" class="product-image">'+
                                        //             '<img style="height:45px; width:45px" src="<?php echo base_url()?>uploads/job/'+job_details.job_image+'" class="img-fluid blur-up lazyload" alt="" >'+
                                        //         '</a>'+
                                        //         '<div class="product-detail">'+
                                        //             '<ul>'+
                                        //                 '<li class="name">'+
                                        //                     '<a href="product-left-thumbnail">'+job_details.job_name+'</a>'+
                                        //                 '</li>'+
                                        //             '</ul>'+
                                        //         '</div>'+
                                        //     '</div>'+
                                        // '</td>'+

                                        // '<td class="price">'+
                                        //     '<h4 class="table-title text-content">Price</h4>'+
                                        //     '<h6 class="theme-color">'+job_details.price+'</h6>'+
                                        // '</td>'+

                                        // '<td class="quantity">'+
                                        //     '<h4 class="table-title text-content">Qty</h4>'+
                                        //     '<h4 class="text-title">'+job_details.qty+'</h4>'+
                                        // '</td>'+

                                        // '<td class="subtotal">'+
                                        //     '<h4 class="table-title text-content">Total</h4>'+
                                        //     '<h5>'+job_details.sub_total+'</h5>'+
                                        // '</td>'+
                                    // '</tr>';
                        }
                        // document.getElementById("total").innerHTML = "₹" +data[x].grand_total;
                        // document.getElementById("grand_total").innerHTML = "₹" +data[x].grand_total;
                        $('#product_body1').html(html);  
                    }

            }}
            )}
        });
    });
$('#product_body').on('change','#state_id', function() {

var $this = $( this ),
state_id = $this.val();


     $.ajax({
       url:"<?php echo base_url('api/City_location/fetch_from_state_id');?>",
       method:"get",
       async: false,
       data:{
         state_id:state_id
       },
       dataType: 'json',  
         success:function(response){
             var html=' <option selected hidden="">Choose...</option>';

             var x,i;
             var data=response.data;
               if (data) {
                 for (x =0 ; x<data.length; x++) {
                      var i=x+1;
                      html+=' <option value="'+data[x].city_id+'">'+data[x].city+'</option>'; 
                   }
             }
 
            $('#city_id').html(html); 

         },

         error: function(response){
           var data =JSON.parse(response.responseText);
           toastr.error(data.message);

         }
     });

});

</script>
