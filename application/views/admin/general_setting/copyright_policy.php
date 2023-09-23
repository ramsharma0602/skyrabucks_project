<?php  include(APPPATH.'views/admin/include/header.php'); ?>
<main class="page-content">
    <div class="container-fluid">
      <h2>Copyright Policy</h2>
      <hr>
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
              Copyright Policy
                <button type="button" id="update_copyright" class="btn btn-sm btn-outline-primary" data-toggle="modal" style="margin-right: 20px; float: right;" data-target="#aboutModal"> Update</button>
              </div>
              <div class="card-body">
               
                  <form method="POST" id="myform" style="width:100%;text-align:center;margin: 0 auto;">
                  <input type="textarea" name="copyright_id" id="copyright_id"  hidden=""  >
          <textarea class="form-control" name="copyright" id="copyright"></textarea>
          </form>
              </div>
            </div>
        </div> 
 </div>
</div>

</main>
<?php  include(APPPATH.'views/admin/include/footer.php'); ?>


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
    $('#update_copyright').click(function() {
      // $('#myurlform')[0].reset();

      var copyright = tinyMCE.activeEditor.getContent();
      var copyright_id = $('#copyright_id').val();
    
      if (copyright!= "") {
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url(); ?>api/General_setting/update',
          async: false,
          dataType: 'json',
          data: {
            "value": copyright,
            "g_s_id":copyright_id
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
        toastr.error("please enter copyright policy ");
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
          var copyright = '';
          $('textarea[name=copyright]').val(data[20].value);
          $('#copyright_div').html(data[20].value);
          $('input[name=copyright_id]').val(data[20].general_settings_id);


        },
        error: function() {
          toastr.error('Not Found !');
        }
      });
    }
  });
</script>