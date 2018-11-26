<section class="content-header">
  <h1>
    Pengaturan
  </h1>
</section>

<!-- Main content -->
<section class="content">

<?= $notif ?>

  <div class="row">

    <div class="col-md-6">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Ganti Password</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <?= form_open('app/gantipassword') ?>
              <div class="form-group">
                <label for="passlama">Password Lama</label>
                <input type="password" id="passlama" name="passlama" placeholder="Masukkan Password Lama" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label for="passbaru">Password Baru</label>
                <input type="password" id="passbaru" name="passbaru" placeholder="Masukkan Password Baru" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="passvbaru">Password Baru Lagi</label>
                <input type="password" id="passvbaru" name="passvbaru" placeholder="Masukkan Password Baru Lagi" class="form-control" required>
              </div>
              <div class="row">
                <div class="col-xs-3 pull-right">
                  <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
                </div><!-- /.col -->
              </div>
            </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>

    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Hapus Akun</h3>
        </div>
        <div class="box-body">
          Jika Anda menhapus akun. Data anda akan dihapus secara permanen. Anda yakin ingin menghapus akun Anda?
          Klik di <a href="#hapusakun" data-toggle="modal">sini</a> jika ya.

          <!-- Modal -->
          <div class="modal fade" id="hapusakun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Hapus Akun?</h4>
                      </div>
                      <?= form_open('app/hapusakun') ?>
                          <div class="modal-body">
                              <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" id="naa" placeholder="Masukkan Password" class="form-control" name="password" required>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Hapus</button>
                          </div>
                      </form>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
      </div>      
    </div>

  </div>

</section>