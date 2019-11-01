<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/img/user.png');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user->username;?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="<?php echo base_url('admin/profile');?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      <li><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-users"></i> <span>Kelola Members</span></a></li>
      <li><a href="<?php echo base_url('admin/groups');?>"><i class="fa fa-users"></i> <span>Kelola Groups</span> <span class="label label-warning" id="darurat"></span></a></li>
      <li><a href="<?php echo base_url('admin/groups');?>"><i class="fa fa-users"></i> <span>Log Visitor</span> <span class="label label-warning" id="darurat"></span></a></li>
      
      
      
      <li><a href="<?php echo base_url('auth/logout');?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Dashboard Doraemon Apps</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('warga');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Welcome</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             <p>Selamat Datang di Doraemon Apps warga <?php echo $user->first_name.' '.$user->last_name;?> </p>             
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



