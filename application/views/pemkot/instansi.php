
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Akun Member
      <small>Akun Member Instansi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('warga/darurat');?>"><i class="fa fa-users"></i> Akun Member</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Akun Instansi</h3>
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

            <a href="<?php echo base_url('pemkot/memberadd');?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a><br /><br />

             <div class="table-responsive">
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                <thead>
                  <?php 
                if($list_member!=null){
                    
                  ?>
                    <tr>
                        <th>No</th>
                        <th>Nama Instansi</th>
                        <th>Email</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>No Handphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                        $no = 1;
                        foreach($list_member as $u){ 
                        ?>
                    <tr>
                         <td><?php echo $no++ ?></td>
                          <td><?php echo $u->username ?></td>
                          <td><?php echo $u->email ?></td>
                          <td><?php echo $u->first_name ?></td>
                          <td><?php echo $u->last_name ?></td>
                          <td><?php echo $u->phone?></td>
                          <td style="text-align: center;">
                            <a class='btn btn-info btn-xs' href="<?php echo base_url('admin/changeData/'.$u->id); ?>" class=""><i class="glyphicon glyphicon-edit "></i> </a> &nbsp;&nbsp;
                            <a class='btn btn-danger btn-xs' href="#" onclick="functionDelete('<?php echo base_url('admin/memberdelete/'.$u->id); ?>')" class=""><i class="glyphicon glyphicon-trash"></i> </a>
                  
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
