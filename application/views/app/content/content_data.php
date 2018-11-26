<section class="content-header">
  <h1>
    Data
  </h1>
</section>

<!-- Main content -->
<section class="content">

<?= $notif ?>

  <div class="row">

    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kriteria (W)</h3>
          <div class="box-tools">
            <a href="#kriteria" data-toggle="modal" class="btn btn-default btn-sm">Tambah</a>
            <!-- Modal -->
            <div class="modal fade" id="kriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Tambah Kriteria</h4>
                        </div>
                        <?= form_open('app/tambahkriteria') ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="naa" placeholder="Masukkan Nama Kriteria" class="form-control" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select name="jenis" id="jenis" class="form-control" required>
                                      <option value="">--Pilih--</option>
                                      <option value="Benefit">Benefit</option>
                                      <option value="Cost">Cost</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <input type="text" placeholder="Masukkan Bobot" id="bobot" name="bobot" class="form-control" required>
                                </div>
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
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Kriteria</th>
                <th>Jenis</th>
                <th>Bobot</th>
                <th colspan="2" class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>

              <?php if ($kriteria==NULL): ?>
                <tr>
                  <td colspan="6" class="text-center">Kosong</td>
                </tr>
              <?php endif ?>

              <?php foreach ($kriteria as $key): ?>
                <tr>
                  <td><?= $key['id'] ?></td>
                  <td><?= $key['nama'] ?></td>
                  <td><?= $key['jenis'] ?></td>
                  <td><?= $key['bobot'] ?></td>
                  <td><a href="#editw<?= $key['id'] ?>" data-toggle="modal" title="edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a></td>
                  <td><a href="<?= base_url('app/hapuskriteria/'.$key['id']) ?>" title="hapus" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kriteria ini?');"><i class="fa fa-trash"></i> Hapus</a></td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="editw<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Edit <?= $key['id'] ?></h4>
                            </div>
                            <?= form_open('app/editkriteria/'.$key['id']) ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="naa" placeholder="Masukkan Nama Kriteria" class="form-control" name="nama" value="<?= $key['nama'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis">Jenis</label>
                                        <select name="jenis" id="jenis" class="form-control" required>
                                          <option value="">--Pilih--</option>
                                          <option value="Benefit" <?php if($key['jenis']=='Benefit'){echo "selected";} ?>>Benefit</option>
                                          <option value="Cost" <?php if($key['jenis']=='Cost'){echo "selected";} ?>>Cost</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bobot">Bobot</label>
                                        <input type="text" placeholder="Masukkan Bobot" id="bobot" name="bobot" class="form-control" value="<?= $key['bobot'] ?>" required>
                                    </div>
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
              <?php endforeach ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Alternatif</h3>
          <div class="box-tools">
            <a href="#alternatif" data-toggle="modal" class="btn btn-default btn-sm">Tambah</a>
            <!-- Modal -->
            <div class="modal fade" id="alternatif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Tambah Alternatif</h4>
                        </div>
                        <?= form_open('app/tambahalternatif') ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" id="lokasi" placeholder="Masukkan Lokasi" class="form-control" name="lokasi" required>
                                </div>
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
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Lokasi</th>
                <th colspan="2" class="text-center" width="10%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              <?php if ($alternatif==NULL): ?>
                <tr>
                  <td colspan="4" class="text-center">Kosong</td>
                </tr>
              <?php endif ?>

              <?php foreach ($alternatif as $key): ?>
                <tr>
                  <td><?= $key['id'] ?></td>
                  <td><?= $key['lokasi'] ?></td>
                  <td><a href="#edita<?= $key['id'] ?>" data-toggle="modal" title="edit" class="btn btn-primary btn-sm""><i class="fa fa-pencil"></i> Edit</a></td>
                  <td><a href="<?= base_url('app/hapusalternatif/'.$key['id']) ?>" title="hapus" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus alternatif ini?');"><i class="fa fa-trash"></i> Hapus</a></td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="edita<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Edit <?= $key['id'] ?></h4>
                            </div>
                            <?= form_open('app/editalternatif/'.$key['id']) ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="lokasi">Lokasi</label>
                                        <input type="text" id="lokasi" placeholder="Masukkan Lokasi" class="form-control" name="lokasi" value="<?= $key['lokasi'] ?>" required>
                                    </div>
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
              <?php endforeach ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>

    <div class="col-md-6">
      
      <?php if ($kriteria==NULL): ?>
        <div class="box box-solid">
          <div class="box-body text-center" style="height: 200px; padding-top: 90px;">
            Kosong
          </div>
        </div>
      <?php endif ?>
      
      <?php foreach ($kriteria as $key): ?>
        
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $key['nama']." (".$key['id'].")" ?></h3>
            <div class="box-tools">
              <a href="#<?= $key['id'] ?>" data-toggle="modal" class="btn btn-default btn-sm">Tambah</a>
              <!-- Modal -->
              <div class="modal fade" id="<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel"><?= $key['nama'] ?></h4>
                          </div>
                          <?= form_open('app/tambahsubkriteria') ?>
                              <div class="modal-body">
                                <input type="text" name="id" value="<?= $key['id'] ?>" hidden>
                                  <div class="form-group">
                                      <label for="deskripsi">Deskripsi</label>
                                      <input type="text" id="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" name="deskripsi" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control" id="keterangan" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="nilai">Nilai</label>
                                      <input type="text" placeholder="Masukkan Nilai" id="nilai" name="nilai" class="form-control" required>
                                  </div>
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
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>Deskripsi</th>
                  <th>Keterangan</th>
                  <th>Nilai</th>
                  <th colspan="2" class="text-center" width="10%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $email = $this->model_app->email($this->session->userdata('user'));
                  $sub_kriteria = $this->model_app->data_sub_kriteria($key['id'],$email);
                ?>

                <?php if ($sub_kriteria==NULL): ?>
                  <tr>
                    <td colspan="5" class="text-center">Kosong</td>
                  </tr>
                <?php endif ?>

                <?php foreach ($sub_kriteria as $key): ?>
                  <tr>
                    <td><?= $key['deskripsi'] ?></td>
                    <td><?= $key['keterangan'] ?></td>
                    <td><?= $key['nilai'] ?></td>
                    <td><a href="#editsk<?= $key['id'] ?>" data-toggle="modal" title="edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a></td>
                    <td><a href="<?= base_url('app/hapussubkriteria/'.$key['id']) ?>" title="hapus" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus sub kriteria ini?');"><i class="fa fa-trash"></i> Hapus</a></td>
                  </tr>

                  <!-- Modal -->
                  <div class="modal fade" id="editsk<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel">Edit <?= $key['deskripsi'] ?></h4>
                              </div>
                              <?= form_open('app/editsubkriteria/'.$key['id']) ?>
                                  <div class="modal-body">
                                      <div class="form-group">
                                          <label for="deskripsi">Deskripsi</label>
                                          <input type="text" id="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" value="<?= $key['deskripsi'] ?>" name="deskripsi" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" name="keterangan" placeholder="Masukkan Keterangan" class="form-control" id="keterangan" value="<?= $key['keterangan'] ?>" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="nilai">Nilai</label>
                                          <input type="text" placeholder="Masukkan Nilai" id="nilai" name="nilai" class="form-control" value="<?= $key['nilai'] ?>" required>
                                      </div>
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
                <?php endforeach ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      <?php endforeach ?>

    </div>

  </div>

</section>