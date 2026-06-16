<?php
require_once("models/product.class.php");

$rows = Product::readAll();
// echo '<pre>';
// print_r( $rows );
// echo '</pre>';
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

          <h3 style="color: red;"><?= $msg ?? ""; ?></h3>
          <!-- <div class="alert alert-danger" role="alert">
          </div> -->

          <h3 class="mb-0">Products</h3>
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
      <!--begin::Row-->
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header">
              <a class="btn btn-sm btn-primary" href="create-product">Create new products</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Brand</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($rows as $item): ?>
                      <tr>
                        <td><?= $item['id'];?></td>
                        <td><?= $item['name'];?></td>
                        <td>
                          <img src="<?= BASE_URL_ADMIN . $item['image'];?>" alt="" width="50">
                        </td>
                        <td><?= $item['price'];?></td>
                        <td><?= $item['quantity'];?></td>
                        <td><?= $item['brand'];?></td>
                        <td><?= $item['category'];?></td>
                        <td><?= $item['active']==1? 'Active': 'Inactive';?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default"> <i
                                class="fa fa-eye text-dark"></i></button>
                            <a href="edit-user?id=<?= $item['id'] ?>" class="btn btn-sm btn-default"> <i
                                class="fa fa-edit text-success"></i></a>
                            <form action="" method="POST">
                              <input type="hidden" name="delete_id" value="<?= $item['id'] ?>">
                              <button type="submit" class="btn btn-sm btn-default"> <i
                                  class="fa fa-trash text-danger"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>

                </table>
              </div>
            </div>
            <!-- /.card-body -->

          </div>



        </div>
        <!--end::Row-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->