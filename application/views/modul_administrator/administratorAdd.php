  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('data/dataAdministrator')?>"><?= $parent ;?></a></li>
      <li><a href="<?= base_url('data/dataAdministratorAdd')?>"><?= $page ;?></a></li>
    </ol>
    <?php if(validation_errors()) : ?>
      <!-- Row Note -->
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <?= validation_errors(); ?>
      </div>
    <?php endif ;?>
    <?php if($this->session->flashdata('message') == TRUE) : ?>
      <!-- Row Note -->
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> Alert!</h4>
        <?= $this->session->flashdata('message'); ?>
      </div>
    <?php endif ;?>
    <?php if($this->session->flashdata('success') == TRUE) : ?>
      <!-- Row Note -->
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check"></i> Alert!</h5>
        <?= $this->session->flashdata('success'); ?>
      </div>
    <?php endif ;?> 
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- row -->
    <div class="row ">
      <div class="col-md-1">
      </div>

      <div class="col-md-10">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Add Administrator</h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body">


            <form class="form-horizontal" action="<?= base_url('data/dataAdministratorAdd')?>" method="post" role="form" >

              <div class="form-group">
                <label for="addInputNama" class="col-sm-2 control-label">Nama Administrator</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_administrator" class="form-control" id="addInputNama" placeholder="Nama Administrator" value="<?= set_value('nama_administrator')?>">
                  <?php echo form_error('nama_administrator', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addInputUsername" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" id="addInputUsername" placeholder="Username" value="<?= set_value('username')?>">
                  <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addinputPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="addinputPassword" placeholder="Password">
                  <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                </div>
              </div>
              <div class="form-group">
                <label for="addinputAktif" class="col-sm-2 control-label">Aktif</label>
                <div class="col-sm-10">
                  <select class="form-control" name="aktif" id="addinputAktif">
                    <option value="Y">Ya</option>
                    <option value="N">Tidak</option>
                  </select>
                </div>
              </div>
              <div class="box-footer justify-content-between">
                <a type="button" class="btn btn-warning" href="<?= base_url('data/dataAdministrator')?>">Batal</a>
                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.Col -->

      <div class="col-md-1">
      </div>

    </div>
    <!-- /.row -->
  </section>
<!-- /.content -->