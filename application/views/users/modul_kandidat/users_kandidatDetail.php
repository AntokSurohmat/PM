  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('users/kandidat')?>"><?= $parent ;?></a></li>
      <li><a href="<?= base_url('users/kandidatDetail/').$this->encrypt->encode($onekandidat->id_kandidat).''?>"><?= $page ;?></a></li>
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
            <h3 class="box-title"><?= $page?></h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body">


            <form class="form-horizontal" action="#" method="post" role="form" >

              <input type="hidden" name="zz" readonly value="<?= $onekandidat->id_kandidat ?>" />
              <div class="form-group">
                <label for="editInputNama" class="col-sm-4 control-label">Nama Pegawai</label>
                <div class="col-sm-8">
                  <select class="form-control select2" id="editInputNama" name="nik" disabled>
                    <?php foreach($pegawai as $row) :?>
                      <?php if($row->nik == $onekandidat->nik) :?>
                        <option value="<?= $row->nik?>" selected><?= $row->nama_pegawai;?></option>
                        <?php else :?>
                          <option value="<?= $row->nik?>"><?= $row->nama_pegawai?></option>
                        <?php endif;?>
                      <?php endforeach;?>
                    </select>
                    <?php echo form_error('nik', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>

                <?php foreach($faktor as $fak) :?>

                  <div class="form-group">
                    <label class="col-sm-4 control-label"><?= $fak->kode_faktor?>  -  <?= $fak->nama_faktor?></label>
                    <div class="col-sm-8">
                      <select class="form-control select2" name="faktor[<?= $fak->kode_faktor?>]" disabled>
                        <option>-- Pilih --</option>
                        <?php foreach($skala as $key => $value) : ?>
                          <?php $sel = ($key == get_nilai_faktor($fak->kode_faktor, $onekandidat->id_kandidat)) ? ' selected' : '' ?>
                          <option value="<?php echo $key ?>" <?php echo $sel ?>><?php echo $value .' ('.$key.')' ?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                <?php endforeach;?>

                <div class="box-footer justify-content-between">
                  <a type="button" class="btn btn-default" href="<?= base_url('users/kandidat')?>">Back</a>
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