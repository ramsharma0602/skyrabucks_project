

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delivery Partner</title>
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
        <a href="#">Delivery Partner </a>
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
          <!-- <span class="user-name"><?php echo $seller_info->delivery_partner ;?></strong> -->
          </span>
          <span class="user-role">Delivery Partner</span>
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
            <a href="<?php echo base_url('seller/index/'); ?>">
            <i class="fas fa-tachometer-alt"></i>

              <span>Jobs</span>
            </a>
          </li>
          <div>
            <ul>
        <li>
            <a href="<?php echo base_url('Delivery_partner/Sell/'); ?>">
              <i class="fas fa-shopping-cart"></i>
              <span>Orders</span>
            </a>
        </li>
          <li>
            <a href="<?php echo base_url('seller/seller_profile/'); ?>">
            <i class="fas fa-lock"></i>
              <span>Security</span>
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
                  <a href="<?php echo base_url('Delivery_partner/delivery_partner/'); ?>">Delivery Partner</a>
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
      
      <a href="<?php echo base_url('delivery_partner/log_out') ?>">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
    <!-- sidebar-wrapper  -->