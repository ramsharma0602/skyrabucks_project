<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 50%;
        padding: 10px;
        height: 550px;
        /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    </style>
</head>

<body>

    <?php  include(APPPATH.'views/admin/include/header.php'); ?>

    <main class="page-content">
        <div class="container-fluid">
            <!-- <div class="row">
           <div class="col-lg-6" >
             <div class="card">
                <div class="card-body">
                 <div class="card-header"> -->
            <h5>System information Setting</h5>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Large Logo</h6>
                            <div id="large_logo">
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h6>Small Logo</h6>
                            <div id="small_logo">
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h6>Favicon Logo</h6>
                            <div id="favicon_logo">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5>Information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" style="text-overflow: ellipsis;">
                                <tr>
                                    <td>


                                        <label for="contactid">System Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="system_name_id"
                                                name="system_name_id" hidden="">
                                            <input type="text" class="form-control" id="system_name" name="system_name"
                                                aria-describedby="generalHelp" placeholder="system_name">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" id="update_setting1"
                                            class="btn btn-sm btn-outline-primary"
                                            style="margin-right: 20px; float: right;"> Update </button>
                                    </td>

                                </tr>
                                <!--==============================================-->
                                <tr>
                                    <td>
                                        <label for="contactid">Short Name</label>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="short_name_id"
                                                name="short_name_id" hidden="">
                                            <input type="text" class="form-control" id="short_name" name="short_name"
                                                aria-describedby="emailHelp" placeholder="Enter url">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" id="update_setting2"
                                            class="btn btn-sm btn-outline-primary"
                                            style="margin-right: 20px; float: right;"> Update </button>
                                    </td>

                                </tr>
                                <!--===========================================-->
                                <tr>

                                    <td>
                                        <label for="contactid">Contact No</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contact_no_id"
                                                name="contact_no_id" hidden="">
                                            <input type="text" class="form-control" id="contact_no" name="contact_no"
                                                aria-describedby="emailHelp" placeholder="Enter contact_no">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" id="update_setting3"
                                            class="btn btn-sm btn-outline-primary"
                                            style="margin-right: 20px; float: right;"> Update </button>
                                    </td>

                                </tr>

                                <!-- =========================================================== -->
                                <tr>

                                    <td>
                                        <label for="contactid">Address</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="address_id" name="address_id"
                                                hidden="">
                                            <input type="text" class="form-control" id="address" name="address"
                                                aria-describedby="emailHelp" placeholder="Enter address">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" id="update_setting4"
                                            class="btn btn-sm btn-outline-primary"
                                            style="margin-right: 20px; float: right;"> Update </button>
                                    </td>

                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="image_crop_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title">Upload & Crop Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success crop_image">Crop & Upload Image</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 text-center">
                                <div id="image" style="width:250px; margin-top:20px"></div>
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                      
                                <br />
                                <br />
                                <br />

                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button class="btn btn-success crop_image">Crop & Upload Image</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="modal fade" id="image_show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Select Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" id="skform">
                        <div class="modal-body">
                            <div align="center" id="alert_body">
                                <input type="text" hidden="" name="display_content_id">
                                <input type="file" name="upload" id="upload" accept="image/*" required="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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
    $(function() {

        showallData();

        var imgtype_id = '';

        // 
        // URL Button
        $('#update_setting1').click(function() {
            // $('#myurlform')[0].reset();


            var system_name = $('#system_name').val();
            var system_name_id = $('#system_name_id').val();
            if (system_name != "") {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo base_url(); ?>api/General_setting/update',
                    async: false,
                    dataType: 'json',
                    data: {
                        "value": system_name,
                        "g_s_id": system_name_id
                    },
                    success: function(response) {
                        // data=response.data;
                        if (response.status) {
                            toastr.success('Successfully updated records !');
                        } else {
                            toastr.error('Error, Please Try again !');
                        }

                        showallData();

                    },
                    error: function(response) {
                        var data = JSON.parse(response.responseText);
                        toastr.error(data.message);


                    }

                });
            } else {
                toastr.error("please enter system_name");
            }
        });
        //button2
        $('#update_setting2').click(function() {
            // $('#myurlform')[0].reset();


            var short_name = $('#short_name').val();
            var short_name_id = $('#short_name_id').val();
            if (system_name != "") {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo base_url(); ?>api/General_setting/update',
                    async: false,
                    dataType: 'json',
                    data: {
                        "value": short_name,
                        "g_s_id": short_name_id
                    },
                    success: function(response) {
                        // data=response.data;
                        if (response.status) {
                            toastr.success('Successfully updated records !');
                        } else {
                            toastr.error('Error, Please Try again !');
                        }

                        showallData();

                    },
                    error: function(response) {
                        var data = JSON.parse(response.responseText);
                        toastr.error(data.message);


                    }

                });
            } else {
                toastr.error("please enter short_name");
            }
        });
        //brn3
        $('#update_setting3').click(function() {
            // $('#myurlform')[0].reset();


            var contact_no = $('#contact_no').val();
            var contact_no_id = $('#contact_no_id').val();
            if (contact_no != "") {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo base_url(); ?>api/General_setting/update',
                    async: false,
                    dataType: 'json',
                    data: {
                        "value": contact_no,
                        "g_s_id": contact_no_id
                    },
                    success: function(response) {
                        // data=response.data;
                        if (response.status) {
                            toastr.success('Successfully updated records !');
                        } else {
                            toastr.error('Error, Please Try again !');
                        }

                        showallData();

                    },
                    error: function(response) {
                        var data = JSON.parse(response.responseText);
                        toastr.error(data.message);


                    }

                });
            } else {
                toastr.error("please enter contact_no");
            }
        });

        //btn4
        $('#update_setting4').click(function() {
            // $('#myurlform')[0].reset();


            var address = $('#address').val();
            var address_id = $('#address_id').val();
            if (address != "") {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo base_url(); ?>api/General_setting/update',
                    async: false,
                    dataType: 'json',
                    data: {
                        "value": address,
                        "g_s_id": address_id
                    },
                    success: function(response) {
                        // data=response.data;
                        if (response.status) {
                            toastr.success('Successfully updated records !');
                        } else {
                            toastr.error('Error, Please Try again !');
                        }

                        showallData();

                    },
                    error: function(response) {
                        var data = JSON.parse(response.responseText);
                        toastr.error(data.message);


                    }

                });
            } else {
                toastr.error("please enter address");
            }
        });
        //for save / insert data

        $('#large_logo').click(function() {

            imgtype_id = $('.item-image').attr('imgtype');

            $('#image').croppie('destroy');
            $('#image_show').modal('show');


            $image_crop = $('#image').croppie({
                enableExif: true,
                viewport: {
                    // width:600,
                    // height:285,
                    width: 498,
                    height: 168,
                    type: 'square' //circle
                },
                boundary: {
                    // width:600,
                    // height:300

                    width: 600,
                    height: 500
                }
            });
        });

        $('#small_logo').click(function() {

            imgtype_id = $('.item-image2').attr('imgtype2');


            $('#image').croppie('destroy');
            $('#image_show').modal('show');

            $image_crop = $('#image').croppie({
                enableExif: true,
                viewport: {
                    width: 50,
                    height: 30,
                    type: 'square' //circle
                },
                boundary: {
                    width: 80,
                    height: 80
                }
            });
        });


        $('#favicon_logo').click(function() {

            imgtype_id = $('.item-image3').attr('imgtype3');

            $('#image').croppie('destroy');
            $('#image_show').modal('show');

            $image_crop = $('#image').croppie({
                enableExif: true,
                viewport: {
                    width: 94,
                    height: 84,
                    // width:100,
                    // height:30,
                    type: 'square' //circle
                },
                boundary: {
                    // width:200,
                    // height:50
                    width: 94,
                    height: 94
                }
            });

        });




        var extension = '';

        $('#upload').on('change', function() {

            fileName = document.querySelector('#upload').value;
            extension = fileName.substring(fileName.lastIndexOf('.') + 1);

            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#image_show').modal('hide');
            $('#image_crop_model').modal('show');

        });


        $('.crop_image').click(function(event) {
            $('.crop_image').prop('disabled', true);

            $image_crop.croppie('result', {
                type: 'canvas',
                // size: 'viewport',
                size: 'original',
                quality: 1
            }).then(function(response) {
                $.ajax({
                    url: '<?php echo base_url(); ?>api/General_setting/upload_image',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        general_settings_id: imgtype_id,
                        image: response,
                        extension: extension
                    },
                    success: function(response) {

                        $('.crop_image').prop('disabled', false);

                        $('#image_crop_model').modal('hide');
                        if (response.status) {

                            toastr.success(response.message);
                            showallData();
                        } else {

                            toastr.error(response.message);
                            showallData();
                        }

                    },
                    error: function() {

                        $('.crop_image').prop('disabled', false);
                        var data = JSON.parse(response.responseText);
                        toastr.error(data.message);


                    }
                });
            })
        });

        //function
        function showallData() {
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/General_setting/",
                async: false,
                dataType: 'json',
                success: function(response) {
                    // body...
                    data = response.data
                    var about_us = '';
                    var contact_details = '';
                    var google_analytics_code = '';
                    var small_logo = '';
                    var large_logo = '';
                    var favicon_logo = '';

                    about_us += data[15].value;
                    google_analytics_code += data[16].value;

                    contact_details += '<p>System Name: ' + data[5].value + '</p>' +
                        '<p>Short Name:' + data[11].value + '</p>' +
                        '<p>Contact:' + data[6].value + '</p>' +
                        '<p>Address:' + data[14].value + '</p>';

                    if (data[7].value == null) {
                        small_logo +=
                            '<a href="javascript:;"  class="item-image2" imgtype2="' +
                            data[7].general_settings_id + '"><i class="fas fa-upload"></i></a>';

                    } else {
                        small_logo +=
                            '<a href="javascript:;"  class="item-image2" imgtype2="' +
                            data[7].general_settings_id +
                            '"><img class="img-fluid"  src="<?php echo base_url(); ?>/uploads/logos/' +
                            data[7].value + '" style="height:50px; width:auto;" ></a>';
                    }

                    if (data[8].value == null) {
                        large_logo +=
                            '<a href="javascript:;" class="item-image" imgtype="' +
                            data[8].general_settings_id + '"><i class="fas fa-upload"></i></a>';
                    } else {
                        large_logo +=
                            ' <a href="javascript:;" class="item-image" imgtype="' +
                            data[8].general_settings_id +
                            '"><img  class="img-fluid"src="<?php echo base_url(); ?>uploads/logos/' +
                            data[8].value + '" style="height:200px; width:auto;" ></a>';
                    }

                    if (data[10].value == null) {
                        favicon_logo +=
                            '<a href="javascript:;"  class="item-image3" imgtype3="' +
                            data[10].general_settings_id + '"><i class="fas fa-upload"></i></a>';
                    } else {
                        favicon_logo +=
                            '<a href="javascript:;"  class="item-image3" imgtype3="' +
                            data[10].general_settings_id +
                            '"><img class="img-fluid" src="<?php echo base_url(); ?>uploads/logos/' +
                            data[10].value + '" style="height:40px; width:auto;" ></a>';
                    }

                    // $('#contact_details').html(contact_details);
                    // $('#about_us').html(about_us);
                    // $('#google_analytics').html(google_analytics_code);

                    $('#large_logo').html(large_logo);
                    $('#small_logo').html(small_logo);
                    $('#favicon_logo').html(favicon_logo);

                    $('input[name=system_name]').val(data[5].value);
                    $('input[name=system_name_id]').val(data[5].general_settings_id);

                    $('input[name=short_name]').val(data[11].value);
                    $('input[name=short_name_id]').val(data[11].general_settings_id);

                    $('input[name=contact_no]').val(data[6].value);
                    $('input[name=contact_no_id]').val(data[6].general_settings_id);

                    $('input[name=address]').val(data[14].value);
                    $('input[name=address_id]').val(data[14].general_settings_id);

                },
                error: function() {
                    toastr.error('Not Found !');
                }
            });
        }

    });
    </script>