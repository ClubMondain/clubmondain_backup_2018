<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/');?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
    </div>
    <ul class="sidebar-menu" id="side-menu-bar">
      <li class="treeview <?php if($_ci_view == 'admin/dashboard'){ echo 'active open';}?>" data-link="dashboard"> <a href="<?php echo base_url('Dashboard')?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a> </li>
      <li class="treeview <?php if($_ci_view == 'admin/view-all-member-details' || $_ci_view == 'admin/member' || $_ci_view == 'admin/edit_member' || $_ci_view == 'admin/list_member'){ echo 'active open';} ?>" data-link='dashboard'> <a href="="> <i class="fa fa-gg-circle"></i> <span>Business Traveller</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class="<?php if($_ci_view == 'admin/list_member'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-member');?>"> <i class="fa fa-circle-o"></i><span>List Business Traveller</span></a> </li>
       </ul>
     </li>
     <li class="treeview <?php if($_ci_view == 'admin/view-all-trainer-details' || $_ci_view == 'admin/list_class' || $_ci_view == 'admin/edit_trainer' ||  $_ci_view == 'admin/edit_trainner' || $_ci_view == 'admin/list_trainner'){ echo 'active open';} ?>" data-link='dashboard'> <a href=""> <i class="fa fa-gg-circle"></i> <span>Trainer</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
      <ul class="treeview-menu">
       <li class="<?php if($_ci_view == 'admin/list_trainner'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-trainner');?>"> <i class="fa fa-circle-o"></i><span>List Trainer</span></a> </li>
     </ul>
   </li>
   <li class="treeview <?php if($_ci_view == 'admin/view-all-company-details' || $_ci_view == 'admin/edit_company' || $_ci_view == 'admin/list_company'){ echo 'active open';} ?>" data-link='dashboard'> <a href=""> <i class="fa fa-gg-circle"></i> <span>Company</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
    <ul class="treeview-menu">
     <li class="<?php if($_ci_view == 'admin/list_company'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-company');?>"> <i class="fa fa-circle-o"></i><span>List Company</span></a> </li>
   </ul>
 </li>
 <li class="treeview <?php if($_ci_view == 'admin/list_all'){ echo 'active open';} ?>" data-link='dashboard'> <a href=""> <i class="fa fa-gg-circle"></i> <span>List All User</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
    <ul class="treeview-menu">
     <li class="<?php if($_ci_view == 'admin/list_all'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list_all');?>"> 
      <i class="fa fa-circle-o"></i><span>List All User</span></a> 
    </li>
   </ul>
 </li>
 <li class="treeview <?php if($get_the_third_parameter == 'product'){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>Product Categories</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
  <ul class="treeview-menu">
    <li class="<?php if($_ci_view == 'admin/product_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/create-category-view/product');?>"> <i class="fa fa-circle-o"></i><span>Create Category </span></a> </li>
    <li class="<?php if($_ci_view == 'admin/list_product_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/list-category-view/product');?>"> <i class="fa fa-circle-o"></i><span>List Category </span></a> </li>
  </ul>
</li>
<!-- <li class="treeview <?php if($_ci_view == 'admin/product_sub_category' || $_ci_view == 'admin/edit_product_sub_category' || $_ci_view == 'admin/list_product_sub_category'){ echo 'active open';} ?> "> <a href="javascript:void(0)"> <i class="fa fa-gg-circle"></i> <span>Product Subcategories</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
  <ul class="treeview-menu">
    <li class="<?php if($_ci_view == 'admin/product_sub_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/create-product-sub-category-view/');?>"> <i class="fa fa-circle-o"></i><span>Create Subcategory </span></a> </li>
    <li class="<?php if($_ci_view == 'admin/list_product_sub_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-product-sub-category-view');?>"> <i class="fa fa-circle-o"></i><span>List Subcategory </span></a> </li>
  </ul>
</li> -->
<li class="treeview <?php if($get_the_third_parameter == 'event'){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>Event/Spaces Categories</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
  <ul class="treeview-menu">
    <li class="<?php if($_ci_view == 'admin/category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/create-category-view/event');?>"> <i class="fa fa-circle-o"></i><span>Create Category </span></a> </li>
    <li class="<?php if($_ci_view == 'admin/list_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/list-category-view/event');?>"> <i class="fa fa-circle-o"></i><span>List Category </span></a> </li>
  </ul>
</li>
<!-- <li class="treeview <?php if($get_the_third_parameter == 'business'){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>Space  Categories</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
  <ul class="treeview-menu">
    <li class="<?php if($_ci_view == 'admin/product_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/create-category-view/business');?>"> <i class="fa fa-circle-o"></i><span>Create Category </span></a> </li>
    <li class="<?php if($_ci_view == 'admin/list_product_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/list-category-view/business');?>"> <i class="fa fa-circle-o"></i><span>List Category </span></a> </li>

  </ul>
</li> -->
<li class="treeview <?php if( $_ci_view == 'admin/edit_space_feedback' || $_ci_view == 'admin/list_space_feedback' || $_ci_view == 'admin/space' || $_ci_view == 'admin/edit_space'|| $_ci_view == 'admin/list_all_space' || $_ci_view == 'admin/list_space'){ echo 'active open';} ?>"> <a href=""> <i class="fa fa-gg-circle"></i> <span>Space</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/space'){?> active-menue <?php }?>"><a href=""> <i class="fa fa-circle-o"></i><span>Create Space</span></a> </li>
          <!-- <li class="<?php if($_ci_view == 'admin/list_space'){?> active-menue <?php }?>"><a href="<?php echo site_url('Space/list_space_view');?>"> <i class="fa fa-circle-o"></i><span>List Space By Admin</span></a> </li> -->
          <li class="<?php if($_ci_view == 'admin/list_all_space'){?> active-menue <?php }?>"><a href=""> <i class="fa fa-circle-o"></i><span>List All Space</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_space_feedback'){?> active-menue <?php }?>"><a href="<?php echo site_url('Space/list_all_feedback');?>"> <i class="fa fa-circle-o"></i><span>List All Space Feedback</span></a> </li>
        </ul>
      </li>

      <?php /*?><li class="treeview <?php if($_ci_view == 'admin/sub_category' || $_ci_view == 'admin/edit_sub_category' || $_ci_view == 'admin/list_sub_category'){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>Event Subcategories</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/sub_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/create_sub_category_view/');?>"> <i class="fa fa-circle-o"></i><span>Create Subcategory </span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_sub_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list_sub_category_view');?>"> <i class="fa fa-circle-o"></i><span>List Subcategory </span></a> </li>
        </ul>
      </li>
     <?php /*?> <li class="treeview <?php if($_ci_view == 'admin/event' || $_ci_view == 'admin/edit_event'|| $_ci_view == 'admin/list_all_event' || $_ci_view == 'admin/list_event'){ echo 'active open';} ?>"> <a href=""> <i class="fa fa-gg-circle"></i> <span>My Event</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/event'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/create_event_view/');?>"> <i class="fa fa-circle-o"></i><span>Create Events</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_event'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list_event_view');?>"> <i class="fa fa-circle-o"></i><span>List Event</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_all_event'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list_all_event_view');?>"> <i class="fa fa-circle-o"></i><span>List All Event</span></a> </li>
        </ul>
      </li><?php */?>

      <li class="treeview <?php if($_ci_view == 'admin/event' || $_ci_view == 'admin/edit_event'|| $_ci_view == 'admin/list_all_event' || $_ci_view == 'admin/list_event'){ echo 'active open';} ?>"> <a href=""> <i class="fa fa-gg-circle"></i> <span>Event</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/event'){?> active-menue <?php }?>"><a href=""> <i class="fa fa-circle-o"></i><span>Create Events</span></a> </li>
         <!--  <li class="<?php if($_ci_view == 'admin/list-event'){?> active-menue <?php }?>"><a href="<?php echo site_url('Event/list-event-view');?>"> <i class="fa fa-circle-o"></i><span>List Event By Admin</span></a> </li> -->
          <li class="<?php if($_ci_view == 'admin/list-all-event'){?> active-menue <?php }?>"><a href=""> <i class="fa fa-circle-o"></i><span>List All Event</span></a> </li>
        </ul>
      </li>

      <li class="treeview <?php if($_ci_view == 'admin/list_meetup'){ echo 'active open';} ?>"> <a href=""> <i class="fa fa-gg-circle"></i> <span>Meetup</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/list_meetup'){?> active-menue <?php }?>"><a href="<?php echo site_url('Meetup/list_meetup');?>"> <i class="fa fa-circle-o"></i><span>List Meetup</span></a> </li>

        </ul>
      </li>

      <li class="treeview <?php if(($_ci_view == 'admin/class' || $_ci_view == 'admin/list_section_class'|| $_ci_view == 'admin/edit_class'|| $_ci_view == 'admin/list_all_section_class' )){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>Space Classes</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
         <li class="<?php if($_ci_view == 'admin/class'){?> active-menue <?php }?>"><a href="<?php echo site_url('education/create-class-view/');?>"> <i class="fa fa-circle-o"></i><span>Create Class</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_section_class'){?> active-menue <?php }?>"><a href="<?php echo site_url('education/list-class-view');?>"> <i class="fa fa-circle-o"></i><span>List Class By Admin</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_all_section_class'){?> active-menue <?php }?>"><a href="<?php echo site_url('education/list-all-class-view');?>"> <i class="fa fa-circle-o"></i><span>List All Class</span></a> </li>
        </ul>
      </li>

      <li class="treeview <?php if($get_the_third_parameter == 'news'){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>News Categories</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/news_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/create-category-view/news');?>"> <i class="fa fa-circle-o"></i><span>Create Category </span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_news_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/list-category-view/news');?>"> <i class="fa fa-circle-o"></i><span>List Category </span></a> </li>
        </ul>
      </li>

    <!--   <li class="treeview <?php if($get_the_third_parameter == 'blog'){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>Blog Categories</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
      <ul class="treeview-menu">
        <li class="<?php if($_ci_view == 'admin/blog_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/create-category-view/blog');?>"> <i class="fa fa-circle-o"></i><span>Create Category </span></a> </li>
        <li class="<?php if($_ci_view == 'admin/list_blog_category'){?> active-menue <?php }?>"><a href="<?php echo site_url('Category/list-category-view/blog');?>"> <i class="fa fa-circle-o"></i><span>List Category </span></a> </li>
      </ul>
    </li> -->


      <li class="treeview <?php if($_ci_view == 'admin/membership' || $_ci_view == 'admin/edit_membership' || $_ci_view == 'admin/list_membership'){ echo 'active open';} ?>"> <a href="#"> <i class="fa fa-gg-circle"></i> <span>Membership</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/membership'){?> active-menue <?php }?>"><a href="<?php echo site_url('Membership/create-membership-view/');?>"> <i class="fa fa-circle-o"></i><span>Create Membership</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_membership'){?> active-menue <?php }?>"><a href="<?php echo site_url('Membership/list-membership-view');?>"> <i class="fa fa-circle-o"></i><span>List Membership</span></a> </li>
        </ul>
      </li>
      <li class="treeview <?php if($_ci_view == 'admin/city' || $_ci_view == 'admin/edit_city' || $_ci_view == 'admin/list_city' || $_ci_view == 'admin/list_request_city'){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>City</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/city'){?> active-menue <?php }?>"><a href="<?php echo site_url('City/create-city-view/');?>"> <i class="fa fa-circle-o"></i><span>Create City </span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_city'){?> active-menue <?php }?>"><a href="<?php echo site_url('City/list-city-view');?>"> <i class="fa fa-circle-o"></i><span>List City </span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_request_city'){?> active-menue <?php }?>"><a href="<?php echo site_url('City/list-request-city-view');?>"> <i class="fa fa-circle-o"></i><span>List Requsted City </span></a> </li>
        </ul>
      </li>

      <li class="treeview <?php if($_ci_view == 'admin/list_all_news' ||  $_ci_view == 'admin/news' || $_ci_view == 'admin/edit_news' || $_ci_view == 'admin/list_news' || $_ci_view == 'admin/list_all_blog' || $_ci_view == 'admin/blog' || $_ci_view == 'admin/edit_blog' || $_ci_view == 'admin/list_blog'){ echo 'active open';} ?> "> <a href=""> <i class="fa fa-gg-circle"></i> <span>News</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/news'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/create-news-view');?>"> <i class="fa fa-circle-o"></i><span>Create News </span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_news'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-news-view');?>"> <i class="fa fa-circle-o"></i><span>List News By Admin</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_all_news'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-news-all');?>"> <i class="fa fa-circle-o"></i><span>List All News </span></a> </li>
<!--       <li class="<?php if($_ci_view == 'admin/blog'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/create-blog-view');?>"> <i class="fa fa-circle-o"></i><span>Create Blog </span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_blog'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-blog-view');?>"> <i class="fa fa-circle-o"></i><span>List Blog </span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_all_blog'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-blog-all');?>"> <i class="fa fa-circle-o"></i><span>List All Blog </span></a> </li> -->
        </ul>
      </li>

      <li class="treeview <?php if($_ci_view == 'admin/list_product_gallary' || $_ci_view == 'admin/product' || $_ci_view == 'admin/edit_product'|| $_ci_view == 'admin/list_all_product' || $_ci_view == 'admin/list_product'){ echo 'active open';} ?>"> <a href=""> <i class="fa fa-gg-circle"></i> <span>Product</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/product'){?> active-menue <?php }?>"><a href="<?php echo site_url('Product/create-product-view/');?>"> <i class="fa fa-circle-o"></i><span>Create Product</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_product' || $_ci_view == 'admin/list_product_gallary' ){?> active-menue <?php }?>"><a href="<?php echo site_url('Product/list-product-view');?>"> <i class="fa fa-circle-o"></i><span>List Product By Admin</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_all_product' || $_ci_view == 'admin/list_product_gallary' ){?> active-menue <?php }?>"><a href="<?php echo site_url('Product/list-all-product-view');?>"> <i class="fa fa-circle-o"></i><span>List All Product</span></a> </li>
        </ul>
      </li>

      <li class="treeview <?php if($_ci_view == 'admin/list_order' ){ echo 'active open';} ?>"> <a href=""> <i class="fa fa-gg-circle"></i> <span>Order</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/list_order'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-order/');?>"> <i class="fa fa-circle-o"></i><span>List Order</span></a> </li>
        </ul>
      </li>

      <li class="treeview <?php if($_ci_view == 'admin/list_class_payment' ){ echo 'active open';} ?>"> <a href=""> <i class="fa fa-gg-circle"></i> <span>Payment</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/list_class_payment'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-class-payment/');?>"> <i class="fa fa-circle-o"></i><span>List Payment</span></a> </li>
        </ul>
      </li>

       <li class="treeview  <?php if($_ci_view == 'admin/create_banner' || $_ci_view == 'admin/edit_banner' || $_ci_view == 'admin/list_banner'){ echo 'active open';} ?>"> <a href="#"> <i class="fa fa-gg-circle"></i> <span>Banner</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/create_banner'){?> active-menue <?php }?>"><a href="<?php echo site_url('Banner/createBanner');?>"> <i class="fa fa-circle-o"></i><span>Create Banner</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_banner'){?> active-menue <?php }?>"><a href="<?php echo site_url('Banner/listBanner');?>"> <i class="fa fa-circle-o"></i><span>Banner List</span></a> </li>
        </ul>
      </li>

      <li class="treeview  <?php if($_ci_view == 'admin/content' || $_ci_view == 'admin/edit_content' || $_ci_view == 'admin/list_content'){ echo 'active open';} ?>"> <a href="#"> <i class="fa fa-gg-circle"></i> <span>Static Content</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li class="<?php if($_ci_view == 'admin/content'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/create-content-view');?>"> <i class="fa fa-circle-o"></i><span>Create New Content</span></a> </li>
          <li class="<?php if($_ci_view == 'admin/list_content'){?> active-menue <?php }?>"><a href="<?php echo site_url('Dashboard/list-content-view');?>"> <i class="fa fa-circle-o"></i><span>Content List</span></a> </li>
        </ul>
      </li>

      <?php require('sidebar-inc.php');?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
