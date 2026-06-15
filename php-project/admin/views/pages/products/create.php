<?php
require_once("helpers/img-upload-helper.php");
require_once("models/brand.class.php");
require_once("models/category.class.php");
require_once("models/product.class.php");

$brands = Brand::readAll();
$categorirs = Category::readAll();
// echo '<pre>';
// print_r($roles);
// echo '</pre>';

if (isset($_POST["btn_submit"])) {
  $name             = $_POST["name"];
  $category_id      = $_POST["category_id"];
  $brand_id         = $_POST["brand_id"];
  $price            = $_POST["price"];
  $quantity         = $_POST["quantity"];
  $point_of_restock = $_POST["point_of_restock"];
  $active           = isset($_POST["active"]) ? 1 : 0;
  $description      = $_POST["desc"] ?? null;

  // print_r($_FILES["image"]);
  $file = isset($_FILES["image"]) ? $_FILES["image"] : [];
  $image = imgUpload($file);
  // print_r($image);
  if(isset($image["error"])){
    $msg = $image["error"];
  }else{
    $image = $image['success'];
    $product = new Product(null,$name,$category_id,$brand_id,$price,$quantity,$point_of_restock,$active,$image,$description);
    $product->create();
    $msg = "Product Created Successfully";
  }

  // echo $name."". $category_id."".$brand_id."".$price."".$quantity."".$point_of_restock."".$active."".$image."";
  // echo $active;
  // $product = new Product(null,$name,$category_id,$brand_id,$price,$quantity,$point_of_restock,$active,$image =null,$description = null);
  // $product->create();
  // $msg = "Product Created Successfully";
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
          <h3 class="mb-0"> Create products</h3>
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
      <a href="products" class="btn btn-sm btn-primary">&leftarrow; Back</a>
      <!--begin::Row-->
      <div class="col-md-6">
        <h3><?= $msg ?? ""; ?></h3>
        <div class="card card-primary card-outline mb-4">
          <div class="card-header">
            <div class="card-title">Quick Example</div>
          </div>
          <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name">
              </div>


              <div class="mb-3">
                <label>Category</label>
                <select class="form-control" name="category_id" id="">
                  <?php foreach ($categorirs as $item): ?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label>Brand</label>
                <select class="form-control" name="brand_id" id="">
                  <?php foreach ($brands as $item): ?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="shortescription" class="form-label">Short Description</label>
                <input type="text" class="form-control" name="desc">
              </div>
              <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price">
              </div>
              <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity">
              </div>
              <div class="mb-3">
                <label class="form-label">Point of restock</label>
                <input type="number" class="form-control" name="point_of_restock">
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="mb-3">
                <input type="checkbox" name="active" value="0">
                <label class="form-label">Is Active </label>
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