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
      <div class="box-body table-responsive">
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
    <div class="box-body table-responsive">
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
      <div class="box-body table-responsive">
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


<!-- main Content -->
<section class="content">
  <h3>
    Pemetaan Gap
  </h3>
  <!-- Aspek dan Bobot Penilaian -->

  <?php foreach($aspek as $row) :?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pemetaan untuk Aspek <?= $row->nama_aspek?></h3>
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="30">No</th>
              <th>NIK</th>
              <th>Nama</th>
              <?php foreach($faktor as $fak) : ?>
                <?php if($row->kode_aspek == $fak->kode_aspek) :?>

                  <th width="80"><?= $fak->kode_faktor?></th>

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
              <td><?= "(".$nilai->nilai_faktor . "-".get_nilai_faktor_asli($nilai->kode_faktor) .") = ".($nilai->nilai_faktor-get_nilai_faktor_asli($nilai->kode_faktor)) ?></td>
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

<!-- simpan nilai faktor, gap, dan bobot ke dalam array -->
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
?>
<!-- end simpan nilai faktor, gap, dan bobot ke dalam array -->

<!-- main Content -->
<section class="content">

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Kaidah Pembobotan</h3>
      <div class="pull-right box-tools">
        <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example3" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="30">No</th>
            <th>Selisih</th>
            <th>Bobot Nilai</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=0; foreach ($pembobotan as $key => $value ): $i++;?>
          <tr>
            <th scope="row"><?= $i ;?></th>
            <td><?= $key ?></td>
            <td><?= $value ?></td>
            <td>
              <?php 
              if($key == 0) echo 'Tidak ada selisih (profil sesuai dengan kriteria)';
              elseif($key > 0) echo 'Profil kelebihan '.$key. ' tingkat';
              elseif($key < 0) echo 'Profil kekurangan '.(-$key). ' tingkat';
              ?>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /. Aspek dan Bobot Penilaian -->

</section>
<!-- /.content -->

<!-- main Content -->
<section class="content">
  <h3>
    Pembobotan
  </h3>
  <!-- Aspek dan Bobot Penilaian -->

  <?php foreach($aspek as $row) :?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pembobotan untuk Aspek <?= $row->nama_aspek?></h3>
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="30">No</th>
              <th>NIK</th>
              <th>Nama</th>
              <?php foreach($faktor as $fak) : ?>
                <?php if($row->kode_aspek == $fak->kode_aspek) :?>

                  <th width="80"><?php echo $fak->kode_faktor .' ('.$fak->jenis_faktor.')' ?></th>

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
              <td><?php echo $bobot[$nilai->id_kandidat][$nilai->kode_faktor] ?></td>
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

<!-- main Content -->
<section class="content">
  <h3>
    Perhitungan Nilai Akhir
  </h3>
  <!-- Aspek dan Bobot Penilaian -->

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Perhitungan Nilai Akhir</h3>
      <div class="pull-right box-tools">
        <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example4" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="30">No</th>
            <th>NIK</th>
            <th>Nama</th>
            <?php foreach($aspek as $asp) : ?>
              <th><?= $asp->nama_aspek 
              . '<br>'
              . 'BCF='.$asp->bobot_cf.'%, '
              . 'BSF='.$asp->bobot_sf.'%' ?></th>
            <?php endforeach;?>
            <th>Total<br>
              <?php foreach($aspek as $asp) : ?>
                <?= $asp->kode_aspek 
                . '='.$asp->bobot.'% ' ?>
              <?php endforeach;?>
            </th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $hitung = array();
          $sql = "SELECT k.*, s.nama_pegawai from kandidat as k, pegawai as s 
          WHERE s.nik = k.nik 
          order by id_kandidat asc"; 
          $no = 1;
          foreach($this->db->query($sql)->result_array() as $data) {
            $tnilai = 0;
            $temp = array();

            $sqla = "SELECT * from aspek order by kode_aspek asc"; 
            echo '<tr>';
            echo '<td>'.$no++.'</td>';
            echo '<td>'.$data['nik'].'</td>';
            echo '<td>'.$data['nama_pegawai'].'</td>';
            foreach($this->db->query($sqla)->result_array() as $dataa) {  
              echo '<td>';
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
              echo "CF = (".implode('+', $scf).")/".$jcf." = ".$rcf."<br>";
              echo "SF = (".implode('+', $ssf).")/".$jsf." = ".$rsf."<br>";
              $tbobot = (($dataa['bobot_cf']/100) * $rcf) + (($dataa['bobot_sf']/100)*$rsf);
              echo "NT = (".($dataa['bobot_cf']/100) ."x". $rcf .") + ( ". ($dataa['bobot_sf']/100) ."x" . $rsf .")<br>";
              echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;= <b>". $tbobot.'</b>';
              $tnilai += ($dataa['bobot']/100)*$tbobot;
              $hitung[$data['id_kandidat']][$dataa['kode_aspek']] = array('scf' => $scf, 'ssf' => $ssf, 'jcf' => $jcf, 'jsf' => $jsf, 'rcf' => $rcf, 'rsf' => $rsf);
              echo '</td>';
              $temp[] = '('.($dataa['bobot']/100).'x'.$tbobot.')';

            }
            echo '<td>';
            echo implode('+', $temp);
            echo '<br>= <b>'.$tnilai .'</b>';
            echo '</td>';
            echo '<td>
            <form action="'. base_url('manual/updateNilai/').$data['id_kandidat'].'" method="post" >
            <input type="hidden" readonly value="'.$tnilai.'" name="nilai_akhir" class="form-control" >
            <button type="submit" class="btn btn-sm btn-warning">Update</button>
            </form>
            </td>
            ';
            echo '</tr>';
          }
          ?>

          <!-- end perhitungan nilai akhir -->   
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /. Aspek dan Bobot Penilaian -->

</section>
<!-- /.content -->

