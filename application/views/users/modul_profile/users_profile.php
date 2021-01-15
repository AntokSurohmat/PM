  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('users/profile')?>"><?= $parent ;?></a></li>
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
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $page?></h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body">


            <form class="form-horizontal" action="<?= base_url('users/profile/')?>" method="post" role="form" >

              <input type="hidden" name="zz" readonly value="<?= $profile->id_administrator ?>" />
              <div class="form-group">
                <label for="editInputNama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_administrator" class="form-control" id="editInputNama" placeholder="Nama" value="<?= $profile->nama_administrator ;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="editInputUsername" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" id="editInputUsername" placeholder="Username" value="<?= $profile->username ;?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="editinputPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" name="password" class="form-control" id="editinputPassword" placeholder="Password">
                  <p class="text-danger"><small><i>Kosongkan Jika Tidak Ingin Mengganti Password</i></small></p>
                </div>
              </div>
              <div class="form-group">
                <label for="addinputAktif" class="col-sm-2 control-label">Aktif</label>
                <div class="col-sm-10">
                  <select class="form-control" name="aktif" id="addinputAktif">
                    <option value="Y" <?= ($profile->aktif == "Y") ? ' selected' : '' ?>>YA</option>
                    <option value="N" <?= ($profile->aktif == "N") ? ' selected' : '' ?>>Tidak</option>
                  </select>
                </div>
              </div>
              <div class="box-footer justify-content-between">
                <button type="submit" class="btn btn-danger pull-right">Update</button>
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

