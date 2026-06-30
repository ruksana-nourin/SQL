<?php include('includes/header.php'); ?>



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
<!-- Modal -->
<div class="modal fade" id="addCustomerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Enter Customer Name</label>
                    <input type="text" class="form-control" id="c_name">
                </div>
                <div class="mb-3">
                    <label for="">Enter Customer Phone no.</label>
                    <input type="text" class="form-control" id="c_phone">
                </div>
                <div class="mb-3">
                    <label for="">Enter Customer Email (optional)</label>
                    <input type="text" class="form-control" id="c_email">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary saveCustomer">Save</button>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid px-5">

    <div class="row">
        <!-- LEFT SIDE -->

        <div class="col-md-8">

            <div class="card mt-4 shadow shadow-sm ">
                <div class="card-header">
                    <h4>
                        Create Order
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">

                    <?php alertMessege(); ?>

                    <div class="row g-3 product-card-grid">
                        <?php
                        $allProducts = getAll('products');
                        if ($allProducts) {
                            if (mysqli_num_rows($allProducts) > 0) {
                                foreach ($allProducts as $cardProduct) {
                                    $productImage = (!empty($cardProduct['image']))
                                        ? '../' . $cardProduct['image']
                                        : 'https://via.placeholder.com/150?text=No+Image';
                                    ?>
                                    <div class="col-6 col-md-3 col-lg-2">
                                        <div class="card h-100 product-pick-card" style="cursor:pointer;"
                                            data-id="<?= $cardProduct['id'] ?>"
                                            data-name="<?= htmlspecialchars($cardProduct['name']) ?>">

                                            <div
                                                style="height:120px;background:#f8f9fa;display:flex;align-items:center;justify-content:center;overflow:hidden;">
                                                <img src="<?= $productImage ?>"
                                                    style="max-height:100%;max-width:100%;object-fit:contain;"
                                                    alt="<?= htmlspecialchars($cardProduct['name']) ?>">
                                            </div>

                                            <div class="card-body p-2 text-center">
                                                <h6 class="mb-1" style="font-size:14px;">
                                                    <?= $cardProduct['name'] ?>
                                                </h6>

                                                <p class="mb-0 text-success fw-bold">
                                                    Price: <?= number_format($cardProduct['price'], 0) ?>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<p>No product found</p>';
                            }
                        } else {
                            echo '<p>Something went wrong</p>';
                        }
                        ?>
                    </div>

                </div>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-4">

            <div class="card mt-4">
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
                            <table class="table table-striped table-bordered">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $i = 1;
                                    $subTotal = 0;
                                    foreach ($sessionproducts as $key => $item):
                                        $subTotal += $item['price'] * $item['quantity'];
                                        ?>

                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['price']; ?></td>

                                            <td>
                                                <div class="input-group qtyBox">
                                                    <input type="hidden" value="<?= $item['product_id']; ?>" class="prodId">

                                                    <button class="input-group-text decrement">-</button>

                                                    <input type="text" value="<?= $item['quantity']; ?>"
                                                        class="qty quantityInput">

                                                    <button class="input-group-text increment">+</button>
                                                </div>
                                            </td>

                                            <td>
                                                <?= number_format($item['price'] * $item['quantity'], 0); ?>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-danger removeItemBtn"
                                                    data-index="<?= $key ?>">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3 px-2">
                            <h5 class="mb-0">Subtotal:</h5>
                            <h5 class="mb-0 fw-bold"><?= number_format($subTotal, 0); ?></h5>
                        </div>

                        <div class="mt-2">
                            <hr>

                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label>Select Payment Mode</label>

                                    <select id="payment_mode" class="form-select">
                                        <option value="">--Select Payment Method--</option>
                                        <option value="Cash Payment" selected>Cash</option>
                                        <option value="Online Payment">Online Payment</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label>Enter Customer Phone Number</label>

                                    <input type="number" name="phone" id="cphone" class="form-control" value="01234567890">
                                </div>

                                <div class="col-md-12">
                                    <button type="button" class="btn btn-warning w-100 proceedToPlace">
                                        Place Order
                                    </button>
                                </div>
                            </div>

                        </div>

                        <?php
                    } else {
                        echo '<h5>No product added</h5>';
                    }
                    ?>

                </div>
            </div>

        </div>

    </div>

</div>



<?php include('includes/footer.php'); ?>

<script>
    // click anywhere on a product card -> add it to the order via AJAX (quantity 1)
    // stays on pos.php instead of redirecting to order-create.php
    $(document).on('click', '.product-pick-card', function () {
        var $card = $(this);
        var productId = $card.data('id');

        if ($card.hasClass('adding')) {
            return; // avoid double clicks while request is in progress
        }
        $card.addClass('adding');

        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: {
                'addItemAjax': true,
                'product_id': productId,
                'quantity': 1
            },
            success: function (response) {
                var res = JSON.parse(response);

                if (res.status == 200) {
                    window.location.href = "pos.php";
                } else {
                    alert(res.message);
                    $card.removeClass('adding');
                }
            },
            error: function () {
                alert('Something went wrong. Please try again.');
                $card.removeClass('adding');
            }
        });
    });

    // click Remove button on the products table -> remove the item via AJAX
    // stays on pos.php instead of redirecting to order-create.php
    $(document).on('click', '.removeItemBtn', function () {
        var $btn = $(this);
        var indexValue = $btn.data('index');

        if ($btn.hasClass('removing')) {
            return; // avoid double clicks while request is in progress
        }
        $btn.addClass('removing');

        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: {
                'removeItemAjax': true,
                'index': indexValue
            },
            success: function (response) {
                var res = JSON.parse(response);

                if (res.status == 200) {
                    window.location.href = "pos.php";
                } else {
                    alert(res.message);
                    $btn.removeClass('removing');
                }
            },
            error: function () {
                alert('Something went wrong. Please try again.');
                $btn.removeClass('removing');
            }
        });
    });
</script>