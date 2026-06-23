<?php include('includes/header.php'); 
require_once 'models/order.class.php';


if (isset($_POST['checkout'])) {
    $cart = json_decode($_POST['checkout']);
    // echo "<pre>";
    // print_r($cart);
    // echo "</pre>";

    $order = new Order();
    $order->create($cart);
    echo "
        <script>
            window.addEventListener('afterprint', () => {
                localStorage.removeItem('cart');
            });
            window.print();
        </script>
    ";
}
?>



<style>
    #layoutSidenav_nav,
    .navbar,
    .footer {
        display: none !important;
    }

    #layoutSidenav_content {
        padding-left: 0 !important;
    }

    .card {
        width: 100%;
    }
</style>
<div class="container-fluid px-4">
    <div class="card mt-4 shadow shadow-sm">
        <div class="card_header">
            <h4>POS
                <a href="index.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessege(); ?>

            <form action="orders-code.php" method="POST">

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Select Product</label>
                        <select name="product_id" class="form-select" id="">
                            <option value="">--Select Product--</option>
                            <?php
                            $products = getAll('products');
                            if ($products) {
                                if (mysqli_num_rows($products) > 0) {
                                    foreach ($products as $prodItem) {
                                        ?>
                                        <option value="<?= $prodItem['id'] ?>">
                                            <?= $prodItem['name'] ?>
                                        </option>
                                        <?php
                                    }
                                } else {
                                    echo '<option value="">No product found</option>';
                                }
                            } else {
                                echo '<option value="">Something went wrong</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="1" class="form-control" />
                    </div>

                    <div class="col-md-6 mb-3 text-end">
                        <br />
                        <button type="submit" name="addItem" class="btn btn-primary">Add Item</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- <?php
    // print_r($_SESSION['productsItems']);
    // print_r($_SESSION['productsItemsId']);
    ?> -->
</div>

<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header">
            <h4 class="mb-0">Products</h4>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['productsItems'])) {
                $sessionproducts = $_SESSION['productsItems'];
                if (empty($sessionproducts)) {
                    unset($_SESSION['productsItemsId']);
                    unset($_SESSION['productsItems']);

                }

                ?>
                <div class="table-responsive mb-3">
                    <table class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th> Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($sessionproducts as $key => $item):
                                ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $item['name']; ?></td>
                                    <td><?= $item['price']; ?></td>
                                    <td>
                                        <div class="input-group qtyBox">
                                            <button class="input-group-text">-</button>
                                            <input type="text" value="<?= $item['quantity']; ?>" class="qty quantityInput" />
                                            <button class="input-group-tex increment">+</button>

                                        </div>
                                    </td>
                                    <td><?= number_format($item['price'] * $item['quantity'], 0); ?></td>
                                    <td>
                                        <a href="order-item-delete.php?index=<?= $key ?>" class="btn btn-danger">
                                            Remove
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <form action="" method="POST" class="text-right">
                        <input type="hidden" name="checkout" id="cartInput">
                        <button type="submit" class="btn btn-success">Checkout</button>
                    </form>
                </div>

                <?php

            } else {
                echo '<h5>No product added</h5>';
            }
            ?>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>