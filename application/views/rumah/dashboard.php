 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/user.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
           <p><?php echo $user->username;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <li><a href=""><i class="fa fa-home"></i> Dashboard </a></li>
        </li>
        <li><a href="<?php echo base_url('rumah/sopir');?>"><i class="fa fa-users"></i>Kelola Akun Sopir</a></li>
        <li><a href="<?php echo base_url();?>rumah/notifikasi"><i class="fa fa-bell"></i>Notifikasi</a></li>
        <li><a href="<?php echo base_url('rumah/send');?>"><i class="fa fa-send"></i>Send Report</a></li>
        
      <li><a href="pages/layout/top-nav.html"><i class="fa fa-pie-chart"></i>Grafik</a></li>
      <li><a href="pages/layout/top-nav.html"><i class="fa fa-gears"></i>Setelan Akun</a></li>     
       <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>  
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Dashboard RS</small>
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
             <p>Selamat Datang di Rs <?php echo $user->first_name.' '.$user->last_name;?> </p>             
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



