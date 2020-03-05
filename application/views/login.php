<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body class="bg-dark">
  <nav class="navbar navbar-dark bg-dark">
    <div class="row">

      <div class="col-md-6" align="middle">
  <h6><a class="navbar-brand" href="hai">Admin</a></h6>
  </div>
      <div class="col-md-6">
  <a class="navbar-brand" href="#">College Admin</a>
  </div>
  </div>
</nav>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo base_url(); ?>coadmin/first" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputName" class="form-control" placeholder="Name" autofocus="autofocus" name="inputName">
              <label for="inputName">Name</label>
              <p style="color: red"><?php echo form_error('inputName'); ?></p>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword">
              <label for="inputPassword">Password</label>
              <p><?php echo form_error('inputPassword'); ?></p>
            </div>
            <p><?php echo $this->session->flashdata("error"); ?></p>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="login" value="Login"></input>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('admin/register'); ?>">Register an Account</a>
          <a class="d-block small" href="<?php echo base_url('admin/forgotpassword'); ?>">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
