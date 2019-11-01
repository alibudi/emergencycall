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
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <li><a href=""><i class="fa fa-home"></i> Dashboard </a></li>
        </li>
        <!-- <li><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-users"></i> Kelola Member</a></li>
         --><!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Kelola Akun Sopir</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo base_url('admin/dokter');?>"><i class="fa fa-circle-o"></i> Data Dokter</a></li>
          </ul>
        </li> -->
        <li><a href="<?php echo base_url('rumah/sopir');?>"><i class="fa fa-users"></i>Kelola Akun Sopir</a></li>
       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-bell"></i>
            <span>Notifikasi Darurat</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
          </ul>
        </li> -->
        <li><a href="<?php echo base_url();?>rumah/notifikasi"><i class="fa fa-bell"></i>Notifikasi</a></li>
        <li class="active"><a href="<?php echo base_url('rumah/send');?>"><i class="fa fa-send"></i>Send Report</a></li>
        
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
      Send Report
      <small>From send repot</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('rumah/print');?>"><i class="fa fa-home"></i> Send Report</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">From Send Report</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
 <!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Form</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tabel Report</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Instansi</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
                  </div>
                <!--   <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                  <div class="box-body">
            <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('info'); ?>
                </div>
            <?php } ?>

            <a href="<?php echo base_url('admin/addPengunjung');?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</a> 
            <br /><br />

            <div class="table-responsive">
             <?php if($report!=null){?> 
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
           <?php } else { ?>
               <table width="100%" class="table table-striped table-bordered table-hover">
             <?php } ?> 
              
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Instansi</th>
                          <th>Keterangan</th>
                          <th>Waktu</th>
                          <th>Aksi</th>
                      </tr>
                       
                  </thead>
                  <tbody>
                   <?php 
                  $no = 1;
                  if($report!=null){
                    foreach($report as $d){                  
                  ?> 
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d->nama_instansi; ?></td>
                      <td><?php echo $d->keterangan; ?></td>
                      <td><?php echo $d->waktu; ?></td>
                      <td style="text-align: center;">
                          <a class='btn btn-info btn-xs' href="#" onclick="functionDelete('<?php echo base_url('rumah/deleteSend/'.$d->id_report); ?>')" class=""><i class="glyphicon glyphicon-check"></i>Ditangani </a>
            
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
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
    </section>
    </div>

    <script type="text/javascript">
  function functionDelete(url){
    swal({
      title: 'Apakah Anda Yakin Kejadian darurat sudah benar-benar di tangani?',
      text: "Jika sudah ditangani sistem secara otomatis mengirim report ke pelapor!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Ditangani!',
      cancelButtonText: 'Tidak, Kembali!',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function () {
        swal("Terhapus!", "Anda telah mengapus akun member", "success");
        window.location = url;

    }, function (dismiss) {
      // dismiss can be 'cancel', 'overlay',
      // 'close', and 'timer'
      if (dismiss === 'cancel') {
        swal("Cancelled", "Anda tidak jadi menghapus akun member", "error")
      }

    });
}
</script>
