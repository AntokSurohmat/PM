  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $page?>
    </h1>
    <ol class="breadcrumb">
      <li>PM</li>
      <li><a href="<?= base_url('users/faktor')?>"><?= $page ;?></a></li>
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
        <h3 class="box-title">Data <?= $page?></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped display nowrap" style="width:100%">
          <thead>
            <tr>
              <th >No</th>
              <th >Kode</th>
              <th >Faktor Penilian</th>
              <th >Aspek Penilaian</th>
              <th >Jenis</th>
              <th >Nilai Target</th>
              <th width="67">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($faktor as $row) :  $i++;?>
            <tr>
              <th scope="row"><?= $i ;?></th>
              <td><?= $row->kode_faktor; ?></td>
              <td><?= $row->nama_faktor; ?></td>
              <td><?= '['.$row->kode_aspek .'] '. $row->nama_faktor ?></td>
              <td><?= $row->jenis_faktor; ?></td>
              <td><?= $row->nilai_target; ?></td>
              <td>
                <a class="btn btn-xs btn-info" href="<?= base_url('users/faktorDetail/').$this->encrypt->encode($row->kode_faktor).'';?>" title="Detail"><i class="fa fa-info-circle"></i></a>
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
  <?php $i=0; foreach($faktor as $row) :  $i++;?>
  <!-- Logout Modal-->
  <div class="modal fade" id="deleteModalFaktor<?= $row->kode_faktor?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-red">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Apakah Anda Ingin Menghapus "<?= $row->nama_faktor?>"</h4>
          </div>
          <div class="modal-body">
            <p>Pilih "Hapus" dibawah untuk menghapus <b><?= $row->nama_faktor;?></b>.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left " data-dismiss="modal">Close</button>
            <a class="btn btn-danger " href="<?php echo base_url('admin/faktorDelete/'.$this->encrypt->encode($row->kode_faktor).'')?>">Delete</a>
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
