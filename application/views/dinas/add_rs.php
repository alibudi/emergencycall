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
      <li><a href="<?php echo base_url('dinas')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="<?php echo base_url('dinas/profil');?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      <li class="active"><a href="<?php echo base_url('dinas/rs');?>"><i class="fa fa-users"></i> <span>Kelola Akun RS</span></a></li>
      <li><a href="<?php echo base_url('dinas/puskesmas');?>"><i class="fa fa-users"></i> <span>Kelola Akun Puskesmas</span> <span class="label label-warning" id="darurat"></span></a></li>
      <li ><a href="<?php echo base_url('dinas/dokter');?>"><i class="fa fa-users"></i> <span>Kelola Akun Dokter</span> <span class="label label-warning" id="darurat"></span></a></li>
      <li><a href="<?php echo base_url('dinas/grafik');?>"><i class="fa fa-pie-chart"></i> <span>Grafik Darurat</span> <span class="label label-warning" id="darurat"></span></a></li>
      
      <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Akun Member
      <small>Akun Member Rs</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-users"></i>Akun RS</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Akun RS</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if($this->session->flashdata('info')){?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>
            <br />
            <?php echo form_open('dinas/addRs');?>
             
              <div class="form-group">
                            <label for="username">Nama Rumah Sakit</label>
                            <input type="text" name="username" class="form-control" required oninvalid="setCustomValidity('Username Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Rumah Sakit" >
                                   <?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('username');?>


              <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required oninvalid="setCustomValidity('Password Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Password " >
                                   <?php echo form_error('password', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('password');?>


             <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required oninvalid="setCustomValidity('Email Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Email" >
                                   <?php echo form_error('email', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('email');?>


              <div class="form-group">
                            <label for="first_name">Nama Depan</label>
                            <input type="text" name="first_name" class="form-control" required oninvalid="setCustomValidity('Nama Depan Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Depan " >
                                   <?php echo form_error('first_name', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('first_name');?>


              <div class="form-group">
                            <label for="last_name">Nama Belakang</label>
                            <input type="text" name="last_name" class="form-control" required oninvalid="setCustomValidity('Nama Belakang Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Belakang " >
                                   <?php echo form_error('last_name', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('last_name');?>

              <div class="form-group">
                            <label for="phone">No Handphone</label>
                            <input type="number" name="phone" class="form-control" required oninvalid="setCustomValidity('No Handphone Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan No Handphone" >
                                   <?php echo form_error('phone', '<div class="text-red">', '</div>'); ?>
                            </div>
                            <?php echo form_error('phone');?>




              <div class="box-footer">
                  <button type="submit" name="Submit" value="submit" class="btn btn-success"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>&nbsp;
                  <a href="<?php echo base_url('dinas/rs');?>" class="btn btn-warning">Kembali</a>
              </div>
            </form>                        
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>