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
                 echo form_open('rumah/editDokter/'.$dokter->iddokter,$name);
            ?>

               <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Nama Dokter</label>
                <div class="col-sm-9">
                  <input type="text" name="namadokter" value="<?php echo $dokter->namadokter;?>" class="form-control" placeholder="Nama Dokter">
                  <?php echo form_error('nama');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Spesialis</label>
                <div class="col-sm-9">
                  <input type="text"  name="spesialis" value="<?php echo $dokter->spesialis;?>" class="form-control" placeholder="Spesialis">
                  <?php echo form_error('spesialis');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-9">
                  <input type="text"  name="alamat" value="<?php echo $dokter->alamat;?>" class="form-control" placeholder="Alamat">
                  <?php echo form_error('alamat');?>
                </div>
              </div>
              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">No telepon</label>
                <div class="col-sm-9">
                  <input type="text"  name="phone" value="<?php echo $dokter->phone;?>" class="form-control" placeholder="No telepon">
                  <?php echo form_error('phone');?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-2">
                  <button type="submit" name="submit" value="submit" class="btn btn-success">Save</button>
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