<?php
function getProducts(){
   echo json_encode (Product::readAllFilter(2));
}

function getProductById(){
}

?>