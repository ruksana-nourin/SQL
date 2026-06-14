<?php
require_once("models/user.class.php");
require_once("models/role.class.php");

$roles = Role::readAll();
// echo '<pre>';
// print_r($roles);
// echo '</pre>';

if (isset($_POST["btn_submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $role_id = $_POST["role_id"];
  $password = $_POST["pass"];
  $confirm_password = $_POST["conf_pass"];

  // echo $name."".$email."".$role_id."".$password."".$confirm_password."";

  if ($password == $confirm_password) {
    $msg = "password match";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $user = new User(null, $name, $email, $role_id, $password);
    $res = $user->create();
    
      
    if ($res === true) {
      $msg = "User created successfully";
      // header("Location: manage.php ");

    } else {
      $msg = $res;
    }
  } else {
    $msg = "password does not match";
  }

}
?>

<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0"> Create User</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
          </ol>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->
  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      <a href="users" class="btn btn-sm btn-primary">&leftarrow; Back</a>
      <!--begin::Row-->
      <div class="col-md-6">
        <h3><?= $msg ?? ""; ?></h3>
        <div class="card card-primary card-outline mb-4">
          <div class="card-header">
            <div class="card-title">Quick Example</div>
          </div>
          <form method="POST">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">

              </div>

              <div class="mb-3">
                <label>Role</label>
                <select class="form-control" name="role_id" id="">
                  <?php foreach($roles as $item){?>
                  <option value="<?= $item['id'];?>"><?= $item['name'];?></option>
                  <?php } ?>
                </select>

              </div>

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
                <input type="password" class="form-control" name="conf_pass">
                
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</main>
<!--end::App Main-->