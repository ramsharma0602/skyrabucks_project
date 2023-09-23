<?php include(APPPATH . 'views/super_admin/include/header.php'); ?>
<main class="page-content">
<!-- <body style="--theme-color:#d80e0e; --theme-color-rgb:#d80e0e;"> -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <div class="container-fluid">
      <h2>Select Theme</h2>
      <hr>

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
                                    <!-- <input type="color" class="form-control form-control-color" name="colorPick" id="colorPick"
                                        value="#239698" title="Choose your color"> -->
                                        <input type="color" class="form-control form-control-color" name="colorPick" id="colorPick"
                                         title="Choose your color">
                                </form>
                            </div>
                        </li>
                      
                        <!-- update button -->
                        <div>
                      <a class="btn btn-primary" style="margin: 0.5rem" id="updateColor";>Update</a>
                      </div>

                    </ul>
                </div>
            </div>

      </div>
  </div>


</main>
</body>
<?php include(APPPATH . 'views/super_admin/include/footer.php'); ?>

<script type="text/javascript">
  
var color_picker1 = document.getElementById("colorPick").value;
document.getElementById("colorPick").onchange = function () {
    color_picker1 = this.value;
    document.body.style.setProperty("--theme-color", color_picker1);
    document.body.style.setProperty("--theme-color-rgb", color_picker1);
};

$("#updateColor").on("click",function() {
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: "<?php echo base_url() ?>api/General_setting/theme_update",
        data: {value:color_picker1,g_s_id:41},
        async: false,
        dataType: 'json',
        success: function(response) {
          // body1..
          data = response.data
          var colorPick = '';
          $('input[name=colorPick]').val(data[40].general_settings_id);
          toastr.success('Updated Successfully !');
        },
        error: function() {
          toastr.error('Not Found !');
        }
    });
});

fetch_color();
    function fetch_color (){
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: "<?php echo base_url() ?>api/General_setting/fetch_theme",
        data: {g_s_id:41},
        async: false,
        dataType: 'json',
        success: function(response) {
          // body1..
          data = response.data
          var colorPick = '';
          // $("body").css("--theme-color:#d80e0e");
          // $("body").css("--theme-color-rgb:#d80e0e");
          $('input[name=colorPick]').val(data.value);
          toastr.success('Updated Successfully !');

        },
        error: function() {
          toastr.error('Not Found !');
        }
    });
};


</script>
