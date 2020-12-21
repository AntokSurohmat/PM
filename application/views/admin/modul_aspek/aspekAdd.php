<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $page?>
  </h1>
  <ol class="breadcrumb">
    <li>PM</li>
    <li><a href="<?= base_url('admin/aspek')?>"><?= $parent ;?></a></li>
    <li><a href="<?= base_url('admin/aspekAdd')?>"><?= $page ;?></a></li>
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
          <h3 class="box-title">Add Aspek</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">


          <form class="form-horizontal" action="<?= base_url('admin/aspekAdd')?>" method="post" role="form" >

            <div class="form-group">
              <label for="addInputKode" class="col-sm-2 control-label">Kode Aspek</label>
              <div class="col-sm-10">
                <input type="text" name="kode_aspek" class="form-control" id="addInputKode" readonly placeholder="Kode Aspek" value="<?= kode_otomatisAspek() ?>">
                <?php echo form_error('kode_aspek', '<small class="text-danger pl-3">', '</small>');?>
              </div>
            </div>
            <div class="form-group">
              <label for="addInputNama" class="col-sm-2 control-label">Nama Aspek</label>
              <div class="col-sm-10">
                <input type="text" name="nama_aspek" class="form-control" id="addInputNama" placeholder="Nama Aspek" value="<?= set_value('nama_aspek')?>">
                <?php echo form_error('nama_aspek', '<small class="text-danger pl-3">', '</small>');?>
              </div>
            </div>
            <div class="form-group">
              <label for="addInputbobot" class="col-sm-2 control-label">Bobot</label>
              <div class="col-sm-10">
                <input type="text" name="bobot" class="form-control" id="addInputbobot" placeholder="Bobot" value="<?= set_value('bobot')?>">
                <?php echo form_error('bobot', '<small class="text-danger pl-3">', '</small>');?>
              </div>
            </div>
            <div class="form-group">
              <label for="addInputBCF" class="col-sm-2 control-label">Bobot Core Factor</label>
              <div class="col-sm-10">
                <input type="text" name="bcf" class="form-control" id="addInputBCF" placeholder="Bobot Core Factor" value="<?= set_value('bcf')?>">
                <?php echo form_error('bcf', '<small class="text-danger pl-3">', '</small>');?>
              </div>
            </div>
            <div class="form-group">
              <label for="addInputBSF" class="col-sm-2 control-label">Bobot Secondary Factor</label>
              <div class="col-sm-10">
                <input type="text" name="bsf" class="form-control" id="addInputBSF" placeholder="Bobot Secondary Factor" value="<?= set_value('bsf')?>">
                <?php echo form_error('bsf', '<small class="text-danger pl-3">', '</small>');?>
              </div>
            </div>
            <div class="box-footer justify-content-between">
              <a type="button" class="btn btn-warning" href="<?= base_url('admin/aspek')?>">Batal</a>
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
