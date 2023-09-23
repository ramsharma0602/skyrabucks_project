<title>Sign_up</title>
<?php  include ('include/header.php'); ?>

    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Sign In</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Sign In</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100" >
            <div class="row">
                <div class="col-xxl-5 col-xl-4 col-lg-5 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="<?php echo base_url()?>assets/images/inner-page/sign-up.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-8 mx-auto" id="product_body">
                    <div class="log-in-box" >
                        <div class="log-in-title">
                            <h3>Welcome To Skyrabucks</h3>
                            <h4>Create New Account</h4>
                        </div>

                       <!--  <div class="input-box">
                            <form class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="full_name" id="inputfull_name" placeholder="">
                                        <label for="full_name">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="email" id="inputEmail" placeholder="">
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="mobile" id="inputMobile" placeholder="">
                                        <label for="mobile">Mobile number</label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="address" id="inputaddress" placeholder="">
                                        <label for="mobile">Address</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="Pincode" id="inputpincode" placeholder="">
                                        <label for="mobile">Pincode</label>
                                    </div>
                                </div>
                                 <div class="col-3">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="city" id="inputcity" placeholder="">
                                        <label for="mobile">City</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" id="inputPassword" name="password"
                                            placeholder="">
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">I agree with
                                                <span>Terms</span> and <span>Privacy</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <a class="btn btn-animation w-100" id="submit" >Sign Up</a>
                                </div>
                            </form>
                        </div> -->

                    <div class="input-box">
                        <div class="row g-4">
                            
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <label for="inputfull_name" class="form-label">Full Name</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="inputfull_name"
                                            placeholder="Enter Full Name">
                                    </div>
                            </div>
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <label for="inputEmail" class="form-label">Email Address</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="inputEmail"
                                            placeholder="Enter Email Address">
                                </div>
                            </div>
                           
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <label for="inputMobile" class="form-label">Mobile Number</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="inputMobile"
                                            placeholder="Enter Your Mobile Number" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                    </div>
                            </div>
                            
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <label for="inputState" class="form-label">State</label>
                                    <select id="state_id"  name="state_id" class="form-control" required>
                                         <option selected hidden="">Choose...</option>
                                    </select>
                            </div>
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <label for="inputcity" class="form-label">City</label>
                                   <select id="city_id"  name="city_id" class="form-control" required>
                                         <option selected hidden="">Choose...</option>
                                    </select>
                            </div>
                            
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <label for="inputpincode" class="form-label">Pincode</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="inputpincode"
                                            placeholder="Enter Pincode">
                                    </div>
                            </div>
                             
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                <!-- <div class="mb-md-4 mb-3 custom-form"> -->
                                    <label for="inputaddress" class="form-label">Address</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="inputaddress"
                                            placeholder="Enter Address">
                                    </div>
                                <!-- </div> -->
                            </div>
                            <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <label for="inputlandmark" class="form-label">Landmark</label>
                                    <div class="custom-input">
                                        <input type="text" class="form-control" id="inputlandmark"
                                            placeholder="Enter Landmark">
                                    </div>
                            </div>

                                <!-- <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <label for="inputMobile" class="form-label">Landmark</label>

                                        <div class="form-floating theme-form-floating">
                                            <input type="text" class="form-control" name="landmark" id="inputlandmark" placeholder="">
                                        </div>
                                </div>
                                 <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="city" id="inputcity" placeholder="">
                                        <label for="mobile">City</label>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="state" id="inputstate" placeholder="">
                                        <label for="state">State</label>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" name="pincode" id="inputpin_code" placeholder="">
                                        <label for="pincode">Pincode</label>
                                    </div>
                                </div> -->
                                
                            <div class="col-12">

                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" id="inputPassword" name="password"
                                            placeholder="Enter password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">I agree with
                                                <span>Terms</span> and <span>Privacy</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <a class="btn btn-animation w-100" id="submitBtn" >Sign Up</a>
                                </div>
                            </div>
                        </div>


                        <div class="sign-up-box">
                            <h4>Already have an account?</h4>
                            <a href="login1">Log In</a>
                        </div>
                    </div>



                       <!--  <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&amp;flowEntry=ServiceLogin"
                                        class="btn google-button w-100">
                                        <img src="<?php echo base_url()?>assets/images/inner-page/google.png" class="blur-up lazyload"
                                            alt="">
                                        Sign up with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="<?php echo base_url()?>assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                            alt=""> Sign up with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div> -->

                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- log in section end -->

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

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="<?php echo base_url()?>assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js-->
    <script src="<?php echo base_url()?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="<?php echo base_url()?>assets/js/feather/feather.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/feather/feather-icon.js"></script>

    <!-- Slick js-->
    <script src="<?php echo base_url()?>assets/js/slick/slick.js"></script>
    <script src="<?php echo base_url()?>assets/js/slick/slick-animation.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/slick/custom_slick.js"></script>

    <!-- Lazyload Js -->
    <script src="<?php echo base_url()?>assets/js/lazysizes.min.js"></script>


   
    <?php  include ('include/footer.php'); ?>

<script type="text/javascript">


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




$(function() {
    // $("#submitBtn").click(function(){
    //     $("#submitBtn").off("click");
    // });


    $('#submitBtn').click(function() {

        var full_name = $('#inputfull_name').val();
        var email = $('#inputEmail').val();
        var mobile = $('#inputMobile').val();
        var address=$('#inputaddress').val();
        var state_id=$('select[name=state_id]').val();
        var city_id=$('select[name=city_id]').val();
        var landmark=$('#inputlandmark').val();
        var pincode=$('#inputpincode').val();
        var valid_credential = $('#inputPassword').val();

        if (full_name == "" ) {
            toastr.error("please fill the required details")
        }
        else if (email == "") {
            toastr.error("please enter user email");
        } 
        else if (mobile==""){
             toastr.error("please enter the mobile number")
        }
        else if((mobile.length)!=10){
            toastr.error("Please Enter valid mobile number")
        }
         else if(landmark==""){
             toastr.error("please enter landmark")
         }
         else if(city_id==""){
             toastr.error("please select city name ")
         }
         else if(state_id==""){
             toastr.error("please select state")
         }
          else if(pincode==""){
             toastr.error("please enter pincode")
         }
         else if((pincode.length)!=6){
            toastr.error("Please Enter valid pincode")
        }
         else if(address==""){
             toastr.error("please enter address")
         }
        else if (valid_credential == "") {
            toastr.error('Please enter password');
        } else {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: "<?php echo base_url('api/Customer_login/register'); ?>",
                data: {
                    full_name: full_name,
                    email: email,
                    mobile:mobile,
                    credential: valid_credential,
                    address:address,
                    city_id:city_id,
                    landmark:landmark,
                    pincode:pincode,
                    state_id:state_id,
                },
                async: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message);
                        window.location.href = '<?php echo base_url() ?>' +
                            'home/login1';
                        document.getElementById("reset").reset();
                    } else {
                        toastr.error("response.message");

        var full_name = $('#inputfull_name').val("");
        var email = $('#inputEmail').val("");
        var mobile = $('#inputMobile').val("");
        var address=$('#inputaddress').val("");
        var city=$('#inputcity').val("");
        var landmark=$('#inputlandmark').val("");
        var pincode=$('#inputpincode').val("");
        var state=$('#inputstate').val("");
        var valid_credential = $('#inputPassword').val("");

                    }

                },
                error: function(response) {
                    var full_name = $('#inputfull_name').val("");
        var email = $('#inputEmail').val("");
        var mobile = $('#inputMobile').val("");
        var address=$('#inputaddress').val("");
        var city=$('#inputcity').val("");
        var landmark=$('#inputlandmark').val("");
        var pincode=$('#inputpincode').val("");
        var state=$('#inputstate').val("");
        var valid_credential = $('#inputPassword').val("");

                    var text = response.message;
                    // console.log(text);
                     toastr.error('Error, Please Enter required details !');
                    toastr.error(text.message);

                }
            });
        }

    });

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
});

 $(function() {
        
    var is_logged_in ='<?php echo json_encode($this->session->userdata('active_customer')) ?>';
    is_logged_in = JSON.parse(is_logged_in);
    var customer_id = is_logged_in.customer_id;


$('#update_address').click(function() {
    var address=$('input[name=address]').val();
    var postcode=$('input[name=postcode]').val();
    var city=$('input[name=city]').val();
    var state=$('input[name=state]').val();
    var country=$('input[name=country]').val();
    
    console.log(address+" "+customer_id +" "+postcode+" "+city+" "+state+" "+country);
    if (address != "") {
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url(); ?>api/Customer_login/update_address',
            async: false,
            dataType: 'json',
            data:{
                customer_id:customer_id,
                address:address,
                postcode:postcode,
                city:city,
                state:state,
                country:country
            },

            success: function(response) {
                
                    
                if (response.status) {
                    toastr.success('Successfully updated records !');
                } else {
                    toastr.error('Error, Please Try again !');
                }

                showallData();

            },
            error: function(response) {
                
                toastr.error(response.message);


            }

        });
    } else {
        toastr.error("please enter address");
    }
});    
  
});

</script>
