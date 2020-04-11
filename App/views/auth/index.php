<div class="card mx-auto col-md-3">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk untuk memulai</p>

      <form action="<?=BASEURL?><?=isset($data['admin']) ? "admin" : "home";?>/authentication" method="post">
        <div class="input-group mb-3">
          <input type="text" name="elenka_username" class="form-control" placeholder="<?=isset($data['admin']) ? "Username" : "Nis";?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="elenka_password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?=Flasher::get()?>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </form>
  </div>
  <!-- /.login-card-body -->
  <div class="card-footer bg-transparent">
    <div class="text-center">
      Copyright &copy;Lucver
      <span class="text-bold text-sm text-">HAK MILIK PRIBADI</span>
    </div>
  </div>
</div>