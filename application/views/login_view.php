<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Recruitment</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/AdminLTE.min.css">
  <!--Custom CSS -->
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/custom.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>public/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/sourcesans.css">
</head>
<body class="hold-transition login-page">
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
  <!-- jQuery 3 -->
  <script src="<?=base_url()?>public/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?=base_url()?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?=base_url()?>public/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    });
  </script>
</body>
</html>
