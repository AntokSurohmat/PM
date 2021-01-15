  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('users/hasil')?>"><?= $parent ;?></a></li>
      <li><a href="<?= base_url('users/terimaDetail/').$this->encrypt->encode($onepekerja->id_pekerja).''?>"><?= $page ;?></a></li>
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

      <div class="col-md-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $page?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form class="form-horizontal" action="<?= base_url('admin/kandidatAdd')?>" method="post" role="form" >

              <div class="form-group">
                <label for="pekerjaNik" class="col-sm-4 control-label pull-left">NIK Pekerja</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaNik" placeholder="Nama Pekerja" value="<?= $onepekerja->nik?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="pekerjaNama" class="col-sm-4 control-label pull-left">Nama Pekerja</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaNama" placeholder="Nama Pekerja" value="<?= $onepekerja->nama_pekerja?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="pekerjaTempatLahir" class="col-sm-4 control-label pull-left">Tempat Lahir</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaTempatLahir" placeholder="Tempat Lahir" value="<?= $onepekerja->tempat_lahir?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="pekerjaTanggalLahir" class="col-sm-4 control-label pull-left">Tanggal Lahir</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaTanggalLahir" placeholder="Tanggal Lahir" value="<?= date('d F Y', strtotime($onepekerja->tanggal_lahir))?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="pekerjaJenisKelamin" class="col-sm-4 control-label pull-left">Jenis Kelamin</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaJenisKelamin" placeholder="Jenis Kelamin" value="<?= $onepekerja->jenis_kelamin?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="pekerjaAlamat" class="col-sm-4 control-label pull-left">Alamat</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="pekerjaAlamat" readonly="true"><?= $onepekerja->alamat ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="pekerjaPendidikan" class="col-sm-4 control-label pull-left">Pendidikan</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaPendidikan" placeholder="Pendidikan" value="<?= $onepekerja->pendidikan?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="pekerjaDiTerima" class="col-sm-4 control-label pull-left">Tanggal di Terima</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaDiTerima" placeholder="Tanggal di Terima" value="<?= date('d F Y', strtotime($onepekerja->tgl_diterima)) ?>" readonly>
                </div>
              </div>
              <hr>
<!--               <h3>Example</h3>
              <?php

              $json = 
              '{ "bilangan" : ["a","b"] , "angka" : ["1","2"] }';

              $json_format = json_encode($json);
              echo stripslashes($json_format);

              $hasil = json_decode($json);
              echo "<br>";
              echo "<br>";
              echo "bilangan :" .implode(",", $hasil->bilangan);
              echo "<br>";
              echo "angka :" .implode(",", $hasil->angka);

              ?>
              <hr> -->
              <?php 
              // $result = array();
              $query = "SELECT faktor->>'$.kode_faktor' as fkode, faktor->>'$.nilai_faktor' as fnilai FROM pekerja WHERE id_pekerja = '$onepekerja->id_pekerja' ";

              $result = $this->db->query($query)->row_array();

              $jsone = json_encode($result);
              // echo stripslashes($jsone);
              $jsond = json_decode($jsone,true);
              // echo "<br>";
              // echo "<br>";
              // echo "fKode :". $jsond['fkode'];
              // echo "<br>";
              // echo "fNilai :" . $jsond['fnilai'];

              ?>

              <div class="form-group">
                <label for="pekerjaFaktorKode" class="col-sm-4 control-label pull-left">Faktor Kode</label>
                <div class="col-sm-8">
                  <?= $jsond['fkode']?>
                </div>
              </div>

              <div class="form-group">
                <label for="pekerjaFaktorNilai" class="col-sm-4 control-label pull-left">Faktor Nilai</label>
                <div class="col-sm-8">
                  <?php echo $jsond['fnilai'] ?>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label for="pekerjaNilaiAkhir" class="col-sm-4 control-label pull-left">Nilai Akhir</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaNilaiAkhir" placeholder="Nilai Akhir" value="<?= $onepekerja->nilai_akhir?>" readonly>
                </div>
              </div>

              <div class="box-footer justify-content-between">
                <a type="button" class="btn btn-warning" href="<?= base_url('users/hasil')?>">Kembali</a>
                <!--                 <button type="submit" class="btn btn-primary pull-right">Simpan</button> -->
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.Col -->

      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Keterangan Faktor</h3>
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->

          <div class="box-body">


            <h5 class="text-center"><b>NILAI</b></h5>
            <?php foreach($skala as $key => $value) :?>
              <div class="form-group">
                <label class="col-sm-4 control-label"><?= $key?></label>
                <div class="col-sm-8">
                  <p><?= $value?></p>
                </div>
              </div>
            <?php endforeach;?>

            <div class="form-group col-sm-12">
              <hr>
            </div>
            <h5 class="text-center"><b>KODE</b></h5>
            <?php foreach($faktor as $fak) :?>
              <div class="form-group">
                <label class="col-sm-4 control-label"><?= $fak->kode_faktor?></label>
                <div class="col-sm-8">
                  <p><?= $fak->nama_faktor?></p>
                </div>
              </div>
            <?php endforeach;?>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>

    </div>
    <!-- /.row -->
  </section>
<!-- /.content -->