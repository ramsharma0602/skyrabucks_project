<title>Product list</title>
<?php  include ('include/header.php'); ?>

    <!-- mobile fix menu start -->
    <!-- <div class="mobile-menu d-md-none d-block mobile-cart">
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
                        <h2>Blog List</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
 
    <!-- Blog Section Start -->
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                    <div class="row g-4">
                         <div class="col-12" id="job-load-name">
                            
                        </div> 
                    </div>
                </div>
<!-- ================================================================================================ -->
                <div class="col-xxl-3 col-xl-4 col-lg-5 order-lg-1">
                    <div class="left-sidebar-box wow fadeInUp">
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
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    
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
<script>
var limit =16;
var start = 0;
var action = 'active';
var value = "";
var job_id = "";
function lazzy_loader(limit)
{
    $('#load_data_message').html('<img src="<?php echo base_url(); ?>uploads/load_more.gif" alt="" class="img-fluid">');
}
lazzy_loader(limit);

$('#filterByPrice').click(function(){
        start = 0;
        var amountdata = $("#slider-range").slider("values");
      
        document.getElementById("mobile_sidebar").className = " col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar";
       
        search_data();
});

function search_data(){
    $.ajax({
        url:"<?php echo base_url(); ?>api/Product/search",
        method:"POST",
        data:{
            job_id : job_id, 
            search_key:value,
        },
        cache: false,
        success:function(response)
        {
        var data =response.data;
        console.log(data);
        var html='';
          if(data != '')
          {
            for (x =0 ; x< data.length; x++) {
                        if(data[x].job_img!="default.jpg"){
                        html+= 
     '<section class="blog-section section-b-space">'+
        '<div class="container-fluid-lg">'+
                        '<div class="col-12">'+
                            '<div class="blog-box blog-list wow fadeInUp" data-wow-delay="0.1s">' +
                                '<div class="blog-image">' +
                                    '<a href="<?php echo base_url('Home/product_detail/');?>'+data[x].job_id+'">'+
                                        '<img src="<?php echo base_url()?>uploads/job/'+data[x].job_image+'" class="blur-up lazyload" alt="">'+
                                    '</a>' +
                                    // '<label><i class="fa-solid fa-bolt-lightning"></i> popular</label>' +
                               ' </div>' +
                               
                                '<div class="blog-contain blog-contain-2">' +
                                   '<div class="blog-label">'+
                                   ' </div>'+
                                        '<a href="<?php echo base_url('Home/product_detail/');?>'+data[x].job_id+'">'+
                                            '<h3>'+data[x].job_name+'</h3>' +
                                        '</a>' +
    
                                          '<p style=" display: -webkit-box; max-width: 400px; -webkit-line-clamp: 3;-webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">'+data[x].short_description+'</p>'+
                                    
                                        '<a href="<?php echo base_url('Home/product_detail/'); ?>'+data[x].job_id+'">'+
                                        '<button type="button" class="blog-button">Read more <i class="fa-solid fa-right-long"></i>' +
                                        '</button>' +
                                        '</a>'+
                                    '<span class="price theme-color">₹' + data[x].price + '</span>' +
                                    '<span class="price-">&nbsp;&nbsp;₹</span>'+
                                    '<del class="price">' + data[x].discount + '</del>' +
                                '</div>'+
                            '</div>'+

                        '</div>'+
        ' </div>'+
     ' </section>'
                        }
            }
            // toastr.success(response.message);
            $('#job-load-name').append(html);
            $('#load_data_message').hide();
          }
          else
          {
            $('#load_data_message').append('<h3>No More Result Found</h3>');
             action = 'active';
          }
        },
           error: function(response){
                $('#load_data_message').hide();
		        $('#load_data_message').append('<h3>No More Result Found</h3>');
                action = 'active';
		        }        
      })
    }
function search_Job(job_id) {
        job_id = job_id;
        search_data();
        // $( "#productLoad" ).load(window.location.href + "#productLoad" );
}
    if(action == 'active'){
    action = 'inactive';
    search_data(limit, start, value);
}

$(window).scroll(function(){ 
    if($(window).scrollTop() + $(window).height() > $("#productLoad").height() && action == 'inactive'){
        $('#load_data_message').show();
        lazzy_loader(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
            search_data(limit, start, value);
        },900);
    }
});
function myBrand(job_id) {
    job_id = job_id;
    search_data();

}


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