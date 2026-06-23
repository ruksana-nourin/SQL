<?php
require '../config/function.php';

$paramResult = checkParamId('index');

if(is_numeric($paramResult)){

    $indexValue = validate($paramResult);

    if(isset($_SESSION['productsItems']) && isset($_SESSION['productsItemsId'])){

       unset($_SESSION['productsItems'][$indexValue]);
       unset($_SESSION['productsItemsId'][$indexValue]);

       redirect('order-create.php', 'Item Removed');

    }else{
        redirect('order-create.php', 'There is no item to remove');
    }

}else{
    redirect('order-create.php', 'param not numeric');
}
?>