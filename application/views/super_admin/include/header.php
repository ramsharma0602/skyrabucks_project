<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  <title> Super Admin | Skyrabucks </title>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <?php 
    
    if ($this->uri->segment(2) === "product_detail")
    {

        
        ?>
        
        
    <meta name="title" content="<?php if($job->job_name){ echo $product->product_name; }   ?>">
    <meta name="description" content="<?php if($product->product_metadata){ echo $product->product_metadata; } ?>">
    <meta name="keywords" content="<?php if($product->seo_keyword) { echo $product->seo_keyword; } ?>">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta property="og:url" content="<?php echo base_url('home/product_detail/').rawurlencode($product->product_name); ?>"><meta property="og:type"      content="article" />
    <meta property="og:title"  content="<?php if($product->product_name){ echo $product->product_name; }?>" />
    <meta property="og:description" content="<?php if($product->product_metadata){ echo $product->product_metadata; } ?>" />
  <?php  
    if ($product_file=$this->db->get_where('product_file', array('product_id ' =>$product->product_id ))->row()) {
			$image= $product_file->product_file_name;
			     
	}
							
	?>
    <meta property="og:image" content="<?php echo base_url().'uploads/products/'.$image; ?>">
    
        
        <?php
    
    }
    ?>
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

<!--<link rel="shortcut-icon" type="image/png" href="application/view/back/admin/favicon.png">-->
    

</head>
<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Skyrabucks</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        
        <div class="user-info">
          
          <span class="user-role">Super Admin</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li>
            <a href="<?php echo base_url('Super_admin');?>">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>   
          </li>
          
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Jobs</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Super_admin/all_products/'); ?>"> All Jobs</a>
                </li>  
                
                
                
              </ul>
            </div>
          </li>

           <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Services</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Super_admin/Category/'); ?>">Main Category</a>
                </li>
        
                <li>
                  <a href="<?php echo base_url('Super_admin/sub_category/'); ?>">Sub Category</a>
                </li>      
              </ul>
            </div>
          </li>
          
        <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-user-alt"></i>
              <span>User</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Super_admin/Admin/'); ?>">Admin</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/Sub_admin/'); ?>">Sub admin</a>
                </li>  
                <li>
                  <a href="<?php echo base_url('Super_admin/Support_team/'); ?>">Support team </a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/Service_provider/'); ?>">Service Provider </a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/Delivery_partner/'); ?>">Delivery Partner </a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/Customer/'); ?>">Customer </a>
                </li>    
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Location</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Super_admin/States/'); ?>">States</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/Cities/'); ?>">Cities</a>
                </li> 
                </ul>
                </div> 
              </li>

        <li>
            <a href="<?php echo base_url('Super_admin/Sell/'); ?>">
              <i class="fas fa-shopping-cart"></i>
              <span>Orders</span>
            </a>
        </li>
           
        <li>
            <a href="<?php echo base_url('Super_admin/todays_sale/'); ?>">
              <i class="fas fa-coins"></i>
              <span>Earning</span>
            </a>
        </li>
          <li>
            <a href="<?php echo base_url('Super_admin/Return_order/'); ?>">
              <i class="fas fa-wallet"></i>
              <span>Wallet</span>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url('Super_admin/Canceled_product'); ?>">
              <i class="fas fa-poll-h"></i>
              <span>Report</span>
            </a>
        </li>  
          
     
        

          <li class="header-menu">
            <span>Extra</span>
          </li>
           <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-cog"></i>
              <span>Settings</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Super_admin/Banner/'); ?>">Banner</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/theme/'); ?>">theme</a>
                </li> 
                   
                </li>
                
              </ul>

              <li class="sidebar-dropdown">
             <a href="#">
              <i class="fas fa-wrench"></i>
              <span>General Settings</span>
             </a>
             <div class="sidebar-submenu">
              <ul>
                 <li>
                  <a href="<?php echo base_url('Super_admin/system_setting/'); ?>">System Setting</a>
                </li> 
                <li>
                  <a href="<?php echo base_url('Super_admin/social_media/'); ?>">Social Media</a>
                </li>  
                <li>
                  <a href="<?php echo base_url('Super_admin/seo_setting/'); ?>">SEO Setting</a>
                </li>   
                </li>
                </div>
          </li>

            <li class="sidebar-dropdown">
             <a href="#">
              <i class="fas fa-user-circle"></i>
              <span>My Account</span>
             </a>
             <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Super_admin/Super_Admin/'); ?>">Super_Admin</a>
                </li>      
                </li>
              </div>
           </li>
           <li class="sidebar-dropdown">
             <a href="#">
              <i class="fas fa-user-circle"></i>
              <span>Payment Setting</span>
             </a>
             <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Super_admin/payment_gateway/'); ?>">Payment gateway</a>
                </li> 
                <li>
                  <a href="<?php echo base_url('Super_admin/Sms_gateway/'); ?>">Sms gateway</a>
                </li>     
                </li>
              </div>
           </li>
           <li class="sidebar-dropdown">
             <a href="#">
              <i class="fas fa-user-circle"></i>
              <span>Help And Information</span>
             </a>
             <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo base_url('Super_admin/About_us/'); ?>">About Us</a>
                </li> 
                <li>
                  <a href="<?php echo base_url('Super_admin/privacy_policy/'); ?>">Privacy Policy</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/cookies/'); ?>">Cookies</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/copyright_policy/'); ?>">Copyright Policy</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/hyperlink_policy/'); ?>">Hyperlink Policy</a>
                </li>
                <li>
                  <a href="<?php echo base_url('Super_admin/terms_conditions/'); ?>">Terms And Conditions</a>
                </li>
                   
                </li>
              </div>
           </li>



         
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        
      </a>
      
      <a href="<?php echo base_url('Super_admin/log_out'); ?>">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>


    <!-- sidebar-wrapper  -->