      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $page?>
        </h1>
        <ol class="breadcrumb">
          <li>PM</li>
          <li><a href="<?= base_url('admin/hasil')?>"><?= $page ;?></a></li>
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

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Perhitungan Hasil Akhir Calon Pegawai</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body ">

            <?php 

            $nilai_faktor = array();
            $gap = array();
            $bobot = array();

            $sql = "SELECT * from kandidat 
            order by id_kandidat asc"; 

            foreach($this->db->query($sql)->result_array() as $data) {
              $sqld = "SELECT * from detail_kandidat 
              where id_kandidat = '".$data['id_kandidat']."'
              order by kode_faktor asc";

              $nfaktor = array();       
              $ngap = array();
              $nbobot = array();

              foreach($this->db->query($sqld)->result_array() as $datad) {
                $nfaktor[$datad['kode_faktor']] = $datad['nilai_faktor'];
                $ngap[$datad['kode_faktor']] = ($datad['nilai_faktor'] - get_nilai_faktor_asli($datad['kode_faktor']));
                $nbobot[$datad['kode_faktor']] = $pembobotan[($datad['nilai_faktor'] - get_nilai_faktor_asli($datad['kode_faktor']))];
              }
              $nilai_faktor[$data['id_kandidat']] = $nfaktor;
              $gap[$data['id_kandidat']] = $ngap;
              $bobot[$data['id_kandidat']] = $nbobot;
            } 

            $hitung = array();
            $sql = "SELECT k.*, s.nama_pegawai from kandidat as k, pegawai as s 
            WHERE s.nik = k.nik 
            order by id_kandidat asc"; 
            $no = 1;
            foreach($this->db->query($sql)->result_array() as $data) {
              $tnilai = 0;
              $temp = array();

              $sqla = "SELECT * from aspek order by kode_aspek asc"; 
              foreach($this->db->query($sqla)->result_array() as $dataa) {  
                $tbobot = 0;
                $sqld = "SELECT * from detail_kandidat 
                where id_kandidat = '".$data['id_kandidat']."'
                AND kode_faktor in (select kode_faktor from faktor where kode_aspek = '".$dataa['kode_aspek']."') 
                order by kode_faktor asc";
                $scf = array();
                $ssf = array();
                $jcf = 0;
                $jsf = 0; 
                $rcf = 0;
                $rsf = 0;
                foreach( $this->db->query($sqld)->result_array() as $datad){
                  if(get_tipe_faktor($datad['kode_faktor']) == 'CF') {
                    $scf[] = $bobot[$data['id_kandidat']][$datad['kode_faktor']];
                    $jcf += 1;
                  }
                  else {
                    $ssf[] = $bobot[$data['id_kandidat']][$datad['kode_faktor']];
                    $jsf += 1;
                  }
                }
                $rcf = array_sum($scf)/$jcf;
                $rsf = array_sum($ssf)/$jsf;
                $tbobot = (($dataa['bobot_cf']/100) * $rcf) + (($dataa['bobot_sf']/100)*$rsf);
                $tnilai += ($dataa['bobot']/100)*$tbobot;
                $hitung[$data['id_kandidat']][$dataa['kode_aspek']] = array('scf' => $scf, 'ssf' => $ssf, 'jcf' => $jcf, 'jsf' => $jsf, 'rcf' => $rcf, 'rsf' => $rsf);
                $temp[] = '('.($dataa['bobot']/100).'x'.$tbobot.')';

              }
            }

            ?>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama Pegawai</th>
                  <th>Jenis Kelamin</th>
                  <th>Pendidikan</th>
                  <th>Alamat</th>
                  <th width="100">Hasil Akhir</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0; foreach ($kandidathasil as $kh) :  $i++;?>
                <tr>
                  <th scope="row"><?= $i ;?></th>
                  <td><?= $kh->nik; ?></td>
                  <td><?= $kh->nama_pegawai; ?></td>
                  <td><?= $kh->jenis_kelamin; ?></td>
                  <td><?= $kh->pendidikan; ?></td>
                  <td><?= $kh->alamat; ?></td>
                  <?php if($kh->nilai_akhir == '0') : ?>
                    <td>

                      <form action="<?= base_url('admin/updateNilai/'.$kh->id_kandidat)?>" method="post" >
                        <input type="hidden" readonly value="<?= $tnilai ?>" name="nilai_akhir" class="form-control" >
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                      </form>
                    </td>
                    <td><a class="btn btn-sm btn-danger" href="#" disabled>Terima</a></td>
                    <?php else : ?>
                      <td><?= $kh->nilai_akhir; ?></td>
                      <td><a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#deleteModalPekerja<?= $kh->nik?>">Terima</a></td>
                    <?php endif;?>

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

      <!-- Main content -->
      <section class="content">

        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">List Calon Pegawai Yang Sudah DiTerima</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body ">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama Pegawai</th>
                  <th>Jenis Kelamin</th>
                  <th>Pendidikan</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0; foreach ($allmasuk as $kh) :  $i++;?>
                <tr>
                  <th scope="row"><?= $i ;?></th>
                  <td><?= $kh->nik; ?></td>
                  <td><?= $kh->nama_pekerja; ?></td>
                  <td><?= $kh->jenis_kelamin; ?></td>
                  <td><?= $kh->pendidikan; ?></td>
                  <td>
                    <?php if($kh->kandidat_terima == '1'){
                      echo 'Telah Diterima';
                    }?>
                  </td>
                  <td>
                    <a class="btn btn-xs btn-info" href="<?= base_url('admin/pekerjaTerimaDetail/'.$this->encrypt->encode($kh->id_pekerja))?>" title="Detail"><i class="fa fa-info-circle"></i></a>
                    <a class="btn btn-xs btn-danger" href="#" data-toggle="modal" data-target="#deleteModalPekerja<?= $kh->id_pekerja?>"  title="Delete"><i class="fa fa-trash"></i></a>
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
      <?php $i=0; foreach($kandidathasil as $row) :  $i++;?>
      <!-- Logout Modal-->
      <div class="modal fade" id="deleteModalPekerja<?= $row->nik?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Apakah Anda Ingin Memperkerjakan "<?= $row->nama_pegawai?>"</h4>
              </div>
              <form action="<?= base_url('admin/pekerjaTerima/'.$this->encrypt->encode($row->nik).'')?>" method="post">
                <div class="modal-body">
                  <input type="hidden" value="<?= $row->nik?>" name="zz">

                  <p>Dengan Menekan Tombol "Terima" di bawah, anda akan menjadikan calon pegawai tersebut bekerja dikantor anda!!</b>.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left " data-dismiss="modal">Close</button>
                  <!--               <a class="btn btn-success " href="<?php echo base_url('admin/pekerjaTerima/'.$this->encrypt->encode($row->nik).'')?>">Terima</a> -->
                  <button class="btn btn-sm btn-success" type="submit">Terima</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      <?php endforeach; ?>

      <!-- Barang Hapus Modal-->
      <?php $i=0; foreach($allmasuk as $row) :  $i++;?>
      <!-- Logout Modal-->
      <div class="modal fade" id="deleteModalPekerja<?= $row->id_pekerja?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Apakah Anda Ingin Menghapus "<?= $row->nama_pekerja?>"</h4>
              </div>
              <div class="modal-body">
                <p>Pilih "Hapus" dibawah untuk menghapus Data <b><?= $row->nama_pekerja;?></b>.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left " data-dismiss="modal">Close</button>
                <a class="btn btn-danger " href="<?php echo base_url('admin/pekerjadelete/'.$this->encrypt->encode($row->id_pekerja).'')?>">Delete</a>
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