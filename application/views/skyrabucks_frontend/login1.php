<title>Login</title>
<?php  include ('include/header.php'); ?>


    <!-- mobile fix menu start -->
   <!--  <div class="mobile-menu d-md-none d-block mobile-cart">
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
                        <h2 class="mb-2">Log In</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Log In</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="<?php echo base_url()?>assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Skyrabucks</h3>
                            <h4>Log In Your Account</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" class="form-control" id="inputEmail" name="email" placeholder="">
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" id="inputPassword"          name="password"
                                            placeholder="">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <!-- forget password -->

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                        </div><!-- 
                                        <a href="forgot" class="forgot-password">Forgot Password?</a> -->
                                        <a href="<?php echo base_url()?>home/forgot">Forgot Password ?</a>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <a class="btn btn-animation w-100" id="login_btn">Log
                                        In</a>
                                </div>
                            </form>
                        </div>

                       <!--  <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/" class="btn google-button w-100">
                                        <img src="<?php echo base_url()?>assets/images/inner-page/google.png" class="blur-up lazyload"
                                            alt=""> Log In with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="<?php echo base_url()?>assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                            alt=""> Log In with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div> -->

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Don't have an account?</h4>
                            <a href="sign_up">Sign Up</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- log in section end -->

    <!-- Footer Section Start -->

    <!-- Footer Section End -->

    <!-- Tap to top start -->
    <div class="theme-option">
        <!-- <div class="setting-box">
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
<?php  include ('include/footer.php'); ?>

 <script type="text/javascript">
$(function() {

    //  $("#login_btn").click(function(){
    //     $("#login_btn").off("click");
    // });

    $('#login_btn').click(function() {

        var email = $('#inputEmail').val();
        var valid_credential = $('#inputPassword').val();
        if (email == "") {
            toastr.error("please enter user name");
        } else if (valid_credential == "") {
            toastr.error('Please enter password');
        } else {
            // var data = $('#login_form').serialize();
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: "<?php echo base_url('api/Customer_login/customer_login1'); ?>",
                data: {
                    email: email,
                    credential: valid_credential
                },

                async: false,
                dataType: 'json',
                success: function(response) {
                    // $('#login_form')[0].reset();
                    if (response.status) {
                        toastr.success(response.message);
                       window.location.href = '<?php echo base_url() ?>' +'home/user_dashboard/';
                    } else {
                        toastr.error(response.message); 
                    }


                },
                error: function(response) {

                    var text = JSON.parse(response.responseText);
                    toastr.error(text.message);

                }
            });
        }

    });
});
 </script>

