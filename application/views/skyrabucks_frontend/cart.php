<title>Cart</title>
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
    </div> -->
    <!-- mobile fix menu end -->

    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<div id ="test">
</div>
    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table" >
                                <tbody class="item" id="showcart" >
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain" id="showcart">
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 id="Subtotal" class="price"></h4>
                                </li>

                                <li class="align-items-start">
                                    <h4>Shipping/Services</h4>
                                    <h4 id="Shipping" class="price text-end"></h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (IND)</h4>
                                <h4 id="Total" class="price theme-color"></h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <a href="<?php echo base_url()?>Home/Checkout">
                                    <button 
                                        class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url()?>Home">
                                    <button 
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->

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
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
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

var sub_total=0;

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

    $('.product-qty').on('click', '.plus', function() {
        var id = $(this).attr('data');
        
        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>api/Cart/qty_plus",
            type: 'post',
            data: {
                rowid: id
            },
            async: false,
            dataType: 'json',
            success: function(response) {
                // body..
                // var data = JSON.parse(response.responseText);
                toastr.success(response.message);
            },
            error: function(response) {
                var data = JSON.parse(response.responseText);
                toastr.error(data.message);

            }

        });
    });
    $('.product-qty').on('click', '.minus', function() {
        var id = $(this).attr('data');
        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>api/Cart/qty_minus",
            type: 'post',
            data: {
                rowid: id
            },
            async: false,
            dataType: 'json',
            success: function(response) {
                // body..
                // var data = JSON.parse(response.responseText);
                toastr.success(response.message);
            },
            error: function(response) {
                var data = JSON.parse(response.responseText);
                toastr.error(data.message);

            }

        });
    });
});

    $('.cart-table').on('click', '.close_button', function() {
        var id = $(this).attr('data');
        // console.log(data);
        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>api/Cart/remove_product_from_cart",
            type: 'post',
            data: {
                rowid: id
            },
            async: false,
            dataType: 'json',
            success: function(response) {
                
                setTimeout(function() {
                location.reload();
            }, 500);
                showmaincart();
                data = response.data;
                toastr.success(response.message);
                
                

            },
            error: function(response) {

                var data = JSON.parse(response.responseText);
                toastr.error(data.message);

            }

        });
    });


 showmaincart();
 function showmaincart() {

        $.ajax({
            type: 'ajax',
            // method: 'get',
            url: "<?php echo base_url() ?>api/Cart/fetch_Cart",
            async: false,
            dataType: 'json',
            success: function(response) {
               
                var html = '';
                var fetch_subtotal = '';
                var x, i;
                var data = response.data;
                var subtotal = 0;
                for (x = 0; x < data.length; x++) {
                    var i = x + 1

                    html +=
                        '<tr class="product-box-contain">' +
                                    '<td class="product_detail">' +
                                        '<div class="product border-0">' +
                                                
                                                '<a href="product_detail" class="product-image">' +
                                                '<img src="<?php echo base_url()?>uploads/job/'+data[x].job_image+'" class="img-fluid blur-up lazyload" alt="" >'+
                                                ' </a>'+ 
                                               
                                           ' </div>'+
                                        ' </td>'+
                                        ' <td class="product_detail">' +
                                            '<div class="product border-0">' +
                                                 '<div class="product-detail">'+
                                                    '<ul>'+
                                                        '<li class="name">'+
                                                        '<h4 class="table-title text-content">Name</h4>'+
                                                           ' <a href="product_detail">'+data[x].name+'</a>'+
                                                        '</li>'+
                                                  ' </ul>'+
                                                '</div> '+
                                           ' </div>'+
                                       ' </td>'+

                                       ' <td class="price">'+
                                            '<h4 class="table-title text-content">Price:</h4>'+
                                            '<h5>₹'+data[x].price+'<del class="text-content">₹'+data[x].discount+'</del></h5>'+
                                       ' </td>'+

                                       ' <td class="quantity">'+
                                            '<h4 class="table-title text-content">QTY</h4>'+
                                
                                                '<div class="cart_qty qty-box product-qty">'+
                                                    '<div class="input-group">'+
                                                        '<button type="button" class="qty-right plus" href="javascript:void(0);" data-type="plus" data-field="">'+
                                                            '<i class="fa fa-plus" aria-hidden="true"></i>'+
                                                         '</button>'+
                                                        '<input class="form-control input-number qty-input" id="Quantity" type="text" name="Quantity" value="'+data[x].qty+'">'+
                                                        '<button type="button" class="qty-left minus" href="javascript:void(0);" data-type="minus" data-field="">'+
                                                            '<i class="fa fa-minus" aria-hidden="true"></i>'+
                                                        '</button>'+ 
                                                    '</div>'+
                                                 '</div>'+
                                    ' </td>'+

                                        '<td class="subtotal">'+
                                        '<h4 class="table-title text-content">Total:</h4>'+
                                            '<h4 class="table-title text-content">₹'+data[x].subtotal+'</h4>'+
                                       ' </td>'+

                                        '<td class="save-remove">'+
                                            '<h4 class="table-title text-content">Action</h4>'+
                                            '<a class="remove close_button" href="javascript:void(0)" data="' +data[x].rowid+ '"  > Remove </a>' +
                                       ' </td>'+
                                    '</tr>';


            }
            for (var x=0; x < data.length; x++) {
                console.log(data);
                sub_total = (Number.parseFloat(data[x].subtotal)+sub_total) ;
                console.log(sub_total);
                var i = x + 1
            }
                // html +=     
                //            '<ul>'+
                //                 '<li>'+
                //                     '<h4>Subtotal</h4>'+
                //                     '<h4 class="price">₹'+sub_total+'</h4>'+
                //                 '</li>'+

                //                 '<li>'+
                //                     '<h4>Shipping/Services</h4>'+
                //                     '<h4 class="price">₹00</h4>'+
                //                 '</li>'+
                //                 '<li>'+
                //                     '<h4>Tax</h4>'+
                //                     '<h4 class="price">₹00</h4>'+
                //                 '</li>'+
                //             ' </ul>'
                
                document.getElementById("Subtotal").innerHTML = '₹ '+sub_total;
                document.getElementById("Shipping").innerHTML = '₹ '+0;
                document.getElementById("Total").innerHTML = '₹ '+sub_total;
                // console.log(html);
                $('#showcart').html(html);
            },
            error: function(response) {
                html = '';
                // document.getElementById("total-sub").innerHTML = '₹ '+0;
                $('#showcart').html(html);
            }

        });

    }


// showallcart();
// function showallcart() {
//     $.ajax({
//         type: 'ajax',
//         url: "<?php echo base_url() ?>api/Cart/fetch_Cart",
//         async: false,
//         dataType: 'json',
//         success: function(response) {
//             // body...
//             var html = '';
//             var x, i;
//             var dataprice = 0;
//             var data = response.data;
//             fetched_cart = data;
//             console.log(data);
//             for (x = 0; x < data.length; x++) {
//                 console.log(data[x]);
//                 var i = x + 1
//                 html +=         
//                                 '<li>'+
//                                     '<img style="height:45px; width:45px" src="<?php echo base_url()?>uploads/job/'+data[x].job_image+'" class="img-fluid blur-up lazyload" alt="" >'+
//                                     '<h4>'+data[x].name+' <span>X 1</span></h4>'+
//                                     '<h4 class="price">₹'+data[x].price+'</h4>'+
//                                '</li>';

//             }
//             for (var x=0; x < data.length; x++) {
//                let sub_total = (Number.parseFloat(data[x].price)+sub_total) ;
//                 console.log(sub_total);
//                 var i = x + 1
//                 } 
//                 html +=         
//                             '<ul>'+
//                                 '<li>'+
//                                     '<h4>Subtotal</h4>'+
//                                     '<h4 class="price">₹'+sub_total+'</h4>'+
//                                 '</li>'+

//                                 '<li>'+
//                                     '<h4>Shipping/Services</h4>'+
//                                     '<h4 class="price">₹00</h4>'+
//                                 '</li>'+
//                                 '<li>'+
//                                     '<h4>Tax</h4>'+
//                                     '<h4 class="price">₹00</h4>'+
//                                 '</li>'+
//                             ' </ul>'

               



//             console.log(data);
//              // document.getElementById("total_shipping").innerHTML = "₹" + data[data.length-2].total_shipping;
//              document.getElementById("total").innerHTML = "₹" + (data.price);
//             // if(is_logged_in){
//             //     document.getElementById("wallet").innerHTML = "-₹" + data[data.length-2].wallet;
//             //     let grand_t = (Number.parseFloat(data[data.length-2].grand_total) - Number.parseFloat(data[data.length-2].wallet ));
//             //     document.getElementById("total").innerHTML = "₹" + grand_t  ;  
//             //     var l = fetched_cart.length;
//             //     fetched_cart[l-2].grand_total = grand_t;              
            
//             $('#showcart1').html(html);
//             // $('#productcountehead').html(html2);
//         },
//         error: function(response) {
//             html = '';
//             // document.getElementById("advance").innerHTML = "₹" + 0;
//             // document.getElementById("total_shipping").innerHTML = "₹" + 0;
//             // document.getElementById("total").innerHTML ="₹"+0;
//             $('#showcart1').html(html);
//             // $('#productcountehead').html(html2);
//         }

//     });
// }
//setting input field to 1 in case of change in size
// $('#product_form_10508262282').on('click', '.swatch-element ', function() {
//             var qtyField = $('.qtyBtn').parent(".qtyField")
//             $(qtyField).find(".qty").val(1);
//             // console.log();
//         });

//         // increasing quantity
//         $('.product-qty') .on('click', '.plus', function() {
//             var qty = document.getElementById("Quantity").value;
//             var minimum= Number.MAX_VALUE;
            
//             var checkboxes = document.querySelectorAll('input[type=radio]:checked');
//             for (var i = 0; i < checkboxes.length; i++) {
//                 var id=checkboxes[i].id;
//                 // size_array.push({qty: $(checkboxes[i]).attr('qty')})
                
//                 minimum = Math.min(minimum, parseInt($(checkboxes[i]).attr('qty')));
//             }
            
//             if(qty<minimum  ){
//                 document.getElementById("Quantity").value= parseInt(qty)+1; 
//                 toastr.success("Quantity Increased ");

//             }else{
//                 var qtyField = $(this).parent(".qtyField");
//                 $(qtyField).find(".qty").val(minimum);
//                 document.getElementById("Quantity").value= minimum;
//                 toastr.error("Quantity Available is only "+ minimum);
//             }

//         });

//         $('.product-qty') .on('click', '.minus', function() {
//             var qty = document.getElementById("Quantity").value;
//             if(qty>1){
//                 document.getElementById("Quantity").value= parseInt(qty)-1; 
//                 toastr.success("Quantity Decreased ");
//             }else{
//                 var qtyField = $(this).parent(".qtyField");
//                 $(qtyField).find(".qty").val(1);
//                 toastr.error("Quantity should be 1 at least");
//             }
//         });

</script>
