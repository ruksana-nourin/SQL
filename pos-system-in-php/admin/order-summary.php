<?php
include('includes/header.php');
if (!isset($_SESSION['productsItems'])) {
    echo "<script>
    window.location.href='order-create.php';
    </script>";
}
?>

<style>
    /* ---- Screen preview of the slip, so it looks the same before printing ---- */
    #myBillingArea.slip-preview {
        width: 80mm;
        max-width: 100%;
        margin: 0 auto;
        padding: 8px;
        font-size: 12px;
        border: 1px dashed #ccc;
        background: #fff;
        display: block;
    }

    @media print {

        /* slip roll size — change to 58mm if your printer uses a narrower roll */
        @page {
            size: 80mm auto;
            margin: 0;
        }

        /* hide everything that isn't the receipt */
        .sb-topnav,
        #layoutSidenav_nav,
        footer,
        .card-header,
        .printHide {
            display: none !important;
        }

        html, body {
            width: 100% !important;
            background: #fff !important;
        }

        /* let the receipt take the full page, but cap it to slip width and center it */
        #layoutSidenav_content,
        main,
        .container_fluid,
        .card,
        .card-body {
            margin: 0 auto !important;
            padding: 0 !important;
            border: none !important;
            box-shadow: none !important;
            width: 80mm !important;
            max-width: 80mm !important;
        }

        #myBillingArea {
            width: 80mm !important;
            max-width: 80mm !important;
            margin: 0 auto !important;
            padding: 4px !important;
            font-size: 11px !important;
            line-height: 1.3 !important;
            border: none !important;
        }

        #myBillingArea table {
            width: 100% !important;
            table-layout: fixed;
        }

        #myBillingArea th,
        #myBillingArea td {
            font-size: 10px !important;
            padding: 2px !important;
            word-wrap: break-word;
            white-space: normal;
        }

        #myBillingArea h4 {
            font-size: 14px !important;
            line-height: 18px !important;
        }

        #myBillingArea h5 {
            font-size: 12px !important;
            line-height: 16px !important;
        }

        #myBillingArea p {
            font-size: 10px !important;
            line-height: 14px !important;
        }
    }
</style>

<div class="container_fluid px-4" >
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Summary
                        <a href="pos.php" class="btn btn-danger float-end">Back to Create Order</a>
                        <button type="button" class="btn btn-primary float-end me-2 printHide" onclick="window.print()">Print</button>
                    </h4>
                </div>
                <div class="card-body" >

                    <?php alertMessege();  ?>

                    <div id="myBillingArea">
                        <?php
                        if (isset($_SESSION['cphone'])) {
                            $phone = $_SESSION['cphone'];
                            $invoiceNo = $_SESSION['invoice_no'];
                            // echo "<h4>Customer Phone: $phone</h4>";
                            global $conn;
                            $customerQuery = mysqli_query($conn, "SELECT * FROM customers WHERE phone='$phone'LIMIT 1");
                            if ($customerQuery) {
                                if (mysqli_num_rows($customerQuery) > 0) {
                                    $cRowData = mysqli_fetch_assoc($customerQuery);
                                    // echo "<h4>Customer Name: {$cRowData['name']}</h4>";
                                    // echo "<h4>Customer Email: {$cRowData['email']}</h4>";
                                    // echo "<h4>Customer Phone: {$cRowData['phone']}</h4>";
                        ?>
                                    <table style="width:100%;">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <h4 style="font-size: 16px; line-height: 20px; margin:2px; padding: 0;">Officers Complex Super Shop</h4>
                                                    <p style="font-size: 11px; line-height: 15px; margin:2px; padding: 0;">#555, GOC, Mirpur-2, Dhaka, Bangladesh</p>
                                                    <p style="font-size: 11px; line-height: 15px; margin:2px; padding: 0;">Govt. Officers Complex Ltd.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 11px; line-height: 16px; margin:0px; padding: 0; border-top: 1px dashed #ccc;">
                                                    <p style="margin:2px 0; padding: 0;">Invoice No.: <?= $invoiceNo; ?></p>
                                                    <p style="margin:2px 0; padding: 0;">Invoice Date: <?= date('d M Y'); ?></p>
                                                    <p style="margin:2px 0; padding: 0;">Customer: <?= $cRowData['name'] ?></p>
                                                    <p style="margin:2px 0; padding: 0;">Phone: <?= $cRowData['phone'] ?></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                        <?php
                                } else {
                                    echo "<h4>Customer Not Found</h4>";
                                    return;
                                }
                            }
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['productsItems'])) {
                            $sessionproducts = $_SESSION['productsItems'];
                        ?>
                            <div class="table-responsive mb-3">
                                <table style="width: 100%;" cellpadding="5">
                                    <thead>
                                        <tr>
                                            <th align="start" style="border-bottom: 1px solid #ccc;" width="40%">Item</th>
                                            <th style="border-bottom: 1px solid #ccc; text-align: right;" width="20%">Price</th>
                                            <th align="start" style="border-bottom: 1px solid #ccc; text-align: right;" width="15%">Qty</th>
                                            <th style="border-bottom: 1px solid #ccc; text-align: right;" width="25%">Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $TotalAmount = 0;

                                        foreach ($sessionproducts as $key => $row) :

                                            $TotalAmount += $row['price'] * $row['quantity'];
                                        ?>
                                            <tr>
                                                <td style="border-bottom: 1px solid #ccc;"><?php echo $row['name']; ?></td>
                                                <td style="border-bottom: 1px solid #ccc; text-align: right;"><?php echo number_format($row['price'], 0); ?></td>
                                                <td style="border-bottom: 1px solid #ccc;text-align: right;"><?php echo $row['quantity']; ?></td>
                                                <td style="border-bottom: 1px solid #ccc; text-align: right;" class="fw-bold">
                                                    <?php echo number_format($row['price'] * $row['quantity'], 0); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="3" align="end" style="font-weight: bold;">Grand Total:</td>
                                            <td colspan="1" style="font-weight: bold; text-align: right;">
                                                <?php echo number_format($TotalAmount, 0); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Payment Mode: <?php echo $_SESSION['payment_mode']; ?></td>
                                        </tr>

                                    </tbody>


                                </table>


                            </div>
                        <?php


                        } else {
                            echo "<h4 class='text-center'>No Order Found</h4>";
                            return;
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>