<?php $email = $this->model_app->email($this->session->userdata('user')); ?>

<section class="content-header">
  <h1>
    Keputusan
  </h1>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tabel Pencocokan Kriteria</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Alternatif</th>
              <?php foreach ($kriteria as $key): ?>
                <th><?= $key['id'] ?></th>
              <?php endforeach ?>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($alternatif==NULL): ?>
              <tr>
                <td class="text-center" colspan="<?= 2+count($kriteria)  ?>">Silahkan lengkapi data di halaman <a href="<?= base_url('app') ?>" class="text-black"><u>Data.</u></a></td>
              </tr>
            <?php endif ?>

            <?php foreach ($alternatif as $keys): ?>
              <tr>
                <td><?= $keys['id'] ?></td>
                <?php foreach ($kriteria as $key): ?>
                  <td>
                    <?php 
                      $data_pencocokan = $this->model_app->data_pencocokan_kriteria($email,$keys['id'],$key['id']);
                      echo $data_pencocokan['nilai'];
                    ?>
                  </td>
                <?php endforeach ?>

                <?php $cek_tombol = $this->model_app->untuk_tombol($email,$keys['id']); ?>

                <td width="7%">
                  <?php if ($cek_tombol==0) { ?>
                    <a href="#set<?= $keys['id'] ?>" data-toggle="modal" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil"></i> Set</a>
                  <?php } else { ?>
                    <a href="#edit<?= $keys['id'] ?>" data-toggle="modal" class="btn btn-primary btn-sm" title="edit"><i class="fa fa-pencil"></i> Edit</a>
                  <?php } ?>
                </td>
              </tr>
              
              <!-- set -->
              <!-- Modal -->
              <div class="modal fade" id="set<?= $keys['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Pencocokan</h4>
                          </div>
                          <?= form_open('app/pencocokankriteria') ?>
                              <div class="modal-body">
                                  <?php foreach ($kriteria as $key): ?>
                                    <?php 
                                      $sub_kriteria = $this->model_app->data_sub_kriteria($key['id'],$email);
                                    ?>
                                    <?php if ($sub_kriteria!=NULL): ?>
                                      <input type="text" name="a" value="<?= $keys['id'] ?>" hidden>
                                      <input type="text" name="c[]" value="<?= $key['id'] ?>" hidden>
                                      <div class="form-group">
                                        <label for="<?= $key['id'] ?>"><?= $key['id'] ?></label>
                                        <select name="nilai[]" class="form-control" id="<?= $key['id'] ?>" required>
                                          <option value="">--Pilih--</option>
                                          <?php foreach ($sub_kriteria as $subs_kriteria): ?>
                                            <option value="<?= $subs_kriteria['id'] ?>"><?= $subs_kriteria['deskripsi'] ?> (<?= $subs_kriteria['keterangan'] ?>)</option>
                                          <?php endforeach ?>
                                        </select>
                                      </div>
                                    <?php endif ?>
                                  <?php endforeach ?>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-primary">Tambah</button>
                              </div>
                          </form>
                      </div>
                      <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

              <!-- edit -->
              <!-- Modal -->
              <div class="modal fade" id="edit<?= $keys['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">Pencocokan</h4>
                          </div>
                          <?= form_open('app/editpencocokankriteria') ?>
                              <div class="modal-body">
                                  <?php foreach ($kriteria as $key): ?>
                                    <?php 
                                      $sub_kriteria = $this->model_app->data_sub_kriteria($key['id'],$email);
                                    ?>
                                    <?php if ($sub_kriteria!=NULL): ?>
                                      <input type="text" name="a" value="<?= $keys['id'] ?>" hidden>
                                      <input type="text" name="c[]" value="<?= $key['id'] ?>" hidden>
                                      <div class="form-group">
                                        <label for="<?= $key['id'] ?>"><?= $key['id'] ?></label>
                                        <select name="nilai[]" class="form-control" id="<?= $key['id'] ?>" required>
                                          <option value="">--Pilih--</option>
                                          <?php foreach ($sub_kriteria as $subs_kriteria): ?>
                                            <?php 
                                              $s_option = $this->model_app->untuk_option($email,$keys['id'],$subs_kriteria['kriteria']);
                                            ?>
                                            <option value="<?= $subs_kriteria['id'] ?>" <?php if($subs_kriteria['id']==$s_option['id_nilai']){echo "selected";} ?>><?= $subs_kriteria['deskripsi'] ?> (<?= $subs_kriteria['keterangan'] ?>)</option>
                                          <?php endforeach ?>
                                        </select>
                                      </div>
                                    <?php endif ?>
                                  <?php endforeach ?>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
                      </div>
                      <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            <?php endforeach ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<?php
  $j = 0;
  foreach ($alternatif as $keys){ 
    $s = 1;
    foreach ($kriteria as $key) {
      $pangkat = $this->model_app->pangkat($email,$key['id']);
      if ($pangkat['jenis']=='Cost') {
        $p = -$pangkat['nilai'];
      } else {
        $p = +$pangkat['nilai'];
      }

      $c = $this->model_app->data_pencocokan_kriteria($email,$keys['id'],$key['id']);
      $s *= $c['nilai']**$p;
    }
    $j += $s;
  }
?>

<?php if ($convert==NULL or $alternatif==NULL or $cek_pencocokan==NULL or $j==0) { ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-body text-center" style="height: 200px; padding-top: 90px;">
          isi tabel di atas
        </div>
      </div>
    </div>
  </div>
<?php } else { ?>

<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Convert W</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Kriteria</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($convert as $key): ?>
              <tr>
                <td><?= $key['id'] ?></td>
                <td>
                  <?php 
                    if ($key['jenis']=='Benefit') {
                      echo +$key['nilai'];
                    } else {
                      echo -$key['nilai'];
                    }
                  ?>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Nilai V</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Alternatif</th>
              <th>Nilai V</th>
            </tr>
          </thead>
          <tbody>
            
            <?php foreach ($alternatif as $keys): ?>
              <tr>
                <td><?= $keys['id'] ?></td>
                <td>
                  <?php 
                    $s = 1;
                    foreach ($kriteria as $key) {
                      $pangkat = $this->model_app->pangkat($email,$key['id']);
                      if ($pangkat['jenis']=='Cost') {
                        $p = -$pangkat['nilai'];
                      } else {
                        $p = +$pangkat['nilai'];
                      }

                      $c = $this->model_app->data_pencocokan_kriteria($email,$keys['id'],$key['id']);
                      $s *= $c['nilai']**$p;
                    }
                    $n[] = $s/$j;
                    $id[] = $keys['id'];
                    echo $s/$j;
                  ?>
                </td>
              </tr>
            <?php endforeach ?>
            <?php 
              $i = array_search(max($n), $n);
              $max = $id[$i];
            ?>

          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>

  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Nilai S</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Alternatif</th>
              <th>Nilai S</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($alternatif as $keys): ?>
              <tr>
                <td><?= $keys['id'] ?></td>
                <td>
                  <?php 
                    $s = 1;
                    foreach ($kriteria as $key) {
                      $pangkat = $this->model_app->pangkat($email,$key['id']);
                      if ($pangkat['jenis']=='Cost') {
                        $p = -$pangkat['nilai'];
                      } else {
                        $p = +$pangkat['nilai'];
                      }

                      $c = $this->model_app->data_pencocokan_kriteria($email,$keys['id'],$key['id']);
                      $s *= $c['nilai']**$p;
                    }
                    echo $s;
                  ?>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Hasil Keputusan</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <?php 
          $hasil = $this->model_app->hasil($email,$max);
        ?>
        Hasil perhitungan menggunakan metode WP. Alternatif terbaik adalah <b><?= $hasil['id'] ?></b> yaitu <b><?= $hasil['lokasi'] ?>.</b>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<?php } ?>

</section>