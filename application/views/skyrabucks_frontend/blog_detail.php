<title>Blog detail</title>
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

             <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
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
    </div>  -->
    <!-- mobile fix menu end -->

    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Blog Details Page</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Blog</li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Details Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 col-lg-5 d-lg-block d-none">
                    <div class="left-sidebar-box">

                        <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Recent Post
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body pt-0">
                                        <div class="recent-post-box">
                                            <div class="recent-box">
                                                <a href="blog_detail" class="recent-image">
                                                        <img src="<?php echo base_url()?>/assets/images/grocery/product/breakfast/5.png" alt="">
                                                </a>

                                                <div class="recent-detail">
                                                    <a href="blog_detail">
                                                        <h5 class="recent-name">Bourn vita</h5>
                                                    </a>
                                                    <h6>25 Jan, 2023 <i data-feather="thumbs-up"></i></h6>
                                                </div>
                                            </div>

                                            <div class="recent-box">
                                                <a href="blog_detail" class="recent-image">
                                                        <img src="<?php echo base_url()?>/assets/images/grocery/product/breakfast/3.png" alt="">
                                                </a>

                                                <div class="recent-detail">
                                                    <a href="blog_detail">
                                                        <h5 class="recent-name">Chocos</h5>
                                                    </a>
                                                    <h6>25 Jan, 2023 <i data-feather="thumbs-up"></i></h6>
                                                </div>
                                            </div>

                                            <div class="recent-box">
                                                <a href="blog_detail" class="recent-image">
                                                        <img src="<?php echo base_url()?>/assets/images/grocery/product/breakfast/6.png" alt="">
                                                </a>

                                                <div class="recent-detail">
                                                    <a href="blog_detail">
                                                        <h5 class="recent-name">Tulsi Tea</h5>
                                                    </a>
                                                    <h6>25 Jan, 2023 <i data-feather="thumbs-up"></i></h6>
                                                </div>
                                            </div>

                                            <div class="recent-box">
                                                <a href="blog_detail" class="recent-image">
                                                        <img src="<?php echo base_url()?>/assets/images/grocery/product/breakfast/4.png" alt="">
                                                </a>

                                                <div class="recent-detail">
                                                    <a href="blog_detail">
                                                        <h5 class="recent-name">Paneer</h5>
                                                    </a>
                                                    <h6>25 Jan, 2023 <i data-feather="thumbs-up"></i></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Category
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body p-0">
                                        <div class="category-list-box">
                                            <ul id="category_load">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFour">
                                        Trending Products
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body">
                                        <ul class="product-list product-list-2 border-0 p-0">
                                            <li>
                                                <div class="offer-product">
                                                    <a href="shop-left-sidebar" class="offer-image">
                                                            <img src="<?php echo base_url()?>/uploads/job/1681715697.png" alt="">
                                                    </a>

                                                    <div class="offer-detail">
                                                        <div>
                                                            <a href="shop-left-sidebar">
                                                                <h6 class="name">Hydration facials and cleanups</h6>
                                                            </a>
                                                            <h6 class="price theme-color">₹ 1170.00</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="offer-product">
                                                    <a href="shop-left-sidebar" class="offer-image">
                                                            <img src="<?php echo base_url()?>/uploads/job/1683114042.png" alt="">
                                                    </a>

                                                    <div class="offer-detail">
                                                        <div>
                                                            <a href="shop-left-sidebar">
                                                                <h6 class="name">Cut and polish</h6>
                                                            </a>
                                                            <h6 class="price theme-color">₹ 1140.00</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="mb-0">
                                                <div class="offer-product">
                                                    <a href="shop-left-sidebar" class="offer-image">
                                                            <img src="<?php echo base_url()?>/uploads/job/1683112321.png" alt="">
                                                    </a>

                                                    <div class="offer-detail">
                                                        <div>
                                                            <a href="shop-left-sidebar">
                                                                <h6 class="name">Fridge deep cleaning</h6>
                                                            </a>
                                                            <h6 class="price theme-color">₹ 1180.00</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8 col-lg-7 ratio_50">
                    <div class="blog-detail-image rounded-3 mb-4">
                        <img src="<?php echo base_url()?>assets/images/inner-page/blog/1.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="blog-image-contain">
                            <ul class="contain-list">
                                <li>backpack</li>
                                <li>life style</li>
                                <li>organic</li>
                            </ul>
                            <h2>Agriculture Conference Harvest 2022 in Paris</h2>
                            <ul class="contain-comment-list">
                                <li>
                                    <div class="user-list">
                                        <i data-feather="user"></i>
                                        <span>Caroline</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="user-list">
                                        <i data-feather="calendar"></i>
                                        <span>April 19, 2022</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="user-list">
                                        <i data-feather="message-square"></i>
                                        <span>82 Comment</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="blog-detail-contain">
                        <!-- <p><span class="first">S</span> hotgun approach message the initiative so can I just chime in
                            on that one. Make sure to include in your wheelhouse bells and whistles, and touch base
                            slow-walk our commitment nor what's the status on the deliverables for eow?. Create spaces
                            to explore whatâ€™s next commitment to the cause , or UI, for get buy-in but draw a line in
                            the sand, and pig in a python we've got kpis for that. Message the initiative value prop,
                            please use "solutionise" instead of solution ideas! :) i am dead inside. Quick sync
                            4-blocker. Driving the initiative forward flesh that out.</p>

                        <p>Let's unpack that later everyone thinks the soup tastes better after theyâ€™ve pissed in it
                            pivot, re-inventing the wheel, and it's not hard guys. Market-facing pushback back of the
                            net, for pro-sumer software let's see if we can dovetail these two projects but turn the
                            crank for they have downloaded gmail and seems to be working for now. This is not the hill i
                            want to die on you better eat a reality sandwich before you walk back in that boardroom land
                            the plane yet exposing new ways to evolve our design language design thinking nor poop, so
                            can you put it into a banner that is not alarming, but eye catching and not too giant. That
                            is a good problem to have dog and pony show we're ahead of the curve on that one.</p>

                        <p> Waste of
                            resources can you run this by clearance? hot johnny coming through driving the
                            initiative
                            forward our competitors are jumping the shark. Unlock meaningful moments of relaxation.
                            Copy
                            and paste from stack overflow a tentative event rundown is attached for your reference,
                            including other happenings on the day you are most welcome to join us beforehand for a
                            light
                            lunch we would also like to invite you to other activities on the day, including the
                            interim
                            and closing panel discussions on the intersection of businesses and social innovation,
                            and
                            on building a stronger social innovation eco-system respectively what are the
                            expectations,
                            on-brand but completeley fresh we can't hear you.</p>

                        <div class="blog-details-quote">
                            <h3>Adipisicing elit Qui ipsam natus aspernatur quaerat impedit eveniet ipsum dolor</h3>
                            <h5>- Denny Dose</h5>
                        </div>

                        <p>Agile currying favour pulling teeth collaboration through advanced technology. Everyone thinks
                            the soup tastes better after theyâ€™ve pissed in it can you put it on my calendar?.
                            Low-hanging fruit. Data-point blue sky yet first-order optimal strategies shotgun approach.
                            Land it in region. Idea shower prairie dogging a set of certitudes based on deductions
                            founded on false premise nor three-martini lunch. Baseline. Run it up the flag pole big boy
                            pants so game-plan, and it just needs more cowbell pixel pushing, but we need to make the
                            new version clean and sexy. Back of the net we need a recap by eod, cob or whatever comes
                            first for we need evergreen content.</p>

                        <p class="mb-0">We need to harvest synergy effects land it in region nor time to open the
                            kimono, but we need to touch base off-line before we fire the new ux experience. Moving the
                            goalposts. Lean into that problem we need to get all stakeholders up to speed and in the
                            right place. Get all your ducks in a row this proposal is a win-win situation which will
                            cause a stellar paradigm shift, and produce a multi-fold increase in deliverables or dunder
                            mifflin for high-level nor gain alignment into the weeds. Open door policy. Goalposts
                            player-coach but quick win, so effort made was a lot for game-plan in an ideal world
                            commitment to the cause . Service as core &innovations as power makes our brand meeting
                            assassin core competencies run it up the flagpole, ping the boss and circle back but zoom
                            meeting at 2:30 today.</p> -->
                    </div>

                    <div class="comment-box overflow-hidden">
                        <div class="leave-title">
                            <h3>Comments</h3>
                        </div>

                        <div class="user-comment-box">
                            <ul>
                                <li>
                                    <div class="user-box border-color">
                                        <div class="reply-button">
                                            <i class="fa-solid fa-reply"></i>
                                            <span class="theme-color">Reply</span>
                                        </div>
                                        <div class="user-iamge">
                                            <img src="<?php echo base_url()?>assets/images/inner-page/user/1.jpg"
                                                class="img-fluid blur-up lazyload" alt="">
                                            <div class="user-name">
                                                <h6>30 Jan, 2022</h6>
                                                <h5 class="text-content">Glenn Greer</h5>
                                            </div>
                                        </div>

                                        <div class="user-contain">
                                            <p>"This proposal is a win-win situation which will cause a stellar paradigm
                                                shift, and produce a multi-fold increase in deliverables a better
                                                understanding"</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="user-box border-color">
                                        <div class="reply-button">
                                            <i class="fa-solid fa-reply"></i>
                                            <span class="theme-color">Reply</span>
                                        </div>
                                        <div class="user-iamge">
                                            <img src="<?php echo base_url()?>assets/images/inner-page/user/2.jpg"
                                                class="img-fluid blur-up lazyload" alt="">
                                            <div class="user-name">
                                                <h6>30 Jan, 2022</h6>
                                                <h5 class="text-content">Glenn Greer</h5>
                                            </div>
                                        </div>

                                        <div class="user-contain">
                                            <p>"Yeah, I think maybe you do. Right, gimme a Pepsi free. Of course, the
                                                Enchantment Under The Sea Dance they're supposed to go to this, that's
                                                where they kiss for the first time. You'll find out. Are you sure about
                                                this storm?"</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="li-padding">
                                    <div class="user-box">
                                        <div class="reply-button">
                                            <i class="fa-solid fa-reply"></i>
                                            <span class="theme-color">Reply</span>
                                        </div>
                                        <div class="user-iamge">
                                            <img src="<?php echo base_url()?>assets/images/inner-page/user/3.jpg"
                                                class="img-fluid blur-up lazyload" alt="">
                                            <div class="user-name">
                                                <h6>30 Jan, 2022</h6>
                                                <h5 class="text-content">Glenn Greer</h5>
                                            </div>
                                        </div>

                                        <div class="user-contain">
                                            <p>"Cheese slices goat cottage cheese roquefort cream cheese pecorino cheesy
                                                feet when the cheese comes out everybody's happy"</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="leave-box">
                        <div class="leave-title mt-0">
                            <h3>Leave Comment</h3>
                        </div>

                        <div class="leave-comment">
                            <div class="comment-notes">
                                <p class="text-content mb-4">Your email address will not be published. Required fields
                                    are marked</p>
                            </div>
                            <div class="row g-3">
                                <div class="col-xxl-4 col-lg-12 col-sm-6">
                                    <div class="blog-input">
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Full Name">
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-lg-12 col-sm-6">
                                    <div class="blog-input">
                                        <input type="email" class="form-control" id="exampleFormControlInput2"
                                            placeholder="Enter Email Address">
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-lg-12 col-sm-6">
                                    <div class="blog-input">
                                        <input type="url" class="form-control" id="exampleFormControlInput3"
                                            placeholder="Enter URL">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="blog-input">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                                            placeholder="Comments"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check d-flex mt-4 p-0">
                                <input class="checkbox_animated" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label text-content" for="flexCheckDefault">
                                    <span class="color color-1"> Save my name, email, and website in this
                                        browser for the next time I comment.</span>
                                </label>
                            </div>

                            <button class="btn btn-animation ms-xxl-auto mt-xxl-0 mt-3 btn-md fw-bold">Post
                                Comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
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
                            <input type="search" onkeyup="search()" id="myInput" class="form-control" placeholder="Search Your Area">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar" class="deal-image">
                                        <img src="<?php echo base_url()?>assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar" class="deal-image">
                                        <img src="<?php echo base_url()?>assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar" class="deal-image">
                                        <img src="<?php echo base_url()?>assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar" class="deal-image">
                                        <img src="<?php echo base_url()?>assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->

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


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/blog-detail by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Apr 2023 08:03:58 GMT -->
<?php  include ('include/footer.php'); ?>
<script>
showallmaincategory();
function showallmaincategory() {

        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>api/Product/fetch_main_service",
            async: false,
            dataType: 'json',
            success: function(response) {
                // body...
                var html = '';
                var x, i;
                var data = response.data;
                console.log(data);
                for (x = 0; x < data.length; x++) {
                    var i = x + 1
                    html +=
                        '<li><a href="#">' + data[x].main_service_name + '</a></li>'
                    }
                $('#category_load').html(html);
            },
            error: function(response) {
                html = '';
                $('#category_load').html(html);
            }
        });
    }
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

</script>
