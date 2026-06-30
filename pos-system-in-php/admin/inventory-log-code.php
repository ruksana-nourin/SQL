<?php

include '../config/function.php';

if (isset($_POST['addInventoryLogBtn'])) {

    $productId = validate($_POST['product_id']);
    $transactionTypeId = validate($_POST['transaction_type_id']);
    $qty = validate($_POST['qty']);

    if ($productId == '' || $transactionTypeId == '' || $qty == '' || $qty <= 0) {
        redirect('inventory-log-create.php', 'Please fill all the fields correctly.');
    }

    global $conn;

    // Get current product stock
    $productResult = getById('products', $productId);
    if ($productResult['status'] != 200) {
        redirect('inventory-log-create.php', 'Product not found.');
    }
    $product = $productResult['data'];

    // Get the transaction type name to decide whether stock increases or decreases
    $typeResult = getById('transaction_type', $transactionTypeId);
    if ($typeResult['status'] != 200) {
        redirect('inventory-log-create.php', 'Transaction type not found.');
    }
    $typeName = $typeResult['data']['name'];

    $increaseTypes = ['Purchase', 'Sales Return', 'Positive Adjustment'];

    if (in_array($typeName, $increaseTypes)) {
        $newBalance = $product['quantity'] + $qty;
    } else {
        $newBalance = $product['quantity'] - $qty;

        if ($newBalance < 0) {
            redirect('inventory-log-create.php', 'Not enough stock. Current stock is ' . $product['quantity'] . '.');
        }
    }

    // Insert the inventory log row
    $logData = [
        'product_id' => $productId,
        'qty' => $qty,
        'balance' => $newBalance,
        'transaction_type_id' => $transactionTypeId
    ];

    $logInserted = insert('inventory', $logData);

    if ($logInserted) {
        // Keep products.quantity in sync with the new balance
        update('products', $productId, ['quantity' => $newBalance]);

        redirect('inventory-logs.php', 'Inventory log added successfully.');
    } else {
        redirect('inventory-log-create.php', 'Something went wrong. Please try again.');
    }
}

?>