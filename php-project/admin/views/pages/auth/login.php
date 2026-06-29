<?php
if (isset($_SESSION['id'])) {
  header("Location: dashboard ");

}
require_once 'models/auth.class.php';

if (isset($_POST["email"]) && isset($_POST["pass"])) {
  $email = $_POST["email"];
  $password = $_POST["pass"];
  // echo $email."".$password."";
  $auth = Auth::login($email, $password);
  // print_r($auth);
  if (isset($auth['error'])) {
    $msg = $auth['error'];
  } else {
    // print_r($auth);
    $_SESSION['id'] = $auth['id'];
    $_SESSION['role_id'] = $auth['role_id'];
    header("Location: dashboard ");
  }

}
?>

<style>
  .main-sidebar,
  .main-header,
  .main-footer {
    display: none;
  }
</style>

<div class="login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../index2.html"><b>E</b>COM</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="admin@example.com" >
            <div class="input-group-text">
              <span class="bi bi-envelope"></span>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pass" class="form-control" placeholder="Password" aria-label="Password" value="111">
            <div class="input-group-text">
              <span class="bi bi-lock-fill"></span>
            </div>
          </div>
          <p class="text-danger text-center font-weight-bold mb-1"><?= $msg ?? "" ?></p>
          <!--begin::Row-->
          <div class="row">
            <div class="col-8">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </form>

        <div class="social-auth-links text-center mb-3 d-grid gap-2">
          <p>- OR -</p>
          <a href="#" class="btn btn-primary w-100 mb-2">
            <i class="bi bi-facebook me-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-danger w-100">
            <i class="bi bi-google me-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center"> Register a new membership </a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

</div>