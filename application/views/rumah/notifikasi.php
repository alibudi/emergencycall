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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Notifikasi Darurat
      <small>Notifikasi Darurat Doraemon</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('warga/darurat');?>"><i class="fa fa-warning"></i> Notifikasi Darurat</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Darurat</h3>
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

           

             <div class="table-responsive">
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                <thead>
                    <tr>
                        <th width="20%">Nama Pelapor</th>
                        <th width="30%">Informasi Darurat</th>
                        <th width="30">Foto Kejadian</th>
                        <th width="15%">Tanggal/Waktu</th>
                        <th width="15%">Aksi</th>
                    </tr>
                     
                </thead>
                <tbody>
                  <?php 
                  $id_user = $user->id;
                  if($list_darurat!=null){
                    foreach($list_darurat as $list){ 
                      $tanggal = date('d-m-Y H:i:s',strtotime($list->waktu));
                  ?>
                    <tr>
                        <td><?php echo $list->nama_pelapor;?></td>

                        <?php if($list->statusbaca==0){ ?>
                          <td><?php echo $list->deskripsi_darurat;?> <span class="label label-warning">New</span></td>
                        <?php } else { ?>
                          <td><?php echo $list->deskripsi_darurat;?></td>
                        <?php } ?>
                        <td><img src="http://localhost/doraemon/darurat/img/darurat/<?php echo $list->gambar_darurat; ?>" width="100px" ></td>

                        <td><?php echo $tanggal;?>
                        <td style="text-align: center;">
                          <a href="<?php echo base_url('rs/viewDarurat/'.$list->id_darurat);?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                        </td>
                    </tr>
                  <?php } 
                  } else { ?>
                    <tr>
                      <td colspan="4" style="text-align: center;"><i>Tidak Ada Data</i></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
                  <!-- /.table-responsive -->
             </div>      
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
        responsive: true
    });
});
</script>

<script type="text/javascript">

  function ambilDarurat(){
   $.ajax({
      type: "POST",
      url: "<?php echo base_url('rs/daruratjson');?>",
      dataType:'json',
      success: function(response2){
       $("#darurat").text(""+response2+"");
       timer = setTimeout("ambilDarurat()",5000);
      }
     });  
  }

  $(document).ready(function(){
   ambilDarurat();
  });

</script>
<!-- /.content-wrapper -->



