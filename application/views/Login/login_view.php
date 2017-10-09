<div class="login-box">
  <div class="login-logo">
    <b>Questronix</b> <br/>Online Examination
  </div>
  <div class="login-box-body">
    <?php session_destroy(); echo validation_errors(); ?>
    <form class="login-form" method="POST" action="<?= site_url('login')?>">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In"></input>
        </div>
      </div>
    </div>
  </form>

</div>