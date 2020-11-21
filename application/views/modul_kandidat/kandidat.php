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

  <!-- Main content -->
  <section class="content">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Administrator</h3>
        <div class="box-tools pull-right">
          <a class="btn bg-teal btn-sm" href="<?= base_url('data/dataPegawaiAdd')?>"><i class="fa fa-plus"> Add Data</i></a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body ">
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
          <?php $i=0; foreach ($kandidat as $row) :  $i++;?>
          <tr>
            <th scope="row"><?= $i ;?></th>
            <td><?= $row->nik; ?></td>
            <td><?= $row->nama_pegawai; ?></td>
            <?php foreach($detail as $deta) :?>
              <?php if($row->id_kandidat == $deta->id_kandidat):?>
                <td><?= $deta->nilai_faktor;?></td>
              <?php endif;?>
            <?php endforeach ;?>
            <td>
              <a class="btn btn-xs btn-warning" href="#" title="Edit"><i class="fa fa-edit"></i></a>
              <a class="btn btn-xs btn-danger" href="#" data-toggle="modal" data-target="#deleteModalAdministrator" title="Hapus"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->