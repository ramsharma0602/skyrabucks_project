
<?php  include(APPPATH.'views/support_team/include/header.php'); ?>
<style>

.card {
    overflow:hidden;
}

    .card-body .rotate i {
    color: rgba(20, 20, 20, 0.15);
    position: absolute;
    left: 0;
    left: auto;
    right: -10px;
    bottom: 0;
    display: block;
    -webkit-transform: rotate(-44deg);
    -moz-transform: rotate(-44deg);
    -o-transform: rotate(-44deg);
    -ms-transform: rotate(-44deg);
    transform: rotate(-44deg);
}
</style>
<main class="page-content">
    <div class="container-fluid">
    <div class="row">
      <h2>Dashboard</h2>
        <div class="col-xl-10 col-sm-10">
        <div class="dropdown " style="float:right">
            <select class="form-control target" id="city_id" name="city_id">
                    <option value="" selected=" " hidden="">Please Select City</option>
            </select>
            </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xl-3 col-sm-6">
            <a href="<?php echo base_url('Seller/all_products');?>">
                <div class="card bg-warning text-white">
                    <div class="card-body bg-warning">
                        <div class="rotate">
                            <i class="fas fa-list fa-4x"></i>
                        </div>
                        <h6>Total Count Of Job Request </h6>
                        <!-- <h3 class="display-3" style="color:white; padding:20px;"><?php echo $this->db->get_where('order_details')->num_rows(); ?></h3> -->
                    </div>
                </div>
            </a>
        </div>
       
       <div class="col-xl-3 col-sm-6">
            <a href="<?php echo base_url('seller/sell');?>">
            <div class="card bg-success text-white">
                <div class="card-body bg-success">
                    <div class="rotate">
                        <i class="fas fa-list fa-4x"></i>
                    </div>
                    <h6>Total Orders</h6>
                    <!-- <h3 class="display-3" style="color:white; padding:20px;"><?php echo $this->db->get_where('order_details')->num_rows(); ?></h3> -->
                </div>
            </div>
            </a>
        </div>
          
      </div>
  </div>
</main>
<?php  include(APPPATH.'views/support_team/include/footer.php'); ?>

<script>
$( "#city_id" ).on( "change", function() {
var city_id = $(this).val();
$.ajax({
          url:"<?php echo base_url().('api/Cities_and_support_team/fetch_city/');?>"+city_id,
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                console.log("success");
            },error: function(response){
                console.log("error");
            }

});
} );

all_location()
function all_location(){
    $.ajax({
          url:"<?php echo base_url().('api/Cities_and_support_team/fetch_city');?>",
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                 
                var html='<option value="" selected hidden>Please select City</option>';
                var x,i;
                var data=response.data;
                  if (data) {
                    for (x =0 ; x<data.length; x++) {
                         var i=x+1;
                         html+='<option value="'+data[x].city_id+'">'+data[x].city+'</option>';
                        
                      }
                }
                
            $('#city_id').html(html);
           
   
            },

            error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(data.message);

            }
        });


      }
function showallData(){

$.ajax({
    type: 'ajax',
    url: "<?php echo base_url() ?>api/City/fetch_all_location/",
    async: false,
    dataType: 'json',
    success: function(response) {
        // body...

        var data=response.data;
        var html ='';
        // var tbt="";
        // var x ="";
        var x,i;
        var data=response.data;
        for (x =0 ; x<data.length; x++) {
          var i=x+1
           
           html+='<tr>'+
                   '<td>'+i+'</td>'+
                   '<td>'+data[x].city_id+'</td>'+
                   '<td>'+data[x].city+'</td>'+

                '</tr>';
                   
          
            }

            $('#city_id').html(html);  
        },
        error: function(response)
        {
          var html='';   
            $('#city_id').html(html);  
            var data =JSON.parse(response.responseText);
            toastr.error(data.message);

        }

});

}

</script>
