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
      <li class="active"><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-users"></i> <span>Kelola Members</span></a></li>
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
            <h3 class="box-title">Update Data Member</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            

             
              
              
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Data Member
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <div class='box-header with-border'>
                                        <?php echo form_open('admin/changeData/'.$list_member->id);?>


                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="disabledSelect">Id Member</label>
                                                <input class="form-control" name="id" value="<?php echo $list_member->id?>" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                                            </div>
                                            <?php echo form_error('id');?>

                                            <div class="form-group">
                                                <label for="example">Username</label>
                                                <input type="text" name="username" value="<?php echo $list_member->username; ?>" class="form-control" required oninvalid="setCustomValidity('Username Harus di Isi !')"
                                                       oninput="setCustomValidity('')" placeholder="Ubah Username Member" >
                                                       <?php echo form_error('username', '<div class="text-red">', '</div>'); ?>
                                            </div>
                                            <?php echo form_error('username');?>
                                   
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" value="<?php echo $list_member->email ?>" type="email" placeholder="Ubah Email" class="form-control">
                                                <p class="help-block"></p>
                                            </div>
                                            <?php echo form_error('email');?>   

                                            <div class="form-group">
                                                <label>Nama Depan</label>
                                                <input name="first_name" value="<?php echo $list_member->first_name ?>" type="text" placeholder="Ubah Nama Depan" class="form-control">
                                                <p class="help-block"></p>
                                            </div>
                                            <?php echo form_error('first_name');?> 

                                            <div class="form-group">
                                                <label>Nama Belakang</label>
                                                <input name="last_name" value="<?php echo $list_member->last_name ?>" type="text" placeholder="Ubah Nama Belakang" class="form-control">
                                                <p class="help-block"></p>
                                            </div>
                                            <?php echo form_error('last_name');?>

                                             <div class="form-group">
                                                <label>No Handphone</label>
                                                <input name="phone" value="<?php echo $list_member->phone ?>" type="number" placeholder="Ubah No Handphone" class="form-control">
                                                <p class="help-block"></p>
                                            </div>
                                            <?php echo form_error('phone');?>

                                            <div class="box-footer">
                                                 <button type="submit" name="Submit" value="submit" class="btn btn-success"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                                                <a href="<?php echo site_url('admin/member'); ?>" class="btn btn btn-warning">Kembali</a>
                                            </div>
                                        </div>
                                    </form>
                                </table>     
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Password
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <div class='box-header with-border'>
                                    <?php echo form_open('admin/memberChangePassword/'.$list_member->id);?>

                                            <div class="form-group">
                                                    <label>Password</label>
                                                    <input name="password" value="" type="password" placeholder="password" class="form-control">
                                                    <p class="help-block"></p>
                                            </div>
                                            <?php echo form_error('password');?> 
                                            <div class="form-group">
                                                    <label>Retype Password</label>
                                                    <input name="r_password" value="" type="password" placeholder="password" class="form-control">
                                                    <p class="help-block"></p>
                                            </div>
                                            <?php echo form_error('r_password');?>
                                            <div class="box-footer">
                                                <button type="submit" name="Submit" class="btn btn-success"><i class="glyphicon glyphicon-hdd"></i> Ubah</button>
                                            </div>         
                                        </div>
                                    </form>
                                    </div>
                                </table>   
                            </div>
                        </div>
                    </div>
                </div>
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

