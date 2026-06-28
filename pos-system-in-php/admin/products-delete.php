<?php

require ('../config/function.php');

$paramResultId = checkParamId('id');

if(is_numeric($paramResultId)){

    $productId = validate($paramResultId);
    // echo $adminId;
    $product = getById('products', $productId);

    if($product['status'] == 200){
        $response = delete('products', $productId);
        if($response)
            {
            $deleteImage = "../".$product['data']['image'];
            if(file_exists($deleteImage)){
                unlink($deleteImage);
            }
            redirect('products.php', 'product deleted successfully.');
        }
        else{
            redirect('products.php', 'Something went wrong.');
        }

    }
    else{
        redirect('products.php', $product['message']);
    }

}else{
    redirect('products.php', 'Something went wrong.');
}
?>