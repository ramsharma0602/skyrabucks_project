<?php  include(APPPATH.'views/super_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2> Cities Location</h2>
      <hr>
      <div class="row">
        <div class="col-lg-12" style="padding: 12px;">
            <button type="button" id="btnadd" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> Add Location</button>
        </div>
       <div class="col-lg-12">
        
        <br>

        <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
               
                      <th scope="col">Delivery Partner Name</th>
                      <th scope="col">City Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="sub_category_data">
                  </tbody>
        </table>
       </div>
      </div>
  </div>

   <div class="modal fade" id="myModal_for_delete_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
                Are sure to delete this record.
             </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-outline-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-danger btn-sm" id="btdelete">Delete</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form id="myform">
      <div class="modal-body">

            <!-- <div class="form-group">
               <label for="exampleFormControlSelect2">Add State Location</label>
               <input type="text" name="sub_category_name" class="form-control" placeholder="Sub Category name">
            </div> -->

            <input type="hidden" name="city">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Add State Location</label>
                </div>
              <select class="form-control target" id="city_id" name="city_id">
               <option value="" selected=" " hidden="">Please Select State Location</option>
              </select>
 

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button"  id="btnSave" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

    <!-- sub Category image Modal End-->

</main>
<?php  include(APPPATH.'views/super_admin/include/footer.php'); ?>
<script type="text/javascript">
        $("#myform").keypress(function(e) {
          //Enter key
          if (e.which == 13) {
            return false;
          }
        });
</script>

<script type="text/javascript">
  $(function(){
   showallData();
      var id_DT;


 $('#btnadd').click(function(){

   $('#myform')[0].reset();
   $('#btnSave').html('Submit');
   $('#exampleModal').find('.modal-title').text('Add City Location');
   $('#myform').attr('action','<?php echo base_url(); ?>api/Cities_and_delivery_partner/add_city');
 });

 //for save / insert data

$('#btnSave').click(function(){
   var url = $('#myform').attr('action');
   var city_id=$('#city_id').val()
   // var data = $('#myform').serialize();
   // console.log(data); 
    $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data: {
          delivery_partner_id:<?php echo $delivery_partner_id ?>,
          city_id:city_id
        },
        async: false,
        dataType: 'json',
        success: function(response){

               $('#myform')[0].reset();
               $('#exampleModal').modal('hide');

                if (response.status) {
                 toastr.success(response.message);
                }
                else{
                   toastr.error(response.message);
                }
                 showallData();
                
      
        },
        complete: function(){
            $('#exampleModal').modal('hide');
            },

        error: function(){
                $('#exampleModal').modal('hide');
                 toastr.error(response.message);

        }
    });

});


//   $( ".target" ).change(function() {
//       id_DT = $(this).children("option:selected").val();
//         // alert(id_DT);
//       showallData(id_DT);

// });

  //edit
$('#sub_category_data').on('click', '.item-edit', function(){
    var id = $(this).attr('data');
    $('#exampleModal').modal('show');
     $('#btnSave').html('Update');
    $('#exampleModal').find('.modal-title').text('Edit Sub Category');
    $('#myform').attr('action','<?php echo base_url(); ?>api/Sub_category/update_sub_category')
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Sub_category/fetch_sub_category/',
        async: false,
        data: {'sub_service_id': id},
        dataType: 'json',

        success: function(response){
            
            if (response.status) {
                var data=response.data;
                $('input[name=sub_service_name]').val(data.sub_service_name);
                // $('select[name=state_id]').val(data.state_id);
                $('input[name=sub_service_id]').val(data.sub_service_id);
                // $('input[name=sub_service_image]').val(data.sub_service_image);
              
            }
             showallData();
        }
        ,
        error: function(){
             $('#exampleModal').modal('hide');
             toastr.error(response.message);
        }
    });

});


//Category deleting
$('#sub_category_data').on('click','.item-delete',function(){
    var id= $(this).attr('data');
     
    $('#myModal_for_delete_message').find('.modal-title').text('Delete Sub Category');
    $('#myModal_for_delete_message').modal('show');

    $('#btdelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'delete',
            async: false,
            url: '<?php echo base_url(); ?>api/Cities_and_delivery_partner/delete_location/'+id,
            data: {id: id},
            dataType: 'json',
            success: function(response)
            {
               
                 $('#myModal_for_delete_message').modal('hide');
                            showallData();
                  toastr.success(response.message);
          
            },

            error: function(response) 
            {
              console.log(json_decode(response));
              $('#myModal_for_delete_message').modal('hide');
                           showallData();
              toastr.error(response.message);

            }
        });

    });

});


all_category()
function all_category(){
    $.ajax({
          url:"<?php echo base_url().('api/Cities_and_delivery_partner/fetch_all_cities');?>",
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
                url: "<?php echo base_url() ?>api/Cities_and_delivery_partner/fetch_all_location/",
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
                               '<td>'+data[x].name+'</td>'+
                               '<td>'+data[x].city+'</td>'+
                               '<td>'+
            
                               '<a href="javascript:;" style="margin: 10px;" class="btn btn-sm btn-outline-danger item-delete" data="'+data[x].delivery_partner_id+'"><i class="fas fa-trash-alt"></i></a>'+
                               '</td>'+
                           '</tr>';
                               
                      
                        }

                        $('#sub_category_data').html(html);  
                    },
                    error: function(response)
                    {
                      var html='';   
                        $('#sub_category_data').html(html);  
                        var data =JSON.parse(response.responseText);
                        toastr.error(data.message);

                    }

            });

        }

  });
</script>


<!-- ======================= -->
<script>
    $('#search_field').on('keyup', function() {
  var value = $(this).val();
  var patt = new RegExp(value, "i");

  $('#myTable').find('tr').each(function() {
    if (!($(this).find('td').text().search(patt) >= 0)) {
      $(this).not('.myHead').hide();
    }
    if (($(this).find('td').text().search(patt) >= 0)) {
      $(this).show();
    }

  });

 
});
</script>