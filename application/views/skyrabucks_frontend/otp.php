<title>OTP</title>
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
                        <h2>OTP</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">OTP</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section otp-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="<?php echo base_url()?>assets/images/inner-page/otp.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">
                            <div class="log-in-title">
                                <h3 class="text-title">Please enter the one time password to verify your account</h3>
                                <h5 class="text-content">A code has been sent to</h5>
                            </div>

                            <div id="otp" class="inputs d-flex flex-row justify-content-center">
                                <input id="inputOTP" name="otp" class="text-center form-control rounded" type="text" id="first" maxlength="6"
                                    placeholder="">
                               <!--  <input id="inputOTP" name="otp" class="text-center form-control rounded" type="text" id="second" maxlength="1"
                                    placeholder="0">
                                <input id="inputOTP" name="otp" class="text-center form-control rounded" type="text" id="third" maxlength="1"
                                    placeholder="0">
                                <input id="inputOTP" name="otp" class="text-center form-control rounded" type="text" id="fourth" maxlength="1"
                                    placeholder="0">
                                <input id="inputOTP" name="otp" class="text-center form-control rounded" type="text" id="fifth" maxlength="1"
                                    placeholder="0">
                                <input id="inputOTP" name="otp" class="text-center form-control rounded" type="text" id="sixth" maxlength="1"
                                    placeholder="0"> -->
                            </div>

                            <div class="send-box pt-4">
                                <h5>Didn't get the code? <a href="javascript:void(0)" class="theme-color fw-bold">Resend
                                        It</a></h5>
                            </div>
                            <div class="col-12">
                                    <a class="btn btn-animation w-100" id="verify_otp1" data-toggle="modal" >Validate</a>
                                </div>

                            <!-- <button  class="btn btn-animation w-100 mt-3"
                                type="submit" id="send_OTP" >Validate</button> -->
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
        </div> -->

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

<?php  include ('include/footer.php'); ?>
 <script type="text/javascript">
    $(function(){

});
      
            $('#verify_otp1').click(function() {
                var otp = $('#inputOTP').val();
                var mobile_no = '<?php echo $mobile_no ?>';
                if(otp==""){
                    toaster.error('Error ! Enter OTPS.')
                }else{
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() ?>api/Customer_login/verify_otp',
                    data: {
                        OTP: otp, 
                        mobile :mobile_no
                        },
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success('OTP verified successfully.');
                             window.location.href = '<?php echo base_url() ?>' +
                              'home/newpassword/'+mobile_no;
                            document.getElementById("OTP_send").style.display="none";
                            document.getElementById("changepassword").style.display="block";
                            } else {
                            toastr.error('Invalid OTP. Please try again.');
                        }
                         },
                    error: function(response) {
                        toastr.error('Failed to verify OTP. Please try again.');
                    }
                });
                    }
                });


 
 </script>