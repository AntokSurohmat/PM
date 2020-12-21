  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('admin/kandidat')?>"><?= $page ;?></a></li>
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

  <!-- Main content -->
  <section class="content">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Kandidat Calon Pegawai</h3>
        <div class="box-tools pull-right">
          <a class="btn bg-teal btn-sm" href="<?= base_url('admin/kandidatAdd')?>"><i class="fa fa-plus"> Add Data</i></a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th rowspan="2">No</th>
              <th rowspan="2">NIK</th>
              <th rowspan="2">Nama Pegawai</th>
              <?php foreach($aspek as $row) : ?>
                <th colspan="<?= get_jumlah_faktor($row->kode_aspek) ;?>"><?= $row->nama_aspek ;?></th>
              <?php endforeach; ?>
              <th rowspan="2" width="67">Aksi</th>
            </tr>
            <tr>
              <?php $sqlfak ="SELECT * FROM faktor ORDER BY kode_aspek, kode_faktor ASC"; ?>
              <?php foreach($this->db->query($sqlfak)->result() as $row) : ?>
              <th width="30"><?= $row->kode_faktor ?></th>
            <?php endforeach;?>
          </tr>
        </thead>
        <tbody>
          <?php 
          $sql ="SELECT a.*, s.nama_pegawai from kandidat as a, pegawai as s where s.nik = a.nik order by id_kandidat asc "; 
          ?>
          <?php $i=0; foreach ($this->db->query($sql)->result() as $data) :  $i++;?>
          <tr>
            <th scope="row"><?= $i ;?></th>
            <td><?= $data->nik; ?></td>
            <td><?= $data->nama_pegawai; ?></td>
            <?php
            
            $sqldet = "SELECT *
            from detail_kandidat 
            WHERE id_kandidat = '$data->id_kandidat'
            order by kode_faktor asc";

            ?>
            <?php foreach( $this->db->query($sqldet)->result() as $datadet): ?>
            <td><?= $datadet->nilai_faktor ?></td> 
          <?php endforeach ?>   

          <td>
            <a class="btn btn-xs btn-warning" href="<?= base_url('admin/kandidatEdit/').$this->encrypt->encode($data->id_kandidat).''?>" title="Edit"><i class="fa fa-edit"></i></a>
            <a class="btn btn-xs btn-danger" href="#" data-toggle="modal" data-target="#deleteModalKandidat<?= $data->id_kandidat?>" title="Hapus"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->

<!-- Barang Hapus Modal-->
<?php $i=0; foreach($kandidat as $row) :  $i++;?>
<!-- Logout Modal-->
<div class="modal fade" id="deleteModalKandidat<?= $row->id_kandidat?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Apakah Anda Ingin Menghapus "<?= $row->nama_pegawai?>"</h4>
        </div>
        <div class="modal-body">
          <p>Pilih "Hapus" dibawah untuk menghapus <b><?= $row->nama_pegawai;?></b>.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left " data-dismiss="modal">Close</button>
          <a class="btn btn-danger " href="<?php echo base_url('admin/kandidatDelete/'.$this->encrypt->encode($row->id_kandidat).'')?>">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach; ?>

</section>
<!-- /.content -->
