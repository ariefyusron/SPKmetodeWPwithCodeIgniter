<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Login</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <?= form_open('ceklogin') ?>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Email or Username" name="email" required autofocus/>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" required/>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-9">
            <?= $notif ?>
          </div>
          <div class="col-xs-3 pull-right">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
          </div><!-- /.col -->
        </div>
      </form>
  </div><!-- /.box-body -->
  <div class="box-footer">
      <a href="#">I forgot my password</a><br>
      <a href="<?= base_url('daftar') ?>" class="text-center">Register a new membership</a>
  </div>
</div><!-- /.box -->