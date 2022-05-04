<?php
session_start();
require ("cart-class.php");

if(isset($_GET['store-product-id'])){
     $product_id=$_GET['store-product-id'];
     $cart=new Cart($product_id);
     $cart->storeProduct();
     header("Location:products.php");
     exit();
}

if(isset($_GET['remove-product-id'])){
    $product_id=$_GET['remove-product-id'];
    $cart=new Cart($product_id);
    $cart->removeProduct();
    header("Location: products.php");
    exit();
}

if(isset($_GET['update-quant'])){
    $product_id=$_GET['product-id'];
    $quant=$_GET['quant'];
    if(is_numeric($quant) && $quant>0){
        $cart=new Cart($product_id);
        $cart->updateQuantity($quant);
    }
    header("Location:products.php");
    exit();


}

if(isset($_GET['clear-cart'])){
    Cart::clearCart();
    header("Location:products.php");
    exit();
}


?>