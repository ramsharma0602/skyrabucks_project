<?php  include(APPPATH.'views/admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>SEO Setting</h2>
      <hr>
      <div class="row">
        <div class="col-lg-12">
          <!-- body start -->
            <div class="card">
              <div class="card-header">
                 Search Engine Optimization
                  
              </div>
                    <div class="card-body">
                    <h3>Meta Keywords


                    <button type="button" id="update_key_setting" class="btn btn-sm btn-outline-primary" data-toggle="modal" style="margin-right: 20px; float: right;" data-target="#updateModal_seo"> Update keyword</button>
                    </h3>

                    <div class="card">
                      <div class="card-body">
                        <div id="Keywords">

                        </div>
                      </div>
                    </div>

                      <br>

                    <h3>Meta Description

                    <button type="button" id="update_des_setting" class="btn btn-sm btn-outline-primary" data-toggle="modal" style="margin-right: 20px; float: right;" data-target="#updateModal_seo"> Update description</button>
                   
                    </h3>

                    <div class="card">
                    <div class="card-body">
                    <div id="Description">

                    </div>
                    </div>
                    </div>
                 
              </div>
              <div class="card-footer">
                Search engine optimization is the process of improving the quality and quantity of website traffic to a website or a web page from search engines. SEO targets unpaid traffic rather than direct traffic or paid traffic.
              </div>
            </div>


<div class="modal fade" id="updateModal_seo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <form id="myform" action="">
      <div class="modal-body" >
      <input type="text" name="g_s_id"   hidden=""  >

      <div class="form-group">
        <label id="contactid"></label>

           <textarea class="form-control" name="value" id="value" rows="5" cols="50" ></textarea>
      </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button"  id="update_seo_Btn" class="btn  btn-sm btn-outline-primary">Save Changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

          <!-- body end -->
        </div>
      </div>
  </div>
</main>

<?php  include(APPPATH.'views/admin/include/footer.php'); ?>


<script type="text/javascript">
  
$(function(){   
  var general_setting_data='';
showallData();

function showallData(){
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url(); ?>api/General_setting",
                method: 'get',
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    general_setting_data=response.data;
               
                   
                      $('#Keywords').html(general_setting_data[12].value);
                      $('#Description').html(general_setting_data[13].value);


                      },
                    error: function()
                    {
                   toastr.error('Not Found !');
                    }
                  });
        }


  $('#update_key_setting').click(function(){
    // $('#myform')[0].reset();
     $('#update_seo_Btn').html('Update changes keyword');
     $('#contactid').html('keyword');
     
    $('#updateModal_seo').find('.modal-title').text('Edit Search Engine Optimization');
   
    
    $('input[name=g_s_id]').val(general_setting_data[12].general_settings_id);
    $('textarea[name=value]').val(general_setting_data[12].value);
          
});
$('#update_des_setting').click(function(){
    // $('#myform')[0].reset();
     $('#update_seo_Btn').html('Update changes');
     $('#contactid').html('Description');
     
    $('#updateModal_seo').find('.modal-title').text('Edit Search Engine Optimization');

    $('input[name=g_s_id]').val(general_setting_data[13].general_settings_id);
           $('textarea[name=value]').val(general_setting_data[13].value);
});


  $('#update_seo_Btn').click(function(){
    var data = $('#myform').serialize();
    // validation 
    $.ajax({
        type: 'ajax',
        method:'post',
        url: '<?php echo base_url(); ?>api/General_setting/update',
        data: data,
        async: false,
        dataType: 'json',
        success: function(response){

                $('#myform')[0].reset();
               $('#updateModal_seo').modal('hide');

                if (response.status) {
                 toastr.success('Successfully updated records !');
                }
                else{
                   toastr.error('Error, Please Try again !');
                }
                
                showallData();
        },
        error: function(){
                $('#updateModal_director').modal('hide');
                 toastr.error('Error, Please Try again !');

        }
    });
  

});
  

});
</script>