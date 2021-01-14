  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('admin/faktor')?>"><?= $parent ;?></a></li>
      <li><a href="<?= base_url('admin/faktorEdit/').$this->encrypt->encode($onepekerja->id_pekerja).''?>"><?= $page ;?></a></li>
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
      <div class="col-md-2">
      </div>

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
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaTanggalLahir" placeholder="Tanggal Lahir" value="<?= $onepekerja->tanggal_lahir?>" readonly>
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
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaDiTerima" placeholder="Tanggal di Terima" value="<?= $onepekerja->tgl_diterima?>" readonly>
                </div>
              </div>
              <hr>
<!--               <?php 
              $query = "SELECT faktor->>'$.kode_faktor' as fkode, faktor->>'$.nilai_faktor' as fnilai FROM pekerja WHERE id_pekerja = '$onepekerja->id_pekerja'";
              $faktors = array();
              // $datas = array();
              // $query = "SELECT nik,faktor->>'$.kode_faktor' as fkode FROM pekerja WHERE id_pekerja = '$onepekerja->id_pekerja'";

              // while ($faktor = $this->db->query($query)->result()) {
              //   $faktors = $faktor;
              // }
              // while ($data = $this->db->query($query)->row()) {
              //   $faktors[] = $data;
              // }
              // $json_format = json_encode($datas);
              // echo $json_format;

              foreach ($this->db->query($query)->row() as $key) {
                $faktors[] = $key;
              }
              // $faktors = $this->db->query($query)->result_array();
              // $fnilai = $this->db->query($query)->result()->fnilai;
              $json_format = json_encode($faktors);
              echo stripslashes($json_format);

              $json_data = json_decode($json_format,true);

              $i=0;
              foreach($json_data as $json){
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$json->nik."</td>";
                echo "<td>".$json['fkode']."</td>";


                echo "</tr>";
              }
              // $json_data = json_decode($json_format,true);
              // echo '<br>';
              // echo $json_data;
              ?> -->
              <?php 

              $sql = "SELECT faktor->>'$.kode_faktor' as fkode, faktor->>'$.nilai_faktor' as fnilai FROM pekerja WHERE id_pekerja = '$onepekerja->id_pekerja'";

              $result = $this->db->query($sql)->row_array();
              // echo $result;
              $jsone = json_encode($result);
              echo $jsone;
              $jsond = json_decode($jsone,true);
              // echo $jsond;
              var_dump($jsond);
              ?>

              <?php foreach($result as $row ): ?>
                <?= $row[0]?>
                <hr>
              <?php endforeach;?>

              <div class="form-group">
                <label for="pekerjaNilaiAkhir" class="col-sm-4 control-label pull-left">Faktor</label>
                <div class="col-sm-8">
                  <input type="text" name="nama_aspek" class="form-control" id="pekerjaNilaiAkhir" placeholder="Nilai Akhir" value="<?= $onepekerja->faktor?>" readonly>
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
                <a type="button" class="btn btn-warning" href="<?= base_url('admin/hasil')?>">Kembali</a>
                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.Col -->

      <div class="col-md-2">
      </div>
    </div>
    <!-- /.row -->
  </section>
<!-- /.content -->