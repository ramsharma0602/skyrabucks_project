<?php  include(APPPATH.'views/sub_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
    <div class="row">
      <h2>Dashboard</h2>
      <div class="col-xl-10 col-sm-10">
        <div class="dropdown " style="float:right">
            <select class="form-control target" id="state_id" name="state_id">
                    <option value="" selected=" " hidden="">Please Select State</option>
            </select>
            </div>
        </div>
        </div>
      <hr>

      <div class="row">
       <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse card-danger" style=" overflow: hidden;" >
              <div class="card-block bg-danger" style="z-index: 8; float: right;  height: 100%;">
                 <a href="<?php echo base_url('Sub_admin/Sell');?>">  
                <div class="rotate">
                  <i class="fa fa-list fa-4x" style="color: rgba(20, 20, 20, 0.15); position: absolute;left: 0; left: auto;  right: -10px; bottom: 0; display: block;  -webkit-transform: rotate(-44deg);  -moz-transform: rotate(-44deg); -o-transform: rotate(-44deg); -ms-transform: rotate(-44deg); transform: rotate(-44deg);"></i>
                </div>
                 <h6 class="text-uppercase" style="color:white; padding:20px;">Total Sale</h6>
                <h3 class="display-3" style="color:white; padding:20px;"></h3>
               </a>
              </div>
            </div>
          </div>
         
          <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse card-danger" style=" overflow: hidden;" >
         
              <div class="card-block bg-success" style="z-index: 8; float: right;  height: 100%;">
                    <a href="<?php echo base_url('Sub_admin/all_products');?>">
                <div class="rotate">
                  <i class="fa fa-list fa-4x" style="color: rgba(20, 20, 20, 0.15); position: absolute;left: 0; left: auto;  right: -10px; bottom: 0; display: block;  -webkit-transform: rotate(-44deg);  -moz-transform: rotate(-44deg); -o-transform: rotate(-44deg); -ms-transform: rotate(-44deg); transform: rotate(-44deg);"></i>
                </div>
               
                 <h6 class="text-uppercase" style="color:white; padding:20px;">Total Products</h6>
                   
                <h3 class="display-3" style="color:white; padding:20px;"></h3>
             </a>
              </div>
             
            </div>
          </div>
        
        <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse card-danger" style=" overflow: hidden;" >
              <div class="card-block bg-info" style="z-index: 8; float: right;  height: 100%;">
                  <a href="<?php echo base_url('Sub_admin/customer');?>">  
                  <div class="rotate">
                  <i class="fa fa-list fa-4x" style="color: rgba(20, 20, 20, 0.15); position: absolute;left: 0; left: auto;  right: -10px; bottom: 0; display: block;  -webkit-transform: rotate(-44deg);  -moz-transform: rotate(-44deg); -o-transform: rotate(-44deg); -ms-transform: rotate(-44deg); transform: rotate(-44deg);"></i>
                </div>
                 <h6 class="text-uppercase" style="color:white; padding:20px;">Total Users</h6>
                <h3 class="display-3" style="color:white; padding:20px;"></h3>
               </a>
               </div>
            </div>
          </div>
          
         <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse card-danger" style=" overflow: hidden;" >
              <div class="card-block bg-secondary" style="z-index: 8; float: right;  height: 100%;">
                  <a href="<?php echo base_url('Sub_admin/todays_sale');?>">  
                  <div class="rotate">
                  <i class="fa fa-list fa-4x" style="color: rgba(20, 20, 20, 0.15); position: absolute;left: 0; left: auto;  right: -10px; bottom: 0; display: block;  -webkit-transform: rotate(-44deg);  -moz-transform: rotate(-44deg); -o-transform: rotate(-44deg); -ms-transform: rotate(-44deg); transform: rotate(-44deg);"></i>
                </div>
                 <h6 class="text-uppercase" style="color:white; padding:20px;">Today's Sale</h6>
                
                <h3 class="display-3" style="color:white; padding:20px;"></h3>
               </a>
               </div>
            </div>
          </div>
         
         
      </div>
  </div>
</main>

<?php  include(APPPATH.'views/sub_admin/include/footer.php'); ?>

<script>
$( "#state_id" ).on( "change", function() {
var state_id = $(this).val();
$.ajax({
          url:"<?php echo base_url().('api/States_and_sub_admin/fetch_state/');?>"+state_id,
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
          url:"<?php echo base_url().('api/States_and_sub_admin/fetch_state');?>",
          method:"get",
          async: false,
          dataType: 'json',  
            success:function(response){
                 
                var html='<option value="" selected hidden>Please select State</option>';
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
                   '<td>'+data[x].state_id+'</td>'+
                   '<td>'+data[x].state_name+'</td>'+

                '</tr>';
                   
          
            }

            $('#state_id').html(html);  
        },
        error: function(response)
        {
          var html='';   
            $('#state_id').html(html);  
            var data =JSON.parse(response.responseText);
            toastr.error(data.message);

        }

});

}

</script>
