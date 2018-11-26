<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Daftar</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <?= form_open('buatakun') ?>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email" required autofocus/>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" required/>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" required/>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="passwordlagi" placeholder="Password Lagi" required/>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-9">
            <?= $notif ?>
          </div>
          <div class="col-xs-3 pull-right">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
          </div><!-- /.col -->
        </div>
      </form>
  </div><!-- /.box-body -->
  <div class="box-footer">
      <a href="#">I forgot my password</a><br>
      <a href="<?= base_url() ?>" class="text-center">Already membership?</a>
  </div>
</div><!-- /.box -->