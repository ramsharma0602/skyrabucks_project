<?php  include(APPPATH.'views/super_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Product Specification</h2>
      <hr>
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                Product Specification
                  <button type="button" id="update_setting4" class="btn btn-sm btn-outline-primary"style="margin-right: 20px; float: right;" > Update </button>
              </div>
              <div class="card-body">
               
                  <form method="POST" id="myform" style="width:100%;text-align:center;margin: 0 auto;">
                     <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
          <textarea name="job_specification" id="job_specification"></textarea>
          </form>
              </div>
            </div>
        </div> 
 </div>
</div>

</main>

<?php  include(APPPATH.'views/super_admin/include/footer.php'); ?>
 <script src="<?= base_url("assets_back/tinymce/js/tinymce/tinymce.min.js"); ?>">   </script>
        <script>
              tinymce.init({
                selector: "textarea",theme: "modern",height: 500,
                relative_urls : false,
                remove_script_host : false,
                convert_urls : false,
                  codesample_languages: [
                    {text: 'HTML/XML', value: 'markup'},
                    {text: 'JavaScript', value: 'javascript'},
                    {text: 'CSS', value: 'css'},
                    {text: 'PHP', value: 'php'},
                    {text: 'Ruby', value: 'ruby'},
                    {text: 'Python', value: 'python'},
                    {text: 'Java', value: 'java'},
                    {text: 'C', value: 'c'},
                    {text: 'C#', value: 'csharp'},
                    {text: 'C++', value: 'cpp'}
                ],
                plugins: [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                     "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking codesample",
                     "table contextmenu directionality emoticons paste textcolor responsivefilemanager code "
               ],
               toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
               toolbar2: "| responsivefilemanager | link unlink anchor | codesample image media | forecolor backcolor  | print preview code ",
               image_advtab: true ,
               
               external_filemanager_path:"<?php echo base_url(); ?>filemanager/",
               filemanager_title:"Responsive Filemanager" ,
               external_plugins: { "filemanager" : "<?php echo base_url(); ?>filemanager/plugin.min.js"}
             });
            </script>
<script type="text/javascript">
  $(function() {

    showallData();

    //btn4
$('#update_setting4').click(function(){
    // $('#myurlform')[0].reset();
    tinyMCE.triggerSave();

   var url = $('#myform').attr('action');
   var data = $('#myform').serialize();
  
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url(); ?>api/Product/update_specification',  
        async: false,
        dataType: 'json',
        data:data,
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
  
  
});


    function showallData() {
     var job_id= $('input[name=job_id]').val();
      $.ajax({
        type: 'ajax',
        url: "<?php echo base_url() ?>api/Product/fetch_product_single",
        async: false,
        method:"get",
        dataType: 'json',
        data :{
          job_id:job_id
        },
        success: function(response) {
          // body...
          data = response.data;

          $('textarea[name=job_specification').val(data.job_specification);
          


        },
        error: function() {
          toastr.error('Not Found !');
        }
      });
    }
  });
</script>