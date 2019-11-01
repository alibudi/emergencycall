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
      <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="<?php echo base_url('admin/profile');?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      <li><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-users"></i> <span>Kelola Members</span></a></li>
      <li><a href="<?php echo base_url('admin/groups');?>"><i class="fa fa-users"></i> <span>Kelola Groups</span> <span class="label label-warning" ></span></a></li>
      
      <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Akun Member
      <small>Akun Member Doraemon</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-users"></i>Akun Member</a></li>
      <!--<li class="active">Here</li>-->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah AKun Member</h3>
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
            <?php echo form_open('admin/memberadd');?>
             
              <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required oninvalid="setCustomValidity('Username Harus di Isi !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Username Member" >
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


                              <div class="form-group">
                                <label>Pilih Grup</label>
                                <select id="groups" name="groups" class="form-control">
                                <?php 
                                 $no = 1;
                                foreach($list_groups as $e){ 
                                ?>
                                <option value="<?php echo $e->id ?>"><?php echo $e->name ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <?php echo form_error('groups');?>


                           <!--  <script>
            function show(){
                var group = document.getElementById("groups").value;
                if(group==6){
                    $("#divnokk").hide();
                    $("#divrw").show();
                    $("#divrt").hide();
                    $("#divnorumah").hide();
                    $("#divalamat").hide();
                    $("#divphone").hide();
                } else if(group==5){
                    $("#divnokk").hide();
                    $("#divrw").show();
                    $("#divrt").show();
                    $("#divnorumah").hide();
                    $("#divalamat").hide();
                    $("#divphone").hide();
                } else if(group==2){
                    $("#divnokk").show();
                    $("#divrw").show();
                    $("#divrt").show();
                    $("#divnorumah").show();
                    $("#divalamat").show();
                    $("#divphone").show();
                } else{
                    $("#divnokk").hide();
                    $("#divrw").hide();
                    $("#divrt").hide();
                    $("#divnorumah").hide();
                    $("#divalamat").hide();
                    $("#divphone").hide();
                }
            }
        </script>

         <div id="divnokk" class="form-group" style="display:none;">
                                <label>No KK</label>
                                <input name="no_kk" value="" placeholder="Masukan No KK" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('no_kk');?>

        <div id="divrw" class="form-group" style="display:none;">
                                <label>RW</label>
                                <input name="rw" value="0" placeholder="Masukan RW" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('rw');?>

        <div id="divrt" class="form-group" style="display:none;">
                                <label>RT</label>
                                <input name="rt" value="0" placeholder="Masukan RT" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('rt');?>

        <div id="divalamat" class="form-group" style="display:none;">
                                <label>Alamat</label>
                                <input name="alamat" value="" placeholder="Masukan Alamat" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('alamat');?>

        <div id="divnorumah" class="form-group" style="display:none;">
                                <label>No Rumah</label>
                                <input name="no_rumah" value="" placeholder="Masukan No Rumah" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('no_rumah');?> 

        <div id="divphone" class="form-group" style="display:none;">
                                <label>No Hp</label>
                                <input name="phone" value="" placeholder="Masukan No HP" class="form-control">
                                <p class="help-block"></p>
                            </div>
                            <?php echo form_error('phone');?> -->


              <div class="box-footer">
                  <button type="submit" name="Submit" value="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>&nbsp;
                  <a href="<?php echo base_url('admin/member');?>" class="btn btn-warning">Kembali</a>
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
<!-- /.content-wrapper -->

