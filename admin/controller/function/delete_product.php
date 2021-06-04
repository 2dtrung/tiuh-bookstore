<?php

   require $_SERVER['DOCUMENT_ROOT'].'/assignment_02/2dtrung.github.io/admin/model/product.php';

if(isset( $_POST['id'] )) {
    $id = $_POST['id'];

    $product = new M_product();
    $result = $product->deleteProduct($id);
    return $result;
}