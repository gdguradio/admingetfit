<?php
$CI =& get_instance();
$CI->load->model('Login_model');
$CI->load->model('masterdata/MasterDataRole_','masterdatarole');
// $photo = $CI->Login_model->get_photo();
$menu = $CI->masterdatarole->loadMenu();
// $currentPage = $CI->uri->segment(1).(($CI->uri->segment(2)) ? '/'.$CI->uri->segment(2) : ''); 
// echo $currentPage ;
?>
  <header class="main-header">
    <!-- Logo -->
    <a href="<?=site_url();?>welcome" class="logo">
       <img src="<?=base_url();?>assets/img/logo/logo4.png" class="navbar-brand" style="padding:0px">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>get</b>fit247</span>
<!--       logo for regular state and mobile devices 
      <span class="logo-lg" style="margin-right:31px">AMS</span>-->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php //echo site_url('assets/user_photo/'.$photo); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php //echo $this->session->userdata('fullname'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php //echo base_url('assets/user_photo/'.$photo); ?>" class="img-circle" alt="User Image">
                <p>
                <?php echo $this->session->userdata('fullname'); ?>
                  <small><?php //echo $this->session->userdata('role_type'); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              <!--</li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php //echo site_url('Profile/user/'.$this->session->userdata('user_id'));?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php //echo site_url('Login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php //echo site_url('assets/user_photo/'.$photo); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('fullname'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- start database menu -->
        <?php foreach ($menu as $m):?>
            <!-- menu -->
            <?php if($CI->masterdatarole->hasAccess($m->SysID,'menu') == 'yes'): ?>
                    <?php if ($m->HasChild == 'no'): ?>
                        <li><a href="<?= site_url($m->Link) ?>"><i class="<?=$m->FaIcon?>"></i> <?= $m->MenuName ?></a></li>
                    <?php else: ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="<?=$m->FaIcon?>"></i>
                                <span><?= $m->MenuName ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <!-- submenu -->
                            <ul class="treeview-menu">
                                <?php foreach ($m->child_list as $c): ?>
                                <?php if($CI->masterdatarole->hasAccess($c->SysID,'submenu') == 'yes'): ?>
                                        <?php if ($c->HasChild == 'no'): ?>
                                            <li class="treeview">
                                                <li><a href="<?= site_url($c->Link) ?>"><i class="<?=$c->FaIcon?>"></i> <?= $c->SubMenuName ?></a></li>
                                            </li>
                                        <?php else: ?>
                                            <li class="treeview">
                                                <a href="#">
                                                    <i class="<?=$c->FaIcon?>"></i> <span><?= $c->SubMenuName ?></span>
                                                    <span class="pull-right-container">
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                </a>
                                                <!-- screen -->
                                                <ul class="treeview-menu">
                                                    <?php foreach ($c->child_list as $cc): ?>
                                                    <?php if($CI->masterdatarole->hasAccess($cc->SysID,'screen') == 'yes'): ?>
                                                        <li><a href="<?= site_url($cc->Link); ?>"><i class="<?=$cc->FaIcon?>"></i> <?= $cc->ScreenName ?></a></li>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- end database menu -->
        </ul>  
    </section>
    <!-- /.sidebar -->
  </aside>  