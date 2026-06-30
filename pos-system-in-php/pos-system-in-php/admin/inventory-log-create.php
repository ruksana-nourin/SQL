<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow shadow-sm">
        <div class="card_header">
            <h4>Add Inventory Log
                <a href="inventory-logs.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessege(); ?>

            <form action="inventory-log-code.php" method="POST">

                <div class="mb-3">
                    <label>Product</label>
                    <select name="product_id" class="form-select" required>
                        <option value="">--Select Product--</option>
                        <?php
                        $products = getAll('products');
                        if ($products) {
                            foreach ($products as $product) {
                        ?>
                            <option value="<?= $product['id'] ?>"><?= $product['name'] ?> (Current Stock: <?= $product['quantity'] ?>)</option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Transaction Type</label>
                    <select name="transaction_type_id" class="form-select" required>
                        <option value="">--Select Transaction Type--</option>
                        <?php
                        $types = getAll('transaction_type');
                        if ($types) {
                            foreach ($types as $type) {
                        ?>
                            <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <small class="text-muted">Purchase, Sales Return, Positive Adjustment will increase stock. Sales, Purchase Return, Negative Adjustment will decrease stock.</small>
                </div>

                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" name="qty" class="form-control" min="1" required>
                </div>

                <button type="submit" name="addInventoryLogBtn" class="btn btn-primary">Save</button>

            </form>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>