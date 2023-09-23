<?php include(APPPATH .'views/support_team/include/header.php'); ?>
 
<main class="page-content">
    <div class="container-fluid" id="product_body">
     
           <div class="row">
            <div class="col-md-10">    
                <h2>Add City</h2>
            </div>
        </div>
      <hr>
  
        <div class="card">
            <div class="card-header">
             city <a style="float: right;" href="javascript:;"  
             id="addLoc" class="addCF btn btn-outline-info">ADD City</a>
            </div>
               <form id="myform" action="">
                  <div class="card-body">
                      
                       <table class="form-table table table-bordered" id="customFields">
                  
                        </table>
                        
                   
                  </div>
              </form>

           <div class="card-footer">
               <button id="btnSave" class="btn btn-outline-secondary">Submit</button>
          </div>
   
        </div>
    </div>



</main>
<?php include(APPPATH . 'views/support_team/include/footer.php'); ?>
<script type="text/javascript">

$(function(){
$(document).ready(function(){
    
      // showallData();
    $("#addLoc").click(function(){
        showallData();
        $("#customFields").append('<tr>'+
                    '<td><select class="form-control target" id="city_id" name="city_id"><option value="" selected=" " hidden="">Please Select City </option></select></td>'+
                    '<td><a href="javascript:void(0);" class="remCF btn btn-sm"><i class="fas fa-times-circle"></i></a></td>'+
                    '</tr>');
    });
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });

});
});

// for save / insert data

$('#btnSave').click(function(){
   var url = $('#myform').attr('action');
   var data = $('#myform').serialize();
 
    $.ajax({
        type: 'ajax',
        method:'post',
        // url:,
        data: data,
        async: false,
        dataType: 'json',
        success: function(response){

               $('#myform')[0].reset();
  
                if (response.status) {
                 toastr.success(response.message);
                  showallData();
                }
                else{
                   toastr.error(response.message);
                }
                
               
        },

        error: function(){
            var data =JSON.parse(response.responseText);
                 toastr.error(response.message);

        }
    });

});


function showallData(){
            $.ajax({
                type: 'ajax',
                 method:'get',
                url: "<?php echo base_url() ?>api/City/fetch_all_cities",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
                    var html="";
                    var tbt="";
                    var i ="";
                    if(data){
                    for (var i = 0; i < data.length; i++) {
                   
                          html+='<option value="'+data[i].city_id+'">' +data[i].city_name+ '</option>';
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






</script>
