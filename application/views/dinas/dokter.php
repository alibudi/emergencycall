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
  <section class="content-header">
    <h1>
      Data Dokter
      <small>Tabel Dokter</small>
    </h1>
    <ol class="breadcrumb">
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Data Dokter</h3>

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

            <a href="<?php echo base_url('dinas/addDokter');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a> 
            <br /><br />

            <div class="table-responsive">
             <?php if($dokter!=null){?> 
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
             <?php } else { ?>
               <table width="100%" class="table table-striped table-bordered table-hover">
             <?php } ?> 
              
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Dokter</th>
                          <th>Spesialis</th>
                          <th>Telepon</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                      </tr>
                       
                  </thead>
                  <tbody>
                   <?php 
                  $no = 1;
                  if($dokter!=null){
                    foreach($dokter as $d){                  
                  ?> 
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d->namadokter; ?></td>
                      <td><?php echo $d->spesialis; ?></td>
                      <td><?php echo $d->phone; ?></td>
                      <td><?php echo $d->alamat;?></td> 
                      <td style="text-align: center;">
                          <a class='btn btn-info btn-xs' href="<?php echo base_url('admin/editDokter/'.$d->iddokter); ?>" class=""><i class="glyphicon glyphicon-edit"></i> </a>
                          <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('admin/deleteSopir/'.$d->iddokter); ?>')" class=""><i class="glyphicon glyphicon-trash"></i> </a>
            
                      </td>
                  </tr>
                   <?php } 
                    } else { ?> 
                    <tr>
                      <td class="text-center" colspan="6"><i>Tidak Ada Data</i></td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>             
          </div>
          <!-- /.box-body -->

      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>