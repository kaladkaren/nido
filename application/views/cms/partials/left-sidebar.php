
<section id="container" class="">
  <!--header start-->
  <header class="header dark-bg">
    <div class="sidebar-toggle-box">
      <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo">NIDO<span> ADMIN</span></a>
    <!--logo end-->
    <div class="top-nav ">
      <ul class="nav pull-right top-menu">
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <!-- <img alt="" src="img/avatar1_small.jpg"> -->
            <span class="username">USER : <?php echo $this->session->userdata('fname'); ?></span>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu extended logout">
            <li><a href="<?php echo base_url('cms/login/logout') ?>"><i class="fa fa-key"></i> Log Out</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </header>
  <!--header end-->
  <!--sidebar start-->
  <aside>
    <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">

        <li>
          <a href="<?php echo base_url('cms') ?>"
            class="<?php echo $this->uri->segment(1) === 'cms' && $this->uri->segment(2) === null ? 'active': ''; ?>">
            <i class="fa fa-users"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('cms/admin/profile') ?>"
            class="<?php echo $this->uri->segment(1) === 'cms' &&  $this->uri->segment(2) === 'admin' && $this->uri->segment(3) === 'profile' ? 'active': ''; ?>">
            <i class="fa fa-user"></i>
            <span>My Profile</span>
          </a>
        </li>
        

        <li>
          <a href="<?php echo base_url('cms/admin') ?>"
            class="<?php echo $this->uri->segment(1) === 'cms' && ($this->uri->segment(2) === 'admin' && $this->uri->segment(3) === null) ? 'active': ''; ?>">
            <i class="fa fa-users"></i>
            <span>User Management</span>
          </a>
        </li>

        <li>
          <strong><label style="color: white; padding: 10px 20px;">REGISTRATION MENU</label></strong>
        </li>

        <li>
          <a href="<?php echo base_url('cms/registration') ?>"
            class="<?php echo $this->uri->segment(1) === 'cms' && ($this->uri->segment(2) === 'registration' && $this->uri->segment(3) === null) ? 'active': ''; ?>">
            <i class="fa fa-users"></i>
            <span>Registration Data</span>
          </a>
        </li>

        <!-- <li>
          <a href="<?php echo base_url('cms/registration/manual_add') ?>"
            class="<?php echo $this->uri->segment(1) === 'cms' && ($this->uri->segment(2) === 'admin' && $this->uri->segment(3) === null) ? 'active': ''; ?>">
            <i class="fa fa-plus"></i>
            <span>Manual Registration</span>
          </a>
        </li> -->

        <li>
          <a href="<?php echo base_url('cms/registration/bulk_import') ?>"
            class="<?php echo $this->uri->segment(1) === 'cms' && ($this->uri->segment(2) === 'registration' && $this->uri->segment(3) === 'bulk_import') ? 'active': ''; ?>">
            <i class="fa fa-upload"></i>
            <span>Upload CSV Data</span>
          </a>
        </li>

        
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
  <!--sidebar end-->
