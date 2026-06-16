<?php
require_once("models/product.class.php");

$rows = Product::readAll();
// echo '<pre>';
// print_r( $rows );
// echo '</pre>';
?>
<style>
    .app-sidebar,
    .app-header,
    .app-footer {
        display: none;
    }
</style>

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

                    <h3 class="mb-0">POS</h3>
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
                            <di class=" col-8">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="row">
                                            <?php
                                            foreach ($rows as $item):
                                                if ($item['active'] == 0) {
                                                    continue;
                                                }
                                                ?>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="card" style="cursor: pointer"
                                                        onclick="addToCart(<?= $item['id']; ?>,'<?= $item['name']; ?>',<?= $item['price']; ?>)">
                                                        <img src="<?= BASE_URL_ADMIN . $item['image']; ?>" alt=""
                                                            height="300" class="card-img p-3">
                                                        <div class="card-body text-center">
                                                            <h6><?= $item['name']; ?></h6>
                                                            <h5 class="card-text">BDT <?= $item['price']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <div class="col-4">
                                        <table class="table table-striped">
                                            <tr class="table_secondary">
                                                <th>Items</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                            <tbody id="cartTbody">

                                                <tr>
                                                    <td>Product Name</td>
                                                    <td>4</td>
                                                    <td>1200</td>
                                                    <td><i class="fa fa-trash text-danger"></i></td>
                                                </tr>
                                            </tbody>

                                            <tr class="table_secondary">
                                                <th>Total</th>
                                                <th></th>
                                                <th class="cartTotal">0</th>
                                                <th></th>
                                            </tr>


                                        </table>
                                        <form action="" method="POST" class="text-right">
                                            <input type="hidden" name="checkout" id="cartInput">
                                            <button type="submit" name="checkout">checkout</button>
                                        </form>
                                    </div>
                                </div>



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
<script src="<?= BASE_URL_ADMIN; ?>helpers/cart-helper.js"></script>
<script>
    var cart = new CartHelper("cart");
    // console.log(cart);
    function printCart(){

        console.log("My Items");
        console.log(cart.getCart());
        var items = cart.getCart();
        document.querySelector
        var html = "";
        var total = 0;
        items.forEach(item => {
            html += `
            <tr>
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>${item.quantity*item.price}</td>
                <td><a href=""><i class="fa fa-trash text-danger"></i></a></td>
            </tr>
            `;
            total+= (item.quantity*item.price);
        });
        document.querySelector("#cartTbody").innerHTML = html;  
        document.querySelector("#cartTotal").innerHTML = html;  
    }
    printCart();
    function addToCart(id,name,price){
        cart.addItem(id,name,price);
        printCart();
    }
</script>