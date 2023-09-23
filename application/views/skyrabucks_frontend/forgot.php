<title>Forget Password</title>
<?php  include ('include/header.php'); ?>

    <!-- mobile fix menu start -->
  <!--   <div class="mobile-menu d-md-none d-block mobile-cart">
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
                        <h2>Forgot Password</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Forgot Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space forgot-section">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="<?php echo base_url()?>assets/images/inner-page/forgot.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">
                            <div class="log-in-title">
                                <h3>Welcome To Fastkart</h3>
                                <h4>Forgot your password</h4>
                            </div>

                            <div class="input-box">
                                <form class="row g-4">
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="text" class="form-control" id="input_phone" name="phone_no" placeholder="Enter Phone Number" class=""
                                         autocorrect="off" autocapitalize="off"
                                                >
                                             <label for="inputPhone">Phone Number </label>
                                        </div>
                                    </div>

                                <div class="col-12" id="login_btn" style="padding: 10px;">
                                    <!-- <a href="<?php echo base_url()?>Home/otp"></a> -->
                               <!--  <button class="btn btn-animation w-100" id="login_btn" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Verify Phone Number

                                </button> -->
                                <div class="col-12">
                                    <a class="btn btn-animation w-100"  id="send_OTP" data-toggle="modal">Verify Phone Number</a>
                                </div>
                            </div>

                                    <!-- <div class="col-12">
                                        <button class="btn btn-animation w-100" type="submit">Forgot
                                            Password</button>
                                    </div> -->
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12"style="display:none;" id="OTP_send">
                                      <div class="form-group" >
                                        <label for="inputOTP">OTP</label>
                                       <input type="text" id="inputOTP" name="otp" placeholder="Enter OTP" class=""
                                         autocorrect="off" autocapitalize="off">
                                      </div>
                                      <div class="form-group" id="verify_change" style="padding: 10px;">
                                         <button type="button" id="verify_otp1" name="verify_name" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                         Verify OTP 
                                    </div>
                                </div>
                         <div class="col-12 col-sm-12 col-md-12 col-lg-12"style="display:none;" id="change_password">
                              <div class="form-group" >
                                 <label for="inputPhone">New Password</label>
                                    <input type="text" id="new_password" name="new_password" placeholder="Enter New Password" class=""
                                         autocorrect="off" autocapitalize="off">
                              </div>
                            
                              <div class="form-group">
                                 <label for="inputPhone">Confirm Password</label>
                                    <input type="text" id="confirm_password" name="confirm_password" placeholder="Enter Confirm password" class=""
                                         autocorrect="off" autocapitalize="off">
                              </div>

                              <div class="col-lg-12" id="save_id" style="padding: 10px;">
                                <button type="button" id="save_changes" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                 Save Changes
                                </button>
                               </div>
                        </div> 
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->

    <!-- Footer Section Start -->
    <footer class="section-t-space">
        <div class="container-fluid-lg">
            <div class="service-section">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="service-contain">
                            <div class="service-box">
                                <div class="service-image">
                                    <img src="<?php echo base_url()?>assets/svg/product.svg" class="blur-up lazyload" alt="">
                                </div>

                                <div class="service-detail">
                                    <h5>Every Fresh Products</h5>
                                </div>
                            </div>

                            <div class="service-box">
                                <div class="service-image">
                                    <img src="<?php echo base_url()?>assets/svg/delivery.svg" class="blur-up lazyload" alt="">
                                </div>

                                <div class="service-detail">
                                    <h5>Free Delivery For Order Over ₹50</h5>
                                </div>
                            </div>

                            <div class="service-box">
                                <div class="service-image">
                                    <img src="<?php echo base_url()?>assets/svg/discount.svg" class="blur-up lazyload" alt="">
                                </div>

                                <div class="service-detail">
                                    <h5>Daily Mega Discounts</h5>
                                </div>
                            </div>

                            <div class="service-box">
                                <div class="service-image">
                                    <img src="<?php echo base_url()?>assets/svg/market.svg" class="blur-up lazyload" alt="">
                                </div>

                                <div class="service-detail">
                                    <h5>Best Price On The Market</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
        </div>
    </footer>
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
        </div> -->

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <?php  include('include/footer.php') ?>
   <script type="text/javascript">
    $(function(){

});
      $(document).ready(function() {
            $('#send_OTP').on('click', function() {
                var mobile_no = $('input[name="phone_no"]').val();
                if(mobile_no==""){
                    toastr.error("please enter mobile number");
                } else {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() ?>api/Customer_login/resend_otp',
                    data: {
                        mobile: mobile_no 
                    },
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success('OTP sent Sucessfully!');
                            window.location.href = '<?php echo base_url() ?>' +
                                              'home/otp/'+mobile_no;
                            
                            document.getElementById("phoneshow").style.display="none";
                            document.getElementById("OTP_send").style.display="block";
                             } else {
                                            toastr.error('Invalid mobile Numbwer. Please try again.');
                                        }
                                    }
                            });
                        }
                        });
                    });































      
//         $(document).ready(function() {
//             $('#send_OTP').on('click', function() {
//                 var mobile_no = $('input[name="phone_no"]').val();
//                 if(mobile_no==""){
//                     toastr.error("please enter mobile number");
//                 }else{
//                 $.ajax({
//                     type: "POST",
//                     url: '<?php echo base_url() ?>api/Customer_login/resend_otp',
//                     data: {
//                         mobile: mobile_no 
//                     },
//                     success: function(response) {
//                         if (response.status == true) {
//                             toastr.success('OTP sent Sucessfully!');

//                             document.getElementById("phoneshow").style.display="none";
//                             document.getElementById("OTP_send").style.display="block";
                            
//                             $('#verify_otp1').click(function() {
//                                 var otp = $('#inputOTP').val();
//                                 if(mobile_no==""){
//                                     toaster.error('Error ! Enter mobile number.')
//                                 }else{
//                                 $.ajax({
//                                     type: 'POST',
//                                     url: '<?php echo base_url() ?>api/Customer_login/verify_otp',
//                                     data: {
//                                         OTP: otp, 
//                                         mobile_number :mobile_no 
//                                         },
//                                     success: function(response) {
//                                         if (response.status == true) {
//                                             toastr.success('OTP verified successfully.');
//                                             document.getElementById("OTP_send").style.display="none";
//                                             document.getElementById("change_password").style.display="block";
//                                             $('#save_changes').click(function() {
//                                                 var new_password = $('#new_password').val();
//                                                 var confirm_password = $('#confirm_password').val();
//                                                 if(new_password==confirm_password){
//                                                 $.ajax({
//                                                     url: '<?php echo base_url() ?>api/Customer/change_password_with_otp',
//                                                     type: 'POST',
//                                                     data: {
//                                                         mobile_number: mobile_no, 
//                                                         OTP_status:"TRUE",
//                                                         new_password: new_password, 
//                                                         confirm_password: confirm_password},
//                                                     success: function(response) {
//                                                     if (response.status == true) {
//                                                         toastr.success('Password changed successfully login again !');
//                                                         window.location.href = "<?php echo base_url();?>Home/customer_login"
//                                                     } else {
//                                                         toastr.error('An error occurred while saving password. Please try again later.');
//                                                     }
//                                                     },
//                                                     error: function() {
//                                                     toastr.error('An error occurred while saving password. Please try again later.');
//                                                     }
//                                                 });
//                                                 }else{
//                                                     toaster.error('Please Enter correct password .')
//                                                 }
//                                             });
//                                         } else {
//                                             toastr.error('Invalid OTP. Please try again.');
//                                         }
//                                     },
//                                     error: function(response) {
//                                         toastr.error('Failed to verify OTP. Please try again.');
//                                     }
//                                 });
//                                 }
//                             });
//                         } else {
//                             toastr.error('Invalid Phone Number!');
//                         }
//                     },
//                     error: function(jqXHR, textStatus, errorThrown) {
//                         toastr.error('Error sending OTP!');
//                     }
//                 });
//             }
//             });
// });


 
 </script>