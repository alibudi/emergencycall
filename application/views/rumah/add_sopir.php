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

     <!-- Main content -->
     <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Sopir</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div> 
          <!-- /.box-header -->
          <div class="box-body">
            <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>

            <?php
                $name = array(
                    'name'=>'addData',
                    'class'=>'form-horizontal'
                    );  
                echo form_open('rumah/addSopir/',$name);
            ?>

              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Nama Sopir</label>
                <div class="col-sm-9">
                  <input type="text" name="namasopir" class="form-control" placeholder="Nama Sopir">
                  <?php echo form_error('nama_sopir');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">No telepon</label>
                <div class="col-sm-9">
                  <input type="text"  name="phone" class="form-control" placeholder="No telepon">
                  <?php echo form_error('phone');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Nama Instansi</label>
                <div class="col-sm-9">
                  <input type="text"  name="namainstansi" class="form-control" placeholder="Nama Instansi">
                  <?php echo form_error('nama_instansi');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Nomor Plat</label>
                <div class="col-sm-9">
                  <input type="text"  name="platnomor" class="form-control" placeholder="Nomor plat">
                  <?php echo form_error('platnomor');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="text" name="password" class="form-control" placeholder="password">
                  <?php echo form_error('password');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-2">
                  <button type="submit" name="submit" value="submit" class="btn btn-success">Tambah</button>
                </div>
              </div>
            </form>    
 
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>
  </section>
</div>