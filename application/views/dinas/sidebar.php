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
      <li class=""><a href="<?php echo base_url('dinas')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="<?php echo base_url('dinas/profil');?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      <li><a href="<?php echo base_url('dinas/rs');?>"><i class="fa fa-users"></i> <span>Kelola Akun RS</span></a></li>
      <li><a href="<?php echo base_url('dinas/puskesmas');?>"><i class="fa fa-users"></i> <span>Kelola Akun Puskesmas</span> <span class="label label-warning" id="darurat"></span></a></li>
      <li class="active"><a href="<?php echo base_url('dinas/dokter');?>"><i class="fa fa-users"></i> <span>Kelola Akun Dokter</span> <span class="label label-warning" id="darurat"></span></a></li>
      <li><a href="<?php echo base_url('dinas/grafik');?>"><i class="fa fa-pie-chart"></i> <span>Grafik Darurat</span> <span class="label label-warning" id="darurat"></span></a></li>
      
      <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
