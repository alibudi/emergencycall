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
        <li class=" treeview">
          <li><a href=""><i class="fa fa-home"></i> Dashboard </a></li>
        </li>
        <li class="active"><a href="<?php echo base_url('rumah/sopir');?>"><i class="fa fa-users"></i>Kelola Akun Sopir</a></li>
        <li><a href="<?php echo base_url();?>rumah/notifikasi"><i class="fa fa-bell"></i>Notifikasi</a></li>
        <li><a href="<?php echo base_url('rumah/send');?>"><i class="fa fa-send"></i>Send Report</a></li>
        
      <li><a href="pages/layout/top-nav.html"><i class="fa fa-pie-chart"></i>Grafik</a></li>
      <li><a href="pages/layout/top-nav.html"><i class="fa fa-gears"></i>Setelan Akun</a></li>     
       <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>  
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Sopir
      <small>Tabel sopir</small>
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
            <h3 class="box-title">Data Sopir</h3>

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

            <a href="<?php echo base_url('rumah/addSopir');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a> 
            <br /><br />

            <div class="table-responsive">
             <?php if($sopir!=null){?> 
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
             <?php } else { ?>
               <table width="100%" class="table table-striped table-bordered table-hover">
             <?php } ?> 
              
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Sopir</th>
                          <th>Nama Instansi</th>
                          <th>Telepon</th>
                      <!--     <th>created_at</th> -->
                          <th>Aksi</th>
                      </tr>
                       
                  </thead>
                  <tbody>
                   <?php 
                  $no = 1;
                  if($sopir!=null){
                    foreach($sopir as $d){                  
                  ?> 
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d->namasopir; ?></td>
                      <td><?php echo $d->namainstansi; ?></td>
                      <td><?php echo $d->phone; ?></td>
                   <!--    <td><?php echo $d->created_at;?></td> -->
                      <td style="text-align: center;">
                          <a class='btn btn-info btn-xs' href="<?php echo base_url('rumah/editSopir/'.$d->idsopir); ?>" class=""><i class="glyphicon glyphicon-edit"></i> </a>
                          <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('rumah/deleteSopir/'.$d->idsopir); ?>')" class=""><i class="glyphicon glyphicon-trash"></i> </a>
            
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
<script type="text/javascript">
  function functionDelete(url){
    swal({
      title: 'Apakah Anda Yakin?',
      text: "Anda akan menghapus Sopir!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, gagalkan!',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function () {
        swal("Terhapus!", "Anda telah mengapus sopir", "success");
        window.location = url;

    }, function (dismiss) {
      // dismiss can be 'cancel', 'overlay',
      // 'close', and 'timer'
      if (dismiss === 'cancel') {
        swal("Cancelled", "Anda tidak jadi menghapus groups", "error")
      }

    });
}
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
        responsive: true
    });
});
</script>

