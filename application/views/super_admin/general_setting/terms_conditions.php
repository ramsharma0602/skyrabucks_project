<?php  include(APPPATH.'views/super_admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>terms_conditions</h2>
      <hr>
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
              terms_conditions
                <button type="button" id="update_terms_conditions" class="btn btn-sm btn-outline-primary" data-toggle="modal" style="margin-right: 20px; float: right;" data-target="#aboutModal"> Update</button>
              </div>
              <div class="card-body">
               
                  <form method="POST" id="myform" style="width:100%;text-align:center;margin: 0 auto;">
                  <input type="textarea" name="Terms_Conditions_id" id="Terms_Conditions_id"  hidden=""  >
          <textarea class="form-control" name="terms_conditions" id="terms_conditions"></textarea>
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
    $('#update_terms_conditions').click(function() {
      // $('#myurlform')[0].reset();

      var terms_conditions = tinyMCE.activeEditor.getContent();
      var Terms_Conditions_id = $('#Terms_Conditions_id').val();
    
      if (terms_conditions!= "") {
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url(); ?>api/General_setting/update',
          async: false,
          dataType: 'json',
          data: {
            "value": terms_conditions,
            "g_s_id":Terms_Conditions_id
          },
          success: function(response) {
            data = response.data;
            toastr.success(response.message);
            showallData();
          },
          error: function(response) {
            var data = JSON.parse(response.responseText);
            toastr.error(data.message);
          }

        });
      } else {
        toastr.error("please enter terms conditions policy ");
      }
    });

    function showallData() {
      $.ajax({
        type: 'ajax',
        url: "<?php echo base_url() ?>api/General_setting/",
        async: false,
        dataType: 'json',
        success: function(response) {
          // body...
          data = response.data
          var terms_conditions = '';
          $('textarea[name=terms_conditions]').val(data[17].value);
          $('#Terms_Conditions_div').html(data[17].value);
          $('input[name=Terms_Conditions_id]').val(data[17].general_settings_id);


        },
        error: function() {
          toastr.error('Not Found !');
        }
      });
    }
  });
</script>