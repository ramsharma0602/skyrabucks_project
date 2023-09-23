<?php  include(APPPATH.'views/sub_admin/include/header.php'); ?>

<main class="page-content">
    <div class="container-fluid">
      <h2>Social Media</h2>
      <hr>
      <div class="row">
        <div class="col-lg-12">
          <!-- body start -->
          <div class="card">
            <div class="card-header">
              Social media management
            </div>
            
            <div class="card-body">
               <table class="table table-striped" style="text-overflow: ellipsis;">
                <tr>
                  <td>
                   <img style="width: 35px;height: 35px" src="https://img.icons8.com/nolan/64/facebook-new.png"/>
                  </td>
                  <td>
                  <div class="form-group">
                  <input type="text" class="form-control" id="facebook_url_id" name="facebook_url_id" hidden="">
                  <input type="text" class="form-control" id="facebook_url" name="facebook_url" aria-describedby="emailHelp" placeholder="Enter url">
                   </div>
                  </td>
                  <td>
                  <button type="button" id="update_fb_btn" class="btn btn-sm btn-outline-primary" style="margin-right: 20px; float: right;" > Update </button>
                  </td>
                  
                </tr>
                
                <!-- ========================================================== -->
                <tr>
                  <td>
                    <img style="width: 35px;height: 35px" src="https://img.icons8.com/nolan/64/instagram-new.png"/>         
                  </td>
                  <td>
                    <!-- <label class="" for="Instagram" id="instagram_url"></label> -->
                    <div class="form-group">
                    <input type="text" class="form-control" id="instagram_url_id" name="instagram_url_id" hidden="">
                  <input type="text" class="form-control" id="instagram_url" name="instagram_url" aria-describedby="emailHelp" placeholder="Enter url">
                   </div>
                  </td>
                  <td>
                  <button type="button" id="update_insta_btn" class="btn btn-sm btn-outline-primary"  style="margin-right: 20px; float: right;" > Update  </button>
                  </td> 
                  
                </tr>
                <!-- =========================================================== -->
                <tr>
                  <td>
                    <img style="width: 35px;height: 35px" src="https://img.icons8.com/nolan/64/twitter.png"/>
                  </td>
                  <td>
                    <!-- <label class="" for="twitter" id="twitter_url"></label> -->
                    <div class="form-group">
                    <input type="text" class="form-control" id="twitter_url_id" name="twitter_url_id" hidden="">
                  <input type="text" class="form-control" id="twitter_url" name="twitter_url" aria-describedby="emailHelp" placeholder="Enter url">
                   </div>
                  </td>
                  <td>
                  <button type="button" id="update_tw_btn" class="btn btn-sm btn-outline-primary"  style="margin-right: 20px; float: right;" > Update </button>
                  </td> 
                  
                </tr>
                  <!-- ========================================================== -->
                <tr>
                  <td>
                    <img style="width: 35px;height: 35px" src="https://img.icons8.com/nolan/64/youtube.png"/>
                  </td>
                  <td>
                    <!-- <label class="" for="youtube" id="youtube_url"></label> -->
                    <div class="form-group">
                    <input type="text" class="form-control" id="youtube_url_id" name="youtube_url_id" hidden="">
                  <input type="text" class="form-control" id="youtube_url" name="youtube_url" aria-describedby="emailHelp" placeholder="Enter url">
                   </div>
                  </td> 
                  <td>
                  <button type="button" id="update_yt_btn" class="btn btn-sm btn-outline-primary"  style="margin-right: 20px; float: right;" > Update</button>
                  </td> 
                  
                </tr>
                <!-- =========================================================== -->
                <tr>
                  <td>
                    <img style="width: 35px;height: 35px" src="https://img.icons8.com/nolan/50/linkedin.png"/>
                  </td>
                  <td>
                    <!-- <label class="" for="linkedin" id="linkedin_url"></label> -->
                    <div class="form-group">
                    <input type="text" class="form-control" id="linkedin_url_id" name="linkedin_url_id" hidden="">
                  <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" aria-describedby="emailHelp" placeholder="Enter url">
                   </div>
                  </td>
                  <td>
                  <button type="button" id="update_lnk_btn" class="btn btn-sm btn-outline-primary"  style="margin-right: 20px; float: right;" > Update</button>
                  </td> 
                  
                </tr>
              
                </table>
            </div>
          </div>

<!-- <div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="linkModalLabel" >Update URL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="myurlform" action="">
        <input type="" name="txtID"  hidden="">

      <div class="form-group" >
        <label for="linkid">Facebook:</label>
        <input  type="text" class="form-control" name="facebook_url" id="facebook" aria-describedby="generalHelp" placeholder="Enter URL">
      </div>

      <div class="form-group">
        <label for="linkid">Instagram:</label>
        <input type="text" class="form-control" name="instagram_url" id="instagram" aria-describedby="generalHelp" placeholder="Enter URL">
      </div>

      <div class="form-group">
        <label for="linkid">Twitter:</label>
        <input type="text" class="form-control" name="twitter_url" id="twitter" aria-describedby="generalHelp" placeholder="Enter URL">
        
      </div>
      
      <div class="form-group">
        <label for="linkid">Youtube:</label>
        <input type="text" class="form-control" name="youtube_url" id="youtube" aria-describedby="generalHelp" placeholder="Enter URL">
        
      </div>
      <div class="form-group">
        <label for="linkid">LinkedIn:</label>
        <input type="text" class="form-control" name="linkedin_url" id="linkedIn" aria-describedby="generalHelp" placeholder="Enter URL">
        
      </div>

      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="urlUpdate" class="btn  btn-sm btn-outline-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->


          <!-- body end -->
        </div>
      </div>
  </div>
</main>
<?php  include(APPPATH.'views/sub_admin/include/footer.php'); ?>


<script>
$(function(){   

showurlData();
// showPolicy();


// URL Button
$('#update_fb_btn').click(function(){
    // $('#myurlform')[0].reset();
   
   var facebook_url= $('#facebook_url').val();
   var facebook_url_id= $('#facebook_url_id').val();
  if(facebook_url!=""){
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url(); ?>api/General_setting/update',  
        async: false,
        dataType: 'json',
        data:{
          "value":facebook_url,
          "g_s_id":facebook_url_id
        },
        success: function(response){
          // data=response.data;
          if (response.status) {
                 toastr.success('Successfully updated records !');
                }
                else{
                   toastr.error('Error, Please Try again !');
                }
                
                showallData();
         
        },
        error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);


        }

    });
  }
  else{
    toastr.error("please enter facebook url");
  }
});


// ==========================================
$('#update_insta_btn').click(function(){
    // $('#myurlform')[0].reset();
   
   var instagram_url= $('#instagram_url').val();
   var instagram_url_id= $('#instagram_url_id').val();
  if(instagram_url!=""){
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url(); ?>api/General_setting/update',  
        async: false,
        dataType: 'json',
        data:{
          "value":instagram_url,
          "g_s_id":instagram_url_id
        },
        success: function(response){
          // data=response.data;
          if (response.status) {
                 toastr.success('Successfully updated records !');
                }
                else{
                   toastr.error('Error, Please Try again !');
                }
                
                showallData();
         
        },
        error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);


        }

    });
  }
  else{
    toastr.error("please enter facebook url");
  }
});
// ============================================================
$('#update_tw_btn').click(function(){
    // $('#myurlform')[0].reset();
   
   var twitter_url= $('#twitter_url').val();
   var twitter_url_id= $('#twitter_url_id').val();
  if(twitter_url!=""){
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url(); ?>api/General_setting/update',  
        async: false,
        dataType: 'json',
        data:{
          "value":twitter_url,
          "g_s_id":twitter_url_id
        },
        success: function(response){
          // data=response.data;
          if (response.status) {
                 toastr.success('Successfully updated records !');
                }
                else{
                   toastr.error('Error, Please Try again !');
                }
                
                showallData();         
        },
        error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);


        }

    });
  }
  else{
    toastr.error("please enter twitter url");
  }
});
// =============================================================
$('#update_yt_btn').click(function(){
    // $('#myurlform')[0].reset();
   
   var youtube_url= $('#youtube_url').val();
   var youtube_url_id= $('#youtube_url_id').val();
  if(youtube_url!=""){
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url(); ?>api/General_setting/update',  
        async: false,
        dataType: 'json',
        data:{
          "value":youtube_url,
          "g_s_id":youtube_url_id
        },
        success: function(response){
          // data=response.data;
          if (response.status) {
                 toastr.success('Successfully updated records !');
                }
                else{
                   toastr.error('Error, Please Try again !');
                }
                
                showallData();
         
        },
        error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);


        }

    });
  }
  else{
    toastr.error("please enter youtube url");
  }
});
// ============================================================
$('#update_lnk_btn').click(function(){
    // $('#myurlform')[0].reset();
   
   var linkedin_url= $('#linkedin_url').val();
   var linkedin_url_id= $('#linkedin_url_id').val();
  if(linkedin_url!=""){
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url(); ?>api/General_setting/update',  
        async: false,
        dataType: 'json',
        data:{
          "value":linkedin_url,
          "g_s_id":linkedin_url_id
        },
        success: function(response){
          // data=response.data;
          if (response.status) {
                 toastr.success('Successfully updated records !');
                }
                else{
                   toastr.error('Error, Please Try again !');
                }
                
                showallData();
         
        },
        error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);


        }

    });
  }
  else{
    toastr.error("please enter linkedin url");
  }
});



// URL Update button


//function
     
        function showurlData(){
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/General_setting",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
                    // var html ='';
                    var facebook='';
                    var instagram='';
                    var twitter='';
                    var youtube='';
                    var linkedin='';
                        // facebook+= data[24].value;
                        // instagram+= data[22].value;
                        // twitter+= data[23].value;
                        // youtube+= data[25].value;
                        // linkedin+= data[26].value;
                   

                    $('input[name=facebook_url]').val(data[24].value);
                    $('input[name=facebook_url_id]').val(data[24].general_settings_id);
                    

                    $('input[name=instagram_url]').val(data[22].value);
                    $('input[name=instagram_url_id]').val(data[22].general_settings_id);

                    $('input[name=twitter_url]').val(data[23].value);
                    $('input[name=twitter_url_id]').val(data[23].general_settings_id);

                    $('input[name=youtube_url]').val(data[25].value);
                    $('input[name=youtube_url_id]').val(data[25].general_settings_id);

                    $('input[name=linkedin_url]').val(data[26].value);
                    $('input[name=linkedin_url_id]').val(data[26].general_settings_id);

                    },
                    error: function()
                    {
                   toastr.error('Not Found !');
                    }

            });
        }



});

</script>