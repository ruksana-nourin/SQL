<?php
require_once("models/user.class.php");
require_once("models/role.class.php");

$roles = Role::readAll();
if (isset($_GET["id"])) {
  $row = User::readById($_GET["id"]);
  // echo '<pre>';
  // print_r($item);
  // echo '</pre>';
} else {
  echo "<script>window.location='users';</script>";
}
// echo '<pre>';
// print_r($roles);
// echo '</pre>';

if (isset($_POST["btn_submit"])) {

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $role_id = $_POST["role_id"];

  // echo $name."".$email."".$role_id."";
  $user = new User($id, $name, $email, $role_id);
  $user->update();

  

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
          <h3 class="mb-0"> Edit User</h3>
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
            <input type="hidden" value="<?=$row['id'];?>" name="id">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?= $row['name'] ?>">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                  value="<?= $row['email'] ?>">

              </div>

              <div class="mb-3">
                <label>Role</label>
                <select class="form-control" name="role_id" id="">
                  <?php foreach ($roles as $item) {
                    $selected = $item['id'] == $row['role_id'] ? 'selected' : '';
                    ?>
                    <option value="<?= $item['id']; ?>" <?= $selected; ?>><?= $item['name']; ?></option>
                  <?php } ?>
                </select>

              </div>


            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="btn_submit">Update</button>
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