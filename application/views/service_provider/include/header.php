<!DOCTYPE html>
<html lang="en">
<head>
  <title>Services Provider</title>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
   <script src="<?php echo base_url(); ?>assets_back/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets_back/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets_back/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets_back/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets_back/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets_back/js/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>assets_back/js/croppie.js"></script>



    
    <link href="<?php echo base_url(); ?>assets_back/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_back/css/custom.css" rel="stylesheet">
    <!-- <link rel="icon" href="<?php echo base_url('uploads/logos/').$setting_data->favicon_icon; ?>" type="image/gif" sizes="16x16">  -->
    <link href="<?php echo base_url(); ?>assets_back/fontawesome/css/all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_back/css/toastr.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_back/css/croppie.css" rel="stylesheet">
    


    
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#"> Service Provider </a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <!-- <div class="user-pic">
          <img class="img-responsive img-rounded" src="assets/img/user.jpg"
            alt="User picture">
        </div> -->
        
        <div class="user-info">
          <!-- <span class="user-name"><?php echo $service_provider_info->service_provider_name ;?></strong> -->
          </span>
          <span class="user-role">Service Provider</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <!--<div class="sidebar-search">-->
      <!--  <div>-->
      <!--    <div class="input-group">-->
      <!--      <input type="text" class="form-control search-menu" placeholder="Search...">-->
      <!--      <div class="input-group-append">-->
      <!--        <span class="input-group-text">-->
      <!--          <i class="fa fa-search" aria-hidden="true"></i>-->
      <!--        </span>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
           <li>
            <a href="<?php echo base_url('Service_provider'); ?>">
            <i class="fas fa-tachometer-alt"></i>

              <span>Dashboard</span>
            </a>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Services</span>
              <span class="badge badge-pill badge-danger"></span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Service_provider/all_products/'); ?>">All Services </a>
                </li>
                <!-- <li>
                  <a href="<?php echo base_url('Service_provider/product_stock_service_provider/'); ?>">Product Stock</a>
                </li> 
                  <li>
                  <a href="<?php echo base_url('Service_provider/product_file/'); ?>">Product File</a>
                </li> -->
               
              </ul>
            </div>
          </li>
          <div>
            <ul>
          <li>
            <a href="<?php echo base_url('Service_provider/sell/'); ?>">
              <i class="fas fa-rupee-sign"></i>
              <span>Wallet</span>
            </a>
          </li>
          <li>
          <a href="<?php echo base_url('Service_provider/payment_form_admin/'); ?>">
            <i class="fas fa-rupee-sign"></i>
              <span>Payment From Admin</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('Service_provider/payment_setting/'); ?>">
            <i class="fas fa-rupee-sign"></i>
              <span>Payment Setting</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('Service_provider/seller_profile/'); ?>">
            <i class="fas fa-lock"></i>
              <span>Report</span>
            </a>
          </li>
          
          <li class="sidebar-dropdown">
             <a href="#">
              <i class="fas fa-user-circle"></i>
              <span>My Account</span>
             </a>
             <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Service_provider/Service_Provider/'); ?>">Service Provider</a>
                </li>      
                </li>
        </div>
    </div>
    </div>
    <div class="sidebar-footer">
      <a href="#">
       <i class="fa fa-bell"></i>
        
      </a>
      <a href="#">
      <i class="fa fa-envelope"></i>
      </a>
      
      <a href="<?php echo base_url('Service_provider/log_out') ?>">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
    <!-- sidebar-wrapper  -->