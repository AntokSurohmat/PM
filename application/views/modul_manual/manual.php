  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('kandidat/kandidat')?>"><?= $page ;?></a></li>
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
        <h4><i class="icon fa fa-info"></i> Note:</h4>
        <?= $this->session->flashdata('message'); ?>
      </div>
    <?php endif ;?>
    <?php if($this->session->flashdata('success') == TRUE) : ?>
      <!-- Row Note -->
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check"></i> Note:</h5>
        <?= $this->session->flashdata('success'); ?>
      </div>
    <?php endif ;?> 
  </section>

  <!-- main Content -->
  <section class="content">

    <!-- Aspek dan Bobot Penilaian -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Aspek dan Bobot Penilaian</h3>
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body ">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Aspek</th>
              <th>Aspek Penilaian</th>
              <th>Bobot (%)</th>
              <th>CF (%)</th>
              <th>SF (%)</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($aspek as $row ) : $i++;?>
            <tr>
              <th scope="row"><?= $i ;?></th>
              <th><?= $row->kode_aspek;?></th>
              <th><?= $row->nama_aspek;?></th>
              <th><?= $row->bobot;?></th>
              <th><?= $row->bobot_cf;?></th>
              <th><?= $row->bobot_sf;?></th>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /. Aspek dan Bobot Penilaian -->

  <!-- Faktor dan Nilai Target -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Faktor dan Nilai Target</h3>
      <div class="pull-right box-tools">
        <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body ">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Faktor</th>
            <th>Faktor Penilaian</th>
            <th>Aspek Penilaian</th>
            <th>Jenis Faktor</th>
            <th>Nilai Target</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=0; foreach ($faktor as $row ) : $i++;?>
          <tr>
            <th scope="row"><?= $i ;?></th>
            <th><?= $row->kode_faktor;?></th>
            <th><?= $row->nama_faktor;?></th>
            <?php foreach($aspek as $nama) :?>
              <?php if($row->kode_aspek == $nama->kode_aspek) : ?>
                <th><?= $nama->nama_aspek?></th>
              <?php endif?>
            <?php endforeach;?>
            <th><?= $row->jenis_faktor;?></th>
            <th><?= $row->nilai_target;?></th>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- / .Faktor dan Nilai Target -->
</section>
<!-- /.content -->

<!-- main Content -->
<section class="content">
  <h3>
    Kandidat
  </h3>
  <!-- Aspek dan Bobot Penilaian -->

  <?php foreach($aspek as $row) :?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Nilai untuk Aspek <?= $row->nama_aspek?></h3>
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body ">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="30">No</th>
              <th>NIK</th>
              <th>Nama Pegawai</th>
              <?php foreach($faktor as $fak) : ?>
                <?php if($row->kode_aspek == $fak->kode_aspek) :?>

                  <th width="60"><?= $fak->kode_faktor?></th>

                <?php endif;?>
              <?php endforeach;?>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($kandidat as $kan ) : $i++;?>
            <tr>
              <th scope="row"><?= $i ;?></th>
              <th><?= $kan->nik;?></th>
              <th><?= $kan->nama_pegawai;?></th>
              <?php $query ="SELECT * from detail_kandidat 
              where id_kandidat = '$kan->id_kandidat'
              and kode_faktor in (select kode_faktor from faktor where kode_aspek = '$row->kode_aspek') 
              order by kode_faktor asc"; ?>
              <?php foreach($this->db->query($query)->result() as $nilai) :?>
              <td><?= $nilai->nilai_faktor?></td>
            <?php endforeach;?>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /. Aspek dan Bobot Penilaian -->
<?php endforeach;?>


</section>
<!-- /.content -->


