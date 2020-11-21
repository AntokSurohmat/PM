  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('data/faktor')?>"><?= $parent ;?></a></li>
      <li><a href="<?= base_url('data/faktorEdit/').$onefaktor->kode_faktor.''?>"><?= $page ;?></a></li>
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
            <h3 class="box-title">Edit Faktor</h3>
          </div>
          <!-- /.box-header -->

          <div class="box-body">


            <form class="form-horizontal" action="<?= base_url('data/faktorEdit/').$this->encrypt->encode($onefaktor->kode_faktor).''?>" method="post" role="form" >

              <input type="hidden" name="zz" readonly value="<?= $onefaktor->kode_faktor ?>" />
              <div class="form-group">
                <label for="editInputKode" class="col-sm-2 control-label">Kode</label>
                <div class="col-sm-10">
                  <input type="text" name="kode_faktor" class="form-control" id="editInputKode" readonly placeholder="Kode" value="<?= $onefaktor->kode_faktor?>">
                </div>
              </div>
              <div class="form-group">
                <label for="editInputAspek" class="col-sm-2 control-label">Aspek Penilian</label>
                <div class="col-sm-10">
                  <select class="form-control" id="editInputAspek" name="kode_aspek">
                    <option>-- Pilih --</option>
                    <?php foreach ($aspek as $row) :?>
                      <?php if($onefaktor->kode_aspek == $row->kode_aspek) : ?>
                        <option value="<?= $row->kode_aspek?>" selected><?= '[' .$row->kode_aspek. ']' .$row->nama_aspek ?></option>
                        <?php else :?>
                          <option value="<?= $row->kode_aspek?>"><?= '[' .$row->kode_aspek. ']' .$row->nama_aspek ?></option>
                        <?php endif ;?>
                      <?php endforeach ;?>
                    </select>
                    <?php echo form_error('kode_aspek', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="editinputNama" class="col-sm-2 control-label">Nama Faktor Penilaian</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_faktor" class="form-control" id="editinputNama" placeholder="Nama Faktor Penilaian" value="<?= $onefaktor->nama_faktor ?>">
                    <?php echo form_error('nama_faktor', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="editinputJenisFactor" class="col-sm-2 control-label">Jenis Faktor Penilaian</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="jenis_faktor" id="editinputJenisFactor">
                      <option value="" <?= ($onefaktor->jenis_faktor == "") ? ' selected' : '' ?>>-- Pilih --</option>
                      <option value="CF" <?= ($onefaktor->jenis_faktor == "CF") ? ' selected' : '' ?>>Core Factor (CF)</option>
                      <option value="SF" <?= ($onefaktor->jenis_faktor == "SF") ? ' selected' : '' ?>>Secondary Factor (SF)</option>
                    </select>
                    <?php echo form_error('jenis_faktor', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="editInputNilaiTar" class="col-sm-2 control-label">Nilai Target</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="nilai_target" id="editInputNilaiTar">
                      <option value="" <?= ($onefaktor->nilai_target == "") ? ' selected' : '' ?>>-- Pilih --</option>
                      <option value="1" <?= ($onefaktor->nilai_target == "1") ? ' selected' : '' ?>>1 - Sangat Tidak Baik</option>
                      <option value="2" <?= ($onefaktor->nilai_target == "2") ? ' selected' : '' ?>>2 - Tidak Baik</option>
                      <option value="3" <?= ($onefaktor->nilai_target == "3") ? ' selected' : '' ?>>3 - Cukup</option>
                      <option value="4" <?= ($onefaktor->nilai_target == "4") ? ' selected' : '' ?>>4 - Baik</option>
                      <option value="5" <?= ($onefaktor->nilai_target == "5") ? ' selected' : '' ?>>5 - Sangat Baik</option>
                    </select>
                    <?php echo form_error('nilai_target', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <div class="box-footer justify-content-between">
                  <a type="button" class="btn btn-warning" href="<?= base_url('data/faktor')?>">Batal</a>
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
